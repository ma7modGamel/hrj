@extends('layouts.app')

@section('title')
{{$post->title}}
@endsection

@section('header')

@endsection

@section('description')
{{$post->title}}
@endsection

@section('keywords')
{{str_limit($post->body,160)}}
@endsection

@section('og_title')
{{$post->title}}
@endsection

@section('og_description')
{{str_limit($post->body,160)}}
@endsection




@section('content')
<div class="col-md-9 right_el">
    <div class="pageContent">
        <div class="top_h">
            <h4> »  {{$post->title}}</h4>
            <div class="row">
                <div class="col-md-6">
                    <h4><a href="{{url('city/'.$post->Area->name)}}"><i class="fa fa-map-marker"></i> {{$post->Area->name}}</a></h4>
                    <h5> قبل {{ timeToStr(strtotime($post->created_at))}}</h5>
                    @if($post->updated_at > $post->created_at)
                    <h5> آخر تحديث {{ timeToStr(strtotime($post->updated_at))}}</h5>
                    @endif
                </div>
                <div class="col-md-6">
                    @if($post->User)
                    <h4><a href="{{url('users/'.$post->user_id)}}"><i class="fa fa-user"></i> {{$post->User->name}}</a></h4>
                    <h5>#{{$post->User->id}}</h5>
                    @else
                    <h4><a><i class="fa fa-user"></i>عضو محظور</a></h4>
                    <h5>#00000000000000000</h5>
                    @endif
                </div>
            </div>
            <h5>
                @if(count($post->where('id', '>', $post->id)->get()) > 0)
                <a href="{{Request::root()}}/ads/{{$post->where('id', '>', $post->id)->first()->id}}" class="pull-left">  التالى &#8592;</a></h5>
                @endif
                @if(count($post->where('id', '<', $post->id)->get()) > 0)
                <a href="{{Request::root()}}/ads/{{$post->where('id', '<', $post->id)->orderBy('id','desc')->first()->id}}" class="pull-right">&#8594; السابق </a></h5>
                @endif
                <div class="clearfix"></div>
            </div>
            <div class="adxBody">
                <h3>
                    {{$post->body}}
                </h3>
                @foreach(\App\UpImage::where('post_id',$post->id)->get() as $image)
                @if($image->type == 'posts')
                <center><img src="{{image_check($image->img_name,'posts')}}"></center>
                <br>
                @endif
                @endforeach
                <br />
                <div class="contact">
                    <span class="label label-success">وسيلة الإتصال :</span>
                    <br /><strong><a href="{{url('users/'.$post->user_id)}}"><i class="fa fa-phone"></i> {{$post->contact}} </a></strong>
                    <br />
                    <br />
                </div>
                <div class="green rating">
                    @if($post->User->Rating()->where('type',1)->count())
                    @foreach($post->User->Rating()->where('type',1)->get() as $rate)
                    <i class="fa  fa-thumbs-up"></i>
                    @endforeach
                    {{$post->User->Rating()->where('type',1)->count()}} عضو ينصحون بالتعامل.
                    @endif
                </div>
                <br />
            </div>

        </div>
        @if(Auth::check() ? $post->user_id == Auth()->user()->id : false)
        <div class="input-icon-wrap s2s">
            <a href="{{url('edit/'.$post->id)}}"><i class="fa fa-pencil fa-3x"></i><br> تعديل</a>
            <a href="{{url('adsUpdated/'.$post->id)}}"><i  class="fa fa-refresh  fa-3x"></i><br> تحديث</a>
            <a href="{{url('adsDelete/'.$post->id)}}"><i class="fa fa-trash-o  fa-3x"></i><br> حذف</a>
            <a href="{{url('updateLocation?ad_Id='.$post->id)}}"><i class="fa fa-map-marker  fa-3x"></i><br> تعديل الموقع</a>
        </div>
        <hr>
        <div class="clearfix"></div>
        <hr>
        @endif
        <div class="input-icon-wrap">
            <a href="{{url('sendMsg/'.$post->user_id.'?ad_Id='.$post->id)}}"><i class="fa fa-envelope  fa-2x"></i> </a>
            @if(Auth::check())
            @if($post->Users()->where('user_id',Auth::user()->id)->count())
            <span><a href="#!" id="{{$post->user_id != Auth::user()->id ? 'favPost' : ''}}"><span>{{$post->Users()->count()}}</span><i class="fa fa-heart fa-2x favad"></i></a></span>
            @else
            <span><a href="#!" id="{{$post->user_id != Auth::user()->id ? 'favPost' : ''}}"><span>{{$post->Users()->count()}}</span><i class="fa fa-heart-o fa-2x"></i></a></span>
            @endif
            @else
            <span><a><span>{{$post->Users()->count()}}</span><i class="fa fa-heart-o fa-2x"></i></a></span>
            @endif
            <a href="{{url('adsReport?ad_Id='.$post->id)}}"><i class="fa fa-flag fa-2x"></i> </a>
            <a href="whatsapp://send?text={{Request::url()}}"><i class="fa  fa-whatsapp fa-2x"></i></a>
            <a href="https://twitter.com/intent/tweet?text={{Request::url()}}"><i class="fa fa-twitter  fa-2x"></i></a>
        </div>
        <div class="clearfix"></div>
        <hr>
        <br>
        <div class="metaBody">
            <a href="{{url('tags/'.$post->Cat->name)}}">{{$post->Cat->name}}</a>
            <br />
            <br />
            <a href="{{url('city/'.$post->Area->name)}}">{{$post->Area->name}}</a>
        </div>
        <br />
        <br />
        <div class="alert alert-warning">
           إحذر من التعامل غير المباشر. <br>
           إستخدم <a href="{{url('checkacc')}}">القائمة السوداء</a> قبل أي عملية تحويل
       </div>
       <br>
       @php $num = 1 @endphp
       @foreach($post->Cmnt as $cmnt)
       <div class="comment">
        <div class="commentHeader">
            <div class="adxExtraInfo">
                <div class="adxExtraInfoPart">
                    @if($cmnt->User)
                    ›› &nbsp; <a href="{{url('users/'.$cmnt->user_id)}}" class="usernames {{Auth::check() ? $post->user_id == $cmnt->user_id ? 'red' : '' : ''}}">{{$cmnt->User->name}}</a> 
                    @if(Auth::check() ? $cmnt->user_id != Auth()->user()->id : false)
                    <a href="{{url('sendMsg/'.$cmnt->user_id)}}"><i class="fa fa-envelope"></i></a> &nbsp;
                    @endif
                    @else
                    ›› &nbsp; <a class="usernames">عضو محظور</a> <a><i class="fa fa-envelope"></i></a> &nbsp;
                    @endif
                    @if(Auth::check() ? $post->user_id == Auth()->user()->id : false)
                    <span class="label label-default"> جديد </span> &nbsp;
                    @endif
                    @if(Auth::check() ? $cmnt->user_id == $post->user_id : false)
                    <span class="green "><i class="fa fa-bullhorn"></i></span>
                    @endif
                </div>
                <div class="adxExtraInfoPart pull-left">
                    <div class="moveLeft">
                        ››
                        <a href="#{{$num}}" id="{{$num}}">{{$num}}</a>
                    </div>
                </div>
            </div>
            ›› &nbsp;  قبل {{ timeToStr(strtotime($cmnt->created_at))}}
            <div class="reportPanel">
                {{--
                <span class="report pull-left"><i class="fa fa-flag"></i>  إبلاغ  </span>
                --}}
            </div>
        </div>
    </div>
    <div class="commentBody">
        {{$cmnt->body}}
    </div>
    <br>
    @php $num++; @endphp
    @endforeach
    @if(!Auth::check())
    <div class="alert alert-info">
        يجب عليك <a href="{{url('login')}}">تسجيل الدخول</a> حتى تتمكن من إضافة رد.
    </div>
    @else
    <div class="allComments metaBody">     
        <div class="metaBody">
            <br>
            @if($post->user_id != Auth::user()->id)
            @if($post->Users()->where('user_id',Auth::user()->id)->count())
            <button id="followPost" data-status="0" data-token="{{ csrf_token() }}" class="button addfav"> <i class="fa fa-check"></i> تمت متايعة الردود </button>
            @else
            <button id="followPost" data-status="1" data-token="{{ csrf_token() }}" class="button addfav"> متابعة الردود <i class="fa fa-feed"></i></button>
            @endif
            @endif
        </div>        
    </div>
    <br>
    <br>
    <form action="{{url('addCmntPost')}}" method="post">
        {{ csrf_field() }}
        <div class="well">
            <span class="red">بخس السلعة يؤدي الى حظر العضوية.</span>
            <br>
            <br>
            <textarea name="body" rows="8" placeholder="أكتب سؤالك للمعلن هنا" class=" comment_body" style="width: 100%; padding: 10px"></textarea>
            <input class="hidden" name="post_id" value="{{$post->id}}">
            <br>
            <input class="btn btn-info"  value="إرســـال  »" type="submit">
        </div>
    </form>
    @endif
</div>

<br>
<br>
@if(\App\Post::where('cat_id',$post->cat_id)->where('area_id',$post->area_id)->where('id','!=',$post->id)->count())
<div class="col-md-3 silvered">
    <div class="tit_pics">
        <a class="tag" href="{{url('tags/'.$post->Cat->name.','.$post->Area->name)}}"># {{$post->Cat->name .' فى  '.$post->Area->name}}</a>
        <div class="pics">
            @foreach(\App\Post::where('cat_id',$post->cat_id)->where('area_id',$post->area_id)->where('id','!=',$post->id)->paginate(15) as $similar)
            <a href="{{url('ads/'.$similar->id.'/'.$similar->title)}}"><img src="{{image_check(\App\UpImage::where('post_id',$similar->id)->where('type','posts')->pluck('img_name')->first(),'posts')}}"></a>
            @endforeach
        </div>
    </div>
    <br />
</div>
@endif

<hr style="padding: 1px;">
@if(\App\Post::where('cat_id',$post->cat_id)->where('id','!=',$post->id)->count())
<div class="col-md-3 silvered">
    <div class="tit_pics">
        <a class="tag" href="{{url('tags/'.$post->Cat->name)}}"># {{$post->Cat->name}}</a>
        <div class="pics">
            @foreach(\App\Post::where('cat_id',$post->cat_id)->where('id','!=',$post->id)->paginate(15) as $similar)
            <a href="{{url('ads/'.$similar->id.'/'.$similar->title)}}"><img src="{{image_check(\App\UpImage::where('post_id',$similar->id)->where('type','posts')->pluck('img_name')->first(),'posts')}}"></a>
            @endforeach
        </div>
    </div>
    <br />
</div>
@endif
<br>
<br>





@endsection

@section('footer')
<script type="text/javascript">
$(document).on("click","#favPost",function() {
    var favNum = $(this).find('span').text();
    if($(this).find('i').hasClass('fa-heart-o')){
        $(this).find('i').removeClass('fa-heart-o');
        $(this).find('i').addClass('fa-heart');
        $(this).find('i').addClass('favad');
        $(this).find('span').text(++favNum);
    }else{
        $(this).find('i').removeClass('favad');
        $(this).find('i').removeClass('fa-heart');
        $(this).find('i').addClass('fa-heart-o');
        $(this).find('span').text(--favNum);
    }
    $('#followPost').click();
});
// follow Post
$('#followPost').on('click', function (e) {
    e.preventDefault();
    var url     = '{{url("followPost")}}',
        token   = $(this).data('token'),
        status  = $(this).attr('data-status'),
        post_id = '{{$post->id}}',
        a=$(this);
    $.post(url,{_method: 'post', _token :token,post_id :post_id,status :status},function (data) {
        if(data == 'attach'){
            newStatus = status.replace('1','0');
            a.attr('data-status',newStatus);
            a.empty();
            a.append('<i class="fa fa-check"></i> تمت متايعة الردود');
        }else if (data == 'detach'){
            newStatus = status.replace('0','1');
            a.attr('data-status',newStatus);
            a.empty();
            a.append('متابعة الردود <i class="fa fa-feed">');            
        }else{
            toastr.options.timeOut = '6000';
            toastr.options.positionClass = 'toast-bottom-left';
            Command: toastr["error"]("حدث خطأ يرجة المحاوله فى وقت لاحق");
        }
    });
});
</script>
@endsection