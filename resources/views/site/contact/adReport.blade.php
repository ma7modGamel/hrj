@extends('layouts.app')

@section('title')
إبلاغ عن إعلان مخالف؟
@endsection

@section('header')

@endsection

@section('content')
<div class="singleContent col-md-11">
    <h3>إبلاغ عن إعلان مخالف </h3>

<form action="{{url('adsReport')}}" method="POST" onsubmit="return validate_form(this);" style="border: 1px solid #eee;">
    {{ csrf_field() }}   
    <table class="table  tableMsg table-borderedAds tableextra">
        <tbody><tr>
            <td>
                <div class="alert alert-warning">
                    تحذير:هذا النموذج مخصص فقط للإبلاغ عن الاعلانات المخالفه وليس للتواصل مع صاحب الاعلان
                </div>
                <input type="hidden" name="name" value="{{Auth::check() ? Auth::user()->name : 'report'}}">
                <input type="hidden" name="email" value="{{Auth::check() ? Auth::user()->email : 'report'}}">
                <input type="hidden" name="phone" value="{{Auth::check() ? Auth::user()->phone : 'report'}}">
                <input type="hidden" name="type" value="2">
                <input type="hidden" name="user_id" value="{{Auth::check() ? Auth::user()->id : 0}}">
                <div class="alert alert-info">
                الرسائل المرسلة عبر هذا النموذج لن تصل إلى صاحب الإعلان!</div>
                هل هذا الإعلان مخالف؟   
                <br>
                <input name="subject" id="reportYes" type="radio" value="إبلاغ عن إعلان مخالف رقم {{$_GET['ad_Id']}}"> 
                نعم
                <br>  <input name="subject" id="reportNo" type="radio" value="إبلاغ عن إعلان غير مخالف رقم {{$_GET['ad_Id']}}"> 
                لا
                <br>
                <br>
                <textarea rows="6" name="body" id="message" class="form-control">إبلاغ عن الإعلان رقم {{$adId}}
=========================
من فضلك أذكر سبب الإبلاغ عن الإعلان هنا
=========================
</textarea>
                <br>
                <input class="btn  btn-primary" name="submit" value="إرســـال" type="submit">
            </td>
        </tr>
        
    </tbody></table>
</form>

</div>

@endsection

<!-- footer -->
@section('footer')
<script type="text/javascript">
    function validate_form(form){
        if(!($('#reportYes').is(':checked') || $('#reportNo').is(':checked'))){
            alert('يجب الإجابة على السؤال');
            return false ;
        }else if ($('#message').val() == "") {
           alert('فضلا قم بكتابة سبب الابلاغ عن الاعلان');
           form.body.focus();
           return false ;
        }
        return true ;
    }
</script>

@endsection

