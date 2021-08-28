@extends('admin.layouts.app')

@section('title')
    إعدادت الموقع
@endsection

@section('header')
    <!-- BEGIN PAGE LEVEL STYLES -->
    {!! HTML::style('public/admin/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css') !!}
    {!! HTML::style('public/admin/global/plugins/jquery-file-upload/css/jquery.fileupload.css') !!}
    {!! HTML::style('public/admin/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') !!}
    {!! HTML::style('public/admin/global/plugins/bootstrap-colorpicker/css/colorpicker.css') !!}
    {!! HTML::style('public/admin/global/plugins/jquery-minicolors/jquery.minicolors.css') !!}
    <!-- END PAGE LEVEL STYLES -->

@endsection

@section('megaMenu')
    <div class="hor-menu hidden-sm hidden-xs">
        <ul class="nav navbar-nav">
            <!-- DOC: Remove data-hover="megamenu-dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
            <li class="classic-menu-dropdown" aria-haspopup="true">
                <a href="{{url('admincp')}}"> رئيسية لوحة التحكم
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
                <a>إعدادت العلامه المائية</a>
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
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admincp/settings') }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @foreach($settings as $setting )
                            <div class="form-group{{ $errors->has('$setting->name') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">{{$setting->slug}}</label>
                                <div class="col-md-9">
                                    <div class="input-group">
	                          <span class="input-group-addon">
	                          <i class="icon-settings"></i>
	                          </span>
                         
                                        @if($setting->type == 10)
                                            {!! FORM::text($setting->name, $setting->value ,['class'=>'form-control dd','required']) !!}
                                        @elseif($setting->type == 11)
                                            <span class="btn default blue-stripe fileinput-button form-control WM-img">
		                        @if($setting->name != null)
                                                    <img src="{{url('public/upload/logo/'.$setting->value)}}" width="100"
                                                         height="20">
                                                @else
                                                    <img src="{{url('public/upload/logo/no_image.png')}}" width="100"
                                                         height="20">
                                                @endif
                                                <i class="fa fa-plus"></i>
									<span>أختر الملف ... </span>
                                                {!! FORM::file($setting->name, array('multiple'=>false,'class'=>'ddd')) !!}
									</span>
                                        @elseif($setting->type == 12)
                                            {!! FORM::textarea($setting->name, $setting->value ,['class'=>'form-control','required']) !!}
                                        @elseif($setting->type == 13)
                                            {!! FORM::select("$setting->name",['1'=>'مفعله','0'=>'غير مفعله'],$setting->value,['class'=>'form-control','required']) !!}
                                        @elseif($setting->type == 16)
                                            {!! FORM::text($setting->name, $setting->value ,['id'=>'position-top-right','class'=>'form-control demo','data-position' => 'top right','required']) !!}

                                        @elseif($setting->type == 18)
                                            {!! FORM::select("$setting->name",[
                                                                                'center'=>'فى المنتصف',
                                                                                'top-left'=>'اعلى اليسار','top-right'=>'أعلى اليمين',
                                                                                'bottom-left'=>'أسفل اليسار','bottom-right'=>'أسفل اليمين'
                                                                                ],$setting->value,['class'=>'form-control','required']) !!}
                                        @elseif($setting->type == 17)
                                            {!! FORM::select("$setting->name",['1'=>'صورة','0'=>'نص'],$setting->value,['class'=>'form-control','required']) !!}
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
                            <label class="col-md-2 control-label">إختبار العلامة المائية</label>
                            <div class="col-md-9 ">
        						<span class="btn default blue-stripe fileinput-button">
        							<img src="{{url('public/website/images/waterMarkTest.png')}}" width="100%">
        							<i class="fa fa-plus"></i>
        							<span>أختر الملف ... </span>
                                    {!! FORM::file('waterMarkTest[]', array('multiple'=>true,'class'=>'form-control input-lg')) !!}
        						</span>
                                <br>
                                <br>
                                <br>
                            </div>
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
    {!! HTML::script('public/admin/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') !!}
    {!! HTML::script('public/admin/global/plugins/jquery-minicolors/jquery.minicolors.min.js') !!}
    {!! HTML::script('public/admin/pages/scripts/components-color-pickers.min.js') !!}
<script type="text/javascript">

    $(document).ready(function() {
        var value=$("select[name='WM_type']").val();
        if(value==1){
            $('#position-top-right,input[name="WM_str"],input[name="WM_strSize"],input[name="WM_strAngle"]').closest('.form-group').hide();
            $('input[name="WM_img"],input[name="WM_imgWidth"],input[name="WM_imgHeight"]').closest('.form-group').show();
        }
        else{
            $('#position-top-right,input[name="WM_str"],input[name="WM_strSize"],input[name="WM_strAngle"]').closest('.form-group').show();
            $('input[name="WM_img"],input[name="WM_imgWidth"],input[name="WM_imgHeight"]').closest('.form-group').hide();
        }
    });

    $(document).on("change","select[name='WM_type']",function() {
        var value=$(this).val();
        if(value==1){
            $('#position-top-right,input[name="WM_str"],input[name="WM_strSize"],input[name="WM_strAngle"]').closest('.form-group').hide();
            $('input[name="WM_img"],input[name="WM_imgWidth"],input[name="WM_imgHeight"]').closest('.form-group').show();
        }
        else{
            $('#position-top-right,input[name="WM_str"],input[name="WM_strSize"],input[name="WM_strAngle"]').closest('.form-group').show();
            $('input[name="WM_img"],input[name="WM_imgWidth"],input[name="WM_imgHeight"]').closest('.form-group').hide();
        }
    });

    $(document).on('keyup','input[name="WM_imgWidth"]',function(){
        var img = new Image(),H2,W2;
        img.src = $('.WM-img').find('img').attr('src');
        img.onload = function() {
            H2 = this.height;
            W2 = this.width;
            percent = (H2 / W2) * 100;
            widthVal = $('input[name="WM_imgWidth"]').val();  
            $('input[name="WM_imgHeight"]').val((widthVal / 100) * percent);
        }
    });
</script>
@endsection