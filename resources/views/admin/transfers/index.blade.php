@extends('admin.layouts.app')

@section('title')
    التحويلات البنكيه
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
          عرض التحويلات البنكيه 
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
            <a>عرض التحويلات البنكيه</a>
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
      <div class="tabbable-line">
        <ul class="nav nav-tabs">
        @foreach(transferType() as $key => $cType)
          <li class="@if($key == 1) active @endif">
            <a href="#tab_1_{{$key}}" data-toggle="tab">
            {{$cType}}  </a>
          </li>
        @endforeach
        </ul>
        <div class="tab-content">
        @foreach(transferType() as $key => $cType)
          <div class="tab-pane @if($key == 1) active @endif fontawesome-demo" id="tab_1_{{$key}}">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="bordered">
              <table id="sample_{{$key}}" class="table table-striped table-bordered table-hover table-header-fixed">
                <thead>
                  <tr>
                    <th style="width:20px !important">رقم العضو</th>
                    <th style="width:300px !important">إسم العضو</th>
                    <th>المبلغ</th>
                    <th>البنك المحول منه</th>
                    <th> رقم الإعلان</th>
                    <th>وقت التحويل</th>
                    <th>الحاله</th>
                    <th>الادوات</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($transfers as $transfer)
                  @if($transfer->type == $key)
                  <tr>
                    @if($transfer->User)
                      <td>{{$transfer->user_id}}</td>
                      <td><a href="{{url('users/'.$transfer->user_id)}}">{{$transfer->User->name}}</a></td>
                    @else
                      <td>#</td>
                      <td>عضو محظور</td>
                    @endif
                    <td>{{$transfer->amount}}</td>
                    <td>{{$transfer->Bank ? $transfer->Bank->name : 'غير معرف'}}</td>
                    <td>{{$transfer->post_id  }}</td>
                    <td>{{transferDate()[$transfer->date]}}</td>
                    <td>{{$transfer->done == 1 ? 'مؤكد' : 'لم يتم'}}</td>
                    <td>
                      <a href="{{url('admincp/transfers/'.$transfer->id)}}" class="btn btn-success"><i class="fa fa-eye"></i> عرض </a>
                      <a transId = "{{$transfer->id}}" class="btn btn-danger del_trans"><i class="fa fa-trash-o" ></i> حذف </a>
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
  @foreach(transferType() as $key => $cType)
  var initTable{{$key}} = function () {
    var e = $("#sample_{{$key}}"), a = 0;
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
        search: " بحث بإسم العضو:",
        zeroRecords: "لا توجد نتائج "
      },
      fixedHeader: {header: !0, headerOffset: a},
      order: false,
      lengthMenu: [[10, 25, 50, 75, -1], [10, 25, 50, 75, "الكل"]],
      pageLength: 10,
      columnDefs: [{ "targets": [0,2,3,4,5,6], "searchable": false },{ "targets": [6], "orderable": false }]
    })
  };
  @endforeach
  return {
    init: function () {
      if (!jQuery().dataTable) {
        return;
      }
      @foreach(transferType() as $key => $cType)
      initTable{{$key}}();
      @endforeach
    }
  }
}();
jQuery(document).ready(function () {
  TableDatatablesFixedHeader.init()
});

// Delete Messages

$(document).on("click",".del_trans",function() {
  var id = $(this).attr('transId'),a=$(this);
  toastr.options.timeOut = '0';
  toastr.options.extendedTimeOut = '0';
  toastr.options.positionClass = 'toast-bottom-left';
  Command: toastr["error"]("سيتم حذف التحويل !! .. هل انت متأكد ؟<br /><br /><a  href='{!! url('admincp/transfers/') !!}/" +  id + "' data-token='{{ csrf_token() }}' class='btn btn-danger confDel_trans'> نعم -- حذف !!</a>")
  
  $(document).on("click",".confDel_trans",function(e) {
    e.preventDefault();
    var url = $(this).attr("href"),token = $(this).data('token');
    $.post(url,{_method: 'delete', _token :token},function (data) {
      //success data
      a.closest('tr').hide();
      if(data=="empty"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حذف التحويل بنجاح")
        $('#sample_1 tbody').append("<tr class='odd'><td valign='top' colspan='6' class='dataTables_empty'>لا توجد اى بيانات متاحه</td></tr>");
      } else if (data=="done"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حذف التحويل بنجاح")
      } else if (data=="error"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["error"]("لم يتم العثور على التحويل")
      }
    });
  });

});





</script>


@endsection