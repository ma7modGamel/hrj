@extends('layouts.app')

@section('title')
إضافة إعلان جديد في سوق الدولى
@endsection

@section('header')
{!! HTML::style('public/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}
@endsection
@section('content')

<!--#============ Post Note ============#-->

<div id="addPostMap">
	<h2> » تحديد موقع العقار</h2>
	اختر المنطقة للاستمرار:
	<br>
	<center>
		<div id="latlongmap" style="height:450px;width: 80%;"></div>
	</center>
	<button id="goToAddPostMapStore" class="button  btn-lg btn-success">إرسال</button>
</div>


@include('site.posts.addPostNotes')

<!--#============ end Post Note ============#-->

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
					<select class="form-control" value="{{ old('country') }}" name="country" id="country">
						<option value="#">أختر الدولة</option>
						@foreach($areas as $area)
						@if($area->parent_id == 0)
						<option value="{{$area->id}}">{{$area->name}}</option>
						@endif
						@endforeach
					</select>
				</div>
				<div class="col-xs-12 col-md-6">
					<select class="form-control" value="{{ old('area_id') }}" name="area_id" id="area_id">
					</select>
				</div>
				<div class="col-xs-12 col-md-6">
					<select class="form-control" value="{{ old('area_id') }}" id="area_idCopy">
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
					<input type="hidden" value="2" value="{{ old('mainCat') }}" name="mainCat">
					<select class="form-control" value="{{ old('cat_id') }}" name="cat_id" id="cat_id">
						<option value="#" disabled selected>أختر القسم المناسب</option>
						@foreach($cats as $cat)
						@if($cat->parent_id == 2)
						<option value="{{$cat->id}}">{{$cat->name}}</option>
						@endif
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
			<textarea rows="9" placeholder="اكتب تفاصيل الإعلان هنا" class="form-control" value="{{ old('body') }}" name="body"></textarea>
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
			<input class="hidden" value="{{ old('lat') }}" name="lat" id="lat" value="">
			<input class="hidden" value="{{ old('lng') }}" name="lng" id="lng" value="">
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
}

@if($errors->has('title'))
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

	$('#storePost').hide();
	$('#addPostMap').hide();
	$(document).on("click","#goToStorePost",function() {
		$('#addPostMap').show();
		$('#addPostNotes').hide();
		google.maps.event.trigger(map, "resize");
		map.setCenter(marker.getPosition());
	});
	$(document).on("click","#goToAddPostMapStore",function() {
		$('#addPostMap').hide();
		$('#storePost').show();
	});

function initialize() {
    var e = new google.maps.LatLng(24.701925,46.675415), t = {
        zoom: 5,
        center: e,
        panControl: !0,
        scrollwheel: 1,
        scaleControl: !0,
        overviewMapControl: !0,
        overviewMapControlOptions: {opened: !0},
        mapTypeId: google.maps.MapTypeId.terrain
    };
    map = new google.maps.Map(document.getElementById("latlongmap"), t), geocoder = new google.maps.Geocoder, marker = new google.maps.Marker({
        position: e,
        map: map
    }), map.streetViewControl = !1, infowindow = new google.maps.InfoWindow({content: "(24.701925,46.675415))"}), google.maps.event.addListener(map, "click", function (e) {
        marker.setPosition(e.latLng);
        var t = e.latLng, o = "(" + t.lat().toFixed(6) + ", " + t.lng().toFixed(6) + ")";
        infowindow.setContent(o),
        document.getElementById("lat").value = t.lat().toFixed(6),
        document.getElementById("lng").value = t.lng().toFixed(6)
    })
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwqrlZASdsR2P-KqDBBaGQrVFb7Uom2Uk&language=ar&callback=initialize"></script>




@endsection
