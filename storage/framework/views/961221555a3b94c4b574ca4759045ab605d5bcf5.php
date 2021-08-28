

<?php $__env->startSection('title'); ?>
    الرسائل والطلبات
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
          عرض الرسائل والطلبات 
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
            <a>عرض الرسائل والطلبات</a>
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
        <?php $__currentLoopData = contactType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="<?php if($key == 1): ?> active <?php endif; ?>">
            <a href="#tab_1_<?php echo e($key); ?>" data-toggle="tab">
            <?php echo e($cType); ?>  </a>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="tab-content">
        <?php $__currentLoopData = contactType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="tab-pane <?php if($key == 1): ?> active <?php endif; ?> fontawesome-demo" id="tab_1_<?php echo e($key); ?>">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="bordered">
              <table id="sample_<?php echo e($key); ?>" class="table table-striped table-bordered table-hover table-header-fixed">
                <thead>
                  <tr>
                    <th style="width:20px !important">رقم الرساله</th>
                    <th style="width:30px !important">البريد الإلكترونى</th>
                    <th style="width:150px !important">العنوان</th>
                    <th style="width:300px !important">المحتوى</th>
                    <th>التاريخ</th>
                    <th>الحاله</th>
                    <th>الادوات</th>
                  </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($contact->type == $key): ?>
                  <tr>
                    <td><?php echo e($contact->id); ?></td>
                    <td><?php echo e($contact->email); ?></td>
                    <td><?php echo e(str_limit($contact->subject,40)); ?></td>
                    <td><?php echo e(str_limit($contact->body,90)); ?></td>
                    <td> منذ <?php echo e(timeToStr(strtotime($contact->created_at))); ?></td>
                    <td> <?php if($contact->active == 0): ?> مقرؤة <?php else: ?> غير مقرؤة <?php endif; ?></td>
                    <td>
                      <a href="<?php echo e(url('admincp/contacts/'.$contact->id)); ?>" class="btn btn-success"><i class="fa fa-eye"></i> عرض </a>
                      <a href="<?php echo e(url('admincp/contacts/'.$contact->id)); ?>" data-token="<?php echo e(csrf_token()); ?>" class="btn btn-danger del_msg"><i class="fa fa-trash-o" ></i> حذف </a>
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
  <?php $__currentLoopData = contactType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            search: " بحث برقم الرسالة:",
            zeroRecords: "لا توجد نتائج "
        },
        fixedHeader: {header: !0, headerOffset: a},
        order: [[0, "تصاعدى"]],
        lengthMenu: [[10, 25, 50, 75, -1], [10, 25, 50, 75, "الكل"]],
        pageLength: 10,
        columnDefs: [{ "targets": [1,2,3,4,5,6], "searchable": false },{ "targets": [6], "orderable": false }]
    })
  };
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  return {
      init: function () {
        if (!jQuery().dataTable) {
            return;
        }
        <?php $__currentLoopData = contactType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        initTable<?php echo e($key); ?>();
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      }
  }
}();
jQuery(document).ready(function () {
    TableDatatablesFixedHeader.init()
});

// Delete Messages
$('.del_msg').on('click', function (e) {
    e.preventDefault();
    var url = $(this).attr("href"),token = $(this).data('token'),a=$(this);
    $.post(url,{_method: 'delete', _token :token},function (data) {
      //success data
      a.closest('tr').hide();
      if(data=="empty"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حذف الرساله بنجاح")
        $('#sample_1 tbody').append("<tr class='odd'><td valign='top' colspan='6' class='dataTables_empty'>لا توجد اى بيانات متاحه</td></tr>");
      } else if (data=="done"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حذف الرساله بنجاح")
      } else if (data=="error"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["error"]("لم يتم العثور على الرساله")
      }
    });
});

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/admin/contacts/index.blade.php ENDPATH**/ ?>