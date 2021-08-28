

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<div class="more search_page">
    
    <div class="">
        <?php if(\App\Page::where('pLink',$pageName)->count()): ?>
        <?php echo \App\Page::where('pLink',$pageName)->first()->content; ?>

        <?php else: ?>
        <script type="text/javascript">
            url = "<?php echo e(Request::root()); ?>"+"/404";
            window.location = url;
        </script>
        <?php endif; ?>
    </div>
</div>
</div>
<br />
<br />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>








<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/site/pages/page.blade.php ENDPATH**/ ?>