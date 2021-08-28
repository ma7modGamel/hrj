@extends('layouts.app')



@section('header')





@endsection



@section('content')

    <br>

    <br>

    <div class="more container">

        <div class="">

            <h3>خارطة الموقع</h3>

            <div class="sitemap-items">

            @foreach(\App\Cat::where('parent_id',null)->get() as $cat)

                <div class="sitemap-item"><a href="{{url('tags/'.$cat->id)}}">{{$cat->name}}</a>

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

                </div>

            @endforeach

            </div>

        </div>

    </div>



@endsection





@section('footer')



@endsection