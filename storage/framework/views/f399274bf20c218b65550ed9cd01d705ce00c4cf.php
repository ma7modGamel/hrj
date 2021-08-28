<?php $__env->startSection('title'); ?>
إضافة إعلان جديد في سوق الدولى
<?php $__env->stopSection(); ?>

<?php if(count($errors)): ?>
<?php echo e(dd($errors)); ?>

<?php endif; ?>
<?php $__env->startSection('header'); ?>
<?php echo HTML::style('public/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('site.posts.addPostNotes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="add-3 container" id="storePost">
	<br>
	<?php if(session()->has('succss')): ?>
			<div class="alert alert-success">
				<?php echo e(session('success')); ?>

			</div>
		<?php endif; ?>
	<div class="singleContent add-new-ad">
		<h3> »  إضافة إعلان جديد</h3>
		<br>
		<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('add')); ?>" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>   
			<label>عنوان الإعلان:</label>
			<br>
			<input class="form-control" type="text" placeholder="" name="title">
			<hr>
			<!--<div class="row">-->
			<!--	<div class="col-xs-12 col-md-6">-->
			<!--	 					<input class="form-control" type="number" required placeholder="سعر السلعه" name="price">-->
			<!--	</div>-->
			<!--	-->
			<!--		-->
			<!--			-->
			<!--			-->
			<!--			-->
			<!--		-->
			<!--	-->
			<!--</div>-->
			<hr>
			<div class="row">
				<div class=" col-md-12 col-xs-12">
					<select class="form-control" name="country" id="country">
						<option value="#">أختر الدولة</option>
						<?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($area->parent_id == 0): ?>
						<option value="<?php echo e($area->id); ?>"><?php echo e($area->name); ?></option>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
				<div class="col-md-12 col-xs-12">
					<select class="form-control" name="area_id" id="area_id">
					</select>
				</div>
				<div class="col-md-12 col-xs-12">
					<select class="form-control" id="area_idCopy">
						<?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($area->parent_id != 0): ?>
						<option data-parent="<?php echo e($area->parent_id); ?>" value="<?php echo e($area->id); ?>"><?php echo e($area->name); ?></option>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
			</div>
			<div class="col-md-12 col-xs-12">
				<select class="form-control" name="soum" id="child">

				</select>
			</div>
			<br>

			<hr>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<input type="hidden" value="1" name="mainCat">
					<select class="form-control" name="mainCat" id="selectedCat">
						<option value="#">أختر  القسم</option>
						<?php $__currentLoopData = \App\Cat::whereNull('parent_id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

						<option value="<?php echo e($cat->id); ?>" <?php if($cat->id == $sel): ?> selected <?php endif; ?>><?php echo e($cat->name); ?></option>

						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
				
				<div class="col-md-12 col-xs-12">
			                  <select name="cat_id" class="hidden" id="subCat">
                  </select>
				</div>
				<div class="col-md-12 col-xs-12">
					<select class="form-control" id="brandCopy">
						<?php $__currentLoopData = $cats->where('parent_id','!=',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($cats->find($cat->id)->parent_id): ?> == 1)

						<option data-parent="<?php echo e($cat->parent_id); ?>" value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<select class="form-control" name="model" id="model">
						<?php $__currentLoopData = array_reverse(modelYear()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
			</div>
			<div class="clearfix">
			</div>
			<hr>
			<label>
				وسيلة الإتصال:
			</label>
			<br>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<input class="form-control" type="text" placeholder="أكتب رقم جوالك هنا" name="contact" value="<?php echo e(Auth::user()->phone); ?>">
				</div>
			</div>
			<hr>
			<hr>
			<label>
				نوع الاعلان :
			</label>
			<br>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<select name="type" class="form-control">
						<option value="#" disabled selected>اختر نوع الاعلان </option>
						<option value="للبيع">للبيع</option>

						<option value="مطلوب">مطلوب</option>
					</select>
				</div>
				


			</div>
			<hr>
			<label>
				نص الإعلان:
			</label>
			<br>
			<textarea rows="9" placeholder="اكتب تفاصيل الإعلان هنا" class="form-control" name="body"></textarea>
			<br>
			<span class="label label-default">
				الإعلان غير مكتمل التفاصيل سيتم حذفه.
			</span>
						<hr>
						<div class="instructions">
		<span class="label label-warning">
	
				أقصى عدد صور مسموح به هو <?php echo e((int)\App\SiteSetting::where('name','max_upload_posts_images')->first()->value); ?> صورة 
	
			</span>
					<span class="label label-warning">
		        أقصى عدد للفيديوهات المسموح بها هو  <?php echo e((int)\App\SiteSetting::where('name','max_upload_posts_videos')->first()->value); ?> فيديو
			</span>
			<span class="label label-warning">
حجم الفيديو المسموح به <?php echo e((int)\App\SiteSetting::where('name','max_upload_size')->first()->value); ?>  ميجا او المدة  <?php echo e((int)\App\SiteSetting::where('name','max_upload_size_time')->first()->value); ?>  ثانية			</span>
		</div>	<br>
			<br>
			<div class="row">
			    <div class="form-group all-img col-lg-6">
				<div class="col-md-12">
					<div class="fileinput fileinput-new" data-provides="fileinput" style="width: 95%">
						<span class="btn plus-img green-up-img">+</span>
						<div class="input-group input-large">
							<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
								<i class="fa fa-file fileinput-exists"></i>&nbsp;
								<span class="fileinput-filename"> </span>
							</div>
							<span class="input-group-addon btn default btn-file" style="border-radius: 4px 0 0 4px;">
                                <span class="fileinput-new"> أختر صوره </span>
                                <span class="fileinput-exists"> تغير </span>
							<input type="file" name="file_name[]"  accept="image/*">
                            </span>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group all-vid col-lg-6">
				<div class="col-md-12">
					<div class="fileinput fileinput-new" data-provides="fileinput" style="width: 95%">
						<span class="btn plus-vid green-up-vid">+</span>
						<div class="input-group input-large">
							<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
								<i class="fa fa-file fileinput-exists"></i>&nbsp;
								<span class="fileinput-filename"> </span>
							</div>
							<span class="input-group-addon btn default btn-file" style="border-radius: 4px 0 0 4px;">
                                <span class="fileinput-new"> أختر فيديو </span>
                                <span class="fileinput-exists"> تغير </span>
							<input type="file" name="videos_files[]" accept="video/*">
                            </span>
						</div>
					</div>
				</div>
			</div>
			    
			</div>
			<!--<div class="form-group">-->
			<!--	<h3>من فضلك اختر طريقه العرض  </h3><br>-->
			<!--	<strong>فيديو</strong><input type="radio" name="uplode" value="video"><br>-->
			<!--	<strong>صورة</strong><input type="radio" name="uplode" value="image"><br>-->
			<!--</div>-->
			
				
				
			
			<br>
			<button type="submit" id="editPostSubmitBtn" class="button  btn-lg btn-success">إضافة الإعلان للموقع »</button>
		</form>
		
		<br>
	</div>
</div>


<div class="hidden">
	<div class="col-md-12" id="plus-img">
	    <div class="fileinput fileinput-new" data-provides="fileinput" style="width: 95%">
	    	<span class="btn plus-img">+</span>
	        <div class="input-group input-large">
	            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
	                <i class="fa fa-file fileinput-exists"></i>&nbsp;
	                <span class="fileinput-filename"> </span>
	            </div>
	            <span class="input-group-addon btn default btn-file" style="border-radius: 4px 0 0 4px;">
	                <span class="fileinput-new"> أختر صوره</span>
	                <span class="fileinput-exists"> تغير </span>
	                <input type="file" name="file_name[]"  accept="image/*" required>
	            </span>
	        </div>
	    </div>
	</div>
</div>
<div class="hidden">
	<div class="col-md-12" id="plus-vid">
	    <div class="fileinput fileinput-new" data-provides="fileinput" style="width: 95%">
	    	<span class="btn plus-vid">+</span>
	        <div class="input-group input-large">
	            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
	                <i class="fa fa-file fileinput-exists"></i>&nbsp;
	                <span class="fileinput-filename"> </span>
	            </div>
	            <span class="input-group-addon btn default btn-file" style="border-radius: 4px 0 0 4px;">
	                <span class="fileinput-new"> أختر فيديو </span>
	                <span class="fileinput-exists"> تغير </span>
	                <input type="file" name="videos_files[]" accept="video/*" required>
	            </span>
	        </div>
	    </div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php echo HTML::script('public/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'); ?>


<script type="text/javascript">
    var pho = 1;
     $('.plus-img').on('click',function(){
        if(pho <  <?php echo e((int)\App\SiteSetting::where('name','max_upload_posts_images')->first()->value); ?> ) {
    		var test = $( "#plus-img" ).clone();
    		test.find('.plus-img').removeClass('green-up-img').addClass('red-up-img').removeClass('plus-img').addClass('min-img');
    		test.find('.min-img').text('-');
    		test.appendTo(".all-img");
            pho++;
        }
    });
    var vid = 1;
     $('.plus-vid').on('click',function(){
        if(vid <  <?php echo e((int)\App\SiteSetting::where('name','max_upload_posts_videos')->first()->value); ?> ) {
    		var test = $( "#plus-vid" ).clone();
    		test.find('.plus-vid').removeClass('green-up-vid').addClass('red-up-vid').removeClass('plus-vid').addClass('min-vid');
    		test.find('.min-vid').text('-');
    		test.appendTo(".all-vid");
            vid++;
        }
    });




// 	$('.plus-img').on('click',function(){
// 		var test = $( "#plus-img" ).clone();
// 		test.find('.plus-img').removeClass('green-up-img').addClass('red-up-img').removeClass('plus-img').addClass('min-img');
// 		test.find('.min-img').text('-');
// 		test.appendTo(".all-img");
// 	});
	$(document).on('click','.min-img',function(){
		$(this).closest("#plus-img").remove();
	});
	$(document).on('click','.min-vid',function(){
		$(this).closest("#plus-vid").remove();
	});
//
// var inputFileCount = 0;
// $('input[type=file]').each(function(){
// 	inputFileCount++;
// });
//
// if(inputFileCount > 1){
// 	$('input[type=file]').each(function(){
// 		$(this).attr('required',true);
// 	});
// }
<?php if($errors->has('title')): ?>
	alert('فضلا يجب ألأا يزيد طول أحرف عنوان الإعلان عن 255 حرف');
<?php endif; ?>

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
			        if($(this).is(':visible')){
			    	    alert('فضلا ' + $(this).find("option:first-child").text());
			    	    $(this).focus();
	    			    e.preventDefault();
	    			    return done = false;
			        }
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
		$('input[type=number]').each(function(){
		    if($(this).val() == ""){
		    	alert('فضلا أكمل بيانات الإعلان');
		    	$(this).focus();
    			e.preventDefault();
    			return done = false;
		    }
	
			$('select').each(function(){
			    if($(this).val() == "#" || $(this).val() == null){
			        if($(this).is(':visible')){
			    	    alert('فضلا ' + $(this).find("option:first-child").text());
			    	    $(this).focus();
	    			    e.preventDefault();
	    			    return done = false;
			        }
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

	$("#area_id").hide();
	$("#area_idCopy").hide();
	$(document).on("change","#country",function() {
		var value=$(this).val();
		$("#area_id").show();
		$("#area_id").html(' ');
		$('#area_id').append('<option disabled selected value="#">أختر المحافظه</option>');
		$('#area_id').val('#');
		$('#area_id').append($("#area_idCopy option[data-parent=" + value + "]"));
	});



  $(document).on('change' , '#selectedCat' , function(){
       var selectedCat = $('#selectedCat').val();
       
       $.ajax({
                     
              url:"<?php echo e(route('getSubCat')); ?>",
              type:"POST",
              data: {
                  selectedCat: selectedCat,
                   _token: '<?php echo csrf_token(); ?>',
               },
             
              success:function (data) {
                   $('#subCat').empty('hidden');
                   $('#subCat').removeClass('hidden');
                   $('#subCat').append('<option value="">إختر القسم الفرعى</option>');

                   $.each(data,function(index,cat){
                       $('#subCat').append('<option value="'+cat.id+'">'+cat.name+'</option>');
                   })
              }
          });            
   });
   



	$("#brandCopy").hide();
	$("#brand").hide();
	$("#model").hide();
	$(window).on("load", function() { if($("#cat_id").val() != ""){ $("#cat_id").trigger('change'); } });
	$(document).on("change","#cat_id",function() {
		var value=$(this).val();
		$("#model").val('#');
		$("#model").hide();
		$("#brand").show();		
		$("#brand").html(' ');
	//	$('#brand').append('<option disabled selected value="#">أختر نوع القسم</option>');
		$("#brand").val('#');
		$('#brand').prepend($("#brandCopy option[data-parent=" + value + "]"));
				$("#brand").hide();

	});

	$(document).on("change","#brand",function() {
		var value=$(this).val();
		$("#model").val('#');
		$("#model").show();
		$('#model').prepend('<option disabled selected value="#">أختر موديل القسم</option>');
	});
	
	$('#storePost').hide();
	$(document).on("click","#goToStorePost",function() {
		$('#addPostNotes').hide();
		$('#storePost').show();
	});

	$('#child').hide();
	$('#area_id').on('change',function(){
        $.ajax({
            // method: "GET",
            url: "<?php echo e(route('get-child')); ?>",
			data: {id: $('#area_id :selected').val()},

			success:function (response) {
				console.log(response);
				if (response.status){
				    $('#child').empty();
                    $('#child').show();
				    for (var i=0 ; i<response.result.length ; i++){
				        $('#child').append('<option value="'+ response.result[i].id +'">'+response.result[i].name+'</option>');
					} //endfor


                } else {
				    
				}
            }
        });
	});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/site/posts/add/addCar.blade.php ENDPATH**/ ?>