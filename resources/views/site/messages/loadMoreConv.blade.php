<div class="msgConv to_pm">
    <div class="msgHeader">
        <b>رد : رسالة خاصة إلى {{$newMsg->User->name}}</b>
        <br> المرسل:
        <a href="{{url('users/'.$newMsg->User->id)}}" class="username"> <i class="fa fa-user"></i> {{$newMsg->User->name}}</a>
        <br> قبل: {{ timeToStr(strtotime($newMsg->created_at))}}
        <span style="float: left;"> 
            </span>
    </div>
    <div class="msgBody">
        {{$newMsg->body}}
        <div style="clear:both;"></div>
        <span style="float: left;">
            <span class="{{$newMsg->status == 0 ? 'blue' : ''}}"> <i class="fa fa-check"></i><i class="fa fa-check"></i></span>
        </span>
        <div style="clear:both;"></div>
    </div>
</div>
