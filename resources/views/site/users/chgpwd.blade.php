@extends('layouts.app')

@section('title')
تغير الرقم السرى
@endsection
@section('content')


<div class="singlePage container">
  <h3>تغيير الرقم السرى</h3>
  <span id="output"></span>
  <br>
  <form method="post" id="chgpwdForm" enctype="multipart/form-data" style="border: 1px solid #eee; margin: 0 auto; padding: 10px">
    {{csrf_field()}}
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <input class="form-control" type="password" placeholder="الرقم السرى القديم" name="curPassword" value="">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <input class="form-control" type="password" placeholder="الرقم السرى الجديد" name="password" value="">
        </div>
        <div class="col-xs-12 col-md-6">
            <input class="form-control" type="password" placeholder="تأكيد الرقم السرى" name="password_confirmation" value="">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <input id="chgpwdSubmit" class="button chgpwdSubmit" type="submit" value="تغيير" style="font-size: 16px;">
        </div>
    </div>
  </form>
</div>

@endsection
@section('footer')
<script type="text/javascript">
  $(document).on("click","#chgpwdSubmit",function(e) {
    var done = true;
    $('input[type=password]').each(function(){
      if($(this).val() == ""){
        alert('فضلا أدخل ' + $(this).attr('placeholder'));
        $(this).focus();
        e.preventDefault();
        return done = false;
      }
    });
    if($('input[name=password]').val() != $('input[name=password_confirmation]').val()){
      alert('كلمتى المرور غير متطابقتين');
        $('input[name=password]').focus();
        return done = false;
    }
    if($('input[name=password]').val().length < 6 && $('input[name=password]').val() != ""){
      alert('يجب أن لا يقل الرقم السرى عن 6 أحرف');
      $('input[name=password]').focus();
      return done = false;
    }
    if(done == true){
      chgpwdSubmit(e);
    }else{
      return done;
    }
  });

// notifi for mail
function chgpwdSubmit (e) {
    e.preventDefault();
    var url     = '{{url("chgpwd")}}',
        data    = $('#chgpwdForm').serialize(),
        a=$(this);
    $.post(url,data,function (data) {
        if(data == 'done'){
          $('input[type=password]').each(function(){
            $(this).val('');
          });
          $('#output').append('<div class="alert alert-success">تم تغير الرقم السرى بنجاح</div>');
        }else if (data == 'Wrong'){
          alert('الرقم السرى القديم غير صحيح');
          $('input[name=curPassword]').focus();
        }else if (data == 'error'){
          $('#output').append('<div class="alert alert-danger">حدث خطأ نرجو المحاولة فى وقت لاحق</div>');
        }
    });
};
</script>
@endsection