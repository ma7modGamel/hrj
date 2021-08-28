

<?php $__env->startSection('title'); ?>
    منطقة الإختبار
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<?php echo HTML::style('public/css/bootstrap-tagsinput.css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <input type="text" value="" data-role="tagsinput" id="tagsInput">
<div class="singleContent col-md-11">
    <h3>إبلاغ عن إعلان مخالف </h3>
    <script type="text/javascript">
        function validate_form(form)
        {
            if (form.comment_body.value == "") {
             alert('فضلا قم بكتابة سبب الابلاغ عن الاعلان');
             form.comment_body.focus();
             return false ;
         }
         else if(!(document.getElementById('ads_nooa_no').checked || document.getElementById('ads_nooa_order').checked)){
            alert('يجب الإجابة على السؤال');
            return false ;
        }
        return true ;
    }
</script>

<form action="" method="post" id="postform" name="postform" onsubmit="return validate_form(this);" style="border: 1px solid #eee;">
    <table class="table  tableMsg table-borderedAds tableextra">
        <tbody><tr>
            <td>
                <div class="alert alert-warning">
                    تحذير:هذا النموذج مخصص فقط للإبلاغ عن الاعلانات المخالفه وليس للتواصل مع صاحب الاعلان
                </div>
                <div class="alert alert-info">
                الرسائل المرسلة عبر هذا النموذج لن تصل إلى صاحب الإعلان!</div>
                هل هذا الإعلان مخالف؟   
                <br>
                <input name="ads_nooa" type="radio" value="yes" id="ads_nooa_no"> 
                نعم
                <br>  <input name="ads_nooa" type="radio" value="no" id="ads_nooa_order"> 
                لا
                <br>
                <br>
                <textarea rows="6" name="comment_body" id="message" class="form-control"></textarea>
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
<?php echo HTML::script('public/js/bootstrap-tagsinput.min.js'); ?>

<?php $__env->stopSection(); ?>




<?php if(1==2){?>

<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('test.name')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('public/css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('public/js/app.js')); ?>"></script>
</body>
</html>
<?php } ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/workox0x/public_html/haraj/resources/views/test.blade.php ENDPATH**/ ?>