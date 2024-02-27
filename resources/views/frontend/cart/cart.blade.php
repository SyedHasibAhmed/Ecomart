@extends('layouts.app')
    @section('navbar')

    @include('layouts.front_partial.secondary_nav')
    @endsection
@section('content')

 <!-- Start of Main -->
 <main class="main cart">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb shop-breadcrumb bb-no">
                        <li class="active"><a href="{{ route('cart') }}">Shopping Cart</a></li>
                        <li><a href="{{ route('checkout') }}">Checkout</a></li>
                        <li><a href="#">Order Complete</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content">
                <div class="container">
                    <div class="row gutter-lg mb-10">
                        <div class="col-lg-12 pr-lg-8 mb-6">
                            <table class="shop-table cart-table">
                                <thead>
                                    <tr>
                                        <th class="product-name"><span>Product</span></th>
                                        <th></th>
                                        <th class="product-price"><span>Price</span></th>
                                        <th class="product-quantity"><span>Quantity</span></th>
                                        <th class="product-subtotal"><span>Subtotal</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($content as $row)
                                    @php
                                        $product=DB::table('products')->where('id',$row->id)->first();
                                    @endphp
                                    <tr>
                                        <td class="product-thumbnail">
                                            <div class="p-relative">
                                                <a href="#">
                                                    <figure>
                                                        <img src="{{ asset($row->options->thumbnail) }}" alt="product"
                                                            width="300" height="338">
                                                    </figure>
                                                </a>
                                                <button type="submit" class="btn btn-close" data-id="{{ $row->rowId }}" id="removeProduct"><i
                                                        class="fas fa-times"></i></button>
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            <a href="#">
                                                {{ substr($row->name,0,15) }}..
                                            </a>
                                        </td>

                                        <td class="product-quantity">
                                            <div class="input-group">
                                                <input class="form-control qty" type="number" name="qty" data-id="{{ $row->rowId }}"  value="{{ $row->qty }}" min="1" required="">
                                                <!-- <input type="number" class="form-control-sm qty" name="qty" data-id="{{ $row->rowId }}"  value="{{ $row->qty }}" min="1" required=""> -->
                                                <!-- <button class="quantity-plus w-icon-plus"></button>
                                                <button class="quantity-minus w-icon-minus"></button> -->
                                            </div>
                                        </td>
                                        <td class="product-price"><span class="amount">{{ $setting->currency }}{{ $row->price }} x {{$row->qty }}</span></td>
                                        <td class="product-subtotal">
                                            <span class="amount">{{ $setting->currency }} {{ $row->qty*$row->price }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <h3 class="cart-title text-uppercase" style="margin-top:40px;">Cart Totals</h3>
                                    <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                        <label class="ls-25">Subtotal</label>
                                        <span>{{ $setting->currency }}{{ Cart::priceTotal() }}</span>
                                    </div>

                                    <hr class="divider">


                            <div class="cart-action mb-6">
                                <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                                <a href="{{ route('cart.empty') }}" class="btn btn-rounded btn-default btn-clear" name="clear_cart" value="Clear Cart">Clear Cart</a>
                                <!-- <button type="submit" class="btn btn-rounded btn-update disabled" name="update_cart" value="Update Cart">Update Cart</button> -->
                                <a href="{{ route('checkout') }}"
                                    class="btn btn-dark btn-rounded">
                                    Proceed to checkout<i class="w-icon-long-arrow-right"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript">

		 $('body').on('click','#removeProduct', function(){
		    let id=$(this).data('id');
		    $.ajax({
		      url:'{{ url('cartproduct/remove/') }}/'+id,
		      type:'get',
		      async:false,
		      success:function(data){
		        toastr.success(data);
		        location.reload();
		      }
		    });
		  });

		 //qty update with ajax
		 $('body').on('blur','.qty', function(){
		    let qty=$(this).val();
		    let rowId=$(this).data('id');
		    $.ajax({
		      url:'{{ url('cartproduct/updateqty/') }}/'+rowId+'/'+qty,
		      type:'get',
		      async:false,
		      success:function(data){
		        toastr.success(data);
		        location.reload();
		      }
		    });
		  });


	</script>

@endsection
