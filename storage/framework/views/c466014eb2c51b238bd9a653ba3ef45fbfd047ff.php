<?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<li class="carModel"><a data-id="<?php echo e($cat->id); ?>" href="<?php echo e(url('tags/'.$cat->id)); ?>" class="tagTab"><?php echo e($cat->name); ?></a></li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/workox0x/public_html/haraj/resources/views/site/ajaxData/getIndexCatAjaX.blade.php ENDPATH**/ ?>