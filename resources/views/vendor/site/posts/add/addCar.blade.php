@extends('layouts.app')

@section('title')
إضافة إعلان جديد في سوق الدولى
@endsection

@if(count($errors))
{{dd($errors)}}
@endif
@section('header')
{!! HTML::style('public/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}
@endsection
@section('content')

@include('site.posts.addPostNotes')

<div class="add-3" id="storePost">
	<br>
	<div class="singleContent">
		<h3> »  إضافة إعلان جديد</h3>
		<br>
		<form class="form-horizontal" role="form" method="POST" action="{{ url('add') }}" enctype="multipart/form-data">
			{{ csrf_field() }}   
			<label>عنوان الإعلان:</label>
			<br>
			<input class="form-control" type="text" placeholder="مثال:  هوندا اكورد 2015 فل كامل " name="title">
			<hr>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<input class="form-control" type="text" placeholder="سعر السلعه" name="price">
				</div>
				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="soum">
						@foreach(soum() as $key => $val)
						<option value="{{$key}}">{{$val}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="country" id="country">
						<option value="#">أختر الدولة</option>
						@foreach($areas as $area)
						@if($area->parent_id == 0)
						<option value="{{$area->id}}">{{$area->name}}</option>
						@endif
						@endforeach
					</select>
				</div>
				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="area_id" id="area_id">
					</select>
				</div>
				<div class="col-xs-12 col-md-6">
					<select class="form-control" id="area_idCopy">
						@foreach($areas as $area)
						@if($area->parent_id != 0)
						<option data-parent="{{$area->parent_id}}" value="{{$area->id}}">{{$area->name}}</option>
						@endif
						@endforeach
					</select>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<input type="hidden" value="1" name="mainCat">
					<select class="form-control" name="cat_id" id="cat_id">
						<option value="#">أختر ماركة السياره</option>
						@foreach($cats as $cat)
						@if($cat->parent_id == 1)
						<option value="{{$cat->id}}">{{$cat->name}}</option>
						@endif
						@endforeach
					</select>
				</div>
				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="brand" id="brand">
					</select>
				</div>
				<div class="col-xs-12 col-md-6">
					<select class="form-control" id="brandCopy">
						@foreach($cats->where('parent_id','!=',0) as $cat)
						@if($cats->find($cats->find($cat->id)->parent_id)->parent_id == 1)
						<option data-parent="{{$cat->parent_id}}" value="{{$cat->id}}">{{$cat->name}}</option>
						@endif
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="model" id="model">
						@foreach(array_reverse(modelYear()) as $year)
						<option value="{{$year}}">{{$year}}</option>
						@endforeach
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
				<div class="col-xs-12 col-md-6">
					<input class="form-control" type="text" placeholder="أكتب رقم جوالك هنا" name="contact" value="{{Auth::user()->phone}}">
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
			<br>
			<br>
			<div class="form-group all-img">
				<div class="col-md-4">
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
                                <input type="file" name="image[]">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
			<br>
			<button type="submit" id="editPostSubmitBtn" class="button  btn-lg btn-success">إضافة الإعلان للموقع »</button>
		</form>
		<br>
		<br>
	</div>
</div>

<div class="hidden">
	<div class="col-md-4" id="plus-img">
	    <div class="fileinput fileinput-new" data-provides="fileinput" style="width: 95%">
	    	<span class="btn plus-img">+</span>
	        <div class="input-group input-large">
	            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
	                <i class="fa fa-file fileinput-exists"></i>&nbsp;
	                <span class="fileinput-filename"> </span>
	            </div>
	            <span class="input-group-addon btn default btn-file" style="border-radius: 4px 0 0 4px;">
	                <span class="fileinput-new"> أختر صوره </span>
	                <span class="fileinput-exists"> تغير </span>
	                <input type="file" name="image[]" required>
	            </span>
	        </div>
	    </div>
	</div>
</div>
@endsection

@section('footer')
{!! HTML::script('public/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}

<script type="text/javascript">
$('.plus-img').on('click',function(){
	var test = $( "#plus-img" ).clone();
	test.find('.plus-img').removeClass('green-up-img').addClass('red-up-img').removeClass('plus-img').addClass('min-img');
	test.find('.min-img').text('-');
	test.appendTo(".all-img");
});
$(document).on('click','.min-img',function(){
	$(this).closest("#plus-img").remove();
});

var inputFileCount = 0;
$('input[type=file]').each(function(){
	inputFileCount++;
});

if(inputFileCount > 1){
	$('input[type=file]').each(function(){
		$(this).attr('required',true);
	});
}@if($errors->has('title'))
	alert('فضلا يجب ألأا يزيد طول أحرف عنوان الإعلان عن 255 حرف');
@endif

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

	$("#brandCopy").hide();
	$("#brand").hide();
	$("#model").hide();
	$(document).on("change","#cat_id",function() {
		var value=$(this).val();
		$("#model").val('#');
		$("#model").hide();
		$("#brand").show();		
		$("#brand").html(' ');
		$('#brand').append('<option disabled selected value="#">أختر نوع السياره</option>');
		$("#brand").val('#');
		$('#brand').prepend($("#brandCopy option[data-parent=" + value + "]"));
	});

	$(document).on("change","#brand",function() {
		var value=$(this).val();
		$("#model").val('#');
		$("#model").show();
		$('#model').prepend('<option disabled selected value="#">أختر موديل السياره</option>');
	});
	
	$('#storePost').hide();
	$(document).on("click","#goToStorePost",function() {
		$('#addPostNotes').hide();
		$('#storePost').show();
	});
</script>
@endsection
