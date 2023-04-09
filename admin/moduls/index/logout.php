<?php
if (!defined("PROMOVERUM")) {
    die('bad request');
}
?>
<?php
	$promoverum->set_session('tip','');
	$promoverum->set_session('ID','');
echo 'Выход выполнен успешно<meta http-equiv="refresh" content="0; url='.SITE_URL.'">';
?>