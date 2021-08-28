@extends('admin.layouts.app')

@section('title')
	تعديل بيانات العضو {{$user->name}}
@endsection

@section('header')
    <!-- DataTables -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    {!! HTML::style('public/admin/global/plugins/datatables/datatables.min.css') !!}
    {!! HTML::style('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css') !!}
    {!! HTML::style('public/admin/pages/css/invoice-2-rtl.min.css') !!}
    {!! HTML::style('public/admin/custom/css/MessagesUser.css') !!}
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
        <li class="classic-menu-dropdown">
          <a href="{{url('admincp/users')}}">
          المستخدمين <span class="selected">
          </span>
          <i class="fa fa-angle-left"></i>
          </a>
        </li>
				<li class="classic-menu-dropdown active">
					<a>
					تعديل بيانات / {{$user->name}}
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
						<a href="{{url('admincp/users')}}">المستخدمين</a>
						<i class="fa fa-angle-left"></i>
					</li>
					<li>
						<i class="fa fa-home"></i>
						<a>تعديل بيانات / {{$user->name}}</a>
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
                <a href="#tab_1_1" data-toggle="tab"> تعديل البيانات </a>
              </li>
              <li>
                <a href="#tab_1_2" data-toggle="tab"> الإعلانات </a>
              </li>
              <li>
                <a href="#tab_1_3" data-toggle="tab"> التعليقات </a>
              </li>
              <li>
                <a href="#tab_1_4" data-toggle="tab"> محادثات العضو </a>
              </li>
              <li>
                <a href="#tab_1_5" data-toggle="tab"> متابعة الإعلانات</a>
              </li>
              <li>
                <a href="#tab_1_6" data-toggle="tab"> متابعه الأعضاء </a>
              </li>
              <li>
                <a href="#tab_1_7" data-toggle="tab"> رتب العضو </a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active fontawesome-demo" id="tab_1_1">
                <div class="portlet box blue">
                  <div class="portlet-title">
                    <div class="caption col-md-9">
                    تعديل بيانات / {{$user->name}}
                    </div>
                  </div>
                  <div class="portlet-body">
                  {!! FORM::model($user ,['route'=> ['users.update',$user->id],'method' => 'PATCH', 'class'=>'form-horizontal','files'=>'true']) !!}
                    @include('admin.users.form')
                  {!! FORM::close() !!}
                  </div>
                </div>
              </div>
              <div class="tab-pane fontawesome-demo" id="tab_1_2">
                <div class="portlet-body">
                  <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                      <thead>
                        <tr>
                          <th>رقم الإعلان</th>
                          <th>عنوان الإعلان</th>
                          <th>القسم</th>
                          <th>المعلن</th>
                          <th>تاريخ الإضافة</th>
                          <th>الادوات</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($user->Post as $post)
                          <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->Cat->name ?? '' }}</td>
                            @if($post->User()->count())
                            <td><a href="{{url('users/'.$post->User->id)}}">{{$post->User->name ?? ''}}</a></td>
                            @else
                            <td>عضو محظور</td>
                            @endif
                            <td> منذ {{ timeToStr(strtotime($post->created_at))}}</td>
                            <td>
                              <a href="{{url('admincp/posts/'.$post->id.'/edit')}}" class="btn btn-success"><i class="fa fa-edit"></i> التحكم </a>
                              <a class="btn btn-danger blockedPost" postId="{{$post->id}}" data-token="{{ csrf_token() }}"><i class="fa fa-post-times"></i> حظر </a>
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
                        <th>رقم الإعلان</th>
                        <th>عنوان الإعلان</th>
                        <th style="width:370px !important">النص</th>
                        <th>التاريخ</th>
                        <th>الادوات</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($user->Cmnt as $cmnt)
                      <tr>
                        <td>{{$cmnt->post_id}}</td>
                        @if($cmnt->Post)
                        <td><a href="{{url('ads/'.$cmnt->post_id.'/'.$cmnt->Post->title)}}">{{$cmnt->Post->title}}</a></td>
                        @else
                        <td>إعلان محظور</td>
                        @endif
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
              <div class="tab-pane fontawesome-demo" id="tab_1_4">
                <div class="portlet-body">
                  <table class="table table-hover" id="sample_15">
                    <thead>
                      <tr>
                          <th>#</th>
                          <th>المحادثات</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php $iMsgNum = 1; @endphp
                    @foreach($user->Message->unique('user_to') as $msg)
                      @if($msg->UserTo)
                      <tr class="showMsg" href="{{url('admincp/conv/'.$msg->user_id.'/'.$msg->user_to)}}" style="cursor: pointer;">
                        <td>{{$iMsgNum++}}</td>
                        <td>
                          <div class="avatar">
                          <b>{{$msg->UserTo->name}}</b>
                          </div>
                        </td>
                      </tr>
                      @else
                      <tr class="showMsg" href="{{url('admincp/conv/'.$msg->user_id.'/'.$msg->user_to)}}" style="cursor: pointer;">
                        <td>{{$iMsgNum++}}</td>
                        <td>
                          <div class="avatar">
                          <img src="{{Request::root().'/public/upload/users/noImage.png'}}" draggable="false"/>
                          <strike>عضو محظور</strike>
                          </div>
                        </td>
                      </tr>
                      @endif
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fontawesome-demo" id="tab_1_5">
                <div class="portlet-body">
                  <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_3">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th style="width:370px !important">عنوان الإعلان</th>
                        <th>تاريخ المتابعه</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php $num = 1; @endphp
                    @foreach($user->Posts as $post)
                      <tr>
                        <td>{{$num++}}</td>
                        @if($post)
                        <td><a href="{{url('ads/'.$post->id.'/'.$post->title)}}">{{$post->title}}</a></td>
                        @else
                        <td>إعلان محظور</td>
                        @endif
                        <td> منذ {{ timeToStr(strtotime($post->pivot->created_at))}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fontawesome-demo" id="tab_1_6">
                <div class="portlet-body">
                  <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_4">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th style="width:370px !important">إسم العضو</th>
                        <th>تاريخ المتابعه</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php $num = 1; @endphp
                    @foreach($user->Follows as $userFollow)
                      <tr>
                        <td>{{$num++}}</td>
                        @if($userFollow)
                        <td><a href="{{url('ads/'.$userFollow->id.'/'.$userFollow->name)}}">{{$userFollow->name}}</a></td>
                        @else
                        <td>عضو محظور</td>
                        @endif
                        <td> منذ {{ timeToStr(strtotime($userFollow->pivot->created_at))}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fontawesome-demo" id="tab_1_7">
                <div class="col-md-6">
                  <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_5">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>الرتية</th>
                          <th>تاريخ تسجيلها</th>
                          <th>الأدوات</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $num = 1; @endphp
                        @foreach($user->Rank()->orderBy('created_at','desc')->get() as $rank)
                        <tr>
                          <td>{{$num++}}</td>
                          <td>{{$rank->rank_title}}</td>
                          <td> منذ {{ timeToStr(strtotime($rank->created_at))}}</td>
                          <td>
                            <a href="{{url('admincp/delRank/'.$rank->id)}}" data-token="{{csrf_token()}}" class="btn btn-danger delRank">حذف</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="portlet box blue">
                    <div class="portlet-title">
                      <div class="caption col-md-9">
                        إضافة رتبة جديده
                      </div>
                    </div>
                    <div class="portlet-body">
                      <form id="rankForm">
                        {{csrf_field()}}
                        <div class="row">
                          <div class="col-md-2">
                            <label>عنوان الرتبه</label>
                          </div>
                          <div class="col-md-10">
                            <input class="form-control" type="text" name="rank_title">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-2">
                            <label>نوع الرتبة</label>
                          </div>
                          <div class="col-md-8">
                            <select name="rank_type" class="form-control">
                              <option value="#" selected disabled>أختر نوع الرتبه</option>
                              <option value="1">تاجر</option>
                              <option value="2">دفع عمولة</option>
                            </select>
                          </div>
                          <div class="col-md-2">
                            <a class="btn btn-success" id="addRank" href="{{url('admincp/addRank')}}">إضافة</a>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END PAGE CONTENT-->

<!-- show cmnt Modal-->
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
<!-- show Message Modal-->
    <div class="modal fade" id="userMessage" tabindex="-1" role="userMessage" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="msgId"> عرض المحادثة</h4>
                </div>
                <div class="modal-body" id="convBody">

                </div>

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
  {!! HTML::script('public/admin/custom/js/editUser.js') !!}

  <!-- END PAGE LEVEL PLUGINS -->
<script type="text/javascript">


$(document).on("click",".blockedcmnt",function() {
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

$(document).on("click","#addRank",function(e) {
  e.preventDefault();
  var url = $(this).attr('href'),
  a       = $(this),
  data    = $('#rankForm').serialize();
  $.post(url,data,function(data){
    if(data=="done"){
      toastr.options.timeOut = '6000';
      toastr.options.positionClass = 'toast-bottom-left';
      Command: toastr["success"]("تم إضافة الرتبة بنجاح");
      $('input[name=rank_title]').val('');
    } else {
      toastr.options.timeOut = '6000';
      toastr.options.positionClass = 'toast-bottom-left';
      Command: toastr["error"]("حدث خطأ برجاء المحاولة فى وقت لاحق")
    }
  });
});
$(document).on("click",".delRank",function(e) {
  e.preventDefault();
  var url   = $(this).attr('href'),
  a         = $(this),
  token     = $(this).data('token');
  $.post(url,{_token:token},function(data){
    if(data=="done"){
      toastr.options.timeOut = '6000';
      toastr.options.positionClass = 'toast-bottom-left';
      Command: toastr["info"]("تم الحذف بنجاح");
      a.closest('tr').hide();
    } else {
      toastr.options.timeOut = '6000';
      toastr.options.positionClass = 'toast-bottom-left';
      Command: toastr["error"]("حدث خطأ برجاء المحاولة فى وقت لاحق")
    }
  });
});
</script>

@endsection