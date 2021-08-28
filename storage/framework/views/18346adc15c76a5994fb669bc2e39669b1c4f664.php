
<?php $__env->startSection('header'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
عمولة حراج . إن
<?php $__env->stopSection(); ?>
<?php $page = app('\App\Page'); ?>

<?php $__env->startSection('content'); ?>

<body>

    <!--         <?php if(isset($_GET['plan']) == 1): ?>
        <?php echo $page->where('pLink','commissionUpPlan1')->first()->content; ?>

        <?php elseif(isset($_GET['plan']) == 2): ?>
        <?php echo $page->where('pLink','commissionUpPlan2')->first()->content; ?>

        <?php else: ?>

        <?php echo $page->where('pLink','commissionUp')->first()->content; ?>



 -->

    <!-- عمولة الموقع -->
    <section class="container center-block">
        <div class="row">
            <div class="col-sm-7 promo">
                <h<?php echo e(getSettings('cmshn')); ?> class="title"> عمولة الموقع <?php echo e(getSettings('cmshn')); ?>%</h<?php echo e(getSettings('cmshn')); ?>>
                <h4 class="title2">لقد تم تحديد عمولة الموقع وهي الأقل على مستوى المواقع الخدمية والتجارية وهي
                    ( <?php echo e(getSettings('cmshn')); ?> ) ريال فقط في كل مائة ريال سعودي( 1%) . </h4>

                <h4 class="title3"><strong>مثال : </strong> لو تم بيع سلعة بمبلغ 1000 ريال سعودي فأن عمولة الموقع هي ( عشرة ريالات فقط ) .</h4>
                <div class="pay-btm">
                    <a href="#cal_wrapper" class="pric-button pricing-table__button">حساب العمولة</a>
                    <div class="payment">
                        <img src="<?php echo e(asset('/public/upload/images/mada.png')); ?>">
                        <img src="<?php echo e(asset('/public/upload/images/visa_master.png')); ?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <img class="img-responsive" src="<?php echo e(asset('/public/upload/images/حراج.png')); ?>" alt="عمولة-الموقع">
            </div>
        </div>
    </section>
    <!-- عمولة الموقع -->


    <!-- انواع العمولات -->
    <section class="container">
        <div class="pricing-table-wrapper ">
            <ul class="pricing-table">
<!--                <li class="pricing-table__item">-->
<!--                    <img src="<?php echo e(asset('/public/upload/images/circus.svg')); ?>" alt="" class="pricing-table__img" />-->
<!--                    <h3 class="pricing-table__title">خدمات نقل الحيوانات</h3>-->
<!--                    <p class="pricing-table__description">-->
<!--                        <span class="pricing-table__price"><?php echo e(getSettings('cmshn')); ?>%</span>-->
<!--                    </p>-->
<!--                    <ul class="pricing-table__products">-->
<!--                        <li class="pricing-table__product">-->
<!--<div>إذا تم نقل أي حيوان فالعمولة ما تم ذكرها سابقاً وهي ( <?php echo e(getSettings('cmshn')); ?>% ) .                            </div>-->
<!--                        </li>-->
<!--                        <li class="pricing-table__product">-->
<!--<div>إذا كان الحيوان تم بيعه مع مجموعة وسطاء فأن الموقع يكون له نصيب مثل نصيب أي وسيط في العمولة ويعتبر هذا شرطاً ملزماً .                            </div>-->
<!--                        </li>-->

<!--                    </ul>-->
<!--                    <a href="" class="pricing-table__button">للإشتراك</a>-->
<!--                </li>-->
                <li class="pricing-table__item" style="display:none;">
                    <img src="<?php echo e(asset('/public/upload/images/car.png')); ?>" alt="" class="pricing-table__img" />
                    <h3 class="pricing-table__title">العمولة في السيارات والشاحنات والمعدات الثقيلة</h3>
                    <p class="pricing-table__description">
                        <span class="pricing-table__price">1%</span>
                    </p>
                    <ul class="pricing-table__products">
                        <li class="pricing-table__product">
                            <div>(<?php echo e(getSettings('cmshn')); ?>%) تدفع عند بيعها .
                            </div>
                        </li>

                    </ul>
                    <a href="" class="pricing-table__button">للإشتراك</a>
                </li>
                <!--<li class="pricing-table__item">-->
                <!--    <img src="<?php echo e(asset('/public/upload/images/free.png')); ?>" alt="" class="pricing-table__img" />-->
                <!--    <h3 class="pricing-table__title">العمولة المجانية</h3>-->
                <!--    <p class="pricing-table__description">-->
                <!--        <span class="pricing-table__price">مجانا</span>-->
                <!--    </p>-->
                <!--    <ul class="pricing-table__products">-->
                <!--        <li class="pricing-table__product">-->
                <!--            <div>أي سلعة أو خدمة تم بيعها عن طريق الموقع ولم يأخذ عليها مقابل مالي تكون مجاناً ليس عليها عمولة .-->
                <!--            </div>-->
                <!--        </li>-->
                <!--        <li class="pricing-table__product">-->
                <!--            <div>جميع الخدمات وبيع السلع للأسر المنتجة مجاناً بدون عمولة .-->
                <!--            </div>-->
                <!--        </li>-->
                <!--        <li class="pricing-table__product">-->
                <!--            <div>المشتركين في الباقة الذهبية ليس عليهم عمولة وقت مدة الإشتراك .-->
                <!--            </div>-->
                <!--        </li>-->

                <!--    </ul>-->
                <!--    <a href="" class="pricing-table__button">للإشتراك</a>-->
                <!--</li>-->
                <!--<li class="pricing-table__item">-->
                <!--    <img src="<?php echo e(asset('/public/upload/images/on-demand.png')); ?>" alt="" class="pricing-table__img" />-->
                <!--    <h3 class="pricing-table__title">العمولة على الطلبات</h3>-->
                <!--    <p class="pricing-table__description">-->
                <!--        <span class="pricing-table__price">وقت الطلب</span>-->
                <!--    </p>-->
                <!--    <ul class="pricing-table__products">-->
                <!--        <li class="pricing-table__product">-->
                <!--            <div> تدفع متى ما وجد طلبه .-->
                <!--            </div>-->
                <!--        </li>-->

                <!--    </ul>-->
                <!--    <a href="" class="pricing-table__button">للإشتراك</a>-->
                <!--</li>-->
            </ul>
        </div>
    </section>

    <!-- انواع العمولات -->


    <!-- حساب العمولة -->
    <section class="container center-block commission">
        <div class="row">
            <div class="col-md-12">
                <h2 class="green" id="cal_wrapper">حساب العمولة</h2>
                <p class="form-inline">عمولتنا هي (<?php echo e(getSettings('cmshn')); ?>%) فقط </p>
                <form class="form-inline com-form">
                    <div class="form-items">
                        <p>ادخل قيمة السلعه:</p>
                        <input placeholder="السعر" type="text" class="form-control formcommission " size="8" maxlength="10" onkeyup="funCalCommission(this);" /><br>
                    </div>
                    <div class="form-items">
                        <P> فإن العمولة هي:</P>
                        <span class=" result " id="cmshnVal"> 0 ريال</span>
                    </div>

                </form>
            </div>
    </section>
    <!-- حساب العمولة -->


    <!--  دفع العمولة  -->
    <section class="container">
        <div class="row">
            <div class="container">
                <h2 class="green">دفع العموله</h2>
                <h3 class="green fw-400">الطريقة الأولى</h3> يمكنك استخدام التحويل البنكي لدفع العموله عن طريق إرسال حواله إلى حساباتنا في البنوك المحليه.
                <hr />
            </div>
            <div class="banks">
                <?php $__currentLoopData = \App\Bank::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-1 col-md-2 col-lg-4">
                    <div class="bank-item">
                    <img class=" col-md-12 img-responsive bank-img" src="<?php echo e(asset('/public/upload/images/on-demand.png')); ?>" alt="...">
                    <div class=" col-md-12 bank-username"><?php echo e($bank->u_name); ?></div>
                    <div class=" col-md-12 bank-n">رقم الحساب: </div>
                    <div class=" col-md-12 bank-num"><?php echo e($bank->acc_num); ?></div>
                    <div class=" col-md-12 bank-n">الايبان:</div>
                    <div class=" col-md-12 bank-iban"><?php echo e($bank->iban); ?></div>
                    <div class=" col-md-12 bank-name"><?php echo e($bank->name); ?></div>
                </div></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <!--  دفع العمولة  -->





    <!--  نموزج دفع العمولة  -->
    <section class="container">
        <div class="row">
            <?php if(Auth::check()): ?>
            <div class="col-md-12 col-md-offset-1 form_calc">
                <form class="form-pay" action="<?php echo e(url('tranStore')); ?>" method="post" onsubmit="return formValidate(this);">
                    <?php echo e(csrf_field()); ?>

                    <table class="table tableMsg table-borderedAds tableextra">
                        <tr class="col-lg-12 text-center">
                            <?php if(isset($_GET['plan'])): ?>
                            <th colspan="4">
                                نموذج تحويل الإشتراك
                            </th>
                            <?php else: ?>
                            <th class="form-title" colspan="4">
                                نموذج تحويل العمولة
                            </th>
                        </tr>
                        <tr class="col-lg-12 text-center">
                            <th class="green">بعد إرسال المبلغ،يجب مراسلتنا عبر النموذج التالي لأجل تسجيل العمولة بأسم عضويتك ثم الحصول على مميزات الموقع الخاصة بالعملاء:</th>
                        </tr>
                        <?php endif; ?>
                        <?php if(isset($_GET['plan'])): ?>
                        <tr class="col-lg-6">
                            <td>
                                <input required class="form-control" type="text" placeholder="رقم الجوال" name="phone" size="20" maxlength="60" value="<?php echo e(Auth::user()->phone); ?>" />
                                <?php if($errors->has('phone')): ?>
                                <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;"><?php echo e($errors->first('phone')); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <tr class="col-lg-6">
                            <td>أسم المستخدم :
                                <input  class="form-control" type="text" name="username" size="20" maxlength="60" value="<?php echo e(Auth::user() ? Auth::user()->name : 'Guest'); ?>" />
                                <input class="hidden" name="user_id" value="<?php echo e(Auth::user() ? Auth::user()->id : 0); ?>" />
                                <input class="hidden" name="type" value="<?php echo e(isset($_GET['plan']) ? $_GET['plan'] == 1 ? 2 : 3 : 1); ?>" />
                                <?php if($errors->has('username')): ?>
                                <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;"><?php echo e($errors->first('username')); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="col-lg-6">
                            <?php if(isset($_GET['plan'])): ?>
                            <td>
                                <?php else: ?>
                            <td>مبلغ العمولة :
                                <?php endif; ?>
                                <input class="form-control" required type="number" placeholder="<?php echo e(isset($_GET['plan']) ? 'مبلغ الإشتراك' : 'مبلغ العمولة'); ?>" size="20" maxlength="60" name="amount" />
                                <?php if($errors->has('amount')): ?>
                                <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;"><?php echo e($errors->first('amount')); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="col-lg-6">
                            <td>البنك الذي تم التحويل إليه :
                                <select  class="form-control" id="bank_id" name="bank_id">
                                    <option value="">أختر أسم البنك</option>
                                    <?php $__currentLoopData = \App\Bank::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($bank->id); ?>"><?php echo e($bank->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <option value="0">بنك آخر</option>
                                </select>
                                <?php if($errors->has('bank_id')): ?>
                                <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;"><?php echo e($errors->first('bank_id')); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="col-lg-6">
                            <td>متى تم التحويل؟ :

                                <select required class="form-control" name="date">
                                    <?php $__currentLoopData = transferDate(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $trans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($val); ?>"><?php echo e($trans); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('date')): ?>
                                <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;"><?php echo e($errors->first('date')); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="col-lg-6">
                            <td>أسم المحول :

                                <input required class="form-control" type="text" size="20" maxlength="60" name="name" />
                                <?php if($errors->has('name')): ?>
                                <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;"><?php echo e($errors->first('name')); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php if(!isset($_GET['plan'])): ?>
                        <tr class="col-lg-6">
                            <td>رقم الإعلان :
                                <input required class="form-control" type="number" size="20" maxlength="60" name="post_id" />
                                <?php if($errors->has('post_id')): ?>
                                <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;"><?php echo e($errors->first('post_id')); ?></span>
                                <?php endif; ?>

                            </td>
                        </tr>
                        <?php endif; ?>
                        <tr class="col-lg-6">
                            <td>ملاحظات
                                <textarea cols="35" rows="5" class="form-control" name="notes"></textarea>
                                <?php if($errors->has('notes')): ?>
                                <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;"><?php echo e($errors->first('notes')); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>

                        <tr class="col-lg-12">
                            <td>
                                <span class="label label-primary" style=" background-color: #d9edf7; color: #212121">نرجو حذف الإعلان بعد الإنتهاء منه.</span> <br>
                                نرجو الحرص على أن تكون معلومات التحويل صحيحة ودقيقه
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-12 text-center">

                                <input class="btn submit-btn" name="submit" type="submit" value="إرســـال" />
                                
                                <br>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php else: ?>
            <div class="alert alert-info">يجب عليك <a href="<?php echo e(url('login')); ?>" style="color: #19516d">تسجيل الدخول</a> ليتم تحويل العمولة من حسابك بالموقع وذلك لضمان حقك .</div>
            <?php endif; ?>
            <br>
            <div class="text-center">
            <a href="http://haraj-animals.moltaqa.net/page/commesion_terms"> سياسة دفع العمولة</a>
            </div>
            <br>
        </div>
    </section>
    <!--  نموزج دفع العمولة  -->



</body>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<script type="text/javascript">

function percentCalculation(a, b){
  var c = (parseFloat(a)*parseFloat(b))/100;
  return parseFloat(c);
}


    function funCalCommission(cmshn) {
        $('#cmshnVal').empty();
        var siteCmshn = "<?php echo e(getSettings('cmshn')); ?>";
        var a = $(cmshn).val(),
            r = percentCalculation($(cmshn).val(), 1);

        console.log(a);
        if (a === "") {
            $('#cmshnVal').append("فضلا تحديد المبلغ");
        } else if (isNaN(a)) {
            $('#cmshnVal').append("يرجى إدخال رقم صحيح");
        } else if (a < 100) {
            $('#cmshnVal').append("0");
        } else {
            $('#cmshnVal').append(r);
        }
    }

    function formValidate(form) {
        var done = true;
        if ($('#bank_id').val() == '') {
            alert('فضلا حدد البنك المحول منه');
            $('#bank_id').focus();
            return done = false;
        }
        return done;
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/workox0x/public_html/haraj/resources/views/site/transfers/commission.blade.php ENDPATH**/ ?>