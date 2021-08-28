    <?php echo e(csrf_field()); ?>

    <div class="form-body">
        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
            <label class="col-md-2 control-label">إسم البنك</label>
            <div class="col-md-9">
               <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-question-circle"></i>
                    </span>
                    <?php echo FORM::text("name", null ,['class'=>'form-control']); ?>

                </div>
                <?php if($errors->has('name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group<?php echo e($errors->has('u_name') ? ' has-error' : ''); ?>">
            <label class="col-md-2 control-label">إسم الحساب</label>
            <div class="col-md-9">
               <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-question-circle"></i>
                    </span>
                    <?php echo FORM::text("u_name", null ,['class'=>'form-control']); ?>

                </div>
                <?php if($errors->has('u_name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('u_name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group<?php echo e($errors->has('acc_num') ? ' has-error' : ''); ?>">
            <label class="col-md-2 control-label">رقم الحساب</label>
            <div class="col-md-9">
               <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-question-circle"></i>
                    </span>
                    <?php echo FORM::text("acc_num", null ,['class'=>'form-control']); ?>

                </div>
                <?php if($errors->has('acc_num')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('acc_num')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group<?php echo e($errors->has('iban') ? ' has-error' : ''); ?>">
            <label class="col-md-2 control-label">IBAN</label>
            <div class="col-md-9">
               <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-question-circle"></i>
                    </span>
                    <?php echo FORM::text("iban", null ,['class'=>'form-control']); ?>

                </div>
                <?php if($errors->has('iban')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('iban')); ?></strong>
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
<?php /**PATH /home/taathleeth/public_html/resources/views/admin/banks/form.blade.php ENDPATH**/ ?>