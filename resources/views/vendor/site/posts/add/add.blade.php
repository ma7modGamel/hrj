@extends('layouts.app')

@section('header')

@endsection

@section('content')
<div class="add-1">
	<br>
	<div class="singleContent">
		<h3> »  إضافة إعلان جديد</h3>
		<br>
		<form action="add" method="get">
			<label class="radio">
				<input type="radio" name="sec" value="1" checked><a href="{{url('add?sec=1')}}">عرض سيارة للبيع أو للتنازل</a>
			</label>
			<label class="radio">
				<input type="radio" name="sec" value="1"> <a href="{{url('add?sec=1')}}"> عرض شاحنة أو معدات ثقيلة للبيع</a>
			</label>
			<label class="radio">
				<input type="radio" name="sec" value="1"> <a href="{{url('add?sec=1')}}"> عرض شاحنة أو معدات للإيجار</a>
			</label>
			<label class="radio">
				<input type="radio" name="sec" value="1"> <a href="{{url('add?sec=1')}}">عرض دباب للبيع</a>
			</label>
			<label class="radio">
				<input type="radio" name="sec" value="1"> <a href="{{url('add?sec=1')}}">عرض قطع غيار أو خدمات سيارات أو إكسسوارات سيارات للبيع</a>
			</label>
			<label class="radio">
				<input type="radio" name="sec" value="2"> <a href="{{url('add?sec=2')}}">عرض عقار للبيع</a>
			</label>
			<label class="radio">
				<input type="radio" name="sec" value="2"> <a href="{{url('add?sec=2')}}">عرض عقار للإيجار</a>
			</label>
			<label class="radio">
				<input type="radio" name="sec" value="3"> <a href="{{url('add?sec=3')}}">عرض سلعه للبيع - سلعه غير مصنفه أعلاه</a>
			</label>
			<label class="radio">
				<input type="radio" name="sec" value="4"> <a href="{{url('add?sec=4')}}">طلب سلعه</a>
			</label>
			<button type="submit" class="button btn-lg btn-success">إستمرار »</button>
		</form>
		<br>
	</div>
</div>
@endsection

@section('footer')

@endsection
