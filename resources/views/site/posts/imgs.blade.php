@extends('layouts.app')


@section('header')

@endsection

@section('content')
<div class="container">
    <div id="tagPicPage" class="pageContent">
        <div class="adsxPic">
            @foreach($posts as $post)
            <div class="adxImg">
                {{--<a href="{{url('ads/'.$post->id.'/'.editTitle($post->title))}}">--}}
                {{--<img itemprop="image" alt="text" src="{{image_check_thumps(\App\UpImage::where('post_id',$post->id)->where('type','posts')->pluck('img_name')->first(),'posts')}}" title="{{$post->title}}">--}}
                {{--<br>{{$post->title}}</a>--}}
                <a href="{{url('ads/'.$post->id.'/'.editTitle($post->title))}}">
                    @if (isset(\App\UpImage::where('post_id',$post->id)->first()->type_way)&& \App\UpImage::where('post_id',$post->id)->first()->type_way == 'image')
                        <img src="{{asset('/public/upload/posts').'/'.\App\UpImage::where('post_id',$post->id)->where('type','posts')->pluck('img_name')->first(),'posts'}}" title="{{$post->title}}">
                    @else
                        <img src="{{asset('/public/upload/images/default-video.jpg')}} " title="{{$post->title}}">
                    @endif
                </a>
            </div>
            @endforeach
        </div>
        @if(count($posts) >= 30)
        <div class="ajax-load text-center" style="display:none">
            <img src="https://www.sgjbnow.com/wp-content/themes/johor/images/loading.gif" height="50" width="92">
        </div>
        <div id="AJAXloaded">
            <div class="loadmore">
                <ul class="pagination">
                    <li class="active">
                        <a id="load-more">مشاهدة المزيد ...
                            <img id="lodingGif" src="{{Request::root()}}/public/upload/logo/loading.gif" height="25" width="25" style="display: none;">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

<!-- footer -->
@section('footer')
<script type="text/javascript">
    var page = 1;
$(document).on("click","#load-more",function() {
   page=page+1;
   loadMoreData(page);
});

function loadMoreData(page){
    $.ajax({
        url: '?page=' + page,
        type: "get",
        beforeSend: function(){
            // $('#load-more').hide();
            $('#lodingGif').show();
        }
    }).done(function(data){
        if(data.html == ""){
            $('#load-more').hide();
            $('.ajax-load').html('<div class="alert"><center> لا توجد نتائج أخرى </center></div>');
            $('.ajax-load').show();
            return;
        }
        // $('#load-more').show();
        $('#lodingGif').hide();
        $(".adsxPic").append(data.html);
    }).fail(function(jqXHR, ajaxOptions, thrownError){
        alert('server not responding...');
    });
}
</script>
@endsection




