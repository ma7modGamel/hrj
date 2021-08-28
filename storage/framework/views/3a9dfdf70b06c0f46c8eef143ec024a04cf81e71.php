

<?php $__env->startSection('title'); ?>
المتابعه
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<div class="singleContent">
    <h2>المتابعة</h2> سيتم إشعارك عبر الإشعارات وعبر البريد الإلكتروني عند وجود إعلان جديد عن أي منتج تقوم بمتابعتها.
    <br>
    <br>
    <form id="unfollowBrandForm" enctype="multipart/form-data" style="border: 1px solid #eee;">
    	<?php echo e(csrf_field()); ?>

        <table class="table table-striped" style="margin-bottom: 0!important;">
            <tbody id="unfollowBrandCheck">
                <tr>
                    <th width="5%">اختيار</th>
                    <th>القسم او كلمة البحث</th>
                    <th>تمت المتابعه قبل</th>
                </tr>
                <?php $__currentLoopData = Auth::user()->Brands()->orderBy('created_at','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <input type="checkbox" name="ids[]" value="<?php echo e($brand->id); ?>">
                    </td>
                    <td> <a href="<?php echo e(url('tags/'.$brand->name)); ?>" class="tag"> <?php echo e($brand->name); ?></a></td>
                    <td><?php echo e(timeToStr(strtotime($brand->pivot->created_at))); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="row4" colspan="6" align="center">&nbsp;
                        <input class="btn btn-danger" type="submit" id="unfollowBrand" value="إلغاء متابعة الإعلانات من القائمة المختارة">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <br>





    <br>
    <span id="followedUser"></span>
    <form id="unfollowUserForm" enctype="multipart/form-data">
    	<?php echo e(csrf_field()); ?>

        <table class="table  table-striped">
            <tbody id="unfollowUserCheck">
                <tr>
                    <th width="5%">اختيار</th>
                    <th>المعلن</th>
                </tr>
                <?php $__currentLoopData = Auth::user()->Follows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <input type="checkbox" name="ids[]" value="<?php echo e($user->id); ?>">
                    </td>
                    <td> <a href="<?php echo e(url('users/'.$user->id)); ?>" class="username"> <?php echo e($user->name); ?> </a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="2" align="center">&nbsp;
                        <input class="btn btn-danger" type="submit" id="unfollowUser" value="إلغاء متابعة الاعضاء من القائمة المختارة">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<script type="text/javascript">
	$("#brand option").hide();
	$(document).on("change","#cat_id",function() {
		var value=$(this).val();
		$("#brand option").hide();
		$('#brand').prepend('<option disabled selected value="">أختر نوع المنتج</option>');
		$("#brand").val('');		
		$("#brand option[data-parent=" + value + "]").show();
	});
// follow Brand
$('#followBrand').on('click', function (e) {

	if($('#cat_id').val() == ''){
		alert('أختر ماركة المنتج');
		$('#cat_id').focus();
		return false;
	}

	if($('#brand').val() == null){
		alert('اختر نوع المنتج');
		$('#brand').focus();
		return false;
	}

    e.preventDefault();
    var url     = '<?php echo e(url("followBrand")); ?>',
    	data 	= $('#followBrandForm').serialize();

    $.post(url,data,function (data) {
        if(data == 'attach'){
            $('#followedBrand').append('<div class="alert alert-success"> تمت المتابعة نجاح </div>');
        }else if(data == 'same'){
            $('#followedBrand').append('<div class="alert alert-info"> لقد قمت بمتابعة هذه المنتج من قبل </div>');
        }else{
            toastr.options.timeOut = '6000';
            toastr.options.positionClass = 'toast-bottom-left';
            Command: toastr["error"]("حدث خطأ يرجة المحاوله فى وقت لاحق");
        }
    });
});

// follow Brand
$('#unfollowBrand').on('click', function (e) {
    e.preventDefault();
    var url   	= '<?php echo e(url("unfollowBrand")); ?>',
    	data	= $('#unfollowBrandForm').serialize(),
    	a 		= $(this);
    $.post(url,data,function (data) {
        if(data == 'detach'){
			$('#unfollowBrandCheck input:checked').each(function() {
			    $(this).closest('tr').hide();
			});
            $('#followedBrand').append('<div class="alert alert-success"> تمت إلغاء المتابعه </div>');
        }else if(data == 'empty'){
           alert('فضلا قم بإختيار الماركات المطلوب إلغائها');
        }else{
            toastr.options.timeOut = '6000';
            toastr.options.positionClass = 'toast-bottom-left';
            Command: toastr["error"]("حدث خطأ يرجة المحاوله فى وقت لاحق");
        }
    });
});

// follow Brand
$('#unfollowUser').on('click', function (e) {
    e.preventDefault();
    var url   	= '<?php echo e(url("unfollowUser")); ?>',
    	data	= $('#unfollowUserForm').serialize(),
    	a 		= $(this);
    $.post(url,data,function (data) {
        if(data == 'detach'){
			$('#unfollowUserCheck input:checked').each(function() {
			    $(this).closest('tr').hide();
			});
            $('#followedUser').append('<div class="alert alert-success"> تمت إلغاء المتابعه </div>');
        }else if(data == 'empty'){
           alert('فضلا قم بإختيار العضو المطلوب إلغاء متابعته');
        }else{
            toastr.options.timeOut = '6000';
            toastr.options.positionClass = 'toast-bottom-left';
            Command: toastr["error"]("حدث خطأ يرجة المحاوله فى وقت لاحق");
        }
    });
});



</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/site/posts/follow.blade.php ENDPATH**/ ?>