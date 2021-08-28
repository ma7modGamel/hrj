<div class="form-body">
    <div class="form-group<?php echo e($errors->has('type') ? ' has-error' : ''); ?>">
        <label class="col-md-3 col-sm-12 control-label">مكان الصفحة</label>
        <!-- <div class="clearfix"></div> -->
        <div class="col-md-8 col-sm-8 col-xs-8 ">
            <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-file"></i>
                </span>
                <?php echo FORM::select("type",parentPages(),null,['class'=>'form-control']); ?>

            </div>
            <?php if($errors->has('type')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('type')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="asd">
        <div class="form-group<?php echo e($errors->has('pName') ? ' has-error' : ''); ?>">
            <label class="col-md-3 col-sm-12 control-label">إسم الصفحة</label>
            <!-- <div class="clearfix"></div> -->
            <div class="col-md-8 col-sm-8 col-xs-8 ">
                <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-file"></i>
                    </span>
                    <?php echo FORM::text("pName", null ,['class'=>'form-control']); ?>

                </div>
                <?php if($errors->has('pName')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('pName')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 col-sm-12 control-label">اسم رابط الصفحه</label>
            <!-- <div class="clearfix"></div> -->
            <div class="col-md-3 col-sm-8 col-xs-8<?php echo e($errors->has('pLink') ? ' has-error' : ''); ?>">
                <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-file"></i>
                    </span>
                    <?php echo FORM::text("pLink", null ,['class'=>'form-control']); ?>

                </div>
                <?php if($errors->has('pLink')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('pLink')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <label class="col-md-2 col-sm-12 control-label">حالة الصفحة</label>
            <!-- <div class="clearfix"></div> -->
            <div class="col-md-3 col-sm-8 col-xs-8<?php echo e($errors->has('active') ? ' has-error' : ''); ?>">
                <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-file"></i>
                    </span>
                    <?php echo FORM::select("active", ['1'=>'مفعله','0'=>'غير مفعله'] ,null ,['class'=>'form-control']); ?>

                </div>
                <?php if($errors->has('active')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('active')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('content') ? ' has-error' : ''); ?>">
        <label class="col-md-3 col-sm-12 control-label">المحتوى</label>
        <!-- <div class="clearfix"></div> -->
        <div class="col-md-8 col-sm-8 col-xs-8 ">
            <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-user"></i>
                </span>
                <?php echo FORM::textarea("content", null ,['class'=>'form-control']); ?>

            </div>
            <script>
                CKEDITOR.replace( 'content', {
                    language: 'ar'
                } );
            </script>
            <?php if($errors->has('content')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('content')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-8">
                <button type="submit" class="btn green"> تنفيذ</button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/taathleeth/public_html/resources/views/admin/pages/form.blade.php ENDPATH**/ ?>