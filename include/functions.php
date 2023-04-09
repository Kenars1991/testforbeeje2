<?php
class promoverum
{
function get($nam, $html)
{
	$str = $_GET[$nam];
	if($html == 'no')
	{
	$str = htmlspecialchars($str);
	}
	elseif($html == 'yes')
	{
	$str = quotemeta($str);
	}
	else
	{
	return 'error';
	}
return $str;
}
function post($nam, $html)
{
	$str = $_POST[$nam];
	if($html == 'no')
	{
	$str = htmlspecialchars($str);
	}
	elseif($html == 'yes')
	{
	$str = quotemeta($str);
	}
	else
	{
	return 'error';
	}
return $str;
}
function session($nam, $html)
{
	$str = $_SESSION[$nam];
	if($html == 'no')
	{
	$str = htmlspecialchars($str);
	}
	elseif($html == 'yes')
	{
	$str = quotemeta($str);
	}
	else
	{
	return 'error';
	}
return $str;
}
function set_session($key,$val)
{
$key = quotemeta($key);
$val = quotemeta($val);
$_SESSION[$key] = $val;
return true;
}
}
?>