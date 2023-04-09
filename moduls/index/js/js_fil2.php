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