

<?php $__env->startSection('title'); ?>
إرسال رساله
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="singleContent container" id="sendMsgDiv">
	<hr>
	<form class="form-inline" style="border: 1px solid #eee;">
		<table class="table  tableMsg table-borderedAds tableextra">
			<tbody><tr>
				<th>
					إرسال رسالة خاصة
				</th>
			</tr>
			<tr>
				<td>
					<div class="form-group">
						مستلم الرسالة:<br><i class="fa fa-user"></i> <?php echo e(\App\User::find($user_to)->name); ?>

					</div>
				</td>
			</tr>
			<tr>
				<td>
					نص الرسالة:
                    <?php if(isset($_GET['ad_Id'])): ?>
                    <br><textarea name="body" rows="12" cols="150" class="form-control">بخصوص إعلانك رقم <?php echo e($_GET['ad_Id']); ?></textarea>
                    <?php else: ?>
					<br><textarea name="body" rows="12" cols="150" class="form-control"></textarea>
                    <?php endif; ?>
                    <input name="user_id" type="hidden" value="<?php echo e($user_id); ?>">
					<input name="user_to" type="hidden" value="<?php echo e($user_to); ?>">
					<br>
					<button type="submit" id="sendMsg" data-token="<?php echo e(csrf_token()); ?>" class="btn-primary" name="submit" value="ارسال">إرســـال <i class="fa fa-send"></i> </button>
				</td>			
			</tr>
		</tbody></table>
	</form>
</div>

<?php $__env->stopSection(); ?>

<!-- footer -->
<?php $__env->startSection('footer'); ?>
<script type="text/javascript">
// follow Post
$('#sendMsg').on('click', function (e) {
    e.preventDefault();
    var url     = '<?php echo e(url("sendMsg/".$user_to)); ?>',
        token   = $(this).data('token'),
        msgBody = $(this).prevAll('textarea[name="body"]').val(),
        user_id = $(this).prevAll('input[name="user_id"]').val(),
        user_to = $(this).prevAll('input[name="user_to"]').val(),
        a=$(this);
        
    if(msgBody == ""){
    	alert('فضلا قم بكتابة نص');
    	$(this).prevAll('textarea[name="body"]').focus();
    	return false;
    }
    $.post(url,{_method: 'post',
    			 _token 	:token,
    			 body 		:msgBody,
    			 user_id 	:user_id,
    			 user_to 	:user_to
    			},function (data) {
        if(data != 'error'){
            $('#sendMsgDiv').empty();
            $('#sendMsgDiv').append('<div class="alert alert-success"> تم إرسال الرسالة </div>');
            <?php if(isset($_GET['ad_Id'])): ?>    
            $('#sendMsgDiv').append('<a href="<?php echo e(url("ads/".$_GET["ad_Id"])); ?>">العودة إلى الإعلان</a>'); 
            <?php else: ?>
            $('#sendMsgDiv').append('<a href="<?php echo e(url("users/".$user_to)); ?>">العودة إلى لصفحة العضو</a>'); 
            <?php endif; ?>      
        }else{
            toastr.options.timeOut = '6000';
            toastr.options.positionClass = 'toast-bottom-left';
            Command: toastr["error"]("حدث خطأ يرجة المحاوله فى وقت لاحق");
        }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/workox0x/public_html/haraj/resources/views/site/messages/send.blade.php ENDPATH**/ ?>