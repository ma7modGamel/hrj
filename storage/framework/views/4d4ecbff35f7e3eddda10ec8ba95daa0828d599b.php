<div class="msgConv to_pm">
    <div class="msgHeader">
        <b>رد : رسالة خاصة إلى <?php echo e($newMsg->User->name); ?></b>
        <br> المرسل:
        <a href="<?php echo e(url('users/'.$newMsg->User->id)); ?>" class="username"> <i class="fa fa-user"></i> <?php echo e($newMsg->User->name); ?></a>
        <br> قبل: <?php echo e(timeToStr(strtotime($newMsg->created_at))); ?>

        <span style="float: left;"> 
            </span>
    </div>
    <div class="msgBody">
        <?php echo e($newMsg->body); ?>

        <div style="clear:both;"></div>
        <span style="float: left;">
            <span class="<?php echo e($newMsg->status == 0 ? 'blue' : ''); ?>"> <i class="fa fa-check"></i><i class="fa fa-check"></i></span>
        </span>
        <div style="clear:both;"></div>
    </div>
</div>
<?php /**PATH /home/taathleeth/public_html/resources/views/site/messages/loadMoreConv.blade.php ENDPATH**/ ?>