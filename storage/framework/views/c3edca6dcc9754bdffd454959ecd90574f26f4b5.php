    <?php echo e(csrf_field()); ?>

    <div class="form-body">
        <div class="form-group<?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
            <?php if(isset($id)): ?>
            <label class="col-md-3 control-label">اسم المنطقه</label>
            <?php else: ?>
            <label class="col-md-3 control-label">اسم الدولة</label>
            <?php endif; ?>
            <div class="col-md-8">
               <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                    </span>
                    <?php if(isset($id)): ?>
                        <?php echo FORM::text("parent_id", $id ,['class'=>'hidden']); ?>

                    <?php elseif(isset($areas->parent_id)): ?>
                        <?php echo FORM::text("parent_id", $areas->parent_id ,['class'=>'hidden']); ?>

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
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn green"> تنفيذ </button>
                </div>
            </div>
        </div>
    </div>
<?php /**PATH /home/taathleeth/public_html/resources/views/admin/areas/form.blade.php ENDPATH**/ ?>