<?php $__env->startSection('title'); ?>
    تعديل بند  -  <?php echo e($term->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('megaMenu'); ?>
    <div class="hor-menu hor-menu-light hidden-sm hidden-xs">
        <ul class="nav navbar-nav">
            <li class="classic-menu-dropdown">
                <a href="<?php echo e(url('/admincp/terms')); ?>">
                    بنود الإتفاقية >
                </a>
            </li>
            <li class="classic-menu-dropdown active">
                <a href="<?php echo e(url('/admincp/terms/'.$term->id.'/edit')); ?>">
                    تعديل بند - <?php echo e($term->title); ?>

                    <span class="selected"></span>
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
                <a href="<?php echo e(url('/admincp/terms')); ?>">بنود الإتفاقية</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a href="<?php echo e(url('/admincp/terms/'.$term->id.'/edit')); ?>">تعديل البند <?php echo e($term->title); ?></a>
                <i class="fa fa-angle-left"></i>
            </li>
        </ul>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable-line">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1_1" data-toggle="tab">
                            تعديل البيانات </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active fontawesome-demo" id="tab_1_1">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption col-md-9">
                                    تعديل البند
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <?php echo FORM::model($term ,['route'=> ['terms.update',$term->id],'method' => 'PATCH', 'files'=>'true','class'=>'form-horizontal']); ?>

                                <?php echo $__env->make('admin.terms.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo FORM::close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
<?php $__env->stopSection(); ?>

<!-- footer -->
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harajfp/public_html/resources/views/admin/terms/edit.blade.php ENDPATH**/ ?>