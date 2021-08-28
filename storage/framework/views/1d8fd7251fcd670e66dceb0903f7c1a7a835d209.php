

<?php $__env->startSection('title'); ?>
القائمة السوداء
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="singlePage blacklist container">
    <div class="note">
        <img src="<?php echo e(Request::root()); ?>/public/upload/shield.png" alt="">
        <h3 class="green">أبحث في القائمة السوداء</h3>
         <p>القائمة السوداء هي قائمة بإرقام حسابات وأرقام جوالات من يقومون بإساءة إستخدام الموقع لأغراض ممنوعه مثل الغش أو الأحتيال أو مخالفة قوانين الموقع</p>
        <br>
        <span id="output"></span>
        <form id="checkAccForm" novalidate="">
            <?php echo e(csrf_field()); ?>

            <input name="acc_num" size="30" placeholder="أدخل رقم الحساب أو رقم الجوال هنا" type="text" pattern="[0-9]*" class="form-control">
            <input name="submit" id="checkAccSubmit" class="btn btn-primary" value="تحقق" type="submit">
        </form>
        <br>
    </div>
    <div class="section-s-title">ارشادات البيع والتعامل</div>
    <div class="section-s">
        <div class="card">
            <h4>تجنب حالات النصب والاحتيال</h4>
            <p>يفضل التعامل وجهًا لوجه - عند اتباعك لهذه القاعدة فأنت تتجنب 99٪ من محاولات الاحتيال.</p>
            <p>اطلع على تقييمات المعلن وآراء الآخرين حوله وفترة انضمامه للموقع.</p>
            <p>تجنب أعطاء بيانات حسابك في حراج لأي شخص حتى لو ادعى انه من موظفي حراج</p>
            <p>تتم المعاملات بين طرفين فقط، وجود طرف ثالث قد يعني الاحتيال.</p>
            <p>تجنب قبول الشيكات أو المبالغ المالية (الصرف) قبولك لمبالغ مالية مزيفة قد يحملك المسؤولية في البنوك.</p>
            <h4>كيف تعرف المحتال</h4>
            <p>عدم القدرة أو رفض الالتقاء وجهاً لوجه لإتمام الصفقة.</p>
            <p>طلب الدفع أو تحويل الأموال عن طريق Western Union, Paypal</p>
            <p>السؤال عن السلعة بطريقة غريبة.</p>
            <h4>السلامة الشخصية</h4>
            <p>عند مقابلة الطرف الآخر للمرة الأولى تذكر : أن تكون نقطة الالتقاء في مكان (عام مثل: مقهى أو بنك أو مركز تسوق) تجنب الالتقاء به في مكان منعزل، أو دعوته إلى منزلك.</p>
            <p>كن حذرا عند شراء السلع الثمينة.</p>
            <p>أخبر صديقًا أو فردًا من العائلة قبل مقابلتك للطرف الآخر.</p>
            <p>في حالة تعرضك لعملية نصب توجه للجهات الأمنية أو بلغ عبر بوابة كلنا أمن.</p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script type="text/javascript">
$(document).on("click","#checkAccSubmit",function(e) {
    var done = true,testNum = /^[0-9]/i;
    if ($('input[name=acc_num]').val() == ''){
        alert('فضلا كتابة الرقم المراد فحصه');
        $('input[name=acc_num]').focus();
        return done = false;
    }
    if (testNum.test($('input[name=acc_num]').val()) == false){
        alert('فضلا كتابة أرقام فقط');
        $('input[name=acc_num]').val('');
        $('input[name=acc_num]').focus();
        return done = false;
    }
    if(done == true){
      checkAccFunc(e);
    }else{
      return done;
    }
});

function checkAccFunc (e) {
    e.preventDefault();
    var url = '<?php echo e(url("checkacc")); ?>',
        data = $('#checkAccForm').serialize();
    $.post(url, data, function(data) {
        if (data == 'found') {
            $('#output').empty();
            $('#output').append('<div class="alert alert-danger">الرقم موجود بالفعل !! إحذر التعامل معه</div>');
            $('input[name=acc_num]').val('');
        } else if (data == 'notFound') {
            $('#output').empty();
            $('#output').append('<div class="alert alert-success">رقم الحساب او الجوال غير موجود في القائمة السوداء</div>');
            $('input[name=acc_num]').val('');
        } else {
$('#output').append('<div class="alert alert-danger"> رقم الحساب او الجوال غير موجود في القائمة السوداء </div>');          }
    });
    // return false;
};
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harajfp/public_html/resources/views/site/pages/checkacc.blade.php ENDPATH**/ ?>