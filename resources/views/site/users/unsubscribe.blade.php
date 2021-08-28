@extends('layouts.app')

@section('title')
التحكم فى الإشعارات
@endsection
@section('header')

@endsection
@section('content')
<div class="singlePage container">
    <h3>الإشتراك البريدي</h3>
    <span id="output"></span>
    <br>
    <form method="post" id="mailNotifiForm" enctype="multipart/form-data" style="border: 1px solid #eee;margin: 0 auto;">
        {{csrf_field()}}
        <table class="table  tableMsg table-borderedAds tableextra">
            <tbody>
                <tr>
                    <th width="5%"><b>اختيار</b></th>
                    <th><b>خدمة الإشعار البريدي</b></th>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="cmnt" {{explode(',',Auth::user()->notf)[0] == 1 ? 'checked' : ''}} value="1">
                    </td>
                    <td>الإشعار عن الردود عن الإعلانات</td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="msgs" {{explode(',',Auth::user()->notf)[1] == 1 ? 'checked' : ''}} value="1">
                    </td>
                    <td>الإشعار عن الرسائل الخاصة الجديدة</td>
                </tr>
                <tr class="row2">
                    <td>
                        <input type="checkbox" name="newPost" {{explode(',',Auth::user()->notf)[2] == 1 ? 'checked' : ''}} value="1">
                    </td>
                    <td>الإشعار بوجود سلعه جديدة تقوم بمتابتعها</td>
                </tr>
                <tr>
                    <td colspan="2" align="center">&nbsp;
                        <input id="mailNotifiSubmit" class="btn  btn-primary" type="submit" value="تعديل">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
@endsection

@section('footer')
<script type="text/javascript">
// notifi for mail
$(document).on("click","#mailNotifiSubmit",function(e) {
    e.preventDefault();
    var url     = '{{url("unsubscribe")}}',
        data    = $('#mailNotifiForm').serialize();
        a=$(this);
    $.post(url,data,function (data) {
        if(date = 'done'){
            $('#output').append('<div class="alert alert-success">تم التعديل</div>');
        }else{
            $('#output').append('<div class="alert alert-danger">حدث خطأ برجاء المحاولة فى وقت لاحق</div>');
        }
    });
});
</script>
@endsection
