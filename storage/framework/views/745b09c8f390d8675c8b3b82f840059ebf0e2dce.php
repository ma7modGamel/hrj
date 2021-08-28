

<?php $__env->startSection('header'); ?>
<?php echo HTML::style('public/website/css/owl.carousel.css'); ?>

<style>
   .nestedLevel ul {
   margin-right: 0%; 
   right: 0;
   left: auto;
   }
   .nestedLevel ul {
   margin: 0;
   list-style: none;
   margin-left: 3%;
   margin-right: 3%;
   padding: 0;
   direction: rtl;
   position: absolute;
   left: 0;
   top: 0;
   height: 100%;
   width: 96%;
   background-color: #fff;
   }
   .nestedTabs {
   overflow-x: hidden;
   }
   .nestedTabs {
   font-size: 15px;
   transition: all .7s ease-in-out;
   padding: 16px 0;
   padding-bottom: 0;
   white-space: nowrap;
   overflow-x: auto;
   overflow-y: hidden;
   -webkit-overflow-scrolling: touch;
   background-color: #fff;
   unicode-bidi: embed;
   z-index: 1;
   top: 0;
   height: auto !important;
   width: 100%;
   }
   a.tagTab.active:visited {
   color: #2f3d6b;
   }
   .sa{
   color: green;
   }
   .ui-autocomplete {
   position: relative;
   top: -4810px;
   color: white;
   /* display: none; */
   width: 400px;
   right: 322px;
   background-color: springgreen;
   list-style-type: none;
   }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    
<div class="body">
   <div class="container">
      <div class="row">
         <div class="col-md-3 md-padd_n col-sm-hidden">
            <div class="part_i p-form">
               <form>
                <select name="city" id="brand">

                    <option selected disabled="disabled" value="#">اختر القسم </option>
                    <?php $__currentLoopData = \App\Cat::whereNull('parent_id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>



                <select name="subcity" id="marka">

<option selected disabled="disabled" value="#">اختر القسم </option>
                    <?php

                        $sub_cats = \App\Cat::where([

                                ['parent_id','!=',0],

                                ['parent_id','!=',1000],

                                    ])->get();

                            ?>

                    <?php $__currentLoopData = $sub_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option style="display: none;" class="<?php echo e($sub_cat->parent_id); ?>"><?php echo e($sub_cat->name); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </select>



                <select id="markaCopy">

                    <?php $__currentLoopData = \App\Cat::whereIn('parent_id',\App\Cat::select('id')->where('parent_id',1)->get()->toArray())->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option data-parent="<?php echo e($cat->parent_id); ?>" value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>





                <select name="city" id="model">

                    <option value="#">المدينة </option>

            <?php $__currentLoopData = \App\Area::where('parent_id',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option value="<?php echo e($area->id); ?>"><?php echo e($area->name); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>



                <button class="btn-success" id='carDropSearch'><i class="fa fa-search"></i> </button>


        <select id="markaCopy">

            <?php $__currentLoopData = \App\Cat::whereIn('parent_id',\App\Cat::select('id')->where('parent_id',1)->get()->toArray())->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <option data-parent="<?php echo e($cat->parent_id); ?>" value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </select>


                <div class="clear"></div>

               </form>
            </div>
            <hr>
            <div class="part_i">

<div class="trademarks" id="">



<?php $__currentLoopData = \App\Cat::where([['parent_id',1],['logo','!=',null]])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<a href="<?php echo e(url('tags/'.$cat->id)); ?>" class="gallerypic">

<img alt="<?php echo e($cat->name); ?>" src="<?php echo e(url('public/upload/posts/'.$cat->logo)); ?>" title="<?php echo e($cat->name); ?>" class="car_cont sprite-toyota">

    </a>





<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>







</div>

</div>

<hr>

            
            <div class="part_i spec-links">
                
                   <div class="marka">

        <div class="other_marks">

          <?php $__currentLoopData = \App\Cat::where('parent_id',544)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($cat->icon != null): ?>

                        <a class="tag-cat" href="<?php echo e(url('tags/'.$cat->id)); ?>"> <i class="<?php echo e($cat->icon); ?>"></i> </a>

                <?php else: ?>

                <a class="tag-cat" href="<?php echo e(url('tags/'.$cat->id)); ?>"> <?php echo e($cat->name); ?> </a>

                <?php endif; ?>



            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<hr>

<?php $__currentLoopData = \App\Cat::where('parent_id',546)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php if($cat->icon != null): ?>

<a class="tag-cat" href="<?php echo e(url('tags/'.$cat->id)); ?>"> <i class="<?php echo e($cat->icon); ?>"></i> </a>

<?php endif; ?>



<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<a class="tag-cat" href="<?php echo e(url('tags/548')); ?>"><i class="icon-athath fa-3x"></i> </a>

        </div>

    </div>
 
            </div>
            <hr>
            <div class="part_i spec-links">
               <div class="links am-edit">
                  <ul>

                <?php $__currentLoopData = \App\Cat::where('parent_id',2)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <a title="<?php echo e($cat->name); ?>" href="<?php echo e(url('tags/'.$cat->id)); ?>" class="tagTab"> <?php echo e($cat->name); ?>  </a> 

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-9" >
            <div class="row">
               <div class="col-md-12">
                  <div class="content-aligned">




                     <form class="spec-links" style="display:none;">
                        <input  id="search" required type="search"
                           placeholder="ابحث عن سلعة .." class="searchBox searchToremove"
                           autocomplete="off" id="autocomplete"  name="key" required="required" />
                        <button class="button btn-success hideSmall" id="serachBar"><i class="fa fa-search"></i></button>
                     </form>


                     <!--start top search-->
                     <!--<form>-->
                     <!--        <div class="form-group-material">-->
                     <!--            <label class="material-label">ابحث في حراج..</label>-->
                     <!--            <input type="search" placeholder="" class="searchBox searchToremove tech" autocomplete="off"-->
                     <!--                id="autocomplete" value='' name="key" />-->
                     <!--                <button style="float: none;" class="button btn-success hideSmall col-md-5" id="serachBar"><i class="fa fa-search"></i></button>-->
                     <!--        </div>-->
                     <!--                        <div class="row">-->
                     <!--                            <div class="duration form-group col-md-5">-->
                     <!--                                <select name="duringdate" class="duringdate form-control">-->
                     <!--                                    <option value="all" selected>جميع الأوقات</option>-->
                     <!--                                    <option value="1 day">خلال يوم</option>-->
                     <!--                                    <option value="3 day">آخر 3 أيام</option>-->
                     <!--                                    <option value="1 week">آخر أسبوع</option>-->
                     <!--                                    <option value="1 month">آخر شهر</option>-->
                     <!--                                    <option value="3 month">آخر 3 شهر</option>-->
                     <!--                                    <option value="6 month">آخر 6 شهر</option>-->
                     <!--                                    <option value="12 month">أخر سنة</option>-->
                     <!--                                    <option value="24 month">أخر سنتين</option>-->
                     <!--                                </select>-->
                     <!--                            </div>-->
                     <!--                            <div class="city form-group col-md-5">-->
                     <!--                                <select name="city" id="city" class="city form-control">-->
                     <!--                                    <option selected value="all">كل المدن</option>-->
                     <!--                                    <?php $__currentLoopData = \App\Area::where('parent_id','!=',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                     <!--                                    <option value="<?php echo e($area->id); ?>"><?php echo e($area->name); ?></option>-->
                     <!--                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                     <!--                                </select>-->
                     <!--                            </div>-->
                     <!--                        </div>-->
                     <!--    </form>-->
                     <!--end top search-->


                     <div class=" spec-links text-justify">
                          <?php if(Auth::guest()): ?>
                             <a class="add-btn" href="<?php echo e(route('register')); ?>"><i class="fa fa-user-plus"></i>تسجيل </a>
                         <?php endif; ?>
                        <a href="<?php echo e(url('add')); ?>" class="add-btn"> <i class="fa fa-plus "></i> أضف إعلانك</a>
                        <a href="<?php echo e(url('commission')); ?>" class="add-btn"> <i class="fa fa-cc-mastercard "></i> السداد والعمولة</a>
                     </div>

                     
                  </div>
                  <br>
                  <div class="nestedTabs">
                     <div class="nestedLevel nestedLevel1 ">
                        <ul class="level_1" id="momId0" style="display: block;">
                                 
                <?php $__currentLoopData = App\Cat::where('parent_id',null)->where('sort','!=',null)->orderBy('sort','asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="mainCat" ><a href="<?php echo e(url("tags/$cat->id")); ?>" data-id="<?php echo e($cat->id); ?>" class="tagTab<?php echo e(($loop->first)?' car':''); ?>" id="<?php echo e($cat->id); ?>" value="<?php echo e($cat->id); ?>"><img src="<?php echo e(Request::root()); ?>/public/cats/<?php echo e($cat->logo ?? 'more-icon.svg'); ?>" alt=""><span><?php echo e($cat->name); ?></span></a> </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <li class="mainCat">
                              <a href="<?php echo e(url("tags/all")); ?>" data-id="all" class="tagTab">
                              <img src="<?php echo e(Request::root()); ?>/public/upload/svg_icons/more-icon.svg" alt="">
                              <span>كل الحراج</span>
                              </a>
                           </li>
                           
                              
                              
                              
                              
                              
                           
                              
                              
                              
                              
                              
                           
                              
                              
                              
                              
                              
                           
                              
                              
                              
                              
                              
                           
                           
                              
                              
                              
                              
                              
                        </ul>
                     </div>
                  </div>
                  <div class="nestedTabs hidden">
                     <div class="nestedLevel nestedLevel2">
                        <ul class="subCat">
                        </ul>
                     </div>
                  </div>
                  <div class="nestedTabs hidden">
                     <div class="nestedLevel nestedLevel3" >
                        <ul class="modelCat">
                        </ul>
                     </div>
                  </div>
                  <br>
                  <div>
                     <!--<div class="row">-->
                     <!--        <div class="col-sm-4">-->
                     <!--            <select name="cities" id="cities" class="form-control">-->
                     <!--                <option selected disabled value="#">اختر......</option>-->
                     <!--                <?php $__currentLoopData = \App\Area::where('parent_id','!=',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                     <!--                <option value="<?php echo e($area->id); ?>"><?php echo e($area->name); ?></option>-->
                     <!--                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                     <!--            </select>-->
                     <!--        </div>-->
                     <!--        <div class="col-sm-4">-->
                     <!--            <select class="timeSelect form-control hidden" id="timeFilter">-->
                     <!--                <option value="#" selected>اختر الوقت......</option>-->
                     <!--                <option value="1 day">خلال يوم</option>-->
                     <!--                <option value="3 day">آخر 3 أيام</option>-->
                     <!--                <option value="1 week">آخر أسبوع</option>-->
                     <!--                <option value="1 month">آخر شهر</option>-->
                     <!--                <option value="3 month">آخر 3 شهر</option>-->
                     <!--                <option value="6 month">آخر 6 شهر</option>-->
                     <!--                <option value="12 month">أخر سنة</option>-->
                     <!--                <option value="24 month">أخر سنتين</option>-->
                     <!--            </select>-->
                     <!--        </div>-->
                     <!--    </div>-->
                     <ul class="fiill" style="list-style: none;padding-inline-start: inherit;">
                        <li class="item-fillter-area citys-box">
                           <select class="area-change"  data-level="country" >
                              <option value="" selected >كل المدن </option>
                              <?php $__currentLoopData = \App\Area::where('parent_id',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($area->id); ?>"><?php echo e($area->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                        </li>
                        <li class="item-fillter-area sort-box">
                           <button class="filter-btn filter-btn-tab"> <i class="fa fa-home"></i> تصفيه </button>
                        </li>
                        <li class="item-fillter-area area-box location_place">
                           <button class="filter-btn"> <i class="fa fa-location-arrow"></i> </button>
                        </li>
                        
                           
                           
                     </ul>
                     <div class="filter-btn-when-click">
                        <a href="#" class="newItems">
                        <span>الاحدث</span>
                        </a>
                        <a href="#">
                        <span class="oldItems">الاقدم</span>
                        </a>
                     </div>
                     <div class="search-box-when-click">
                        <div class="center-element-in-middle">
                           <i class="fa fa-times close-search"></i>
                           
                              
                              
                              
                              
                              
                              
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <br>
            <div class="clearfix spec-links"></div>
            <br>
            <div class="clearfix"></div>
            <div class="adsx">
               <div class="refresh-btn">
                  <a href="javascript:window.location.href=window.location.href">
                  <span>تحديث</span>
                  </a>
               </div>
               <?php if($posts->count()): ?>
               <?php $num=0; ?>
               <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php if($post && $post->User && $post->Area): ?>
               <div class="adv-1 <?php echo e($num % 2 != 0 ? '' : 'adv-3'); ?>">
                  <div class="inneer-adv" <?php echo e(($post->type == 'مطلوب')?'style= background:#fdf5ff' :''); ?>>
                  <div class=" adv-pic">
                     <a href="<?php echo e(url('ads/'.$post->id.'/'.$post->title)); ?>">
                     <?php if(isset(\App\UpImage::where('post_id',$post->id)->first()->type_way)&&
                     \App\UpImage::where('post_id',$post->id)->first()->type_way == 'image'): ?>
                     <img
                        src="<?php echo e(asset('/public/upload/posts').'/'.\App\UpImage::where('post_id',$post->id)->where('type','posts')->pluck('img_name')->first(),'posts'); ?>"
                        title="<?php echo e($post->title); ?>">
                     <?php else: ?>
                     <img src="<?php echo e(asset('/public/upload/images/default-video.jpg')); ?> " title="<?php echo e($post->title); ?>">
                     <?php endif; ?>
                     </a>
                  </div>
                  <div class="content">
                     <div class="inner-img">
                        
                        
                     </div>
                     <div class=" adv-tit">
                        <h3><a class="<?php echo e(in_array('tags',Request::segments()) ? $post->top == 1 ? 'darkgreen' : '' : ''); ?>"
                           href="<?php echo e(url('ads/'.$post->id.'/'.($post->title))); ?>"><?php echo e($post->title); ?></a></h3>
                        <div class="text">
                           <span class="pull-right">
                              <?php if($post->top == 1): ?> <i class="gold fa fa-star fa-lg"></i> <?php endif; ?>
                              
                              <a href="<?php echo e(url('ads/'.$post->id.'/'.($post->title))); ?>"><?php echo e($post->Cmnt->count() ? $post->Cmnt->count().' ردود ': ''); ?>

                              </a><br><br>
                              <a href="<?php echo e(url('city/'.$post->Area->name)); ?>"><i class="fa fa-map-marker"></i> <?php echo e($post->Area->name); ?> </a>
                              
                              <?php if($post->soum != 0): ?>
                              
                              <?php else: ?>
                              <?php endif; ?>
                           </span>
                           <span class="pull-left">
                           <!--<a href="<?php echo e(url('ads/'.$post->id.'/'.($post->title))); ?>">السعر <?php echo e($post->price); ?> ريال</a><br>-->
                           <a href="<?php echo e(url('ads/'.$post->id.'/'.($post->title))); ?>">قبل
                           <?php echo e(timeToStr(strtotime($post->created_at))); ?></a><br>
                           
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php $num++; ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <div class="alert">
               <center> لا توجد نتائج مطابقه لبحثك </center>
            </div>
            <?php endif; ?>
         </div>
         <?php if($posts->count() >= 5): ?>
         <div class="ajax-load text-center" style="display:none">
            <img src="<?php echo e(Request::root()); ?>/public/upload/logo/loading.gif" height="25" width="25">
         </div>
         <div id="AJAXloaded">
            <div class="loadmore">
               <ul class="pagination">
                  <li class="active">
                     <a id="load-more">مشاهدة المزيد ...
                     <img id="lodingGif" src="<?php echo e(Request::root()); ?>/public/upload/logo/loading.gif" height="25" width="25" style="display: none;">
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <ul class="relatedTags">
            <?php $__currentLoopData = \App\Area::where('parent_id',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
               <a  data-area="<?php echo e($area->id); ?>" href="/city/<?php echo e($area->id); ?>">حراج <?php echo e($area->name); ?></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </ul>
         <?php endif; ?>
      </div>
      <div class="col-sm-12 md-padd_n col-sm-visible">
         <div class="part_i p-form">
            <form method="GET" action="<?php echo e(url('/')); ?>">
                
         <select name="tags1"   id="selectedMobileCat" >
         <!--<select name="tags"  onchange="this.form.submit()" >-->

            <option    disabled selected   value="">اختر القسم</option>

                <?php $__currentLoopData = \App\Cat::whereNull('parent_id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </select>


          <select name="tags2" class="hidden" id="subCatMobile">
                  </select>
    
    

        
        <button class="btn-success" type="submit" ><i class="fa fa-search"></i> بحث</button>





        <div class="clear"></div>

               
               
            </form>
         </div>
         
         
<div class="part_i">

<div class="trademarks" id="">



<?php $__currentLoopData = \App\Cat::where([['parent_id',1],['logo','!=',null]])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<a href="<?php echo e(url('tags/'.$cat->id)); ?>" class="gallerypic">

<img alt="<?php echo e($cat->name); ?>" src="<?php echo e(url('public/upload/posts/'.$cat->logo)); ?>" title="<?php echo e($cat->name); ?>" class="car_cont sprite-toyota">

</a>





<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>







</div>

</div>
         <hr>
         <div class="part_i spec-links">
            <div class="marka">
               <div class="other_marks">
                  <?php $__currentLoopData = \App\Cat::where('parent_id',544)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($cat->icon != null): ?>
                  <a class="tag-cat" href="<?php echo e(url('tags/'.$cat->id)); ?>"> <i class="<?php echo e($cat->icon); ?>"></i> </a>
                  <?php else: ?>
                  <a class="tag-cat" href="<?php echo e(url('tags/'.$cat->id)); ?>"> <?php echo e($cat->name); ?> </a>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <hr>
                  <?php $__currentLoopData = \App\Cat::where('parent_id',546)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($cat->icon != null): ?>
                  <a class="tag-cat" href="<?php echo e(url('tags/'.$cat->id)); ?>"> <i class="<?php echo e($cat->icon); ?>"></i> </a>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

               </div>
            </div>
         </div>
         <hr>
         <div class="part_i spec-links">
            <div class="links am-edit">
               <ul>
                  <?php $__currentLoopData = \App\Cat::where('parent_id',2)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <a title="<?php echo e($cat->name); ?>" href="<?php echo e(url('tags/'.$cat->id)); ?>" class="tagTab"> <?php echo e($cat->name); ?>  </a> 
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true" ></script>
<?php echo HTML::script('public\admin\global\plugins\gmaps\gmaps.js'); ?>

<script type="text/javascript">
   setInterval(function(){ $('.refresh-btn').fadeIn(200); }, 60000);
   
   
   
   
   
   
   
   $('#brand').on('change', function () {
       $('#marka').fadeIn();
   });
   
   $('#marka').on('change', function () {
       $('#model').fadeIn();
   });
   
   
   
   
   
     $(document).on('change' , '#selectedMobileCat' , function(){
       var selectedCat = $('#selectedMobileCat').val();
       
       $.ajax({
                     
              url:"<?php echo e(route('getSubCat')); ?>",
              type:"POST",
              data: {
                  selectedCat: selectedCat,
                   _token: '<?php echo csrf_token(); ?>',
               },
             
              success:function (data) {
                   $('#subCatMobile').empty('hidden');
                   $('#subCatMobile').removeClass('hidden');
                   $('#subCatMobile').append('<option value="">إختر القسم الفرعى</option>');

                   $.each(data,function(index,cat){
                       $('#subCatMobile').append('<option value="'+cat.name+'">'+cat.name+'</option>');
                   })
              }
          });            
   });
   
   
   
   // AutoComplate
   
   $(document).on('click', ".relatedTags li a",function (e){
       e.preventDefault();
       
       var data = $(this).data('area'); 
   
       var id = $(this).data('area');
   
       $.ajax({
           method : "GET",
           url : "<?php echo e(route('getcountry')); ?>",
           data : {
             "id" : id,
           },
           success : function (data) {
               
               $('html, body').animate({scrollTop: '30px'}, 200); // For Go The Top page before load the data 
               $('.adsx').empty().append(data);
           }
       })
       
       
   });
   
   $(document).on('change', ".area-change",function ()
   {
   
       var id = $(this).val();
   
   
       $.ajax({
           method : "GET",
           url : "<?php echo e(route('getcountry')); ?>",
           data : {
             "id" : id,
           },
           success : function (data) {
               $('.adsx').empty().append(data);
           }
       })
   });
   
   
   
   
    $(document).ready(function() {
   
   
       $('.filter-btn-tab').on('click', function () {
           $(this).toggleClass('active');
           $('.filter-btn-when-click').toggleClass('show');
   
       });
       $('.area-box .filter-btn').on('click', function () {
           $('.filter-btn-when-click').removeClass('show');
       });
   
   
       $('.filter-btn-when-click a').on('click', function(e) {
           
           e.preventDefault();
   
           $(this).toggleClass('active');
   
       });
   
   
       $('.search-btn').on('click', function() {
           $('.search-box-when-click').addClass('show');
       })
    
       $('.search-box-when-click .close-search').on('click', function() {
   
           $('.search-box-when-click').removeClass('show');
   
       });
   
   
   
       $( "#search" ).autocomplete({
   
   
   
           source: function(request, response) {
   
               $.ajax({
   
               url: "<?php echo e(url('autocomplete')); ?>",
   
               data: {
   
                       term : request.term
   
                },
   
               dataType: "json",
   
               success: function(data){
   
                  response($.map(data,function(item){
   
                       //console.log(obj.city_name);
   
                        return {
   
                   url: "ads/" + item.id,
   
                   value: item.title
   
               }
   
                       
   
                  }));
   
    
   
               //   return(resp);
   
               },
   
               
   
               
   
           });
   
       },
   
       
   
           select: function( event, ui ) {
   
         window.location.href = ui.item.url;
   
       },
   
       minLength: 1
   
    });
   
   });
   
    
   
    
   
   $(document).on("click","#serachBar",function(e) {
   
       //e.preventDefault();
      // alert($('.searchBox').val());
   
       if($('.searchBox').val() == ''){
   
           // alert($('.searchBox').val());
   
           var searchWord = 'empty';
   
           toastr.options.timeOut = '6000';
   
           toastr.options.positionClass = 'toast-bottom-left';
   
           Command: toastr["error"]("برجاء إختيار ماركة أو نوع السيارة")
   
       } else {
   
           searchWord = $('.searchBox').val();
   
       }
   
       url2 = "<?php echo e(url('tags')); ?>/"+searchWord;
   
       $.post(url2, function (data) {
   
           //success data
   
           if(data.html != ''){
   
               $(".adsx").empty();
   
               $(".adsx").append(data.html);
   
           }else{
   
               $(".adsx").empty();
   
               $(".adsx").append('<div class="alert"><center> لا توجد نتائج مطابقه لبحثك </center></div>');
   
           }
   
       });
   
       window.history.pushState('obj', 'newtitle', url2);
   
   });
   
   
   
   
   
   
   
   $("#markaCopy").hide();
   
   $("#model option").hide();
   
   $(document).on("change","#brand",function() {
   
       // console.log($('#brand').val());
   
       var parent_id = $('#brand').val();
   
       $('#marka option').hide();
   
       $('#marka').show();
   
       $('#model').show();
   
       if($('.'+parent_id).length > 0 && $('#brand').val()  ){
   
           $('.'+parent_id).show();
   
       }else {
   
           $('#marka').hide();
   
           $('#model').hide();
   
       }
   
       // var value=$(this).val();
   
       // $("#model").val('#');
   
       // $("#marka").html(' ');
   
       // $('#marka').append('<option disabled selected>أختر نوع السياره</option>');
   
       // $("#marka").val('#');
   
       // $('#marka').append($("#markaCopy option[data-parent=" + value + "]"));
   
   });
   
   $(document).on("change","#marka",function() {
   
       $("#model option").show();
   
   });
   
   
   
   $(document).on("click","#carDropSearch",function(e) {
      // alert('test');
   
       e.preventDefault();
       $("#cities").val('#');
       if($('#marka').val() == null){
           var searchWord = $('#brand option:selected').val();
       } else if ($('#brand').val() == null) {
           searchWord = 1;
       } else {
           searchWord = $('#marka option:selected').val();
       }
       if($('#model').val() != '/544'){
           url = "<?php echo e(url('tags')); ?>/"+searchWord+"_"+$('#model').val();
           window.location.replace(url);
       }else{
           url = "<?php echo e(url('tags')); ?>/"+searchWord;
           window.location.replace(url);
       }
       $.get(url, function (data) {
           console.log(data);
           //success data
           if(data.html != ''){
               $(".adsx").empty();
               $(".adsx").append(data.html);
           }else{
               $(".adsx").empty();
               $(".adsx").append('<div class="alert"><center> لا توجد نتائج  لبحثك </center></div>');
           }
   
       });
   
       window.history.pushState('obj', 'newtitle', url);
   
   });
   
   
   
   $(document).on("change","#cities",function(e) {
   
       e.preventDefault();
   
   
   
       if($(this).val() == null){
   
           $('#all-cities').hide();
   
           $('#my-city').show();
   
       }else{
   
           $('#all-cities').show();
   
           $('#my-city').hide();
   
       }
   
   
   
       path=window.location.href;
   
       mypath=localStorage.getItem('mylinkid');
   
       pathname = window.location.pathname;
   
   
   
       if($('.tagTab ').hasClass('active')){
   
           url = mypath+","+$('#cities option:selected').html();
   
       }else{
   
           url ="<?php echo e(Request::root()); ?>"+"/city/"+$('#cities option:selected').html();
   
       }
   
   
   
       $.get(url, function (data) {
   
           //success data
   
           if(data.html != ''){
   
               $(".adsx").empty();
   
               $(".adsx").append(data.html);
   
           }else{
   
               $(".adsx").empty();
   
               $(".adsx").append('<div class="alert"><center> لا توجد نتائج مطابقه لبحثك </center></div>');
   
           }
   
       });
   
       window.history.pushState('obj', 'newtitle', url);
   
   });
   
   
   
   //===================================================================
   
   //======================== Show main cat ============================
   
   
    
   
       $(document).on('click','.nestedLevel1 .mainCat', function (e) {
   
           e.preventDefault();
   
           $('.nestedLevel2').parent('.nestedTabs').removeClass('hidden');
   
           $("#cities").val('#');
   
           var id = $(this).find('a').data('id'),
   
           url = "<?php echo e(url('getIndexCatAjaX')); ?>/"+id,
   
           page = 1;
   
           $('.mainCat').find('a').removeClass('active');
   
           $(this).find('a').addClass('active');
   
           if(id != 1){
   
               $('.modelCat').hide();
   
           }else{
   
               $('.modelCat').show();
   
           }
   
           $.get(url, function (data) {
   
               //success data
   
               $(".subCat").empty();
   
               $(".subCat").append(data.html);
   
           });
   
   
   
           url2 = "<?php echo e(url('tags')); ?>/"+id;
   
           $.get(url2, function (data2) {
   
               //success data
   
               if(data2.html != ''){
   
                   $(".adsx").empty();
   
                   $(".adsx").append(data2.html);
   
               }else{
   
                   $(".adsx").empty();
   
                   $(".adsx").append('<div class="alert"><center> لا توجد نتائج مطابقه لبحثك </center></div>');
   
               }
   
           });
   
           window.history.pushState('obj', 'newtitle', url2);
   
           localStorage.setItem('mylinkid', id);
   
       });
   
   
       $(document).on('click','.mainCat2', function (e) {
   
           e.preventDefault();
   
           $('.nestedLevel2').parent('.nestedTabs').removeClass('hidden');
   
           $("#cities").val('#');
   
           var id = $(this).find('a').data('id'),
   
           url = "<?php echo e(url('getIndexCatAjaX')); ?>/"+id,
   
           page = 1;
   
           $('.mainCat').find('a').removeClass('active');
   
           $(this).find('a').addClass('active');
           $('.tag_id_'+id).addClass('active');
   
           if(id != 1){
   
               $('.modelCat').hide();
   
           }else{
   
               $('.modelCat').show();
   
           }
   
           $.get(url, function (data) {
   
               //success data
   
               $(".subCat").empty();
   
               $(".subCat").append(data.html);
   
           });
   
   
   
           url2 = "<?php echo e(url('tags')); ?>/"+id;
   
           $.get(url2, function (data2) {
   
               //success data
   
               if(data2.html != ''){
   
                   $(".adsx").empty();
   
                   $(".adsx").append(data2.html);
   
               }else{
   
                   $(".adsx").empty();
   
                   $(".adsx").append('<div class="alert"><center> لا توجد نتائج مطابقه لبحثك </center></div>');
   
               }
   
           });
   
           window.history.pushState('obj', 'newtitle', url2);
   
           localStorage.setItem('mylinkid', id);
   
       });
   
   
   if("<?php echo e(in_array('tags',Request::segments())); ?>"){
   
       $('.mainCat').each(function(e){
   
           if($(this).find('a').data('id') == "<?php echo e(Request::segments() ? Request::segments()[1] : ''); ?>"){
   
               // $(this).click();
   
               $(this).find('a').addClass('active');
   
           }
   
       });
  
   
   }
   
   
   
   $(document).on('click','.subCat .carModel', function (e) {
   
       e.preventDefault();
   
           $('.nestedLevel3').parent('.nestedTabs').removeClass('hidden');
   
       $("#cities").val('#');
   
       var id = $(this).find('a').data('id'),
   
       url = "<?php echo e(url('getIndexCatAjaX')); ?>/"+id,
   
       searchTags = $(this).find('a').data('id');
   
       $('.carModel').find('a').removeClass('active');
   
       $(this).find('a').addClass('active');
   
       $.get(url, function (data) {
   
           //success data
   
           $(".modelCat").empty();
   
           $(".modelCat").append(data.html);
   
       });
   
       url2 = "<?php echo e(url('tags')); ?>/"+searchTags;
   
       $.get(url2, function (data2) {
   
           //success data
   
           if(data2.html != ''){
   
               $(".adsx").empty();
   
               $(".adsx").append(data2.html);
   
           }else{
   
               $(".adsx").empty();
   
               $(".adsx").append('<div class="alert"><center> لا توجد نتائج مطابقه لبحثك </center></div>');
   
           }
   
       });
   
       localStorage.setItem('mylinkid', searchTags);
   
       window.history.pushState('obj', 'newtitle', url2);
   
   });
   
   
   
   $(document).on('click','.modelCat .carModel', function (e) {
   
       e.preventDefault();
   
       $("#cities").val('#');
   
       var searchTags = $(this).find('a').text(),
   
       url = "<?php echo e(url('tags')); ?>/"+searchTags;
   
       $('.modelCat .carModel').find('a').removeClass('active');
   
       $(this).find('a').addClass('active');
   
       $.get(url, function (data) {
   
           //success data
   
           if(data.html != ''){
   
               $(".adsx").empty();
   
               $(".adsx").append(data.html);
   
           }else{
   
               $(".adsx").empty();
   
               $(".adsx").append('<div class="alert"><center> لا توجد نتائج مطابقه لبحثك </center></div>');
   
           }
   
       });
   
       window.history.pushState('obj', 'newtitle', url);
   
       localStorage.setItem('mylinkid', searchTags);
   
   });
   
   
   
   //====================================================================================
   
   
   
   
   
   // ================= load More =======================================================
   
   
   
   var page = 1;
   
   
   
   $(document).on("click",".mainCat,.modelCat .carModel,.subCat .carModel,#carDropSearch",function() {
   
       var page = 1;
   
       window.page=page;
   
       // $('#load-more').show();
   
       $('#lodingGif').hide();
   
   });
   
   
   
   $(document).on("click","#load-more",function() {
   
      page=page+1;
   
      loadMoreData(page);
      
      $(this).addClass('clicked');
   
   });
   
   
       $(window).scroll(function() {
       
      if( $(window).scrollTop() > $('#load-more').offset().top - 50  && $('.clicked').length ) {
         page=page+1;
   
      loadMoreData(page);
      }
   });
   
   
   
   
   
   
   function loadMoreData(page){
   
       $.ajax({
   
           url: '?page=' + page,
   
           type: "get",
   
           beforeSend: function(){
   
               // $('#load-more').hide();
   
               $('#lodingGif').show();
   
           }
   
       }).done(function(data){
   
           if(data.html == ""){
   
               $('#load-more').hide();
   
               $('.ajax-load').html('<div class="alert"><center> لا توجد نتائج أخرى </center></div>');
   
               $('.ajax-load').show();
   
               return;
   
           }
   
           // $('#load-more').show();
   
           $('#lodingGif').hide();
   
           $(".adsx").append(data.html);
   
       }).fail(function(jqXHR, ajaxOptions, thrownError){
   
           alert('server not responding...');
   
       });
   
   
   
       // $('.ajax-load').empty();
   
       // $('.ajax-load').append('<img src="<?php echo e(Request::root()); ?>/public/upload/logo/loading.gif" height="25" width="25">');
   
   }
   
   $(document).ready(function(){
   
       <?php if(in_array('city',Request::segments())): ?>
           $('#all-cities').show();
           $('#my-city').hide();
       <?php endif; ?>
   });
   
   $(document).on('click', '#my-city', function(e) {
   
       e.preventDefault();
   
       GMaps.geolocate({
   
           success: function(position) {
   
               // alert(position.coords.latitude + ' <-> ' + position.coords.longitude);
   
               var url = "<?php echo e(url('getCityName')); ?>",
   
               token = $('input[name=_token]').val();
   
               $.post(url, { _token: token, lat: position.coords.latitude, lng: position.coords.longitude }, function(data) {
   
                   url = "<?php echo e(url('city')); ?>/"+data;
   
                   location.href = url;
   
               });
   
           },
   
           error: function(error) {
   
               alert('حدث خطأ فى تحديد مدينتك: ' + error.message);
   
           },
   
           not_supported: function() {
   
               alert("متصفحك لا يدعم تحديد المدينة");
   
           } //,
   
           // always: function() {
   
           //     alert("Done!");
   
           // }
   
       });
   
   });
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   $(document).ready(function ()
   
   {
   
       var id          = 125,
   
           nextLevel   = ( $(this).data('level') == 'country' )? ".area-change[data-level=city]": ".area-change[data-level=location]",
   
           nextMsg     = ( $(this).data('level') == 'country' )? 'كل المدن': 'كل الأحياء';
   
       $.ajax({
   
           method: "GET",
   
           type:   "json",
   
           url:    "<?php echo e(route('get-child')); ?>",
   
           data:   { id:125 },
   
           success: function (response) {
   
               //console.log(response);
   
               if (response.status)
   
               {
   
                   $(nextLevel).empty().show().append('<option value="">'+ nextMsg +'</option>');
   
                   
   
                   $.each( response.result, function (key, value){
   
                       $(nextLevel).append('<option value="' + value.id + '">' + value.name + '</option>');
   
                   });
   
               }
   
               else {
   
                   console.log(response);
   
               }
   
           }
   
       });
   
   });
   
   
   
   
   
   
   
   $(document).on('change', ".area-change:not(.area-change[data-level=country])",function ()
   
   {
   
       var id          = $(this).val(),
   
           upLevel     = ( $(this).data('level') == 'location' )? ".area-change[data-level=city]": ".area-change[data-level=country]",
   
           nextLevel   = ( $(this).data('level') == 'city' )? ".area-change[data-level=location]": false;
   
           
   
       if( id != "" ) return;
   
   
   
       if(nextLevel){ $(nextLevel).hide(); }
   
       $(upLevel).trigger('change');
   
   });
   
   
   
   
   // get the new added data
   $(document).on('click' , '.oldItems', function () {
       $(this).addClass('active');
       $('.newItems').removeClass('active');
       $.ajax({
           method : "GET",
           url : "<?php echo e(route('getOldPosts')); ?>",
           success : function (data) {
               $('.adsx').empty().append(data);
           }
       })
   });
   
   // get the new added data
   $(document).on('click' , '.newItems', function () {
       
       $(this).addClass('active');
       $('.oldItems').removeClass('active');
       
       $.ajax({
           method : "GET",
           url : "<?php echo e(route('getLatestPosts')); ?>",
           success : function (data) {
               $('.adsx').empty().append(data);
           }
       })
   });
   
   
   // search side Menu
   
   
   
   
       
       
       
       
   
       
           
           
           
               
               
               
           
           
               
           
       
   
   
   
   
   
   // start center filter
   
   
   // get data based on change in city 
   $(document).on('change' , '#cities', function () {
       $('#timeFilter').removeClass('hidden');
       var area_id = $('#cities').val();
       var timeFilter = $('.timeSelect option:selected').val();
       var cat_id = $('ul#momId0').find('a.active').data('id');
       
       $.ajax({
           method : "POST",
           data : {
               area_id : area_id,
               cat_id : cat_id,
               timeFilter : timeFilter,
               _token: '<?php echo csrf_token(); ?>',
           },
           url : "<?php echo e(route('getPostByCity')); ?>",
           success : function (data) {
               console.log(data);
                if(data != ''){
       
                   $(".adsx").empty();
       
                   $(".adsx").append(data);
       
               }else{
       
                   $(".adsx").empty();
       
                   $(".adsx").append('<div class="alert"><center> لا توجد نتائج مطابقه لبحثك </center></div>');
   
                   }
              
           }
       })
   });
   
   // get data filtered with time
   
   $(document).on('change' , '.timeSelect', function () {
       var timeFilter = $('.timeSelect option:selected').val();
       console.log(timeFilter);
       var area_id = $('#cities').val();
      
       var cat_id = $('#Category_id').data('value');
       $.ajax({
           method : "POST",
           data : {
               area : area_id,
               date:timeFilter,
               cat_id : cat_id,
               _token: '<?php echo csrf_token(); ?>',
           },
           url : "<?php echo e(route('searchByCityAndTime')); ?>",
           success : function (data) {
               $(".adsx").empty();
               $('.adsx').empty().append(data);
              
           }
       })
   });
   
   
   // end center filter
   
   
   
   // start search right menu
   
       // filter right menu
   
   $(document).on('change' , '#selectedCat' , function(){
       var selectedCat = $('#selectedCat').val();
       
       $.ajax({
                     
              url:"<?php echo e(route('getSubCat')); ?>",
              type:"POST",
              data: {
                  selectedCat: selectedCat,
                   _token: '<?php echo csrf_token(); ?>',
               },
             
              success:function (data) {
                   $('#subCat').empty('hidden');
                   $('#subCat').removeClass('hidden');

                   $('#subCat').append('<option value="all">الكل</option>');
                   $.each(data,function(index,cat){
                       $('#subCat').append('<option value="'+cat.name+'">'+cat.name+'</option>');
                   })
              }
          });            
   });
   
   $(document).on('change' , '#subCat' , function() {
       var selectedCat = $('#selectedCat').val();
       var subCat = $('#subCat').val();
       
       if($('#selectedCat').val() != 1){
           $('#allCities').removeClass('hidden');
           $('#allYears').addClass('hidden');
           
       }
       if($('#selectedCat').val() == 1){
           $('#allYears').removeClass('hidden');
           $('#allCities').addClass('hidden');
            
       }
       
      
   });
   $(document).on('change' , '#selectedCat' , function() {
       var selectedCat = $('#selectedCat').val();
       var subCat = $('#subCat').val();
       var city = $('#allCities').val();
       var year = $('#allYears').val();
       $('#subCat').addClass('hidden');
       $('#allCities').addClass('hidden');
       
        $.ajax({
                     
              url:"<?php echo e(url('/')); ?>",
              type:"POST",
              data: {
                    tags: selectedCat,
                   
                   
                   _token: '<?php echo csrf_token(); ?>',
               },
             
              success:function (data) {
                   if(data != ''){
       
                   $(".adsx").empty();
       
                   $(".adsx").append(data);
       
               }else{
       
                   $(".adsx").empty();
       
                   $(".adsx").append('<div class="alert"><center> لا توجد نتائج مطابقه لبحثك </center></div>');
   
                   }
              }
          }); 
       
   });
   
   
   
   $(document).on('change' , '#allYears' , function() {
       var selectedCat = $('#selectedCat').val();
       var subCat = $('#subCat').val();
       var city = $('#allCities').val();
       var year = $('#allYears').val();
       $('#subCat').addClass('hidden');
       $('#allYears').addClass('hidden');
       
        $.ajax({
                     
              url:"<?php echo e(route('rightMenuSearch')); ?>",
              type:"POST",
              data: {
                    selectedCat: selectedCat,
                    subCat : subCat,
                    city : city,
                    year : year,
                   _token: '<?php echo csrf_token(); ?>',
               },
             
              success:function (data) {
                   if(data != ''){
       
                   $(".adsx").empty();
       
                   $(".adsx").append(data);
       
               }else{
       
                   $(".adsx").empty();
       
                   $(".adsx").append('<div class="alert"><center> لا توجد نتائج مطابقه لبحثك </center></div>');
   
                   }
              }
          }); 
       
   })
   
   // end right menu
   
   
   
</script>
<?php echo HTML::script('public/website/js/owl.carousel.min.js'); ?>

<script>
   $(".client-slider").owlCarousel({
   
       navigation: true,
   
       slideSpeed: 200,
   
       responsive: true,
   
       autoPlay: 4000,
   
       items: 3,
   
       mouseDrag: true,
   
       pagination: false,
   
       itemsCustom: [
   
           [0, 1],
   
           [450, 2],
   
           [600, 3],
   
           [700, 3],
   
           [800, 3],
   
           [1000, 3],
   
           [1200, 3],
   
           [1400, 4],
   
           [1600, 5]
   
       ],
   
       navigationText: ["<span class='slider-left'><i class='fa fa-angle-left'></i></span>", "<span class='slider-right'><i class='fa fa-angle-right'></i></span>"]
   
   });
   
</script>

   
   
       
   
           
   
           
   
       
   
   
   
   
   
       
   
   
   
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/workox0x/public_html/haraj/resources/views/welcome.blade.php ENDPATH**/ ?>