(function () {
	function Sky() {

		this.get = function(url) {
			return axios({
		        method: 'GET',
		        url: url
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
	}

	this.sky = new Sky();
})();