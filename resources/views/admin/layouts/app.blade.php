<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>لوحة التحكم | @yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin RTL Theme #1 for dark mega menu option" name="description" />
        <meta content="" name="author" />
        <link rel="shortcut icon" href="{{Request::root()}}/public/upload/logo/favicon.png"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        {!! HTML::style('public/admin/global/plugins/font-awesome/css/font-awesome.min.css') !!}
        {!! HTML::style('public/admin/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
        {!! HTML::style('public/admin/global/plugins/bootstrap/css/bootstrap-rtl.min.css') !!}
        {!! HTML::style('public/admin/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css') !!}
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        {!! HTML::style('public/admin/global/css/components-rounded-rtl.min.css') !!}
        {!! HTML::style('public/admin/global/css/plugins-rtl.min.css') !!}
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL Toastr -->
        {!! HTML::style('public/admin/global/plugins/bootstrap-toastr/toastr-rtl.min.css') !!}
        <!-- END PAGE LEVEL Toastr -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        {!! HTML::style('public/admin/layouts/layout/css/layout-rtl.min.css') !!}
        {!! HTML::style('public/admin/layouts/layout/css/themes/default-rtl.css') !!}
        {!! HTML::style('public/admin/layouts/layout/css/custom-rtl.css') !!}
        <!-- END THEME LAYOUT STYLES -->

        <!-- BEGIN custom PLUGIN -->
        {!! HTML::script('public/plugins/ckeditor/ckeditor.js') !!}
        <!-- END THEME custom PLUGIN -->

        <link rel="shortcut icon" href="favicon.ico" /> 
    @yield('header')
    @inject('contact','App\Contact')
    @inject('trans','App\Transfer')
    </head>
    <!-- END HEAD -->

    <body class="page-sidebar-closed-hide-logo page-content-white page-header-fixed page-sidebar-fixed">
        <div id="ckediteImageUploadUrl" class="hidden">{{Request::root()}}</div>
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="{{url('admincp')}}"> <img src="{{Request::root()}}/public/upload/logo/logo.png" alt="logo" class="logo-default" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN MEGA MENU -->
                    <!-- DOC: Remove "hor-menu-light" class to have a horizontal menu with theme background instead of white background -->
                    <!-- DOC: This is desktop version of the horizontal menu. The mobile version is defined(duplicated) in the responsive menu below along with sidebar menu. So the horizontal menu has 2 seperate versions -->
                    @yield('megaMenu')
                    <!-- END MEGA MENU -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
                            <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                            <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                            <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-bank"></i>
                                    <span class="badge badge-default"> {{$trans->where('active',1)->count()}} </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>
                                            <span class="bold">لديك {{$trans->where('active',1)->count()}} تحويل </span> جديد</h3>
                                        <a href="{{url('admincp/transfers')}}">عرض الكل</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                            @foreach($trans->where('active',1)->orderBy('id','desc')->get() as $tran)
                                            <li>
                                                <a href="{{url('admincp/transfers/'.$tran->id)}}">
                                                    <span class="time">قبل : {{ timeToStr(strtotime($tran->created_at),1)}}</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                        </span> {{transferType()[$tran->type]}} 
                                                    </span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN INBOX DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-envelope-open"></i>
                                    <span class="badge badge-default"> {{$contact->where('active',1)->count()}} </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>لديك
                                            <span class="bold"> {{$contact->where('active',1)->count()}} رساله</span> جديده</h3>
                                        <a href="{{url('admincp/contacts')}}">عرض الكل</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                            @foreach($contact->where('active',1)->orderBy('id','desc')->get() as $cont)
                                            <li>
                                                <a href="{{url('admincp/contacts/'.$cont->id)}}">
                                                    <span class="subject" style="margin-right: 0px!important;">
                                                        <span class="time">قبل : {{ timeToStr(strtotime($cont->created_at),1)}} </span>
                                                    </span>
                                                    <span class="message" style="margin-right: 0px!important;">
                                                        {{str_limit($cont->subject,50)}}
                                                    </span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-quick-sidebar-toggler">
                                <a href="{{url('/')}}" class="dropdown-toggle">
                                    <i class="icon-logout"></i>
                                </a>
                            </li>
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                @include('admin.layouts.sidebar')
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                    @yield('pageHeader')
                <!-- END PAGE HEADER-->
                    @yield('content')
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->
                <a href="javascript:;" class="page-quick-sidebar-toggler">
                    <i class="icon-logout"></i>
                </a>
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <!--<div class="page-footer">-->
            <!--    <div class="page-footer-inner"> {{ date('Y') }} &copy; شركة الرياض للتصميم والبرمجه-->
            <!--        <a href="http://elryad.com" target="_blank">Elryad.com</a>-->
            <!--    </div>-->
            <!--    <div class="scroll-to-top">-->
            <!--        <i class="icon-arrow-up"></i>-->
            <!--    </div>-->
            <!--</div>-->
            <!-- END FOOTER -->
        </div>
        <!--[if lt IE 9]>
        {!! HTML::script('public/admin/global/plugins/respond.min.js') !!}
        {!! HTML::script('public/admin/global/plugins/excanvas.min.js') !!}
        {!! HTML::script('public/admin/global/plugins/ie8.fix.min.js') !!}
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        {!! HTML::script('public/admin/global/plugins/jquery.min.js') !!}
        {!! HTML::script('public/admin/global/plugins/bootstrap/js/bootstrap.min.js') !!}
        {!! HTML::script('public/admin/global/plugins/js.cookie.min.js') !!}
        {!! HTML::script('public/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
        {!! HTML::script('public/admin/global/plugins/jquery.blockui.min.js') !!}
        {!! HTML::script('public/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        {!! HTML::script('public/admin/global/scripts/app.min.js') !!}
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL Toastr -->        
        {!! HTML::script('public/admin/global/plugins/bootstrap-toastr/toastr.min.js') !!}
        <!-- END PAGE LEVEL Toastr -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        {!! HTML::script('public/admin/layouts/layout/scripts/layout.min.js') !!}
        {!! HTML::script('public/admin/layouts/layout/scripts/demo.min.js') !!}
        {!! HTML::script('public/admin/layouts/global/scripts/quick-nav.min.js') !!}
        <!-- END THEME LAYOUT SCRIPTS -->
        @include('admin/layouts/fMsg')
        <script type="text/javascript">
            function filter() {
                var searchWord = $('#sidebarSearch').val();
                $(".nav-item a span.title").each(function() {
                    if ($(this).text().search(new RegExp(searchWord, "i")) > -1) {
                       $(this).closest('li').show();
                    } else {
                        $(this).closest('li').hide();
                    }
                });
            }
        </script>
    @yield('footer')
    </body>

</html>