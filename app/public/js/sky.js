(function () {
	function Sky() {

		this.get = function(url, data) {
			return axios({
		        method: 'GET',
		        url: url,
		        data: data
		    })
		}

		this.post = function(url, data) {
			return axios({
		        method: 'POST',
		        url: url,
		        data: data
		    })
		}

		this.del = function(url) {
			return axios({
		        method: 'DELETE',
		        url: url,
		    })
		}

		this.request = function (config) {
			return axios(config);
		}
	}

	this.sky = new Sky();
})();