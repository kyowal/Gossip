$(document).ready(function(){
    $('body').on('click', '.openeditor', function() {
		showModal('#posteditor', true);
	});
	
	$('body').on('submit', '#articlecustom', function(e) {
		e.preventDefault();
		var formData = new FormData(this);
		createNewPost(formData);
		return false;
	});
	
	
	function createNewPost($postData){
		$options = { data : $postData, url: 'action.php', contentType: false, cache: false, processData:false,dataType: false };
		callHttp( $options, function($res){
			console.log($res);
		});
	}
	
	function showModal(object, show){
		if(show == true){
			$(object).modal({ show: true,backdrop: true, keyboard: false });
		}else{
			$(object).modal({ show: false,backdrop: true, keyboard: false });
		}
	}
	
	function callHttp (options, callback) {
			if (typeof callback === "undefined") {
				callback = false;
			}
			var defaults = {
				async		: 	true,
				type		: 	'POST',
				url			: 	'',
				data		: 	'',
				xhrFields	: { withCredentials: false },
				contentType	: 	"application/x-www-form-urlencoded; charset=UTF-8",
				dataType	: false,
				processData	: false				
			};
			var options = $.extend(defaults, options);
			return $.ajax({
		        async: options.async,
		        type: options.type,
		        url: options.url,
		        data: options.data,
		        cache: options.cache,
				xhrFields: options.xhrFields,
		        contentType: options.contentType,
		        dataType: options.dataType,
				processData: options.processData,
		        success: function (response) {
		        	if( callback !== false ){
			        	callback( response );
		        	}
		        },
		        statusCode: {
		            404: function() {
		            		alert( "page not found" );
		            	}
		          }
		    });
		}
			
});