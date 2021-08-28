@extends('admin.layouts.app')

@section('title')
    التعليقات الغير مفعلة
@endsection

@section('header')
    <!-- DataTables -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    {!! HTML::style('public/admin/global/plugins/datatables/datatables.min.css') !!}
    {!! HTML::style('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css') !!}
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
          عرض التعليقات 
          <span class="selected"></span>
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
            <a>عرض التعليقات</a>
            <i class="fa fa-angle-down"></i>
          </li>
        </ul>
      </div>
@endsection

@section('content')

<!-- Main content -->
<section class="content">
  <!-- BEGIN PAGE CONTENT-->
  <div class="row">
    <div class="col-md-12">

      {{-- <a href="{{url('admincp/bookCmnts/activeAll')}}" class="btn btn-success pull-right"><i class="fa fa-check" ></i> تفعيل الكل </a> --}}
      <div class="tabbable-line">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#tab_1_1" data-toggle="tab"> التعليقات </a>
          </li>
        </ul>
        <div class="tab-content">

          <div class="tab-pane active fontawesome-demo" id="tab_1_1">
          <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption col-md-9">
              عرض آخر التعليقات 
              </div>
            </div>
            <div class="portlet-body">
              <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>صاحب التعليق</th>
                    <th>عنوان الإعلان</th>
                    <th style="width:370px !important">النص</th>
                    <th>التاريخ</th>
                    <th>الادوات</th>
                  </tr>
                </thead>
                <tbody>
              @foreach($cmnts as $cmnt)
                  <tr>
                    <td>{{$num++}}</td>
                    @if($cmnt->User)
                    <td><a href="{{url('admincp/users/'.$cmnt->User_id)}}">{{$cmnt->user->name}}</a></td>
                    @else
                    <td>عضو محظور</td>
                    @endif

                    <td><a href="{{url('post/'.$cmnt->post_id)}}">{{$cmnt->Post ? $cmnt->Post->title : 'إعلان محظور'}}</a></td>
                    <td>{{str_limit($cmnt->body,100)}}</td>
                    <td> منذ {{ timeToStr(strtotime($cmnt->created_at))}}</td>
                    <td>
                        <a href="{{url('/admincp/cmnts/'.$cmnt->id)}}" class="btn btn-info showCmnt"><i class="fa fa-eye"></i> عرض </a>
                        <a href="{{url('/admincp/cmnts/'.$cmnt->id)}}" data-token="{{ csrf_token() }}" class="btn btn-danger delCmnt"><i class="fa fa-trash-o" ></i> حذف </a>
                      {{-- <a href="{{url('/admincp/cmnts/'.$cmnt->id)}}" class="btn btn-success"><i class="fa fa-check"></i> تفعيل </a> --}}
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

<!-- show message Modal-->
    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="id"> عرض التعليق</h4>
                </div>
                <div class="modal-body" id="body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- End Modal -->

@endsection

<!-- footer -->
@section('footer')

  <!-- DataTables -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  {!! HTML::script('public/admin/global/scripts/datatable.js') !!}
  {!! HTML::script('public/admin/global/plugins/datatables/datatables.min.js') !!}
  {!! HTML::script('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
  <!-- END PAGE LEVEL PLUGINS -->
<script type="text/javascript">

var TableDatatablesFixedHeader = function () {
  var e = function () {
      var e = $("#sample_1"), a = 0;
      App.getViewPort().width < App.getResponsiveBreakpoint("md") ? $(".page-header").hasClass("page-header-fixed-mobile") && (a = $(".page-header").outerHeight(!0)) : $(".page-header").hasClass("navbar-fixed-top") ? a = $(".page-header").outerHeight(!0) : $("body").hasClass("page-header-fixed") && (a = 64);
      e.dataTable({
          language: {
              aria: {
                  sortAscending: ": ترتيب تصاعدى",
                  sortDescending: ": ترتيب تنازلى"
              },
              emptyTable: "لا توجد اى بيانات متاحه",
              info: "إظهار _START_ إلى _END_ من _TOTAL_ حقل",
              infoEmpty: "لا توجد حقول",
              infoFiltered: "( الإجمالى _MAX_ حقل )",
              lengthMenu: "عدد الحقول : _MENU_",
              search: " بحث برقم التعليق:",
              zeroRecords: "لا توجد نتائج "
          },
          fixedHeader: {header: !0, headerOffset: a},
          order: [[0, "تصاعدى"]],
          lengthMenu: [[25, 50, 75, 100, -1], [25, 50, 75, 100, "الكل"]],
          pageLength: 25,
          columnDefs: [{ "targets": [1,2,3,4,5], "searchable": false },{ "targets": [5], "orderable": false }]
      })
  };
  return {
      init: function () {
          jQuery().dataTable && (e())
      }
  }
}();
jQuery(document).ready(function () {
    TableDatatablesFixedHeader.init()
});

// Delete Comments
$('.delCmnt').on('click', function (e) {
    e.preventDefault();
    var url = $(this).attr("href"),token = $(this).data('token'),a=$(this);
    $.post(url,{_method: 'delete', _token :token},function (data) {
      //success data
      a.closest('tr').hide();
      if(data=="empty"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حذف الإعلان بنجاح")
        $('#sample_1 tbody').append("<tr class='odd'><td valign='top' colspan='6' class='dataTables_empty'>لا توجد اى بيانات متاحه</td></tr>");
      } else if (data=="done"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حذف الإعلان بنجاح")
      } else if (data=="error"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["error"]("لم يتم العثور على الإعلان")
      }
    });
});

// Show comments
$('.showCmnt').on('click', function (e) {
    e.preventDefault();
    var url = $(this).attr("href");
    $.get(url, function (data) {
        //success data
        $('#body').empty().append(data.body);
        $('#basic').modal('show');
    });
});
</script>


@endsection