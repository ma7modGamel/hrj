<div class="msgConv">
    <div class="msgHeader">
        <b>رد : رسالة خاصة إلى {{$newMsg->UserTo->name}}</b>
        <br> المرسل:
        <a href="{{url('users/'.$newMsg->UserTo->id)}}" class="username"> <i class="fa fa-user"></i> {{$newMsg->User->name}}</a>
        <br> قبل : {{ timeToStr(strtotime($newMsg->created_at))}}
    </div>
    <div class="msgBody">
        {{$newMsg->body}}
        <div style="clear:both;"></div>
        <span style="float: left;"></span>
        <div style="clear:both;"></div>
    </div>
</div>
