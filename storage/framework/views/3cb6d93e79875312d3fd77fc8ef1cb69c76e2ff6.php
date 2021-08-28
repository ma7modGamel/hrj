

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="singleContent">
    <hr> تقييم العضو
    <a href="<?php echo e(url('users/'.$user->id)); ?>" class="username"> <i class="fa fa-user"> </i> <?php echo e($user->name); ?></a>
    <hr>
    <div class="green">
    	<?php $__currentLoopData = range(1,$user->Rating()->where('type',1)->count()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <i class="fa  fa-thumbs-up"></i>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   	<?php if($user->Rating()->where('type',1)->count()): ?>
        <?php if($user->Rating()->where('type',1)->count() > 9): ?>
        <br> يوجد <?php echo e($user->Rating()->where('type',1)->count()); ?> أعضاء ينصحون بالتعامل معه
    	<?php elseif($user->Rating()->where('type',1)->count() == 1): ?>
        <br> يوجد عضو واحد ينصح بالتعامل معه
    	<?php elseif($user->Rating()->where('type',1)->count() < 10): ?>
        <br> يوجد <?php echo e($user->Rating()->where('type',1)->count()); ?> أعضاء ينصحون بالتعامل معه
        <?php endif; ?>
   	<?php endif; ?>

    </div>
    <br>
   	<?php if($user->Rating()->where('type',0)->count()): ?>
    <div class="red">
    	<?php $__currentLoopData = range(1,$user->Rating()->where('type',0)->count()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <i class="fa  fa-thumbs-down"></i>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($user->Rating()->where('type',0)->count() > 9): ?>
        <br> يوجد <?php echo e($user->Rating()->where('type',0)->count()); ?> أعضاء لا ينصحون بالتعامل معه
    	<?php elseif($user->Rating()->where('type',0)->count() == 1): ?>
        <br> يوجد عضو واحد لا ينصح بالتعامل معه
    	<?php elseif($user->Rating()->where('type',0)->count() < 10): ?>
        <br> يوجد <?php echo e($user->Rating()->where('type',0)->count()); ?> أعضاء لا ينصحون بالتعامل معه
        <?php endif; ?>
    </div>
    <br>
    <?php endif; ?>
    <?php $__currentLoopData = $user->Rating()->where('type',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="ratingbox "><span> تقييم من العضو <a href="<?php echo e(url('users/'.$rate->User->id)); ?>" class="username"><?php echo e($rate->User->name); ?></a> قبل : <?php echo e(timeToStr(strtotime($rate->created_at))); ?> </span>
        <br>
        <br><i class="fa fa-quote-right"></i> <?php echo e($rate->content); ?> <i class="fa fa-quote-left"></i>
        <br>
        <h4 class="green"><i class="fa  fa-thumbs-up"></i>  أنصح بالتعامل   </h4>
    </div>
    <br>
   	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   	<?php if($user->Rating()->where('type',0)->count()): ?>
    <?php $__currentLoopData = $user->Rating()->where('type',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="ratingbox "><span> تقييم من العضو <a href="<?php echo e(url('users/'.$rate->User->id)); ?>" class="username"><?php echo e($rate->User->name); ?></a> قبل : <?php echo e(timeToStr(strtotime($rate->created_at))); ?> </span>
        <br>
        <br><i class="fa fa-quote-right"></i> <?php echo e($rate->content); ?> <i class="fa fa-quote-left"></i>
        <br>
        <h4 class="red"><i class="fa  fa-thumbs-down"></i> لا أنصح بالتعامل   </h4>
        <br>
    </div>
    <br>
   	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   	<?php endif; ?>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/site/ratings/allreviews.blade.php ENDPATH**/ ?>