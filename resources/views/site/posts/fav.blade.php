@extends('layouts.app')

@section('title')
المغضله
@endsection

@section('content')
<div class="body">
    <div class="col-md-3">
    </div>
    <div class="col-md-9">
@php $num = 0; @endphp
@foreach(Auth::user()->Posts as $post)
        <div class="adv-1 {{$num % 2 != 0 ? '' : 'adv-3'}}">
            <div class="row">
                <div class="col-md-9">
                    <h3><a href="{{url('ads/'.$post->id.'/'.editTitle($post->title))}}">{{$post->title}}</a></h3>
                    <div class="text">
                        <span class="pull-right">
                            <i class="fa  fa-2x addlike  favad fa-heart followPost" data-id="{{$post->id}}" data-token="{{csrf_token()}}" style="cursor: pointer;"></i>
                            <br>
                            <a href="{{url('city/'.$post->Area->name)}}"><i class="fa fa-map-marker"></i>  {{$post->Area->name}}</a>
                        </span>
                        <span class="pull-left">
                            <a href="{{url('ads/'.$post->id.'/'.editTitle($post->title))}}">قبل {{ timeToStr(strtotime($post->created_at))}}</a><br>
                            <a href="{{url('users/'.$post->User->id)}}"><i class="fa fa-user"></i> {{$post->User->name}}</a>

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
    </div>
</div>
@endsection
@section('footer')
<script type="text/javascript">
// follow Post
$('.followPost').on('click', function (e) {
    e.preventDefault();
    var url     = '{{url("followPost")}}',
        token   = $(this).data('token'),
        post_id = $(this).data('id'),
        status  = 0,
        a=$(this);
    $.post(url,{_method: 'post', _token :token,post_id :post_id,status :status},function (data) {
        if (data == 'detach'){
            a.closest('.adv-1').hide();            
        }else{
            toastr.options.timeOut = '6000';
            toastr.options.positionClass = 'toast-bottom-left';
            Command: toastr["error"]("حدث خطأ يرجة المحاوله فى وقت لاحق");
        }
    });
});
</script>
@endsection
