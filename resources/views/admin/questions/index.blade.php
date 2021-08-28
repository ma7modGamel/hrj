@extends('admin.layouts.app')

@section('title')
	التحكم بالأسئلة
@endsection

@section('header')

@endsection

@section('megaMenu')
		<div class="hor-menu hor-menu-light hidden-sm hidden-xs">
			<ul class="nav navbar-nav">
				<!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
				<li class="classic-menu-dropdown active">
					<a>
					قائمة الأسئلة <span class="selected">
					</span>
					</a>
				</li>
				<li class="classic-menu-dropdown">
					<a data-target="#addQuestion" data-toggle="modal">إضاف سؤال جديد
          <i class="glyphicon glyphicon-menu-down"></i>
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
            <a>قائمة الأسئلة</a>
            <i class="fa fa-angle-left"></i>
          </li>
          <li>
            <i class="fa fa-home"></i>
            <a data-target="#addQuestion" data-toggle="modal">إضاف سؤال جديد</a>
          </li>
				</ul>
			</div>

@endsection

@section('content')

@include('admin.questions.add')

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
          <div class="portlet-title">
          <div class="caption col-md-9">
            <span><i class="icon-map"></i> عرض الأسئلة</span>
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
                  <th style="min-width:200px">
                      السؤال
                  </th>
                  <th  style="min-width:180px">
                      الإجابه
                  </th>
                  <th>
                      الأدوات
                  </th>
              </tr>
              </thead>
              <tbody>
              @if(count($questions))
              @foreach($questions as $question)
                <tr>
                  <td>{{$num++}}</td>
                  <td>{{$question->ask}}</td>
                  <td>{{$question->answer}}</td>
                  <td>
                    <a href="{{url('/admincp/questions/'.$question->id.'/edit')}}" class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                    <a class="btn btn-danger delBank" questionId="{{$question->id}}" data-token="{{ csrf_token() }}"><i class="fa fa-trash-o"></i> حذف </a>
                  </td>
                </tr>
              @endforeach
              @else
                <tr>
                  <td colspan='50' scobe='row'><div class='alert alert-info'><center> قائمة الأسئلة فارغه </center></div></td>
                </tr>
              @endif
              </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->

@endsection

<!-- footer -->
@section('footer')
<script type="text/javascript">
  
@if(count($errors) > 0)
  $('#addQuestion').modal()
@endif

$(document).on("click",".delBank",function() {
var a=$(this);
  var token = $(this).data('token'),
  id = $(this).attr('questionId'),
  route = "{!! url('admincp/questions') !!}" + "/" + id;
  $.ajax({
      url:route,
      type: 'post',
      data: {_method: 'delete', _token :token},
      success:function(data){
        a.closest('tr').hide();
        if(data=="empty"){
          toastr.options.timeOut = '6000';
          toastr.options.positionClass = 'toast-bottom-left';
          Command: toastr["info"]("تم حذف السؤال بنجاح -- القاائمة الآن فارغة")
          $('.portlet-body').append("<div class='alert alert-info'><center> قائمة الأسئلة فارغه </center></div>");
        } else if (data=="done"){
          toastr.options.timeOut = '6000';
          toastr.options.positionClass = 'toast-bottom-left';
          Command: toastr["success"]("تم حذف السؤال بنجاح")
        }
      } 
  });
});
</script>
@endsection