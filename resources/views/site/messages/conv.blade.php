@extends('layouts.app')

@section('header')


@section('content')
<div class="singlePage">
    <h4>رسالة خاصة</h4>
    <br>
    <a href="javascript: history.go(-1)">رجوع</a>
    <br>
    <div class="adsx">
    @if(count($messages))
    @foreach($messages as $msg)
    @if($msg->user_id != Auth::user()->id)
    <div class="msgConv">
        <div class="msgHeader">
            <b>رد {{$num}} : رسالة خاصة إلى {{$msg->UserTo->name}}</b>
            <br> المرسل:
            <a href="{{url('users/'.$msg->UserTo->id)}}" class="username"> <i class="fa fa-user"></i> {{$msg->User->name}}</a>
            <br> قبل : {{ timeToStr(strtotime($msg->created_at))}}
        </div>
        <div class="msgBody">
            {{$msg->body}}
            <div style="clear:both;"></div>
            <span style="float: left;"></span>
            <div style="clear:both;"></div>
        </div>
    </div>

    @else

    <div class="msgConv to_pm">
        <div class="msgHeader">
            <b>رد {{$num}} : رسالة خاصة إلى {{$msg->UserTo->name}}</b>
            <br> المرسل:
            <a href="{{url('users/'.$msg->User->id)}}" class="username"> <i class="fa fa-user"></i> {{$msg->User->name}}</a>
            <br> قبل: {{ timeToStr(strtotime($msg->created_at))}}
            <span style="float: left;"> 
                </span>
        </div>
        <div class="msgBody">
            {{$msg->body}}
            <div style="clear:both;"></div>
            <span style="float: left;">
                <span class="{{$msg->status == 0 ? 'blue' : ''}}"> <i class="fa fa-check"></i><i class="fa fa-check"></i></span>
            </span>
            <div style="clear:both;"></div>
        </div>
    </div>
    @endif
    @php $num++; @endphp
    @endforeach
    </div>
    @else
        <div class="alert"> لا توجد رسائل </div>
    @endif

    <div class="alert alert-warning">
        لاتنسى البحث في <a href="{{url('checkacc')}}">القائمة السوداء</a> قبل أي عملية تحويل بنكي.
    </div>
    <br>
    <br>
    <div class="well">
        <form action="" method="post" id="postform" name="postform">
            {{csrf_field()}}
            <textarea name="body" id="msgBody" placeholder="أكتب ردك هنا" class="form-control" rows="7"></textarea>
            <input type="hidden" name="user_to" value="{{$id}}">
            <br>
            <input class="btn btn-primary" id="sendMsg" name="submit" value="إرســـال" type="submit">
        </form>
    </div>
</div>
@endsection

<!-- footer -->
@section('footer')
<!--<script src="https://js.pusher.com/4.1/pusher.min.js"></script>-->

<script type="text/javascript">
// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('34b9ea6826c359c41c3f', {
    cluster: 'eu',
    encrypted: true
});

var channel = pusher.subscribe('Messages');
channel.bind('msgSend{{$id}}msgReceive{{Auth::user()->id}}', function(data) {
    $('.adsx').append(data.html);
    $("html,body").animate({scrollTop: $('.adsx')[0].scrollHeight}, 0);
});


$('#msgBody').keydown(function (e){
    if(e.keyCode==13 && !e.shiftKey){
        $('#sendMsg').click();
    }
});

// follow Post
$(document).on('click','#sendMsg', function (e) {
    e.preventDefault();
    var url     = '{{url("sendMsg/".$id)}}',
    data    = $('#postform').serialize();
    if($('#msgBody').val() == ""){
        alert('فضلا قم بكتابة نص');
        $(this).focus();
        return false;
    }
    $.post(url,data,function (data) {
        if(data != ''){
            $('.adsx').append(data.html);
            $('#msgBody').val('');
            $("html,body").animate({scrollTop: $('.adsx')[0].scrollHeight}, 0);
        }else{
            toastr.options.timeOut = '6000';
            toastr.options.positionClass = 'toast-bottom-left';
            Command: toastr["error"]("حدث خطأ يرجة المحاوله فى وقت لاحق");
        }
    });
});
</script>
@endsection