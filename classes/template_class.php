<?php
class template
{
var $vivod = '';
var $tamp = '';
function load_template($tpl)
{
$pr=is_file($_SERVER['DOCUMENT_ROOT'].'/tpl/'.$tpl);
if($pr)
{
$file_tpl=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/tpl/'.$tpl);
if( strpos( $file_tpl, "{include file=" ) !== false ) {
			
			$file_tpl = preg_replace( "#\\{include file=['\"](.+?)['\"]\\}#ies", "\$this->load_file('\\1')", $file_tpl );
		
		}
}
else
{
$file_tpl='Не возможно загрузить шаблон';
}
return $file_tpl;
}
function load_file($tpl)
{
			ob_start();
			include $_SERVER['DOCUMENT_ROOT'].'/moduls/'.$tpl;
			return ob_get_clean();
}
}
?>