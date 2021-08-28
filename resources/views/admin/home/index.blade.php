@extends('admin.layouts.app')
@section('title')
الرئيسية
@endsection

@section('header')

@endsection
@inject('trans','App\Http\Controllers\TransferController')
@section('megaMenu')
<div class="hor-menu hidden-sm hidden-xs">
    <ul class="nav navbar-nav">
        <!-- DOC: Remove data-hover="megamenu-dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
        <li class="classic-menu-dropdown active" aria-haspopup="true">
            <a> رئيسية لوحة التحكم
                <span class="selected"> </span>
            </a>
        </li>
        <li class="mega-menu-dropdown" aria-haspopup="true">
            <a href="{{url('/')}}" target="_blank"> صفحة الموقع الرئيسية > </a>
        </li>
    </ul>
</div>
@endsection

@section('content')
<div class="note note-info">
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="dashboard-stat green-haze">
                <div class="visual">
                    <i class="fa fa-user"></i>
                </div>
                <div class="details">
                    <div class="number">
                        {{\App\User::where('type','!=',0)->count()}}
                    </div>
                    <div class="desc">
                        إجمالى الأعضاء
                    </div>
                </div>
                <a class="more" href="{{url('admincp/users')}}">
                            عرض المزيد <i class="m-icon-swapright m-icon-white"></i>
                            </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="dashboard-stat red-intense">
                <div class="visual">
                    <i class="fa fa-user"></i>
                </div>
                <div class="details">
                    <div class="number">
                        {{\App\User::where('forbidden',1)->count()}}
                    </div>
                    <div class="desc">
                        الأعضاء المحظورين
                    </div>
                </div>
                <a class="more" href="{{url('admincp/users/forbidden')}}">
                    عرض المزيد <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="dashboard-stat blue-madison">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        {{\App\Post::count()}}
                    </div>
                    <div class="desc">
                        إجمالى الإعلانات
                    </div>
                </div>
                <a class="more" href="{{url('admincp/posts')}}">
                    عرض المزيد <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="dashboard-stat purple-plum">
                <div class="visual">
                    <i class="fa fa-bank"></i>
                </div>
                <div class="details">
                    <div class="number">
                        {{$trans->countDoneTrans()}}
                    </div>
                    <div class="desc">
                        إجمالى التحويلات المؤكده
                    </div>
                </div>
                <a class="more" href="{{url('admincp/transfers')}}">
                    عرض المزيد <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    </div>
</div>
    <!-- END DASHBOARD STATS -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet-body">
                <div class="portlet light bordered">
                    <div class="portlet-title tabbable-line">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab">
                                            آخر الرسائل </a>
                            </li>
                            <li>
                                <a href="#tab_1_2" data-toggle="tab">
                                            آخر الإعلانات المضافه </a>
                            </li>
                            <li>
                                <a href="#tab_1_3" data-toggle="tab">
                                            أخر الأعضاء </a>
                            </li>
                        </ul>
                        <div class="customCaption">
                            <i class="icon-share font-green-sharp"></i>
                            <span class="caption-subject font-green-sharp ">روابط سريعه</span>
                        </div>
                    </div>
                    <!--BEGIN TABS-->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_1">
                            <div class="scroller" style="height: 337px;" data-always-visible="1" data-rail-visible="0">
                                <ul class="feeds">
                                    @foreach(\App\Contact::orderBy('id','desc')->paginate(15) as $contact)
                                    <li>
                                        <a href="{{url('admincp/contacts/'.$contact->id)}}">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            {{$contact->subject}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    منذ {{ timeToStr(strtotime($contact->created_at),1)}}
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_1_2">
                            <div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible1="1">
                                <ul class="feeds">
                                    @foreach(\App\Post::orderBy('id','desc')->paginate(15) as $post)
                                    <li>
                                        <a href="{{url('admincp/posts/'.$post->id.'/edit')}}" target="_blank">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            {{$post->title}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    منذ {{ timeToStr(strtotime($post->created_at),1)}}
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_1_3">
                            <div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible1="1">
                                <ul class="feeds">
                                    @foreach(\App\User::orderBy('id','desc')->paginate(15) as $user)
                                    <li>
                                        <a href="{{url('admincp/users/'.$user->id.'/edit')}}" target="_blank">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-danger">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            {{$user->name}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    منذ {{ timeToStr(strtotime($user->created_at),1)}}
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--END TABS-->
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>
    <div class="clearfix"></div>
@endsection

@section('footer')

@endsection
