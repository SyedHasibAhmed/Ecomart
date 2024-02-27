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
                    <h1 class="page-title mb-0">My Account</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="demo1.html">Home</a></li>
                        <li>My account</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content pt-2">
                <div class="container">
                    <div class="tab tab-vertical row gutter-lg">
                        @include('user.sidebar')

                        <div class="tab-content mb-6">
                            <div class="tab-pane active in" id="account-dashboard">
                                <p class="greeting">
                                    Welcome ,
                                    <span class="text-dark font-weight-bold">{{ Auth::user()->name }}</span>
                                </p>

                                <p class="mb-4">
                                    From your account dashboard you can view your <a href="#account-orders"
                                        class="text-primary link-to-tab">recent orders</a>,
                                    manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping
                                        and billing
                                        addresses</a>, and
                                    <a href="#account-details" class="text-primary link-to-tab">edit your password and
                                        account details.</a>
                                </p>

                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#account-orders" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-orders">
                                                    <i class="w-icon-orders"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Orders</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#account-addresses" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-address">
                                                    <i class="w-icon-map-marker"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Addresses</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="{{ route('open.ticket') }}" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-support">
                                                    <i class="w-icon-heart"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Support</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#account-details" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-account">
                                                    <i class="w-icon-user"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Password Change</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="{{ route('wishlist') }}" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-wishlist">
                                                    <i class="w-icon-heart"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Wishlist</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="{{ route('customer.logout') }}">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-logout">
                                                    <i class="w-icon-logout"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Logout</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane mb-4" id="account-orders">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                                    </div>
                                </div>

                                <table class="shop-table account-orders-table mb-6">
                                    <thead>
                                        <tr>
                                            <th class="order-id">Order</th>
                                            <th class="order-date">Date</th>
                                            <th class="order-status">Status</th>
                                            <th class="order-total">Total</th>
                                            <th class="order-actions">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $row)
                                        <tr>
                                            <td class="order-id">#{{ $row->order_id }}</td>
                                            <td class="order-date">{{ date('d F , Y') ,strtotime($row->order_id)  }}</td>
                                            <td class="order-status">
                                                @if($row->status==0)
                                                    <span class="badge badge-danger">Order Pending</span>
                                                @elseif($row->status==1)
                                                    <span class="badge badge-info">Order Recieved</span>
                                                @elseif($row->status==2)
                                                    <span class="badge badge-primary">Order Shipped</span>
                                                @elseif($row->status==3)
                                                    <span class="badge badge-success">Order Done</span>
                                                @elseif($row->status==4)
                                                    <span class="badge badge-warning">Order Return</span>
                                                @elseif($row->status==5)
                                                    <span class="badge badge-danger">Order Cancel</span>
                                                @endif
                                            </td>
                                            <td class="order-total">
                                                <span class="order-price">{{ $row->total }} {{ $setting->currency }}</span>
                                            </td>
                                            <td class="order-action">
                                                <a href="{{ route('view.order',$row->id) }}"
                                                    class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                                    Shop<i class="w-icon-long-arrow-right"></i></a>
                            </div>


                            <div class="tab-pane" id="account-addresses">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="max-width: 600px;">
                                            <div class="icon-box icon-box-side icon-box-light" style="margin-bottom:40px;">
                                                <span class="icon-box-icon icon-map-marker">
                                                    <i class="w-icon-map-marker"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <h4 class="icon-box-title mb-0 ls-normal">Your Default Shipping Credentials.</h4>
                                                </div>
                                            </div>
                                            <div>
                                                <form action="#" method="post">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Shipping Name</label>
                                                        <input type="text" class="form-control" name="shipping_name" style="margin-top: 6px;" value="">
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group col-lg-6">
                                                            <label for="exampleInputEmail1">Shipping Phone</label>
                                                            <input type="text" class="form-control" name="shipping_phone" style="margin-top: 6px;" value="">
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label for="exampleInputEmail1">Shipping Email</label>
                                                            <input type="text" class="form-control" name="shipping_email" style="margin-top: 6px;" value="">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Shipping Address</label>
                                                        <input type="text" class="form-control" name="shipping_address" style="margin-top: 6px;" value="">
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label for="exampleInputEmail1">Shipping Country</label>
                                                            <input type="text" class="form-control" name="shipping_country" style="margin-top: 6px;" value="">
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label for="exampleInputEmail1">Shipping City</label>
                                                            <input type="text" class="form-control" name="shipping_city" style="margin-top: 6px;" value="">
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label for="exampleInputEmail1">Shipping Zipcode</label>
                                                            <input type="text" class="form-control" name="shipping_zipcode" style="margin-top: 6px;" value="">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="account-details">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-account mr-2">
                                        <i class="w-icon-user"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title mb-0 ls-normal">Password Change</h4>
                                    </div>
                                </div>
                                <form class="form account-details-form" action="{{ route('customer.password.change') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="text-dark" for="cur-password">Current Password</label>
                                        <input type="password" class="form-control form-control-md"
                                            id="cur-password" name="old_password" placeholder="Old password" required="">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark" for="new-password">New Password</label>
                                        <input type="password" class="form-control form-control-md @error('password') is-invalid @enderror" id="new-password" name="password" placeholder="New password" required="">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-10">
                                        <label class="text-dark" for="conf-password">Confirm Password</label>
                                        <input type="password" class="form-control form-control-md"
                                            id="conf-password" name="password_confirmation" placeholder="Re-type password" required="">
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
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

@endsection
