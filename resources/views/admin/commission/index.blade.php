@extends('admin.layouts.app')

@section('title')
    التحكم بالعمولات
@endsection

@section('header')

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
            <li class="classic-menu-dropdown active">
                <a>
                    العمولات <span class="selected">
                    </span>
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
            <li class="classic-menu-dropdown">
                <a data-target="#addCat" data-toggle="modal">إضافة عمولة جديد
                    <i class="fa fa-angle-down"></i>
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
                <a href="#">العمولات</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a data-target="#addCat" data-toggle="modal">إضافة عمولة جديد</a>
                <i class="fa fa-angle-down"></i>
            </li>
        </ul>
    </div>

@endsection

@section('content')

    @include('admin.commission.add')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption col-md-9">
                            <span><i class="icon-map"></i> عرض العمولات</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                            <tr>
                                <th>
                                    م
                                </th>
                                <th>
                                    قسم العمولة
                                </th>
                                <th>
العمولة
                                </th>
                                <th>
                                    الأدوات
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($commissions as $commission)
                             
                             

                                    <tr>
                                        <td>{{$num++}}</td>
                                        <td>{{$commission->cat ? $commission->cat->name : 'بدون قسم'}}</td>
                                        <td>{{$commission->commission}}</td>
                                        <td>
                                            <a href="{{url('/admincp/commission/'.$commission->id.'/edit')}}" class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                                        </td>
                                                <td>
                                                <a href="{{url('/admincp/commission/'.$commission->id.'/delete')}}" class="btn btn-danger"><i class="fa fa-edit"></i> حذف </a>
                                            </td>
                                    </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->

@endsection

<!-- footer -->
@section('footer')

@endsection