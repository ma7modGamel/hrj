@extends('admin.layouts.app')

@section('title')
	عرض الإعلانات
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
          الإعلانات <span class="selected">
          </span>
          <i class="fa fa-angle-left"></i>
          </a>
        </li>
        <li class="classic-menu-dropdown">
          <a href="{{url('admincp/posts/create')}}">إضافة إعلان جديد
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
            <a>الإعلانات</a>
            <i class="fa fa-angle-left"></i>
          </li>
          <li>
            <i class="fa fa-home"></i>
            <a href="{{url('admincp/posts/create')}}">إضافة إعلان جديد</a>
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
      <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet box blue">
        <div class="portlet-title">
          <div class="caption col-md-9">
          عرض الإعلانات 
          </div>
        </div>
        <div class="portlet-body">
          <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
              <thead>
                <tr>
                  <th>رقم الإعلان</th>
                  <th style="width:370px !important">عنوان الإعلان</th>
                  <th>القسم</th>
                  <th>المعلن</th>
                  <th>تاريخ الإضافة</th>
                  <th>الادوات</th>
                </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)
                  <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{(isset($post->Cat) && isset($post->Cat->name))?$post->Cat->name:''}}</td>
                    @if($post->User()->count())
                    <td><a href="{{url('users/'.$post->User->id)}}">{{(isset($post->User) && isset($post->User->name))?$post->User->name:''}}</a></td>
                    @else
                    <td>عضو محظور</td>
                    @endif
                    <td> منذ {{ timeToStr(strtotime($post->created_at))}}</td>
                    <td>
                      @if(in_array('blocked',Request::segments()))
                      <a href="{{url('admincp/posts/'.$post->id.'/rest')}}" class="btn btn-success"><i class="fa fa-undo"></i> إسترجاع </a>
                      <a class="btn btn-danger delPost" userId="{{$post->id}}"><i class="fa fa-trash-o"></i> حذف نهائى </a>
                      @else
                      <a href="{{url('admincp/posts/'.$post->id.'/edit')}}" class="btn btn-success"><i class="fa fa-edit"></i> التحكم </a>
                      <a class="btn btn-danger blockedPost" postId="{{$post->id}}" data-token="{{ csrf_token() }}"><i class="fa fa-post-times"></i> حظر </a>
                      @endif
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
              search: " بحث برقم الإعلان:",
              zeroRecords: "لا توجد نتائج "
          },
          fixedHeader: {header: !0, headerOffset: a},
          order: [[0, "تصاعدى"]],
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


$(document).on("click",".blockedPost",function() {
  var a=$(this);
  var token = $(this).data('token'),
  id = $(this).attr('postId'),
  route = "{!! url('admincp/posts') !!}" + "/" + id;
  $.ajax({
    url:route,
    type: 'post',
    data: {_method: 'delete', _token :token},
    success:function(data){
      a.closest('tr').hide();
      if(data=="empty"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حظر الإعلان بنجاح")
        $('#sample_1 tbody').append("<tr class='odd'><td valign='top' colspan='6' class='dataTables_empty'>لا توجد اى بيانات متاحه</td></tr>");
      } else if (data=="done"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حظر الإعلان بنجاح")
      }
    } 
  });
});

$(document).on("click",".delPost",function() {
  var id = $(this).attr('userId');
  toastr.options.timeOut = '0';
  toastr.options.extendedTimeOut = '0';
  toastr.options.positionClass = 'toast-bottom-left';
  Command: toastr["error"]("سيتم حذف جميع بيانات الإعلان !! .. هل تريد حذف الإعلان ؟<br /><br /><a href='{!! url('admincp/posts/') !!}/" +  id + "/delete' class='btn btn-danger'> نعم -- حذف !!</a>")
});

</script>

@endsection