/* IMPORTANT: WPJSON is using jQuery.ajax method, so before you use it ensure that jQuery is loaded! */

var WPJSON = function(apiurl) {
	
	// ensuring that 'new' is being used when creating
	if(!(this instanceof WPJSON)) {
		return new WPJSON(apiurl);
	}

	// caching this to have a reference for child closures
	var that = this;

	// general exception function
	function WPJSONException(message) {
		this.message = message;
		this.name = "WPJSONException";
	}

	// function performing ajax request
	function request(callback, params, method) {

		// method is optional and can be included in params
		var url = that.apiurl;
		if(method) {
			url += method;
		}

		if(!params) {
			params = {};
		}

		$.ajax({
			url: url,
			data: params,
			dataType: 'json',
			success: callback,
			error: function(jqXHR, textStatus, errorThrown) {
				callback(false);
			}
		});
	}

	// method initializing WPJSON
	that.init = function() {
		
		if(!apiurl) {
			apiurl = 'wordpress/';
		}
		else if(apiurl[apiurl.length - 1] !== '/') {
			apiurl += '/';
		}

		that.apiurl = apiurl;

		// removing initialization function, to avoid second call
		that.init = function() {};
	};

	// posts getter
	that.getPosts = function(callback, params) {

		if(!params) {
			params = {};
		}

		request(callback, params, 'posts');
	};

	// posts getter including pagination
	that.getPostsPagination = function(callback, perPage, page) {

		if(!page) {
			page = 1;
		}

		if(!perPage) {
			throw new WPJSONException("'perPage' param not specified!");
			return;
		}

		that.getPosts(callback, {
			'posts_per_page': parseInt(perPage),
			'offset': (page - 1) * parseInt(perPage)
		});
	}

	// categories getter
	that.getCategories = function(callback) {

		request(callback, params, 'posts');
	};

	// pages getter
	that.getPages = function(callback, params) {

		if(!params) {
			params = {};
		}

		request(callback, params, 'posts');
	};

	// pages getter including pagination
	that.getPagesPagination = function(callback, perPage, page) {

		if(!page) {
			page = 1;
		}

		if(!perPage) {
			throw new WPJSONException("'perPage' param not specified!");
			return;
		}

		that.getPages(callback, {
			'number': parseInt(perPage),
			'offset': (page - 1) * parseInt(perPage)
		});
	}

	// initializing WPJSON
	that.init();
};