<?php
if (!defined("PROMOVERUM")) {
    die('bad request');
}
?>
<?php
//правка кода
if($_SESSION['tip']=='')
{
echo 'error autherization';
}
elseif($_SESSION['tip']!='')
{
$pr_mod_fl=is_file($base_dir."/moduls/index/get_acts/{$_GET['tip']}.php");
if($pr_mod_fl)
{
include($base_dir."/moduls/index/get_acts/{$_GET['tip']}.php");
}
else
{
echo 'error';
}	
}
?>