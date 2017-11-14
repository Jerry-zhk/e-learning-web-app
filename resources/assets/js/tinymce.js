// Import TinyMCE
var tinymce = require('tinymce/tinymce');

// A theme is also required
require('tinymce/themes/modern/theme');

// Any plugins you want to use has to be imported
require('tinymce/plugins/link');
require('tinymce/plugins/image');
require('tinymce/plugins/media');
require('tinymce/plugins/code');
require('tinymce/plugins/lists');
require('tinymce/plugins/table');

var base_url = window.location.origin;

// Initialize the app
tinymce.init({
	selector: '#tinymce',
	height: 450,
	force_br_newlines : true,
    force_p_newlines : false,
    forced_root_block : '',
    cleanup : true,
	plugins: ['link', 'image', 'media', 'code', 'lists', 'table'],
	toolbar: 'bold italic underline | fontsizeselect | alignleft aligncenter alignright  bullist numlist  link image media | code',
	relative_urls: false,
  	remove_script_host: false,
	file_picker_types: 'file image media', 
	file_picker_callback: function(cb, value, meta) {
		var input = document.createElement('input');
		input.setAttribute('type', 'file');
		if (meta.filetype == 'image') {
	      	input.setAttribute('accept', 'image/*');
	    }else if (meta.filetype == 'media') {
	      	input.setAttribute('accept', 'video/mp4');
	    }
	    
	    // Note: In modern browsers input[type="file"] is functional without 
	    // even adding it to the DOM, but that might not be the case in some older
	    // or quirky browsers like IE, so you might want to add it to the DOM
	    // just in case, and visually hide it. And do not forget do remove it
	    // once you do not need it anymore.

	    input.onchange = function() {
	    	var file = this.files[0];
	    	var reader = new FileReader();
	    	reader.onload = function () {
		        // Note: Now we need to register the blob in TinyMCEs image blob
		        // registry. In the next release this part hopefully won't be
		        // necessary, as we are looking to handle it internally.
		        var id = 'blobid' + (new Date()).getTime();
		        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
		        var base64 = reader.result.split(',')[1];
		        var blobInfo = blobCache.create(id, file, base64);
		        blobCache.add(blobInfo);
		        tinymce.activeEditor.editorUpload.uploadImages(function(){
		        	
		        	var xhr, formData;

				    xhr = new XMLHttpRequest();
				    xhr.withCredentials = false;
				    xhr.open('POST', '/upload');

				    xhr.onload = function() {
				    	var json;

				    	if (xhr.status != 200) {
				        	alert('HTTP Error: ' + xhr.status);
				        	return;
				      	}

				      	json = JSON.parse(xhr.responseText);
				      	if (!json || typeof json.location != 'string') {
				        	alert('Invalid JSON: ' + xhr.responseText);
				        	return;
				      	}

				      	cb(json.location, {});
				    };

				    formData = new FormData();
				    formData.append('file', blobInfo.blob(), blobInfo.filename());
				    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

				    xhr.send(formData);
				    
		        });

		        // call the callback and populate the Title field with the file name
		        //cb(blobInfo.blobUri(), { title: file.name });
		    };
		    reader.readAsDataURL(file);
		};

		input.click();
	}
});