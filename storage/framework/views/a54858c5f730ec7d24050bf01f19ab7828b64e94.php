

<?php $__env->startSection('title'); ?>
إبلاغ عن إعلان مخالف؟
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="singleContent col-md-11">
    <h3>إبلاغ عن إعلان مخالف </h3>

<form action="<?php echo e(url('adsReport')); ?>" method="POST" onsubmit="return validate_form(this);" style="border: 1px solid #eee;">
    <?php echo e(csrf_field()); ?>   
    <table class="table  tableMsg table-borderedAds tableextra">
        <tbody><tr>
            <td>
                <div class="alert alert-warning">
                    تحذير:هذا النموذج مخصص فقط للإبلاغ عن الاعلانات المخالفه وليس للتواصل مع صاحب الاعلان
                </div>
                <input type="hidden" name="name" value="<?php echo e(Auth::check() ? Auth::user()->name : 'report'); ?>">
                <input type="hidden" name="email" value="<?php echo e(Auth::check() ? Auth::user()->email : 'report'); ?>">
                <input type="hidden" name="phone" value="<?php echo e(Auth::check() ? Auth::user()->phone : 'report'); ?>">
                <input type="hidden" name="type" value="2">
                <input type="hidden" name="user_id" value="<?php echo e(Auth::check() ? Auth::user()->id : 0); ?>">
                <div class="alert alert-info">
                الرسائل المرسلة عبر هذا النموذج لن تصل إلى صاحب الإعلان!</div>
                هل هذا الإعلان مخالف؟   
                <br>
                <input name="subject" id="reportYes" type="radio" value="إبلاغ عن إعلان مخالف رقم <?php echo e($_GET['ad_Id']); ?>"> 
                نعم
                <br>  <input name="subject" id="reportNo" type="radio" value="إبلاغ عن إعلان غير مخالف رقم <?php echo e($_GET['ad_Id']); ?>"> 
                لا
                <br>
                <br>
                <textarea rows="6" name="body" id="message" class="form-control">إبلاغ عن الإعلان رقم <?php echo e($adId); ?>

=========================
من فضلك أذكر سبب الإبلاغ عن الإعلان هنا
=========================
</textarea>
                <br>
                <input class="btn  btn-primary" name="submit" value="إرســـال" type="submit">
            </td>
        </tr>
        
    </tbody></table>
</form>

</div>

<?php $__env->stopSection(); ?>

<!-- footer -->
<?php $__env->startSection('footer'); ?>
<script type="text/javascript">
    function validate_form(form){
        if(!($('#reportYes').is(':checked') || $('#reportNo').is(':checked'))){
            alert('يجب الإجابة على السؤال');
            return false ;
        }else if ($('#message').val() == "") {
           alert('فضلا قم بكتابة سبب الابلاغ عن الاعلان');
           form.body.focus();
           return false ;
        }
        return true ;
    }
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/workox0x/public_html/haraj/resources/views/site/contact/adReport.blade.php ENDPATH**/ ?>