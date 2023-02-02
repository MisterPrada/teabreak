<?
include_once('config.php');

$type = $_REQUEST['type'];
$check_upload = false;
$error_message="";
$file_name = '';
$screen_max = 200;

if(!isset($_GET['filename'])){
	if ( !in_array($type,array('image','media','file' )) ) $type = 'file';

	if ( isset($_FILES["userfile"]) ) {
		if ( is_dir($conf->upload_dir) ) {
			$file_tmp = $_FILES['userfile']['tmp_name'];
			$file_name = $_FILES["userfile"]["name"];

			if ( !file_exists($conf->upload_dir.$file_name) ) {
				if (is_uploaded_file($file_tmp)) {
					if ( move_uploaded_file($file_tmp, $conf->upload_dir.$file_name) ) {
						$check_upload = true;
					} else {
						$error_message="Произошла ошибка - невозможно сохранить файл на сервере.";
					}
				} else {
					$error_message="Произошла ошибка, файл не был загружен на сервер.";
				}
			} else {
				$check_upload = true;
			//	$error_message="Файл с именем ".$file_name." уже существует.";
			}
		} else {
			$error_message="Произошла ошибка: папка для храниния файлов пользователя не сущенствует.";
		}
	}
} else {
	$file_name=$_GET['filename'];
	if(file_exists($conf->upload_dir.$file_name)){
		//delete file
		unlink ($conf->upload_dir.$file_name);
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Загрузка файла</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Pragma" content="no-cache" />
<script type="text/javascript" src="../../tiny_mce_popup.js"></script>
<script>
function selectURL(url) {
	document.passform.fileurl.value = url;
	FileBrowserDialogue.mySubmit();
}
var FileBrowserDialogue = {
	init : function () { },
	mySubmit : function () {
		var URL = document.passform.fileurl.value;
		var win = tinyMCEPopup.getWindowArg("window");
		win.document.getElementById(tinyMCEPopup.getWindowArg("input")).value = URL;
		if (typeof(win.ImageDialog) != "undefined") {
			if (win.ImageDialog.getImageData) win.ImageDialog.getImageData();
			if (win.ImageDialog.showPreviewImage) win.ImageDialog.showPreviewImage(URL);
		}
		tinyMCEPopup.close();
	}
}

tinyMCEPopup.onInit.add(FileBrowserDialogue.init, FileBrowserDialogue);
</script>
</head>
<body>
<div class="tabs">
<ul>
	<li id="general_tab" class="current"><span>Загрузка </span></li>
</ul>
</div>
<form name="passform"><input name="fileurl" type="hidden" value="" /></form>
<form name="sendform" id="sendform" enctype="multipart/form-data" method="post" action="upload.php">
<input type="hidden" name="type" value="<?=$type?>">
<div class="panel_wrapper">
	<div id="general_panel" class="panel current" align="center">
<?
if ( $check_upload ) {
	list($width,$height,$imgtype) = getimagesize($conf->upload_url.$file_name);

	if ( $imgtype>=1 && $imgtype<=3 ) {
		$size_max = ($width>$height) ? $width : $height;
		if ( $size_max>$screen_max ) {
			$size_prc = 150*200/$size_max;
			$width = ceil($width*$size_prc/100);
			$height = ceil($height*$size_prc/100);
		}
		echo "<p><a href=\"#\" onclick=\"selectURL('" . $conf->upload_url.$file_name . "');\">".'<img border="0" src="'.$conf->upload_url.$file_name.'" width="'.$width.'" height="'.$height.'"></a></p>';
	}
	echo "<p><a href=\"#\" onclick=\"selectURL('" . $conf->upload_url.$file_name . "');\">" . $file_name . "</a></p>";
} else{
	echo $error_message;
}
?>
		<?php if(!$check_upload){	//show browse fields if we don't upload file?>
		<table border="0" cellpadding="4" cellspacing="0" align="center">
		<tr>
			<td><label for="userfile"><? echo ucfirst($type); ?></label></td>
			<td><input type="file" id="userfile" name="userfile" style="width: 200px"></td>
		</tr>
		</table>
		<?php }?>
	</div>
</div>
<div class="mceActionPanel">
	<table width="100%">
	<tr>
		<td align="left" width="33%">
		<?php if(!$check_upload){?>
			<input type="submit" id="insert" name="upload" value="Загрузить" />
		<?php }else {?>
			<input type="submit" id="delete" name="delete" value="Удалить" onclick="sendform.action='upload.php?filename=<?php echo $file_name;?>'; submit();'"/>
		<?php }?>
	</td>
	<td align="center" width="33%"><?php if($check_upload){ echo "<p><input type='submit' id='ok' name='ok' value='Ok' onclick=\"selectURL('" . $conf->upload_url.$file_name . "'); return false;\"></p>";}?>
	</td>
	<td align="right" width="33%"><input type="button" id="cancel" name="cancel" value="Отменить" onclick="tinyMCEPopup.close();" /></td>
</div>
</form>

</body>
</html>