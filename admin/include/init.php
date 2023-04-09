<?php
$base_dir = posix_getcwd();
$base_dir = str_replace('/home/admin/','tempdubl',$base_dir);
$base_dir = str_replace('/admin','',$base_dir);
$base_dir = str_replace('tempdubl','/home/admin/',$base_dir);
include($base_dir.'/classes/mysql.class.php');
include($base_dir.'/classes/template_class.php');
include($base_dir.'/include/dbconfig.php');
include($base_dir.'/include/config.php');
include($base_dir.'/include/functions.php');
$base_dir = posix_getcwd();
define("PROMOVERUM", "access");
$promoverum = new promoverum;
?>