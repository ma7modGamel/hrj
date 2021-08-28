<div class="form-body">
    <div class="asd">
        <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
            <label class="col-md-3 col-sm-12 control-label">إسم بند الإتفاقية</label>
            <!-- <div class="clearfix"></div> -->
            <div class="col-md-8 col-sm-8 col-xs-8 ">
                <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-file"></i>
                    </span>
                    <?php echo FORM::text("title", null ,['class'=>'form-control']); ?>

                </div>
                <?php if($errors->has('title')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('title')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 col-sm-12 control-label">حالة البند</label>
            <!-- <div class="clearfix"></div> -->
            <div class="col-md-8 col-sm-8 col-xs-8<?php echo e($errors->has('active') ? ' has-error' : ''); ?>">
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
        <label class="col-md-3 col-sm-12 control-label">وصف كامل عن البند</label>
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
<?php /**PATH /home/workox0x/public_html/haraj/resources/views/admin/terms/form.blade.php ENDPATH**/ ?>