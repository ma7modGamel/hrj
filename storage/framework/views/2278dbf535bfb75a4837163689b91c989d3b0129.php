<?php $__env->startSection('title'); ?>
	إعدادت الموقع
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<!-- BEGIN PAGE LEVEL STYLES -->
<?php echo HTML::style('public/admin/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css'); ?>

<?php echo HTML::style('public/admin/global/plugins/jquery-file-upload/css/jquery.fileupload.css'); ?>

<?php echo HTML::style('public/admin/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css'); ?>

<!-- END PAGE LEVEL STYLES -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('megaMenu'); ?>
<div class="hor-menu hidden-sm hidden-xs">
    <ul class="nav navbar-nav">
        <!-- DOC: Remove data-hover="megamenu-dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
        <li class="classic-menu-dropdown" aria-haspopup="true">
            <a href="<?php echo e(url('/admincp')); ?>"> رئيسية لوحة التحكم
            </a>
        </li>
        <li class="mega-menu-dropdown active" aria-haspopup="true">
            <a> إعدادت الموقع
                <span class="selected"> </span>
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
            <a>إعدادت الموقع</a>
          </li>
		</ul>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Main content -->
<section class="content">
  	<div class="row">
    	<div class="col-md-12 ">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        	<div class="portlet box red">
          		<div class="portlet-title">
          			<div class="caption col-md-9">
          				تعديل إعددات الموقع 
          			</div>
          			<div class="tools">
            			<a href="javascript:;" class="collapse"></a>
          			</div>
          		</div>
          		<div class="portlet-body">
		            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/admincp/settings')); ?>" enctype="multipart/form-data">
		            <?php echo e(csrf_field()); ?>

		            <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              <div class="form-group<?php echo e($errors->has('$setting->name') ? ' has-error' : ''); ?>">
		                  <label class="col-md-2 control-label"><?php echo e($setting->slug); ?></label>
		                  <div class="col-md-9">
		                     <div class="input-group">
		                          <span class="input-group-addon">
		                          <i class="icon-settings"></i>
		                          </span>
		                          <?php if($setting->type == 0): ?>
		                          	<?php echo FORM::text($setting->name, $setting->value ,['class'=>'form-control','required']); ?>

		                          <?php elseif($setting->type == 1): ?>
										<span class="btn default blue-stripe fileinput-button form-control">
			                        <?php if($setting->name != null): ?>
			                        	<img src="<?php echo e(url('public/upload/logo/'.$setting->value)); ?>" width="100" height="20">
			                        <?php else: ?>
			                        	<img src="<?php echo e(url('public/upload/logo/no_image.png')); ?>" width="100" height="20">
			                        <?php endif; ?>
										<i class="fa fa-plus"></i>
										<span>أختر الملف ... </span>
			                          		<?php echo FORM::file($setting->name, array('multiple'=>false)); ?>

										</span>
		                          <?php elseif($setting->type == 2): ?>
		                          	<?php echo FORM::textarea($setting->name, $setting->value ,['class'=>'form-control','required']); ?>

		                          <?php elseif($setting->type == 3): ?>
		                          	<?php echo FORM::select("$setting->name",['0'=>'مغلق','1'=>'مفتوح'],$setting->value,['class'=>'form-control','required']); ?>

		                          <?php endif; ?>
		                      </div>
		                      <?php if($errors->has('$setting->name')): ?>
		                          <span class="help-block">
		                              <strong><?php echo e($errors->first('$setting->name')); ?></strong>
		                          </span>
		                      <?php endif; ?>
		                  </div>
		              </div>
		            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		              <div class="form-actions">
		                  <div class="row">
		                      <div class="col-md-offset-3 col-md-9">
		                        <button type="submit" class="btn green">حفظ الإعدادات
		                          <i class="fa fa-save"></i>
		                        </button>
		                      </div>
		                  </div>
		              </div>
		            </form>
            	</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->



<?php $__env->stopSection(); ?>

<!-- footer -->
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harajfp/public_html/resources/views/admin/settings/index.blade.php ENDPATH**/ ?>