

<?php $__env->startSection('title'); ?>
	تعديل إعلان
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <!-- DataTables -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <?php echo HTML::style('public/admin/global/plugins/datatables/datatables.min.css'); ?>

    <?php echo HTML::style('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css'); ?>

    <!-- END PAGE LEVEL STYLES -->

    <?php echo HTML::style('public/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'); ?>

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
        <li class="classic-menu-dropdown">
          <a href="<?php echo e(url('admincp/posts')); ?>">
          الإعلانات <span class="selected">
          </span>
          <i class="fa fa-angle-left"></i>
          </a>
        </li>
				<li class="classic-menu-dropdown active">
					<a>
					تعديل الإعلان / <?php echo e($post->title); ?>

					<span class="selected"></span>
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
						<a href="<?php echo e(url('admincp/posts')); ?>">الإعلانات</a>
						<i class="fa fa-angle-left"></i>
					</li>
					<li>
						<i class="fa fa-home"></i>
						<a>تعديل الإعلان / <?php echo e($post->title); ?></a>
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
                    تعديل الإعلان / <?php echo e($post->title); ?>

                    </div>
                  </div>
                  <div class="portlet-body">
                  <?php echo FORM::model($post ,['route'=> ['posts.update',$post->id],'method' => 'PATCH', 'class'=>'form-horizontal','files'=>'true']); ?>

                    <?php echo $__env->make('admin.posts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  <?php echo FORM::close(); ?>

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
                    <?php $num=1; ?>
                    <?php $__currentLoopData = $post->Cmnt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cmnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($num++); ?></td>
                        <?php if($cmnt->User): ?>
                        <td><a href="<?php echo e(url('admincp/users/'.$cmnt->user_id)); ?>"><?php echo e($cmnt->User->name); ?></a></td>
                        <?php else: ?>
                        <td>عضو محظور</td>
                        <?php endif; ?>

                        <td><a href="<?php echo e(url('post/'.$cmnt->post_id)); ?>"><?php echo e($cmnt->Post ? $cmnt->Post->title : 'إعلان محظور'); ?></a></td>
                        <td><?php echo e(str_limit($cmnt->body,100)); ?></td>
                        <td> منذ <?php echo e(timeToStr(strtotime($cmnt->created_at))); ?></td>
                        <td>
                            <a href="<?php echo e(url('/admincp/cmnts/'.$cmnt->id)); ?>" class="btn btn-info showCmnt"><i class="fa fa-eye"></i> عرض </a>
                            <a href="<?php echo e(url('/admincp/cmnts/'.$cmnt->id)); ?>" data-token="<?php echo e(csrf_token()); ?>" class="btn btn-danger delCmnt"><i class="fa fa-trash-o" ></i> حذف </a>
                          
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <?php $num = 1; ?>
                    <?php $__currentLoopData = $post->Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($num++); ?></td>
                        <?php if($user): ?>
                        <td><a href="<?php echo e(url('users/'.$user->id.'/'.$user->name)); ?>"><?php echo e($user->name); ?></a></td>
                        <?php else: ?>
                        <td>عضو محظور</td>
                        <?php endif; ?>
                        <td> منذ <?php echo e(timeToStr(strtotime($user->pivot->created_at))); ?></td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>

<!-- footer -->
<?php $__env->startSection('footer'); ?>
  <!-- DataTables -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <?php echo HTML::script('public/admin/global/scripts/datatable.js'); ?>

  <?php echo HTML::script('public/admin/global/plugins/datatables/datatables.min.js'); ?>

  <?php echo HTML::script('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'); ?>

  <?php echo HTML::script('public/admin/custom/js/editPost.js'); ?>


  <?php echo HTML::script('public/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'); ?>

  <!-- END PAGE LEVEL PLUGINS -->


<script type="text/javascript">
$(document).ready(function(){
  if($('#select11').val() == 1 ) {
    $('#carDiv').show();
  }
  
  <?php if($errors->has('brand') || $errors->has('model')): ?>
    $('#carDiv').show();
  <?php endif; ?>
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/workox0x/public_html/haraj/resources/views/admin/posts/edit.blade.php ENDPATH**/ ?>