@extends('layouts.app')

@section('header')

@endsection

@section('content')
    {{--<br>--}}
    {{--<br>--}}
    {{--<div class="more search_page">--}}
    {{--<div class="container">--}}
    {{--@if(\App\Page::where('pLink',$pageName)->count())--}}
    {{--{!! \App\Page::where('pLink',$pageName)->first()->content !!}--}}
    {{--@else--}}
    {{--<script type="text/javascript">--}}
    {{--url = "{{Request::root()}}"+"/404";--}}
    {{--window.location = url;--}}
    {{--</script>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<br />--}}
    {{--<br />--}}
    <div class="container">
    <br>
        @if(!empty($errors->all()))
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}<br>
            </div>
            @endforeach

            @endif
        @if(session()->has('success'))
            <div class="alert alert-warning">
                {{session('success')}}
            </div>
        @endif
        <h3 style="text-align: center; color:#0473c0">اتصل بنا</h3>
        <form action="{{route('contact-us')}}" method="post">
            <div class="form-group">
                <label>اسم المستخدم : </label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>الايميل : </label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label> رقم الجوال : </label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label> نوع الرساله  : </label>
                <select name="contact" class="form-control">
                    <option value="1">  رسالة </option>
                    <option value="2"> مخالفات الإعلانات </option>
                    <option value="3">تطوير مواقع  </option>

                    <option value="11">دعم فني </option>
                    <option value="12">استفسار  </option>
                    <option value="13"> شكوي</option>
                </select>
            </div>
            <div class="form-group">
                <label> الرساله   : </label>
                <textarea class="form-control" name="descrption"></textarea>
            </div>
            <div class="form-group">
                <input class="btn btn-secondary" type="submit" value="ارسال">
            </div>
        </form>

    </div>

@endsection


@section('footer')

@endsection







