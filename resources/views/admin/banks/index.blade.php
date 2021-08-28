@extends('admin.layouts.app')

@section('title')
	التحكم بالبنوك
@endsection

@section('header')

@endsection

@section('megaMenu')
		<div class="hor-menu hor-menu-light hidden-sm hidden-xs">
			<ul class="nav navbar-nav">
				<!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
				<li class="classic-menu-dropdown active">
					<a>
					قائمة البنوك <span class="selected">
					</span>
					</a>
				</li>
				<li class="classic-menu-dropdown">
					<a data-target="#addBanks" data-toggle="modal">إضافة بنك جديد
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
            <a>قائمة البنوك</a>
            <i class="fa fa-angle-left"></i>
          </li>
          <li>
            <i class="fa fa-home"></i>
            <a data-target="#addBanks" data-toggle="modal">إضافة بنك جديد</a>
          </li>
				</ul>
			</div>

@endsection

@section('content')

@include('admin.banks.add')

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
          <div class="portlet-title">
          <div class="caption col-md-9">
            <span><i class="icon-map"></i> عرض البنوك</span>
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
                      إسم البنك
                  </th>
                  <th>
                      إسم الحساب
                  </th>
                  <th>
                      رقم الحساب
                  </th>
                  <th>
                      IBAN
                  </th>
                  <th  style="min-width:180px">
                      الأدوات
                  </th>
              </tr>
              </thead>
              <tbody>
              @if(count($banks))
              @foreach($banks as $bank)
                <tr>
                  <td>{{$num++}}</td>
                  <td>{{$bank->name}}</td>
                  <td>{{$bank->u_name}}</td>
                  <td>{{$bank->acc_num}}</td>
                  <td>{{$bank->iban}}</td>
                  <td>
                    <a href="{{url('/admincp/banks/'.$bank->id.'/edit')}}" class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                    <a class="btn btn-danger delBank" bankId="{{$bank->id}}" data-token="{{ csrf_token() }}"><i class="fa fa-trash-o"></i> حذف </a>
                  </td>
                </tr>
              @endforeach
              @else
                <tr>
                  <td colspan='50' scobe='row'><div class='alert alert-info'><center> قائمة البنوك فارغه </center></div></td>
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
  $('#addBanks').modal()
@endif

$(document).on("click",".delBank",function() {
var a=$(this);
  var token = $(this).data('token'),
  id = $(this).attr('bankId'),
  route = "{!! url('admincp/banks') !!}" + "/" + id;
  $.ajax({
      url:route,
      type: 'post',
      data: {_method: 'delete', _token :token},
      success:function(data){
        a.closest('tr').hide();
        if(data=="empty"){
          toastr.options.timeOut = '6000';
          toastr.options.positionClass = 'toast-bottom-left';
          Command: toastr["info"]("تم حذف البنك بنجاح -- القاائمة الآن فارغة")
          $('.portlet-body').append("<div class='alert alert-info'><center> قائمة البنوك فارغه </center></div>");
        } else if (data=="done"){
          toastr.options.timeOut = '6000';
          toastr.options.positionClass = 'toast-bottom-left';
          Command: toastr["success"]("تم حذف البنك بنجاح")
        }
      } 
  });
});
</script>
@endsection