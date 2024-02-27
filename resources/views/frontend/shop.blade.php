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
                        <li>Shop</li>
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
                            <a href="" class="btn btn-dark btn-rounded btn-icon-right">Discover
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
                                        <a href="{{ route('brandwise.product',$row->id) }}">
                                            <figure>
                                                <img src="{{ asset($row->brand_logo) }}" alt="Brand" height="90px" />
                                            </figure>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <!-- End of Shop Brands-->

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
                                        @foreach($category as $row)
                                            <li><a href="{{ route('categorywise.product',$row->id) }}">{{ $row->category_name }}</a></li>
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
                                </div>
                                <!-- End of Sidebar Content -->
                            </div>
                            <!-- End of Sidebar Content -->
                        </aside>
                        <!-- End of Shop Sidebar -->

                        <!-- Start of Shop Main Content -->
                        <div class="main-content">

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
