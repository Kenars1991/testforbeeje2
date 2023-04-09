<?php
if (!defined("PROMOVERUM")) {
    die('bad request');
}
?>
<?php
$node = new index_node;
$start = $_GET["start"];
$num = $_GET["num"];
$sort = $_GET["sort"];
$srttp = $_GET["srttp"];
$tasks = $node->get_tasks($start, $num);
$viv = array();
foreach($tasks as $task)
{
$status = $node->get_status($task['status']);
$viv[]=array("id" => $task['id'], "cr_d" => $task['cr_d'], "user" => $task['user'], "eml" => $task['eml'], "content" => $task['content'], "status" => $status); 
}
if($sort !='')
{
$array_name = []; 
foreach ($viv as $key => $row)
{
    $array_name[$key] = $row[$sort];
}
if($srttp == 'ASC')
{	
array_multisort($array_name, SORT_ASC, $viv);
}
elseif($srttp == 'DESC')
{
array_multisort($array_name, SORT_DESC, $viv);
}
}
echo json_encode($viv);
?>