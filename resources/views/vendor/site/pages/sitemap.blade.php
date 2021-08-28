@extends('layouts.app')

@section('header')


@endsection

@section('content')
    <br>
    <br>
    <div class="more">
        <div class="container">
            <h3>خارطة الموقع</h3>
            <ul>
            @foreach(\App\Cat::where('parent_id',0)->get() as $cat)
                <li><a href="{{url('tags/'.$cat->id)}}">{{$cat->name}}</a>
                    <ul>
                    @foreach(\App\Cat::where('parent_id',$cat->id)->get() as $cat)
                        <li><a href="{{url('tags/'.$cat->name)}}">{{$cat->name}}</a>
                            <ul>
                            @foreach(\App\Cat::where('parent_id',$cat->id)->get() as $cat)
                                <li><a href="{{url('tags/'.$cat->name)}}">{{$cat->name}}</a></li>
                            @endforeach
                            </ul>
                        </li>
                    @endforeach
                    </ul>
                </li>
            @endforeach
            </ul>
        </div>
    </div>

@endsection


@section('footer')

@endsection