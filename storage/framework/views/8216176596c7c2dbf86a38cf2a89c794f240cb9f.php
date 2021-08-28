<?php $__env->startSection('title'); ?>
    التحكم بالمناطق
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>

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
                <?php if(isset($id)): ?>
                <a href="<?php echo e(url('admincp/areas')); ?>">
                    الدول والمناطق <span class="selected">
                <?php else: ?>
                <a>
                    الدول والمناطق <span class="selected">
                <?php endif; ?>
                    </span>
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
            <li class="classic-menu-dropdown">
                <?php if(isset($id)): ?>
                <a data-target="#addArea" data-toggle="modal">إضافة منطقه جديده
                <?php else: ?>
                <a data-target="#addArea" data-toggle="modal">إضافة دولة جديده
                <?php endif; ?>
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
                <a>الأقسام</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a data-target="#addArea" data-toggle="modal">إضافة منطقه جديده</a>
                <i class="fa fa-angle-left"></i>
            </li>
        </ul>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.areas.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption col-md-9">
                            <?php if(isset($id)): ?>
                            <span><i class="icon-map"></i> عرض المناطق</span>
                            <?php else: ?>
                            <span><i class="icon-map"></i> عرض الدول</span>
                            <?php endif; ?>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                            <tr>
                                <th>
                                    م
                                </th>
                                <th>
                                    المنطقه
                                </th>
                                <th>
                                    الأدوات
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($id)): ?>
                                    <?php if($area->parent_id == $id): ?>
                                        <tr>
                                            <td><?php echo e($num++); ?></td>
                                            <td><a href="<?php echo e(url('admincp/areas/'.$area->id)); ?>"><?php echo e($area->name); ?></a></td>
                                            <td>
                                                <a href="<?php echo e(url('/admincp/areas/'.$area->id.'/edit')); ?>"
                                                   class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                                            <a class="btn btn-danger delArea" bankId="<?php echo e($area->id); ?>" data-token="<?php echo e(csrf_token()); ?>"><i class="fa fa-trash-o"></i> حذف </a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php elseif($area->parent_id == 0): ?>
                                    <tr>
                                        <td><?php echo e($num++); ?></td>
                                        <td><a href="<?php echo e(url('admincp/areas/'.$area->id)); ?>"><?php echo e($area->name); ?></a></td>
                                        <td>
                                            <a href="<?php echo e(url('/admincp/areas/'.$area->id.'/edit')); ?>" class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                                            <a class="btn btn-danger delArea" bankId="<?php echo e($area->id); ?>" data-token="<?php echo e(csrf_token()); ?>"><i class="fa fa-trash-o"></i> حذف </a>

                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->

<?php $__env->stopSection(); ?>

<!-- footer -->
<?php $__env->startSection('footer'); ?>
<script type="text/javascript">

<?php if(count($errors)): ?>
  $('#addArea').modal()
<?php endif; ?>
$(document).on("click",".delArea",function() {
var a=$(this);
  var token = $(this).data('token'),
  id = $(this).attr('bankId'),
  route = "<?php echo url('admincp/areas'); ?>" + "/" + id;
  $.ajax({
      url:route,
      type: 'post',
      data: {_method: 'delete', _token :token},
      success:function(data){
        a.closest('tr').hide();
        if(data=="empty"){
          toastr.options.timeOut = '6000';
          toastr.options.positionClass = 'toast-bottom-left';
          Command: toastr["info"]("تم حذف المنطقة بنجاح -- القاائمة الآن فارغة")
          $('.portlet-body').append("<div class='alert alert-info'><center> قائمة البنوك فارغه </center></div>");
        } else if (data=="done"){
          toastr.options.timeOut = '6000';
          toastr.options.positionClass = 'toast-bottom-left';
          Command: toastr["success"]("تم حذف المنطقة بنجاح")
        }
      } 
  });
});


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/admin/areas/index.blade.php ENDPATH**/ ?>