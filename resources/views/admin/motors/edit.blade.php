@extends('admin.layouts.app')

@section('title')
تعديل علي معارض السيارات
@endsection
@section('header')
    {!! HTML::style('public/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}
@endsection
@section('megaMenu')
    <div class="hor-menu hor-menu-light hidden-sm hidden-xs">
        <ul class="nav navbar-nav">
            <!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
            <li class="classic-menu-dropdown" aria-haspopup="true">
                <a href="{{url('admincp')}}"> رئيسية لوحة التحكم
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
            <li class="classic-menu-dropdown">
                <a href="{{route('motors')}}">
                    المعارض <span class="selected">
          </span>
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
            <li class="classic-menu-dropdown active">
                <a>
                    تعديل المعرض
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
                <a href="{{route('motors')}}">المعارض</a>
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
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption col-md-9">
                            تعديل
                        </div>
                    </div>
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    @if(!empty($errors->all()))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() As $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="portlet-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('motors-update',$value->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{method_field('put')}}

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-12 control-label">اسم المعرض</label>
                                    <!-- <div class="clearfix"></div> -->
                                    <div class="col-md-8 col-sm-8 col-xs-8 ">
                                        <div class="input-group">
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-file"></i>
                                                    </span>
                                            <input type="text" name="name" class="form-control" value="{{$value->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="asd">
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-12 control-label">الوصف</label>
                                        <!-- <div class="clearfix"></div> -->
                                        <div class="col-md-8 col-sm-8 col-xs-8 ">
                                            <div class="input-group">
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-file"></i>
                                                    </span>
                                                <input type="text" name="descrption" class="form-control" value="{{$value->descrption}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-12 control-label"> عدد السيارات</label>
                                        <!-- <div class="clearfix"></div> -->
                                        <div class="col-md-3 col-sm-8 col-xs-8">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                <i class="fa fa-file"></i>
                                                </span>
                                                <input type="text" name="number" class="form-control" value="{{$value->number_cars}}">
                                            </div>

                                        </div>
                                        <label class="col-md-2 col-sm-12 control-label">النوع</label>
                                        <!-- <div class="clearfix"></div> -->
                                        <div class="col-md-3 col-sm-8 col-xs-8">
                                            <div class="input-group">
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-file"></i>
                                                    </span>
                                                <input type="text" name="type" class="form-control" value="{{$value->type}}">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-12 control-label">الاماكن المتاحه</label>
                                <!-- <div class="clearfix"></div> -->
                                <div class="col-md-8 col-sm-8 col-xs-8 ">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" name="place" class="form-control" value="{{$value->variableCity}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-12 control-label">صورة المعرض</label>
                                <!-- <div class="clearfix"></div> -->
                                <div class="col-md-8 col-sm-8 col-xs-8 ">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                        </span>
                                        <input type="file" name="image_car" class="form-control" value="{{$value->image}}">
                                    </div>
                                </div>
                            </div>


                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-8">
                                        <button type="submit" class="btn green"> تعديل </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->

@endsection
@section('footer')
    {!! HTML::script('public/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}
@endsection