            @foreach($posts as $post)
            <div class="adxImg">
                {{--<a href="{{url('ads/'.$post->id.'/'.editTitle($post->title))}}">--}}
                {{--<img itemprop="image" alt="text" src="{{image_check_thumps(\App\UpImage::where('post_id',$post->id)->where('type','posts')->pluck('img_name')->first(),'posts')}}" title="{{$post->title}}">--}}
                {{--<br>{{$post->title}}</a>--}}
                <a href="{{url('ads/'.$post->id.'/'.$post->title)}}">
                    @if (isset(\App\UpImage::where('post_id',$post->id)->first()->type_way)&& \App\UpImage::where('post_id',$post->id)->first()->type_way == 'image')
                        <img src="{{asset('/public/upload/posts').'/'.\App\UpImage::where('post_id',$post->id)->where('type','posts')->pluck('img_name')->first(),'posts'}}" title="{{$post->title}}">
                    @else
                        <img src="{{asset('/public/upload/images/default-video.jpg')}} " title="{{$post->title}}">
                    @endif
                </a>
            </div>
            @endforeach
