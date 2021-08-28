@extends('layouts.app')

@section('title')
الرسائل المرسلة
@endsection

@section('content')
<div class="container">
<br /><br /><br />
<div class="singleContent">
    <div class="msgs">
        <h3>&nbsp; <i class="fa fa-envelope "></i> الرسائل المرسلة</h3>
        <form id="postform" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="adsx">
            @if(count($messages))
            @php $num = 0; @endphp
            @foreach($messages as $msg)
            <div class="msg {{$num % 2 != 0 ? '' : 'adv-3'}}">
                @if($msg->UserTo)
                <div class="msgInfo"><a href="{{url('conv/'.$msg->UserTo->id)}}" class="msgTitleDisabled">رد : {{str_limit($msg->body,50)}} </a>
                    <br>
                    <input type="hidden" name="msg[]" value="{{$msg->id}}"><a href="{{url('users/'.$msg->UserTo->id)}}" class="username"><i class="fa fa-user"></i> {{$msg->UserTo->name}}</a>
                </div>
                @else
                <div class="msgInfo"><a href="#" class="msgTitleDisabled">رد : {{str_limit($msg->body,50)}} </a>
                    <br>
                    <input type="hidden" name="msg[]" value="{{$msg->id}}"><i class="fa fa-user-times "></i> عضو محذوف</a>
                </div>
                @endif
                <div class="msgMeta">
                    <br>قبل {{ timeToStr(strtotime($msg->created_at))}}
                </div>
            </div>
            @php $num++; @endphp
            @endforeach
            @else
            <div class="alert alert-info"> لا توجد رسائل </div>
            @endif
            </div>
            @if(count($messages) >= 10)
            <div class="ajax-load text-center" style="display:none">
                <img src="https://www.sgjbnow.com/wp-content/themes/johor/images/loading.gif" height="25" width="92">
            </div>
            <div id="AJAXloaded">
                <div class="loadmore">
                    <ul class="pagination">
                        <li class="active">
                            <a id="load-more">مشاهدة المزيد ...</a>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
            <br>
            <br>
            <br>
            <button class="button btn-danger" type="submit" id="remove" style="color: #d9534f;background-color: #fff;border-color: #d43f3a;">حذف جميع الرسائل »</button>
        </form>
        <hr>
        <a href="{{url('inbox')}}">الرسائل الوارده</a>
        <br>
    </div>
</div><br /><br />
</div>
@endsection
@section('footer')
<script type="text/javascript">
$(document).on("click","#load-more",function() {
    var page = 1;
   page=page+1;
   loadMoreData(page);
});

function loadMoreData(page){
    $.ajax({
        url: '?page=' + page,
        type: "get",
        beforeSend: function(){
            $('#load-more').hide();
            $('.ajax-load').show();
        }
    }).done(function(data){
        if(data.html == ''){
            $('#load-more').hide();
            $('.ajax-load').html('<div class="alert"><center> لا توجد نتائج أخرى </center></div>');
            return;
        }
        $('#load-more').show();
        $('.ajax-load').hide();
        $(".adsx").append(data.html);
    }).fail(function(jqXHR, ajaxOptions, thrownError){
        alert('server not responding...');
    });

    $('.ajax-load').empty();
    $('.ajax-load').append('<img src="https://www.sgjbnow.com/wp-content/themes/johor/images/loading.gif" height="25" width="92">');
}

// Delete Messages
$(document).on("click","#remove",function(e) {
    e.preventDefault();
    var url = "{{url('delMessages')}}",
        data    = $('#postform').serialize();
    $.post(url,data,function (data) {
      if(data=="hide"){
        $('.adsx').empty();
        $('.adsx').append('<div class="alert alert-success"> تم حذف الرسائل المختاره </div>');
      } else if (data=="error"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["error"]("حدث خطأ برجاء المحاولة فى وقت لاحق")
      }
    });
});

</script>

@endsection
