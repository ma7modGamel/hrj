@extends('layouts.app')

@section('title')
تحديث البريد
@endsection
@section('header')

@endsection
@section('content')
<div class="singlePage container">
    <h3>الإشتراك البريدي</h3>
    <span id="output"></span>
    <br>
    <form method="post" id="updataEmailForm" style="border: 1px solid #eee;margin: 0 auto;">
        {{csrf_field()}}
        <table class="table tableMsg table-borderedAds tableextra" style="margin-bottom: 0px;">
            <tbody>
                <tr>
                    <td class="row1" width="28%"><b class="genmed">رقمك السري:</b></td>
                    <td class="row2" align="right">
                        <input class="form-control" type="password" name="curPassword" size="45" value="">
                        <br>
                    </td>
                </tr>
                <tr>
                    <td class="row1" width="28%"><b class="genmed">بريدك الجديد</b></td>
                    <td class="row2" align="right">
                        <input class="form-control" type="email" name="email" size="45" value="">
                        <br>
                        <span class="label label-success">أدخل بريد صحيح</span>
                    </td>
                </tr>
                <tr>
                    <td class="row1" width="28%"><b class="genmed">رقم الجوال الحالي</b></td>
                    <td class="row2" align="right"> {{Auth::user()->phone}}
                    </td>
                </tr>
                <tr>
                    <td class="row4" colspan="2" align="center">&nbsp;
                        <input id="updateEmailSubmit" class="button" type="submit" value="تغيير">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
@endsection

@section('footer')
<script type="text/javascript">
$(document).on("click","#updateEmailSubmit",function(e) {
    var done = true,testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    // alert(testEmail.test($('input[name=curPassword]').val()));
    if ($('input[name=curPassword]').val() == '') {
        alert('فضلا أكتب الرقم السرى');
        $('input[name=curPassword]').focus();
        return done = false;
    }
    if ($('input[name=email]').val() == '') {
        alert('فضلا أكتب البريد الإلكترونى');
        $('input[name=email]').focus();
        return done = false;
    }
    if (testEmail.test($('input[name=email]').val()) == false){
        alert('فضلا كتابة البريد الإلكترونى بطريقه صحيحه');
        $('input[name=email]').focus();
        return done = false;
    }
    if(done == true){
      upadteEmailPostFunc(e);
    }else{
      return done;
    }
});

function upadteEmailPostFunc (e) {
    e.preventDefault();
    var url = '{{url("updateemail")}}',
        data = $('#updataEmailForm').serialize();
    $.post(url, data, function(data) {
        if (data == 'done') {
            $('#output').append('<div class="alert alert-success">تم تم تحديث البريد الإلكترونى بنجاح</div>');
            $('input[name=curPassword]').val('');
            $('input[name=email]').val('');
        } else if (data == 'Wrong') {
            alert('الرقم السرى غير صحيح');
            $('input[name=curPassword]').val('');
            $('input[name=curPassword]').focus();
        } else if (data == 'UnUnique') {
            alert('هذا البريد مستخدم مسبقاً');
            $('input[name=email]').val('');
            $('input[name=email]').focus();
        } else {
            $('#output').append('<div class="alert alert-danger">حدث خطأ برجاء المحاولة فى وقت لاحق</div>');
        }
    });
    // return false;
};
</script>
@endsection
