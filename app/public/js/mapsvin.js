(function () {
	function Mapsvin() {

		var self = this;

		this.position = function (obj) {
			app.fly({
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
			app.fly({
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
			app.fly({
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
				app.fly({
					service: 'APISearchAgency',
					loading: true,
					method: 'POST',
					data:{
						Position: posId,
						LocationID: locId,
						DistrictID: disId
					},
					success: function (result) {
						$('#list-card').html('');
						$('#total-card').html(result.length);
						$.each(result, function(key, obj) {
							$('#list-card').append(self.tempCard(key,obj));
						});
						self.filterStore(result);
					}
				});
			}
		}

		this.filterStore = function (result) {
			$('#store').keyup(function() {
				$('#list-card').html('');
				if($(this).val() != ''){
					var dataValid = [];
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
				}
				console.log(result);
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

	}


	function Maps() {
		var neighborhoods = [
		{lat: 52.511, lng: 13.447},
		{lat: 52.549, lng: 13.422},
		{lat: 52.497, lng: 13.396},
		{lat: 52.517, lng: 13.394}
		];

		var markers = [];
		var map;

		this.initMap = function () {
			map = new google.maps.Map(document.getElementById('map'), {
				zoom: 12,
				center: {lat: 52.520, lng: 13.410}
			});
		}

		this.drop = function () {
			clearMarkers();
			for (var i = 0; i < neighborhoods.length; i++) {
				addMarkerWithTimeout(neighborhoods[i], i * 200);
			}
		}

		this.addMarkerWithTimeout = function (position, timeout) {
			window.setTimeout(function() {
				markers.push(new google.maps.Marker({
					position: position,
					map: map,
					animation: google.maps.Animation.DROP
				}));
			}, timeout);
		}

		this.clearMarkers = function () {
			for (var i = 0; i < markers.length; i++) {
				markers[i].setMap(null);
			}
			markers = [];
		}
	}

	this.mapsvin = new Mapsvin();
	this.maps = new Maps();
})();

$(document).ready(function(){
	mapsvin.position();
});