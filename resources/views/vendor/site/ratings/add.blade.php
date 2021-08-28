@extends('layouts.app')

@section('header')

@endsection
@section('content')

<div class="add-3" id="storePost">
	<br>
	<div class="singleContent">
		<h3> »  إضافة تقييم</h3>
		<br>
		@if(Session::has('ratingSend'))
			<span class="alert alert-info"> تم إرسال التقييم بنجاح </span>
		@endif
		<form class="form-horizontal {{Session::has('ratingSend') ? 'hidden' : ''}}" role="form" method="POST" action="{{ url('add-rating') }}" enctype="multipart/form-data">
			{{ csrf_field() }}   
			<hr>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<select class="form-control" name="type">
						<option value="#" selected disabled>حدد نوع التقيم</option>
						<option value="1">تقيم إيجابى</option>
						<option value="0">تقيم سلبى</option>
					</select>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-12 col-md-1">			
					<label>
						رقم الإعلان :
					</label>
				</div>
				<div class="col-xs-12 col-md-5">
					<input class="form-control" type="text" placeholder="أكتب رقم الإعلان" name="post_id" value="">
				</div>
				<div class="col-xs-12 col-md-1">			
					<label>
						تاريخ الشراء :
					</label>
				</div>
				<div class="col-xs-12 col-md-5">
					<input class="form-control" type="text" placeholder="أكتب تاريخ الشراء أو تاريخ التعامل" name="buy_date" value="">
				</div>
			</div>
			<hr>
			<label>
				أكتب ملاحظاتك عن التقيم:
			</label>
			<br>
			<textarea rows="9" placeholder="أكتب ملاحظاتك عن التقيم هنا" class="form-control" name="body"></textarea>
			<br>
			<br>
			<input class="hidden" name="user_id" value="{{$userId}}">
			<input class="hidden" name="rate_id" value="{{$rateId}}">
			<button type="submit" id="sendRateSubmitBtn" class="button  btn-lg btn-success">إرسال التقييم »</button>
		</form>
		<br>
		<br>
	</div>
</div>
@endsection

@section('footer')
<script type="text/javascript">
	$(document).on("click","#sendRateSubmitBtn",function(e) {
		var done = true;
		$('input[type=text]').each(function(){
		    if($(this).val() == ""){
		    	alert('فضلا ' + $(this).attr('placeholder'));
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
				    alert('فضلا أكتب ملاحظاتك');
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

</script>

@endsection
