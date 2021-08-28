@extends('layouts.app')

@section('content')
<div class="singlePage log container">
    <div class="col-md-6">
        <form method="POST" action="{{ route('login') }}" onsubmit="myFunction()">
            {{ csrf_field() }}
            <h2>تسجيل الدخول</h2>
            <hr>
                <div class="contentBox">
                    <div class="box1">
                    </div>
                    <div class="box2 {{ $errors->has('username') ? ' has-error' : '' }}">
                        <input id="email" type="text" class="form-control" placeholder="أسم المستخدم  أو رقم الجوال" name="username" value="{{ old('username') }}" required autofocus>
                        <!-- <input type="text" name="user" class="form-control" placeholder="أسم المستخدم  أو رقم الجوال"> -->
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="contentBox">
                    <div class="box1">
                    </div>
                    <div class="box2 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <br>
                        <input id="password" type="password" class="form-control" name="password" placeholder="الرقم السري" required>
                        <!-- <input type="password" name="pass" class="form-control" > -->
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <br>
                        <div class="contentBox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> تذكرنى
                            </label>
                        </div>
                        <br>
                        <button name="login" class="button" type="submit" value="دخــــول »">دخــــول »</button>
                        <br>
                    </div>
                </div>
        </form>
        <a href="{{url('register')}}" class="RegBtn">انشاء حساب جديد</a><br>
        <a href="{{ route('password.request') }}" style="font-size: 16px;">  هل نسيت الرقم السري؟</a>
        
    </div>
</div>
@endsection
