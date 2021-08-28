@extends('admin.layouts.app')

@section('title')
	التحكم بالأعضاء
@endsection

@section('header')
    <!-- DataTables -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    {!! HTML::style('public/admin/global/plugins/datatables/datatables.min.css') !!}
    {!! HTML::style('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css') !!}
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!! HTML::style('public/admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
        {!! HTML::style('public/admin/global/css/components-rounded-rtl.min.css') !!}<!-- END PAGE LEVEL PLUGINS -->


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
          <a href="{{url('admincp/vimShow/1')}}">
          الأعضاء المميزين <span class="selected">
          </span>
          <i class="fa fa-angle-left"></i>
          </a>
        </li>
        <li class="classic-menu-dropdown">
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
            <a href="{{url('admincp/vimShow/1')}}">الأعضاء المميزين</a>
            <i class="fa fa-angle-left"></i>
          </li>
				</ul>
			</div>

@endsection

@section('content')
<!-- Main content -->
<section class="content">
  <div class="portlet box blue">
    <div class="portlet-title">
      <div class="caption col-md-9">
        تعديل 
      </div>
    </div>
    <div class="portlet-body">
      <form id="vimForm">
        {{csrf_field()}}
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" name="vim_id" value="{{$vim->id}}">
            <select class="form-control" name="type">
              <option value="#" disabled>إختر نوع التمييز</option>
              <option value="1" {{$vim->User->type == 1 ? 'selected' : ''}}>عضوية معارض السيارات والعقارات 6 شهور</option>
              <option value="2" {{$vim->User->type == 2 ? 'selected' : ''}}>عضوية معارض السيارات والعقارات سنة</option>
              <option value="3" {{$vim->User->type == 3 ? 'selected' : ''}}>الخدمات المكررة</option>
            </select>
            <br>
            <div class="row">
              <div class="col-md-12">
                <div class="input-group input-large date-picker input-daterange" style="width: 100%!important" data-date="10/11/2012" data-date-format="yyyy/mm/dd">
                  <span class="input-group-addon"> من </span>
                  <input type="text" class="form-control" value="{{get_date($vim->start_date)}}" name="from">
                  <span class="input-group-addon"> إلى </span>
                  <input type="text" class="form-control" value="{{get_date($vim->end_date)}}" name="to"> 
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="vimFormSubmit" class="btn green">تعديل</button>
            </div>
          </div>
        </div>
      </form>
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
        <!-- BEGIN PAGE LEVEL PLUGINS -->
{!! HTML::script('public/admin/global/plugins/moment.min.js') !!}
{!! HTML::script('public/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') !!}
{!! HTML::script('public/admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}
        <!-- END PAGE LEVEL PLUGINS -->
{!! HTML::script('public/admin/pages/scripts/components-date-time-pickers.min.js') !!}

<script type="text/javascript">


@if(count($errors))
  $('#addUser').modal()
@endif

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

  $(document).on('click','#vimFormSubmit',function(e){
    e.preventDefault();

    if($('select[name=type').val() == null){
      alert('فضلا حدد نوع التمييز');
      $('select[name=type').focus();
      return false;
    }

    if($('input[name=from').val() == ''){
      alert('فضلا حدد التاريخ من و إلى');
      return false;
    }

    if($('input[name=to').val() == ''){
      alert('فضلا حدد التاريخ من و إلى');
      return false;
    }

    var a   = $(this),
    url     = "{{url('admincp/vimEdit')}}",
    data    = $('#vimForm').serialize(); 
    $.post(url,data,function(data){
      if(data == 'done'){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["success"]("تم التعديل بنجاح");
      }else{
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["error"]("حدث خطأ برجاء المحاولة فى وقت لاحق");  
      }
    });
  });
</script>

@endsection