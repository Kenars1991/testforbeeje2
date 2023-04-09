<?php
if (!defined("PROMOVERUM")) {
    die('bad request');
}
?>
<?php
$funct = new index_funct;
$all = $funct->num_tasks();
$new = $funct->num_tasks('new');
$cancel = $funct->num_tasks('cancel');
$done = $funct->num_tasks('done');
echo json_encode(array("all" => $all, "new" => $new, "cancel" => $cancel, "done" => $done));
?>