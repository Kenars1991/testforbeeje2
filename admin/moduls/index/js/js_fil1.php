(function($) {
"use strict"
var gl_sort = ''
var gl_tip = ''
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
function ame()
{
toastr["info"]("Проверка", "Внимание")
}
window.ame = ame
function paginate(pg,sort='',tip='')
{
		if(sort != '' && tip != '')
	{
	gl_sort = sort
	gl_tip = tip
	}
$.get( "ajax.php?mod=index&f=get_acts&tip=paginator&pg="+pg, '', function( data ) {
var tmp_val = JSON.parse(data)
var start = tmp_val.start
var num = tmp_val.num
var paginator = tmp_val.paginator
$.get( "ajax.php?mod=index&f=get_acts&tip=get_tasks&start="+start+'&num='+num+'&sort='+gl_sort+'&srttp='+gl_tip, '', function( data2 ) {
var tabl_st = ''
var tmp_val = JSON.parse(data2)	
for(let i=0; i<tmp_val.length; i++)
{
tabl_st += '<tr id="task_node_'+tmp_val[i].id+'"><td id="task_node_'+tmp_val[i].id+'_user_area">'+tmp_val[i].user+'</td><td id="task_node_'+tmp_val[i].id+'_eml_area">'+tmp_val[i].eml+'</td><td id="task_node_'+tmp_val[i].id+'_content_area">'+tmp_val[i].content+'</td><td id="task_node_'+tmp_val[i].id+'_status_area">'+tmp_val[i].status+'</td><td id="task_node_'+tmp_val[i].id+'_edit_area"><a href="javascript:edit('+"'"+tmp_val[i].id+"'"+')">редактировать</a></td></tr>'
}
tabl_st = '<table class="table table-hover"><thead><tr><th>Имя пользователя<a href="javascript:paginate('+"'"+pg+"'"+','+"'"+'user'+"'"+','+"'"+'ASC'+"'"+')"><i class="ti-arrow-down"></i></a><a href="javascript:paginate('+"'"+pg+"'"+','+"'"+'user'+"'"+','+"'"+'DESC'+"'"+')"><i class="ti-arrow-up"></i></a></th><th>Email<a href="javascript:paginate('+"'"+pg+"'"+','+"'"+'eml'+"'"+','+"'"+'ASC'+"'"+')"><i class="ti-arrow-down"></i></a><a href="javascript:paginate('+"'"+pg+"'"+','+"'"+'eml'+"'"+','+"'"+'DESC'+"'"+')"><i class="ti-arrow-up"></i></a></th><th>Текст задачи<a href="javascript:paginate('+"'"+pg+"'"+','+"'"+'content'+"'"+','+"'"+'ASC'+"'"+')"><i class="ti-arrow-down"></i></a><a href="javascript:paginate('+"'"+pg+"'"+','+"'"+'content'+"'"+','+"'"+'DESC'+"'"+')"><i class="ti-arrow-up"></i></a></th><th>Статус<a href="javascript:paginate('+"'"+pg+"'"+','+"'"+'status'+"'"+','+"'"+'ASC'+"'"+')"><i class="ti-arrow-down"></i></a><a href="javascript:paginate('+"'"+pg+"'"+','+"'"+'status'+"'"+','+"'"+'DESC'+"'"+')"><i class="ti-arrow-up"></i></a></th><th>редактировать</th></tr></thead><tbody>'+tabl_st+'</tbody></table>'
document.getElementById('tasks_table').innerHTML = tabl_st
document.getElementById('paginator').innerHTML = paginator	
	});
	
		 });
}
function get_status(st)
{
if(st == 'new')
{
return 'новое'
}
else if(st == 'cancel')
{
return 'Отменено';
}
else if(st == 'done')
{
return 'Завершено';
}
}
function get_status2(st)
{
if(st == 'new')
{
return '<label class="badge badge-info">Новое</label>'
}
else if(st == 'cancel')
{
return '<label class="badge badge-warning">Отменено</label>';
}
else if(st == 'done')
{
return '<label class="badge badge-success">Завершено</label>';
}
}
window.get_status2 = get_status2
window.paginate = paginate
function edit(id)
{
var status_arr = ['new', 'cancel', 'done'];
$.get( "ajax.php?mod=index&f=get_acts&tip=get_task&id="+id, '', function( data ) {
var task = JSON.parse(data)
var select_st = ''
for(var i=0; i<status_arr.length; i++)
{
if(status_arr[i] == task.status)
{
select_st += '<option value='+status_arr[i]+' selected>'+get_status(status_arr[i])+'</option>'
}
else if(status_arr[i] != task.status)
{
select_st += '<option value='+status_arr[i]+'>'+get_status(status_arr[i])+'</option>'
}
}
document.getElementById('task_node_'+id+'_user_area').innerHTML = '<input type="text" id="task_node_'+id+'_user_input_area" value="'+task.user+'">'
document.getElementById('task_node_'+id+'_eml_area').innerHTML = '<input type="text" id="task_node_'+id+'_eml_input_area" value="'+task.eml+'">'
document.getElementById('task_node_'+id+'_content_area').innerHTML = '<textarea id="task_node_'+id+'_content_input_area">'+task.content+'</textarea>'
document.getElementById('task_node_'+id+'_status_area').innerHTML = '<select id="task_node_'+id+'_status_select_area">'+select_st+'</select>'
document.getElementById('task_node_'+id+'_edit_area').innerHTML = '<a href="javascript:edit_act('+"'"+id+"'"+')">задать</a>'
			 });
	
}
window.edit = edit
function edit_act(id)
{
var user = encodeURIComponent(document.getElementById('task_node_'+id+'_user_input_area').value)
var eml = encodeURIComponent(document.getElementById('task_node_'+id+'_eml_input_area').value)
var content = encodeURIComponent(document.getElementById('task_node_'+id+'_content_input_area').value)
var status = encodeURIComponent(document.getElementById('task_node_'+id+'_status_select_area').value)
$.post( "ajax.php?mod=index&f=post_acts", 'tip=edit&id='+id+'&user='+user+'&eml='+eml+'&content='+content+'&status='+status, function( data ) {
	if(data == 'ok')
	{
$.get( "ajax.php?mod=index&f=get_acts&tip=get_task&id="+id, '', function( data ) {
var task = JSON.parse(data)
document.getElementById('task_node_'+id+'_user_area').innerHTML = task.user
document.getElementById('task_node_'+id+'_eml_area').innerHTML = task.eml
document.getElementById('task_node_'+id+'_content_area').innerHTML = task.content
document.getElementById('task_node_'+id+'_status_area').innerHTML = get_status2(task.status)
document.getElementById('task_node_'+id+'_edit_area').innerHTML = '<a href="javascript:edit('+"'"+id+"'"+')">редактировать</a>'	
toastr["info"]("Успешно изменено!!!", "Задание")
});	
	}
	else if(data != 'ok')
	{
toastr["error"](data, "Внимание")	
	}
});
}
window.edit_act = edit_act
$( document ).ready(function() {
$.get( "ajax.php?mod=index&f=get_acts&tip=num_tasks", '', function( data ) {
var num = JSON.parse(data)
document.getElementById('tasks_all').innerHTML = num.all
document.getElementById('tasks_new').innerHTML = num.new
document.getElementById('tasks_cancel').innerHTML = num.cancel
document.getElementById('tasks_done').innerHTML = num.done
paginate('')	
	});
	});
})(jQuery);