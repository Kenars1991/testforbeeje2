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
<script>
(function($) {
"use strict"
function paginate(pg,sort='',tip='')
{
$.get( "ajax.php?mod=index&f=get_acts&tip=paginator&pg="+pg, '', function( data ) {
var tmp_val = JSON.parse(data)
var start = tmp_val.start
var num = tmp_val.num
var paginator = tmp_val.paginator
$.get( "ajax.php?mod=index&f=get_acts&tip=get_tasks&start="+start+'&num='+num+'&sort='+sort+'&srttp='+tip, '', function( data2 ) {
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
</script>
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Всего</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><span id="tasks_all"></span></h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Новые</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><span id="tasks_new"></span></h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Выполнено</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><span id="tasks_done"></span></h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Отменено</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><span id="tasks_cancel"></span></h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Задания</p>
                  <div class="table-responsive">
				  <div id="tasks_table">

					</div>
                        <center><div class="btn-group" id="paginator" role="group" aria-label="Basic example">

                        </div></center>
                  </div>
                </div>
              </div>
            </div>
          </div>