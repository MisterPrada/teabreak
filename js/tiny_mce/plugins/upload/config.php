<?
$conf->upload_path = '/i/userimages/';

/* not change */
if ( substr($conf->upload_path,0,1)!='/' ) $conf->upload_path = '/'.$conf->upload_path;
if ( substr($conf->upload_path,-1)!='/' ) $conf->upload_path = $conf->upload_path.'/';
$conf->upload_url = 'http://'.$_SERVER["SERVER_NAME"].$conf->upload_path;
$conf->upload_dir = $_SERVER["DOCUMENT_ROOT"].$conf->upload_path;
?>