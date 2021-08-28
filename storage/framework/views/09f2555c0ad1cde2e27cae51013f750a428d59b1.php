<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed hidden-sm hidden-xs" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            
                <li class="nav-item start <?php echo e(setActive(['admincp'])); ?>">
                    <a href="<?php echo e(url('admincp')); ?>" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">رئيسية لوحة التحكم</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(setActiveOne('settings')); ?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">إعدادات الموقع</span>
                        <span class="arrow"></span>
                        <span class="selected"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item start <?php echo e(setActive(['admincp','settings'])); ?>">
                            <a href="<?php echo e(url('admincp/settings')); ?>" class="nav-link ">
                                <i class="icon-settings"></i>
                                <span class="title">الإعدادت الرئيسية </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(setActive(['admincp','settings','waterMark'])); ?>">
                            <a href="<?php echo e(url('admincp/settings/waterMark')); ?>" class="nav-link ">
                                <i class="icon-graph"></i>
                                <span class="title">إعدادت العلامه المائيه</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php echo e(setActiveOne('contacts')); ?>">
                    <a href="<?php echo e(url('admincp/contacts')); ?>" class="nav-link nav-toggle">
                        <i class="fa fa-envelope-o"></i>
                        <span class="title">الرسائل والطلبات</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(setActiveOne('transfers')); ?>">
                    <a href="<?php echo e(url('admincp/transfers')); ?>" class="nav-link nav-toggle">
                        <i class="fa fa-money"></i>
                        <span class="title">التحويلات البنكية</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(setActiveOne('messages')); ?>">
                    <a href="<?php echo e(url('admincp/messages')); ?>" class="nav-link nav-toggle">
                        <i class="fa fa-envelope"></i>
                        <span class="title">رسائل الأعضاء</span>
                        <span class="selected"></span>
                    </a>
                </li>
            
                
                    
                    
                    
                
            
                <li class="nav-item <?php echo e(setActiveOne('users')); ?> <?php echo e(setActiveOne('vimShow')); ?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-users"></i>
                        <span class="title">التحكم بالأعضاء</span>
                        <span class="arrow"></span>
                        <span class="selected"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item start <?php echo e(setActive(['admincp','users','admins'])); ?>">
                            <a href="<?php echo e(url('admincp/users/admins')); ?>" class="nav-link ">
                                <i class="fa fa-user-secret"></i>
                                <span class="title">المديرين </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(setActive(['admincp','users'])); ?>">
                            <a href="<?php echo e(url('admincp/users')); ?>" class="nav-link ">
                                <i class="icon-users"></i>
                                <span class="title">الأعضاء</span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(setActive(['admincp','users','forbidden'])); ?>">
                            <a href="<?php echo e(url('admincp/users/forbidden')); ?>" class="nav-link ">
                                <i class="fa fa-user-times"></i>
                                <span class="title">الأعضاء المحظورين</span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(setActive(['admincp','users','blocked'])); ?>">
                            <a href="<?php echo e(url('admincp/users/blocked')); ?>" class="nav-link ">
                                <i class="fa fa-user-times"></i>
                                <span class="title">القائمة السوداء</span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(setActiveOne('vimShow')); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">الأعضاء المميزين</span>
                                <span class="arrow"></span>
                                <span class="selected"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start <?php echo e(setActive(['admincp','vimShow','1'])); ?>">
                                    <a href="<?php echo e(url('admincp/vimShow/1')); ?>" class="nav-link ">
                                        <i class="fa fa-user-secret"></i>
                                        <span class="title">معارض السيارات 6 شهور </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(setActive(['admincp','vimShow','2'])); ?>">
                                    <a href="<?php echo e(url('admincp/vimShow/2')); ?>" class="nav-link ">
                                        <i class="icon-users"></i>
                                        <span class="title">معرض السيارات سنه</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(setActive(['admincp','vimShow','3'])); ?>">
                                    <a href="<?php echo e(url('admincp/vimShow/3')); ?>" class="nav-link ">
                                        <i class="fa fa-user-times"></i>
                                        <span class="title">الخدمات المكرره</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php echo e(setActiveOne('posts')); ?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-buysellads"></i>
                        <span class="title">التحكم بالإعلانات</span>
                        <span class="arrow"></span>
                        <span class="selected"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item start <?php echo e(setActive(['admincp','posts'])); ?>">
                            <a href="<?php echo e(url('admincp/posts')); ?>" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">عرض الإعلانات</span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(setActive(['admincp','posts','blocked'])); ?>">
                            <a href="<?php echo e(url('admincp/posts/blocked')); ?>" class="nav-link ">
                                <i class="fa fa-ban"></i>
                                <span class="title">الإعلانات المحذوفة</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php echo e(setActiveOne('cmnts')); ?>">
                    <a href="<?php echo e(url('admincp/cmnts')); ?>" class="nav-link nav-toggle">
                        <i class="fa fa-comments-o"></i>
                        <span class="title">تعليقات الأعضاء</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <!--<li class="nav-item <?php echo e(setActiveOne('commission')); ?>">-->
                <!--    <a href="<?php echo e(url('admincp/commission')); ?>" class="nav-link nav-toggle">-->
                <!--        <i class="fa fa-comments-o"></i>-->
                <!--        <span class="title">العمولة</span>-->
                <!--        <span class="selected"></span>-->
                <!--    </a>-->
                <!--</li>-->
                <li class="nav-item <?php echo e(setActiveOne('cats')); ?>">
                    <a href="<?php echo e(url('admincp/cats')); ?>" class="nav-link nav-toggle">
                        <i class="fa fa-sitemap"></i>
                        <span class="title">التحكم بالاقسام</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item<?php echo e(setActiveOne('ratings')); ?>">
                    <a href="<?php echo e(url('admincp/ratings')); ?>" class="nav-link nav-toggle">
                        <i class="fa fa-star-half-o"></i>
                        <span class="title">تقييمات الأعضاء</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(setActiveOne('pages')); ?>">
                    <a href="<?php echo e(url('admincp/pages')); ?>" class="nav-link nav-toggle">
                        <i class="fa fa-file-code-o"></i>
                        <span class="title">صفحات الموقع</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(setActiveOne('terms')); ?>">
                    <a href="<?php echo e(url('admincp/terms')); ?>" class="nav-link nav-toggle">
                        <i class="fa fa-file-code-o"></i>
                        <span class="title">بنود اتفاقيه دفع عمولة موقع</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(setActiveOne('areas')); ?>">
                    <a href="<?php echo e(url('admincp/areas')); ?>" class="nav-link nav-toggle">
                        <i class="fa fa-flag-o"></i>
                        <span class="title">الدول والمدن</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(setActiveOne('banks')); ?>">
                    <a href="<?php echo e(url('admincp/banks')); ?>" class="nav-link nav-toggle">
                        <i class="fa fa-bank"></i>
                        <span class="title">البنوك</span>
                        <span class="selected"></span>
                    </a>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN RESPONSIVE MENU FOR HORIZONTAL & SIDEBAR MENU -->
                <ul class="page-sidebar-menu visible-sm visible-xs  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                    <!-- DOC: This is mobile version of the horizontal menu. The desktop version is defined(duplicated) in the header above -->
                    <li class="nav-item start <?php echo e(setActive(['admincp'])); ?>">
                        <a href="<?php echo e(url('admincp')); ?>" class="nav-link nav-toggle">
                            <i class="icon-home"></i>
                            <span class="title">رئيسية لوحة التحكم</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo e(setActiveOne('settings')); ?>">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-settings"></i>
                            <span class="title">إعدادات الموقع</span>
                            <span class="arrow"></span>
                            <span class="selected"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start <?php echo e(setActive(['admincp','settings'])); ?>">
                                <a href="<?php echo e(url('admincp/settings')); ?>" class="nav-link ">
                                    <i class="icon-settings"></i>
                                    <span class="title">الإعدادت الرئيسية </span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(setActive(['admincp','settings','waterMark'])); ?>">
                                <a href="<?php echo e(url('admincp/settings/waterMark')); ?>" class="nav-link ">
                                    <i class="icon-graph"></i>
                                    <span class="title">إعدادت العلامه المائيه</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?php echo e(setActiveOne('contacts')); ?>">
                        <a href="<?php echo e(url('admincp/contacts')); ?>" class="nav-link nav-toggle">
                            <i class="fa fa-envelope-o"></i>
                            <span class="title">الرسائل والطلبات</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo e(setActiveOne('transfers')); ?>">
                        <a href="<?php echo e(url('admincp/transfers')); ?>" class="nav-link nav-toggle">
                            <i class="fa fa-money"></i>
                            <span class="title">التحويلات البنكية</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo e(setActiveOne('messages')); ?>">
                        <a href="<?php echo e(url('admincp/messages')); ?>" class="nav-link nav-toggle">
                            <i class="fa fa-envelope"></i>
                            <span class="title">رسائل الأعضاء</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo e(setActiveOne('users')); ?> <?php echo e(setActiveOne('vimShow')); ?>">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-users"></i>
                            <span class="title">التحكم بالأعضاء</span>
                            <span class="arrow"></span>
                            <span class="selected"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start <?php echo e(setActive(['admincp','users','admins'])); ?>">
                                <a href="<?php echo e(url('admincp/users/admins')); ?>" class="nav-link ">
                                    <i class="fa fa-user-secret"></i>
                                    <span class="title">المديرين </span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(setActive(['admincp','users'])); ?>">
                                <a href="<?php echo e(url('admincp/users')); ?>" class="nav-link ">
                                    <i class="icon-users"></i>
                                    <span class="title">الأعضاء</span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(setActive(['admincp','users','forbidden'])); ?>">
                                <a href="<?php echo e(url('admincp/users/forbidden')); ?>" class="nav-link ">
                                    <i class="fa fa-user-times"></i>
                                    <span class="title">الأعضاء المحظورين</span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(setActive(['admincp','users','blocked'])); ?>">
                                <a href="<?php echo e(url('admincp/users/blocked')); ?>" class="nav-link ">
                                    <i class="fa fa-user-times"></i>
                                    <span class="title">القائمة السوداء</span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(setActiveOne('vimShow')); ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-users"></i>
                                    <span class="title">الأعضاء المميزين</span>
                                    <span class="arrow"></span>
                                    <span class="selected"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item start <?php echo e(setActive(['admincp','vimShow','1'])); ?>">
                                        <a href="<?php echo e(url('admincp/vimShow/1')); ?>" class="nav-link ">
                                            <i class="fa fa-user-secret"></i>
                                            <span class="title">معارض السيارات 6 شهور </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(setActive(['admincp','vimShow','2'])); ?>">
                                        <a href="<?php echo e(url('admincp/vimShow/2')); ?>" class="nav-link ">
                                            <i class="icon-users"></i>
                                            <span class="title">معرض السيارات سنه</span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(setActive(['admincp','vimShow','3'])); ?>">
                                        <a href="<?php echo e(url('admincp/vimShow/3')); ?>" class="nav-link ">
                                            <i class="fa fa-user-times"></i>
                                            <span class="title">الخدمات المكرره</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?php echo e(setActiveOne('posts')); ?>">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-buysellads"></i>
                            <span class="title">التحكم بالإعلانات</span>
                            <span class="arrow"></span>
                            <span class="selected"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start <?php echo e(setActive(['admincp','posts'])); ?>">
                                <a href="<?php echo e(url('admincp/posts')); ?>" class="nav-link ">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">عرض الإعلانات</span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(setActive(['admincp','posts','blocked'])); ?>">
                                <a href="<?php echo e(url('admincp/posts/blocked')); ?>" class="nav-link ">
                                    <i class="fa fa-ban"></i>
                                    <span class="title">الإعلانات المحذوفة</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?php echo e(setActiveOne('cmnts')); ?>">
                        <a href="<?php echo e(url('admincp/cmnts')); ?>" class="nav-link nav-toggle">
                            <i class="fa fa-comments-o"></i>
                            <span class="title">تعليقات الأعضاء</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo e(setActiveOne('cats')); ?>">
                        <a href="<?php echo e(url('admincp/cats')); ?>" class="nav-link nav-toggle">
                            <i class="fa fa-sitemap"></i>
                            <span class="title">التحكم بالاقسام</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item<?php echo e(setActiveOne('ratings')); ?>">
                        <a href="<?php echo e(url('admincp/ratings')); ?>" class="nav-link nav-toggle">
                            <i class="fa fa-star-half-o"></i>
                            <span class="title">تقييمات الأعضاء</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo e(setActiveOne('pages')); ?>">
                        <a href="<?php echo e(url('admincp/pages')); ?>" class="nav-link nav-toggle">
                            <i class="fa fa-file-code-o"></i>
                            <span class="title">صفحات الموقع</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo e(setActiveOne('areas')); ?>">
                        <a href="<?php echo e(url('admincp/areas')); ?>" class="nav-link nav-toggle">
                            <i class="fa fa-flag-o"></i>
                            <span class="title">الدول والمدن</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo e(setActiveOne('banks')); ?>">
                        <a href="<?php echo e(url('admincp/banks')); ?>" class="nav-link nav-toggle">
                            <i class="fa fa-bank"></i>
                            <span class="title">البنوك</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
                <!-- END RESPONSIVE MENU FOR HORIZONTAL & SIDEBAR MENU -->
            </div>
        </div>
        <!-- END SIDEBAR -->
    </div><?php /**PATH /home/workox0x/public_html/haraj/resources/views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>