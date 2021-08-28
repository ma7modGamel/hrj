

<?php $__env->startSection('title'); ?>
آخر الردود
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="singleContent">
    <h4>آخر ردود العضو </h4>
    <a href="<?php echo e(url('users/'.$user->id)); ?>" class="username"><?php echo e($user->name); ?></a>
    <br>
    <br>
    <?php $__currentLoopData = $user->Cmnt->take(40); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cmnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="comment ">
        <div class=" commentHeader">
            ›› على الإعلان
            <?php if($cmnt->Post): ?>
            <a href="<?php echo e(url('ads/'.$cmnt->Post->id.'/'.$cmnt->Post->title)); ?>"><?php echo e($cmnt->Post->title); ?></a>
            <?php else: ?>
                'تم حذف الإعلان'
            <?php endif; ?>
            <br>
            <br> قبل <?php echo e(timeToStr(strtotime($cmnt->created_at))); ?>

        </div>
        <div class="commentBody">
            <?php echo e($cmnt->body); ?>

        </div>
    </div>
    <div class="clearfix"></div>
    <br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/site/users/comments.blade.php ENDPATH**/ ?>