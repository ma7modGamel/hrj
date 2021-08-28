<?php $__env->startSection('title'); ?>
<?php echo e($user->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
<style type="text/css">

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('userName'); ?>
	<?php echo e($user->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    
<div class="container">
<div class="body admin">
        <div class="col-md-3">
            
            <div class="side">
				<?php if($user->isOnline()): ?>
                <span class="label label-success">متصل </span>
				<?php else: ?>
                <span class="label label-default">غير متصل</span>
				<?php endif; ?>
                <?php if(Auth::check()): ?>
                <?php if(Auth::user()->id != $user->id): ?>
                <hr>
                <a href="<?php echo e(url('sendMsg/'.$user->id)); ?>"><i class="fa fa-envelope"></i> مراسلة </a>
				<?php endif; ?>
				<?php endif; ?>
                <hr>
                
                <ul class="badges">
                    <?php $__currentLoopData = $user->Rank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($rank->type == 1): ?>
                    <li> <span class="badge-info"><i class="star fa  fa-star"> </i> <?php echo e($rank->rank_title); ?></span></li>
                    <?php elseif($rank->type == 2): ?>
                    <li> <span class="badge-info"><i class="blue fa  fa-check-circle"> </i> <?php echo e($rank->rank_title); ?></span></li>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->Rating()->where('type',1)->count()): ?>
                    <li><a href="<?php echo e(url('allreviews/'.$user->id)); ?>"> <span class="badge-info"><i class="green fa  fa-thumbs-up"> </i> <?php echo e($user->Rating()->where('type',1)->count()); ?> تقييم إيجابي</span></a></li>
                    <?php endif; ?>
                    <?php if($user->Rating()->where('type',0)->count()): ?>
                    <li><a href="<?php echo e(url('allreviews/'.$user->id)); ?>"> <span class="badge-info"><i class="red fa  fa-thumbs-down"> </i> <?php echo e($user->Rating()->where('type',0)->count()); ?> تقييم سلبي</span></a></li>
                    <?php endif; ?>
                </ul>
                <a href="<?php echo e(url('add-rating/'.$user->id)); ?>"><i class="fa fa-thumbs-up"></i> إضافة  تقييم </a><br>
                
                <hr>
                <?php if(Auth::check()): ?>
                <?php if(Auth::user()->id != $user->id): ?>
	            <?php if(Auth::user()->Follows()->where('user_follow',$user->id)->count()): ?>
                <button id="followUser" data-status="0" data-token="<?php echo e(csrf_token()); ?>" class="button btn-large show-delete" dir="rtl" style="width: 100%"><i class="fa fa-check"></i>  انت تتابع : <?php echo e($user->name); ?></button>
                <hr>
	            <?php else: ?>
                <button id="followUser" data-status="1" data-token="<?php echo e(csrf_token()); ?>" class="button btn-large" dir="rtl" style="width: 100%"><i class="fa fa-feed"></i>  متابعة <?php echo e($user->name); ?></button>
                <hr>
	            <?php endif; ?>
	            <?php endif; ?>
	            <?php endif; ?>
        		<div class="clearfix"></div>
                <?php
                $countFollows = \App\User::whereHas('Follows', function ($query) use ($user) {
                    $query->where('user_follow',$user->id);
                })->count();
                ?>

                <b id="followsNum"> <?php echo e($countFollows); ?> </b> <i class="fa fa-user"></i> متابع <br>
            </div>
        </div>
        <div class="col-md-9">
        	<div class="adsx">
	            <?php if($posts->count()): ?>
	            <?php $num = 0; ?>
	            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($post && $post->User && $post->Area): ?>
                
                    
                        
                            
                            
                                
                                    
                                    
                                    
                                
                                
                                    
                                    
                                    
                                      
                                
                            
                        
                        
                            
                                
                                    
                                    
                                    
                                    
                                
                            
                        
                        
                            
                        
                    
                
                            <div class="adv-1 <?php echo e($num % 2 != 0 ? '' : 'adv-3'); ?>">

                                <div class="inneer-adv" <?php echo e(($post->type == 'مطلوب')?'style= background:#fdf5ff' :''); ?>>
                                    
                                    
                                    
                                    <div class=" adv-pic">
                                        <a href="<?php echo e(url('ads/'.$post->id.'/'.$post->title)); ?>">
                                            <?php if(isset(\App\UpImage::where('post_id',$post->id)->first()->type_way)&& \App\UpImage::where('post_id',$post->id)->first()->type_way == 'image'): ?>
                                                <img src="<?php echo e(asset('/public/upload/posts').'/'.\App\UpImage::where('post_id',$post->id)->where('type','posts')->pluck('img_name')->first(),'posts'); ?>" title="<?php echo e($post->title); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('/public/upload/images/default-video.jpg')); ?> " title="<?php echo e($post->title); ?>">
                                            <?php endif; ?>
                                        </a>

                                    </div>
                                    <div class="content">
                                            
                                        <div class=" adv-tit">
                                            <h3><a class="<?php echo e(in_array('tags',Request::segments()) ? $post->top == 1 ? 'darkgreen' : '' : ''); ?>" href="<?php echo e(url('ads/'.$post->id.'/'.$post->title)); ?>"><?php echo e($post->title); ?></a></h3>
                                            <div class="text">
                            <span class="pull-right">
                            <br>
                            <a href="<?php echo e(url('city/'.$post->Area->name)); ?>"><i class="fa fa-map-marker"></i> <?php echo e($post->Area->name); ?> </a>
                            </span>
                                                <span class="pull-left">
                                <a href="<?php echo e(url('ads/'.$post->id.'/'.$post->title)); ?>">السعر <?php echo e($post->price); ?> ريال</a><br>
                                <a href="<?php echo e(url('ads/'.$post->id.'/'.$post->title)); ?>">قبل <?php echo e(timeToStr(strtotime($post->created_at))); ?></a><br>
                                

                            </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
              <?php endif; ?>
	            <?php $num++; ?>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	            <?php endif; ?>
            </div>
	        <div class="ajax-load text-center" style="display:none">
	            <img src="https://www.sgjbnow.com/wp-content/themes/johor/images/loading.gif" height="25" width="92">
	        </div>
            <div id="AJAXloaded">
            	<?php if(count($posts) > 1): ?>
                <div class="loadmore">
	                <ul class="pagination">
	                    <li class="active">
	                        <a id="load-more">مشاهدة المزيد ...</a>
	                    </li>
	                </ul>
                </div>
                <?php endif; ?>
                <div class="singleContent">
                    <?php if(auth::check()): ?>
                    <?php if(auth::user()->id == $user->id): ?>
                     <a href="<?php echo e(url('commission')); ?>">حساب عمولة الموقع</a><br><br>
                    <a href="<?php echo e(url('unsubscribe')); ?>">إدارة التنبيهات البريدية</a><br><br>
                    <a href="<?php echo e(url('chgpwd')); ?>">تغيير رقمك السري</a><br><br>
                    <a href="<?php echo e(url('updatemobile')); ?>">تغيير رقم جوالك</a><br><br>
                    <a href="<?php echo e(url('updatename')); ?>"> تغيير مسمى العضوية</a><br><br>
                    <a href="<?php echo e(url('changeImg')); ?>"> تغيير الصورة الشخصيه</a><br><br>
                    <a href="<?php echo e(url('changeCity')); ?>"> تغيير مدينتك</a><br><br>
                    <a href="<?php echo e(url('updateemail')); ?>"> تغيير البريد الالكتروني</a><br><br>
                    <!-- <a href="/verify_mobile.php">توثيق الجوال</a><br><br> -->
                    
                    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل الخروج</a><br><br>
                    <?php endif; ?>
                    <?php endif; ?>
                    <hr>
                    <a href="<?php echo e(url('comments/'.$user->id)); ?>">آخر ردود <?php echo e($user->name); ?></a><br>
                </div>
            </div>
        </div>
    </div>
</div>

    
        

            
            
                
                    
                    
                
                
                    
                        
                        
                    
                
                
                    
                    
                
            

        
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script type="text/javascript">
// alert($('#followUser').data('status'));

$(document).on({
	mouseenter: function(){
		$('.show-delete').empty();
		$('.show-delete').append('<i class="fa fa-close"></i> إلغاء المتابعه');
	},
	mouseleave: function(){
		$('.show-delete').empty();
		$('.show-delete').append('<i class="fa fa-check"></i>  انت تتابع : <?php echo e($user->name); ?>');
	}
}, '.show-delete');


// follow Post
$('#followUser').on('click', function (e) {
    e.preventDefault();
    var url     = '<?php echo e(url("followUser")); ?>',
        token   = $(this).data('token'),
        status  = $(this).attr('data-status'),
        user_id = '<?php echo e($user->id); ?>',
    	favNum 	= $('#followsNum').text(),
        a=$(this);

    $.post(url,{_method: 'post', _token :token,user_id :user_id,status :status},function (data) {
        if(data == 'attach'){
            newStatus = status.replace('1','0');
            a.attr('data-status',newStatus);
            a.empty();
            a.append('<i class="fa fa-check"></i> انت تتابع : <?php echo e($user->name); ?>');
            a.addClass('show-delete');
            $('#followsNum').text(++favNum);
        }else if (data == 'detach'){
            newStatus = status.replace('0','1');
            a.attr('data-status',newStatus);
            a.empty();
            a.append('<i class="fa fa-feed"> متابعة <?php echo e($user->name); ?> ');
            a.removeClass('show-delete');
            $('#followsNum').text(--favNum);
        }else{
            toastr.options.timeOut = '6000';
            toastr.options.positionClass = 'toast-bottom-left';
            Command: toastr["error"]("حدث خطأ يرجة المحاوله فى وقت لاحق");
        }
    });
});


//====================================================================================
// ================= load More =======================================================

var page = 1;

$(document).on("click","#load-more",function() {
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

</script>
<script>
    $(document).ready(function(){
        $("#myBtn").click(function(event){
            event.preventDefault();
            $("#myModal").modal();
        });
    });
    $("#myBtn").one('click',function(){
        $("#user").clone().appendTo(".modal-body");
    });
</script>


    
        
            
            
        
    
    
        
    



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/workox0x/public_html/haraj/resources/views/site/users/userView.blade.php ENDPATH**/ ?>