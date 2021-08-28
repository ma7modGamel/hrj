@extends('admin.layouts.app')

@section('title')
	عرض التحويل
@endsection

@section('header')
{!! HTML::style('public/admin/apps/css/inbox-rtl.min.css') !!}
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!! HTML::style('public/admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
        {!! HTML::style('public/admin/global/css/components-rounded-rtl.min.css') !!}<!-- END PAGE LEVEL PLUGINS -->


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
          <a href="{{url('admincp/transfers')}}">
          عرض التحويلات 
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
            <a>عرض التحويلات</a>
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
            عرض التحويل {{$transfer->email}}  </a>
          </li>
          <li>
            <a href="{{url('conv/'.$transfer->user_id)}}" target="_blank">
            الرد على العضو  </a>
          </li>
          @if($transfer->done == 0)
          <a id="transfersDone" href="{{url('admincp/transfersDone')}}" data-token="{{csrf_token()}}" class="btn btn-success pull-right ">تأكيد هذا التحويل  </a> 
          @else
          <a id="transfersDone" href="{{url('admincp/transfersDone')}}" data-token="{{csrf_token()}}" class="btn btn-success pull-right ">إلغاء تأكيد هذا التحويل  </a>
          @endif
          @if(\App\Vim::where('user_id',$transfer->User->id)->count() == 0)
          <div class="profile-usertitle-job">
            <a data-toggle="modal" style="position: relative;left: 15px;" href="#large" class="btn btn-outline dark pull-right">إضافة للعضويات المميزه</a>
          </div>
          @endif

          <!-- <a style="position: relative;left: 15px;" class="btn btn-outline dark pull-right" data-toggle="modal" href="#responsive">  </a>             -->
        </ul>
        <div class="tab-content">
          <div class="tab-pane active fontawesome-demo" id="tab_1_1">
            <div class="portlet light">
                <div class="portlet-body">
                    <div class="row inbox">
                        <div class="col-md-2">
                          <!-- SIDEBAR USER TITLE -->
                          <div class="profile-usertitle">
                              <div class="profile-usertitle-job">
                               نوع التحويل : {{transferType()[$transfer->type]}}
                              </div>
                              <hr>
                              <div class="profile-usertitle-job">
                                  المبلغ المحول : {{$transfer->amount}}
                              </div>
                              <hr>
                              <div class="profile-usertitle-job">
                                  الإسم المحول : {{$transfer->name}}
                              </div>
                              <hr>
                              <div class="profile-usertitle-job">
                                @if($transfer->Bank)
                                  البنك : {{$transfer->Bank->name}}
                                @else
                                  البنك : بنك آخر
                                @endif
                              </div>
                              <hr>
                              <div class="profile-usertitle-job">
                                  رقم الإعلان : {{$transfer->post_id}}
                      
                      
                              </div>
                              <hr>
                              <div class="profile-usertitle-job">
                                  منذ : {{transferDate()[$transfer->date]}}
                              </div>
                              <hr>
                              <div class="profile-usertitle-name">
                              @if($transfer->User)
                                  إسم العضو : 
                                  <a href="{{url('users/'.$transfer->User->id)}}">{{$transfer->User->name}}</a>
                              @else
                                  عضو محظور
                              @endif
                              </div>
                              <hr>
                              <div class="profile-usertitle-name">
                              @if($transfer->Post)
                                  الإعلان : 
                                  <a href="{{url('ads/'.$transfer->Post->id)}}">{{$transfer->Post->title}}</a>
                              @else
                                  إعلان محظور
                              @endif
                              </div>
                          </div>
                          <!-- END SIDEBAR USER TITLE -->
                        </div>
                        <div class="col-md-10">
                            <div class="inbox-content">
                                <div class="inbox-view-info">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <span class="bold">
                                                التاريخ : {{get_date($transfer->created_at)}} 
                                            </span>
                                            <span class="bold">
                                                الوقت : {{get_time($transfer->created_at)}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="inbox-view">
                                    <p>
                                        {{$transfer->notes}}
                                    </p>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- END PAGE CONTENT-->
<div class="modal fade modal-scroll" id="large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">إعدادت تمييز العضو</h4>
            </div>
            <div class="modal-body">
              <form id="vimForm">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">

                          <div class="col-md-12">
                              <p>
                                <label >إسم العضو </label>
                                <input type="hidden" name="user_id" value="{{$transfer->User->id}}">
                                <input class="form-control" placeholder="إسم العضو" type="text" name="userName" value="{{$transfer->User->name}}">
                              </p>
                          </div>
                        </div>
                        <select class="form-control" name="type">
                            <option value="#" selected disabled>إختر نوع التمييز</option>
                            <option value="1">عضوية معارض السيارات والعقارات 6 شهور</option>
                            <option value="2">عضوية معارض السيارات والعقارات سنة</option>
                            <option value="3">الخدمات المكررة</option>
                        </select>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                              <div class="input-group input-large date-picker input-daterange" style="width: 100%!important" data-date="10/11/2012" data-date-format="yyyy/mm/dd">
                                <span class="input-group-addon"> من </span>
                                <input type="text" class="form-control" name="from">
                                <span class="input-group-addon"> إلى </span>
                                <input type="text" class="form-control" name="to"> 
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-outline dark">إغلاق</button>
                    <button type="button" id="vimFormSubmit" class="btn green">إضافة</button>
                </div>
              </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

<!-- footer -->
@section('footer')

        <!-- BEGIN PAGE LEVEL PLUGINS -->
{!! HTML::script('public/admin/global/plugins/moment.min.js') !!}
{!! HTML::script('public/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') !!}
{!! HTML::script('public/admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}
        <!-- END PAGE LEVEL PLUGINS -->

{!! HTML::script('public/admin/pages/scripts/components-date-time-pickers.min.js') !!}

<script type="text/javascript">
  $(document).on('click','#transfersDone',function(e){
    e.preventDefault();
    var a   = $(this),
    url     = $(this).attr('href'),
    token   = $(this).data('token'),
    transId = "{{$transfer->id}}"; 
    $.post(url,{_token :token,transId :transId},function(data){
      if(data == 'done'){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["success"]("تم تأكيد التحويل بنجاح");
        a.text('إلغاء تأكيد هذا التحويل');
      }else if(data == 'notDone'){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم إلغاء تأكيد التحويل");
        a.text('تأكيد هذا التحويل');
      }else{
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["error"]("حدث خطأ برجاء المحاولة فى وقت لاحق");  
      }
    });
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
    url     = "{{url('admincp/vims/add')}}",
    data    = $('#vimForm').serialize(); 
    $.post(url,data,function(data){
      if(data == 'done'){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["success"]("تمت الإضافة بنجاح");
      }else if(data == 'same'){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("هذا العضو مضاف بالفعل لقوائم المميزين");
      }else{
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["error"]("حدث خطأ برجاء المحاولة فى وقت لاحق");  
      }
    });
  });
</script>
@endsection

