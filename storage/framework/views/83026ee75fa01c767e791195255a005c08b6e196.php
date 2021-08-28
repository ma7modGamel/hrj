

<?php $__env->startSection('title'); ?>
عرض الرسالة
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<?php echo HTML::style('public/admin/apps/css/inbox-rtl.min.css'); ?>

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
      <a>
        عرض الرسائل والطلبات 
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
      <a>عرض الرسائل والطلبات</a>
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
          عرض رسالة <?php echo e($contact->email); ?>  </a>
        </li>
        <?php if($contact->user_id != 0): ?>
        <li>
          <?php if($contact->user_id !== NULL): ?>
          <a href="<?php echo e(url('conv/'.$contact->user_id)); ?>" target="_blank">
          <?php else: ?>
          <a href="#tab_1_2" data-toggle="tab">
          <?php endif; ?>
          الرد على الرساله  </a>
        </li>
        <?php endif; ?>
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
                          رساله رقم : <?php echo e($contact->id); ?> -> <?php echo e(contactType()[$contact->type]); ?>

                        </div>
                        <hr>
                        <div class="profile-usertitle-name">
                         <?php echo e($contact->name); ?>

                       </div>
                       <hr>
                       <div class="profile-usertitle-job">
                        <?php echo e($contact->phone); ?>

                      </div>
                      <hr>
                      <div class="profile-usertitle-job">
                        <?php echo e($contact->email); ?>

                      </div>
                      <hr>
                      <?php if($contact->type == 3): ?>
                      <div class="profile-usertitle-job">
                       <a data-toggle="modal" href="#large" class="btn btn-lg blue">الصور</a>
                     </div>
                     <?php endif; ?>
                   </div>
                   <!-- END SIDEBAR USER TITLE -->
                 </div>
                 <div class="col-md-10">
                  <div class="inbox-content">
                    <div class="inbox-view-info">
                      <div class="row">
                        <div class="col-md-7">
                          <span class="bold">
                           التاريخ : <?php echo e(get_date($contact->created_at)); ?> 
                         </span>
                         <span class="bold">
                          الوقت : <?php echo e(get_time($contact->created_at)); ?>

                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="inbox-view">
                    <p>
                      <?php echo e($contact->body); ?>

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
            <form action="<?php echo e(url('admin/contactsReplay')); ?>" class="form-horizontal">
              <div class="form-body">
                <div class="form-group">
                  <label class="col-md-2 control-label">البريد الإلكترونى </label>
                  <div class="col-md-8">
                    <div class="input-group">
                      <span class="input-group-addon input-circle-left">
                        <i class="fa fa-envelope"></i>
                      </span>
                      <input type="email" name="email" class="form-control input-circle-right" value="<?php echo e($contact->email); ?>" placeholder="البريد الإلكترونى"> 
                    </div>
                    <?php if($errors->has('email')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                    <?php endif; ?>

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
                      <?php if($errors->has('body')): ?>
                      <span class="help-block">
                        <strong><?php echo e($errors->first('body')); ?></strong>
                      </span>
                      <?php endif; ?>
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
        <?php $__currentLoopData = \App\UpImage::where('post_id',$contact->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($image->type == 'contacts'): ?>
        <img class="img-responsive img-block" src="<?php echo e(image_check($image->img_name,'contacts')); ?>">
        <hr />
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<?php $__env->stopSection(); ?>

<!-- footer -->
<?php $__env->startSection('footer'); ?>
<script type="text/javascript">
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/admin/contacts/viewMsg.blade.php ENDPATH**/ ?>