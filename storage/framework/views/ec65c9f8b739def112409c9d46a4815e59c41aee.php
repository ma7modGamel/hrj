<?php $__env->startSection('title'); ?>
    التحكم فى الإتفاقيات
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>

<?php echo HTML::style('public/plugins/sweetAlert/css/sweetalert.css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('megaMenu'); ?>
    <div class="hor-menu hor-menu-light hidden-sm hidden-xs">
        <ul class="nav navbar-nav">
            <!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
            <li class="classic-menu-dropdown active">
                <a>
                    التحكم فى بنود الإتفاقية 
                    <span class="selected"></span>
                </a>
            </li>
            <li class="classic-menu-dropdown">
                <a href="<?php echo e(url('admincp/terms/create')); ?>">إضافة بند جديد</a>
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
                <a>التحكم فى بنود الإتفاقية </a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a href="<?php echo e(url('admincp/terms/create')); ?>">إضافة بند جديد</a>
                <i class="fa fa-angle-left"></i>
            </li>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Main content -->
<!-- Main content -->
<section class="content">
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable-line">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1_1" data-toggle="tab">
                            الصفحة الرئيسية</a>
                    </li>
                </ul>
                <div class="tab-content">
                
                    <div class="tab-pane active fontawesome-demo" id="tab_1_1">
                        <div class="portlet-body">
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <thead>
                                <tr>
                                    <th>م</th>
                                    <th>إسم بند الإتفاقية</th>
                                    <th>الحالة</th>
                                    <th>الأدوات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <tr>
                                        <td><?php echo e($num++); ?></td>
                                        <td><?php echo e($term->title); ?></td>
                                        <td class="text-center">
                                            <?php if($term->active == 1): ?>
                                                <?php echo e(FORM::open(array('method'=>'POST','url'=>'admincp/terms/'.$term->id.'/0'))); ?>

                                                <?php echo e(csrf_field()); ?>                        
                                                <input type="checkbox" name="my-checkbox" onchange="this.form.submit()" checked>
                                                <?php echo e(FORM::close()); ?>

                                            <?php else: ?>
                                                <?php echo e(FORM::open(array('method'=>'POST','url'=>'admincp/terms/'.$term->id.'/1'))); ?>

                                                <?php echo e(csrf_field()); ?>                        
                                                <input type="checkbox" name="my-checkbox" onchange="this.form.submit()">
                                                <?php echo e(FORM::close()); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(url('/admincp/terms/'.$term->id.'/edit')); ?>" class="btn btn-success pull-left"><i class="fa fa-edit"></i> التحكم </a>
                                            <form action="<?php echo e(url('/admincp/terms/'.$term->id.'')); ?>" method="POST" id="form<?php echo e($term->id); ?>">
                                                <?php echo e(csrf_field()); ?> 
                                               <?php echo e(method_field('DELETE')); ?>

                                            </form>
                                             <button  class="button btn btn-danger" onclick="deleteTerm('<?php echo e($term->id); ?>');"><i class="fa fa-trash-o"></i> حذف </button>
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
</section><!-- /.content -->

<?php $__env->stopSection(); ?>
<!-- footer -->
<?php $__env->startSection('footer'); ?>
<?php echo HTML::script('public/plugins/sweetAlert/js/sweetalert.min.js'); ?>

<script type="text/javascript">
    function deleteTerm(id){
    var form = document.getElementById('form'+id) ;
    swal({
        title: "هل انت متأكد؟",
        text: "انت لن تسطيع إسترجاع هذه البيانات مره أخرى !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'نعم , أحذفها !',
        cancelButtonText: 'إلغاء !',
        closeOnConfirm: false
        },
        function (isConfirm) {
        if (isConfirm) {
            form.submit();
        }
 
        });

}


</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harajfp/public_html/resources/views/admin/terms/index.blade.php ENDPATH**/ ?>