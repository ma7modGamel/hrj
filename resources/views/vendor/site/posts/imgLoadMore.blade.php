            @foreach($posts as $post)
            <div class="adxImg">
                <a href="{{url('ads/'.$post->id.'/'.editTitle($post->title))}}">
                <img itemprop="image" alt="text" src="{{image_check_thumps(\App\UpImage::where('post_id',$post->id)->where('type','posts')->pluck('img_name')->first(),'posts')}}" title="{{$post->title}}">
                <br>{{$post->title}}</a>
            </div>
            @endforeach
