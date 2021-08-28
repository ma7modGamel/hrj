@extends('layouts.app')

@section('title')
    تغير الصورة الشخصيه
@endsection
@section('header')
   <style>
       .image{
           position: relative;
           right: 45%;
       }
   </style>

    @endsection
@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <h3 style="text-align: center">تغير الصورة الشخصيه </h3>

        </div>

    </div>
    <div class="col-md-2 image">
@if(!empty(\Auth::user()->image))
    <!-- Trigger the modal with a button -->
        {{--<button type="button" class="btn btn-info btn-lg" id="myBtn">Open Modal</button>--}}
        <a href="#" id="myBtn">
            <img src="{{!empty(\Auth::user()->image)?asset('public').'/'.\Auth::user()->image:''}}" class="img-responsive img-thumbnail img-circle" id="user" style="width:130px;height: 130px;">
        </a>
    @endif
</div>
    @endsection