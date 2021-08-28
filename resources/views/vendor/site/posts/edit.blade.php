@extends('layouts.app')

@section('title')
التعديل على الإعلان
@endsection
{{--
@if(count($errors))
	{{dd($errors)}}
@endif
--}}
@section('content')

<div class="add-3" id="storePost">
	<br>
	<div class="singleContent">
		<h3> »  تعديل إعلان</h3>
		<br>
		<form class="form-horizontal" role="form" method="POST" action="{{ url('edit/'.$post->id) }}" enctype="multipart/form-data">
			{{ csrf_field() }}   
			<label>عنوان الإعلان:</label>
			<br>
			<input class="form-control" type="text" placeholder="مثال:  هوندا اكورد 2015 فل كامل " value="{{$post->title}}" name="title">
			<hr>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="country" id="country">
						<option value="#">أختر الدولة</option>
						@foreach($areas as $area)
						@if($area->parent_id == 0)
						<option {{$areas->find($post->area_id)->parent_id == $area->id ? 'selected' : '' }} value="{{$area->id}}">{{$area->name}}</option>
						@endif
						@endforeach
					</select>
				</div>
				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="area_id" id="area_id">
						@foreach($areas as $area)
						@if($area->parent_id != 0)
						<option {{$area->id == $post->area_id ? 'selected' : ''}} data-parent="{{$area->parent_id}}" value="{{$area->id}}">{{$area->name}}</option>
						@endif
						@endforeach
					</select>
				</div>
				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="area_id" id="area_idCopy">
						@foreach($areas as $area)
						@if($area->parent_id != 0)
						<option {{$area->id == $post->area_id ? 'selected' : ''}} data-parent="{{$area->parent_id}}" value="{{$area->id}}">{{$area->name}}</option>
						@endif
						@endforeach
					</select>
				</div>

			</div>
			<hr>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<input type="hidden" value="{{$cats->find($post->cat_id)->parent_id}}" name="mainCat">
					<select class="form-control" name="cat_id" id="cat_id">
						<option value="#">اختر القسم المناسب</option>
						@foreach($cats as $cat)
						@if($cat->parent_id == $cats->find($post->cat_id)->parent_id)
						<option {{$post->cat_id == $cat->id ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->name}}</option>
						@endif
						@endforeach
					</select>
				</div>
				@if($cats->find($post->cat_id)->parent_id == 1)
				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="brand" id="brand">
						<option value="#">اختر القسم المناسب</option>
						@foreach($cats->where('parent_id','!=',0) as $cat)
						@if($cats->find($cats->find($cat->id)->parent_id)->parent_id == 1)
						<option {{$cat->id == $post->brand ? 'selected' : ''}} data-parent="{{$cat->parent_id}}" value="{{$cat->id}}">{{$cat->name}}</option>
						@endif
						@endforeach
					</select>
				</div>
				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="brand" id="brandCopy">
						<option value="#">اختر القسم المناسب</option>
						@foreach($cats->where('parent_id','!=',0) as $cat)
						@if($cats->find($cats->find($cat->id)->parent_id)->parent_id == 1)
						<option {{$cat->id == $post->brand ? 'selected' : ''}} data-parent="{{$cat->parent_id}}" value="{{$cat->id}}">{{$cat->name}}</option>
						@endif
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="model" id="model">
						@foreach(array_reverse(modelYear()) as $year)
						<option {{$year == $post->model ? 'selected' : ''}} value="{{$year}}">{{$year}}</option>
						@endforeach
					</select>
				</div>
				@endif
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
					<input class="form-control" type="text" placeholder="أكتب رقم جوالك هنا" name="contact" value="{{$post->contact}}">
				</div>
			</div>
			<hr>
			<label>
				نص الإعلان:
			</label>
			<br>
			<textarea rows="9" placeholder="اكتب تفاصيل الإعلان هنا" class="form-control" name="body">{{$post->body}}</textarea>
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
			<br>
			<button type="submit" id="editPostSubmitBtn" class="button  btn-lg btn-success">إرسال التعديل »</button>
		</form>
		<br>
		<br>
		<div class="row">
		@foreach(\App\UpImage::where('type','posts')->where('post_id',$post->id)->get() as $image)
		<div class="col-xs-12 col-md-2">
			<a class="delPostImg" data-token="{{ csrf_token() }}" href="{{url('images/'.$image->id)}}">×</a>
			<img class="img-responsive img-block" src="{{image_check($image->img_name,'posts')}}">
			<hr />
		</div>
		@endforeach
		</div>
	</div>
</div>
@endsection

@section('footer')
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

	$(document).on("change","#cat_id",function() {
		var value=$(this).val();
		$("#model").val('#');
		$("#model").hide();
		$("#brand").show();
		$("#brand").html(' ');
		$('#brand').append('<option disabled selected value="#">أختر نوع السياره</option>');
		$("#brand").val('#');
		$('#brand').append($("#brandCopy option[data-parent=" + value + "]"));
	});

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
@endsection
