<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="singleContent">

    <div class="note">

        <?php if(count(Auth::user()->unreadNotifications)): ?>

        <h3>إشعارات حديثه</h3>

        <?php endif; ?>

        <ul class="thi-not-list">

        <?php $__currentLoopData = $newNotf; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if($note->type == 'App\Notifications\newPostNotif'): ?>

            <li>

            
    
              <span>

                تم إضافة إعلان جديد لعضو او ماركة تتابعها بعنوان  

                <a href="<?php echo e(url('ads/'.$note->data['id'].'/'.$note->data['title'])); ?>" class="note_replay"><?php echo e($note->data['title']); ?></a> بواسطة 

                <?php if($user = \App\User::find($note->data['user_id'])): ?>

                <a href="<?php echo e(url('users/'.$note->data['user_id'])); ?>" class="username"><?php echo e($user->name); ?></a>  قبل <?php echo e(timeToStr(strtotime($note->data['created_at']['date']))); ?>


                <?php else: ?>

                عضو محظور  قبل <?php echo e(timeToStr(strtotime($note->data['created_at']['date']))); ?>


                <?php endif; ?>

              </span>

            </li>

            <?php elseif($note->type == 'App\Notifications\newCmntNotif'): ?>

            <li>

              <span>

                يوجد رد جديد على الإعلان

                <a href="<?php echo e(url('ads/'.$note->data['id'].'/'.$note->data['title'])); ?>" class="note_replay"><?php echo e($note->data['title']); ?></a> بواسطة 

                <?php if($user = \App\User::find($note->data['user_id'])): ?>

                <a href="<?php echo e(url('users/'.$note->data['user_id'])); ?>" class="username"><?php echo e($user->name); ?></a>  قبل <?php echo e(timeToStr(strtotime($note->data['created_at']['date']))); ?>


                <?php else: ?>

                عضو محظور  قبل <?php echo e(timeToStr(strtotime($note->data['created_at']['date']))); ?>


                <?php endif; ?>

              </span>

            </li>

            <?php elseif($note->type == 'App\Notifications\followPostnotf'): ?>

            <li>

              <span>

                قام 

                <?php if($user = \App\User::find($note->data['userId'])): ?>

                <a href="<?php echo e(url('users/'.$note->data['userId'])); ?>" class="username"><?php echo e($user->name); ?></a>

                <?php else: ?>

                عضو محظور

                <?php endif; ?>

                بمتابعة إعلانك 

                <a href="<?php echo e(url('ads/'.$note->data['postId'].'/'.$note->data['postTitle'])); ?>" class="note_replay"><?php echo e($note->data['postTitle']); ?></a> 

              </span>

            </li>

            <?php elseif($note->type == 'App\Notifications\followUserNotf'): ?>

            <li>

              <span>

                قام 

                <?php if($user = \App\User::find($note->data['userId'])): ?>

                <a href="<?php echo e(url('users/'.$note->data['userId'])); ?>" class="username"><?php echo e($user->name); ?></a>

                <?php else: ?>

                عضو محظور

                <?php endif; ?>

                بمتابعتك 

              </span>

            </li>

            <?php endif; ?>

            <?php echo e($note->markAsRead()); ?>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        <h3  style="opacity: 0.6" >إشعارات أقدم</h3>

        <ul  style="opacity: 0.7">

        <?php $__currentLoopData = $oldNotf; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if($note->type == 'App\Notifications\newPostNotif'): ?>

            <li>

              <span>

                تم إضافة إعلان جديد لعضو او ماركة تتابعها بعنوان  

                <a href="<?php echo e(url('ads/'.$note->data['id'].'/'.$note->data['title'])); ?>" class="note_replay"><?php echo e($note->data['title']); ?></a> بواسطة 

                <?php if($user = \App\User::find($note->data['user_id'])): ?>

                <a href="<?php echo e(url('users/'.$note->data['user_id'])); ?>" class="username"><?php echo e($user->name); ?></a>  قبل <?php echo e(timeToStr(strtotime($note->data['created_at']['date']))); ?>


                <?php else: ?>

                عضو محظور  قبل <?php echo e(timeToStr(strtotime($note->data['created_at']['date']))); ?>


                <?php endif; ?>

              </span>

            </li>

            <?php elseif($note->type == 'App\Notifications\newCmntNotif'): ?>

            <li>

              <span>

                يوجد رد جديد على الإعلان

                <a href="<?php echo e(url('ads/'.$note->data['id'].'/'.$note->data['title'])); ?>" class="note_replay"><?php echo e($note->data['title']); ?></a> بواسطة 

                <?php if($user = \App\User::find($note->data['user_id'])): ?>

                <a href="<?php echo e(url('users/'.$note->data['user_id'])); ?>" class="username"><?php echo e($user->name); ?></a>  قبل <?php echo e(timeToStr(strtotime($note->data['created_at']['date']))); ?>


                <?php else: ?>

                عضو محظور  قبل <?php echo e(timeToStr(strtotime($note->data['created_at']['date']))); ?>


                <?php endif; ?>

              </span>

            </li>

            <?php elseif($note->type == 'App\Notifications\followPostnotf'): ?>

            <li>

              <span>

                قام 

                <?php if($user = \App\User::find($note->data['userId'])): ?>

                <a href="<?php echo e(url('users/'.$note->data['userId'])); ?>" class="username"><?php echo e($user->name); ?></a>

                <?php else: ?>

                عضو محظور

                <?php endif; ?>

                بمتابعة إعلانك 

                <a href="<?php echo e(url('ads/'.$note->data['postId'].'/'.$note->data['postTitle'])); ?>" class="note_replay"><?php echo e($note->data['postTitle']); ?></a> 

              </span>

            </li>

            <?php elseif($note->type == 'App\Notifications\followUserNotf'): ?>

            <li>

              <span>

                قام 

                <?php if($user = \App\User::find($note->data['userId'])): ?>

                <a href="<?php echo e(url('users/'.$note->data['userId'])); ?>" class="username"><?php echo e($user->name); ?></a>

                <?php else: ?>

                عضو محظور

                <?php endif; ?>

                بمتابعتك 

              </span>

            </li>

            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>

        <?php if(!count(Auth::user()->notifications)): ?>

          <div class="alert alert-info"> لا توجد إشعارات حاليا </div>

        <?php else: ?>

        <input id="delNotif" value="حذف جميع الإشعارات  »" type="submit" class="button">

        <?php endif; ?>

    </div>
<br /><br /><br /><br />
</div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<script type="text/javascript">

$(document).on('click','#delNotif',function(e) {

  e.preventDefault()

  var url = "<?php echo e(url('delAllNotf')); ?>";

  $.get(url,function(data){

    if(data == 'done'){

      $('.note').empty();

      $('.note').append('<div class="alert alert-success"> تم حذف جميع الإشعارات بنجاح </div>');

    }

  });

});

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/workox0x/public_html/haraj/resources/views/site/notify/notif.blade.php ENDPATH**/ ?>