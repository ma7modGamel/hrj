

<?php $__env->startSection('title'); ?>
	رسائل الأعضاء
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <!-- DataTables -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <?php echo HTML::style('public/admin/global/plugins/datatables/datatables.min.css'); ?>

    <?php echo HTML::style('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css'); ?>

    <!-- END PAGE LEVEL STYLES -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('MegaMenu'); ?>
		<div class="hor-menu hor-menu-light hidden-sm hidden-xs">
			<ul class="nav navbar-nav">
				<!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
				<li class="classic-menu-dropdown active">
					<a href="<?php echo e(url('/admin/meassages')); ?>"> رسائل الأعضاء
					 <span class="selected">
					</span>
					</a>
				</li>
			</ul>
		</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageHeader'); ?>
			<div class="page-bar hidden-md hidden-lg">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo e(url('/admin')); ?>">الرئيسية</a>
						<i class="fa fa-angle-left"></i>
					</li>
          <li>
            <i class="fa fa-home"></i>
            <a>رسائل الاعضاء</a>
          </li>
				</ul>
			</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Main content -->
<section class="content">
  <!-- BEGIN PAGE CONTENT-->
  <div class="row">
    <div class="col-md-12">
      <div class="tabbable-line">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#tab_1_1" data-toggle="tab"> عرض الرسائل </a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active fontawesome-demo" id="tab_1_1">
            <div class="portlet-body">
              <table id="sample_1" class="table table-striped table-bordered table-hover table-header-fixed">
                <thead>
                  <tr>
                    <th>إسم الراسل</th>
                    <th>المرسل إليه</th>
                    <th style="width:370px !important">المحتوى</th>
                    <th>الحاله</th>
                    <th>التاريخ</th>
                    <th>الادوات</th>
                  </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <?php if($msg->User): ?>
                    <td><a href="<?php echo e(url('users/'.$msg->user_id)); ?>"><?php echo e($msg->User->name); ?></a></td>
                    <?php else: ?>
                    <td>عضو محظور</td>
                    <?php endif; ?>
                    <?php if($msg->UserTo): ?>
                    <td><a href="<?php echo e(url('users/'.$msg->user_to)); ?>"><?php echo e($msg->UserTo->name); ?></a></td>
                    <?php else: ?>
                    <td>عضو محظور</td>
                    <?php endif; ?>
                    <td><?php echo e(str_limit($msg->body,100)); ?></td>
                    <td> <?php if($msg->status == 0): ?> مقرؤة <?php else: ?> غير مقرؤة <?php endif; ?></td>
                    <td> منذ <?php echo e(timeToStr(strtotime($msg->created_at))); ?></td>
                    <td>
                      <a href="<?php echo e(url('admincp/messages/'.$msg->id)); ?>" class="btn btn-info show_msg"><i class="fa fa-eye"></i> عرض </a>
                      <?php if(\App\Message::find($msg->id)): ?>
                      <a class="btn btn-warning softMsg" href="<?php echo e(url('admincp/messages/'.$msg->id.'/delete')); ?>" data-token="<?php echo e(csrf_token()); ?>"><i class="fa fa-eye-slash"></i> إخفاء </a>
                      <?php else: ?>
                      <a class="btn btn-success softMsg" href="<?php echo e(url('admincp/messages/'.$msg->id.'/restore')); ?>" data-token="<?php echo e(csrf_token()); ?>"><i class="fa fa-undo"></i> إسترجاع </a>
                      <?php endif; ?>
                      <a class="btn btn-danger softMsg" href="<?php echo e(url('admincp/messages/'.$msg->id.'/forceDelete')); ?>"><i class="fa fa-trash-o"></i> حذف نهائى </a>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END PAGE CONTENT-->


<!-- show message Modal-->
    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="id"> عرض الرساله</h4>
                </div>
                <div class="modal-body" id="body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- End Modal -->

<?php $__env->stopSection(); ?>

<!-- footer -->
<!-- footer -->
<?php $__env->startSection('footer'); ?>

  <!-- DataTables -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <?php echo HTML::script('public/admin/global/scripts/datatable.js'); ?>

  <?php echo HTML::script('public/admin/global/plugins/datatables/datatables.min.js'); ?>

  <?php echo HTML::script('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'); ?>

  <!-- END PAGE LEVEL PLUGINS -->
<script type="text/javascript">

var TableDatatablesFixedHeader = function () {
  var e = function () {
      var e = $("#sample_1"), a = 0;
      App.getViewPort().width < App.getResponsiveBreakpoint("md") ? $(".page-header").hasClass("page-header-fixed-mobile") && (a = $(".page-header").outerHeight(!0)) : $(".page-header").hasClass("navbar-fixed-top") ? a = $(".page-header").outerHeight(!0) : $("body").hasClass("page-header-fixed") && (a = 64);
      e.dataTable({
          language: {
              aria: {
                  sortAscending: ": ترتيب تصاعدى",
                  sortDescending: ": ترتيب تنازلى"
              },
              emptyTable: "لا توجد اى بيانات متاحه",
              info: "إظهار _START_ إلى _END_ من _TOTAL_ حقل",
              infoEmpty: "لا توجد حقول",
              infoFiltered: "( الإجمالى _MAX_ حقل )",
              lengthMenu: "عدد الحقول : _MENU_",
              search: " بحث بإسم العضو:",
              zeroRecords: "لا توجد نتائج "
          },
          fixedHeader: {header: !0, headerOffset: a},
          order: false,
          lengthMenu: [[10, 20, 30, 50, -1], [10, 20, 30, 50, "الكل"]],
          pageLength: 10,
          columnDefs: [{ "targets": [1,2,3,4,5], "searchable": false },{ "targets": [5], "orderable": false }]
      })
  };
  return {
      init: function () {
          jQuery().dataTable && (e())
      }
  }
}();
jQuery(document).ready(function () {
    TableDatatablesFixedHeader.init()
});

// Delete Messages
$('.softMsg').on('click', function (e) {
    e.preventDefault();
    var url = $(this).attr("href"),a=$(this);
    $.get(url,function (data) {
      //success data
      if(a.hasClass('btn-danger')){
        a.closest('tr').hide();
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حذف الرساله بنجاح")
      }
      if(data=="empty"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حذف الرساله بنجاح")
        $('#sample_1 tbody').append("<tr class='odd'><td valign='top' colspan='6' class='dataTables_empty'>لا توجد اى بيانات متاحه</td></tr>");
      } else if (data=="hide"){
        a.html('<i class="fa fa-undo"></i> إسترجاع');
        a.removeClass('btn-warning').addClass('btn-success');
        newUrl = url.replace('delete','restore');
        a.attr('href',newUrl);
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم إخفاء الرساله بنجاح")
      } else if (data=="restore"){
        a.html('<i class="fa fa-eye-slash"></i> إخفاء');
        a.removeClass('btn-success').addClass('btn-warning');
        newUrl = url.replace('restore','delete');
        a.attr('href',newUrl);
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم إسترجاع الرساله بنجاح")
      } else if (data=="error"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["error"]("لم يتم العثور على الرساله")
      }
    });
});

// Show Message
$(document).on("click",".show_msg",function(e) {
  e.preventDefault();
  var url = $(this).attr("href");
  $.get(url, function (data) {
      //success data
      $('#body').empty().append(data.body);
      $('#basic').modal('show');
    return false;
  });
});

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/admin/messages/index.blade.php ENDPATH**/ ?>