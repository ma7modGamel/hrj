

<?php $__env->startSection('title'); ?>
تحديث الإعلان
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<br>
<div class="singlePage" style="border: 1px solid #eee; width: 80%;margin: 0 auto;" >
	<table class="table  tableMsg table-borderedAds tableextra">
		<th colspan='50' scobe='row'><center>تحديث الإعلان</center></th>
		<tbody>
			<tr>
				<?php if($done): ?>
				<td class="cat" align="center">&nbsp;
					<div class="alert  alert-success">
						تم تحديث الإعلان بنجاح
					</div>
				</td>
				<?php else: ?>
				<td class="cat" align="center">&nbsp;
					<div class="alert  alert-warning">
						عزيزي المعلن،
						لايمكن تحديث الإعلان اليوم بسبب وجود تحديث سابق خلال أقل من <?php echo e(getSettings('adsUpdatedAt')); ?>  أيام.نرجو التحديث بعد مرور <?php echo e(getSettings('adsUpdatedAt')); ?> أيام على آخر تحديث للإعلان وشكرا
						<br>
						<br>
						آخر تحديث للإعلان كان قبل 
						<?php echo e(timeToStr(strtotime($post->updated_at))); ?>

					</div>
				</td>
				<?php endif; ?>
			</tr>
		</tbody>
		<th colspan='50' scobe='row'><center><a href="<?php echo e(url('ads/'.$post->id.'/'.($post->title))); ?>">العودة للإعلان</a></center></th>
	</table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/site/posts/updated_at.blade.php ENDPATH**/ ?>