                    <div class="menu">
                    @inject('users', '\App\User')
                    @if($user = $users->find($user_to))
                        <a href="{{url('users/'.$user_to)}}" target="_blank">
                            <div class="back"></div>
                            <div class="name" style="cursor: pointer;">{{$user->name}}</div>
                        </a>
                    @else
                      <div class="back"><img src="{{Request::root().'/public/upload/users/noImage.png'}}" draggable="false"/></div>
                      <div class="name">عضو محظور</div>
                    @endif
                    </div>
                    <ol class="chat">
                    @foreach($messages as $msg)
                        <li class="{{$msg->user_id == $user_id ? 'other' : 'self'}}">
                            @if($msg->User)
                            <div class="avatar"></div>
                            @else
                            <div class="avatar"><img src="{{Request::root().'/public/upload/users/noImage.png'}}" draggable="false"/></div>
                            @endif
                            <div class="msg">
                                <p >{{$msg->body}}</p>
                                <time> منذ {{ timeToStr(strtotime($msg->created_at))}}</time>
                            </div>
                        </li>
                    @endforeach
                    </ol>
