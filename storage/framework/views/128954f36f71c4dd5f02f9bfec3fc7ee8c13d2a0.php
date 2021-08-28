<?php $__env->startSection('title'); ?>
التعديل على الإعلان
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="add-3" id="storePost">
	<br>
	<div class="singleContent">
		<h3> »  تعديل إعلان</h3>
		<br>
		<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('edit/'.$post->id)); ?>" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>   
			<label>عنوان الإعلان:</label>
			<br>
			<input class="form-control" type="text" placeholder="" value="<?php echo e($post->title); ?>" name="title">
			<hr>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="country" id="country">
						<option value="#">أختر الدولة</option>
						<?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($area->parent_id == 0): ?>
						<option <?php echo e($areas->find($post->area_id)->parent_id == $area->id ? 'selected' : ''); ?> value="<?php echo e($area->id); ?>"><?php echo e($area->name); ?></option>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>

					

				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="area_id" id="area_id">
						<?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($area->parent_id != 0): ?>
						<option <?php echo e($area->id == $post->area_id ? 'selected' : ''); ?> data-parent="<?php echo e($area->parent_id); ?>" value="<?php echo e($area->id); ?>"><?php echo e($area->name); ?></option>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="area_id" id="area_idCopy">
						<?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($area->parent_id != 0): ?>
						<option <?php echo e($area->id == $post->area_id ? 'selected' : ''); ?> data-parent="<?php echo e($area->parent_id); ?>" value="<?php echo e($area->id); ?>"><?php echo e($area->name); ?></option>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>

			</div>
			<hr>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<input type="hidden" value="<?php echo e($cats->find($post->cat_id)->parent_id); ?>" name="mainCat">
					<select class="form-control" name="cat_id" id="cat_id">
						<option value="#">اختر القسم المناسب</option>
						<?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($cat->parent_id == $cats->find($post->cat_id)->parent_id): ?>
						<option <?php echo e($post->cat_id == $cat->id ? 'selected' : ''); ?> value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
				<?php if($cats->find($post->cat_id)->parent_id == 1): ?>
				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="brand" id="brand">
						<option value="#">اختر القسم المناسب</option>
						<?php $__currentLoopData = $cats->where('parent_id','!=',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($cats->find($cat->id)->parent_id == 1): ?>
						<option <?php echo e($cat->id == $post->brand ? 'selected' : ''); ?> data-parent="<?php echo e($cat->parent_id); ?>" value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
				
					
						
						
						
						
						
						
					
				
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="model" id="model">
						<?php $__currentLoopData = array_reverse(modelYear()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option <?php echo e($year == $post->model ? 'selected' : ''); ?> value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
				<?php endif; ?>
			</div>
			<div class="clearfix">
			</div>
			<hr>
			<label>
				وسيلة الإتصال:
			</label>
			<br>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<input class="form-control" type="text" placeholder="أكتب رقم جوالك هنا" name="contact" value="<?php echo e($post->contact); ?>">
				</div>
				<div class="col-xs-12 col-md-6">
					<input class="form-control" type="text" name="price" value="<?php echo e($post->price); ?>">
				</div>
			</div>
			<hr>
			<label>
				نص الإعلان:
			</label>
			<br>
			<textarea rows="9" placeholder="اكتب تفاصيل الإعلان هنا" class="form-control" name="body"><?php echo e($post->body); ?></textarea>
			<br>
			<span class="label label-default">
				الإعلان غير مكتمل التفاصيل سيتم حذفه.
			</span>
			<br>
			<br>
			<div class="tagFilters">
				<div>
					<span class="button  btn-info fileinput-button">
						<i class="fa fa-camera-retro"></i>
						<span> إضافة صور ...</span>
						<input id="fileupload" type="file" name="image[]" multiple="">
					</span>
				</div>
			</div>
								<input type="hidden" value="image" name="uplode">

			<br>
			<button type="submit" id="editPostSubmitBtn" class="button  btn-lg btn-success">إرسال التعديل »</button>
		</form>
		<br>
		<br>
		<div class="row">
		<?php $__currentLoopData = \App\UpImage::where('type','posts')->where('post_id',$post->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="col-xs-12 col-md-2">
			<a class="delPostImg" data-token="<?php echo e(csrf_token()); ?>" href="<?php echo e(url('images/'.$image->id)); ?>">×</a>
			<?php if($image->type_way == 'video'): ?>
			<img class="img-responsive img-block" src="data:image/png;base64,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">
			<?php else: ?>
			<img class="img-responsive img-block" src="<?php echo e(image_check($image->img_name,'posts')); ?>">
			<?php endif; ?>
			<hr />
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script type="text/javascript">
	$(document).on("click","#editPostSubmitBtn",function(e) {
		var done = true;
		$('input[type=text]').each(function(){
		    if($(this).val() == ""){
		    	alert('فضلا أكمل بيانات الإعلان');
		    	$(this).focus();
    			e.preventDefault();
    			return done = false;
		    }
			$('select').each(function(){
			    if($(this).val() == "#" || $(this).val() == null){
			    	alert('فضلا ' + $(this).find("option:first-child").text());
			    	$(this).focus();
	    			e.preventDefault();
	    			return done = false;
			    }
			    if($('textarea').val() == ""){
				    alert('فضلا أكمل بيانات الإعلان');
				    $('textarea').focus();
	    			e.preventDefault();
	    			return done = false;			
				}
				return done;			
			});
			return done;
		});
		return done;
	});

	$("#area_idCopy").hide();
	$("#brandCopy").hide();
	$(document).on("change","#country",function() {
		var value=$(this).val();
		// $("#area_id").show();
		// $("#area_id option").hide();
		$("#area_id").html(' ');
		$('#area_id').append('<option disabled selected value="#">أختر المحافظه</option>');
		$('#area_id').append($("#area_idCopy option[data-parent=" + value + "]"));
		// $("#area_idCopy option[data-parent=" + value + "]").show();
	});

	// $(document).on("change","#cat_id",function() {
	// 	var value=$(this).val();
	// 	$("#model").val('#');
	// 	$("#model").hide();
	// 	$("#brand").show();
	// 	$("#brand").html(' ');
	// 	$('#brand').append('<option disabled selected value="#">أختر نوع السياره</option>');
	// 	$("#brand").val('#');
	// 	$('#brand').append($("#brandCopy option[data-parent=" + value + "]"));
	// });

	$(document).on("change","#brand",function() {
		var value=$(this).val();
		$("#model").show();
		$("#model").val('#');
		$('#model').prepend('<option disabled selected value="#">أختر موديل السياره</option>');
	});
// Delete Image
$('.delPostImg').on('click', function (e) {
    e.preventDefault();
    var url = $(this).attr("href"),token = $(this).data('token'),a=$(this);
    $.post(url,{_method: 'delete', _token :token},function (data) {
      //success data
      a.closest('div').hide();
      toastr.options.timeOut = '6000';
      toastr.options.positionClass = 'toast-bottom-left';
      Command: toastr["info"]("تم الحذف بنجاح")
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/site/posts/edit.blade.php ENDPATH**/ ?>