

<?php $__env->startSection('title'); ?>
    تقيمات الأعضاء
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <!-- DataTables -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <?php echo HTML::style('public/admin/global/plugins/datatables/datatables.min.css'); ?>

    <?php echo HTML::style('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css'); ?>

    <!-- END PAGE LEVEL STYLES -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('megaMenu'); ?>
    <div class="hor-menu hor-menu-light hidden-sm hidden-xs">
      <ul class="nav navbar-nav">
        <!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
        <li class="classic-menu-dropdown" aria-haspopup="true">
            <a href="<?php echo e(url('admincp')); ?>"> رئيسية لوحة التحكم
                <i class="fa fa-angle-left"></i>
            </a>
        </li>
        <li class="classic-menu-dropdown active">
          <a>
          عرض تقيمات الأعضاء 
          <span class="selected"></span>
          <i class="fa fa-angle-down"></i>
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
            <a href="<?php echo e(url('/admincp')); ?>">الرئيسية</a>
            <i class="fa fa-angle-left"></i>
          </li>
          <li>
            <i class="fa fa-home"></i>
            <a>عرض تقيمات الأعضاء</a>
            <i class="fa fa-angle-down"></i>
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
        <?php $__currentLoopData = ratingType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="<?php if($key == 1): ?> active <?php endif; ?>">
            <a href="#tab_1_<?php echo e($key); ?>" data-toggle="tab">
            <?php echo e($cType); ?>  </a>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="tab-content">
        <?php $__currentLoopData = ratingType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="tab-pane <?php if($key == 1): ?> active <?php endif; ?> fontawesome-demo" id="tab_1_<?php echo e($key); ?>">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="bordered">
              <table id="sample_<?php echo e($key); ?>" class="table table-striped table-bordered table-hover table-header-fixed">
                <thead>
                  <tr>
                    <th>رقم التقييم</th>
                    <th>قام بالتقيم</th>
                    <th>العضو المقيم</th>
                    <th style="width:300px !important">الملاحظات</th>
                    <th>رقم الإعلان</th>
                    <th>التاريخ</th>
                    <th>الادوات</th>
                  </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($rating->type == $key): ?>
                  <tr>
                    <td><?php echo e($rating->id); ?></td>
                    <td><a href="<?php echo e(url('users/'.$rating->user_id)); ?>" target="_blank"><?php echo e($rating->User ? $rating->User->name : 'عضو محظور'); ?></a></td>
                    <td><a href="<?php echo e(url('users/'.$rating->rate_id)); ?>" target="_blank"><?php echo e($rating->rateUser ? $rating->rateUser->name : 'عضو محظور'); ?></a></td>
                    <td><?php echo e(str_limit($rating->content,80)); ?></td>
                    <td><?php echo e($rating->post_id); ?></td>
                    <td> منذ <?php echo e(timeToStr(strtotime($rating->created_at))); ?></td>
                    <td>
                      <a href="<?php echo e(url('admincp/ratings/'.$rating->id)); ?>" class="btn btn-info show_rate"><i class="fa fa-eye"></i> عرض </a>
                      <a href="<?php echo e(url('admincp/ratings/'.$rating->id)); ?>" data-token="<?php echo e(csrf_token()); ?>" class="btn btn-danger del_rate"><i class="fa fa-trash-o" ></i> حذف </a>
                    </td>
                  </tr>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <h4 class="modal-title" id="id"> عرض ملاحظات التقيم</h4>
                </div>
                  <div class="modal-body" id="buyDate"></div>
                  <br>
                  <div class="modal-body"> الملاحظات المرسله :</div> 
                  <div class="modal-body" id="body"></div>
                  <br>
                  <br>
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
<?php $__env->startSection('footer'); ?>

  <!-- DataTables -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <?php echo HTML::script('public/admin/global/scripts/datatable.js'); ?>

  <?php echo HTML::script('public/admin/global/plugins/datatables/datatables.min.js'); ?>

  <?php echo HTML::script('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'); ?>

  <!-- END PAGE LEVEL PLUGINS -->
<script type="text/javascript">

var TableDatatablesFixedHeader = function () {
  <?php $__currentLoopData = ratingType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  var initTable<?php echo e($key); ?> = function () {
    var e = $("#sample_<?php echo e($key); ?>"), a = 0;
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
        lengthMenu: [[10, 25, 50, 75, -1], [10, 25, 50, 75, "الكل"]],
        pageLength: 10,
        columnDefs: [{ "targets": [0,2,3,4,5], "searchable": false },{ "targets": [5], "orderable": false }]
    })
  };
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  return {
      init: function () {
        if (!jQuery().dataTable) {
            return;
        }
        <?php $__currentLoopData = ratingType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        initTable<?php echo e($key); ?>();
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      }
  }
}();
jQuery(document).ready(function () {
    TableDatatablesFixedHeader.init()
});

// Delete Messages
$('.del_rate').on('click', function (e) {
    e.preventDefault();
    var url = $(this).attr("href"),token = $(this).data('token'),a=$(this);
    $.post(url,{_method: 'delete', _token :token},function (data) {
      //success data
      a.closest('tr').hide();
      if(data=="empty"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حذف التقيم بنجاح")
        $('#sample_1 tbody').append("<tr class='odd'><td valign='top' colspan='6' class='dataTables_empty'>لا توجد اى بيانات متاحه</td></tr>");
      } else if (data=="done"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حذف التقيم بنجاح")
      } else if (data=="error"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["error"]("لم يتم العثور على التقيم")
      }
    });
});
// Show Message
$(document).on("click",".show_rate",function(e) {
  e.preventDefault();
  var url = $(this).attr("href");
  $.get(url, function (data) {
      //success data
      $('#body').empty().append(data.content);
      $('#buyDate').empty().append("تاريخ البيع او التعامل : " + data.buy_date);
      $('#basic').modal('show');
    return false;
  });
});

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/admin/ratings/index.blade.php ENDPATH**/ ?>