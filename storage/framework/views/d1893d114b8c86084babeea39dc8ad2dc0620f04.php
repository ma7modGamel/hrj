<?php $__env->startSection('title'); ?>
	تعديل القسم <?php echo e($cats->name); ?>

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
	                <a>
	                    الأقسام <span class="selected">
	                    </span>
	                    <i class="fa fa-angle-left"></i>
	                </a>
	            </li>
				<li class="classic-menu-dropdown active">
					<a href="<?php echo e(url('/admincp/cats/'.$cats->id.'/edit')); ?>">
					تعديل القسم / <?php echo e($cats->name); ?>

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
						<a href="<?php echo e(url('/admincp/cats')); ?>">الاقسام</a>
						<i class="fa fa-angle-left"></i>
					</li>
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo e(url('/admincp/cats/'.$cats->id.'/edit')); ?>">تعديل القسم / <?php echo e($cats->name); ?></a>
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
                <span>تعديل القسم <?php echo e($cats->name); ?></span>
            </div>
        </div>
        <div class="portlet-body form form-horizontal" role="form">
          <?php echo FORM::model($cats,['route' => ['cats.update' , $cats->id],'method'=> 'PATCH','files' => true ]); ?>




<?php echo e(csrf_field()); ?>

<div class="form-body">
    <div class="form-group<?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
        <label class="col-md-2 control-label">اسم القسم</label>
        <div class="col-md-9">
           <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-map-marker"></i>
                </span>
                <?php if(isset($id)): ?>
                    <?php echo FORM::text("parent_id", $id ,['class'=>'hidden']); ?>

                <?php elseif(isset($cats->parent_id)): ?>
                    <?php echo FORM::text("parent_id", $cats->parent_id ,['class'=>'hidden']); ?>

                <?php else: ?>
                    <?php echo FORM::text("parent_id", 0 ,['class'=>'hidden']); ?>

                <?php endif; ?>
                <?php echo FORM::text("name", null ,['class'=>'form-control']); ?>

            </div>
            <?php if($errors->has('name')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>

       
            
            
                    <div class="form-group<?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <label class="col-md-2 control-label">اختر القسم الرئيسي</label>
                        <div class="col-md-9">
                           <div class="input-group">
                                <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                                </span>
                <select name="parent_id" class="form-control">  
                

<?php
$mainCats = \App\Cat::where('parent_id',null)->pluck('id');
$subOfSubCat = \App\Cat::whereNotIn('parent_id',$mainCats)->pluck('id');
?>

               <option value="">الأقسام الرئيسية</option>

 <?php $__currentLoopData = \App\Cat::orderBy('parent_id','asc')->whereNotIn('id',$subOfSubCat)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        

                     <?php if($cats->parent_id == $category->id ): ?>
<option selected value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                     <?php elseif($category->parent_id == $category->id ): ?>
<option selected value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
<?php else: ?> 
<option  value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>

<?php endif; ?>
                     


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </select>
            </div>
            <?php if($errors->has('parent_id')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('parent_id')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    
  
    <div class="form-group<?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
        <label class="col-md-2 control-label">لوجو القسم</label>
        <div class="col-md-9">
            <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-envelope-o"></i>
                </span>
                <input type="file" name="image" id="image" class="form-control">
            </div>
    
        </div>
    </div>


    

    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn green"> تنفيذ </button>
            </div>
        </div>
    </div>
</div>









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


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harajfp/public_html/resources/views/admin/cats/edit.blade.php ENDPATH**/ ?>