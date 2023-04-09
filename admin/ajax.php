<?php
//правка кода
ignore_user_abort(true);
set_time_limit(0);
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//header("Content-Type: text/html; charset=windows-1251");
$tmp_base_dir = posix_getcwd();
include($tmp_base_dir.'/include/init.php');
@session_start();
$real_kew=$promoverum->get("ajax_kew",'no');
if($real_kew==$ajax_kew)
{
$modul = $promoverum->get("mod",'no');
$modul = str_replace('/', '', $modul);	
if(empty($modul))
{
$modul='index';
}
$file=$promoverum->get("f",'no');
$file = str_replace('/', '', $file);
if(empty($file))
{
$file='index';
}
		if(is_file($base_dir."/moduls/$modul/functions.php"))
	{
		include($base_dir."/moduls/$modul/functions.php");
	}
		if(is_file($base_dir."/moduls/$modul/node.php"))
	{
	include($base_dir."/moduls/$modul/node.php");
	}
//load hook components
$dh = opendir($base_dir.'/moduls');
	while($mfil = readdir($dh))
	{
	if((strpos($mfil, '.') == false)&& ($mfil!='.')&&($mfil!='..'))
	{
if(is_file($base_dir."/moduls/$mfil/hook.php"))
{
include($base_dir."/moduls/$mfil/hook.php");
}
	}
else
{
}
	}
//
include($base_dir."/moduls/$modul/$file.php");
include($base_dir."/hook.php");
}
else
{
echo 'bad request';
}
?>