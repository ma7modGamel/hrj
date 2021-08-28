@extends('admin.layouts.app')

@section('title')
	إعدادت الموقع
@endsection

@section('header')
<!-- BEGIN PAGE LEVEL STYLES -->
{!! HTML::style('public/admin/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css') !!}
{!! HTML::style('public/admin/global/plugins/jquery-file-upload/css/jquery.fileupload.css') !!}
{!! HTML::style('public/admin/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') !!}
<!-- END PAGE LEVEL STYLES -->

@endsection

@section('megaMenu')
<div class="hor-menu hidden-sm hidden-xs">
    <ul class="nav navbar-nav">
        <!-- DOC: Remove data-hover="megamenu-dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
        <li class="classic-menu-dropdown" aria-haspopup="true">
            <a href="{{url('/admincp')}}"> رئيسية لوحة التحكم
            </a>
        </li>
        <li class="mega-menu-dropdown active" aria-haspopup="true">
            <a> إعدادت الموقع
                <span class="selected"> </span>
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
            <a>إعدادت الموقع</a>
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
        	<div class="portlet box red">
          		<div class="portlet-title">
          			<div class="caption col-md-9">
          				تعديل إعددات الموقع 
          			</div>
          			<div class="tools">
            			<a href="javascript:;" class="collapse"></a>
          			</div>
          		</div>
          		<div class="portlet-body">
		            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admincp/settings') }}" enctype="multipart/form-data">
		            {{ csrf_field() }}
		            @foreach($settings as $setting )
		              <div class="form-group{{ $errors->has('$setting->name') ? ' has-error' : '' }}">
		                  <label class="col-md-2 control-label">{{$setting->slug}}</label>
		                  <div class="col-md-9">
		                     <div class="input-group">
		                          <span class="input-group-addon">
		                          <i class="icon-settings"></i>
		                          </span>
		                          @if($setting->type == 0)
		                          	{!! FORM::text($setting->name, $setting->value ,['class'=>'form-control','required']) !!}
		                          @elseif($setting->type == 1)
										<span class="btn default blue-stripe fileinput-button form-control">
			                        @if($setting->name != null)
			                        	<img src="{{url('public/upload/logo/'.$setting->value)}}" width="100" height="20">
			                        @else
			                        	<img src="{{url('public/upload/logo/no_image.png')}}" width="100" height="20">
			                        @endif
										<i class="fa fa-plus"></i>
										<span>أختر الملف ... </span>
			                          		{!! FORM::file($setting->name, array('multiple'=>false)) !!}
										</span>
		                          @elseif($setting->type == 2)
		                          	{!! FORM::textarea($setting->name, $setting->value ,['class'=>'form-control','required']) !!}
		                          @elseif($setting->type == 3)
		                          	{!! FORM::select("$setting->name",['0'=>'مغلق','1'=>'مفتوح'],$setting->value,['class'=>'form-control','required']) !!}
		                          @endif
		                      </div>
		                      @if ($errors->has('$setting->name'))
		                          <span class="help-block">
		                              <strong>{{ $errors->first('$setting->name') }}</strong>
		                          </span>
		                      @endif
		                  </div>
		              </div>
		            @endforeach
		              <div class="form-actions">
		                  <div class="row">
		                      <div class="col-md-offset-3 col-md-9">
		                        <button type="submit" class="btn green">حفظ الإعدادات
		                          <i class="fa fa-save"></i>
		                        </button>
		                      </div>
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
</section><!-- /.content -->



@endsection

<!-- footer -->
@section('footer')

@endsection