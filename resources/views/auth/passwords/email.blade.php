@extends('layouts.app')

@section('content')
<div class="singleContent rest-password">
    <h3>إستعادة أسم المستخدم وكلمة المرور</h3>
    <hr>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="ادخل بريدك أو رقم الجوال" required>
            </div>
            <!-- <input type="text" name="email" placeholder="ادخل جوالك او بريدك"> -->
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <div class="col-md-4">
                <button name="submit" class="button  btn-success btn-large" type="submit" value="الحصول على الرقم السري">الحصول على الرقم السري</button>
            </div>
        </div>
    </form>
    <br>
</div>
@endsection
