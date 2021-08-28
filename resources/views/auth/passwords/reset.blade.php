@extends('layouts.app')

@section('content')
<div class="singlePage container rest-password">
    <h3>إسترجاع الرقم السرى</h3>
    <span id="output"></span>
    <br> @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <form method="post" method="POST" action="{{ route('password.request') }}" style="border: 1px solid #eee; margin: 0 auto; padding: 10px">
        {{csrf_field()}}
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <input id="email" class="form-control" type="hidden" placeholder="أكتب بريدك الإلكترونى" name="email" value="{{ $email  }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <input id="password" type="password" class="form-control" name="password" placeholder="الرقم السرى الجديد" value="" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-xs-12 col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="تأكيد الرقم السرى" value="" required>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <input id="chgpwdSubmit" class="button chgpwdSubmit" type="submit" value="تغيير" style="min-width: 150px; font-size: 16px;">
            </div>
        </div>
    </form>
</div>
@endsection
