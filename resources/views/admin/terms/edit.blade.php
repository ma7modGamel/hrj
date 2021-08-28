@extends('admin.layouts.app')

@section('title')
    تعديل بند  -  {{$term->title}}
@endsection

@section('header')


@endsection

@section('megaMenu')
    <div class="hor-menu hor-menu-light hidden-sm hidden-xs">
        <ul class="nav navbar-nav">
            <li class="classic-menu-dropdown">
                <a href="{{url('/admincp/terms')}}">
                    بنود الإتفاقية >
                </a>
            </li>
            <li class="classic-menu-dropdown active">
                <a href="{{url('/admincp/terms/'.$term->id.'/edit')}}">
                    تعديل بند - {{$term->title}}
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
    </div>
@endsection

@section('pageHeader')
    <div class="page-bar hidden-md hidden-lg">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{url('/admincp')}}">الرئيسية</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a href="{{url('/admincp/terms')}}">بنود الإتفاقية</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a href="{{url('/admincp/terms/'.$term->id.'/edit')}}">تعديل البند {{$term->title}}</a>
                <i class="fa fa-angle-left"></i>
            </li>
        </ul>
    </div>

@endsection

@section('content')

    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable-line">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1_1" data-toggle="tab">
                            تعديل البيانات </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active fontawesome-demo" id="tab_1_1">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption col-md-9">
                                    تعديل البند
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                {!! FORM::model($term ,['route'=> ['terms.update',$term->id],'method' => 'PATCH', 'files'=>'true','class'=>'form-horizontal']) !!}
                                @include('admin.terms.form')
                                {!! FORM::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection

<!-- footer -->
@section('footer')

@endsection

