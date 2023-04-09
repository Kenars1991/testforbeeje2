<?php
if (!defined("PROMOVERUM")) {
    die('bad request');
}
?>
<?php
$tip = $promoverum->post('tip','no');
$tip = str_replace('/','',$tip);
$pr_mod_fl=is_file($base_dir."/moduls/index/post_acts/$tip.php");
if($pr_mod_fl)
{
include($base_dir."/moduls/index/post_acts/$tip.php");
}
else
{
echo 'error';
}	

?>