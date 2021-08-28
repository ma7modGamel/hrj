@extends('layouts.app')

@section('title')
{{$user->name}}
@endsection
@section('header')
<style type="text/css">

</style>
@endsection
@section('userName')
	{{$user->name}}
@endsection
@section('content')
    <div class="body admin">
        <div class="col-md-3">
            <div class="side">
				@if($user->isOnline())
                <span class="label label-success">متصل </span>
				@else
                <span class="label label-default">غير متصل</span>
				@endif
                @if(Auth::check())
                @if(Auth::user()->id != $user->id)
                <hr>
                <a href="{{url('sendMsg/'.$user->id)}}"><i class="fa fa-envelope"></i> مراسلة </a>
				@endif
				@endif
                <hr>
                {{--
                --}}
                <ul class="badges">
                    @foreach($user->Rank as $rank)
                    @if($rank->type == 1)
                    <li> <span class="badge-info"><i class="star fa  fa-star"> </i> {{$rank->rank_title}}</span></li>
                    @elseif($rank->type == 2)
                    <li> <span class="badge-info"><i class="blue fa  fa-check-circle"> </i> {{$rank->rank_title}}</span></li>
                    @endif
                    @endforeach
                    @if($user->Rating()->where('type',1)->count())
                    <li><a href="{{url('allreviews/'.$user->id)}}"> <span class="badge-info"><i class="green fa  fa-thumbs-up"> </i> {{$user->Rating()->where('type',1)->count()}} تقييم إيجابي</span></a></li>
                    @endif
                    @if($user->Rating()->where('type',0)->count())
                    <li><a href="{{url('allreviews/'.$user->id)}}"> <span class="badge-info"><i class="red fa  fa-thumbs-down"> </i> {{$user->Rating()->where('type',0)->count()}} تقييم سلبي</span></a></li>
                    @endif
                </ul>
                <a href="{{url('add-rating/'.$user->id)}}"><i class="fa fa-thumbs-up"></i> إضافة  تقييم </a><br>
                <br> عضو منذ {{ timeToStr(strtotime($user->created_at))}}
                <hr>
                @if(Auth::check())
                @if(Auth::user()->id != $user->id)
	            @if(Auth::user()->Follows()->where('user_follow',$user->id)->count())
                <button id="followUser" data-status="0" data-token="{{ csrf_token() }}" class="button btn-large show-delete" dir="rtl" style="width: 100%"><i class="fa fa-check"></i>  انت تتابع : {{$user->name}}</button>
                <hr>
	            @else
                <button id="followUser" data-status="1" data-token="{{ csrf_token() }}" class="button btn-large" dir="rtl" style="width: 100%"><i class="fa fa-feed"></i>  متابعة {{$user->name}}</button>
                <hr>
	            @endif
	            @endif
	            @endif
        		<div class="clearfix"></div>
                @php
                $countFollows = \App\User::whereHas('Follows', function ($query) use ($user) {
                    $query->where('user_follow',$user->id);
                })->count();
                @endphp

                <b id="followsNum"> {{$countFollows}} </b> <i class="fa fa-user"></i> متابع <br>
            </div>
        </div>
        <div class="col-md-9">
        	<div class="adsx">
	            @if($posts->count())
	            @php $num = 0; @endphp
	            @foreach($posts as $post)
                @if($post && $post->User && $post->Area)
                <div class="adv-1 {{$num % 2 != 0 ? '' : 'adv-3'}}">
                    <div class="row">
                        <div class="col-md-6">
                            <h3><a class="{{in_array('tags',Request::segments()) ? $post->top == 1 ? 'darkgreen' : '' : ''}}" href="{{url('ads/'.$post->id.'/'.editTitle($post->title))}}">{{$post->title}}</a></h3>
                            <div class="text">
                                <span class="pull-right">
                                    @if($post->top == 1) <i class="gold fa fa-star fa-lg"></i> @endif
                                    <a href="{{url('ads/'.$post->id.'/'.editTitle($post->title))}}">{{$post->Cmnt->count() ? $post->Cmnt->count().' ردود ': ''}} </a><br>
                                    <a href="{{url('city/'.$post->Area ? $post->Area->name : 'مدينة محذوفة')}}"><i class="fa fa-map-marker"></i>  {{$post->Area ? $post->Area->name : 'مدينة محذوفة'}}</a>
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
              @endif
	            @php $num++; @endphp
	            @endforeach
	            @endif
            </div>
	        <div class="ajax-load text-center" style="display:none">
	            <img src="https://www.sgjbnow.com/wp-content/themes/johor/images/loading.gif" height="25" width="92">
	        </div>
            <div id="AJAXloaded">
            	@if(count($posts) > 1)
                <div class="loadmore">
	                <ul class="pagination">
	                    <li class="active">
	                        <a id="load-more">مشاهدة المزيد ...</a>
	                    </li>
	                </ul>
                </div>
                @endif
                <div class="singleContent">
                    @if(auth::check())
                    @if(auth::user()->id == $user->id)
                    <!--<a href="{{url('commission')}}">حساب عمولة الموقع</a><br><br>-->
                    <a href="{{url('unsubscribe')}}">إدارة التنبيهات البريدية</a><br><br>
                    <a href="{{url('chgpwd')}}">تغيير الرقم السري</a><br><br>
                    <a href="{{url('updatemobile')}}">تغيير رقم الجوال</a><br><br>
                    <a href="{{url('updatename')}}"> تغيير مسمى العضوية</a><br><br>
                    <a href="{{url('updateemail')}}">تحديث البريد</a><br><br>
                    <!-- <a href="/verify_mobile.php">توثيق الجوال</a><br><br> -->
                    <a href="{{url('page/rating')}}">الإشتراك في نظام التقييم للتجار</a><br><br>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل الخروج</a><br><br>
                    @endif
                    @endif
                    <hr>
                    <a href="{{url('comments/'.$user->id)}}">آخر ردود {{$user->name}}</a><br>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
<script type="text/javascript">
// alert($('#followUser').data('status'));

$(document).on({
	mouseenter: function(){
		$('.show-delete').empty();
		$('.show-delete').append('<i class="fa fa-close"></i> إلغاء المتابعه');
	},
	mouseleave: function(){
		$('.show-delete').empty();
		$('.show-delete').append('<i class="fa fa-check"></i>  انت تتابع : {{$user->name}}');
	}
}, '.show-delete');


// follow Post
$('#followUser').on('click', function (e) {
    e.preventDefault();
    var url     = '{{url("followUser")}}',
        token   = $(this).data('token'),
        status  = $(this).attr('data-status'),
        user_id = '{{$user->id}}',
    	favNum 	= $('#followsNum').text(),
        a=$(this);

    $.post(url,{_method: 'post', _token :token,user_id :user_id,status :status},function (data) {
        if(data == 'attach'){
            newStatus = status.replace('1','0');
            a.attr('data-status',newStatus);
            a.empty();
            a.append('<i class="fa fa-check"></i> انت تتابع : {{$user->name}}');
            a.addClass('show-delete');
            $('#followsNum').text(++favNum);
        }else if (data == 'detach'){
            newStatus = status.replace('0','1');
            a.attr('data-status',newStatus);
            a.empty();
            a.append('<i class="fa fa-feed"> متابعة {{$user->name}} ');
            a.removeClass('show-delete');
            $('#followsNum').text(--favNum);
        }else{
            toastr.options.timeOut = '6000';
            toastr.options.positionClass = 'toast-bottom-left';
            Command: toastr["error"]("حدث خطأ يرجة المحاوله فى وقت لاحق");
        }
    });
});


//====================================================================================
// ================= load More =======================================================

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
            $('#load-more').hide();
            $('.ajax-load').show();
        }
    }).done(function(data){
        if(data.html == ''){
            $('#load-more').hide();
            $('.ajax-load').html('<div class="alert"><center> لا توجد نتائج أخرى </center></div>');
            return;
        }
        $('#load-more').show();
        $('.ajax-load').hide();
        $(".adsx").append(data.html);
    }).fail(function(jqXHR, ajaxOptions, thrownError){
        alert('server not responding...');
    });

    $('.ajax-load').empty();
    $('.ajax-load').append('<img src="https://www.sgjbnow.com/wp-content/themes/johor/images/loading.gif" height="25" width="92">');
}

</script>
@endsection
