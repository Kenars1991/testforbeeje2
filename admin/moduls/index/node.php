<?php
class index_node
{
function get_tasks($start='', $limit='', $sort='',$srttp='')
{
global $db;
$tasks = array();

if($sort == '')
{
$dop_sql1 = '';
}
elseif($sort != '')
{
$dop_sql1 = 'ORDER BY '.$sort.' '.$srttp;
}
if($start == '')
{
$start = '0';
}
if($limit == '')
{
$dop_sql2 = '';
}
elseif($limit != '')
{
$dop_sql2 = 'LIMIT '.$start.', '.$limit;
}
$dop_sql = $dop_sql1.' '.$dop_sql2;
$sql = $db->query("SELECT id, cr_d, user, eml, content, status FROM tasks $dop_sql");
//echo "SELECT cr_d, user, eml, content, status FROM tasks $dop_sql";
while($tab = $db->get_array($sql))
{
$tasks[]= array("id" => $tab['id'], "cr_d" => $tab['cr_d'], "user" => $tab['user'], "eml" => $tab['eml'], "content" => $tab['content'], "status" => $tab['status']);
}
return $tasks;
}

function get_task($id)
{
global $db;
$elm = $db->get_array($db->query("SELECT id, cr_d, user, eml, content, status FROM tasks WHERE id=$id"));
return array("id" => $elm['id'], "cr_d" => $elm['cr_d'], "user" => $elm['user'], "eml" => $elm['eml'], "content" => $elm['content'], "status" => $elm['status']);

}

function task_num()
{
global $db;
$elm = $db->get_array($db->query("SELECT COUNT(*) FROM tasks"));
return $elm[0];
}

function get_status($str)
{
if($str == 'new')
{
$viv = '<label class="badge badge-info">Новое</label>';
}
elseif($str == 'cancel')
{
$viv = '<label class="badge badge-warning">Отменено</label>';
}
elseif($str == 'done')
{
$viv = '<label class="badge badge-success">Завершено</label>';
}
else
{
$viv = '4444';
}
return $viv;
}

function add_task($data)
{
global $db;
$user = $db->safesql($data['user']);
$eml = $db->safesql($data['eml']);
$content = $db->safesql($data['content']);
$status = $db->safesql($data['status']);
$db->query("INSERT INTO tasks (user, eml, content, status) VALUES ('$user', '$eml', '$content', '$status')");
$id = $db->insert_id();
return $id;
}
function edit_task($data)
{
global $db;
$id = $db->safesql($data['id']);
$user = $db->safesql($data['user']);
$eml = $db->safesql($data['eml']);
$content = $db->safesql($data['content']);
$status = $db->safesql($data['status']);
$db->query("UPDATE tasks SET user='$user', eml='$eml', content='$content', status='$status' WHERE id=$id");
}
}
?>