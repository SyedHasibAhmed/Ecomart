<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ecomart</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preload" href="{{ asset('frontend-assets') }}/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('frontend-assets') }}/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('frontend-assets') }}/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('frontend-assets') }}/assets/fonts/wolmart87d5.woff?png09e" as="font" type="font/woff" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-assets') }}/assets/vendor/fontawesome-free/css/all.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-assets') }}/assets/vendor/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-assets') }}/assets/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-assets') }}/assets/vendor/photoswipe/photoswipe.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-assets') }}/assets/vendor/photoswipe/default-skin/default-skin.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/assets/vendor/swiper/swiper-bundle.min.css">

    <!-- Default CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets') }}/plugins/toastr/toastr.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-assets') }}/assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-assets') }}/assets/css/style.min.css">

</head>

<body class="home">

<div class="page-wrapper">
        <!-- Start of Header -->
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">Welcome to Ecomart Store!</p>
                    </div>


                    <div class="header-right">

                        @if(Auth::check())

                        <div class="dropdown">
                                <a href="#">{{ Auth::user()->name }}</a>
                                <div class="dropdown-box">
                                    <ul style="width:200px;">
                                        <a href="{{ route('home') }}">Profile</a>
                                        <a href="{{ route('customer.logout') }}">Logout</a>
                                    </ul>
                                </div>
                            </div>
                        @endif

                        @guest
                        <div style="display: flex; align-items: center;">
                            <div class="dropdown">
                                <a href="#" class="login">
                                <!-- sign in logo -->
                                <i class="w-icon-account">
                                </i>Login</a>
                                <div class="dropdown-box">
                                    <ul style="width:300px; padding:10px;">
                                        <div>
                                            <h5>Login your account</h5>
                                            <form action="{{ route('login') }}" method="post">
                                            @csrf
                                                <div class="form-group">
                                                    <label style="font-size: 14px; margin-bottom: 6px;">Email Address</label>
                                                    <input type="email" class="form-control" name="email" autocomplete="off" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label style="font-size: 14px; margin-bottom: 6px;">Password</label>
                                                    <input type="password" class="form-control" name="password" required="">
                                                </div>
                                                <br>
                                                <div class="form-group" style="display: flex; align-items: center; justify-content: space-between;">
                                                    <button type="submit" class="btn btn-sm btn-info">login</button>
                                                    @if (Route::has('password.request'))
                                                        <a href="{{ route('password.request') }}">Forget yout Password!</a>
                                                    @endif
                                                </div>
                                            </form>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <span class="delimiter d-lg-show" style="margin: 0px 12px;"></span>
                            <a href="{{ route('register') }}" class="ml-0 d-lg-show">Register</a>
                        </div>
                        @endguest
                    </div>

                </div>
            </div>
            <!-- End of Header Top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left mr-md-4">
                        <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                        </a>
                        <a href="{{ url('/') }}" class="logo ml-lg-0">
                            <!-- Ecomart logo icon -->
                            <img src="{{ asset('frontend-assets') }}/assets/images/logo.png" alt="logo" width="144" height="45" />
                        </a>
                        <form action="{{ route('search.product') }}" method="get" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                        @csrf
                            <div class="select-box">
                                <!--All Categories-->
                                <select id="category" name="category">
                                    <option value="ALL" {{ request('category') == "ALL" ? 'selected' : '' }}>All Categories</option>
                                    @php
                                        $category=DB::table('categories')->get();
                                    @endphp
                                    @foreach($category as $row)
                                        <option value="{{ $row->id }}" {{ request('category') == $row->id ? 'selected' : ''}}>{{ $row->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Search bar -->
                            <input type="text" class="form-control" name="search" id="search" placeholder="Search in..." value="{{ request('product') }}" required />
                            <button class="btn btn-search"><i class="w-icon-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="header-right ml-4">
                        <div class="header-call d-xs-show d-lg-flex align-items-center">
                            <!-- call icon -->
                            <a href="tel:#" class="w-icon-call"></a>
                            <div class="call-info d-lg-show">
                                <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                    <a href="mailto:#" class="text-capitalize">Live Chat</a> or :</h4>
                                <a href="tel:+8801749518628" class="phone-number font-weight-bolder ls-50">+8801749518628</a>
                            </div>
                        </div>
                        @php
                            $wishlist=DB::table('wishlists')->where('user_id',Auth::id())->count();
                        @endphp
                        <a class="wishlist label-down link d-xs-show" href="{{ route('wishlist') }}" style="position: relative;">
                            <!-- wishlist icon -->
                            <i class="w-icon-heart">
                                <span class="cart-count" style="position: absolute;
                                width: 1.9rem;
                                height: 1.9rem;
                                border-radius: 50%;
                                font-style: normal;
                                z-index: 1;
                                right: -8px;
                                top: -5px;
                                font-family: Poppins, sans-serif;
                                font-size: 1.1rem;
                                font-weight: 400;
                                line-height: 1.8rem;
                                background: #0066ff;
                                color: #fff;
                                text-align: center;">
                                    {{ $wishlist }}
                                </span>
                            </i>
                            <span class="wishlist-label d-lg-show">Wishlist</span>
                        </a>
                        <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                            <div class="cart-overlay"></div>
                            <a href="" class="cart-toggle label-down link">
                                <!-- card icon -->
                                <i class="w-icon-cart">
                                    <span class="cart-count"><span class="cart_qty"></span>
                                    <!-- blue round with css -->
                                </i>
                                <span class="cart-label">Cart</span>
                                <div class="cart_price" style="margin-top:4px; display: flex;">{{ $setting->currency }}<span class="cart_total" style="margin-left:2px"></span></div>
                            </a>
                            <div class="dropdown-box" style="display: inline-grid;">
                                <div>
                                <div class="cart-header">
                                    <span>Shopping Cart</span>
                                    <a href="#" class="btn-close">Close
                                        <!-- Close icon -->
                                        <i class="w-icon-long-arrow-right"></i></a>
                                </div>

                                <div class="products">
                                    <?php $content=Cart::content(); ?>
                                    @foreach($content as $row)
                                    @php
                                        $product=DB::table('products')->where('id',$row->id)->first();
                                    @endphp
                                    <div class="product product-cart">
                                        <div class="product-detail">
                                            <a href="#" class="product-name">{{ $row->name }}</a>
                                            <div class="price-box">
                                                <span class="product-quantity">{{ $row->qty }}</span>
                                                <span class="product-price">{{ $setting->currency }}{{ $row->price }}</span>
                                            </div>
                                        </div>
                                        <figure class="product-media">
                                            <a href="#">
                                                <!-- image Beige knitted
                                                elas -->
                                                <img src="{{ asset($row->options->thumbnail) }}" alt="product" height="84"
                                                    width="94" />
                                            </a>
                                        </figure>
                                    </div>

                                    @endforeach

                                </div>
                                </div>
                                <div>
                                <!-- <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price">$58.67</span>
                                </div> -->

                                <div class="cart-action">
                                    <a href="{{ route('cart') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                                    <a href="{{ route('checkout') }}" class="btn btn-primary  btn-rounded">Checkout</a>
                                </div>
                                </div>
                            </div>
                            <!-- End of Dropdown Box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Header Middle -->

            @yield('navbar')
        </header>
        <!-- End of Header -->

        @yield('content')

<!-- Start of Footer -->
        <footer class="footer appear-animate" data-animation-options="{
            'name': 'fadeIn'
        }">
 <!-- footer SUBSCRIBE TO OUR NEWSLETTER -->
            <div class="footer-newsletter bg-primary">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-5 col-lg-6">
                            <div class="icon-box icon-box-side text-white">
                                <div class="icon-box-icon d-inline-flex">
                                 <!-- message icon -->
                                    <i class="w-icon-envelop3"></i>
                                </div>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-white text-uppercase font-weight-bold">Subscribe To
                                        Our Newsletter</h4>
                                    <p class="text-white">Get all the latest information on Events, Sales and Offers.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                            <form action="{{ route('store.newsletter') }}" method="post" id="newsletter_form"
                                class="input-wrapper input-wrapper-inline input-wrapper-rounded newsletter_form">
                                @csrf
                                <!-- email input -->
                                <input type="email" class="form-control mr-2 bg-white newsletter_input" name="email" id="email" required="required"
                                    placeholder="Your E-mail Address" />
                                    <!-- Subscribe button -->
                                <button class="btn btn-dark btn-rounded" type="submit">Subscribe<i
                                        class="w-icon-long-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="widget widget-about">
                                <a href="demo1.html" class="logo-footer">
                                    <img src="{{ asset('frontend-assets') }}/assets/images/logo.png" alt="logo-footer" width="144"
                                        height="45" />
                                </a>
                                <div class="widget-body">
                                    <p class="widget-about-title">Got Question? Call us 24/7</p>
                                    <a href="tel:+8801749518628" class="widget-about-call">+8801749518628</a>
                                    <p class="widget-about-desc">Register now to get updates on pronot get up icons
                                        & coupons ster now toon.
                                    </p>
<!-- Footer Social media icon -->
                                    <div class="social-icons social-icons-colored">
                                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                        <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                        <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
<!-- Footer Company  -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h3 class="widget-title">Company</h3>
                                <ul class="widget-body">
                                    <li><a href="{{ route('shop') }}">Shop</a></li>
                                    <li><a href="{{ route('blog') }}">Blog</a></li>
                                    <li><a href="{{ route('faq') }}">FAQs</a></li>
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
<!--Footer MY ACCOUNT  -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4>
                                <ul class="widget-body">
                                    <li><a href="{{ route('order.tracking') }}">Track My Order</a></li>
                                    <li><a href="{{ route('cart') }}">View Cart</a></li>
                                    <li><a href="{{ route('register') }}">Sign Up</a></li>
                                    <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
<!--Footer Customer Service  -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4>
                                <ul class="widget-body">
                                    <li><a href="#">Payment Methods</a></li>
                                    <li><a href="#">Money-back guarantee!</a></li>
                                    <li><a href="#">Product Returns</a></li>
                                    <li><a href="#">Support Center</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Term and Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="footer-left">
                        <p class="copyright">Copyright © 2023 Ecomart Store. All Rights Reserved.</p>
                    </div>
                    <div class="footer-right">
                        <span class="payment-label mr-lg-8">We're using safe payment for</span>
    <!-- Footer payment image -->
                        <figure class="payment">
                            <img src="{{ asset('frontend-assets') }}/assets/images/payment.png" alt="payment" width="159" height="25" />
                        </figure>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper-->

<!-- Start of Sticky Footer -->
    <!-- <div class="sticky-footer sticky-content fix-bottom">
        <a href="#" class="sticky-link active">
            <i class="w-icon-home"></i>
            <p>Home</p>
        </a>
        <a href="shop-banner-sidebar.html" class="sticky-link">
            <i class="w-icon-category"></i>
            <p>Shop</p>
        </a>
        <a href="my-account.html" class="sticky-link">
            <i class="w-icon-account"></i>
            <p>Account</p>
        </a>
        <div class="cart-dropdown dir-up">
            <a href="cart.html" class="sticky-link">
                <i class="w-icon-cart"></i>
                <p>Cart</p>
            </a>
            <div class="dropdown-box">
                <div class="products">
                    <div class="product product-cart">
                        <div class="product-detail">
                            <h3 class="product-name">
                                <a href="product-default.html">Beige knitted elas<br>tic
                                    runner shoes</a>
                            </h3>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">$25.68</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="{{ asset('frontend-assets') }}/assets/images/cart/product-1.jpg" alt="product" height="84" width="94" />
                            </a>
                        </figure>
                        <button class="btn btn-link btn-close" aria-label="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="product product-cart">
                        <div class="product-detail">
                            <h3 class="product-name">
                                <a href="product-default.html">Blue utility pina<br>fore
                                    denim dress</a>
                            </h3>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">$32.99</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="{{ asset('frontend-assets') }}/assets/images/cart/product-2.jpg" alt="product" width="84" height="94" />
                            </a>
                        </figure>
                        <button class="btn btn-link btn-close" aria-label="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="cart-total">
                    <label>Subtotal:</label>
                    <span class="price">$58.67</span>
                </div>

                <div class="cart-action">
                    <a href="cart.html" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                    <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a>
                </div>
            </div>
           End of Dropdown Box
        </div>

        <div class="header-search hs-toggle dir-up">
            <a href="#" class="search-toggle sticky-link">
                <i class="w-icon-search"></i>
                <p>Search</p>
            </a>
            <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
        </div>
    </div> -->
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    <a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg
            version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
            <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
                r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
        </svg> </a>
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay"></div>
        <!-- End of .mobile-menu-overlay -->

        <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
        <!-- End of .mobile-menu-close -->

        <div class="mobile-menu-container scrollable">
            <form action="#" method="get" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
            <!-- End of Search Form -->

<!--Start Main Menu for medium and small device -->
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#main-menu" class="nav-link active">Main Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="#categories" class="nav-link">Categories</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="main-menu">
                    <ul class="mobile-menu">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('shop') }}">Shop</a></li>
                        <li>
                            <a href="{{ route('faq') }}">FAQs</a>
                        </li>
                        <li>
                            <a href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
<!--End Main Menu for medium and small device -->

<!--Browse Categories  Mobile view-->
                <div class="tab-pane" id="categories">
                    <ul class="mobile-menu">
                    @foreach($category as $row)
                                  @php
                                    $subcategory=DB::table('subcategories')->where('category_id',$row->id)->get();
                                  @endphp
                                    <li>
                                        <a href="{{ route('categorywise.product',$row->id) }}">

                                          {{ $row->category_name }}
                                        </a>
                                        <ul class="megamenu">
                                            @foreach($subcategory as $row)
                                            @php
                                               $childcategory=DB::table('childcategories')->where('subcategory_id',$row->id)->get();
                                            @endphp
                                            <li>
                                                <a href="{{ route('subcategorywise.product',$row->id) }}">{{ $row->subcategory_name }}</a>
                                                <ul>
                                                    @foreach($childcategory as $row)
                                                     <li><a href="{{ route('childcategorywise.product',$row->id) }}">{{ $row->childcategory_name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Mobile Menu -->


 <!-- Plugin JS File -->
    <script src="{{ asset('frontend-assets') }}/assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('frontend-assets') }}/assets/vendor/sticky/sticky.js"></script>
    <script src="{{ asset('frontend-assets') }}/assets/vendor/jquery.plugin/jquery.plugin.min.js"></script>
    <script src="{{ asset('frontend-assets') }}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('frontend-assets') }}/assets/vendor/zoom/jquery.zoom.js"></script>
    <script src="{{ asset('frontend-assets') }}/assets/vendor/jquery.countdown/jquery.countdown.min.js"></script>
    <script src="{{ asset('frontend-assets') }}/assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('frontend-assets') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend-assets') }}/assets/vendor/skrollr/skrollr.min.js"></script>
    <script src="{{ asset('frontend-assets') }}/assets/vendor/photoswipe/photoswipe.js"></script>
    <script src="{{ asset('frontend-assets') }}/assets/vendor/photoswipe/photoswipe-ui-default.js"></script>

    <script src="{{ asset('dashboard-assets') }}/plugins/toastr/toastr.min.js"></script>

    <!-- Swiper JS -->
    <script src="{{ asset('frontend-assets') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('frontend-assets') }}/assets/js/main.min.js"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript" charset="utf-8">
    function cart() {
         $.ajax({
            type:'get',
            url:'{{ route('all.cart') }}',
            dataType: 'json',
            success:function(data){
               $('.cart_qty').empty();
               $('.cart_total').empty();
               $('.cart_qty').append(data.cart_qty);
               $('.cart_total').append(data.cart_total);
            }
        });
    }
    $(document).ready(function(event) {
        cart();
    });

 </script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>


<script>
  @if(Session::has('messege'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
        case 'info':
            toastr.info("{{Session::get('messege') }}");
            break;
        case 'success':
            toastr.success("{{Session::get('messege') }}");
            break;
        case 'warning':
            toastr.warning("{{Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{Session::get('messege') }}");
            break;
    }
  @endif
</script>

<script type="text/javascript">
    $('#newsletter_form').submit(function(e){
    e.preventDefault();
    var url = $(this).attr('action');
    var request =$(this).serialize();
    $.ajax({
      url:url,
      type:'post',
      async:false,
      data:request,
      success:function(data){
        toastr.success(data);
        $('#newsletter_form')[0].reset();
      }
    });
  });
</script>

</body>


</html>
