

<?php $__env->startSection('title'); ?>
الرسائل الوارده
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<div class="singleContent">
    <div class="msgs">
        <h3>&nbsp; <i class="fa fa-envelope "></i> الرسائل</h3>
        <form id="postform" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="adsx">
            <?php if(count($messages)): ?>
            <?php $num = 0; ?>
            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="msg <?php echo e($num % 2 != 0 ? '' : 'adv-3'); ?> <?php echo e($msg->status == 1 ? 'newMsg' : ''); ?>">
                <?php if($msg->User): ?>
                <div class="msgInfo"><a href="<?php echo e(url('conv/'.$msg->User->id)); ?>" class="msgTitleDisabled">رد : <?php echo e(str_limit($msg->body,50)); ?> </a>
                    <br>
                    <input type="hidden" name="msg[]" value="<?php echo e($msg->id); ?>"><a href="<?php echo e(url('users/'.$msg->User->id)); ?>" class="username"><i class="fa fa-user"></i> <?php echo e($msg->User->name); ?></a>
                </div>
                <?php else: ?>
                <div class="msgInfo"><a href="#" class="msgTitleDisabled">رد : <?php echo e(str_limit($msg->body,50)); ?> </a>
                    <br>
                    <input type="hidden" name="msg[]" value="<?php echo e($msg->id); ?>"><i class="fa fa-user-times "></i> عضو محذوف</a>
                </div>
                <?php endif; ?>
                <div class="msgMeta">
                    <br>قبل <?php echo e(timeToStr(strtotime($msg->created_at))); ?>

                </div>
            </div>
            <?php $num++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <div class="alert alert-info"> لا توجد رسائل </div>
            <?php endif; ?>
            </div>
            <?php if(count($messages) >= 10): ?>
            <div class="ajax-load text-center" style="display:none">
                <img src="https://www.sgjbnow.com/wp-content/themes/johor/images/loading.gif" height="25" width="92">
            </div>
            <div id="AJAXloaded">
                <div class="loadmore">
                    <ul class="pagination">
                        <li class="active">
                            <a id="load-more">مشاهدة المزيد ...</a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
            <br>
            <br>
            <br>
            <button class="button btn-danger" type="submit" id="remove" style="color: #d9534f;background-color: #fff;border-color: #d43f3a;">حذف جميع الرسائل »</button>
        </form>
        <hr>
        <br>
        <br>
        <br>
        <a href="<?php echo e(url('outbox')); ?>">الرسائل المرسلة</a>
        <br>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<script type="text/javascript">
$(document).on("click","#load-more",function() {
    var page = 1;
   page=page+1;
   loadMoreData(page);
});

function loadMoreData(page){
    $.ajax({
        url: '?page=' + page,
        type: "get",
        beforeSend: function(){
            $('#load-more').hide();
            $('.ajax-load').show();
        }
    }).done(function(data){
        if(data.html == ''){
            $('#load-more').hide();
            $('.ajax-load').html('<div class="alert"><center> لا توجد نتائج أخرى </center></div>');
            return;
        }
        $('#load-more').show();
        $('.ajax-load').hide();
        $(".adsx").append(data.html);
    }).fail(function(jqXHR, ajaxOptions, thrownError){
        alert('server not responding...');
    });

    $('.ajax-load').empty();
    $('.ajax-load').append('<img src="https://www.sgjbnow.com/wp-content/themes/johor/images/loading.gif" height="25" width="92">');
}

// Delete Messages
$(document).on("click","#remove",function(e) {
    e.preventDefault();
    var url = "<?php echo e(url('delMessages')); ?>",
        data    = $('#postform').serialize();
    $.post(url,data,function (data) {
      if(data=="hide"){
        $('.adsx').empty();
        $('.adsx').append('<div class="alert alert-success"> تم حذف الرسائل المختاره </div>');
      } else if (data=="error"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["error"]("حدث خطأ برجاء المحاولة فى وقت لاحق")
      }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harajfp/public_html/resources/views/site/messages/inbox.blade.php ENDPATH**/ ?>