@extends('layouts.app')

@section('content')
<div class="singleContent verfity container">
    <h3>تأكيد رقم الجوال</h3>
    <hr>
    @if(Session::has('successSendActiveCode'))

    <span class="alert alert-success">{{Session::get('successSendActiveCode')}}</span>
    @endif
    @if(Session::has('errorActCode'))
        <span class="alert alert-danger">{{Session::get('errorActCode')}}</span>
    <hr>
    @endif
    <form method="POST" action="{{url('active/'.$user->id)}}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <input type="text" class="form-control" name="active" value="{{ old('email') }}" placeholder="أدخل كود التفعيل" required>
            </div>
                        <div class="col-md-2">

            <a class="btn btn-primary" href="{{url('ressend/code/'.$user->id)}}">أعد إرسال كود التفعيل</a>
                        </div>

            <div class="col-md-2">
                <button name="submit" class="button  btn-success btn-large" type="submit" value="تفعيل">تفعيل</button>
            </div>
        </div>
    </form>
    <br>
</div>
@endsection
