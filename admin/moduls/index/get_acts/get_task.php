<?php
if (!defined("PROMOVERUM")) {
    die('bad request');
}
?>
<?php
$id = $_GET['id'];
$node = new index_node;
$task = $node->get_task($id);
echo json_encode($task);
?>