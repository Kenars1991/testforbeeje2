<?php
class index_funct
{
function num_tasks($status='')
{
global $db;
if($status == '')
{
$dop_sql = '';
}
elseif($status != '')
{
$dop_sql = "WHERE status='$status'";
}
$elm = $db->get_array($db->query("SELECT COUNT(*) FROM tasks $dop_sql"));
return $elm[0];
}

}
?>