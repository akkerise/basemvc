(function () {
	function Mapsvin() {

		var self = this;

		var map;

		var markers = [];

		var API_VTC = 'https://vtcgame.vn/Vcoin/';

		var API_GOOGLE_SEARCH_LAT_LNG = 'https://maps.googleapis.com/maps/api/geocode/json';

		var API_GOOGLE_KEY = 'AIzaSyDi-Cl5IvRclyM58mkQoBoV4RSlghEegAo';

		this.init = function () {
			this.position();
		}

		this.position = function (obj) {
			this.fly({
				service: 'APIPositionList',
				loading: true,
				method: 'GET',
				success: function (result) {
					$.each( result, function( key, value ) {
						$('#position').append('<option value="'+ value.Position +'">'+ value.PositionName +'</option>')
					});
					var positionId = $("#position option:selected").val();
					self.location(positionId);
				}
			});
		}

		this.location = function (positionId) {
			this.fly({
				service: 'APILocationList',
				loading: true,
				method: 'POST',
				data: { Position: positionId },
				success: function (result) {
					$('#location').html('');
					$.each( result, function(key, value) {
						$('#location').append('<option value="'+ value.LocationID +'">'+ value.LocationName +'</option>')
					});
					var locationId = $("#location option:selected").val();
					self.district(locationId);
				}
			});
		}

		this.district = function(locationId) {
			this.fly({
				service: 'APIDistrictList',
				loading: true,
				method: 'POST',
				data:{
					LocationId: locationId
				},
				success: function (result) {
					$('#district').html('');
					$.each( result, function( key, value ) {
						$('#district').append('<option value="'+ value.DistrictID +'">'+ value.DistrictName +'</option>')
					});
					var districtId = $("#district option:selected").val();
					self.searchStore(districtId);
				}
			});
		}

		this.searchPosition = function() {
			var positionId = $("#position option:selected").val();
			self.location(positionId);
		}

		this.searchLocation = function() {
			var locationId = $("#location option:selected").val();
			self.district(locationId);
		}

		this.searchDistrict = function() {
			var districtId = $("#district option:selected").val();
			self.searchStore(districtId);

		}

		this.searchStore	 = function(disId) {
			var posId = $("#position option:selected").val();
			var locId = $("#location option:selected").val();
			if(posId && locId && disId){
				this.fly({
					service: 'APISearchAgency',
					loading: true,
					method: 'POST',
					data:{
						Position: posId,
						LocationID: locId,
						DistrictID: disId
					},
					success: function (result) {
						self.clearMarkers();
						var address = [];
						var config = {
							url: API_GOOGLE_SEARCH_LAT_LNG,
							method: 'get',
							params: {
								'key': API_GOOGLE_KEY,
								'address': ''
							}
						}
						$('#list-card').html('');
						$('#total-card').html(result.length);
						var parent = self;
						$.each(result, function(key, obj) {
							$('#list-card').append(self.tempCard(key,obj));
							parent.searchLatLng(obj.Address);
						});
						self.filterStore(result);
					}
				});
			}
		}

		this.searchLatLng = function(address = '') {
			var config = {
				url: API_GOOGLE_SEARCH_LAT_LNG,
				method: 'get',
				params: {
					'key': API_GOOGLE_KEY,
					'address': address
				}
			};
			this.request(config)
			.then(res => {
				self.addMarker(res.data.results[0].geometry.location, self.map);
			})
			.catch(err => {
				console.log(err);
			})
		}

		this.filterStore = function (result) {
			$('#store').keyup(function() {
				$('#list-card').html('');
				var dataValid = [];
				if($(this).val() != ''){
					var regex = new RegExp($(this).val(), "i");
					$.each(result, function(key, obj) {
						if ( obj.AgencyName.search(regex) != -1 ) {
							dataValid.push(obj);
							$('#list-card').append(self.tempCard(key,obj));
						}
					});
					$('#total-card').html(dataValid.length);
				}else{
					$.each(result, function(key, obj) {
						$('#list-card').append(self.tempCard(key,obj));
					});
					$('#total-card').html(dataValid.length);
				}
			});
		}

		this.tempCard  = function (key, obj) {
			return 	'<div class="card" class="item" data-index="'+key+'" data-lat="'+obj.Latitude+'" data-lng="'+obj.Longitude+'"' +
					'data-address="'+obj.Address+'" data-phone="'+obj.Phone+'"' +
					'data-name="'+obj.AgencyName+'">' +
					'<div class="card-body">' +
					'<h5 class="card-title">'+obj.AgencyName+'</h5>' +
					'<hr>' +
					'<h6 class="card-subtitle mb-2 text-muted">'+obj.DistrictName+'</h6>' +
					'<div class="icon"></div>' +
					'<div class="title">'+obj.AgencyName+'</div>' +
					'<div class="meta address">'+obj.Address+'</div>' +
					'<div class="meta phone number">Điện thoại: '+obj.Phone+'</div>' +
					'</div>' +
					'</div>';
		}

		this.initMap = function (position = {}) {
			var options = {
				zoom: 6,
				center: {lat: 14.0583, lng: 108.2772}
			}
			var map = new google.maps.Map(document.getElementById('map'), options);
			this.map = map;
		}

		this.addMarker = function (position, map) {
			markers.push(new google.maps.Marker({
				position: position,
				map: map,
				animation: google.maps.Animation.DROP
			}));
		}

		this.clearMarkers = function () {
			for (var i = 0; i < markers.length; i++) {
				markers[i].setMap(null);
			}
			markers = [];
		}

		this.fly = function(params) {
				params = $.extend({
		        method:'get',
		        loading: true,
		    }, params);
		    if(params.loading){
		        loading.show();
		    }
		    $.ajax({
		        url: API_VTC + params.service,
		        type: params.method,
		        data: params.data,
		        dataType: 'json',
		        async: params.async,
		        headers: params.headers,
		        success:function(result){
		            if(params.loading){
		                loading.hide();
		            }
		            if(!result.status && result.message == '-signin'){
		                viewer = null;
		                document.location = '#auth';
		            }
		            else{
		                params.success(result);
		            }
		        },
		        error:function(){
		            if(params.loading){
		                loading.hide();
		            }
		            console.log('Có lỗi xảy ra trong quá trình truyền dữ liệu, xin hãy kiểm tra lại kết nối mạng!');
		        }
		    });
		}

		this.request = function (config) {
			return axios(config);
		}

	}

	this.mapsvin = new Mapsvin();

})();

