@php
    $color=explode(',',$product->color);
    $sizes=explode(',',$product->size);
@endphp

    <div class="row gutter-lg">
        <div class="closebtn" style="font-size: 26px;

    text-align: end;
    color: #fff;
    margin-top: -68px;
    position: absolute;
    right: -65px;">
            <span>x</span>
        </div>
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="product-gallery product-gallery-sticky">
                <figure class="product-image">
                    <img src="{{ asset($product->thumbnail) }}"
                        data-zoom-image="{{ asset($product->thumbnail) }}"
                        alt="Water Boil Black Utensil" width="800" height="900">
                </figure>

            </div>
        </div>
        <div class="col-md-6 overflow-hidden p-relative">
            <form action="{{ route('add.to.cart.quickview') }}" method="post" id="add_cart_form">
                @csrf
                {{-- cart add details --}}
                    <input type="hidden" name="id" value="{{$product->id}}">
                    @if($product->discount_price==NULL)
                    <input type="hidden" name="price" value="{{$product->selling_price}}">
                    @else
                    <input type="hidden" name="price" value="{{$product->discount_price}}">
                    @endif
                <div class="product-details scrollable pl-0">
                    <h2 class="product-title">{{ $product->name }}</h2>
                    <div class="product-bm-wrapper">

                        <figure class="brand">
                            <!-- Brand Image -->
                            <img src="{{ asset('frontend-assets') }}/assets/images/products/brand/brand-1.jpg" alt="Brand" width="102" height="48" />
                        </figure>

                        <div class="product-meta">
                            <div class="product-categories">
                                Category:
                                <span class="product-category"><a href="#">{{ $product->childcategory->childcategory_name }}</a></span>
                            </div>
                            <div class="product-categories">
                                <!-- Stock:
                                <span class="product-category"><a href="#">{{ $product->stock_quantity }}</a></span> -->
                                Stock: @if($product->stock_quantity<1) <span class="badge badge-danger">Stock Out</span> @else <span class="badge badge-success">Stock Available</span> @endif
                            </div>
                            <div class="product-categories">
                                Unit:
                                <span class="product-category"><a href="#">{{ $product->unit }}</a></span>
                            </div>
                        </div>
                    </div>

                    <hr class="product-divider">

                    @if($product->discount_price==NULL)
                        <div class="product-price">
                            <ins class="new-price">{{ $setting->currency }}{{ $product->selling_price }}</ins>
                        </div>
                        @else
                        <div class="product-price">
                            <ins class="new-price">{{ $setting->currency }} {{ $product->discount_price }} <span>{{ $setting->currency }} {{ $product->selling_price }}</span></ins>
                        </div>
                    @endif

                    <div class="ratings-container">
                        <div class="ratings-full">
                            <!-- rating icon -->
                            <span class="ratings" style="width: 80%;"></span>
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="#" class="rating-reviews">(3 Reviews)</a>
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

                    <div class="product-variation-price">
                        <span></span>
                    </div>

                    <div class="product-form">
                        <div class="product-qty-form">
                            <div class="input-group">
                                <!-- <input class="quantity form-control" placeholder="Quantity" name="qty" type="number" min="1" max="100"> -->
                                <input type="number" min="1" max="100" name="qty" class="form-control-sm" value="1" style="min-width: 120px;">
                                <!-- <button class="quantity-plus w-icon-plus"></button>
                                <button class="quantity-minus w-icon-minus"></button> -->
                            </div>
                        </div>

                        @if($product->stock_quantity<1)
                        <span class="text-danger">Stock Out</span>
                        @else
                        <!-- <button class="btn btn-primary btn-cart" type="submit">
                            <i class="w-icon-cart"></i>
                            <span class="loading d-none">....</span><span>Add to Cart</span>
                        </button> -->
                        <button class="btn btn-primary btn-cartadd" type="submit">
                            <i class="w-icon-cart"></i>
                               <span class="loading d-none">....</span> Add to cart</button>
                        @endif

                    </div>

                    <div class="social-links-wrapper">
                        <div class="social-links">
                            <!--  -->
                            <div class="social-icons social-no-color border-thin">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                <a href="#" class="social-icon social-youtube fab fa-linkedin-in"></a>
                            </div>
                        </div>
                        <span class="divider d-xs-show"></span>
                        <div class="product-link-wrapper d-flex">
                            <a href="{{ route('add.wishlist',$product->id) }}">
                                <div class="product_fav btn-product-icon">
                                    <i class="fas fa-heart"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<script type="text/javascript">
  //add to cart
  $('#add_cart_form').submit(function(e){
    e.preventDefault();
    $('.loading').removeClass('d-none');
    var url = $(this).attr('action');
    var request =$(this).serialize();
    $.ajax({
      url:url,
      type:'post',
      async:false,
      data:request,
      success:function(data){
        toastr.success(data);
        $('#add_cart_form')[0].reset();
        $('.loading').addClass('d-none');
        cart();
      }
    });
  });
</script>
