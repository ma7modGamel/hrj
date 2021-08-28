@extends('layouts.app')

@section('content')
<div class="register singleContent container">
    <h2>التسجيل بالموقع</h2>
    <hr>
    @if(Session::has('successSendActiveCode'))
        <span class="alert alert-success">{{Session::get('successSendActiveCode')}}</span>
        <hr>
    @elseif(Session::has('lengthActiveCode'))
        <span class="alert alert-success">{{Session::get('successSendActiveCode')}}</span>
        <hr>    
    @elseif(Session::has('error_flash_message'))
        <span class="alert alert-danger">{{Session::get('error_flash_message')}}</span>
        <hr>    
    @endif
    <form method="POST" action="{{ route('register') }}" class="bs-example-control-sizing"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="contentBox">
            <div class="col-md-2">
                <label>كم رقم جوالك؟</label>
            </div>
                <div class="form-group col-md-10">
                    <select class="form-control form-control-sm" name="key">
                        <option value="+966">+966 السعودية</option>
                    </select>
                    <input type="text" pattern="[0-9]*" name="phone" placeholder="أدخل رقم جوالك 05xxxxxxx في السعودية" class="form-control " value="{{ old('username') }}" required autofocus>
                </div>
                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif

        </div>
        <div class="contentBox">
            <div class="col-md-2">
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
            </div>
        </div>
        <br>
        <!--<div class="contentBox">-->
        <!--    <div class="col-md-2">-->
        <!--        <label>البريد الإلكترونى</label>-->
        <!--    </div>-->
        <!--    <div class="box2 {{ $errors->has('email') ? ' has-error' : '' }}">-->
        <!--        <input id="email" type="email" class="form-control" placeholder="أكتب بريدك الإلكترونى" name="email" value="{{ old('email') }}" >-->
                <!-- <input type="text" name="user" class="form-control" placeholder="أسم المستخدم  أو رقم الجوال"> -->
        <!--        @if ($errors->has('email'))-->
        <!--            <span class="help-block">-->
        <!--                <strong>{{ $errors->first('email') }}</strong>-->
        <!--            </span>-->
        <!--        @endif-->
        <!--    </div>-->
        <!--</div>-->
        <!--<br>-->
        <div class="contentBox">
            <div class="col-md-2">
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
            <div class="col-md-2">
                <label>أعد كتابة الرقم السرى</label>
            </div>
            <div class="box2">
                <input id="password_confirmation" type="password" class="form-control" placeholder="أعد كتابة الرقم السرى" name="password_confirmation" required>
            </div>
        </div>
        <!--<div class="contentBox">-->
        <!--    <div class="col-md-2">-->
        <!--        <label>اضف صورتك الشخصيه</label>-->
        <!--    </div>-->
        <!--    <div class="box2">-->
        <!--        <input type="file" class="form-control" name="image" required>-->
        <!--    </div>-->
        <!--</div>-->
        {{--<div class="contentBox">--}}
            {{--<div class="col-md-2">--}}
                {{--<label>اضف مدينتك</label>--}}
            {{--</div>--}}
            {{--<div class="box2">--}}
                {{--<select name="city" id="city">--}}
                    {{--<option value="" disabled="disabled" selected>اختر مدينتك </option>--}}
                    {{--@foreach(\App\Area::where('parent_id','!=',0)->get() as $city)--}}
                            {{--<option value="{{$city->name}}">{{$city->name}}</option>--}}
                        {{--@endforeach--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--}--}}
        <div class="contentBox">
            <div class="col-md-2">
                <label>اضف دولتك</label>
            </div>
        <select class="form-control area-change" name="country" data-level="country">
            <option value="" >اختر دولتك </option>
            @foreach(\App\Area::where('parent_id','=',0)->get() as $area)
                <option value="{{$area->id}}")>{{$area->name}}</option>
            @endforeach
        </select>
        </div>
        <br />
        <div class="contentBox">
            <div class="col-md-2">
                <label>اضف مدينتك</label>
            </div>
        <select class="form-control area-change" name="city" data-level="city">
            <option value="" >اختر مدينتك </option>
        </select>
        </div>
            <br>
        <div class="contentBox">
            <div class="col-md-2"></div>
            <div class="box2">
                <br>
                <br>
                <button class="button" type="submit"> تسجيل » </button>
                <hr>التسجيل في موقع حراج الأغنام و الإبل  يتطلب وجود رقم جوال. جميع معلوماتك لدينا هي أمانة في ذمتنا ونتعهد بالحفاظ عليها. لمزيد من التفاصيل، نرجو زيارة صفحة معاهدة استخدام الموقع.
            </div>
        </div>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
@endsection
@section('footer')
    <script>
        jQuery(document).ready(function ($) {

            $(document).on('change', ".area-change",function ()
            {
                if( $(this).data('level') == 'country' ) {
                    var id			= $(this).val(),
                        nextLevel	= ".area-change[data-level=city]",
                        nextMsg		= 'اختر مدينتك';
                    $.ajax({
                        method: "GET",
                        type: "json",
                        url: "{{route('get-child')}}",
                        data: {id: id},
                        success: function (response) {
                            //console.log(response);
                            if (response.status) {
                                $(nextLevel).empty().show().append('<option value="">' + nextMsg + '</option>');

                                $.each(response.result, function (key, value) {
                                    $(nextLevel).append('<option value="' + value.id + '">' + value.name + '</option>');
                                });
                            }
                            else {
                                console.log(response);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection