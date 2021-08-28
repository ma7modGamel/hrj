@extends('admin.layouts.app')

@section('title')
	تعديل إعلان
@endsection
@section('header')
    <!-- DataTables -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    {!! HTML::style('public/admin/global/plugins/datatables/datatables.min.css') !!}
    {!! HTML::style('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css') !!}
    <!-- END PAGE LEVEL STYLES -->

    {!! HTML::style('public/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}
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
        <li class="classic-menu-dropdown">
          <a href="{{url('admincp/posts')}}">
          الإعلانات <span class="selected">
          </span>
          <i class="fa fa-angle-left"></i>
          </a>
        </li>
				<li class="classic-menu-dropdown active">
					<a>
					تعديل الإعلان / {{$post->title}}
					<span class="selected"></span>
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
						<a href="{{url('admincp/posts')}}">الإعلانات</a>
						<i class="fa fa-angle-left"></i>
					</li>
					<li>
						<i class="fa fa-home"></i>
						<a>تعديل الإعلان / {{$post->title}}</a>
						<i class="fa fa-angle-down"></i>
					</li>
				</ul>
			</div>

@endsection

@section('content')

      <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-md-12">
          <div class="tabbable-line">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#tab_1_1" data-toggle="tab">
                تعديل البيانات  </a>
              </li>
              <li>
                <a href="#tab_1_2" data-toggle="tab">
                 التعليقات</a>
              </li>
              <li>
                <a href="#tab_1_3" data-toggle="tab">
                المتابعين  </a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active fontawesome-demo" id="tab_1_1">
                <div class="portlet box blue">
                  <div class="portlet-title">
                    <div class="caption col-md-9">
                    تعديل الإعلان / {{$post->title}}
                    </div>
                  </div>
                  <div class="portlet-body">
                  {!! FORM::model($post ,['route'=> ['posts.update',$post->id],'method' => 'PATCH', 'class'=>'form-horizontal','files'=>'true']) !!}
                    @include('admin.posts.form')
                  {!! FORM::close() !!}
                  </div>
                </div>
              </div>
              <div class="tab-pane fontawesome-demo" id="tab_1_2">
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
                    @php $num=1; @endphp
                    @foreach($post->Cmnt as $cmnt)
                      <tr>
                        <td>{{$num++}}</td>
                        @if($cmnt->User)
                        <td><a href="{{url('admincp/users/'.$cmnt->user_id)}}">{{$cmnt->User->name}}</a></td>
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
              <div class="tab-pane fontawesome-demo" id="tab_1_3">
                <div class="portlet-body">
                  <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th style="width:370px !important">إسم العضو</th>
                        <th>تاريخ المتابعه</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php $num = 1; @endphp
                    @foreach($post->Users as $user)
                      <tr>
                        <td>{{$num++}}</td>
                        @if($user)
                        <td><a href="{{url('users/'.$user->id.'/'.$user->name)}}">{{$user->name}}</a></td>
                        @else
                        <td>عضو محظور</td>
                        @endif
                        <td> منذ {{ timeToStr(strtotime($user->pivot->created_at))}}</td>
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
  {!! HTML::script('public/admin/custom/js/editPost.js') !!}

  {!! HTML::script('public/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}
  <!-- END PAGE LEVEL PLUGINS -->


<script type="text/javascript">
$(document).ready(function(){
  if($('#select11').val() == 1 ) {
    $('#carDiv').show();
  }
  
  @if($errors->has('brand') || $errors->has('model'))
    $('#carDiv').show();
  @endif
});

</script>
@endsection
