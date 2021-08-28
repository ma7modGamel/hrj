@extends('layouts.app')

@section('content')
<div class="singlePage container">
    <div class="col-md-9">
        <form method="POST" action="{{ url('complete') }}">
            {{ csrf_field() }}
            <h2>إستكمال بيانات التسجبل</h2>
            <hr>
                <div class="contentBox">
                    <div class="box1">
                        <label>إسم المستخدم</label>
                    </div>
                    <div class="box2 {{ $errors->has('username') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" placeholder="أسم المستخدم " name="username" value="{{ old('username') }}" required autofocus>
                        <!-- <input type="text" name="user" class="form-control" placeholder="أسم المستخدم  أو رقم الجوال"> -->
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                        <div class="pull-left">
                            <span class="alert alert-info"> هذا الإسم لن يظهر مره أخرى . تذكره جيدا إن أردت تسجيل دخولك من خلاله </span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="contentBox">
                    <div class="box1">
                        <label>إسم العضويه</label>
                    </div>
                    <div class="box2 {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" placeholder="أكتب إسم العضويه" name="name" value="{{ old('name') }}" required>
                        <!-- <input type="text" name="user" class="form-control" placeholder="أسم المستخدم  أو رقم الجوال"> -->
                        @if ($errors->has('name'))
                            <span >
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        <div class="pull-left">
                            <span class="alert alert-info"> هذا الإسم سوف يظهر فى جميع تعاملاتك </span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="contentBox">
                    <div class="box1">
                        <label>البريد الإلكترونى</label>
                    </div>
                    <div class="box2 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" placeholder="أكتب بريدك الإلكترونى" name="email" value="{{ old('email') }}" required>
                        <input type="hidden" name="user_id" value="{{$user}}">
                        <input type="hidden" name="phone" value="{{$phone}}">
                        <input type="hidden" name="activeCode" value="{{$activeCode}}">
                        <!-- <input type="text" name="user" class="form-control" placeholder="أسم المستخدم  أو رقم الجوال"> -->
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="contentBox">
                    <div class="box1">
                        <label>الرقم السرى</label>
                    </div>
                    <div class="box2 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" placeholder="أدخل الرقم السرى" name="password" value="{{ old('password') }}" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="contentBox">
                    <div class="box1">
                        <label>أعد كتابة الرقم السرى</label>
                    </div>
                    <div class="box2">
                        <input id="password_confirmation" type="password" class="form-control" placeholder="أعد كتابة الرقم السرى" name="password_confirmation" required>
                        <br>
                        <button name="login" class="button" type="submit" value="تسجيل »">تسجيل »</button>
                    </div>
                </div>
            <br>
            <br>
            <br>
            <br>
        </form>
        <br>
        <br>
        <br>
        <br>
    </div>
</div>
@endsection
