@extends('layouts.app')

@section('header')

@endsection
@section('content')
<div class="singleContent">
    <hr> تقييم العضو
    <a href="{{url('users/'.$user->id)}}" class="username"> <i class="fa fa-user"> </i> {{$user->name}}</a>
    <hr>
    <div class="green">
    	@foreach(range(1,$user->Rating()->where('type',1)->count()) as $rate)
        <i class="fa  fa-thumbs-up"></i>
        @endforeach
   	@if($user->Rating()->where('type',1)->count())
        @if($user->Rating()->where('type',1)->count() > 9)
        <br> يوجد {{$user->Rating()->where('type',1)->count()}} أعضاء ينصحون بالتعامل معه
    	@elseif($user->Rating()->where('type',1)->count() == 1)
        <br> يوجد عضو واحد ينصح بالتعامل معه
    	@elseif($user->Rating()->where('type',1)->count() < 10)
        <br> يوجد {{$user->Rating()->where('type',1)->count()}} أعضاء ينصحون بالتعامل معه
        @endif
   	@endif

    </div>
    <br>
   	@if($user->Rating()->where('type',0)->count())
    <div class="red">
    	@foreach(range(1,$user->Rating()->where('type',0)->count()) as $rate)
        <i class="fa  fa-thumbs-down"></i>
        @endforeach
        @if($user->Rating()->where('type',0)->count() > 9)
        <br> يوجد {{$user->Rating()->where('type',0)->count()}} أعضاء لا ينصحون بالتعامل معه
    	@elseif($user->Rating()->where('type',0)->count() == 1)
        <br> يوجد عضو واحد لا ينصح بالتعامل معه
    	@elseif($user->Rating()->where('type',0)->count() < 10)
        <br> يوجد {{$user->Rating()->where('type',0)->count()}} أعضاء لا ينصحون بالتعامل معه
        @endif
    </div>
    <br>
    @endif
    @foreach($user->Rating()->where('type',1)->get() as $rate)
    <div class="ratingbox "><span> تقييم من العضو <a href="{{url('users/'.$rate->User->id)}}" class="username">{{$rate->User->name}}</a> قبل : {{ timeToStr(strtotime($rate->created_at))}} </span>
        <br>
        <br><i class="fa fa-quote-right"></i> {{$rate->content}} <i class="fa fa-quote-left"></i>
        <br>
        <h4 class="green"><i class="fa  fa-thumbs-up"></i>  أنصح بالتعامل   </h4>
    </div>
    <br>
   	@endforeach
   	@if($user->Rating()->where('type',0)->count())
    @foreach($user->Rating()->where('type',0)->get() as $rate)
    <div class="ratingbox "><span> تقييم من العضو <a href="{{url('users/'.$rate->User->id)}}" class="username">{{$rate->User->name}}</a> قبل : {{ timeToStr(strtotime($rate->created_at))}} </span>
        <br>
        <br><i class="fa fa-quote-right"></i> {{$rate->content}} <i class="fa fa-quote-left"></i>
        <br>
        <h4 class="red"><i class="fa  fa-thumbs-down"></i> لا أنصح بالتعامل   </h4>
        <br>
    </div>
    <br>
   	@endforeach
   	@endif
    <br>
</div>
@endsection
