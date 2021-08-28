

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="singleContent">
    <h1>اتصل بنا</h1>
    <form action="<?php echo e(url('contact')); ?>" method="POST" enctype="multipart/form-data" style="border: 1px solid #eee;">
        <?php echo e(csrf_field()); ?>

        <table class="table  tableMsg table-borderedAds tableextra">
            <tbody>
                <?php if(Auth::guest()): ?>
                <tr>
                    <td width="15%">
                        البريد الإلكتروني
                    </td>
                    <td align="right">
                        <input id="email" type="email" name="email" maxlength="60" value="<?php echo e(old('email')); ?>" class="form-control" required="">
                        <input type="hidden" name="type" value="1">
                        <br> تأكد من صحة بريدك الإلكتروني حتى يتم الرد عليك
                        <br>
                        <?php if($errors->has('email')): ?>
                        <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;"><?php echo e($errors->first('email')); ?></span> 
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endif; ?>
                <tr>
                    <td width="15%">سبب الإتصال</td>
                    <td align="right">
                        <input type="text" name="subject" size="25" class="form-control" value="<?php echo e(old('subject')); ?>">
                        <?php if($errors->has('subject')): ?>
                        <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;"><?php echo e($errors->first('subject')); ?></span> 
                        <?php endif; ?>
                    </td>
                </tr>
                <?php if(Auth::guest()): ?>
                <tr>
                    <td width="15%" style="height: 29px">رقم التحقق :</td>
                    <td>
                        <input type="text" id="verif" name="verif" size="25" value="" class="form-control">
                        <img src="https://www.haraj.com.sa/verificationimage.php?&lt;?php echo rand(0,9999);?&gt;" alt="أكتب الرقم الموجود في الصوره بالحقل المخصص" width="50" height="24" align="absbottom">
                        <span class="label label-danger"> أكتب الرقم الموجود في الصوره بالحقل المخصص.</span>
                    </td>
                </tr>
                <?php endif; ?>
                <tr>
                    <td>نص الرساله
                        <br>
                    </td>
                    <td>
                        <textarea name="body" cols="6" rows="5" id="body" class="form-control"></textarea>
                        <?php if($errors->has('body')): ?>
                        <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;"><?php echo e($errors->first('body')); ?></span> 
                        <?php endif; ?>
                    </td>
                </tr>
                <?php if(Auth::guest()): ?>
                <tr>
                    <td width="15%">
                        رقم جوالك
                        <br>المرتبط بعضويتك
                    </td>
                    <td align="right">
                        <input type="text" pattern="[0-9]*" name="phone" size="15" maxlength="15" class="form-control" value="<?php echo e(old('phone')); ?>" required="">
                        <?php if($errors->has('phone')): ?>
                        <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;"><?php echo e($errors->first('phone')); ?></span> 
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endif; ?>
                <?php if(Auth::check()): ?>
                <input type="hidden" name="type" value="1">
                <input type="hidden" name="name" value="<?php echo e(Auth::user()->name); ?>">
                <input type="hidden" name="email" value="<?php echo e(Auth::user()->email); ?>">
                <input type="hidden" name="phone" value="<?php echo e(Auth::user()->phone); ?>">
                <?php endif; ?>
                <tr>
                    <td class="row4" colspan="2">
                        <?php if(Auth::guest()): ?>
                        <div class="alert alert-warn">
                            اذا كانت لديك عضوية، نرجو مراسلتنا بعد تسجيل الدخول حتى نرد على رسالتك.
                        </div>
                        <?php else: ?>
                        <div class="alert alert-warn">
                            نرجو المراسلة في حالة الضرورة. نعتذر عن الرد على جميع الرسائل.
                        </div>
                        <?php endif; ?>
                        <input class="btn btn-primary" name="submit" type="submit" value="إرســـال">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<?php $__env->stopSection(); ?>

<!-- footer -->
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/site/contact/add.blade.php ENDPATH**/ ?>