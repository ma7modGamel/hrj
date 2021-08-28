

<?php $__env->startSection('title'); ?>
    التحويلات البنكيه
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
          عرض التحويلات البنكيه 
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
            <a>عرض التحويلات البنكيه</a>
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
        <?php $__currentLoopData = transferType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="<?php if($key == 1): ?> active <?php endif; ?>">
            <a href="#tab_1_<?php echo e($key); ?>" data-toggle="tab">
            <?php echo e($cType); ?>  </a>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="tab-content">
        <?php $__currentLoopData = transferType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="tab-pane <?php if($key == 1): ?> active <?php endif; ?> fontawesome-demo" id="tab_1_<?php echo e($key); ?>">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="bordered">
              <table id="sample_<?php echo e($key); ?>" class="table table-striped table-bordered table-hover table-header-fixed">
                <thead>
                  <tr>
                    <th style="width:20px !important">رقم العضو</th>
                    <th style="width:300px !important">إسم العضو</th>
                    <th>المبلغ</th>
                    <th>البنك المحول منه</th>
                    <th> رقم الإعلان</th>
                    <th>وقت التحويل</th>
                    <th>الحاله</th>
                    <th>الادوات</th>
                  </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($transfer->type == $key): ?>
                  <tr>
                    <?php if($transfer->User): ?>
                      <td><?php echo e($transfer->user_id); ?></td>
                      <td><a href="<?php echo e(url('users/'.$transfer->user_id)); ?>"><?php echo e($transfer->User->name); ?></a></td>
                    <?php else: ?>
                      <td>#</td>
                      <td>عضو محظور</td>
                    <?php endif; ?>
                    <td><?php echo e($transfer->amount); ?></td>
                    <td><?php echo e($transfer->Bank ? $transfer->Bank->name : 'غير معرف'); ?></td>
                    <td><?php echo e($transfer->post_id); ?></td>
                    <td><?php echo e(transferDate()[$transfer->date]); ?></td>
                    <td><?php echo e($transfer->done == 1 ? 'مؤكد' : 'لم يتم'); ?></td>
                    <td>
                      <a href="<?php echo e(url('admincp/transfers/'.$transfer->id)); ?>" class="btn btn-success"><i class="fa fa-eye"></i> عرض </a>
                      <a transId = "<?php echo e($transfer->id); ?>" class="btn btn-danger del_trans"><i class="fa fa-trash-o" ></i> حذف </a>
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
  <?php $__currentLoopData = transferType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
      columnDefs: [{ "targets": [0,2,3,4,5,6], "searchable": false },{ "targets": [6], "orderable": false }]
    })
  };
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  return {
    init: function () {
      if (!jQuery().dataTable) {
        return;
      }
      <?php $__currentLoopData = transferType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      initTable<?php echo e($key); ?>();
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    }
  }
}();
jQuery(document).ready(function () {
  TableDatatablesFixedHeader.init()
});

// Delete Messages

$(document).on("click",".del_trans",function() {
  var id = $(this).attr('transId'),a=$(this);
  toastr.options.timeOut = '0';
  toastr.options.extendedTimeOut = '0';
  toastr.options.positionClass = 'toast-bottom-left';
  Command: toastr["error"]("سيتم حذف التحويل !! .. هل انت متأكد ؟<br /><br /><a  href='<?php echo url('admincp/transfers/'); ?>/" +  id + "' data-token='<?php echo e(csrf_token()); ?>' class='btn btn-danger confDel_trans'> نعم -- حذف !!</a>")
  
  $(document).on("click",".confDel_trans",function(e) {
    e.preventDefault();
    var url = $(this).attr("href"),token = $(this).data('token');
    $.post(url,{_method: 'delete', _token :token},function (data) {
      //success data
      a.closest('tr').hide();
      if(data=="empty"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حذف التحويل بنجاح")
        $('#sample_1 tbody').append("<tr class='odd'><td valign='top' colspan='6' class='dataTables_empty'>لا توجد اى بيانات متاحه</td></tr>");
      } else if (data=="done"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حذف التحويل بنجاح")
      } else if (data=="error"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["error"]("لم يتم العثور على التحويل")
      }
    });
  });

});





</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/workox0x/public_html/haraj/resources/views/admin/transfers/index.blade.php ENDPATH**/ ?>