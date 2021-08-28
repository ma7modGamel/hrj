

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <div class="container">
    <br>
        <?php if(!empty($errors->all())): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger">
                <?php echo e($error); ?><br>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>
        <?php if(session()->has('success')): ?>
            <div class="alert alert-warning">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <h3 style="text-align: center; color:#0473c0">اتصل بنا</h3>
        <form action="<?php echo e(route('contact-us')); ?>" method="post">
            <div class="form-group">
                <label>اسم المستخدم : </label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>الايميل : </label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label> رقم الجوال : </label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label> نوع الرساله  : </label>
                <select name="contact" class="form-control">
                    <option value="1">  رسالة </option>
                    <option value="2"> مخالفات الإعلانات </option>
                    <option value="3">تطوير مواقع  </option>

                    <option value="11">دعم فني </option>
                    <option value="12">استفسار  </option>
                    <option value="13"> شكوي</option>
                </select>
            </div>
            <div class="form-group">
                <label> الرساله   : </label>
                <textarea class="form-control" name="descrption"></textarea>
            </div>
            <div class="form-group">
                <input class="btn btn-secondary" type="submit" value="ارسال">
            </div>
        </form>

    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>








<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/site/pages/contact.blade.php ENDPATH**/ ?>