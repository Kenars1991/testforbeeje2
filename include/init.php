<?php
$base_dir = posix_getcwd();
include($base_dir.'/classes/mysql.class.php');
include($base_dir.'/classes/template_class.php');
include($base_dir.'/include/dbconfig.php');
include($base_dir.'/include/config.php');
include($base_dir.'/include/functions.php');
define("PROMOVERUM", "access");
$promoverum = new promoverum;
?>