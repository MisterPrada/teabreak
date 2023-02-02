function upload (field_name, url, type, win) {
	var cmsURL = '<? echo pathinfo($_SERVER['SCRIPT_NAME'],PATHINFO_DIRNAME); ?>/upload.php?type=' + type;

	tinyMCE.activeEditor.windowManager.open({
		file : cmsURL,
		title : 'Upload',
		width : 420,
		height : 400,
		resizable : "yes",
		inline : "yes",
		close_previous : "no"
	}, {
		window : win,
		input : field_name
	});
	return false;
}
