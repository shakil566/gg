<!-- Begin Header Area -->
<header>
    <!-- Begin Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-3 col-md-4">
                    <div class="header-top-left">
                        <ul class="phone-wrap">
                            <li><span><?php echo app('translator')->get('english.HOTLINE'); ?>: </span><a href="#">123456</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top Left Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-9 col-md-8">
                    <div class="header-top-right">

                        <ul class="ht-menu">
                            <!-- Begin Setting Area -->
                            <li><a class="" href="<?php echo e(url('/admin')); ?>"><?php echo app('translator')->get('english.ADMIN'); ?></a></li>

                            <li class="megamenu-holder top-nav-login"><a href="">Setting</a>
                                <ul class="megamenu hb-megamenu ">
                                    <li>
                                        <ul>
                                            <?php if(auth()->guard()->guest()): ?>
                                            <?php if(Route::has('login')): ?>
                                                <li class="">
                                                    <a class="" href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('english.LOGIN'); ?></a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if(Route::has('register')): ?>
                                                <li class="">
                                                    <a class="" href="<?php echo e(route('register')); ?>"><?php echo app('translator')->get('english.REGISTRATION'); ?></a>
                                                </li>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <li class="">
                                                <a class="" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                                    <?php echo e(Auth::user()->first_name . ' ' . Auth::user()->last_name); ?>

                                                </a>


                                            </li>
                                            <li class="">
                                                <a class="" href="<?php echo e(route('logout')); ?>"
                                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    <?php echo e(__('Logout')); ?>

                                                </a>

                                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                                    class="d-none">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                            </li>
                                        <?php endif; ?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            

                            <!-- Setting Area End Here -->

                            <!-- Begin Language Area -->
                            
                            <!-- Language Area End Here -->
                        </ul>
                    </div>
                </div>
                <!-- Header Top Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="<?php echo e(url('/')); ?>">
                            <img class="home-logo" src="<?php echo e(asset('public/')); ?>/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <!-- Begin Header Middle Searchbox Area -->
                    <form action="#" class="hm-searchbox">
                        
                        <input type="text" placeholder="Enter your search key ...">
                        <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            <li class="hm-wishlist">
                                <a href="<?php echo e(url('wishlist')); ?>">
                                    <span class="cart-item-count wishlist-item-count">0</span>
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            </li>
                            <!-- Header Middle Wishlist Area End Here -->
                            <!-- Begin Header Mini Cart Area -->
                            <li class="hm-minicart">
                                <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                    <span class="item-text">£80.00
                                        <span class="cart-item-count">2</span>
                                    </span>
                                </div>
                                <span></span>
                                <div class="minicart">
                                    <ul class="minicart-product-list">
                                        <li>
                                            <a href="<?php echo e(url('single-product')); ?>" class="minicart-product-image">
                                                <img src="<?php echo e(asset('public/frontend')); ?>/images/product/small-size/5.jpg"
                                                    alt="cart products">
                                            </a>
                                            <div class="minicart-product-details">
                                                <h6><a href="<?php echo e(url('single-product')); ?>">Aenean eu tristique</a></h6>
                                                <span>£40 x 1</span>
                                            </div>
                                            <button class="close" title="Remove">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(url('single-product')); ?>" class="minicart-product-image">
                                                <img src="<?php echo e(asset('public/frontend')); ?>/images/product/small-size/6.jpg"
                                                    alt="cart products">
                                            </a>
                                            <div class="minicart-product-details">
                                                <h6><a href="<?php echo e(url('single-product')); ?>">Aenean eu tristique</a></h6>
                                                <span>£40 x 1</span>
                                            </div>
                                            <button class="close" title="Remove">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </li>
                                    </ul>
                                    <p class="minicart-total">SUBTOTAL: <span>£80.00</span></p>
                                    <div class="minicart-button">
                                        <a href="<?php echo e(url('shopping-cart')); ?>"
                                            class="li-button li-button-fullwidth li-button-dark">
                                            <span>View Full Cart</span>
                                        </a>
                                        <a href="<?php echo e(url('checkout')); ?>" class="li-button li-button-fullwidth">
                                            <span>Checkout</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- Header Mini Cart Area End Here -->
                        </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Header Bottom Menu Area -->
                    <div class="hb-menu">
                        <nav>
                            <ul>
                                <li class="dropdown-holder"><a href="<?php echo e(url('/')); ?>"><?php echo app('translator')->get('HOME'); ?></a>
                                </li>
                                <li class="megamenu-holder"><a href=""><?php echo app('translator')->get('english.CATEGORY'); ?></a>
                                    <ul class="megamenu hb-megamenu">
                                        <li><a href="<?php echo e(url('shop-left-sidebar')); ?>"><?php echo app('translator')->get('english.CATEGORY_DETAILS'); ?></a>
                                            <ul>
                                                <li><a href="#">Fashion</a></li>
                                                <li><a href="#">Gadgets</a></li>
                                                <li><a href="#">Hardware</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="megamenu-holder"><a href=""><?php echo app('translator')->get('english.BRAND'); ?></a>
                                    <ul class="megamenu hb-megamenu">
                                        <li><a href="<?php echo e(url('shop-left-sidebar')); ?>"><?php echo app('translator')->get('english.BRAND_DETAILS'); ?></a>
                                            <ul>
                                                <li><a href="#">HP</a></li>
                                                <li><a href="#">ASUS</a></li>
                                                <li><a href="#">Acer</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li class="megamenu-static-holder"><a href="#"><?php echo app('translator')->get('english.BLOGS'); ?></a>
                                    <ul class="megamenu hb-megamenu">
                                        <li><a href="<?php echo e(url('blog-details')); ?>"><?php echo app('translator')->get('english.BLOGS_DETAILS'); ?></a>
                                            <ul>
                                                <li><a href="#">Today's Blog</a></li>
                                                <li><a href="#">Carnival 1</a></li>
                                                <li><a href="#">Carnival 2</a></li>
                                                <li><a href="#">Carnival 3</a></li>
                                                <li><a href="#">Carnival 4</a></li>
                                                <li><a href="#">Carnival 5</a></li>
                                                <li><a href="#">Carnival 6</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo e(url('blog-details')); ?>"><?php echo app('translator')->get('english.BLOGS_DETAILS'); ?></a>
                                            <ul>
                                                <li><a href="#">Today's Blog</a></li>
                                                <li><a href="#">Carnival 1</a></li>
                                                <li><a href="#">Carnival 2</a></li>
                                                <li><a href="#">Carnival 3</a></li>
                                                <li><a href="#">Carnival 4</a></li>
                                                <li><a href="#">Carnival 5</a></li>
                                                <li><a href="#">Carnival 6</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo e(url('blog-details')); ?>"><?php echo app('translator')->get('english.BLOGS_DETAILS'); ?></a>
                                            <ul>
                                                <li><a href="#">Today's Blog</a></li>
                                                <li><a href="#">Carnival 1</a></li>
                                                <li><a href="#">Carnival 2</a></li>
                                                <li><a href="#">Carnival 3</a></li>
                                                <li><a href="#">Carnival 4</a></li>
                                                <li><a href="#">Carnival 5</a></li>
                                                <li><a href="#">Carnival 6</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo e(url('blog-details')); ?>"><?php echo app('translator')->get('english.BLOGS_DETAILS'); ?></a>
                                            <ul>
                                                <li><a href="#">Today's Blog</a></li>
                                                <li><a href="#">Carnival 1</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li><a href="<?php echo e(url('about-us')); ?>">About Us</a></li>
                                <li><a href="<?php echo e(url('contact')); ?>">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Bottom Menu Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Area End Here -->
    <!-- Begin Mobile Menu Area -->
    <div class="mobile-menu-area d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End Here -->
</header>
<!-- Header Area End Here -->
<?php /**PATH E:\xampp_8\htdocs\test\resources\views/layouts/frontend/header.blade.php ENDPATH**/ ?>