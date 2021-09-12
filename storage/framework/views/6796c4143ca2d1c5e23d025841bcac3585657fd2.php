

<?php $__env->startSection('title'); ?>
    تغير الصورة الشخصيه
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
   <style>
       .image{
           position: relative;
           right: 45%;
       }
   </style>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12 ">
            <h3 style="text-align: center">تغير الصورة الشخصيه </h3>

        </div>

    </div>
    <div class="col-md-2 image">
<?php if(!empty(\Auth::user()->image)): ?>
    <!-- Trigger the modal with a button -->
        
        <a href="#" id="myBtn">
            <img src="<?php echo e(!empty(\Auth::user()->image)?asset('public').'/'.\Auth::user()->image:''); ?>" class="img-responsive img-thumbnail img-circle" id="user" style="width:130px;height: 130px;">
        </a>
    <?php endif; ?>
</div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harajfp/public_html/resources/views/site/users/changimage.blade.php ENDPATH**/ ?>