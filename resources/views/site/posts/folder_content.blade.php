{{--@foreach($posts as $post)--}}
{{--<div class="test">--}}
    {{--<p>test</p>--}}
{{--</div>--}}
{{--@endforeach--}}


<div class="adsx">

    @if($posts->count())

        @php $num=0; @endphp

        @foreach($posts as $post)

            @if($post && $post->User && $post->Area)

                <div class="adv-1 {{$num % 2 != 0 ? '' : 'adv-3'}}">

                    <div class="inneer-adv" {{($post->type == 'مطلوب')?'style= background:#fdf5ff' :''}}>
                        <div class=" adv-pic">
                            <a href="{{url('ads/'.$post->id.'/'.$post->title)}}">

                                @if (isset(\App\UpImage::where('post_id',$post->id)->first()->type_way)&&
                                \App\UpImage::where('post_id',$post->id)->first()->type_way == 'image')

                                    <img
                                            src="{{asset('/public/upload/posts').'/'.\App\UpImage::where('post_id',$post->id)->where('type','posts')->pluck('img_name')->first(),'posts'}}"
                                            title="{{$post->title}}">

                                @else

                                    <img src="{{asset('/public/upload/images/default-video.jpg')}} " title="{{$post->title}}">

                                @endif

                            </a>



                        </div>

                        <div class="content">

                            <div class="inner-img">

                                {{-- <img src="{{asset('public').'/'.\App\User::find($post->user_id)->image}}" class="img-responsive img-thumbnail img-circle" style="width:90px;height: 90px;"> --}}

                                {{-- <p style="text-align:center">{{$post->User->name}}</p> --}}

                            </div>

                            <div class=" adv-tit">

                                <h3><a class="{{in_array('tags',Request::segments()) ? $post->top == 1 ? 'darkgreen' : '' : ''}}"
                                       href="{{url('ads/'.$post->id.'/'.($post->title))}}">{{$post->title}}</a></h3>

                                <div class="text">

                                    <span class="pull-right">

                                        @if($post->top == 1) <i class="gold fa fa-star fa-lg"></i> @endif

                                        {{--<h5><strong>{{$post->type}}</strong></h5>--}}

                                        <a href="{{url('ads/'.$post->id.'/'.($post->title))}}">{{$post->Cmnt->count() ? $post->Cmnt->count().' ردود ': ''}}
                                        </a><br><br>

                                        <a href="{{url('city/'.$post->Area->name)}}"><i class="fa fa-map-marker"></i> {{$post->Area->name}} </a>

                                        {{-- <a href="">{{$post->Area->where('parent_id',$post->Area->id)->first()->name}}</a> --}}

                                        @if($post->soum != 0)

                                            {{--<a href="{{url('users/'.$post->User->id)}}"><i class="fa fa-user"></i> {{soum()[$post->soum]}}</a>--}}



                                        @else

                                        @endif

                                    </span>

                                    <span class="pull-left">

                                        <a href="{{url('ads/'.$post->id.'/'.($post->title))}}">السعر {{$post->price}} ريال</a><br>

                                        <a href="{{url('ads/'.$post->id.'/'.($post->title))}}">قبل
                                            {{ timeToStr(strtotime($post->created_at))}}</a><br>

                                        {{--<a href="{{url('users/'.$post->User->id)}}" class="user"><i class="fa fa-user"></i>
                                        {{$post->User->name}}</a>--}}



                                    </span>

                                </div>

                            </div>

                        </div>



                    </div>

                </div>

                @php $num++; @endphp

            @endif



        @endforeach

    @else

        <div class="alert"><center> لا توجد نتائج مطابقه لبحثك </center></div>

    @endif

</div>