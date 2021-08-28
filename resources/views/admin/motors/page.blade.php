@extends('admin.layouts.app')

@section('title')
    عرض الإعلانات
@endsection

@section('header')
    <!-- DataTables -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    {{--{!! HTML::style('public/admin/global/plugins/datatables/datatables.min.css') !!}--}}
    {{--{!! HTML::style('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css') !!}--}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <!-- END PAGE LEVEL STYLES -->
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
                    المعارض  <span class="selected">
          </span>
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
            <li class="classic-menu-dropdown">
                <a href="{{route('motors-create')}}">إضافة معرض جديد
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
                <a>المعارض</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a href="{{route('motors-create')}}">إضافة معرض جديد</a>
                <i class="fa fa-angle-left"></i>
            </li>
        </ul>
    </div>
@endsection
@section('content')
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>#</th>
        <th>اسم المعرض</th>
        <th>الوصف</th>
        <th>عدد السيارات</th>
        <th>النوع</th>
        <th>المدن المتاحه</th>
        <th>صورة المعرض</th>
        <th> تعديل</th>
        <th>حذف</th>
    </tr>
    </thead>
    <tbody>
    @foreach($motors AS $motor)
    <tr>
        <td>{{$motor->id}}</td>
        <td>{{$motor->name}}</td>
        <td>{{$motor->descrption}}</td>
        <td>{{$motor->number_cars}}</td>
        <td>{{$motor->type}}</td>
        <td>{{$motor->variableCity}}</td>
        <td><img src="{{asset('public/upload/motors').'/'.$motor->image}}" style="width: 50px; height: 50px;"></td>
        <td><a href="{{route('motors-edit',$motor->id)}}" class="btn btn-info">تعديل</a></td>
        <td>
        <form action="{{route('motors-delete',$motor->id)}}" method="post">

            {{method_field('delete')}}
            <button type="submit" class="btn btn-danger">حذف </button>
        </form>
        </td>

    </tr>
    @endforeach

    </tbody>
</table>
@endsection
<!-- footer -->
@section('footer')

    <!-- DataTables -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{--{!! HTML::script('public/admin/global/scripts/datatable.js') !!}--}}
    {{--{!! HTML::script('public/admin/global/plugins/datatables/datatables.min.js') !!}--}}
    {{--{!! HTML::script('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}--}}
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

    <!-- END PAGE LEVEL PLUGINS -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
       </script>

@endsection



