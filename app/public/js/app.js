(function () {
	function App(){

		this.fly = function(params) {
				params = $.extend({
		        method:'get',
		        loading: true,
		    }, params);
		    if(params.loading){
		        loading.show();
		    }
		    $.ajax({
		        url: this.api + params.service,
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

		this.template = function (template, data) {
			try {
				return new EJS({
					url: '/tpl/' + template
				}).render(data);
			} catch (err) {
				return "";
			}
		}

		this.api = 'https://vtcgame.vn/Vcoin/';

	}

	function Loading() {
        this.show = function () {
            $('.loading').css('display', 'block');
        };
        this.hide = function () {
            $('.loading').css('display', 'none');
        };

    }

	// init object app
	this.app = new App();
	this.loading = new Loading();
})();