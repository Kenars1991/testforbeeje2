<?php
if (!defined("PROMOVERUM")) {
    die('bad request');
}
?>
<?php
$node = new index_node;
$start = $promoverum->get("start",'no');
$num = $promoverum->get("num",'no');
$sort = $promoverum->get("sort",'no');
$srttp = $promoverum->get("srttp",'no');
$tasks = $node->get_tasks($start, $num);
$viv = array();
foreach($tasks as $task)
{
$status = $node->get_status($task['status']);
$viv[]=array("cr_d" => $task['cr_d'], "user" => $task['user'], "eml" => $task['eml'], "content" => $task['content'], "status" => $status); 
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