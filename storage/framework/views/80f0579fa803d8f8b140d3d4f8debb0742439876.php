<div class="msgConv">
    <div class="msgHeader">
        <b>رد : رسالة خاصة إلى <?php echo e($newMsg->UserTo->name); ?></b>
        <br> المرسل:
        <a href="<?php echo e(url('users/'.$newMsg->UserTo->id)); ?>" class="username"> <i class="fa fa-user"></i> <?php echo e($newMsg->User->name); ?></a>
        <br> قبل : <?php echo e(timeToStr(strtotime($newMsg->created_at))); ?>

    </div>
    <div class="msgBody">
        <?php echo e($newMsg->body); ?>

        <div style="clear:both;"></div>
        <span style="float: left;"></span>
        <div style="clear:both;"></div>
    </div>
</div>
<?php /**PATH /home/taathleeth/public_html/resources/views/site/messages/loadMoreConvFrom.blade.php ENDPATH**/ ?>