<?php
if (!defined("PROMOVERUM")) {
    die('bad request');
}
?>
<?php
$id = $promoverum->post('id','no');
$user = $promoverum->post('user','no');
$eml = $promoverum->post('eml','no');
$content = $promoverum->post('content','no');
$status = $promoverum->post('status','no');
$node = new index_node;
if($id == '' || $user == '' || $eml == '' || $content == '' || $status == '')
{
echo 'Заполните все поля';
}
elseif($id == '' || $user != '' && $eml != '' && $content != '' || $status != '')
{
$eml_fl = filter_var($eml, FILTER_VALIDATE_EMAIL);
if($eml_fl == false)
{
echo 'не правильно указан email';
}
elseif($eml_fl == true)
{
$node->edit_task(array("id" => $id, "user" => $user, "eml" => $eml, "content" => $content, "status" => $status));
echo 'ok';
}
}
?>