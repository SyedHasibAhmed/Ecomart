@extends('layouts.app')
    @section('navbar')
    @include('layouts.front_partial.secondary_nav')
    @endsection
@section('content')

 <!-- Start of Main -->
 <main class="main">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Shop/Category/Subcategory/Childcategory</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <!-- Start of Shop Banner -->
                    <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs"
                        style="background-image: url({{ asset('frontend-assets') }}/assets/images/shop/banner1.jpg); background-color: #FFC74E;">
                        <div class="banner-content">
                            <h4 class="banner-subtitle font-weight-bold">Accessories Collection</h4>
                            <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">Smart Wrist
                                Watches</h3>
                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Discover
                                Now<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- End of Shop Banner -->

                    <div class="shop-default-brands mb-5">
                        <div class="brands-swiper swiper-container swiper-theme "
                            data-swiper-options="{
                                'slidesPerView': 2,
                                'breakpoints': {
                                    '576': {
                                        'slidesPerView': 3
                                    },
                                    '768': {
                                        'slidesPerView': 4
                                    },
                                    '992': {
                                        'slidesPerView': 6
                                    },
                                    '1200': {
                                        'slidesPerView': 7
                                    }
                                },
                                'autoplay': {
                                    'delay': 4000,
                                    'disableOnInteraction': false
                                }
                            }">
                            <div class="swiper-wrapper row gutter-no cols-xl-7 cols-lg-6 cols-md-3 cols-sm-2 cols-1">
                                @foreach($brand as $row)
                                    <div class="swiper-slide" style="width: 100px;">
                                        <figure>
                                            <img src="{{ asset($row->brand_logo) }}" alt="Brand" height="90px" />
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <!-- End of Shop Brands-->

                    <!-- Start of Shop Category -->
                    <div class="shop-default-category category-ellipse-section mb-6">
                        <div class="swiper-container swiper-theme shadow-swiper"
                            data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 2,
                            'breakpoints': {
                                '480': {
                                    'slidesPerView': 3
                                },
                                '576': {
                                    'slidesPerView': 4
                                },
                                '768': {
                                    'slidesPerView': 6
                                },
                                '992': {
                                    'slidesPerView': 7
                                },
                                '1200': {
                                    'slidesPerView': 8,
                                    'spaceBetween': 30
                                }
                            }
                        }">
                            <div class="swiper-wrapper row gutter-lg cols-xl-8 cols-lg-7 cols-md-6 cols-sm-4 cols-xs-3 cols-2">
                                <div class="swiper-slide category-wrap">
                                    <div class="category category-ellipse">
                                        <figure class="category-media">
                                            <a href="shop-banner-sidebar.html">
                                                <img src="{{ asset('frontend-assets') }}/assets/images/categories/category-4.jpg" alt="Categroy"
                                                    width="190" height="190" style="background-color: #5C92C0;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="shop-banner-sidebar.html">Sports</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide category-wrap">
                                    <div class="category category-ellipse">
                                        <figure class="category-media">
                                            <a href="shop-banner-sidebar.html">
                                                <img src="{{ asset('frontend-assets') }}/assets/images/categories/category-5.jpg" alt="Categroy"
                                                    width="190" height="190" style="background-color: #B8BDC1;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="shop-banner-sidebar.html">Babies</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide category-wrap">
                                    <div class="category category-ellipse">
                                        <figure class="category-media">
                                            <a href="shop-banner-sidebar.html">
                                                <img src="{{ asset('frontend-assets') }}/assets/images/categories/category-6.jpg" alt="Categroy"
                                                    width="190" height="190" style="background-color: #99C4CA;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="shop-banner-sidebar.html">Sneakers</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide category-wrap">
                                    <div class="category category-ellipse">
                                        <figure class="category-media">
                                            <a href="shop-banner-sidebar.html">
                                                <img src="{{ asset('frontend-assets') }}/assets/images/categories/category-7.jpg" alt="Categroy"
                                                    width="190" height="190" style="background-color: #4E5B63;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="shop-banner-sidebar.html">Cameras</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide category-wrap">
                                    <div class="category category-ellipse">
                                        <figure class="category-media">
                                            <a href="shop-banner-sidebar.html">
                                                <img src="{{ asset('frontend-assets') }}/assets/images/categories/category-8.jpg" alt="Categroy"
                                                    width="190" height="190" style="background-color: #D3E5EF;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="shop-banner-sidebar.html">Games</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide category-wrap">
                                    <div class="category category-ellipse">
                                        <figure class="category-media">
                                            <a href="shop-banner-sidebar.html">
                                                <img src="{{ asset('frontend-assets') }}/assets/images/categories/category-9.jpg" alt="Categroy"
                                                    width="190" height="190" style="background-color: #65737C;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="shop-banner-sidebar.html">Kitchen</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide category-wrap">
                                    <div class="category category-ellipse">
                                        <figure class="category-media">
                                            <a href="shop-banner-sidebar.html">
                                                <img src="{{ asset('frontend-assets') }}/assets/images/categories/category-20.jpg" alt="Categroy"
                                                    width="190" height="190" style="background-color: #E4E4E4;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="shop-banner-sidebar.html">Watches</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide category-wrap">
                                    <div class="category category-ellipse">
                                        <figure class="category-media">
                                            <a href="shop-banner-sidebar.html">
                                                <img src="{{ asset('frontend-assets') }}/assets/images/categories/category-21.jpg" alt="Categroy"
                                                    width="190" height="190" style="background-color: #D3D8DE;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="shop-banner-sidebar.html">Clothes</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <!-- End of Shop Category -->

                    <!-- Start of Shop Content -->
                    <div class="shop-content row gutter-lg mb-10">
                        <!-- Start of Sidebar, Shop Sidebar -->
                        <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                            <!-- Start of Sidebar Overlay -->
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                            <!-- Start of Sidebar Content -->
                            <div class="sidebar-content scrollable">
                                <!-- Start of Sticky Sidebar -->
                                <div class="sticky-sidebar">
                                    <div class="filter-actions">
                                        <label>Filter :</label>
                                        <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                                    </div>
                                    <!-- Start of Collapsible widget -->
                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title"><label>All Categories</label></h3>
                                        <ul class="widget-body filter-items search-ul">
                                        @foreach($childcategories as $row)
                                            <li><a href="{{ route('childcategorywise.product',$row->id) }}">{{ $row->childcategory_name }}</a></li>
                                        @endforeach
                                        </ul>

                                    </div>
                                    <!-- End of Collapsible Widget -->

                                    <!-- Start of Collapsible Widget -->
                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title"><label>Price</label></h3>
                                        <div class="widget-body">
                                            <ul class="filter-items search-ul">
                                                <li><a href="#">$0.00 - $100.00</a></li>
                                                <li><a href="#">$100.00 - $200.00</a></li>
                                                <li><a href="#">$200.00 - $300.00</a></li>
                                                <li><a href="#">$300.00 - $500.00</a></li>
                                                <li><a href="#">$500.00+</a></li>
                                            </ul>
                                            <form class="price-range">
                                                <input type="number" name="min_price" class="min_price text-center"
                                                    placeholder="$min"><span class="delimiter">-</span><input
                                                    type="number" name="max_price" class="max_price text-center"
                                                    placeholder="$max"><a href="#"
                                                    class="btn btn-primary btn-rounded">Go</a>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End of Collapsible Widget -->

                                    <!-- Start of Collapsible Widget -->
                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title"><label>Size</label></h3>
                                        <ul class="widget-body filter-items item-check mt-1">
                                            <li><a href="#">Extra Large</a></li>
                                            <li><a href="#">Large</a></li>
                                            <li><a href="#">Medium</a></li>
                                            <li><a href="#">Small</a></li>
                                        </ul>
                                    </div>
                                    <!-- End of Collapsible Widget -->

                                    <!-- Start of Collapsible Widget -->
                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title"><label>Brand</label></h3>
                                        <ul class="widget-body filter-items item-check mt-1">
                                            <li><a href="#">Elegant Auto Group</a></li>
                                            <li><a href="#">Green Grass</a></li>
                                            <li><a href="#">Node Js</a></li>
                                            <li><a href="#">NS8</a></li>
                                            <li><a href="#">Red</a></li>
                                            <li><a href="#">Skysuite Tech</a></li>
                                            <li><a href="#">Sterling</a></li>
                                        </ul>
                                    </div>
                                    <!-- End of Collapsible Widget -->

                                    <!-- Start of Collapsible Widget -->
                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title"><label>Color</label></h3>
                                        <ul class="widget-body filter-items item-check mt-1">
                                            <li><a href="#">Black</a></li>
                                            <li><a href="#">Blue</a></li>
                                            <li><a href="#">Brown</a></li>
                                            <li><a href="#">Green</a></li>
                                            <li><a href="#">Grey</a></li>
                                            <li><a href="#">Orange</a></li>
                                            <li><a href="#">Yellow</a></li>
                                        </ul>
                                    </div>
                                    <!-- End of Collapsible Widget -->
                                </div>
                                <!-- End of Sidebar Content -->
                            </div>
                            <!-- End of Sidebar Content -->
                        </aside>
                        <!-- End of Shop Sidebar -->

                        <!-- Start of Shop Main Content -->
                        <div class="main-content">
                            <nav class="toolbox sticky-toolbox sticky-content fix-top">
                                <div class="toolbox-left">
                                    <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle
                                        btn-icon-left d-block d-lg-none"><i
                                            class="w-icon-category"></i><span>Filters</span></a>
                                    <div class="toolbox-item toolbox-sort select-box text-dark">
                                        <label>Sort By :</label>
                                        <select name="orderby" class="form-control">
                                            <option value="default" selected="selected">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by latest</option>
                                            <option value="price-low">Sort by pric: low to high</option>
                                            <option value="price-high">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="toolbox-right">
                                    <div class="toolbox-item toolbox-show select-box">
                                        <select name="count" class="form-control">
                                            <option value="9">Show 9</option>
                                            <option value="12" selected="selected">Show 12</option>
                                            <option value="24">Show 24</option>
                                            <option value="36">Show 36</option>
                                        </select>
                                    </div>
                                    <div class="toolbox-item toolbox-layout">
                                        <a href="shop-banner-sidebar.html" class="icon-mode-grid btn-layout active">
                                            <i class="w-icon-grid"></i>
                                        </a>
                                        <a href="shop-list.html" class="icon-mode-list btn-layout">
                                            <i class="w-icon-list"></i>
                                        </a>
                                    </div>
                                </div>
                            </nav>
                            <div class="product-wrapper row cols-md-4 cols-sm-2 cols-2">
                                @foreach($products as $row)
                                    <div class="product-wrap">
                                        <div class="product text-center">
                                            <figure class="product-media">
                                                <a href="{{ route('product.details',$row->slug) }}">
                                                    <img src="{{ asset($row->thumbnail) }}" alt="Product" width="300"
                                                        height="338" />
                                                </a>
                                                <div class="product-action-horizontal">
                                                    <a href="{{ route('product.details',$row->slug) }}" class="btn-product-icon btn-cart w-icon-cart"
                                                        title="Add to cart"></a>
                                                    <a href="{{ route('add.wishlist',$row->id) }}"
                                                        title="Wishlist"><div class="product_fav btn-product-icon">
                                                  <i class="fas fa-heart"></i>
                                               </div></a>
                                                    <a href="#" class="btn-product-icon btn-quickview quick_view" id="{{ $row->id }}" title="Quick View"><i class="fas fa-eye"></i></a>
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-name">
                                                    <a href="{{ route('product.details',$row->slug) }}">{{ $row->name }}</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <a href="#" class="rating-reviews">(3 reviews)</a>
                                                </div>
                                                <div class="product-pa-wrapper">
                                                @if($row->discount_price==NULL)
                                                    <div class="product-price">
                                                        <ins class="new-price" style="color: #000;">{{ $setting->currency }}{{ $row->selling_price }}</ins>
                                                    </div>
                                                    @else
                                                    <div class="product-price">
                                                        <ins class="new-price" style="color: #000;">{{ $setting->currency }} {{ $row->discount_price }} <span>{{ $setting->currency }} {{ $row->selling_price }}</span></ins>
                                                    </div>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="toolbox toolbox-pagination justify-content-between">
                                <p class="showing-info mb-2 mb-sm-0">
                                    Showing<span>1-{{ count($products) }}</span>Products
                                </p>
                                <ul class="pagination">
                                    {{ $products->links() }}
                                </ul>
                            </div>
                        </div>
                        <!-- End of Shop Main Content -->
                    </div>
                    <!-- End of Shop Content -->
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->

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
