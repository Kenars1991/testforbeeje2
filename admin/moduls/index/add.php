<?php
if (!defined("PROMOVERUM")) {
    die('bad request');
}
?>

<?php
if (!defined("PROMOVERUM_WEB")) {
    die('bad request');
}
?>
<link href="/vendors/base/sweetalert2.min.css" rel="stylesheet">
<script src="/vendors/base/rightsweetalert2.js"></script>
<script>
function save()
{
var user = encodeURIComponent(document.getElementById('user').value)
var eml = encodeURIComponent(document.getElementById('eml').value)
var content = encodeURIComponent(document.getElementById('content').value)
$.post( "ajax.php?mod=index&f=post_acts", 'tip=add&user='+user+'&eml='+eml+'&content='+content, function( data ) {
if(data == 'ok')
{
Swal.fire({
  title: 'Новое задание',
  html: 'Успешно добавлено!!',
  icon: 'info',
  showCancelButton: false,
  confirmButtonText: 'OK',
  cancelButtonText: 'No, not delete!'
}).then((result) => {
  if (result.isConfirmed) {
location.href='/'
  }
})
}
else if(data != 'ok')
{
Swal.fire({
  title: 'Внимание!!!',
  html: data,
  icon: 'info',
  showCancelButton: false,
  confirmButtonText: 'OK',
  cancelButtonText: 'No, not delete!'
}).then((result) => {
  if (result.isConfirmed) {
location.href=location.href
  }
})
}	
	});
}
</script>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Добавление нового задания</p>
<center><table border="0" width="369" height="252">
	<tr>
		<td height="23" width="130">Имя пользователя</td>
		<td height="23" width="223"><input type="text" id="user" style="width:100%"></td>
	</tr>
	<tr>
		<td height="17" width="130">E-mail</td>
		<td height="17" width="223"><input type="text" id="eml" style="width:100%"></td>
	</tr>
	<tr>
		<td height="168" width="130">Текст</td>
		<td height="168" width="223"><textarea id="content" style="width:100%;height:100%"></textarea></td>
	</tr>
		<tr>
		<td height="20" width="369" colspan="2" align="right"></td>
	</tr>
	<tr>
		<td height="20" width="369" colspan="2"><a href="javascript:save();" class="btn btn-inverse-primary btn-fw">добавить</a></td>
	</tr>
</table></center>
                </div>
              </div>
            </div>
          </div>