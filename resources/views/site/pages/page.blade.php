@extends('layouts.app')

@section('header')

@endsection

@section('content')
<div class="container">
<div class="more search_page">
    
    <div class="">
        @if(\App\Page::where('pLink',$pageName)->count())
        {!! \App\Page::where('pLink',$pageName)->first()->content !!}
        @else
        <script type="text/javascript">
            url = "{{Request::root()}}"+"/404";
            window.location = url;
        </script>
        @endif
    </div>
</div>
</div>
<br />
<br />
@endsection


@section('footer')

@endsection







