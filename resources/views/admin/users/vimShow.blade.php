@extends('admin.layouts.app')

@section('title')
	التحكم بالأعضاء
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
          الأعضاء المميزين <span class="selected">
          </span>
          <i class="fa fa-angle-left"></i>
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
            <a>الأعضاء المميزين</a>
            <i class="fa fa-angle-left"></i>
          </li>
				</ul>
			</div>

@endsection

@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12 ">
      @include('admin.users.add')
      <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet box blue">
        <div class="portlet-title">
          <div class="caption col-md-9">
          @if($type == 1)
            عضوية معارض السيارات 6 شهور
          @elseif($type == 2) 
            عضوية معارض السيارات سنه
          @elseif($type == 3)
            الخدمات المتكرره
          @endif 
          </div>
        </div>
        <div class="portlet-body">
          <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
              <thead>
                <tr>
                  <th>رقم العضويه</th>
                  <th>الاسم بالكامل</th>
                  <th>تاريخ البدايه</th>
                  <th>تاريخ النهايه</th>
                  <th>الادوات</th>
                </tr>
              </thead>
              <tbody>
                @foreach(\App\Vim::where('type',$type)->orderBy('end_date','desc')->get() as $vim)
                  <tr>
                    <td>{{$vim->User->id}}</td>
                    <td>{{$vim->User->name}}</td>
                    <td>{{get_date($vim->start_date)}}</td>
                    <td>{{get_date($vim->end_date)}}</td>
                    <td>
                      <a href="{{url('admincp/vimEdit/'.$vim->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                      <a href="{{url('admincp/vimDel/'.$vim->id)}}" class="btn btn-danger vimDel" data-token="{{csrf_token()}}" ><i class="fa fa-user-times"></i>  حذف </a>
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
              search: " بحث برقم العضويه:",
              zeroRecords: "لا توجد نتائج "
          },
          fixedHeader: {header: !0, headerOffset: a},
          order: false,
          lengthMenu: [[10, 20, 30, 50, -1], [10, 20, 30, 50, "الكل"]],
          pageLength: 10,
          columnDefs: [{ "targets": [1,2,3,4], "searchable": false },{ "targets": [4], "orderable": false }]
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


  $(document).on('click','.vimDel',function(e){
    e.preventDefault();
    var a   = $(this),
    url     = $(this).attr('href'),
    token   = $(this).data('token');
    $.post(url,{_token:token},function(data){
      if(data == 'done'){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["success"]("تم الحذف");
        a.closest('tr').hide();
      }else{
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["error"]("حدث خطأ برجاء المحاولة فى وقت لاحق");  
      }
    });
  });


</script>

@endsection