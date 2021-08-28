            @if(count($messages))
            @php $num = 0; @endphp
            @foreach($messages as $msg)
            <div class="msg {{$num % 2 != 0 ? '' : 'adv-3'}}">
                @if($msg->User)
                <div class="msgInfo"><a href="{{url('conv/'.$msg->User->id)}}" class="msgTitleDisabled">رد : {{str_limit($msg->body,50)}} </a>
                    <br>
                    <input type="hidden" name="msg[]" value="{{$msg->id}}"><a href="{{url('users/'.$msg->User->id)}}" class="username"><i class="fa fa-user"></i> {{$msg->User->name}}</a>
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
