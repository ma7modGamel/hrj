// Copyright (c) 2015, Fujana Solutions - Moritz Maleck. All rights reserved.
// For licensing, see LICENSE.md

CKEDITOR.plugins.add( 'imageuploader', {
    init: function( editor ) {
    	var pathname = $('.ckediteImageUploadUrl').text(); // Returns path only
        editor.config.filebrowserBrowseUrl = pathname+'/public/plugins/ckeditor/plugins/imageuploader/imgbrowser.php';
    }
});
