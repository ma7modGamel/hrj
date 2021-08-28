<?php $__env->startSection('content'); ?>
<div class="singleContent verfity container">
    <h3>تأكيد رقم الجوال</h3>
    <hr>
    <?php if(Session::has('successSendActiveCode')): ?>

    <span class="alert alert-success"><?php echo e(Session::get('successSendActiveCode')); ?></span>
    <?php endif; ?>
    <?php if(Session::has('errorActCode')): ?>
        <span class="alert alert-danger"><?php echo e(Session::get('errorActCode')); ?></span>
    <hr>
    <?php endif; ?>
    <form method="POST" action="<?php echo e(url('active/'.$user->id)); ?>">
        <?php echo e(csrf_field()); ?>

        <div class="row">
            <div class="col-md-8">
                <input type="text" class="form-control" name="active" value="<?php echo e(old('email')); ?>" placeholder="أدخل كود التفعيل" required>
            </div>
                        <div class="col-md-2">

            <a class="btn btn-primary" href="<?php echo e(url('ressend/code/'.$user->id)); ?>">أعد إرسال كود التفعيل</a>
                        </div>

            <div class="col-md-2">
                <button name="submit" class="button  btn-success btn-large" type="submit" value="تفعيل">تفعيل</button>
            </div>
        </div>
    </form>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/auth/activeAcc.blade.php ENDPATH**/ ?>