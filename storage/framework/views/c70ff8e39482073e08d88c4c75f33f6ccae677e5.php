

<?php $__env->startSection('title'); ?>
	تعديل <?php echo e($areas->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('megaMenu'); ?>
		<div class="hor-menu hor-menu-light hidden-sm hidden-xs">
			<ul class="nav navbar-nav">
				<!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
				<li class="classic-menu-dropdown">
					<a href="<?php echo e(url('/admincp')); ?>">
						الرئيسية >
					</a>
				</li>
				<li class="classic-menu-dropdown">
					<a href="<?php echo e(url('/admincp/areas')); ?>">
						الاقسام >
					</a>
				</li>
				<li class="classic-menu-dropdown active">
					<a href="<?php echo e(url('/admincp/areas/'.$areas->id.'/edit')); ?>">
					تعديل القسم / <?php echo e($areas->name); ?>

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
						<a href="<?php echo e(url('/admincp/areas')); ?>">الاقسام</a>
						<i class="fa fa-angle-left"></i>
					</li>
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo e(url('/admincp/areas/'.$areas->id.'/edit')); ?>">تعديل القسم / <?php echo e($areas->name); ?></a>
						<i class="fa fa-angle-left"></i>
					</li>
				</ul>
			</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content">
  <div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
      <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption col-md-9">
                <span>تعديل القسم <?php echo e($areas->name); ?></span>
            </div>
        </div>
        <div class="portlet-body form form-horizontal" role="form">
          <?php echo FORM::model($areas,['route' => ['areas.update' , $areas->id],'method'=> 'PATCH']); ?>

            <?php echo $__env->make('admin.areas.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php echo FORM::close(); ?>

        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<!-- footer -->
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/workox0x/public_html/haraj/resources/views/admin/areas/edit.blade.php ENDPATH**/ ?>