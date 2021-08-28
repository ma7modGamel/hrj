

<?php $__env->startSection('title'); ?>
<?php echo e($post->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('description'); ?>
<?php echo e($post->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('keywords'); ?>
<?php echo e(str_limit($post->body,160)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('og_title'); ?>
<?php echo e($post->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('og_description'); ?>
<?php echo e(str_limit($post->body,160)); ?>

<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>
<div class="container single-post">
    <div class="row">
    <div class="col-md-9">
    <div class="pageContent">
        <div class="top_h">
            <h4> »  <?php echo e($post->title); ?></h4>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <?php if(isset($post->Area->name)): ?>
                    <h4><a href="<?php echo e(url('city/'.$post->Area->name)); ?>"><i class="fa fa-map-marker"></i> <?php echo e($post->Area->name); ?></a></h4>
                   <?php endif; ?>
                    <h5> قبل <?php echo e(timeToStr(strtotime($post->created_at))); ?></h5>
                    <?php if($post->updated_at > $post->created_at): ?>
                    <h5> آخر تحديث <?php echo e(timeToStr(strtotime($post->updated_at))); ?></h5>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <?php if(isset($post->User->name)): ?>
                    <?php if($post->User): ?>
                    <h4><a href="<?php echo e(url('users/'.$post->user_id)); ?>"><i class="fa fa-user"></i> <?php echo e($post->User->name); ?></a></h4>
                    <h5>#<?php echo e($post->id); ?></h5>
                    <?php else: ?>
                    <h4><a><i class="fa fa-user"></i>عضو محظور</a></h4>
                    <h5>#00000000000000000</h5>
                    <?php endif; ?>
                        <?php endif; ?>
                </div>
            </div>
            <h5 class='pp-post'>
                <?php if(count($post->where('id', '>', $post->id)->get()) > 0): ?>
                <a href="<?php echo e(Request::root()); ?>/ads/<?php echo e($post->where('id', '>', $post->id)->first()->id); ?>" class="pull-left">  التالى &#8592;</a></h5>
                <?php endif; ?>
                <?php if(count($post->where('id', '<', $post->id)->get()) > 0): ?>
                <a href="<?php echo e(Request::root()); ?>/ads/<?php echo e($post->where('id', '<', $post->id)->orderBy('id','desc')->first()->id); ?>" class="pull-right">&#8594; السابق </a></h5>
                <?php endif; ?>
                <div class="clearfix"></div>
            </div>
            <div class="adxBody" style=" word-wrap: break-word !important; ">
                <h3>
                    <?php echo e($post->body); ?>

                </h3>

                <?php $__currentLoopData = \App\UpImage::where('post_id',$post->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($image->type == 'posts'): ?>
                <div class="text-center">

                       <?php if($image->type_way === 'image'): ?>
                    <img src="<?php echo e(image_check($image->img_name,'posts')); ?>">
                         <?php elseif($image->type_way === 'video'): ?>
                    <video width="320" height="240" controls>
                        <source src="<?php echo e(asset('public/upload/posts').'/'.$image->img_name,'posts'); ?>" type="video/mp4">
                        <source src="<?php echo e(asset('public/upload/posts').'/'.$image->img_name,'posts'); ?>" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                           <?php else: ?>
                                <h1>لايوجد صورة لهذا المنتج </h1>
                        <?php endif; ?>
                </div>
                <br>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <br />
            </div>
            
        </div>
        <div class="contact">
            <br>
            <div class="alert alert-warning">
            <p><svg class="svg-inline--hi hi-fw icon" viewBox="0 0 45.512 68.269" xmlns="http://www.w3.org/2000/svg"><path d="M6.851 39.007a10.265 10.265 0 012.9 7.349 5.664 5.664 0 005.657 5.658h14.695a5.664 5.664 0 005.657-5.658 10.267 10.267 0 012.9-7.349 22.548 22.548 0 006.851-16.251 22.756 22.756 0 00-45.512 0 22.549 22.549 0 006.852 16.251zm24.032 16.258h-16.25a1.626 1.626 0 00-1.626 1.626v2.182a8.128 8.128 0 002.377 5.75l2.02 2.02a4.878 4.878 0 003.449 1.429h3.809a4.876 4.876 0 003.447-1.428l2.024-2.021a8.13 8.13 0 002.381-5.748v-2.183a1.626 1.626 0 00-1.631-1.627zm-8.017-21.026a2.731 2.731 0 01-2.731-2.731V13.194a2.732 2.732 0 012.731-2.731 2.731 2.731 0 012.731 2.731v18.313a2.731 2.731 0 01-2.731 2.732zm2.762 6.556a2.762 2.762 0 11-2.762-2.762 2.762 2.762 0 012.762 2.762z" fill="currentColor"></path></svg> إذا طلب منك أحدهم تسجيل الدخول للحصول على مميزات فاعلم أنه محتال.</p>
        </div>
            <br><br>
            <div class="alert alert-warning">
            <span class="label label-success">التواصل :</span>
            <br /><strong><a href="<?php echo e(url('users/'.$post->user_id)); ?>"><i class="fa fa-phone"></i> <?php echo e($post->contact); ?> </a></strong>
            </div>
            <br />
            <br />
        </div>
        <div class="green rating">
            <?php if($post->User->Rating()->where('type',1)->count()): ?>
            <?php $__currentLoopData = $post->User->Rating()->where('type',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <i class="fa  fa-thumbs-up"></i>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($post->User->Rating()->where('type',1)->count()); ?> عضو ينصحون بالتعامل.
            <?php endif; ?>
        </div>
        <?php if(Auth::check() ? $post->user_id == Auth()->user()->id : false): ?>
        <div class="input-icon-wrap s2s">
            <a href="<?php echo e(url('edit/'.$post->id)); ?>"><i class="fa fa-pencil fa-3x"></i><br> تعديل</a>
            <a href="<?php echo e(url('adsUpdated/'.$post->id)); ?>"><i  class="fa fa-refresh  fa-3x"></i><br> تحديث</a>
            <a href="<?php echo e(url('adsDelete/'.$post->id)); ?>"><i class="fa fa-trash-o  fa-3x"></i><br> تم البيع</a>
            <!--<a href="<?php echo e(url('updateLocation?ad_Id='.$post->id)); ?>"><i class="fa fa-map-marker  fa-3x"></i><br> تعديل الموقع</a>-->
        </div>
        <hr>
        <div class="clearfix"></div>
        <hr>
        <?php endif; ?>
        <div class="input-icon-wrap">
            <a href="<?php echo e(url('sendMsg/'.$post->user_id.'?ad_Id='.$post->id)); ?>"><i class="fa fa-envelope  fa-2x"></i> </a>
            <?php if(Auth::check()): ?>
            <?php if($post->Users()->where('user_id',Auth::user()->id)->count()): ?>
            <span><a href="#!" id="<?php echo e($post->user_id != Auth::user()->id ? 'favPost' : ''); ?>"><span><?php echo e($post->Users()->count()); ?></span><i class="fa fa-heart fa-2x favad"></i></a></span>
            <?php else: ?>
            <span><a href="#!" id="<?php echo e($post->user_id != Auth::user()->id ? 'favPost' : ''); ?>"><span><?php echo e($post->Users()->count()); ?></span><i class="fa fa-heart-o fa-2x"></i></a></span>
            <?php endif; ?>
            <?php else: ?>
            <span><a><span><?php echo e($post->Users()->count()); ?></span><i class="fa fa-heart-o fa-2x"></i></a></span>
            <?php endif; ?>
            <a href="<?php echo e(url('adsReport?ad_Id='.$post->id)); ?>"><i class="fa fa-flag fa-2x"></i> </a>
            <a href="https://wa.me/<?php echo e($post->contact); ?>?send?text=<?php echo e(Request::url()); ?>"><i class="fa  fa-whatsapp fa-2x"></i></a>
            <a href="https://twitter.com/intent/tweet?text=<?php echo e(Request::url()); ?>"><i class="fa fa-twitter  fa-2x"></i></a>
        </div>
        <div class="clearfix"></div>
        <hr>
        <br>
        <div class="metaBody">
            <?php if(isset($post->Cat->name)): ?>
            <a href="<?php echo e(url('tags/'.$post->Cat->name)); ?>">#<?php echo e($post->Cat->name); ?></a>
            <?php endif; ?>
            <br />
            <br />
            <?php if(isset($post->Area->name)): ?>
            <a href="<?php echo e(url('city/'.$post->Area->name)); ?>">#<?php echo e($post->Area->name); ?></a>
                <?php endif; ?>
        </div>
        <br />
        
       <br>
       <?php $num = 1 ?>
       <?php $__currentLoopData = $post->Cmnt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cmnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="comment">
        <div class="commentHeader">
            <div class="adxExtraInfo">
                <div class="adxExtraInfoPart">
                    <?php if($cmnt->User): ?>
                    ›› &nbsp; <a href="<?php echo e(url('users/'.$cmnt->user_id)); ?>" class="usernames <?php echo e(Auth::check() ? $post->user_id == $cmnt->user_id ? 'red' : '' : ''); ?>"><?php echo e($cmnt->User->name); ?></a> 
                    <?php if(Auth::check() ? $cmnt->user_id != Auth()->user()->id : false): ?>
                    <a href="<?php echo e(url('sendMsg/'.$cmnt->user_id)); ?>"><i class="fa fa-envelope"></i></a> &nbsp;
                    <?php endif; ?>
                    <?php else: ?>
                    ›› &nbsp; <a class="usernames">عضو محظور</a> <a><i class="fa fa-envelope"></i></a> &nbsp;
                    <?php endif; ?>
                    <?php if(Auth::check() ? $post->user_id == Auth()->user()->id : false): ?>
                    <span class="label label-default"> جديد </span> &nbsp;
                    <?php endif; ?>
       
                    <?php if(Auth::check() ? $cmnt->user_id == $post->user_id : false): ?>
                    <span class="green "><i class="fa fa-bullhorn"></i></span>
                    <?php endif; ?>
                </div>
                <div class="adxExtraInfoPart pull-left">
                    <div class="moveLeft">
                        ››
                        <a href="#<?php echo e($num); ?>" id="<?php echo e($num); ?>"><?php echo e($num); ?></a>
                    </div>
                </div>
            </div>
            ›› &nbsp;  قبل <?php echo e(timeToStr(strtotime($cmnt->created_at))); ?>

            <div class="reportPanel">
                           <?php if(Auth::check() ? $post->user_id == Auth()->user()->id : true): ?>
                    <a href="<?php echo e(url('cmnts/'.$cmnt->id.'/delete')); ?>" style="float: left; font-size: 19px;"><i class="fa fa-trash-o"></i></a> &nbsp;
                    <?php endif; ?>
              
                
            </div>
        </div>
    </div>
    <div class="commentBody">
        <?php echo e($cmnt->body); ?>

    </div>
    <br>
    <?php $num++; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if(!Auth::check()): ?>
    <div class="alert alert-info">
        يجب عليك <a href="<?php echo e(url('login')); ?>">تسجيل الدخول</a> حتى تتمكن من إضافة رد.
    </div>
    <?php else: ?>
    <div class="allComments metaBody">     
        <div class="metaBody">
            <br>
            <?php if($post->user_id != Auth::user()->id): ?>
            <?php if($post->Users()->where('user_id',Auth::user()->id)->count()): ?>
            <button id="followPost" data-status="0" data-token="<?php echo e(csrf_token()); ?>" class="button addfav"> <i class="fa fa-check"></i> تمت متايعة الردود </button>
            <?php else: ?>
            <button id="followPost" data-status="1" data-token="<?php echo e(csrf_token()); ?>" class="button addfav"> متابعة الردود <i class="fa fa-feed"></i></button>
            <?php endif; ?>
            <?php endif; ?>
        </div>        
    </div>
    <form action="<?php echo e(url('addCmntPost')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <div class="well">
            <textarea name="body" rows="8" placeholder="أكتب سؤالك للمعلن هنا" class=" comment_body" style="width: 100%; padding: 10px"></textarea>
            <input class="hidden" name="post_id" value="<?php echo e($post->id); ?>">
            <br>
            <input class="btn btn-info"  value="اضافه تعليق" type="submit">
        </div>
    </form>
    <?php endif; ?>
</div>

<?php if(\App\Post::where('cat_id',$post->cat_id)->where('area_id',$post->area_id)->where('id','!=',$post->id)->count()): ?>
<div class="col-md-3 silvered">
    <div class="tit_pics">
        <?php if(isset($post->Cat->name)&&isset($post->Area->name    )): ?>
        <a class="tag" href="<?php echo e(url('tags/'.$post->Cat->name.','.$post->Area->name)); ?>"># <?php echo e($post->Cat->name .' فى  '.$post->Area->name); ?></a>
        <div class="pics">
            <?php $__currentLoopData = \App\Post::where('cat_id',$post->cat_id)->where('area_id',$post->area_id)->where('id','!=',$post->id)->paginate(15); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $similar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(url('ads/'.$similar->id.'/'.$similar->title)); ?>"><img src="<?php echo e(image_check(\App\UpImage::where('post_id',$similar->id)->where('type','posts')->pluck('img_name')->first(),'posts')); ?>"></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
            <?php endif; ?>
    </div>
    <br />
</div>
<?php endif; ?>

<?php if(\App\Post::where('cat_id',$post->cat_id)->where('id','!=',$post->id)->count()): ?>
<div class="col-md-3 silvered">
    <div class="tit_pics">
       <a class="tag" href="<?php echo e(url('tags/'.$post->Cat->name)); ?>"># <?php echo e($post->Cat->name); ?></a>
        <div class="pics">
            <?php $__currentLoopData = \App\Post::where('cat_id',$post->cat_id)->where('id','!=',$post->id)->paginate(15); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $similar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <a href="<?php echo e(url('ads/'.$similar->id.'/'.$similar->title)); ?>"><img src="<?php echo e(image_check(\App\UpImage::where('post_id',$similar->id)->where('type','posts')->pluck('img_name')->first(),'posts')); ?>"></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <br />
</div>
<?php endif; ?>
    </div>
</div>





<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script type="text/javascript">
$(document).on("click","#favPost",function() {
    var favNum = $(this).find('span').text();
    if($(this).find('i').hasClass('fa-heart-o')){
        $(this).find('i').removeClass('fa-heart-o');
        $(this).find('i').addClass('fa-heart');
        $(this).find('i').addClass('favad');
        $(this).find('span').text(++favNum);
    }else{
        $(this).find('i').removeClass('favad');
        $(this).find('i').removeClass('fa-heart');
        $(this).find('i').addClass('fa-heart-o');
        $(this).find('span').text(--favNum);
    }
    $('#followPost').click();
});
// follow Post
$('#followPost').on('click', function (e) {
    e.preventDefault();
    var url     = '<?php echo e(url("followPost")); ?>',
        token   = $(this).data('token'),
        status  = $(this).attr('data-status'),
        post_id = '<?php echo e($post->id); ?>',
        a=$(this);
    $.post(url,{_method: 'post', _token :token,post_id :post_id,status :status},function (data) {
        if(data == 'attach'){
            newStatus = status.replace('1','0');
            a.attr('data-status',newStatus);
            a.empty();
            a.append('<i class="fa fa-check"></i> تمت متايعة الردود');
        }else if (data == 'detach'){
            newStatus = status.replace('0','1');
            a.attr('data-status',newStatus);
            a.empty();
            a.append('متابعة الردود <i class="fa fa-feed">');            
        }else{
            toastr.options.timeOut = '6000';
            toastr.options.positionClass = 'toast-bottom-left';
            Command: toastr["error"]("حدث خطأ يرجة المحاوله فى وقت لاحق");
        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/harajfp/public_html/resources/views/site/posts/singleAd.blade.php ENDPATH**/ ?>