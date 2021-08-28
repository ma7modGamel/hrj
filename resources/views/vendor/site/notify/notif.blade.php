@extends('layouts.app')

@section('content')
<div class="singleContent">
    <div class="note">
        @if(count(Auth::user()->unreadNotifications))
        <h3>إشعارات حديثه</h3>
        @endif
        <ul>
        @foreach ($newNotf as $note)
            @if($note->type == 'App\Notifications\newPostNotif')
            <li>
              <span>
                تم إضافة إعلان جديد لعضو او ماركة تتابعها بعنوان  
                <a href="{{url('ads/'.$note->data['id'].'/'.editTitle($note->data['title']))}}" class="note_replay">{{$note->data['title']}}</a> بواسطة 
                @if($user = \App\User::find($note->data['user_id']))
                <a href="{{url('users/'.$note->data['user_id'])}}" class="username">{{$user->name}}</a>  قبل {{ timeToStr(strtotime($note->data['created_at']['date']))}}
                @else
                عضو محظور  قبل {{ timeToStr(strtotime($note->data['created_at']['date']))}}
                @endif
              </span>
            </li>
            @elseif($note->type == 'App\Notifications\newCmntNotif')
            <li>
              <span>
                يوجد رد جديد على الإعلان
                <a href="{{url('ads/'.$note->data['id'].'/'.editTitle($note->data['title']))}}" class="note_replay">{{$note->data['title']}}</a> بواسطة 
                @if($user = \App\User::find($note->data['user_id']))
                <a href="{{url('users/'.$note->data['user_id'])}}" class="username">{{$user->name}}</a>  قبل {{ timeToStr(strtotime($note->data['created_at']['date']))}}
                @else
                عضو محظور  قبل {{ timeToStr(strtotime($note->data['created_at']['date']))}}
                @endif
              </span>
            </li>
            @elseif($note->type == 'App\Notifications\followPostnotf')
            <li>
              <span>
                قام 
                @if($user = \App\User::find($note->data['userId']))
                <a href="{{url('users/'.$note->data['userId'])}}" class="username">{{$user->name}}</a>
                @else
                عضو محظور
                @endif
                بمتابعة إعلانك 
                <a href="{{url('ads/'.$note->data['postId'].'/'.editTitle($note->data['postTitle']))}}" class="note_replay">{{$note->data['postTitle']}}</a> 
              </span>
            </li>
            @elseif($note->type == 'App\Notifications\followUserNotf')
            <li>
              <span>
                قام 
                @if($user = \App\User::find($note->data['userId']))
                <a href="{{url('users/'.$note->data['userId'])}}" class="username">{{$user->name}}</a>
                @else
                عضو محظور
                @endif
                بمتابعتك 
              </span>
            </li>
            @endif
            {{$note->markAsRead()}}
        @endforeach

        <h3  style="opacity: 0.6" >إشعارات أقدم</h3>
        <ul  style="opacity: 0.7">
        @foreach ($oldNotf as $note)
            @if($note->type == 'App\Notifications\newPostNotif')
            <li>
              <span>
                تم إضافة إعلان جديد لعضو او ماركة تتابعها بعنوان  
                <a href="{{url('ads/'.$note->data['id'].'/'.editTitle($note->data['title']))}}" class="note_replay">{{$note->data['title']}}</a> بواسطة 
                @if($user = \App\User::find($note->data['user_id']))
                <a href="{{url('users/'.$note->data['user_id'])}}" class="username">{{$user->name}}</a>  قبل {{ timeToStr(strtotime($note->data['created_at']['date']))}}
                @else
                عضو محظور  قبل {{ timeToStr(strtotime($note->data['created_at']['date']))}}
                @endif
              </span>
            </li>
            @elseif($note->type == 'App\Notifications\newCmntNotif')
            <li>
              <span>
                يوجد رد جديد على الإعلان
                <a href="{{url('ads/'.$note->data['id'].'/'.editTitle($note->data['title']))}}" class="note_replay">{{$note->data['title']}}</a> بواسطة 
                @if($user = \App\User::find($note->data['user_id']))
                <a href="{{url('users/'.$note->data['user_id'])}}" class="username">{{$user->name}}</a>  قبل {{ timeToStr(strtotime($note->data['created_at']['date']))}}
                @else
                عضو محظور  قبل {{ timeToStr(strtotime($note->data['created_at']['date']))}}
                @endif
              </span>
            </li>
            @elseif($note->type == 'App\Notifications\followPostnotf')
            <li>
              <span>
                قام 
                @if($user = \App\User::find($note->data['userId']))
                <a href="{{url('users/'.$note->data['userId'])}}" class="username">{{$user->name}}</a>
                @else
                عضو محظور
                @endif
                بمتابعة إعلانك 
                <a href="{{url('ads/'.$note->data['postId'].'/'.editTitle($note->data['postTitle']))}}" class="note_replay">{{$note->data['postTitle']}}</a> 
              </span>
            </li>
            @elseif($note->type == 'App\Notifications\followUserNotf')
            <li>
              <span>
                قام 
                @if($user = \App\User::find($note->data['userId']))
                <a href="{{url('users/'.$note->data['userId'])}}" class="username">{{$user->name}}</a>
                @else
                عضو محظور
                @endif
                بمتابعتك 
              </span>
            </li>
            @endif
        @endforeach
        </ul>
        @if(!count(Auth::user()->notifications))
          <div class="alert alert-info"> لا توجد إشعارات حاليا </div>
        @else
        <input id="delNotif" value="حذف جميع الإشعارات  »" type="submit" class="button">
        @endif
    </div>
</div>
@endsection
@section('footer')
<script type="text/javascript">
$(document).on('click','#delNotif',function(e) {
  e.preventDefault()
  var url = "{{url('delAllNotf')}}";
  $.get(url,function(data){
    if(data == 'done'){
      $('.note').empty();
      $('.note').append('<div class="alert alert-success"> تم حذف جميع الإشعارات بنجاح </div>');
    }
  });
});
</script>
@endsection
