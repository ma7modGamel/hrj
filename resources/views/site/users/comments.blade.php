@extends('layouts.app')

@section('title')
آخر الردود
@endsection

@section('content')

<div class="singleContent">
    <h4>آخر ردود العضو </h4>
    <a href="{{url('users/'.$user->id)}}" class="username">{{$user->name}}</a>
    <br>
    <br>
    @foreach($user->Cmnt->take(40) as $cmnt)
    <div class="comment ">
        <div class=" commentHeader">
            ›› على الإعلان
            @if($cmnt->Post)
            <a href="{{url('ads/'.$cmnt->Post->id.'/'.$cmnt->Post->title)}}">{{$cmnt->Post->title}}</a>
            @else
                'تم حذف الإعلان'
            @endif
            <br>
            <br> قبل {{ timeToStr(strtotime($cmnt->created_at))}}
        </div>
        <div class="commentBody">
            {{$cmnt->body}}
        </div>
    </div>
    <div class="clearfix"></div>
    <br>
    @endforeach
</div>

@endsection
@section('footer')

@endsection
