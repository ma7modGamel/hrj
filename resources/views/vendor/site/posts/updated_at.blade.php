@extends('layouts.app')

@section('title')
تحديث الإعلان
@endsection

@section('content')
<br>
<div class="singlePage" style="border: 1px solid #eee; width: 80%;margin: 0 auto;" >
	<table class="table  tableMsg table-borderedAds tableextra">
		<th colspan='50' scobe='row'><center>تحديث الإعلان</center></th>
		<tbody>
			<tr>
				@if($done)
				<td class="cat" align="center">&nbsp;
					<div class="alert  alert-success">
						تم تحديث الإعلان بنجاح
					</div>
				</td>
				@else
				<td class="cat" align="center">&nbsp;
					<div class="alert  alert-warning">
						عزيزي المعلن،
						لايمكن تحديث الإعلان اليوم بسبب وجود تحديث سابق خلال أقل من {{getSettings('adsUpdatedAt')}}  أيام.نرجو التحديث بعد مرور {{getSettings('adsUpdatedAt')}} أيام على آخر تحديث للإعلان وشكرا
						<br>
						<br>
						آخر تحديث للإعلان كان قبل 
						{{ timeToStr(strtotime($post->updated_at))}}
					</div>
				</td>
				@endif
			</tr>
		</tbody>
		<th colspan='50' scobe='row'><center><a href="{{url('ads/'.$post->id.'/'.editTitle($post->title))}}">العودة للإعلان</a></center></th>
	</table>
</div>
@endsection
