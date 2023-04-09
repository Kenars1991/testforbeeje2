<?php
if (!defined("PROMOVERUM")) {
    die('bad request');
}
?>
<?php
$node = new index_node;

// число постов на одной странице
$num = 3;
// Извлекаем из URL текущую страницу
@$pg = $promoverum->get('pg','no');
// Определяем общее число сообщений в базе данных

$posts = $node->task_num();
// Находим общее число страниц
$total = (($posts - 1) / $num) + 1; 
$total =  intval($total);
// округляем текущую страницу
$pg = intval($pg);
// Если переменная $pg меньше 0 или пуста
// присваиваем $pg 1
// А если значение $page выходит за $total,
// присваиваем $page значение переменной $total
if(empty($pg) or $pg < 0) 
{
$pg = 1;
}
 elseif($pg > $total) 
 {
 $pg = $total;
 }
// Вычисляем начиная с какого номера
// следует выводить сообщения
$start = $pg * $num - $num;

// Проверяем нужна ли стрелки назад
if ($pg != 1) $pervpage = '<a href="javascript:paginate('."'". ($pg - 1) ."'".');" class="btn btn-outline-secondary"><< </a>';
// Проверяем нужны ли стрелки вперед
if ($pg != $total) $nextpage = '<a href="javascript:paginate('."'". ($pg + 1) ."'".');" class="btn btn-outline-secondary"> >></a>';
//'<a href="'.$pagin_url.'pg=' .$total. '">Посл.</a>';

// Находим две ближайшие станицы с обоих краев, если они есть

if($pg - 2 > 0) $page2left = 
' <a href="javascript:paginate('."'". ($pg - 2) ."'".');" class="btn btn-outline-secondary">'. ($pg - 2) .'</a>  ';
if($pg - 1 > 0) $page1left = 
'<a href="javascript:paginate('."'". ($pg - 1) ."'".');" class="btn btn-outline-secondary">'. ($pg - 1) .'</a>  ';

if($pg + 2 <=$total) $page2right = 
'  <a href="javascript:paginate('."'". ($pg + 2) ."'".');" class="btn btn-outline-secondary">'. ($pg + 2) .'</a>';
if($pg + 1 <=$total) $page1right = 
' <a href="javascript:paginate('."'". ($pg + 1) ."'".');" class="btn btn-outline-secondary">'. ($pg + 1) .'</a>';
if($posts<$num)
{
$paginator=$pervpage.$page2left.$page1left.'<span  ></span>'.$page1right.$page2right.$nextpage;
}
else
{
$paginator=$pervpage.$page2left.$page1left.'<a href="#" class="btn btn-dark">'.$pg.'</a>'.$page1right.$page2right.$nextpage;
}
$viv = array("start" => $start, "num" => $num, "paginator" => $paginator);
echo json_encode($viv);
?>