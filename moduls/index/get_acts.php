<?php
if (!defined("PROMOVERUM")) {
    die('bad request');
}
?>
<?php
//правка кода
$tip = $promoverum->get('tip','no');
$tip = str_replace('/','',$tip);
$pr_mod_fl=is_file($base_dir."/moduls/index/get_acts/$tip.php");
if($pr_mod_fl)
{
include($base_dir."/moduls/index/get_acts/$tip.php");
}
else
{
echo 'error';
}	

?>