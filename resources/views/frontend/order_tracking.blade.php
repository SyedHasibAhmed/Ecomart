@extends('layouts.app')
    @section('navbar')
        @include('layouts.front_partial.secondary_nav')
    @endsection
@section('content')
<!-- Start of Main -->
<main class="main">
    <div class="my-account">


            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">Track Your Order Now</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of PageContent -->
            <div class="page-content pt-2">
                <div class="container">
                    <div class="contact-section" style="padding-top: 60px; padding-bottom: 20px; max-width: 650px; margin: auto;">
                        <div class="row gutter-lg pb-3">
                            <div class="col-lg-12 mb-8">
                                <form action="{{ route('check.order') }}" method="post" style="border: 1px solid #eee; padding: 40px;">
                                    @csrf
                                    <div class="form-group">
                                        <label>Order ID</label>
                                        <input type="text" name="order_id" class="form-control" placeholder="Write your order id" required><br>
                                        <button class="btn btn-info">Track Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->

<section class="contact-section">

        </section>
@endsection
