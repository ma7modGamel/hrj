@extends('layouts.app')

@section('title')
القائمة السوداء
@endsection
@section('header')

@endsection
@section('content')
<div class="singlePage container">
    <div class="note">
        <h3 class="green">البحث في القائمة السوداء</h3>
         القائمة السوداء هي قائمة بإرقام حسابات وأرقام جوالات من يقومون بإساءة إستخدام الموقع لأغراض ممنوعه مثل الغش أو الأحتيال أو مخالفة قوانين الموقع
        <br>
        <br>
        <span id="output"></span>
        <form id="checkAccForm" novalidate="">
            {{csrf_field()}}
            <input name="acc_num" size="30" placeholder="أدخل رقم الحساب أو رقم الجوال هنا" type="text" pattern="[0-9]*" class="form-control">
            <br>
            <input name="submit" id="checkAccSubmit" class="btn btn-primary" value="فحص »" type="submit">
        </form>
        <br>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript">
$(document).on("click","#checkAccSubmit",function(e) {
    var done = true,testNum = /^[0-9]/i;
    if ($('input[name=acc_num]').val() == ''){
        alert('فضلا كتابة الرقم المراد فحصه');
        $('input[name=acc_num]').focus();
        return done = false;
    }
    if (testNum.test($('input[name=acc_num]').val()) == false){
        alert('فضلا كتابة أرقام فقط');
        $('input[name=acc_num]').val('');
        $('input[name=acc_num]').focus();
        return done = false;
    }
    if(done == true){
      checkAccFunc(e);
    }else{
      return done;
    }
});

function checkAccFunc (e) {
    e.preventDefault();
    var url = '{{url("checkacc")}}',
        data = $('#checkAccForm').serialize();
    $.post(url, data, function(data) {
        if (data == 'found') {
            $('#output').empty();
            $('#output').append('<div class="alert alert-danger">الرقم موجود بالفعل !! إحذر التعامل معه</div>');
            $('input[name=acc_num]').val('');
        } else if (data == 'notFound') {
            $('#output').empty();
            $('#output').append('<div class="alert alert-success">رقم الحساب او الجوال غير موجود في القائمة السوداء</div>');
            $('input[name=acc_num]').val('');
        } else {
            $('#output').append('<div class="alert alert-danger">حدث خطأ برجاء المحاولة فى وقت لاحق</div>');
        }
    });
    // return false;
};
</script>
@endsection
