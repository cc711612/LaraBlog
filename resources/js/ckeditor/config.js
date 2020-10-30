/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'zh';
	// config.uiColor = '#AADC6E';


	// 關閉語法過濾器  老實說這蠻重要的  不關掉它  很多語法會不見
	config.allowedContent=true;

	// 移掉自己會出現的<p>
	config.enterMode = CKEDITOR.ENTER_BR;
	config.shiftEnterMode = CKEDITOR.ENTER_P;

	//工具列設定
	config.toolbar = 'TadToolbar';
	config.toolbar_TadToolbar = [
									['Source','-'],
									['Maximize','Cut','Copy','Paste','PasteText','PasteFromWord'],
									['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
									['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
									['TextColor','BGColor','-','NumberedList','BulletedList',],
									'/',
									['Outdent','Indent','Iineheight'],
									['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
									['Link','Unlink','Anchor'],
									['Image','Flash','Table','HorizontalRule','SpecialChar','PageBreak'],
									['Format','Font','FontSize']
								];

	//開啟圖片上傳功能
	config.filebrowserBrowseUrl = '../js/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = '../js/ckfinder/ckfinder.html?Type=Images';
	config.filebrowserFlashBrowseUrl = '../js/ckfinder/ckfinder.html?Type=Flash';
	config.filebrowserUploadUrl = '../js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '../js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = '../js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

	config.height = 400;
	// config.width = '100%';
	config.resize_enabled = false;
};
