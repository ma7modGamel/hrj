<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                
                    
                        
                        
                            
                                
                                
                                
                            
                            
                                
                                

                            
                        
                    
                    
                        
                            
                                
                                
                            
                        
                    
                    
                        
                        
                            
                                
                            
                                
                            
                        
                    
                
            






            <div class="adv-1 <?php echo e($num % 2 != 0 ? '' : 'adv-3'); ?>">

                <div class="inneer-adv" <?php echo e(($post->type == 'مطلوب')?'style= background:#fdf5ff' :''); ?>>
                    
                    
                    
                    <div class=" adv-pic">
                        <a href="<?php echo e(url('ads/'.$post->id.'/'.($post->title))); ?>">
                            <?php if(isset(\App\UpImage::where('post_id',$post->id)->first()->type_way)&& \App\UpImage::where('post_id',$post->id)->first()->type_way == 'image'): ?>
                                <img src="<?php echo e(asset('/public/upload/posts').'/'.\App\UpImage::where('post_id',$post->id)->where('type','posts')->pluck('img_name')->first(),'posts'); ?>" title="<?php echo e($post->title); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(asset('/public/upload/images/default-video.jpg')); ?> " title="<?php echo e($post->title); ?>">
                            <?php endif; ?>
                        </a>

                    </div>
                    <div class="content">
                        <div class="inner-img">
                            <!--<img src="<?php echo e(asset('public').'/'.\App\User::find($post->user_id)->image); ?>" class="img-responsive img-thumbnail img-circle" style="width:90px;height: 90px;">-->
                            <!--<p style="text-align:center"><?php echo e($post->User->name); ?></p>-->
                        </div>
                        <div class=" adv-tit">
                            <h3><a class="<?php echo e(in_array('tags',Request::segments()) ? $post->top == 1 ? 'darkgreen' : '' : ''); ?>" href="<?php echo e(url('ads/'.$post->id.'/'.($post->title))); ?>"><?php echo e($post->title); ?></a></h3>
                            <div class="text">
                            <span class="pull-right">
                               <?php if($post->top == 1): ?> <i class="gold fa fa-star fa-lg"></i> <?php endif; ?>
                                
                                <a href="<?php echo e(url('ads/'.$post->id.'/'.($post->title))); ?>"><?php echo e($post->Cmnt->count() ? $post->Cmnt->count().' ردود ': ''); ?> </a><br><br>
                                <a href="<?php echo e(url('city/'.$post->city_name)); ?>"><i class="fa fa-map-marker"></i>  <?php echo e($post->city_name); ?> </a>
                                    <?php if($post->soum != 0): ?>
                                        

                                    <?php else: ?>
                                        <?php endif; ?>
                            </span>
                                <span class="pull-left">
                                <!--<a href="<?php echo e(url('ads/'.$post->id.'/'.($post->title))); ?>">السعر <?php echo e($post->price); ?> ريال</a><br>-->
                                <a href="<?php echo e(url('ads/'.$post->id.'/'.($post->title))); ?>">قبل <?php echo e(timeToStr(strtotime($post->created_at))); ?></a><br>
                                    

                            </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php $num++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/workox0x/public_html/haraj/resources/views/site/posts/loadMore.blade.php ENDPATH**/ ?>