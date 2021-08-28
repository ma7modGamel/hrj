

<?php $__env->startSection('title'); ?>
	التحكم بالبنوك
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('megaMenu'); ?>
		<div class="hor-menu hor-menu-light hidden-sm hidden-xs">
			<ul class="nav navbar-nav">
				<!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
				<li class="classic-menu-dropdown active">
					<a>
					قائمة البنوك <span class="selected">
					</span>
					</a>
				</li>
				<li class="classic-menu-dropdown">
					<a data-target="#addBanks" data-toggle="modal">إضافة بنك جديد
          <i class="glyphicon glyphicon-menu-down"></i>
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
            <a>قائمة البنوك</a>
            <i class="fa fa-angle-left"></i>
          </li>
          <li>
            <i class="fa fa-home"></i>
            <a data-target="#addBanks" data-toggle="modal">إضافة بنك جديد</a>
          </li>
				</ul>
			</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.banks.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
          <div class="portlet-title">
          <div class="caption col-md-9">
            <span><i class="icon-map"></i> عرض البنوك</span>
          </div>
          <div class="tools">
            <a href="javascript:;" class="collapse">
            </a>
          </div>
          </div>
          <div class="portlet-body">
              <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
              <thead>
              <tr>
                  <th>
                      م
                  </th>
                  <th style="min-width:200px">
                      إسم البنك
                  </th>
                  <th>
                      إسم الحساب
                  </th>
                  <th>
                      رقم الحساب
                  </th>
                  <th>
                      IBAN
                  </th>
                  <th  style="min-width:180px">
                      الأدوات
                  </th>
              </tr>
              </thead>
              <tbody>
              <?php if(count($banks)): ?>
              <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($num++); ?></td>
                  <td><?php echo e($bank->name); ?></td>
                  <td><?php echo e($bank->u_name); ?></td>
                  <td><?php echo e($bank->acc_num); ?></td>
                  <td><?php echo e($bank->iban); ?></td>
                  <td>
                    <a href="<?php echo e(url('/admincp/banks/'.$bank->id.'/edit')); ?>" class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                    <a class="btn btn-danger delBank" bankId="<?php echo e($bank->id); ?>" data-token="<?php echo e(csrf_token()); ?>"><i class="fa fa-trash-o"></i> حذف </a>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
                <tr>
                  <td colspan='50' scobe='row'><div class='alert alert-info'><center> قائمة البنوك فارغه </center></div></td>
                </tr>
              <?php endif; ?>
              </tbody>
              </table>
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
<script type="text/javascript">
  
<?php if(count($errors) > 0): ?>
  $('#addBanks').modal()
<?php endif; ?>

$(document).on("click",".delBank",function() {
var a=$(this);
  var token = $(this).data('token'),
  id = $(this).attr('bankId'),
  route = "<?php echo url('admincp/banks'); ?>" + "/" + id;
  $.ajax({
      url:route,
      type: 'post',
      data: {_method: 'delete', _token :token},
      success:function(data){
        a.closest('tr').hide();
        if(data=="empty"){
          toastr.options.timeOut = '6000';
          toastr.options.positionClass = 'toast-bottom-left';
          Command: toastr["info"]("تم حذف البنك بنجاح -- القاائمة الآن فارغة")
          $('.portlet-body').append("<div class='alert alert-info'><center> قائمة البنوك فارغه </center></div>");
        } else if (data=="done"){
          toastr.options.timeOut = '6000';
          toastr.options.positionClass = 'toast-bottom-left';
          Command: toastr["success"]("تم حذف البنك بنجاح")
        }
      } 
  });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/admin/banks/index.blade.php ENDPATH**/ ?>