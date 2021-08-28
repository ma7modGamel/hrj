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
        
        
<?php if(count((array)$cats) == 1): ?>

                     <?php if($category->parent_id == $category->id ): ?>
<option selected value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
<?php else: ?> 
<option  value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>

<?php endif; ?>
                     
            
<?php else: ?>
<option value="<?php echo e($category->id); ?>"> <?php echo e($category->name); ?> </option>
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
<?php /**PATH /home/taathleeth/public_html/resources/views/admin/cats/form.blade.php ENDPATH**/ ?>