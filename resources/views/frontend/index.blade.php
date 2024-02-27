@extends('layouts.app')
    @section('navbar')
    @include('layouts.front_partial.main_nav')
    @endsection
@section('content')


<!-- Start of Main-->
<main class="main">
            <section class="intro-section">
                <div class="swiper-container swiper-theme nav-inner pg-inner swiper-nav-lg animation-slider pg-xxl-hide nav-xxl-show nav-hide"
                    data-swiper-options="{
                    'slidesPerView': 1,
                    'autoplay': {
                        'delay': 8000,
                        'disableOnInteraction': false
                    }
                }">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide banner banner-fixed intro-slide intro-slide1"
                            style="background-image: url(assets/images/demos/demo1/sliders/slide-1.jpg); background-color: #ebeef2;">
                            <div class="container">
                                <figure class="slide-image skrollable slide-animate">
                                    <!-- iphone-14-pro -->
                                    <img src="{{ asset($bannerproduct->thumbnail) }}" alt="{{ $bannerproduct->name }}"
                                        data-bottom-top="transform: translateY(10vh);"
                                        data-top-bottom="transform: translateY(-10vh);" width="474" height="397">
                                </figure>
                                <div class="banner-content y-50 text-right">
                                    <h5 class="banner-subtitle font-weight-normal text-default ls-50 lh-1 mb-2 slide-animate"
                                        data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.2s'
                                }">
                                        Custom <span class="p-relative d-inline-block">{{ $bannerproduct->childcategory->childcategory_name }}</span>
                                    </h5>
                                    <h3 class="banner-title font-weight-bolder ls-25 lh-1 slide-animate"
                                        data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.4s'
                                }">
                                        {{ $bannerproduct->name }}
                                    </h3>
                                    <p class="font-weight-normal text-default slide-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.6s'
                                }">
                                @if($bannerproduct->discount_price==NULL)
                         <div class="banner_price">{{ $bannerproduct->selling_price }}</div>
                        @else
                          <div class="banner_price"><span>{{ $setting->currency }}{{ $bannerproduct->selling_price }}</span>{{ $setting->currency }}{{ $bannerproduct->discount_price }}</div>
                        @endif
                                    </p>

                                    <a href="{{ route('product.details',$bannerproduct->slug) }}"
                                        class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                                        data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.8s'
                                }">SHOP NOW<i class="w-icon-long-arrow-right"></i></a>

                                </div>
                                <!-- End of .banner-content -->
                            </div>
                            <!-- End of .container -->
                        </div>
                        <!-- End of .intro-slide1 -->

                    </div>
                    <!-- <div class="swiper-pagination"></div>
                    <button class="swiper-button-next"></button>
                    <button class="swiper-button-prev"></button> -->
                </div>
                <!-- End of .swiper-container -->
            </section>
            <!-- End of .intro-section -->

            <div class="container">
                <div class="swiper-container appear-animate icon-box-wrapper br-sm mt-6 mb-6" data-swiper-options="{
                    'slidesPerView': 1,
                    'loop': false,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 2
                        },
                        '768': {
                            'slidesPerView': 3
                        },
                        '1200': {
                            'slidesPerView': 4
                        }
                    }
                }">
                    <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
                        <!-- Free Shipping & Returns start -->
                        <div class="swiper-slide icon-box icon-box-side icon-box-primary">
                            <span class="icon-box-icon icon-shipping">
                                <!-- Icon -->
                                <i class="w-icon-truck"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title font-weight-bold mb-1">Free Shipping & Returns</h4>
                                <p class="text-default">For all orders over $99</p>
                            </div>
                        </div>
                        <!-- Free Shipping & Returns end -->

                        <!--Secure Payment Start  -->
                        <div class="swiper-slide icon-box icon-box-side icon-box-primary">
                            <span class="icon-box-icon icon-payment">
                                <!-- Icon -->
                                <i class="w-icon-bag"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title font-weight-bold mb-1">Secure Payment</h4>
                                <p class="text-default">We ensure secure payment</p>
                            </div>
                        </div>
                        <!--Secure Payment End  -->

                        <!-- Money Back Guarantee Start -->
                        <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-money">
                            <span class="icon-box-icon icon-money">
                                <!-- icon -->
                                <i class="w-icon-money"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title font-weight-bold mb-1">Money Back Guarantee</h4>
                                <p class="text-default">Any back within 30 days</p>
                            </div>
                        </div>
                         <!-- Money Back Guarantee End -->

                         <!-- Customer Support Start -->
                        <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-chat">
                            <span class="icon-box-icon icon-chat">
                                <!-- icon -->
                                <i class="w-icon-chat"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title font-weight-bold mb-1">Customer Support</h4>
                                <p class="text-default">Call or email us 24/7</p>
                            </div>
                        </div>
                        <!-- Customer Support End -->
                    </div>
                </div>
                <!-- End of Iocn Box Wrapper -->

        <!-- Start of Category Banner Wrapper -->
                <div class="row category-banner-wrapper appear-animate pt-6 pb-8">
                    <div class="col-md-6 mb-4">
                        <div class="banner banner-fixed br-xs">
                            <figure>
                                <!-- Image-1 Sports Outfits-->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/categories/1-1.jpg" alt="Category Banner"
                                    width="610" height="160" style="background-color: #ecedec;" />
                            </figure>
                            
                            <div class="banner-content y-50 mt-0">
                                <h5 class="banner-subtitle font-weight-normal text-dark">Get up to <span
                                        class="text-secondary font-weight-bolder text-uppercase ls-25">20% Off</span>
                                </h5>
                                <h3 class="banner-title text-uppercase">Sports Outfits<br><span
                                        class="font-weight-normal                       text-capitalize">Collection</span>
                                </h3>
                                <div class="banner-price-info font-weight-normal">Starting at <span
                                        class="text-secondary                       font-weight-bolder">৳ 600 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <div class="banner banner-fixed br-xs">
                            <figure>
                                <!-- image-2  New Arrivals-->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/categories/1-2.jpg" alt="Category Banner"
                                    width="610" height="160" style="background-color: #636363;" />
                            </figure>
                            <div class="banner-content y-50 mt-0">
                                <h5 class="banner-subtitle font-weight-normal text-capitalize">New Arrivals</h5>
                                <h3 class="banner-title text-white text-uppercase">Accessories<br><span
                                        class="font-weight-normal text-capitalize">Collection</span></h3>
                                <div class="banner-price-info text-white font-weight-normal text-capitalize">Only From
                                    <span class="text-secondary font-weight-bolder">৳ 400</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Category Banner Wrapper -->

            <!--Start Deals Hot of The Day -->
                <div class="row deals-wrapper appear-animate mb-8">
                    <div class="col-lg-9 mb-4">
                        <div class="single-product h-100 br-sm">
                            <h4 class="title-sm title-underline font-weight-bolder ls-normal">
                                Deals Hot of The Day
                            </h4>
                            <div class="swiper">
                                <div class="swiper-container swiper-theme nav-top swiper-nav-lg" data-swiper-options="{
                                    'spaceBetween': 20,
                                    'slidesPerView': 1
                                }">
                                    <div class="swiper-wrapper row cols-1 gutter-no">
                        <!-- Hot of the Day First Slide Start -->

                                        @foreach($today_deal as $row)

                                        <div class="swiper-slide">
                                            <div class="product product-single row">
                                                <div class="col-md-6">
                                                    <div class="product-gallery product-gallery-sticky product-gallery-vertical">
                                                        <div class="swiper-container product-single-swiper swiper-theme nav-inner">
                                                            <div class="swiper-wrapper row cols-1 gutter-no">
                                                                <div class="swiper-slide">
                                                                    <figure class="product-image">
                                                                        <!-- img-1 Deals Hot of The Day -->
                                                                        <img src="{{ asset($row->thumbnail) }}"
                                                                            data-zoom-image="{{ asset($row->thumbnail) }}"
                                                                            alt="Product Image" width="800"
                                                                            height="900">
                                                                    </figure>
                                                                </div>
                                                            </div>
                                                            <div class="product-label-group">
                                                                <!-- 25% discount -->
                                                                <label class="product-label label-discount">25%
                                                                    Off</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="product-details scrollable">
                                                        <h2 class="product-title mb-1"><a
                                                                href="#">{{ $row->name }}</a></h2>

                                                        <hr class="product-divider">

                                                        @if($row->discount_price==NULL)
                                                            <div class="product-price">
                                                                <ins class="new-price">{{ $setting->currency }}{{ $row->selling_price }}</ins>
                                                            </div>
                                                            @else
                                                            <div class="product-price">
                                                                <ins class="new-price">{{ $setting->currency }} {{ $row->discount_price }} <span>{{ $setting->currency }} {{ $row->selling_price }}</span></ins>
                                                            </div>
                                                        @endif

                                       <!-- Offer Ends In: -->
                                                        <div class="product-countdown-container flex-wrap">
                                                            <label class="mr-2 text-default">Offer Ends In:</label>
                                                            <div class="product-countdown countdown-compact"
                                                                data-until="2023, 05, 31" data-compact="true">
                                                                629 days, 11: 59: 52</div>
                                                        </div>

                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                            <!-- 4 star icon -->
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <a href="#" class="rating-reviews">(3 Reviews)</a>
                                                        </div>


                                                        <div class="product-form product-variation-form product-size-swatch">
                                                            <label>Size: </label>
                                                            <select class="custom-select form-control-sm" name="size" style="min-width: 120px;">

                                                                <option value="">Small</option>
                                                                <option value="">Medium</option>
                                                                <option value="">Large</option>
                                                                <option value="">Extra Large</option>

                                                            </select>
                                                        </div>

                                                        <div class="product-form pt-4">
                                                            <div class="product-qty-form mb-2 mr-2">
                                                                <div class="input-group">
                                                 <!-- Number of product -->
                                                                    <input class="quantity form-control" type="number"
                                                                        min="1" max="10000000">
                                                                    <button class="quantity-plus w-icon-plus"></button>
                                                                    <button
                                                                        class="quantity-minus w-icon-minus"></button>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-primary">
                                                                <i class="w-icon-cart"></i>
                                                                <a href="{{ route('shop') }}" style="color: #fff"><span>Add to Cart</span></a>
                                                            </button>
                                                        </div>

                                                        <div class="social-links-wrapper mt-1">
                                                            <div class="social-links">
                                             <!-- Icon social media -->
                                                                <div class="social-icons social-no-color border-thin">
                                                                    <a href="#"
                                                                        class="social-icon social-facebook w-icon-facebook"></a>
                                                                    <a href="#"
                                                                        class="social-icon social-twitter w-icon-twitter"></a>
                                                                    <a href="#"
                                                                        class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                                                    <a href="#"
                                                                        class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                                                    <a href="#"
                                                                        class="social-icon social-youtube fab fa-linkedin-in"></a>
                                                                </div>
                                                            </div>
                                                            <span class="divider d-xs-show"></span>
                                                            <div class="product-link-wrapper d-flex">
                                                <!-- icon heart -->
                                                                <a href="#"
                                                                    class="btn-product-icon btn-wishlist w-icon-heart"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                    <!-- Hot of the Day End -->
                                    </div>
                            <!-- Button -->
                                    <button class="swiper-button-prev"></button>
                                    <button class="swiper-button-next"></button>
                                </div>
                            </div>
                        </div>
                    </div>

            <!-- Deals Hot of the Day End -->

            <!-- Top 20 best seller Start -->
                    <div class="col-lg-3 mb-4">
                        <div class="widget widget-products widget-products-bordered h-100">
                            <div class="widget-body br-sm h-100">
                                <h4 class="title-sm title-underline font-weight-bolder ls-normal mb-2">Top 20 Best
                                    Seller</h4>
                                <div class="swiper">
                                    <div class="swiper-container swiper-theme nav-top" data-swiper-options="{
                                        'slidesPerView': 1,
                                        'spaceBetween': 20,
                                        'breakpoints': {
                                            '576': {
                                                'slidesPerView': 2
                                            },
                                            '768': {
                                                'slidesPerView': 3
                                            },
                                            '992': {
                                                'slidesPerView': 1
                                            }
                                        }
                                    }">
                                        <div class="swiper-wrapper row cols-lg-1 cols-md-3">
                                            <div class="swiper-slide product-widget-wrap">
                                                <div class="product product-widget bb-no">
                                                    <figure class="product-media">
                                                        <a href="#">
                            <!-- Img-1 Top 20 Best Seller Kitchen Cooker -->
                                                            <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/2-1.jpg"
                                                                alt="Product" width="105" height="118" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Kitchen Cooker</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <!-- icon -->
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">
                                                            <ins class="new-price">৳ 800 </ins>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget bb-no">
                                                    <figure class="product-media">
                                                        <a href="#">
                                            <!-- Img-2 Top 20 Best Seller Professional Pixel Camera -->
                                                            <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/2-2.jpg"
                                                                alt="Product" width="105" height="118" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Professional Pixel Camera</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <!-- icon -->
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">
                                                            <ins class="new-price">৳ 2300 </ins><del
                                                                class="old-price">৳ 2000 </del>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                         <!-- Img-2 Top 20 Best Seller Sport Women’s Wear -->
                                                            <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/2-3.jpg"
                                                                alt="Product" width="105" height="118" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Sport Women’s Wear</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <!-- icon -->
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">
                                                            <ins class="new-price">৳ 3000 </ins><del
                                                                class="old-price">৳ 2500 </del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                        <!-- Top 20 Best Seller 2nd slide -->
                                            <div class="swiper-slide product-widget-wrap">
                                                <div class="product product-widget bb-no">
                                                    <figure class="product-media">
                                                        <a href="#">
                                <!-- Img-4 Top 20 Best Seller Latest Speaker -->
                                                            <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/2-4.jpg"
                                                                alt="Product" width="105" height="118" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Latest Speaker</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <!-- icon -->
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">
                                                            <ins class="new-price">৳ 1800 </ins>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget bb-no">
                                                    <figure class="product-media">
                                                        <a href="#">
                                        <!-- Img-4 Top 20 Best Seller Men's Black Wrist Watch -->
                                                            <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/2-5.jpg"
                                                                alt="Product" width="105" height="118" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Men's Black Wrist Watch</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <!-- icon -->
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">
                                                            <ins class="new-price">৳ 1500</ins><del
                                                                class="old-price">৳ 2500 </del>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                    <!-- Img Top 20 Best Seller Wash Machine -->
                                                            <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/2-6.jpg"
                                                                alt="Product" width="105" height="118" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Wash Machine</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <!-- icon -->
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">
                                                            <ins class="new-price">৳ 1400 </ins>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide product-widget-wrap">
                                                <div class="product product-widget bb-no">
                                                    <figure class="product-media">
                                                        <a href="#">
                                <!-- Img Top 20 Best Seller Security Guard -->
                                                            <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/2-7.jpg"
                                                                alt="Product" width="105" height="118" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Security Guard</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <!-- icon -->
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">
                                                            <ins class="new-price">৳ 1200 </ins>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget bb-no">
                                                    <figure class="product-media">
                                                        <a href="#">
                                <!-- Img Top 20 Best Seller Apple Super Notecom -->
                                                            <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/2-8.jpg"
                                                                alt="Product" width="105" height="118" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Apple Super Notecom</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <!-- icon -->
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">
                                                            <ins class="new-price">৳ 1400</ins><del
                                                                class="old-price">৳ 2000 </del>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                             <!-- Img Top 20 Best Seller HD Television -->
                                                            <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/2-9.jpg"
                                                                alt="Product" width="105" height="118" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">HD Television</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <!-- icon -->
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">
                                                            <ins class="new-price">৳ 5000 </ins><del
                                                                class="old-price">৳ 6500 </del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- button -->
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Deals Wrapper -->
            </div>


    <!-- Start Top Categories Of The Month -->
            <section class="category-section top-category bg-grey pt-10 pb-10 appear-animate">
                <div class="container pb-2">
                    <h2 class="title justify-content-center pt-1 ls-normal mb-5">Top Categories Of The Month</h2>
                    <div class="swiper">
                        <div class="swiper-container swiper-theme pg-show" data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 2,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 3
                                },
                                '768': {
                                    'slidesPerView': 5
                                },
                                '992': {
                                    'slidesPerView': 6
                                }
                            }
                        }">
                            <div class="swiper-wrapper row cols-lg-6 cols-md-5 cols-sm-3 cols-2">
                                <div
                                    class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                                    <a href="#" class="category-media">
                            <!--img Fashion Top Categories Of The Month -->
                                        <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/categories/2-1.jpg" alt="Category"
                                            width="130" height="130">
                                    </a>
                                    <div class="category-content">
                                        <h4 class="category-name">Fashion</h4>
                                        <a href="{{ route('shop') }}"
                                            class="btn btn-primary btn-link btn-underline">Shop
                                            Now</a>
                                    </div>
                                </div>
                                <div
                                    class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                                    <a href="#" class="category-media">
                             <!--img Furniture Top Categories Of The Month -->
                                        <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/categories/2-2.jpg" alt="Category"
                                            width="130" height="130">
                                    </a>
                                    <div class="category-content">
                                        <h4 class="category-name">Furniture</h4>
                                        <a href="{{ route('shop') }}"
                                            class="btn btn-primary btn-link btn-underline">Shop
                                            Now</a>
                                    </div>
                                </div>
                                <div
                                    class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                                    <a href="#" class="category-media">
                             <!--img Shoes Top Categories Of The Month -->
                                        <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/categories/2-3.jpg" alt="Category"
                                            width="130" height="130">
                                    </a>
                                    <div class="category-content">
                                        <h4 class="category-name">Shoes</h4>
                                        <a href="{{ route('shop') }}"
                                            class="btn btn-primary btn-link btn-underline">Shop
                                            Now</a>
                                    </div>
                                </div>
                                <div
                                    class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                                    <a href="#" class="category-media">
                         <!--img Sports Top Categories Of The Month -->
                                        <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/categories/2-4.jpg" alt="Category"
                                            width="130" height="130">
                                    </a>
                                    <div class="category-content">
                                        <h4 class="category-name">Sports</h4>
                                        <a href="{{ route('shop') }}"
                                            class="btn btn-primary btn-link btn-underline">Shop
                                            Now</a>
                                    </div>
                                </div>
                                <div
                                    class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                                    <a href="#" class="category-media">
                         <!--img Games Top Categories Of The Month -->
                                        <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/categories/2-5.jpg" alt="Category"
                                            width="130" height="130">
                                    </a>
                                    <div class="category-content">
                                        <h4 class="category-name">Games</h4>
                                        <a href="{{ route('shop') }}"
                                            class="btn btn-primary btn-link btn-underline">Shop
                                            Now</a>
                                    </div>
                                </div>
                                <div
                                    class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                                    <a href="#" class="category-media">
                            <!--img Computers Top Categories Of The Month -->
                                        <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/categories/2-6.jpg" alt="Category"
                                            width="130" height="130">
                                    </a>
                                    <div class="category-content">
                                        <h4 class="category-name">Computers</h4>
                                        <a href="{{ route('shop') }}"
                                            class="btn btn-primary btn-link btn-underline">Shop
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End of .category-section top-category -->

            <!--Start Popular Departments -->
            <div class="container">
                <h2 class="title justify-content-center ls-normal mb-4 mt-10 pt-1 appear-animate">Popular Departments
                </h2>
                <!-- Start of Tab -->
                <div class="tab tab-nav-boxed tab-nav-outline appear-animate">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item mr-2 mb-2">
                            <a class="nav-link active br-sm font-size-md ls-normal" href="#tab1-1">New arrivals</a>
                        </li>
                        <li class="nav-item mr-2 mb-2">
                            <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-2">Best seller</a>
                        </li>
                        <li class="nav-item mr-2 mb-2">
                            <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-3">Most popular</a>
                        </li>
                        <li class="nav-item mr-0 mb-2">
                            <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-4">Featured</a>
                        </li>
                    </ul>
                </div>
                <!-- End of Tab -->
                <div class="tab-content product-wrapper appear-animate">
                    <div class="tab-pane active pt-4" id="tab1-1">
                        <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">

                            @foreach($featured as $row)
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',$row->slug) }}">
                                            <img src="{{ asset($row->thumbnail) }}" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <!-- Add to cart -->
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-cart quick_view" id="{{ $row->id }}" title="Add to cart"></a>
                                            <a href="{{ route('add.wishlist',$row->id) }}">
                                               <div class="product_fav btn-product-icon">
                                                  <i class="fas fa-heart"></i>
                                               </div>
                                            </a>
                                                <!-- Quickview -->
                                                               <a href="#" class="btn-product-icon btn-quickview w-icon-search quick_view" id="{{ $row->id }}" title="Quickview"></a>

                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="#">{{ substr($row->name,0,20) }}..</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <!-- rating -->
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="#" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        @if($row->discount_price==NULL)
                                        <div class="product-price">
                                            <ins class="new-price">{{ $setting->currency }}{{ $row->selling_price }}</ins>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            <ins class="new-price">{{ $setting->currency }} {{ $row->discount_price }} <span>{{ $setting->currency }} {{ $row->selling_price }}</span></ins>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- End of Tab Pane -->

                    <div class="tab-pane pt-4" id="tab1-2">
                        <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                        @foreach($featured as $row)
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',$row->slug) }}">
                                            <img src="{{ asset($row->thumbnail) }}" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <!-- Add to cart -->
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-cart quick_view" id="{{ $row->id }}" title="Add to cart"></a>
                                            <a href="{{ route('add.wishlist',$row->id) }}">
                                               <div class="product_fav btn-product-icon">
                                                  <i class="fas fa-heart"></i>
                                               </div>
                                            </a>
                                                <!-- Quickview -->
                                                               <a href="#" class="btn-product-icon btn-quickview w-icon-search quick_view" id="{{ $row->id }}" title="Quickview"></a>

                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="#">{{ substr($row->name,0,20) }}..</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <!-- rating -->
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="#" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        @if($row->discount_price==NULL)
                                        <div class="product-price">
                                            <ins class="new-price">{{ $setting->currency }}{{ $row->selling_price }}</ins>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            <ins class="new-price">{{ $setting->currency }} {{ $row->discount_price }} <span>{{ $setting->currency }} {{ $row->selling_price }}</span></ins>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End of Tab Pane -->
                    <div class="tab-pane pt-4" id="tab1-3">
                        <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                            @foreach($popular_product as $row)
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',$row->slug) }}">
                                            <img src="{{ asset($row->thumbnail) }}" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <!-- Add to cart -->
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-cart quick_view" id="{{ $row->id }}" title="Add to cart"></a>
                                                <!-- Add to wishlist -->
                                            <a href="{{ route('add.wishlist',$row->id) }}">
                                               <div class="product_fav btn-product-icon">
                                                  <i class="fas fa-heart"></i>
                                               </div>
                                            </a>
                                                <!-- Quickview -->
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search quick_view" id="{{ $row->id }}" title="Quickview"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="#">{{ substr($row->name,0,20) }}..</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <!-- rating -->
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="#" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        @if($row->discount_price==NULL)
                                        <div class="product-price">
                                            <ins class="new-price">{{ $setting->currency }}{{ $row->selling_price }}</ins>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            <ins class="new-price">{{ $setting->currency }} {{ $row->discount_price }} <span>{{ $setting->currency }} {{ $row->selling_price }}</span></ins>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- End of Tab Pane -->
                    <div class="tab-pane pt-4" id="tab1-4">
                        <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                        @foreach($popular_product as $row)
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',$row->slug) }}">
                                            <img src="{{ asset($row->thumbnail) }}" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <!-- Add to cart -->
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-cart quick_view" id="{{ $row->id }}" title="Add to cart"></a>
                                                <!-- Add to wishlist -->
                                            <a href="{{ route('add.wishlist',$row->id) }}">
                                               <div class="product_fav btn-product-icon">
                                                  <i class="fas fa-heart"></i>
                                               </div>
                                            </a>
                                                <!-- Quickview -->
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search quick_view" id="{{ $row->id }}" title="Quickview"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="#">{{ substr($row->name,0,20) }}..</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <!-- rating -->
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="#" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        @if($row->discount_price==NULL)
                                        <div class="product-price">
                                            <ins class="new-price">{{ $setting->currency }}{{ $row->selling_price }}</ins>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            <ins class="new-price">{{ $setting->currency }} {{ $row->discount_price }} <span>{{ $setting->currency }} {{ $row->selling_price }}</span></ins>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End of Tab Pane -->
                </div>
                <!-- End of Tab Content -->

                <div class="row category-cosmetic-lifestyle appear-animate mb-5">
                    <div class="col-md-6 mb-4">
                        <div class="banner banner-fixed category-banner-1 br-xs">
                            <figure>
                                <!--img Natural Process -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/categories/3-1.jpg" alt="Category Banner"
                                    width="610" height="200" style="background-color: #3B4B48;" />
                            </figure>
                            <div class="banner-content y-50 pt-1">
                                <h5 class="banner-subtitle font-weight-bold text-uppercase">Natural Process</h5>
                                <h3 class="banner-title font-weight-bolder text-capitalize text-white">Cosmetic
                                    Makeup<br>Professional</h3>
                                <a href="#"
                                    class="btn btn-white btn-link btn-underline btn-icon-right">Shop Now
                                    <!-- icon -->
                                    <i class="w-icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- TRENDING NOW -->
                    <div class="col-md-6 mb-4">
                        <div class="banner banner-fixed category-banner-2 br-xs">
                            <figure>
                                <!-- img Trending Now -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/categories/3-2.jpg" alt="Category Banner"
                                    width="610" height="200" style="background-color: #E5E5E5;" />
                            </figure>
                            <div class="banner-content y-50 pt-1">
                                <h5 class="banner-subtitle font-weight-bold text-uppercase">Trending Now</h5>
                                <h3 class="banner-title font-weight-bolder text-capitalize">Women's
                                    Lifestyle<br>Collection</h3>
                                <a href="{{ route('shop') }}"
                                    class="btn btn-dark btn-link btn-underline btn-icon-right">Shop Now<i
                                        class="w-icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Category Cosmetic Lifestyle -->

                <!--Start Clothing & Apparel -->
                <div class="product-wrapper-1 appear-animate mb-5">
                    <div class="title-link-wrapper pb-1 mb-4">
                        <h2 class="title ls-normal mb-0">Clothing & Apparel</h2>
                        <!-- More Products -->
                        <a href="{{ route('shop') }}" class="font-size-normal font-weight-bold ls-25 mb-0">More
                            Products<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                    <div class="row">
                        <!-- Background-color Clothing & Apparel -->
                        <div class="col-lg-3 col-sm-4 mb-4">
                            <div class="banner h-100 br-sm" style="background-image: url(assets/images/demos/demo1/banners/2.jpg);
                                background-color: #ebeced;">
                                <div class="banner-content content-top">
                                    <h5 class="banner-subtitle font-weight-normal mb-2">Weekend Sale</h5>
                                    <hr class="banner-divider bg-dark mb-2">
                                    <h3 class="banner-title font-weight-bolder ls-25 text-uppercase">
                                        New Arrivals<br> <span
                                            class="font-weight-normal text-capitalize">Collection</span>
                                    </h3>
                                    <a href="{{ route('shop') }}"
                                        class="btn btn-dark btn-outline btn-rounded btn-sm">shop Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Banner -->
                        <div class="col-lg-9 col-sm-8">
                            <div class="swiper-container swiper-theme" data-swiper-options="{
                                'spaceBetween': 20,
                                'slidesPerView': 2,
                                'breakpoints': {
                                    '992': {
                                        'slidesPerView': 3
                                    },
                                    '1200': {
                                        'slidesPerView': 4
                                    }
                                }
                            }">
                                <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">

                                    @foreach($popular_product as $row)
                                        <div class="swiper-slide product-col">
                                            <div class="product-wrap">
                                                <div class="product text-center">
                                                    <figure class="product-media">
                                                        <a href="{{ route('product.details',$row->slug) }}">
                                                            <img src="{{ asset($row->thumbnail) }}" width="300" height="338" />
                                                        </a>
                                                        <div class="product-action-vertical">
                                                            <!-- Add to cart -->
                                                            <a href="#" class="btn-product-icon btn-quickview w-icon-cart quick_view" id="{{ $row->id }}" title="Add to cart"></a>
                                                                <!-- Add to wishlist -->
                                                            <a href="{{ route('add.wishlist',$row->id) }}">
                                                            <div class="product_fav btn-product-icon">
                                                                <i class="fas fa-heart"></i>
                                                            </div>
                                                            </a>
                                                                <!-- Quickview -->
                                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search quick_view" id="{{ $row->id }}" title="Quickview"></a>
                                                        </div>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name"><a href="#">{{ substr($row->name,0,20) }}..</a></h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <!-- rating -->
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <a href="#" class="rating-reviews">(3 reviews)</a>
                                                        </div>
                                                        @if($row->discount_price==NULL)
                                                        <div class="product-price">
                                                            <ins class="new-price">{{ $setting->currency }}{{ $row->selling_price }}</ins>
                                                        </div>
                                                        @else
                                                        <div class="product-price">
                                                            <ins class="new-price">{{ $setting->currency }} {{ $row->discount_price }} <span>{{ $setting->currency }} {{ $row->selling_price }}</span></ins>
                                                        </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Product Wrapper 1 -->

                <!-- Consumer Electric -->
                <div class="product-wrapper-1 appear-animate mb-8">
                    <div class="title-link-wrapper pb-1 mb-4">
                        <h2 class="title ls-normal mb-0">Consumer Electric</h2>
                        <!-- More
                            Products -->
                        <a href="{{ route('shop') }}" class="font-size-normal font-weight-bold ls-25 mb-0">More
                            Products<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-4 mb-4">
                            <!--Background-color Consumer Electric -->
                            <div class="banner h-100 br-sm" style="background-image: url(assets/images/demos/demo1/banners/3.jpg);
                            background-color: #252525;">
                                <div class="banner-content content-top">
                                    <h5 class="banner-subtitle text-white font-weight-normal mb-2">New Collection</h5>
                                    <hr class="banner-divider bg-white mb-2">
                                    <h3 class="banner-title text-white font-weight-bolder text-uppercase ls-25">
                                        Top Camera <br> <span
                                            class="font-weight-normal text-capitalize">Mirrorless</span>
                                    </h3>
                                    <a href="{{ route('shop') }}"
                                        class="btn btn-white btn-outline btn-rounded btn-sm">shop now</a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Banner -->
                        <div class="col-lg-9 col-sm-8">
                            <div class="swiper-container swiper-theme" data-swiper-options="{
                                'spaceBetween': 20,
                                'slidesPerView': 2,
                                'breakpoints': {
                                    '992': {
                                        'slidesPerView': 3
                                    },
                                    '1200': {
                                        'slidesPerView': 4
                                    }
                                }
                            }">
                                <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">

                                @foreach($featured as $row)
                                    <div class="swiper-slide product-col">
                                        <div class="product-wrap">
                                            <div class="product text-center">
                                                <figure class="product-media">
                                                    <a href="{{ route('product.details',$row->slug) }}">
                                                        <img src="{{ asset($row->thumbnail) }}" width="300" height="338" />
                                                    </a>
                                                    <div class="product-action-vertical">
                                                        <!-- Add to cart -->
                                                        <a href="#" class="btn-product-icon btn-quickview w-icon-cart quick_view" id="{{ $row->id }}" title="Add to cart"></a>
                                                            <!-- Add to wishlist -->
                                                        <a href="{{ route('add.wishlist',$row->id) }}">
                                                        <div class="product_fav btn-product-icon">
                                                            <i class="fas fa-heart"></i>
                                                        </div>
                                                        </a>
                                                            <!-- Quickview -->
                                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search quick_view" id="{{ $row->id }}" title="Quickview"></a>
                                                    </div>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name"><a href="#">{{ substr($row->name,0,20) }}..</a></h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <!-- rating -->
                                                            <span class="ratings" style="width: 80%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <a href="#" class="rating-reviews">(3 reviews)</a>
                                                    </div>
                                                    @if($row->discount_price==NULL)
                                                    <div class="product-price">
                                                        <ins class="new-price">{{ $setting->currency }}{{ $row->selling_price }}</ins>
                                                    </div>
                                                    @else
                                                    <div class="product-price">
                                                        <ins class="new-price">{{ $setting->currency }} {{ $row->discount_price }} <span>{{ $setting->currency }} {{ $row->selling_price }}</span></ins>
                                                    </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <!-- End of Produts -->
                        </div>
                    </div>
                </div>
                <!-- End of Product Wrapper 1 -->

                <!-- 25 % off FOR TODAY'S FASHION -->
                <div class="banner banner-fashion appear-animate br-sm mb-9" style="background-image: url(assets/images/demos/demo1/banners/4.jpg);
                    background-color: #383839;">
                    <!-- background-color -->
                    <div class="banner-content align-items-center">
                        <div class="content-left d-flex align-items-center mb-3">
                            <div class="banner-price-info font-weight-bolder text-secondary text-uppercase lh-1 ls-25">
                                25
                                <sup class="font-weight-bold">%</sup><sub class="font-weight-bold ls-25">Off</sub>
                            </div>
                            <hr class="banner-divider bg-white mt-0 mb-0 mr-8">
                        </div>
                        <div class="content-right d-flex align-items-center flex-1 flex-wrap">
                            <div class="banner-info mb-0 mr-auto pr-4 mb-3">
                                <h3 class="banner-title text-white font-weight-bolder text-uppercase ls-25">For Today's
                                    Fashion</h3>
                                <p class="text-white mb-0">Use code
                                    <span
                                        class="text-dark bg-white font-weight-bold ls-50 pl-1 pr-1 d-inline-block">Black
                                        <strong>12345</strong></span> to get best offer.</p>
                            </div>
                            <a href="{{ route('shop') }}"
                                class="btn btn-white btn-outline btn-rounded btn-icon-right mb-3">Shop Now
                                <!-- icon -->
                                <i class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End of Banner Fashion -->

                <!-- Home Garden & Kitchen -->
                <div class="product-wrapper-1 appear-animate mb-7">
                    <div class="title-link-wrapper pb-1 mb-4">
                        <h2 class="title ls-normal mb-0">Home Garden & Kitchen</h2>
                        <a href="#" class="font-size-normal font-weight-bold ls-25 mb-0">More
                            Products<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-4 mb-4">
                            <div class="banner h-100 br-sm" style="background-image: url(assets/images/demos/demo1/banners/5.jpg);
                            background-color: #EAEFF3;">
                                <div class="banner-content content-top">
                                    <h5 class="banner-subtitle font-weight-normal mb-2">Deals And Promotions</h5>
                                    <hr class="banner-divider bg-dark mb-2">
                                    <h3 class="banner-title font-weight-bolder text-uppercase ls-25">
                                        Trending <br> <span class="font-weight-normal text-capitalize">House
                                            Utensil</span>
                                    </h3>
                                    <a href="{{ route('shop') }}"
                                        class="btn btn-dark btn-outline btn-rounded btn-sm">shop now</a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Banner -->
                        <div class="col-lg-9 col-sm-8">
                            <div class="swiper-container swiper-theme" data-swiper-options="{
                                'spaceBetween': 20,
                                'slidesPerView': 2,
                                'breakpoints': {
                                    '992': {
                                        'slidesPerView': 3
                                    },
                                    '1200': {
                                        'slidesPerView': 4
                                    }
                                }
                            }">
                                <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                                @foreach($popular_product as $row)
                                        <div class="swiper-slide product-col">
                                            <div class="product-wrap">
                                                <div class="product text-center">
                                                    <figure class="product-media">
                                                        <a href="{{ route('product.details',$row->slug) }}">
                                                            <img src="{{ asset($row->thumbnail) }}" width="300" height="338" />
                                                        </a>
                                                        <div class="product-action-vertical">
                                                            <!-- Add to cart -->
                                                            <a href="#" class="btn-product-icon btn-quickview w-icon-cart quick_view" id="{{ $row->id }}" title="Add to cart"></a>
                                                                <!-- Add to wishlist -->
                                                            <a href="{{ route('add.wishlist',$row->id) }}">
                                                            <div class="product_fav btn-product-icon">
                                                                <i class="fas fa-heart"></i>
                                                            </div>
                                                            </a>
                                                                <!-- Quickview -->
                                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search quick_view" id="{{ $row->id }}" title="Quickview"></a>
                                                        </div>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name"><a href="#">{{ substr($row->name,0,20) }}..</a></h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <!-- rating -->
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <a href="#" class="rating-reviews">(3 reviews)</a>
                                                        </div>
                                                        @if($row->discount_price==NULL)
                                                        <div class="product-price">
                                                            <ins class="new-price">{{ $setting->currency }}{{ $row->selling_price }}</ins>
                                                        </div>
                                                        @else
                                                        <div class="product-price">
                                                            <ins class="new-price">{{ $setting->currency }} {{ $row->discount_price }} <span>{{ $setting->currency }} {{ $row->selling_price }}</span></ins>
                                                        </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <!-- End of Produts -->
                        </div>
                    </div>
                </div>
                <!-- End of Product Wrapper 1 -->


                <!-- Our Clients -->
                <h2 class="title title-underline mb-4 ls-normal appear-animate">Our Clients</h2>
                <div class="swiper-container swiper-theme brands-wrapper mb-9 appear-animate" data-swiper-options="{
                    'spaceBetween': 0,
                    'slidesPerView': 2,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 3
                        },
                        '768': {
                            'slidesPerView': 4
                        },
                        '992': {
                            'slidesPerView': 5
                        },
                        '1200': {
                            'slidesPerView': 6
                        }
                    }
                }">
                    <div class="swiper-wrapper row gutter-no cols-xl-8 cols-lg-7 cols-md-5 cols-sm-4 cols-2">
                        <div class="swiper-slide brand-col">
                            <figure class="brand-wrapper">
                                <!-- starling -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/1.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                            <figure class="brand-wrapper">
                                <!-- Green Grass -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/2.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                        </div>
                        <div class="swiper-slide brand-col">
                            <figure class="brand-wrapper">
                                <!-- NS8 -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/3.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                            <figure class="brand-wrapper">
                                <!-- KINOVA -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/4.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                        </div>
                        <div class="swiper-slide brand-col">
                            <figure class="brand-wrapper">
                                <!-- Galaxy -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/5.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                            <figure class="brand-wrapper">
                                <!-- Sass -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/6.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                        </div>
                        <div class="swiper-slide brand-col">
                            <figure class="brand-wrapper">
                                <!-- skusuite -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/7.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                            <figure class="brand-wrapper">
                                <!-- Auto Group -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/8.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                        </div>
                        <div class="swiper-slide brand-col">
                            <figure class="brand-wrapper">
                                <!-- RED -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/9.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                            <figure class="brand-wrapper">
                                <!-- node -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/10.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                        </div>
                        <div class="swiper-slide brand-col">
                            <figure class="brand-wrapper">
                                <!-- Right Check -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/11.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                            <figure class="brand-wrapper">
                                <!-- skill star -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/12.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                        </div>

                        <div class="swiper-slide brand-col">
                            <figure class="brand-wrapper">
                                <!-- Right Check -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/11.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                            <figure class="brand-wrapper">
                                <!-- skill star -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/12.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                        </div>

                        <div class="swiper-slide brand-col">
                            <figure class="brand-wrapper">
                                <!-- Right Check -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/11.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                            <figure class="brand-wrapper">
                                <!-- skill star -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/12.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                        </div>
                        <div class="swiper-slide brand-col">
                            <figure class="brand-wrapper">
                                <!-- Right Check -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/11.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                            <figure class="brand-wrapper">
                                <!-- skill star -->
                                <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/brands/12.png" alt="Brand" width="410"
                                    height="186" />
                            </figure>
                        </div>

                    </div>
                </div>
                <!-- End of Brands Wrapper -->


             <!-- Your Recent Views -->
                <h2 class="title title-underline mb-4 ls-normal appear-animate">Your Recent Views</h2>
                <div class="swiper-container swiper-theme shadow-swiper appear-animate pb-4 mb-8" data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 2,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 3
                        },
                        '768': {
                            'slidesPerView': 5
                        },
                        '992': {
                            'slidesPerView': 6
                        },
                        '1200': {
                            'slidesPerView': 8
                        }
                    }
                }">
                    <div class="swiper-wrapper row cols-xl-8 cols-lg-6 cols-md-4 cols-2">
                        <div class="swiper-slide product-wrap mb-0">
                            <div class="product text-center product-absolute">
                                <figure class="product-media">
                                    <a href="{{ route('shop') }}">
                                        <!-- img-1 Women's Fashion Handbag-->
                                        <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/7-1.jpg" alt="Category image"
                                            width="130" height="146" style="background-color: #fff" />
                                    </a>
                                </figure>
                                <h4 class="product-name">
                                    <a href="{{ route('shop') }}">Women's Fashion Handbag</a>
                                </h4>
                            </div>
                        </div>
                        <!-- End of Product Wrap -->
                        <div class="swiper-slide product-wrap mb-0">
                            <div class="product text-center product-absolute">
                                <figure class="product-media">
                                    <a href="{{ route('shop') }}">
                                        <!-- Electric Frying Pan -->
                                        <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/7-2.jpg" alt="Category image"
                                            width="130" height="146" style="background-color: #fff" />
                                    </a>
                                </figure>
                                <h4 class="product-name">
                                    <a href="{{ route('shop') }}">Electric Frying Pan</a>
                                </h4>
                            </div>
                        </div>
                        <!-- End of Product Wrap -->
                        <div class="swiper-slide product-wrap mb-0">
                            <div class="product text-center product-absolute">
                                <figure class="product-media">
                                    <a href="{{ route('shop') }}">
                                        <!-- Black Winter Skating -->
                                        <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/7-3.jpg" alt="Category image"
                                            width="130" height="146" style="background-color: #fff" />
                                    </a>
                                </figure>
                                <h4 class="product-name">
                                    <a href="{{ route('shop') }}">Black Winter Skating</a>
                                </h4>
                            </div>
                        </div>
                        <!-- End of Product Wrap -->
                        <div class="swiper-slide product-wrap mb-0">
                            <div class="product text-center product-absolute">
                                <figure class="product-media">
                                    <a href="{{ route('shop') }}">
                                        <!-- HD Television -->
                                        <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/7-4.jpg" alt="Category image"
                                            width="130" height="146" style="background-color: #fff" />
                                    </a>
                                </figure>
                                <h4 class="product-name">
                                    <a href="{{ route('shop') }}">HD Television</a>
                                </h4>
                            </div>
                        </div>
                        <!-- End of Product Wrap -->
                        <div class="swiper-slide product-wrap mb-0">
                            <div class="product text-center product-absolute">
                                <figure class="product-media">
                                    <a href="{{ route('shop') }}">
                                        <!-- Home Sofa -->
                                        <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/7-5.jpg" alt="Category image"
                                            width="130" height="146" style="background-color: #fff" />
                                    </a>
                                </figure>
                                <h4 class="product-name">
                                    <a href="{{ route('shop') }}">Home Sofa</a>
                                </h4>
                            </div>
                        </div>
                        <!-- End of Product Wrap -->
                        <div class="swiper-slide product-wrap mb-0">
                            <div class="product text-center product-absolute">
                                <figure class="product-media">
                                    <a href="{{ route('shop') }}">
                                        <!-- USB Receipt -->
                                        <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/7-6.jpg" alt="Category image"
                                            width="130" height="146" style="background-color: #fff" />
                                    </a>
                                </figure>
                                <h4 class="product-name">
                                    <a href="{{ route('shop') }}">USB Receipt</a>
                                </h4>
                            </div>
                        </div>
                        <!-- End of Product Wrap -->
                        <div class="swiper-slide product-wrap mb-0">
                            <div class="product text-center product-absolute">
                                <figure class="product-media">
                                    <a href="{{ route('shop') }}">
                                        <!-- Electric Rice-Cooker -->
                                        <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/7-7.jpg" alt="Category image"
                                            width="130" height="146" style="background-color: #fff" />
                                    </a>
                                </figure>
                                <h4 class="product-name">
                                    <a href="{{ route('shop') }}">Electric Rice-Cooker</a>
                                </h4>
                            </div>
                        </div>
                        <!-- End of Product Wrap -->
                        <div class="swiper-slide product-wrap mb-0">
                            <div class="product text-center product-absolute">
                                <figure class="product-media">
                                    <a href="{{ route('shop') }}">
                                        <!-- Table Lamp -->
                                        <img src="{{ asset('frontend-assets') }}/assets/images/demos/demo1/products/7-8.jpg" alt="Category image"
                                            width="130" height="146" style="background-color: #fff" />
                                    </a>
                                </figure>
                                <h4 class="product-name">
                                    <a href="{{ route('shop') }}">Table Lamp</a>
                                </h4>
                            </div>
                        </div>
                        <!-- End of Product Wrap -->
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <!-- End of Reviewed Producs -->
            </div>
            <!--End of Catainer -->
        </main>
        <!-- End of Main -->
<!-- Start of Quick View -->


<div class="product product-single product-popup" id="quick_view_body">

</div>
<!-- End of Quick view -->
 <!-- Main JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
     $(document).on('click', '.quick_view', function(){
      var id = $(this).attr("id");
      $.ajax({
           url: "{{ url("/product-quick-view/") }}/"+id,
           type: 'get',
           success: function(data) {
                $("#quick_view_body").html(data);
           }
        });
     });

       //store coupon ajax call
//     $('#newsletter_form').submit(function(e){
//     e.preventDefault();
//     var url = $(this).attr('action');
//     var request =$(this).serialize();
//     $.ajax({
//       url:url,
//       type:'post',
//       async:false,
//       data:request,
//       success:function(data){
//         toastr.success(data);
//         $('#newsletter_form')[0].reset();
//       }
//     });
//   });
</script>
@endsection
