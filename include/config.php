<?php
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);
define('SITE_URL','https://test.komfortmaster.com/');
define('WEB_URL','https://test.komfortmaster.com');
define('SMS_API_KEY','8E96EB68-A162-D0E2-2B87-76129C32F4F6');
define('PUSH_CHANNEL_ID', '5596');
define('PUSH_API_ID', 'df7343d0a5562a0d5c2d6af041dc4715');
$login=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/include/inc/login.txt');
define('SISTEM_LOGIN', $login);
$pass=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/include/inc/pass.txt');
define('SISTEM_PASS', $pass);
$ajax_kew=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/include/inc/ajax_key.txt');
?>