            @foreach($posts as $post)
            <div class="adv-1 {{$num % 2 != 0 ? '' : 'adv-3'}}">
                <div class="row">
                    <div class="col-md-6">
                        <h3><a class="{{in_array('tags',Request::segments()) ? $post->top == 1 ? 'darkgreen' : '' : ''}}" href="{{url('ads/'.$post->id.'/'.editTitle($post->title))}}">{{$post->title}}</a></h3>
                        <div class="text">
                            <span class="pull-right">
                                @if($post->top == 1) <i class="gold fa fa-star fa-lg"></i> @endif
                                <a href="{{url('ads/'.$post->id.'/'.editTitle($post->title))}}">{{$post->Cmnt->count() ? $post->Cmnt->count().' ردود ': ''}} </a><br>
                                <a href="{{url('city/'.$post->Area->name)}}"><i class="fa fa-map-marker"></i>  {{$post->Area->name}}</a>
                            </span>
                            <span class="pull-left">
                                <a href="{{url('ads/'.$post->id.'/'.editTitle($post->title))}}">قبل {{ timeToStr(strtotime($post->created_at))}}</a><br>
                                <a href="{{url('users/'.$post->User->id)}}"><i class="fa fa-user"></i> {{$post->User->name}}</a>

                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text">
                            <span class="pull-left">
                                <a href="{{url('ads/'.$post->id.'/'.editTitle($post->title))}}">السعر {{$post->price}} جنيه</a><br>
                                <a href="{{url('users/'.$post->User->id)}}"><i class="fa fa-user"></i> {{soum()[$post->soum]}}</a>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a href="{{url('ads/'.$post->id.'/'.editTitle($post->title))}}"><img src="{{image_check_thumps(\App\UpImage::where('post_id',$post->id)->where('type','posts')->pluck('img_name')->first(),'posts')}}" title="{{$post->title}}"></a>
                    </div>
                </div>
            </div>
            @php $num++; @endphp
            @endforeach
