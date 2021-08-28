

<?php $__env->startSection('title'); ?>
    التحكم فى الصفحات
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('megaMenu'); ?>
    <div class="hor-menu hor-menu-light hidden-sm hidden-xs">
        <ul class="nav navbar-nav">
            <!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
            <li class="classic-menu-dropdown active">
                <a>
                    التحكم فى الصفحات 
                    <span class="selected"></span>
                </a>
            </li>
            <li class="classic-menu-dropdown">
                <a href="<?php echo e(url('admincp/pages/create')); ?>">إضافة صفحة جديده</a>
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
                <a>التحكم فى الصفحات</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a href="<?php echo e(url('admincp/pages/create')); ?>">إضافة صفحة جديده</a>
                <i class="fa fa-angle-left"></i>
            </li>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Main content -->
<!-- Main content -->
<section class="content">
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable-line">
                <ul class="nav nav-tabs">
                <?php $__currentLoopData = parentPages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="<?php echo e($key == 1 ? 'active' : ''); ?>">
                        <a href="#tab_1_<?php echo e($key); ?>" data-toggle="tab">
                            <?php echo e($tab); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="tab-content">
                <?php $__currentLoopData = parentPages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane <?php echo e($key == 1 ? 'active' : ''); ?> fontawesome-demo" id="tab_1_<?php echo e($key); ?>">
                        <div class="portlet-body">
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <thead>
                                <tr>
                                    <th>م</th>
                                    <th>إسم الصفحة</th>
                                    <th>المكان</th>
                                    <th>الحالة</th>
                                    <th>الأدوات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($page->type == $key): ?>
                                    <tr>
                                        <td><?php echo e($num++); ?></td>
                                        <td><?php echo e($page->pName); ?></td>
                                        <td><?php echo e(parentPages()[$page->type]); ?></td>
                                        <td class="text-center">
                                            <?php if($page->active == 1): ?>
                                                <?php echo e(FORM::open(array('method'=>'POST','url'=>'admincp/pages/'.$page->id.'/0'))); ?>

                                                <?php echo e(csrf_field()); ?>                        
                                                <input type="checkbox" name="my-checkbox" onchange="this.form.submit()" checked>
                                                <?php echo e(FORM::close()); ?>

                                            <?php else: ?>
                                                <?php echo e(FORM::open(array('method'=>'POST','url'=>'admincp/pages/'.$page->id.'/1'))); ?>

                                                <?php echo e(csrf_field()); ?>                        
                                                <input type="checkbox" name="my-checkbox" onchange="this.form.submit()">
                                                <?php echo e(FORM::close()); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(url('/admincp/pages/'.$page->id.'/edit')); ?>" class="btn btn-success"><i class="fa fa-edit"></i> التحكم </a>
                                            <?php if($page->type != 1): ?>
                                            <a id="delete<?php echo e($page->id); ?>" class="btn btn-danger" href="#"><i class="fa fa-trash-o"></i> حذف </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</section><!-- /.content -->

<?php $__env->stopSection(); ?>
<!-- footer -->
<?php $__env->startSection('footer'); ?>
<script type="text/javascript">
<?php if(isset($page)): ?>
    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        $('#delete<?php echo e($page->id); ?>').click(function(){
            swal({
                title: "هل انت متأكد؟",
                text: "انت لن تسطيع إسترجاع هذه البيانات مره أخرى !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'نعم , أحذفها !',
                cancelButtonText: 'إلغاء !',
                closeOnConfirm: false
            },
            function(){
                document.location.href="<?php echo e(url('/admincp/pages/'.$page->id.'/delete')); ?>";
            });
        });
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/workox0x/public_html/haraj/resources/views/admin/pages/index.blade.php ENDPATH**/ ?>