(function($) {
"use strict"
var gl_sort = ''
var gl_tip = ''
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
tabl_st += '<tr><td>'+tmp_val[i].user+'</td><td>'+tmp_val[i].eml+'</td><td>'+tmp_val[i].content+'</td><td>'+tmp_val[i].status+'</td></tr>'
}
tabl_st = '<table class="table table-hover"><thead><tr><th>Имя пользователя<a href="javascript:paginate('+"'"+pg+"'"+','+"'"+'user'+"'"+','+"'"+'ASC'+"'"+')"><i class="ti-arrow-down"></i></a><a href="javascript:paginate('+"'"+pg+"'"+','+"'"+'user'+"'"+','+"'"+'DESC'+"'"+')"><i class="ti-arrow-up"></i></a></th><th>Email<a href="javascript:paginate('+"'"+pg+"'"+','+"'"+'eml'+"'"+','+"'"+'ASC'+"'"+')"><i class="ti-arrow-down"></i></a><a href="javascript:paginate('+"'"+pg+"'"+','+"'"+'eml'+"'"+','+"'"+'DESC'+"'"+')"><i class="ti-arrow-up"></i></a></th><th>Текст задачи<a href="javascript:paginate('+"'"+pg+"'"+','+"'"+'content'+"'"+','+"'"+'ASC'+"'"+')"><i class="ti-arrow-down"></i></a><a href="javascript:paginate('+"'"+pg+"'"+','+"'"+'content'+"'"+','+"'"+'DESC'+"'"+')"><i class="ti-arrow-up"></i></a></th><th>Статус<a href="javascript:paginate('+"'"+pg+"'"+','+"'"+'status'+"'"+','+"'"+'ASC'+"'"+')"><i class="ti-arrow-down"></i></a><a href="javascript:paginate('+"'"+pg+"'"+','+"'"+'status'+"'"+','+"'"+'DESC'+"'"+')"><i class="ti-arrow-up"></i></a></th></tr></thead><tbody>'+tabl_st+'</tbody></table>'
document.getElementById('tasks_table').innerHTML = tabl_st
document.getElementById('paginator').innerHTML = paginator	
	});
	
		 });
}
window.paginate = paginate
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