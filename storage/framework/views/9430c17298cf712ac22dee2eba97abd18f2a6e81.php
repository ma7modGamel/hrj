<?php $__env->startSection('content'); ?>
<div class="singlePage log container">
    <div class="col-md-6">
        <form method="POST" action="<?php echo e(route('login')); ?>" onsubmit="myFunction()">
            <?php echo e(csrf_field()); ?>

            <h2>تسجيل الدخول</h2>
            <hr>
                <div class="contentBox">
                    <div class="box1">
                    </div>
                    <div class="box2 <?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                        <input id="email" type="text" class="form-control" placeholder="أسم المستخدم  أو رقم الجوال" name="username" value="<?php echo e(old('username')); ?>" required autofocus>
                        <!-- <input type="text" name="user" class="form-control" placeholder="أسم المستخدم  أو رقم الجوال"> -->
                        <?php if($errors->has('username')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('username')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="contentBox">
                    <div class="box1">
                    </div>
                    <div class="box2 <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <br>
                        <input id="password" type="password" class="form-control" name="password" placeholder="الرقم السري" required>
                        <!-- <input type="password" name="pass" class="form-control" > -->
                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                        <br>
                        <div class="contentBox">
                            <label>
                                <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> تذكرنى
                            </label>
                        </div>
                        <br>
                        <button name="login" class="button" type="submit" value="دخــــول »">دخــــول »</button>
                        <br>
                    </div>
                </div>
        </form>
        <a href="<?php echo e(url('register')); ?>" class="RegBtn">انشاء حساب جديد</a><br>
        <a href="<?php echo e(route('password.request')); ?>" style="font-size: 16px;">  هل نسيت الرقم السري؟</a>
        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/taathleeth/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>