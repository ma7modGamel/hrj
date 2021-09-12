

<?php $__env->startSection('title'); ?>
	إضافة صفحة جديده
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('megaMenu'); ?>
		<div class="hor-menu hor-menu-light hidden-sm hidden-xs">
			<ul class="nav navbar-nav">
				<!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
				<li class="classic-menu-dropdown">
					<a href="<?php echo e(url('/admincp/pages')); ?>">
						التحكم ف الصفحات
					</a>
				</li>
				<li class="classic-menu-dropdown active">
					<a href="#">
					إضافة صفحة جديده
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
						<a href="<?php echo e(url('/admincp/pages')); ?>">الصفحات</a>
						<i class="fa fa-angle-left"></i>
					</li>
					<li>
						<i class="fa fa-home"></i>
						<a href="#">إضافة صفحة جديده</a>
						<i class="fa fa-angle-left"></i>
					</li>
				</ul>
			</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('content'); ?>

      <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-md-12">
          <div class="tabbable-line">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#tab_1_1" data-toggle="tab">
                إضافة صفحة جديده </a>
              </li>
            </ul>
            <div class="tab-content">
              	<div class="tab-pane active fontawesome-demo" id="tab_1_1">
                	<div class="portlet box blue">
                  		<div class="portlet-title">
              				<div class="caption col-md-9">
              				إضافة صفحة جديده
              				</div>
                  		</div>
              			<div class="portlet-body">
		                    <form class="form-horizontal" role="form" method="post" action="<?php echo e(url('/admincp/pages')); ?>" enctype="multipart/form-data" >
		                      	<?php echo e(csrf_field()); ?>

		          				<?php echo $__env->make('admin.pages.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			                </form>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harajfp/public_html/resources/views/admin/pages/add.blade.php ENDPATH**/ ?>