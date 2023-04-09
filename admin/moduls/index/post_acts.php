<?php
if (!defined("PROMOVERUM")) {
    die('bad request');
}
?>
<?php
if($_SESSION['tip']=='')
{
echo 'error autherization';
}
elseif($_SESSION['tip']!='')
{
$pr_mod_fl=is_file($base_dir."/moduls/index/post_acts/{$_POST['tip']}.php");
if($pr_mod_fl)
{
include($base_dir."/moduls/index/post_acts/{$_POST['tip']}.php");
}
else
{
echo 'error';
}	
}
?>