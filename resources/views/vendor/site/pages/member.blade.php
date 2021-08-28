@extends('layouts.app')

@section('title')
عضوية معارض السيارات و مكاتب العقار
@endsection

@inject('page','\App\Page')
@section('content')
<div class="singleContent">
{!! $page->where('pLink','memberUp')->first()->content !!}
	<br><br>
	<a href="{{url('commission?plan=1')}}" class="button btn-lg " role="button" style="padding-bottom: 10px;padding-top: 10px;">الاشتراك الآن لمدة 6 شهور</a>
	<a href="{{url('commission?plan=2')}}" class="button btn-lg " role="button" style="padding-bottom: 10px;padding-top: 10px;">الاشتراك الآن لمدة سنة</a>
	<br><br>
{!! $page->where('pLink','memberDown')->first()->content !!}
</div>


@endsection

@section('footer')
@endsection
