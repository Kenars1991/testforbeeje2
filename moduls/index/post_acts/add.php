<?php
if (!defined("PROMOVERUM")) {
    die('bad request');
}
?>
<?php
$user = $promoverum->post('user','no');
$eml = $promoverum->post('eml','no');
$content = $promoverum->post('content','no');
$node = new index_node;
if($user == '' || $eml == '' || $content == '')
{
echo 'Заполните все поля';
}
elseif($user != '' && $eml != '' && $content != '')
{
$eml_fl = filter_var($eml, FILTER_VALIDATE_EMAIL);
if($eml_fl == false)
{
echo 'не правильно указан email';
}
elseif($eml_fl == true)
{
$node->add_task(array("user" => $user, "eml" => $eml, "content" => $content, "status" => 'new'));
echo 'ok';
}
}
?>