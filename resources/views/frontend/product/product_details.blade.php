@extends('layouts.app')
    @section('navbar')

    @include('layouts.front_partial.secondary_nav')
    @endsection
@section('content')
 <!-- Start of Main -->
<main class="main mb-10 pb-1">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Products</li>
        </ul>
        <ul class="product-nav list-style-none">
            <li class="product-nav-prev">
                <a href="#">
                    <i class="w-icon-angle-left"></i>
                </a>
                <span class="product-nav-popup">
                    <img src="{{ asset('frontend-assets') }}/assets/images/products/product-nav-prev.jpg" alt="Product" width="110"
                        height="110" />
                    <span class="product-name">Soft Sound Maker</span>
                </span>
            </li>
            <li class="product-nav-next">
                <a href="#">
                    <i class="w-icon-angle-right"></i>
                </a>
                <span class="product-nav-popup">
                    <img src="{{ asset('frontend-assets') }}/assets/images/products/product-nav-next.jpg" alt="Product" width="110"
                        height="110" />
                    <span class="product-name">Fabulous Sound Speaker</span>
                </span>
            </li>
        </ul>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content">
                    <div class="product product-single row">
                        <div class="col-md-6 mb-6">
                            @php
                                $images=json_decode($product->images,true);
                                $color=explode(',',$product->color);
                                $sizes=explode(',',$product->size);
                            @endphp
                            <div class="product-gallery product-gallery-sticky">
                                <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                                    'navigation': {
                                        'nextEl': '.swiper-button-next',
                                        'prevEl': '.swiper-button-prev'
                                    }
                                }">
                                    <div class="swiper-wrapper row cols-1 gutter-no">
                                        <div class="swiper-slide">
                                            <figure class="product-image">
                                                <img src="{{ asset($product->thumbnail) }}"
                                                    data-zoom-image="{{ asset($product->thumbnail) }}"
                                                    alt="Electronics Black Wrist Watch" width="800" height="900">
                                            </figure>
                                        </div>

                                        @isset($images)
                                            @foreach($images as $key => $image)
                                                <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        <img src="{{ asset($image) }}"
                                                            data-zoom-image="{{ asset($image) }}"
                                                            alt="Electronics Black Wrist Watch" width="800" height="900">
                                                    </figure>
                                                </div>
                                            @endforeach
                                        @endisset
                                    </div>
                                    <a href="#" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a>
                                </div>
                                <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                    'navigation': {
                                        'nextEl': '.swiper-button-next',
                                        'prevEl': '.swiper-button-prev'
                                    }
                                }">
                                    <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                                        @php
                                            $images=json_decode($product->images,true);
                                        @endphp
                                        @isset($images)
                                            @foreach($images as $key => $image)
                                                <div class="product-thumb swiper-slide">
                                                    <img src="{{ asset($image) }}"
                                                    alt="Product Thumb" width="800" height="900">
                                                </div>
                                            @endforeach
                                        @endisset
                                    </div>
                                    <button class="swiper-button-next"></button>
                                    <button class="swiper-button-prev"></button>
                                </div>
                            </div>
                        </div>

                            <div class="col-md-6 mb-4 mb-md-6">
                                <form action="{{ route('add.to.cart.quickview') }}" method="post" id="add_to_cart">
                                @csrf
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    @if($product->discount_price==NULL)
                                    <input type="hidden" name="price" value="{{$product->selling_price}}">
                                    @else
                                    <input type="hidden" name="price" value="{{$product->discount_price}}">
                                    @endif
                                <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                    <h1 class="product-title">{{ $product->name }}</h1>
                                    <div class="product-bm-wrapper">
                                        <div class="product-meta">
                                            <div class="product-categories">
                                                Category:
                                                <span class="product-category"><a href="#">{{ $product->childcategory->childcategory_name }}</a></span>
                                            </div>
                                            <div class="product-categories">
                                                Stock:
                                                <span class="product-category"><a href="#">{{ $product->stock_quantity }}</a></span>
                                            </div>
                                            <div class="product-categories">
                                                Unit:
                                                <span class="product-category"><a href="#">{{ $product->unit }}</a></span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="product-divider">

                                    <div class="product-price"><ins class="new-price">{{ $setting->currency }}{{ $product->discount_price }}</ins></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="#product-tab-reviews" class="rating-reviews scroll-to">(3
                                            Reviews)</a>
                                    </div>

                                    <div class="product-short-desc">
                                        <ul class="list-type-check list-style-none">
                                            <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                                            <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                                            <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                                        </ul>
                                    </div>

                                    <hr class="product-divider">

                                    @isset($product->color)
                                        <div class="product-form product-variation-form product-color-swatch">
                                            <label>Color: </label>
                                            <select class="custom-select form-control-sm" name="color" style="min-width: 120px;">
                                                @foreach($color as $row)
                                                    <option value="{{ $row }}">{{ $row }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endisset

                                    @isset($product->size)
                                        <div class="product-form product-variation-form product-size-swatch">
                                            <label>Size: </label>
                                            <select class="custom-select form-control-sm" name="size" style="min-width: 120px;">
                                                @foreach($sizes as $size)
                                                    <option value="{{ $size }}">{{ $size }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endisset


                                    <div class="fix-bottom product-sticky-content sticky-content">
                                        <div class="product-form container">
                                            <div class="product-qty-form">
                                                <div class="input-group">
                                                    <input type="number" min="1" max="100" name="qty" class="form-control-sm" value="1" style="min-width: 120px;">
                                                </div>
                                            </div>


                                            @if($product->stock_quantity<1)
								  	            <button class="btn btn-outline-danger" disabled="">Stock Out</button>
								  	        @else
                                                <button class="btn btn-primary btn-cartadd" type="submit">
                                                    <i class="w-icon-cart"></i>
                                                    <span class="loading d-none">....</span> Add to cart
                                                </button>
								            @endif

                                        </div>
                                    </div>

                                    <div class="social-links-wrapper">
                                        <div class="social-links">
                                            <div class="social-icons social-no-color border-thin">
                                                <a href="https://www.facebook.com/" class="social-icon social-facebook w-icon-facebook"></a>
                                                <a href="https://www.twitter.com/" class="social-icon social-twitter w-icon-twitter"></a>
                                                <a href="https://www.pinterest.com/"
                                                    class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                                <a href="https://www.linkedin.com/"
                                                    class="social-icon social-youtube fab fa-linkedin-in"></a>
                                            </div>
                                        </div>
                                        <span class="divider d-xs-show"></span>
                                        <div class="product-link-wrapper d-flex">
                                            <a href="{{ route('add.wishlist',$product->id) }}">
                                                <div class="product_fav btn-product-icon" style="margin-top: 6px;">
                                                    <i class="fas fa-heart" style="font-size: 20px;"></i>
                                                </div>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>

                    </div>
                    <div class="frequently-bought-together mt-5">
                        <h2 class="title title-underline">Frequently Bought Together</h2>
                        <div class="bought-together-products row mt-8 pb-4">
                            <div class="product product-wrap text-center">
                                <figure class="product-media">
                                    <img src="{{ asset('frontend-assets') }}/assets/images/products/default/bought-1.jpg" alt="Product"
                                        width="138" height="138" />
                                    <div class="product-checkbox">
                                        <input type="checkbox" class="custom-checkbox" id="product_check1"
                                            name="product_check1">
                                        <label></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="#">Electronics Black Wrist Watch</a>
                                    </h4>
                                    <div class="product-price">$40.00</div>
                                </div>
                            </div>
                            <div class="product product-wrap text-center">
                                <figure class="product-media">
                                    <img src="{{ asset('frontend-assets') }}/assets/images/products/default/bought-2.jpg" alt="Product"
                                        width="138" height="138" />
                                    <div class="product-checkbox">
                                        <input type="checkbox" class="custom-checkbox" id="product_check2"
                                            name="product_check2">
                                        <label></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="#">Apple Laptop</a>
                                    </h4>
                                    <div class="product-price">$1,800.00</div>
                                </div>
                            </div>
                            <div class="product product-wrap text-center">
                                <figure class="product-media">
                                    <img src="{{ asset('frontend-assets') }}/assets/images/products/default/bought-3.jpg" alt="Product"
                                        width="138" height="138" />
                                    <div class="product-checkbox">
                                        <input type="checkbox" class="custom-checkbox" id="product_check3"
                                            name="product_check3">
                                        <label></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="#">White Lenovo Headphone</a>
                                    </h4>
                                    <div class="product-price">$34.00</div>
                                </div>
                            </div>
                            <div class="product-button">
                                <div class="bought-price font-weight-bolder text-primary ls-50">$1,874.00</div>
                                <div class="bought-count">For 3 items</div>
                                <a href="cart.html" class="btn btn-dark btn-rounded">Add All To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#product-tab-description" class="nav-link active">Description</a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-tab-specification" class="nav-link">Specification</a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-tab-vendor" class="nav-link">Vendor Info</a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-tab-reviews" class="nav-link">Customer Reviews (3)</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="product-tab-description">
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-5">
                                        <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt arcu cursus vitae congue mauris.
                                            Sagittis id consectetur purus ut. Tellus rutrum tellus pelle Vel
                                            pretium lectus quam id leo in vitae turpis massa.</p>
                                        <ul class="list-type-check">
                                            <li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis
                                                elit.
                                            </li>
                                            <li>Vivamus finibus vel mauris ut vehicula.</li>
                                            <li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <div class="banner banner-video product-video br-xs">
                                            <figure class="banner-media">
                                                <a href="#">
                                                    <img src="{{ asset('frontend-assets') }}/assets/images/products/video-banner-610x300.jpg"
                                                        alt="banner" width="610" height="300"
                                                        style="background-color: #bebebe;">
                                                </a>
                                                <a class="btn-play-video btn-iframe"
                                                    href="assets/video/memory-of-a-woman.mp4"></a>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="row cols-md-3">
                                    <div class="mb-3">
                                        <h5 class="sub-title font-weight-bold"><span class="mr-3">1.</span>Free
                                            Shipping &amp; Return</h5>
                                        <p class="detail pl-5">We offer free shipping for products on orders
                                            above 50$ and offer free delivery for all orders in US.</p>
                                    </div>
                                    <div class="mb-3">
                                        <h5 class="sub-title font-weight-bold"><span>2.</span>Free and Easy
                                            Returns</h5>
                                        <p class="detail pl-5">We guarantee our products and you could get back
                                            all of your money anytime you want in 30 days.</p>
                                    </div>
                                    <div class="mb-3">
                                        <h5 class="sub-title font-weight-bold"><span>3.</span>Special Financing
                                        </h5>
                                        <p class="detail pl-5">Get 20%-50% off items over 50$ for a month or
                                            over 250$ for a year with our special credit card.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="product-tab-specification">
                                <ul class="list-none">
                                    <li>
                                        <label>Model</label>
                                        <p>Skysuite 320</p>
                                    </li>
                                    <li>
                                        <label>Color</label>
                                        <p>Black</p>
                                    </li>
                                    <li>
                                        <label>Size</label>
                                        <p>Large, Small</p>
                                    </li>
                                    <li>
                                        <label>Guarantee Time</label>
                                        <p>3 Months</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane" id="product-tab-vendor">
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-4">
                                        <figure class="vendor-banner br-sm">
                                            <img src="{{ asset('frontend-assets') }}/assets/images/products/vendor-banner.jpg"
                                                alt="Vendor Banner" width="610" height="295"
                                                style="background-color: #353B55;" />
                                        </figure>
                                    </div>
                                    <div class="col-md-6 pl-2 pl-md-6 mb-4">
                                        <div class="vendor-user">
                                            <figure class="vendor-logo mr-4">
                                                <a href="#">
                                                    <img src="{{ asset('frontend-assets') }}/assets/images/products/vendor-logo.jpg"
                                                        alt="Vendor Logo" width="80" height="80" />
                                                </a>
                                            </figure>
                                            <div>
                                                <div class="vendor-name"><a href="#">Jone Doe</a></div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 90%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <a href="#" class="rating-reviews">(32 Reviews)</a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="vendor-info list-style-none">
                                            <li class="store-name">
                                                <label>Store Name:</label>
                                                <span class="detail">OAIO Store</span>
                                            </li>
                                            <li class="store-address">
                                                <label>Address:</label>
                                                <span class="detail">Steven Street, El Carjon, CA 92020, United
                                                    States (US)</span>
                                            </li>
                                            <li class="store-phone">
                                                <label>Phone:</label>
                                                <a href="#tel:">1234567890</a>
                                            </li>
                                        </ul>
                                        <a href="vendor-dokan-store.html"
                                            class="btn btn-dark btn-link btn-underline btn-icon-right">Visit
                                            Store<i class="w-icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                <p class="mb-5"><strong class="text-dark">L</strong>orem ipsum dolor sit amet,
                                    consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua.
                                    Venenatis tellus in metus vulputate eu scelerisque felis. Vel pretium
                                    lectus quam id leo in vitae turpis massa. Nunc id cursus metus aliquam.
                                    Libero id faucibus nisl tincidunt eget. Aliquam id diam maecenas ultricies
                                    mi eget mauris. Volutpat ac tincidunt vitae semper quis lectus. Vestibulum
                                    mattis ullamcorper velit sed. A arcu cursus vitae congue mauris.
                                </p>
                                <p class="mb-2"><strong class="text-dark">A</strong> arcu cursus vitae congue
                                    mauris. Sagittis id consectetur purus
                                    ut. Tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla.
                                    Diam in
                                    arcu cursus euismod quis. Eget sit amet tellus cras adipiscing enim eu. In
                                    fermentum et sollicitudin ac orci phasellus. A condimentum vitae sapien
                                    pellentesque
                                    habitant morbi tristique senectus et. In dictum non consectetur a erat. Nunc
                                    scelerisque viverra mauris in aliquam sem fringilla.</p>
                            </div>
                            <div class="tab-pane" id="product-tab-reviews">
                                <div class="row mb-4">
                                    <div class="col-xl-4 col-lg-5 mb-4">
                                        <div class="ratings-wrapper">
                                            <div class="avg-rating-container">
                                                <h4 class="avg-mark font-weight-bolder ls-50">3.3</h4>
                                                <div class="avg-rating">
                                                    <p class="text-dark mb-1">Average Rating</p>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 60%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <a href="#" class="rating-reviews">(3 Reviews)</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="ratings-value d-flex align-items-center text-dark ls-25">
                                                <span
                                                    class="text-dark font-weight-bold">66.7%</span>Recommended<span
                                                    class="count">(2 of 3)</span>
                                            </div>
                                            <div class="ratings-list">
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm ">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>70%</mark>
                                                    </div>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 80%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm ">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>30%</mark>
                                                    </div>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 60%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm ">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>40%</mark>
                                                    </div>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 40%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm ">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>0%</mark>
                                                    </div>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 20%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm ">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>0%</mark>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-7 mb-4">
                                        <div class="review-form-wrapper">
                                            <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your
                                                Review</h3>
                                            <p class="mb-3">Your email address will not be published. Required
                                                fields are marked *</p>
                                            <form action="{{ route('store.review') }}" method="post" class="review-form">
								                @csrf
                                                <div class="rating-form">
                                                    <label for="rating" style="margin-right: 10px;
}">Your Rating Of This Product :</label>

                                                    <select name="rating" id="rating" required=""
                                                        >
                                                        <option value="">Rate…</option>
                                                        <option value="5">Perfect</option>
                                                        <option value="4">Good</option>
                                                        <option value="3">Average</option>
                                                        <option value="2">Not that bad</option>
                                                        <option value="1">Very poor</option>
                                                    </select>

                                                </div>
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <textarea cols="30" rows="6"
                                                    placeholder="Write Your Review Here..." name="review" class="form-control"
                                                    id="review"></textarea>
                                                @if(Auth::check())
                                                    <button type="submit" class="btn btn-dark">Submit
                                                    Review</button>
                                                @else
							                        <p style="color: red;">Please at first login to your account for submit a review.</p>
							                    @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a href="#show-all" class="nav-link active" style="display:none;">Show All</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="show-all">
                                        @foreach($review as $row)
                                            <ul class="comments list-style-none">
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <figure class="comment-avatar">
                                                            <img src="{{ asset('frontend-assets') }}/assets/images/agents/1-100x100.png"
                                                                alt="Commenter Avatar" width="90" height="90">
                                                        </figure>
                                                        <div class="comment-content">
                                                            <h4 class="comment-author">
                                                                <a href="#">{{ $row->user->name }}</a>
                                                                <span class="comment-date">( {{ date('d F , Y'), strtotime($row->review_date) }} )</span>
                                                            </h4>
                                                            <div class="ratings-container comment-rating">

                                                                @if($row->rating==5)
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 100%;"></span>
                                                                        <span class="tooltiptext tooltip-top">5.00</span>
                                                                    </div>
                                                                    @elseif($row->rating==4)
                                                                        <div class="ratings-full">
                                                                            <span class="ratings" style="width: 80%;"></span>
                                                                            <span class="tooltiptext tooltip-top">4.00</span>
                                                                        </div>
                                                                    @elseif($row->rating==3)
                                                                        <div class="ratings-full">
                                                                            <span class="ratings" style="width: 60%;"></span>
                                                                            <span class="tooltiptext tooltip-top">3.00</span>
                                                                        </div>
                                                                    @elseif($row->rating==2)
                                                                        <div class="ratings-full">
                                                                            <span class="ratings" style="width: 40%;"></span>
                                                                            <span class="tooltiptext tooltip-top">2.00</span>
                                                                        </div>
                                                                    @elseif($row->rating==1)
                                                                    <div>
                                                                        <div class="ratings-full">
                                                                            <span class="ratings" style="width: 20%;"></span>
                                                                            <span class="tooltiptext tooltip-top">1.00</span>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                            </div>
                                                            <p>{{ $row->review }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="vendor-product-section">
                        <div class="title-link-wrapper mb-4">
                            <h4 class="title text-left">More Products From This Vendor</h4>
                            <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                Products<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                        <div class="swiper-container swiper-theme" data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 2,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 3
                                },
                                '768': {
                                    'slidesPerView': 4
                                },
                                '992': {
                                    'slidesPerView': 3
                                }
                            }
                        }">
                            <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('frontend-assets') }}/assets/images/products/default/1-1.jpg" alt="Product"
                                                width="300" height="338" />
                                            <img src="{{ asset('frontend-assets') }}/assets/images/products/default/1-2.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="shop-banner-sidebar.html">Accessories</a>
                                        </div>
                                        <h4 class="product-name"><a href="product-default.html">Sticky Pencil</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">$20.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('frontend-assets') }}/assets/images/products/default/2.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="shop-banner-sidebar.html">Electronics</a>
                                        </div>
                                        <h4 class="product-name"><a href="product-default.html">Mini
                                                Multi-Functional Cooker</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(5 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">
                                                <ins class="new-price">$480.00</ins><del
                                                    class="old-price">$534.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('frontend-assets') }}/assets/images/products/default/3.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="shop-banner-sidebar.html">Sports</a></div>
                                        <h4 class="product-name"><a href="product-default.html">Skate Pan</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">
                                                <ins class="new-price">$278.00</ins><del
                                                    class="old-price">$310.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('frontend-assets') }}/assets/images/products/default/4-1.jpg" alt="Product"
                                                width="300" height="338" />
                                            <img src="{{ asset('frontend-assets') }}/assets/images/products/default/4-2.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="shop-banner-sidebar.html">Accessories</a>
                                        </div>
                                        <h4 class="product-name"><a href="product-default.html">Clip Attachment</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(5 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">$40.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="related-product-section">
                        <div class="title-link-wrapper mb-4">
                            <h4 class="title">Related Products</h4>
                            <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                Products<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                        <div class="swiper-container swiper-theme" data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 2,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 3
                                },
                                '768': {
                                    'slidesPerView': 4
                                },
                                '992': {
                                    'slidesPerView': 3
                                }
                            }
                        }">
                            <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('frontend-assets') }}/assets/images/products/default/5.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Drone</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">$632.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('frontend-assets') }}/assets/images/products/default/6.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Official Camera</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">
                                                <ins class="new-price">$263.00</ins><del
                                                    class="old-price">$300.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('frontend-assets') }}/assets/images/products/default/7-1.jpg" alt="Product"
                                                width="300" height="338" />
                                            <img src="{{ asset('frontend-assets') }}/assets/images/products/default/7-2.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Phone Charge Pad</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(8 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">$23.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('frontend-assets') }}/assets/images/products/default/8.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Fashionalble
                                                Pencil</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(9 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">$50.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- End of Main Content -->
                <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                    <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                    <div class="sidebar-content scrollable">
                        <div class="sticky-sidebar">
                            <div class="widget widget-icon-box mb-6">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="w-icon-truck"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">Pickup Point of this Product</h4>
                                        <p>{{ $product->pickuppoint->pickup_point_name }}</p>
                                    </div>
                                </div>
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="w-icon-bag"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">Secure Payment</h4>
                                        <p>We ensure secure payment</p>
                                    </div>
                                </div>
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="w-icon-money"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">Money Back Guarantee</h4>
                                        <p>Any back within 30 days</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Widget Icon Box -->

                            <div class="widget widget-banner mb-9">
                                <div class="banner banner-fixed br-sm">

                                    <h4 class="title title-link font-weight-bold">Product Video</h4>
                                    <iframe width="340" height="205" src="https://www.youtube.com/embed/{{ $product->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                            <!-- End of Widget Banner -->

                            <div class="widget widget-products">
                                <div class="title-link-wrapper mb-2">
                                    <h4 class="title title-link font-weight-bold">More Products</h4>
                                </div>

                                <div class="swiper nav-top">
                                    <div class="swiper-container swiper-theme nav-top" data-swiper-options = "{
                                        'slidesPerView': 1,
                                        'spaceBetween': 20,
                                        'navigation': {
                                            'prevEl': '.swiper-button-prev',
                                            'nextEl': '.swiper-button-next'
                                        }
                                    }">
                                        <div class="swiper-wrapper">
                                            <div class="widget-col swiper-slide">
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{ asset('frontend-assets') }}/assets/images/shop/13.jpg" alt="Product"
                                                                width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Smart Watch</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$80.00 - $90.00</div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{ asset('frontend-assets') }}/assets/images/shop/14.jpg" alt="Product"
                                                                width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Sky Medical Facility</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$58.00</div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{ asset('frontend-assets') }}/assets/images/shop/15.jpg" alt="Product"
                                                                width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Black Stunt Motor</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$374.00</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-col swiper-slide">
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{ asset('frontend-assets') }}/assets/images/shop/16.jpg" alt="Product"
                                                                width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Skate Pan</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$278.00</div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{ asset('frontend-assets') }}/assets/images/shop/17.jpg" alt="Product"
                                                                width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Modern Cooker</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$324.00</div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{ asset('frontend-assets') }}/assets/images/shop/18.jpg" alt="Product"
                                                                width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">CT Machine</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$236.00</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- End of Sidebar -->
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
<!-- End of Main -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
	 //store coupon ajax call
  $('#add_to_cart').submit(function(e){
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
        $('#add_to_cart')[0].reset();
        cart();
      }
    });
  });
</script>

@endsection
