@extends('layouts.app')

@section('title')
    منطقة الإختبار
@endsection

@section('header')
{!! HTML::style('public/css/bootstrap-tagsinput.css') !!}
@endsection

@section('content')
    <input type="text" value="" data-role="tagsinput" id="tagsInput">
<div class="singleContent col-md-11">
    <h3>إبلاغ عن إعلان مخالف </h3>
    <script type="text/javascript">
        function validate_form(form)
        {
            if (form.comment_body.value == "") {
             alert('فضلا قم بكتابة سبب الابلاغ عن الاعلان');
             form.comment_body.focus();
             return false ;
         }
         else if(!(document.getElementById('ads_nooa_no').checked || document.getElementById('ads_nooa_order').checked)){
            alert('يجب الإجابة على السؤال');
            return false ;
        }
        return true ;
    }
</script>

<form action="" method="post" id="postform" name="postform" onsubmit="return validate_form(this);" style="border: 1px solid #eee;">
    <table class="table  tableMsg table-borderedAds tableextra">
        <tbody><tr>
            <td>
                <div class="alert alert-warning">
                    تحذير:هذا النموذج مخصص فقط للإبلاغ عن الاعلانات المخالفه وليس للتواصل مع صاحب الاعلان
                </div>
                <div class="alert alert-info">
                الرسائل المرسلة عبر هذا النموذج لن تصل إلى صاحب الإعلان!</div>
                هل هذا الإعلان مخالف؟   
                <br>
                <input name="ads_nooa" type="radio" value="yes" id="ads_nooa_no"> 
                نعم
                <br>  <input name="ads_nooa" type="radio" value="no" id="ads_nooa_order"> 
                لا
                <br>
                <br>
                <textarea rows="6" name="comment_body" id="message" class="form-control"></textarea>
                <br>
                <input class="btn  btn-primary" name="submit" value="إرســـال" type="submit">
            </td>
        </tr>
        
    </tbody></table>
</form>

</div>

@endsection

<!-- footer -->
@section('footer')
{!! HTML::script('public/js/bootstrap-tagsinput.min.js') !!}
@endsection




<?php if(1==2){?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('test.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}"></script>
</body>
</html>
<?php } ?>