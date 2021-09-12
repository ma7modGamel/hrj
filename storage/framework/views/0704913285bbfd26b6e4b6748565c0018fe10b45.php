

<?php $__env->startSection('title'); ?>
المغضله
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="body">
    <div class="col-md-3">
    </div>
    <div class="col-md-9">
<?php $num = 0; ?>
<?php $__currentLoopData = Auth::user()->Posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="adv-1 <?php echo e($num % 2 != 0 ? '' : 'adv-3'); ?>">
            <div class="row">
                <div class="col-md-9">
                    <h3><a href="<?php echo e(url('ads/'.$post->id.'/'.editTitle($post->title))); ?>"><?php echo e($post->title); ?></a></h3>
                    <div class="text">
                        <span class="pull-right">
                            <i class="fa  fa-2x addlike  favad fa-heart followPost" data-id="<?php echo e($post->id); ?>" data-token="<?php echo e(csrf_token()); ?>" style="cursor: pointer;"></i>
                            <br>
                            <a href="<?php echo e(url('city/'.$post->Area->name)); ?>"><i class="fa fa-map-marker"></i>  <?php echo e($post->Area->name); ?></a>
                        </span>
                        <span class="pull-left">
                            <a href="<?php echo e(url('ads/'.$post->id.'/'.editTitle($post->title))); ?>">قبل <?php echo e(timeToStr(strtotime($post->created_at))); ?></a><br>
                            <a href="<?php echo e(url('users/'.$post->User->id)); ?>"><i class="fa fa-user"></i> <?php echo e($post->User->name); ?></a>

                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <a href="<?php echo e(url('ads/'.$post->id.'/'.editTitle($post->title))); ?>"><img src="<?php echo e(image_check_thumps(\App\UpImage::where('post_id',$post->id)->where('type','posts')->pluck('img_name')->first(),'posts')); ?>" title="<?php echo e($post->title); ?>"></a>
                </div>
            </div>
        </div>
<?php $num++; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<script type="text/javascript">
// follow Post
$('.followPost').on('click', function (e) {
    e.preventDefault();
    var url     = '<?php echo e(url("followPost")); ?>',
        token   = $(this).data('token'),
        post_id = $(this).data('id'),
        status  = 0,
        a=$(this);
    $.post(url,{_method: 'post', _token :token,post_id :post_id,status :status},function (data) {
        if (data == 'detach'){
            a.closest('.adv-1').hide();            
        }else{
            toastr.options.timeOut = '6000';
            toastr.options.positionClass = 'toast-bottom-left';
            Command: toastr["error"]("حدث خطأ يرجة المحاوله فى وقت لاحق");
        }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harajfp/public_html/resources/views/site/posts/fav.blade.php ENDPATH**/ ?>