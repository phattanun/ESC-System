/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.language = 'th';
    config.extraPlugins = 'image';
    config.filebrowserUploadUrl = '/ckeditor/ckupload.php';
    config.image_removeLinkByEmptyURL= true;
    config.image_previewText = CKEDITOR.tools.repeat( 'ข้อความอยู่นี่ ', 100 );

    //config.contentsCss = ['/css/ckeditor-style.css'] ;
    config.height = '500px';
    config.extraPlugins = 'image2';

    config.toolbar = [
        { name: 'document', groups: [ 'mode' ], items: [ 'Source', '-'] },
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
        { name: 'insert', items: [ 'Image', 'Table' , 'Smiley', 'SpecialChar'] },
        { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
        { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
        { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
        { name: 'others', items: [ '-' ] },
        { name: 'about', items: [ 'About' ] }
    ];
    //config.stylesSet = 'my_styles';

};
