@extends('admin.layouts.app')

@section('title')
عرض الرسالة
@endsection

@section('header')
{!! HTML::style('public/admin/apps/css/inbox-rtl.min.css') !!}
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
        عرض الرسائل والطلبات 
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
      <a>عرض الرسائل والطلبات</a>
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
          عرض رسالة {{$contact->email}}  </a>
        </li>
        @if($contact->user_id != 0)
        <li>
          @if($contact->user_id !== NULL)
          <a href="{{url('conv/'.$contact->user_id)}}" target="_blank">
          @else
          <a href="#tab_1_2" data-toggle="tab">
          @endif
          الرد على الرساله  </a>
        </li>
        @endif
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
                          رساله رقم : {{$contact->id}} -> {{contactType()[$contact->type]}}
                        </div>
                        <hr>
                        <div class="profile-usertitle-name">
                         {{$contact->name}}
                       </div>
                       <hr>
                       <div class="profile-usertitle-job">
                        {{$contact->phone}}
                      </div>
                      <hr>
                      <div class="profile-usertitle-job">
                        {{$contact->email}}
                      </div>
                      <hr>
                      @if($contact->type == 3)
                      <div class="profile-usertitle-job">
                       <a data-toggle="modal" href="#large" class="btn btn-lg blue">الصور</a>
                     </div>
                     @endif
                   </div>
                   <!-- END SIDEBAR USER TITLE -->
                 </div>
                 <div class="col-md-10">
                  <div class="inbox-content">
                    <div class="inbox-view-info">
                      <div class="row">
                        <div class="col-md-7">
                          <span class="bold">
                           التاريخ : {{get_date($contact->created_at)}} 
                         </span>
                         <span class="bold">
                          الوقت : {{get_time($contact->created_at)}}
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="inbox-view">
                    <p>
                      {{$contact->body}}
                    </p>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fontawesome-demo" id="tab_1_2">
        <div class="portlet box red">
          <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{url('admin/contactsReplay')}}" class="form-horizontal">
              <div class="form-body">
                <div class="form-group">
                  <label class="col-md-2 control-label">البريد الإلكترونى </label>
                  <div class="col-md-8">
                    <div class="input-group">
                      <span class="input-group-addon input-circle-left">
                        <i class="fa fa-envelope"></i>
                      </span>
                      <input type="email" name="email" class="form-control input-circle-right" value="{{$contact->email}}" placeholder="البريد الإلكترونى"> 
                    </div>
                    @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif

                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">نص الرساله</label>
                  <div class="col-md-8">
                    <div class="input-group">
                      <span class="input-group-addon input-circle-left">
                        <i class="fa fa-envelope"></i>
                      </span>
                      <textarea name="body" class="form-control input-circle-right"></textarea>
                      @if ($errors->has('body'))
                      <span class="help-block">
                        <strong>{{ $errors->first('body') }}</strong>
                      </span>
                      @endif
                      <script>
                        CKEDITOR.replace( 'body', {
                          language: 'ar'
                        } );
                      </script>
                    </div>
                  </div>
                </div>

                <div class="form-actions">
                  <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                      <button type="submit" class="btn btn-circle green">إرسال</button>
                    </div>
                  </div>
                </div>
              </form>
              <!-- END FORM-->
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
        <h4 class="modal-title">الصور</h4>
      </div>
      <div class="modal-body">
        @foreach(\App\UpImage::where('post_id',$contact->id)->get() as $image)
        @if($image->type == 'contacts')
        <img class="img-responsive img-block" src="{{image_check($image->img_name,'contacts')}}">
        <hr />
        @endif
        @endforeach            
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@endsection

<!-- footer -->
@section('footer')
<script type="text/javascript">
</script>
@endsection

