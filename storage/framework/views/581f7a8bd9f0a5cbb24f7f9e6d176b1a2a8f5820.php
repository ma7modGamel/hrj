<?php $__env->startSection('header'); ?>





<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <br>

    <br>

    <div class="more container">

        <div class="">

            <h3>خارطة الموقع</h3>

            <div class="sitemap-items">

            <?php $__currentLoopData = \App\Cat::where('parent_id',null)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="sitemap-item"><a href="<?php echo e(url('tags/'.$cat->id)); ?>"><?php echo e($cat->name); ?></a>

                    <ul>

                    <?php $__currentLoopData = \App\Cat::where('parent_id',$cat->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <li><a href="<?php echo e(url('tags/'.$cat->name)); ?>"><?php echo e($cat->name); ?></a>

                            <ul>

                            <?php $__currentLoopData = \App\Cat::where('parent_id',$cat->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li><a href="<?php echo e(url('tags/'.$cat->name)); ?>"><?php echo e($cat->name); ?></a></li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>

                        </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>

    </div>



<?php $__env->stopSection(); ?>





<?php $__env->startSection('footer'); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/workox0x/public_html/haraj/resources/views/site/pages/sitemap.blade.php ENDPATH**/ ?>