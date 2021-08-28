                        <div class="form-body">
                            <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                                <label class="col-md-3 col-sm-12 control-label">user name</label>
                                <!-- <div class="clearfix"></div> -->
                                <div class="col-md-8 col-sm-8 col-xs-8 ">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                        </span>
                                        <?php echo FORM::text("username", null ,['class'=>'form-control']); ?>

                                    </div>
                                    <?php if($errors->has('username')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('username')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label class="col-md-3 control-label">الإسم بالكامل</label>
                                <div class="col-md-8">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                        </span>
                                        <?php echo FORM::text("name", null ,['class'=>'form-control']); ?>

                                        <?php echo FORM::text("admin", null ,['class'=>'hidden']); ?>

                                    </div>
                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                                <label class="col-md-3 control-label">رقم الهاتف</label>
                                <div class="col-md-8">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                        </span>
                                        <?php echo FORM::text("phone",null,['class'=>'form-control']); ?>

                                    </div>
                                    <?php if($errors->has('phone')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('phone')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('men') ? ' has-error' : ''); ?>">
                                <label class="col-md-3 control-label">الجنس</label>
                                <div class="col-md-3">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                        </span>
                                        <?php echo FORM::select("men",['1'=>'ذكر','0'=>'أنثى'], null ,['class'=>'form-control']); ?>

                                    </div>
                                    <?php if($errors->has('men')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('men')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <label class="col-md-2 control-label">الصلاحيات</label>
                                <div class="col-md-3<?php echo e($errors->has('type') ? ' has-error' : ''); ?>">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-legal"></i>
                                        </span>
                                        <?php echo FORM::select("type",usersType(), null ,['class'=>'form-control']); ?>

                                        <?php echo FORM::text("admin", 1 ,['class'=>'hidden']); ?>


                                    </div>
                                    <?php if($errors->has('type')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('type')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">الحالة</label>
                                <div class="col-md-8<?php echo e($errors->has('active') ? ' has-error' : ''); ?>">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                        </span>
                                        <?php echo FORM::select("active",['1'=>'مفعل','0'=>'غير مفعل'], null ,['class'=>'form-control']); ?>

                                    </div>
                                    <?php if($errors->has('active')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('active')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label class="col-md-3 control-label">البريد الاكترونى</label>
                                <div class="col-md-8">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <?php echo FORM::email("email",null,['class'=>'form-control']); ?>

                                    </div>
                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                                
                                    
                                
                                   
                                        
                                        
                                        
                                        
                                    
                                    
                                        
                                            
                                        
                                    
                                    
                                
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">اضافه صورة</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <?php echo FORM::file("image",['class'=>'form-control']); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <label class="col-md-3 control-label">كلمة المرور</label>
                                <div class="col-md-8">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-unlock-alt"></i>
                                        </span>
                                        <input id="password" type="password" class="form-control" name="password">
                                    </div>
                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                                <label for="password-confirm" class="col-md-3 control-label">إعادة كلمة المرور</label>

                                <div class="col-md-8">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                        </span>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    </div>
                                    <?php if($errors->has('password_confirmation')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-8">
                                        <button type="submit" class="btn green"> تنفيذ </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($user)): ?>
                        <div class="modal fade modal-scroll" id="large" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">صورة العضو</h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php $__currentLoopData = explode(',',$user->image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <img class="img-responsive img-block" src="<?php echo e(image_check($image,'users')); ?>">
                                            <hr />
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <?php endif; ?>
                        <!-- END SAMPLE FORM PORTLET-->
<?php /**PATH /home/harajfp/public_html/resources/views/admin/users/form.blade.php ENDPATH**/ ?>