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
<script src="/admin/moduls/index/js/js_fil2.php"></script>
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