<?php
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
set_time_limit(100);
//header("Content-Type: text/html; charset=windows-1251");
$tmp_base_dir = posix_getcwd();
include($tmp_base_dir.'/include/init.php');
define("PROMOVERUM_WEB", "access");
@session_start();
$s_tip = $promoverum->session('tip','no');
if($s_tip=='')
{
	$act = $promoverum->post('act','no');
if($act!='login')
{
$str = file_get_contents($base_dir.'/tpl/page-login.html');
$str = str_replace('{URL}','/admin/index.php',$str);
$str=str_replace('{CONTENT}','',$str);	
echo $str;
}
elseif($act=='login')
{
	$lgn = $promoverum->post('login','no');
	$pss = $promoverum->post('pass','no');
if($lgn==$login && $pss==$pass)
{
	$promoverum->set_session('tip','admin');
	$promoverum->set_session('ID','admin');
$str = file_get_contents($base_dir.'/tpl/page-login.html');
$str=str_replace('{CONTENT}','ОК....<meta http-equiv="refresh" content="1; url='.WEB_URL.'/admin'.'">',$str);
echo $str;
}
else
{
$str = file_get_contents($base_dir.'/tpl/page-login.html');
$str=str_replace('{CONTENT}','Неверный логин или пароль<meta http-equiv="refresh" content="1; url='.WEB_URL.'/admin'.'">',$str);
echo $str;	
}	
}
}
elseif($s_tip=='admin' || $s_tip=='user')
{
$mod = $promoverum->get("mod",'no');
$mod = str_replace('/', '', $mod);
if($mod == '')
{
$mod="index";
}
else
{

}
$fil = $promoverum->get("f",'no');
if($fil == '')
{
$fil='index';
}
else
{

}
$main_tpl = file_get_contents($base_dir.'/tpl/main.html');
ob_start();
include($base_dir.'/moduls/index/login_widget.php');
$main_tpl = str_replace('{LOGIN_WIDGET}',ob_get_clean(),$main_tpl);
/////
$menu_viv='';
$navigation = '';
$dh = opendir($base_dir.'/moduls');
	while($mfil = readdir($dh))
	{
	if((strpos($mfil, '.') == false)&& ($mfil!='.')&&($mfil!='..'))
	{	
	if(is_file($base_dir."/moduls/$mfil/menu.php"))
	{
		ob_start();
		include($base_dir."/moduls/$mfil/menu.php");
		$menu_viv.=ob_get_clean();
		
	}
else
{
}
if(is_file($base_dir."/moduls/$mfil/hook.php"))
{
include($base_dir."/moduls/$mfil/hook.php");
}
	}
else
{
}
	}
	$main_tpl = str_replace('{MENU}','          <li class="nav-item">
            <a class="nav-link" href="'.WEB_URL.'/admin">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Главная</span>
            </a>
          </li>'.$menu_viv,$main_tpl);
/////
$pr_fl=is_file($base_dir."/moduls/$mod/$fil.php");
if($pr_fl)
{
		if(is_file($base_dir."/moduls/$mod/functions.php"))
	{
		include($base_dir."/moduls/$mod/functions.php");
	}
	if(is_file($base_dir."/moduls/$mod/node.php"))
	{
	include($base_dir."/moduls/$mod/node.php");
	}
	if(is_file($base_dir."/moduls/$mod/navigation.php"))
	{
	ob_start();	
	include($base_dir."/moduls/$mod/navigation.php");
	$navigation .= ob_get_clean();
	}
	elseif(!is_file($base_dir."/moduls/$mod/navigation.php"))
	{
	$navigation .= '';
	}
include($base_dir."/moduls/$mod/head.php");
$main_tpl = str_replace('{MODUL_TITLE}',$mod_title,$main_tpl);
$main_tpl = str_replace('{MODUL_DESCRIPTION}',$mod_description,$main_tpl);
$main_tpl = str_replace('{MODUL_URL}',WEB_URL.'/?mod='.$mod,$main_tpl);
ob_start();
include($base_dir."/moduls/$mod/$fil.php");
include($base_dir."/hook.php");
$main_tpl = str_replace('{CONTENT}',ob_get_clean(),$main_tpl);
$main_tpl = str_replace('{NAVIGATION}',$navigation,$main_tpl);
echo $main_tpl;
}
else
{
$main_tpl = file_get_contents($base_dir.'/tpl/page-error.html');	
echo $main_tpl;
}
}
?>