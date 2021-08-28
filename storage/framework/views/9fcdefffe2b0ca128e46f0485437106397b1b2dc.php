<?php $__env->startSection('content'); ?>
<div class="singleContent rest-password">
    <h3>إستعادة أسم المستخدم وكلمة المرور</h3>
    <hr>
    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
    <form method="POST" action="<?php echo e(route('password.email')); ?>">
        <?php echo e(csrf_field()); ?>

        <div class="row">
            <div class="col-md-8">
                <input id="email" type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="ادخل بريدك أو رقم الجوال" required>
            </div>
            <!-- <input type="text" name="email" placeholder="ادخل جوالك او بريدك"> -->
            <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
            <div class="col-md-4">
                <button name="submit" class="button  btn-success btn-large" type="submit" value="الحصول على الرقم السري">الحصول على الرقم السري</button>
            </div>
        </div>
    </form>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harajfp/public_html/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>