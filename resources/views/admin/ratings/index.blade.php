@extends('admin.layouts.app')

@section('title')
    تقيمات الأعضاء
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
          عرض تقيمات الأعضاء 
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
            <a>عرض تقيمات الأعضاء</a>
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
        @foreach(ratingType() as $key => $cType)
          <li class="@if($key == 1) active @endif">
            <a href="#tab_1_{{$key}}" data-toggle="tab">
            {{$cType}}  </a>
          </li>
        @endforeach
        </ul>
        <div class="tab-content">
        @foreach(ratingType() as $key => $cType)
          <div class="tab-pane @if($key == 1) active @endif fontawesome-demo" id="tab_1_{{$key}}">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="bordered">
              <table id="sample_{{$key}}" class="table table-striped table-bordered table-hover table-header-fixed">
                <thead>
                  <tr>
                    <th>رقم التقييم</th>
                    <th>قام بالتقيم</th>
                    <th>العضو المقيم</th>
                    <th style="width:300px !important">الملاحظات</th>
                    <th>رقم الإعلان</th>
                    <th>التاريخ</th>
                    <th>الادوات</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($ratings as $rating)
                  @if($rating->type == $key)
                  <tr>
                    <td>{{$rating->id}}</td>
                    <td><a href="{{url('users/'.$rating->user_id)}}" target="_blank">{{$rating->User ? $rating->User->name : 'عضو محظور'}}</a></td>
                    <td><a href="{{url('users/'.$rating->rate_id)}}" target="_blank">{{$rating->rateUser ? $rating->rateUser->name : 'عضو محظور'}}</a></td>
                    <td>{{str_limit($rating->content,80)}}</td>
                    <td>{{$rating->post_id}}</td>
                    <td> منذ {{ timeToStr(strtotime($rating->created_at))}}</td>
                    <td>
                      <a href="{{url('admincp/ratings/'.$rating->id)}}" class="btn btn-info show_rate"><i class="fa fa-eye"></i> عرض </a>
                      <a href="{{url('admincp/ratings/'.$rating->id)}}" data-token="{{ csrf_token() }}" class="btn btn-danger del_rate"><i class="fa fa-trash-o" ></i> حذف </a>
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

<!-- show message Modal-->
    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="id"> عرض ملاحظات التقيم</h4>
                </div>
                  <div class="modal-body" id="buyDate"></div>
                  <br>
                  <div class="modal-body"> الملاحظات المرسله :</div> 
                  <div class="modal-body" id="body"></div>
                  <br>
                  <br>
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
  @foreach(ratingType() as $key => $cType)
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
        columnDefs: [{ "targets": [0,2,3,4,5], "searchable": false },{ "targets": [5], "orderable": false }]
    })
  };
  @endforeach
  return {
      init: function () {
        if (!jQuery().dataTable) {
            return;
        }
        @foreach(ratingType() as $key => $cType)
        initTable{{$key}}();
        @endforeach
      }
  }
}();
jQuery(document).ready(function () {
    TableDatatablesFixedHeader.init()
});

// Delete Messages
$('.del_rate').on('click', function (e) {
    e.preventDefault();
    var url = $(this).attr("href"),token = $(this).data('token'),a=$(this);
    $.post(url,{_method: 'delete', _token :token},function (data) {
      //success data
      a.closest('tr').hide();
      if(data=="empty"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حذف التقيم بنجاح")
        $('#sample_1 tbody').append("<tr class='odd'><td valign='top' colspan='6' class='dataTables_empty'>لا توجد اى بيانات متاحه</td></tr>");
      } else if (data=="done"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حذف التقيم بنجاح")
      } else if (data=="error"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["error"]("لم يتم العثور على التقيم")
      }
    });
});
// Show Message
$(document).on("click",".show_rate",function(e) {
  e.preventDefault();
  var url = $(this).attr("href");
  $.get(url, function (data) {
      //success data
      $('#body').empty().append(data.content);
      $('#buyDate').empty().append("تاريخ البيع او التعامل : " + data.buy_date);
      $('#basic').modal('show');
    return false;
  });
});

</script>


@endsection