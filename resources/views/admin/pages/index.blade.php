@extends('admin.layouts.app')

@section('title')
    التحكم فى الصفحات
@endsection

@section('header')


@endsection

@section('megaMenu')
    <div class="hor-menu hor-menu-light hidden-sm hidden-xs">
        <ul class="nav navbar-nav">
            <!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
            <li class="classic-menu-dropdown active">
                <a>
                    التحكم فى الصفحات 
                    <span class="selected"></span>
                </a>
            </li>
            <li class="classic-menu-dropdown">
                <a href="{{url('admincp/pages/create')}}">إضافة صفحة جديده</a>
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
                <a>التحكم فى الصفحات</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a href="{{url('admincp/pages/create')}}">إضافة صفحة جديده</a>
                <i class="fa fa-angle-left"></i>
            </li>
        </ul>
    </div>
@endsection

@section('content')
<!-- Main content -->
<!-- Main content -->
<section class="content">
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable-line">
                <ul class="nav nav-tabs">
                @foreach(parentPages() as $key => $tab)
                    <li class="{{$key == 1 ? 'active' : '' }}">
                        <a href="#tab_1_{{$key}}" data-toggle="tab">
                            {{$tab}}</a>
                    </li>
                @endforeach
                </ul>
                <div class="tab-content">
                @foreach(parentPages() as $key => $tab)
                    <div class="tab-pane {{$key == 1 ? 'active' : '' }} fontawesome-demo" id="tab_1_{{$key}}">
                        <div class="portlet-body">
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <thead>
                                <tr>
                                    <th>م</th>
                                    <th>إسم الصفحة</th>
                                    <th>المكان</th>
                                    <th>الحالة</th>
                                    <th>الأدوات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pages as $page)
                                    @if($page->type == $key)
                                    <tr>
                                        <td>{{$num++}}</td>
                                        <td>{{$page->pName}}</td>
                                        <td>{{parentPages()[$page->type]}}</td>
                                        <td class="text-center">
                                            @if($page->active == 1)
                                                {{FORM::open(array('method'=>'POST','url'=>'admincp/pages/'.$page->id.'/0'))}}
                                                {{ csrf_field() }}                        
                                                <input type="checkbox" name="my-checkbox" onchange="this.form.submit()" checked>
                                                {{FORM::close()}}
                                            @else
                                                {{FORM::open(array('method'=>'POST','url'=>'admincp/pages/'.$page->id.'/1'))}}
                                                {{ csrf_field() }}                        
                                                <input type="checkbox" name="my-checkbox" onchange="this.form.submit()">
                                                {{FORM::close()}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('/admincp/pages/'.$page->id.'/edit')}}" class="btn btn-success"><i class="fa fa-edit"></i> التحكم </a>
                                            @if($page->type != 1)
                                            <a id="delete{{$page->id}}" class="btn btn-danger" href="#"><i class="fa fa-trash-o"></i> حذف </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</section><!-- /.content -->

@endsection
<!-- footer -->
@section('footer')
<script type="text/javascript">
@if(isset($page))
    @foreach($pages as $page)
        $('#delete{{$page->id}}').click(function(){
            swal({
                title: "هل انت متأكد؟",
                text: "انت لن تسطيع إسترجاع هذه البيانات مره أخرى !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'نعم , أحذفها !',
                cancelButtonText: 'إلغاء !',
                closeOnConfirm: false
            },
            function(){
                document.location.href="{{url('/admincp/pages/'.$page->id.'/delete')}}";
            });
        });
    @endforeach
@endif
</script>
@endsection


