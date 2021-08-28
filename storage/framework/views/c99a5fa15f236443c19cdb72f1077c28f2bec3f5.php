

<?php $__env->startSection('title'); ?>
	عرض التحويل
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<?php echo HTML::style('public/admin/apps/css/inbox-rtl.min.css'); ?>

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <?php echo HTML::style('public/admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>

        <?php echo HTML::style('public/admin/global/css/components-rounded-rtl.min.css'); ?><!-- END PAGE LEVEL PLUGINS -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('megaMenu'); ?>
    <div class="hor-menu hor-menu-light hidden-sm hidden-xs">
      <ul class="nav navbar-nav">
        <!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
        <li class="classic-menu-dropdown" aria-haspopup="true">
            <a href="<?php echo e(url('admincp')); ?>"> رئيسية لوحة التحكم
                <i class="fa fa-angle-left"></i>
            </a>
        </li>
        <li class="classic-menu-dropdown active">
          <a href="<?php echo e(url('admincp/transfers')); ?>">
          عرض التحويلات 
          <span class="selected"></span>
          <i class="fa fa-angle-down"></i>
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
            <a>عرض التحويلات</a>
            <i class="fa fa-angle-down"></i>
          </li>
        </ul>
      </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- BEGIN PAGE CONTENT-->
  <div class="row">
    <div class="col-md-12">
      <div class="tabbable-line">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#tab_1_1" data-toggle="tab">
            عرض التحويل <?php echo e($transfer->email); ?>  </a>
          </li>
          <li>
            <a href="<?php echo e(url('conv/'.$transfer->user_id)); ?>" target="_blank">
            الرد على العضو  </a>
          </li>
          <?php if($transfer->done == 0): ?>
          <a id="transfersDone" href="<?php echo e(url('admincp/transfersDone')); ?>" data-token="<?php echo e(csrf_token()); ?>" class="btn btn-success pull-right ">تأكيد هذا التحويل  </a> 
          <?php else: ?>
          <a id="transfersDone" href="<?php echo e(url('admincp/transfersDone')); ?>" data-token="<?php echo e(csrf_token()); ?>" class="btn btn-success pull-right ">إلغاء تأكيد هذا التحويل  </a>
          <?php endif; ?>
          <?php if(\App\Vim::where('user_id',$transfer->User->id)->count() == 0): ?>
          <div class="profile-usertitle-job">
            <a data-toggle="modal" style="position: relative;left: 15px;" href="#large" class="btn btn-outline dark pull-right">إضافة للعضويات المميزه</a>
          </div>
          <?php endif; ?>

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
                               نوع التحويل : <?php echo e(transferType()[$transfer->type]); ?>

                              </div>
                              <hr>
                              <div class="profile-usertitle-job">
                                  المبلغ المحول : <?php echo e($transfer->amount); ?>

                              </div>
                              <hr>
                              <div class="profile-usertitle-job">
                                  الإسم المحول : <?php echo e($transfer->name); ?>

                              </div>
                              <hr>
                              <div class="profile-usertitle-job">
                                <?php if($transfer->Bank): ?>
                                  البنك : <?php echo e($transfer->Bank->name); ?>

                                <?php else: ?>
                                  البنك : بنك آخر
                                <?php endif; ?>
                              </div>
                              <hr>
                              <div class="profile-usertitle-job">
                                  رقم الإعلان : <?php echo e($transfer->post_id); ?>

                      
                      
                              </div>
                              <hr>
                              <div class="profile-usertitle-job">
                                  منذ : <?php echo e(transferDate()[$transfer->date]); ?>

                              </div>
                              <hr>
                              <div class="profile-usertitle-name">
                              <?php if($transfer->User): ?>
                                  إسم العضو : 
                                  <a href="<?php echo e(url('users/'.$transfer->User->id)); ?>"><?php echo e($transfer->User->name); ?></a>
                              <?php else: ?>
                                  عضو محظور
                              <?php endif; ?>
                              </div>
                              <hr>
                              <div class="profile-usertitle-name">
                              <?php if($transfer->Post): ?>
                                  الإعلان : 
                                  <a href="<?php echo e(url('ads/'.$transfer->Post->id)); ?>"><?php echo e($transfer->Post->title); ?></a>
                              <?php else: ?>
                                  إعلان محظور
                              <?php endif; ?>
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
                                                التاريخ : <?php echo e(get_date($transfer->created_at)); ?> 
                                            </span>
                                            <span class="bold">
                                                الوقت : <?php echo e(get_time($transfer->created_at)); ?>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="inbox-view">
                                    <p>
                                        <?php echo e($transfer->notes); ?>

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
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">

                          <div class="col-md-12">
                              <p>
                                <label >إسم العضو </label>
                                <input type="hidden" name="user_id" value="<?php echo e($transfer->User->id); ?>">
                                <input class="form-control" placeholder="إسم العضو" type="text" name="userName" value="<?php echo e($transfer->User->name); ?>">
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
<?php $__env->stopSection(); ?>

<!-- footer -->
<?php $__env->startSection('footer'); ?>

        <!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo HTML::script('public/admin/global/plugins/moment.min.js'); ?>

<?php echo HTML::script('public/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'); ?>

<?php echo HTML::script('public/admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>

        <!-- END PAGE LEVEL PLUGINS -->

<?php echo HTML::script('public/admin/pages/scripts/components-date-time-pickers.min.js'); ?>


<script type="text/javascript">
  $(document).on('click','#transfersDone',function(e){
    e.preventDefault();
    var a   = $(this),
    url     = $(this).attr('href'),
    token   = $(this).data('token'),
    transId = "<?php echo e($transfer->id); ?>"; 
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
    url     = "<?php echo e(url('admincp/vims/add')); ?>",
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/admin/transfers/viewMsg.blade.php ENDPATH**/ ?>