@extends('layouts.app')
    @section('navbar')

    @include('layouts.front_partial.secondary_nav')
    @endsection
@section('content')

 <!-- Start of Main -->
 <main class="main checkout">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="passed"><a href="{{ route('cart') }}">Shopping Cart</a></li>
                <li class="active"><a href="{{ route('checkout') }}">Checkout</a></li>
                <li><a href="order.html">Order Complete</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->


    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <div class="row mb-9">
                    <div class="col-lg-7 pr-lg-4 mb-4">
                        <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                            Billing Details
                        </h3>
                        <form class="form checkout-form" action="{{ route('order.place') }}" method="post" id="order-place">
                            @csrf
                            <div class="row gutter-sm">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-md" value="{{ Auth::user()->name }}" name="c_name" required>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-md" value="{{ Auth::user()->phone }}" name="c_phone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Country / Region *</label>
                                <input type="text" class="form-control form-control-md" name="c_country" required>
                            </div>
                            <div class="form-group">
                                <label>Shipping address *</label>
                                <input type="text" placeholder="House number and street name"
                                    class="form-control form-control-md mb-2" name="c_address" required>
                            </div>
                            <div class="row gutter-sm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Town / City *</label>
                                        <input type="text" class="form-control form-control-md" name="c_city" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ZIP *</label>
                                        <input type="text" class="form-control form-control-md" name="c_zipcode" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-7">
                                <label>Email address *</label>
                                <input type="email" class="form-control form-control-md" name="c_email" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="order-notes">Order notes (optional)</label>
                                <textarea class="form-control mb-0" id="order-notes" name="c_note" cols="30"
                                    rows="4"
                                    placeholder="Notes about your order, e.g special notes for delivery"></textarea>
                            </div>

                            <div class="payment-methods" id="payment_method" style="margin-top: 40px">
                                <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                <div class="accordion payment-accordion" style="margin-top: 12px; display: flex;">
                                    <div class="card" style="margin-right: 16px;">
                                        <div class="card-header">
                                            <input type="radio"  name="payment_type" value="Bkash">
                                            <label style="font-weight: 400; font-size: 15px;">Bkash</label>
                                        </div>
                                    </div>
                                    <div class="card" style="margin-right: 16px;">
                                        <div class="card-header">
                                            <input type="radio"  name="payment_type" value="Cash on delivery">
                                            <label style="font-weight: 400; font-size: 15px;">Cash on delivery</label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group place-order pt-6">
                                <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                            </div>
                            <span class="visually-hidden d-none progress">Progressing.....</span>
                        </form>
                    </div>
                    <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                        <div class="order-summary-wrapper sticky-sidebar">
                            <h3 class="title text-uppercase ls-10">Your Order</h3>
                            <div class="order-summary">
                                <table class="order-table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">
                                                <b>Product</b>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($content as $row)
                                    @php
                                        $product=DB::table('products')->where('id',$row->id)->first();
                                    @endphp
                                        <tr class="bb-no">
                                            <td class="product-name">{{ $row->name }}<i
                                                    class="fas fa-times"></i> <span
                                                    class="product-quantity">{{$row->qty }}</span></td>
                                            <td class="product-total">{{ $row->price }} {{ $setting->currency }}</td>
                                        </tr>
                                    @endforeach
                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <b>Subtotal</b>
                                            </td>
                                            <td>
                                                <b>{{ Cart::subtotal() }} {{ $setting->currency }}</b>
                                            </td>
                                        </tr>

                                        <!-- Cupon apply -->

                                        @if(Session::has('coupon'))
                                            <tr class="cart-subtotal bb-no">
                                                <td>
                                                    <b>Coupon:({{ Session::get('coupon')['name'] }})</b> <a href="{{ route('coupon.remove') }}" class="text-danger" style="color: red;">x</a>
                                                </td>
                                                <td>
                                                    <b>{{ Session::get('coupon')['discount'] }} {{ $setting->currency }}</b>
                                                </td>
                                            </tr>
                                        @else
							            @endif
                                    </tbody>
                                </table>

                                <table class="order-table">
                                    <tfoot>
                                        @if(Session::has('coupon'))
                                            <tr class="order-total">
                                                <th>
                                                    <b>Total</b>
                                                </th>
                                                <td>
                                                    <b>{{ Session::get('coupon')['after_discount'] }} {{ $setting->currency }}</b>

                                                </td>
                                            </tr>
                                            @else
                                                <tr class="order-total">
                                                    <th>
                                                        <b>Total</b>
                                                    </th>
                                                    <td>
                                                        <b>{{ Cart::priceTotal() }} {{ $setting->currency }}</b>
                                                    </td>
                                                </tr>
                                        @endif
                                    </tfoot>
                                </table>


                                @if(!Session::has('coupon'))
                                    <div class="coupon-toggle">
                                        Have a coupon? <a href="#"
                                            class="show-coupon font-weight-bold text-uppercase text-dark">Enter your
                                            code</a>
                                    </div>
                                    <div class="coupon-content mb-4" style="margin-top: 16px;">
                                        <p>If you have a coupon code, please apply it below.</p>
                                        <form action="{{ route('apply.coupon') }}" method="post">
                                            @csrf
                                            <div class="input-wrapper-inline">
                                                <input type="text" name="coupon" class="form-control form-control-md mr-1 mb-2" placeholder="Coupon code" id="coupon_code" autocomplete="off" required="">
                                                <button type="submit" class="btn button btn-rounded btn-coupon mb-2" name="apply_coupon" value="Apply coupon">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
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

        $('#order-place').submit(function(e) {
            $('.progress').removeClass('d-none');
        });

	</script>

@endsection
