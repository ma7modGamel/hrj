@extends('admin.layouts.app')

@section('title')
    التحكم بالأقسام
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
                    الأقسام <span class="selected">
                    </span>
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
            <li class="classic-menu-dropdown">
                <a data-target="#addCat" data-toggle="modal">إضافة قسم جديد
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
                <a href="#">الأقسام</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a data-target="#addCat" data-toggle="modal">إضافة قسم جديد</a>
                <i class="fa fa-angle-down"></i>
            </li>
        </ul>
    </div>

@endsection

@section('content')

    @include('admin.cats.add')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption col-md-9">
                            <span><i class="icon-map"></i> عرض الأقسام</span>
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
                                    القسم
                                </th>
                                <th>
                                    الأدوات
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cats as $cat)
                                @if(isset($id))
                                    @if($cat->parent_id == $id)
                                        <tr>
                                            <td>{{$num++}}</td>
                                                    @if($id == 1)
                                                    <td><a href="{{url('admincp/cats/'.$cat->id)}}">{{$cat->name}}</a></td>
                                                    @elseif(\App\Cat::where('parent_id',$cat->id)->first())
                                                    <td><a href="{{url('admincp/cats/'.$cat->id)}}">{{$cat->name}}</a></td>
                                                    @else
                                                    <td>{{$cat->name}}</td>
                                                    @endif
                                            <td>
                                                <a href="{{url('/admincp/cats/'.$cat->id.'/edit')}}" class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                                            </td>
                                                                                        <td>
                                                <a href="{{url('/admincp/cats/'.$cat->id.'/delete')}}" class="btn btn-danger"><i class="fa fa-edit"></i> حذف </a>
                                            </td>
                                        </tr>
                                    @endif
                                @elseif($cat->parent_id == 0 ||$cat->parent_id == 1000)
                                    <tr>
                                        <td>{{$num++}}</td>
                                        <td><a href="{{url('admincp/cats/'.$cat->id)}}">{{$cat->name}}</a></td>
                                        <td>
                                            <a href="{{url('/admincp/cats/'.$cat->id.'/edit')}}" class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                                        </td>
                                                <td>
                                                <a href="{{url('/admincp/cats/'.$cat->id.'/delete')}}" class="btn btn-danger"><i class="fa fa-edit"></i> حذف </a>
                                            </td>
                                    </tr>
                                @endif
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