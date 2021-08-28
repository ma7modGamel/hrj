<?php $__env->startSection('title'); ?>
    إعدادت الموقع
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <?php echo HTML::style('public/admin/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css'); ?>

    <?php echo HTML::style('public/admin/global/plugins/jquery-file-upload/css/jquery.fileupload.css'); ?>

    <?php echo HTML::style('public/admin/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css'); ?>

    <?php echo HTML::style('public/admin/global/plugins/bootstrap-colorpicker/css/colorpicker.css'); ?>

    <?php echo HTML::style('public/admin/global/plugins/jquery-minicolors/jquery.minicolors.css'); ?>

    <!-- END PAGE LEVEL STYLES -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('megaMenu'); ?>
    <div class="hor-menu hidden-sm hidden-xs">
        <ul class="nav navbar-nav">
            <!-- DOC: Remove data-hover="megamenu-dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
            <li class="classic-menu-dropdown" aria-haspopup="true">
                <a href="<?php echo e(url('admincp')); ?>"> رئيسية لوحة التحكم
                </a>
            </li>
            <li class="mega-menu-dropdown active" aria-haspopup="true">
                <a> إعدادت الموقع
                    <span class="selected"> </span>
                </a>
            </li>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageHeader'); ?>
    <div class="page-bar hidden-md hidden-lg">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="<?php echo e(url('/admincp')); ?>">الرئيسية</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a>إعدادت العلامه المائية</a>
            </li>
        </ul>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/admincp/settings')); ?>"
                              enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group<?php echo e($errors->has('$setting->name') ? ' has-error' : ''); ?>">
                                <label class="col-md-2 control-label"><?php echo e($setting->slug); ?></label>
                                <div class="col-md-9">
                                    <div class="input-group">
	                          <span class="input-group-addon">
	                          <i class="icon-settings"></i>
	                          </span>
                         
                                        <?php if($setting->type == 10): ?>
                                            <?php echo FORM::text($setting->name, $setting->value ,['class'=>'form-control dd','required']); ?>

                                        <?php elseif($setting->type == 11): ?>
                                            <span class="btn default blue-stripe fileinput-button form-control WM-img">
		                        <?php if($setting->name != null): ?>
                                                    <img src="<?php echo e(url('public/upload/logo/'.$setting->value)); ?>" width="100"
                                                         height="20">
                                                <?php else: ?>
                                                    <img src="<?php echo e(url('public/upload/logo/no_image.png')); ?>" width="100"
                                                         height="20">
                                                <?php endif; ?>
                                                <i class="fa fa-plus"></i>
									<span>أختر الملف ... </span>
                                                <?php echo FORM::file($setting->name, array('multiple'=>false,'class'=>'ddd')); ?>

									</span>
                                        <?php elseif($setting->type == 12): ?>
                                            <?php echo FORM::textarea($setting->name, $setting->value ,['class'=>'form-control','required']); ?>

                                        <?php elseif($setting->type == 13): ?>
                                            <?php echo FORM::select("$setting->name",['1'=>'مفعله','0'=>'غير مفعله'],$setting->value,['class'=>'form-control','required']); ?>

                                        <?php elseif($setting->type == 16): ?>
                                            <?php echo FORM::text($setting->name, $setting->value ,['id'=>'position-top-right','class'=>'form-control demo','data-position' => 'top right','required']); ?>


                                        <?php elseif($setting->type == 18): ?>
                                            <?php echo FORM::select("$setting->name",[
                                                                                'center'=>'فى المنتصف',
                                                                                'top-left'=>'اعلى اليسار','top-right'=>'أعلى اليمين',
                                                                                'bottom-left'=>'أسفل اليسار','bottom-right'=>'أسفل اليمين'
                                                                                ],$setting->value,['class'=>'form-control','required']); ?>

                                        <?php elseif($setting->type == 17): ?>
                                            <?php echo FORM::select("$setting->name",['1'=>'صورة','0'=>'نص'],$setting->value,['class'=>'form-control','required']); ?>

                                        <?php endif; ?>
                                    </div>
                                    <?php if($errors->has('$setting->name')): ?>
                                        <span class="help-block">
	                                    <strong><?php echo e($errors->first('$setting->name')); ?></strong>
	                                </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <label class="col-md-2 control-label">إختبار العلامة المائية</label>
                            <div class="col-md-9 ">
        						<span class="btn default blue-stripe fileinput-button">
        							<img src="<?php echo e(url('public/website/images/waterMarkTest.png')); ?>" width="100%">
        							<i class="fa fa-plus"></i>
        							<span>أختر الملف ... </span>
                                    <?php echo FORM::file('waterMarkTest[]', array('multiple'=>true,'class'=>'form-control input-lg')); ?>

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



<?php $__env->stopSection(); ?>

<!-- footer -->
<?php $__env->startSection('footer'); ?>
    <?php echo HTML::script('public/admin/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js'); ?>

    <?php echo HTML::script('public/admin/global/plugins/jquery-minicolors/jquery.minicolors.min.js'); ?>

    <?php echo HTML::script('public/admin/pages/scripts/components-color-pickers.min.js'); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/workox0x/public_html/haraj/resources/views/admin/settings/waterMark.blade.php ENDPATH**/ ?>