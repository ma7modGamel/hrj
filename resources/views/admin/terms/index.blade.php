@extends('admin.layouts.app')

@section('title')
    التحكم فى الإتفاقيات
@endsection

@section('header')

{!! HTML::style('public/plugins/sweetAlert/css/sweetalert.css') !!}
@endsection

@section('megaMenu')
    <div class="hor-menu hor-menu-light hidden-sm hidden-xs">
        <ul class="nav navbar-nav">
            <!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
            <li class="classic-menu-dropdown active">
                <a>
                    التحكم فى بنود الإتفاقية 
                    <span class="selected"></span>
                </a>
            </li>
            <li class="classic-menu-dropdown">
                <a href="{{url('admincp/terms/create')}}">إضافة بند جديد</a>
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
                <a>التحكم فى بنود الإتفاقية </a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a href="{{url('admincp/terms/create')}}">إضافة بند جديد</a>
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
                    <li class="active">
                        <a href="#tab_1_1" data-toggle="tab">
                            الصفحة الرئيسية</a>
                    </li>
                </ul>
                <div class="tab-content">
                
                    <div class="tab-pane active fontawesome-demo" id="tab_1_1">
                        <div class="portlet-body">
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <thead>
                                <tr>
                                    <th>م</th>
                                    <th>إسم بند الإتفاقية</th>
                                    <th>الحالة</th>
                                    <th>الأدوات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($terms as $term)
                                    
                                    <tr>
                                        <td>{{$num++}}</td>
                                        <td>{{$term->title}}</td>
                                        <td class="text-center">
                                            @if($term->active == 1)
                                                {{FORM::open(array('method'=>'POST','url'=>'admincp/terms/'.$term->id.'/0'))}}
                                                {{ csrf_field() }}                        
                                                <input type="checkbox" name="my-checkbox" onchange="this.form.submit()" checked>
                                                {{FORM::close()}}
                                            @else
                                                {{FORM::open(array('method'=>'POST','url'=>'admincp/terms/'.$term->id.'/1'))}}
                                                {{ csrf_field() }}                        
                                                <input type="checkbox" name="my-checkbox" onchange="this.form.submit()">
                                                {{FORM::close()}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('/admincp/terms/'.$term->id.'/edit')}}" class="btn btn-success pull-left"><i class="fa fa-edit"></i> التحكم </a>
                                            <form action="{{url('/admincp/terms/'.$term->id.'')}}" method="POST" id="form{{$term->id}}">
                                                {{ csrf_field() }} 
                                               {{ method_field('DELETE') }}
                                            </form>
                                             <button  class="button btn btn-danger" onclick="deleteTerm('{{$term->id}}');"><i class="fa fa-trash-o"></i> حذف </button>
                                        </td>
                                    </tr>
                                    
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</section><!-- /.content -->

@endsection
<!-- footer -->
@section('footer')
{!! HTML::script('public/plugins/sweetAlert/js/sweetalert.min.js') !!}
<script type="text/javascript">
    function deleteTerm(id){
    var form = document.getElementById('form'+id) ;
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
        function (isConfirm) {
        if (isConfirm) {
            form.submit();
        }
 
        });

}


</script>
@endsection


