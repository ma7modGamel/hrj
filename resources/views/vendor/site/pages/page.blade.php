@extends('layouts.app')

@section('header')

@endsection

@section('content')
<br>
<br>
<div class="more search_page">
    <div class="container">
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
<br />
<br />
@endsection


@section('footer')

@endsection







