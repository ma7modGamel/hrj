

<?php $__env->startSection('title'); ?>
	تعديل بيانات العضو <?php echo e($user->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <!-- DataTables -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <?php echo HTML::style('public/admin/global/plugins/datatables/datatables.min.css'); ?>

    <?php echo HTML::style('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css'); ?>

    <?php echo HTML::style('public/admin/pages/css/invoice-2-rtl.min.css'); ?>

    <?php echo HTML::style('public/admin/custom/css/MessagesUser.css'); ?>

    <!-- END PAGE LEVEL STYLES -->
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
          <a href="<?php echo e(url('admincp/users')); ?>">
          المستخدمين <span class="selected">
          </span>
          <i class="fa fa-angle-left"></i>
          </a>
        </li>
				<li class="classic-menu-dropdown active">
					<a>
					تعديل بيانات / <?php echo e($user->name); ?>

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
						<a href="<?php echo e(url('admincp/users')); ?>">المستخدمين</a>
						<i class="fa fa-angle-left"></i>
					</li>
					<li>
						<i class="fa fa-home"></i>
						<a>تعديل بيانات / <?php echo e($user->name); ?></a>
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
                    تعديل بيانات / <?php echo e($user->name); ?>

                    </div>
                  </div>
                  <div class="portlet-body">
                  <?php echo FORM::model($user ,['route'=> ['users.update',$user->id],'method' => 'PATCH', 'class'=>'form-horizontal','files'=>'true']); ?>

                    <?php echo $__env->make('admin.users.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  <?php echo FORM::close(); ?>

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
                        <?php $__currentLoopData = $user->Post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e($post->id); ?></td>
                            <td><?php echo e($post->title); ?></td>
                            <td><?php echo e($post->Cat->name ?? ''); ?></td>
                            <?php if($post->User()->count()): ?>
                            <td><a href="<?php echo e(url('users/'.$post->User->id)); ?>"><?php echo e($post->User->name ?? ''); ?></a></td>
                            <?php else: ?>
                            <td>عضو محظور</td>
                            <?php endif; ?>
                            <td> منذ <?php echo e(timeToStr(strtotime($post->created_at))); ?></td>
                            <td>
                              <a href="<?php echo e(url('admincp/posts/'.$post->id.'/edit')); ?>" class="btn btn-success"><i class="fa fa-edit"></i> التحكم </a>
                              <a class="btn btn-danger blockedPost" postId="<?php echo e($post->id); ?>" data-token="<?php echo e(csrf_token()); ?>"><i class="fa fa-post-times"></i> حظر </a>
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
                        <th>رقم الإعلان</th>
                        <th>عنوان الإعلان</th>
                        <th style="width:370px !important">النص</th>
                        <th>التاريخ</th>
                        <th>الادوات</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $user->Cmnt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cmnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($cmnt->post_id); ?></td>
                        <?php if($cmnt->Post): ?>
                        <td><a href="<?php echo e(url('ads/'.$cmnt->post_id.'/'.$cmnt->Post->title)); ?>"><?php echo e($cmnt->Post->title); ?></a></td>
                        <?php else: ?>
                        <td>إعلان محظور</td>
                        <?php endif; ?>
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
                    <?php $iMsgNum = 1; ?>
                    <?php $__currentLoopData = $user->Message->unique('user_to'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($msg->UserTo): ?>
                      <tr class="showMsg" href="<?php echo e(url('admincp/conv/'.$msg->user_id.'/'.$msg->user_to)); ?>" style="cursor: pointer;">
                        <td><?php echo e($iMsgNum++); ?></td>
                        <td>
                          <div class="avatar">
                          <b><?php echo e($msg->UserTo->name); ?></b>
                          </div>
                        </td>
                      </tr>
                      <?php else: ?>
                      <tr class="showMsg" href="<?php echo e(url('admincp/conv/'.$msg->user_id.'/'.$msg->user_to)); ?>" style="cursor: pointer;">
                        <td><?php echo e($iMsgNum++); ?></td>
                        <td>
                          <div class="avatar">
                          <img src="<?php echo e(Request::root().'/public/upload/users/noImage.png'); ?>" draggable="false"/>
                          <strike>عضو محظور</strike>
                          </div>
                        </td>
                      </tr>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <?php $num = 1; ?>
                    <?php $__currentLoopData = $user->Posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($num++); ?></td>
                        <?php if($post): ?>
                        <td><a href="<?php echo e(url('ads/'.$post->id.'/'.$post->title)); ?>"><?php echo e($post->title); ?></a></td>
                        <?php else: ?>
                        <td>إعلان محظور</td>
                        <?php endif; ?>
                        <td> منذ <?php echo e(timeToStr(strtotime($post->pivot->created_at))); ?></td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <?php $num = 1; ?>
                    <?php $__currentLoopData = $user->Follows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userFollow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($num++); ?></td>
                        <?php if($userFollow): ?>
                        <td><a href="<?php echo e(url('ads/'.$userFollow->id.'/'.$userFollow->name)); ?>"><?php echo e($userFollow->name); ?></a></td>
                        <?php else: ?>
                        <td>عضو محظور</td>
                        <?php endif; ?>
                        <td> منذ <?php echo e(timeToStr(strtotime($userFollow->pivot->created_at))); ?></td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <?php $num = 1; ?>
                        <?php $__currentLoopData = $user->Rank()->orderBy('created_at','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($num++); ?></td>
                          <td><?php echo e($rank->rank_title); ?></td>
                          <td> منذ <?php echo e(timeToStr(strtotime($rank->created_at))); ?></td>
                          <td>
                            <a href="<?php echo e(url('admincp/delRank/'.$rank->id)); ?>" data-token="<?php echo e(csrf_token()); ?>" class="btn btn-danger delRank">حذف</a>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                          <div class="col-md-2">
                            <label>عنوان الرتبه</label>
                          </div>
                          <div class="col-md-10">
                            <input class="form-control" type="text" name="rank_title">
                            <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
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
                            <a class="btn btn-success" id="addRank" href="<?php echo e(url('admincp/addRank')); ?>">إضافة</a>
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



<?php $__env->stopSection(); ?>

<!-- footer -->
<?php $__env->startSection('footer'); ?>

  <!-- DataTables -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <?php echo HTML::script('public/admin/global/scripts/datatable.js'); ?>

  <?php echo HTML::script('public/admin/global/plugins/datatables/datatables.min.js'); ?>

  <?php echo HTML::script('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'); ?>

  <?php echo HTML::script('public/admin/custom/js/editUser.js'); ?>


  <!-- END PAGE LEVEL PLUGINS -->
<script type="text/javascript">


$(document).on("click",".blockedcmnt",function() {
  var a=$(this);
  var token = $(this).data('token'),
  id = $(this).attr('postId'),
  route = "<?php echo url('admincp/posts'); ?>" + "/" + id;
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/workox0x/public_html/haraj/resources/views/admin/users/edit.blade.php ENDPATH**/ ?>