@extends('layouts.app')
@section('content')
<!-- Start of Main -->
<main class="main">
    <div class="my-account">


            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">Order Details</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of PageContent -->
            <div class="page-content pt-2">
                <div class="container">
                        <div class="tab-content mb-6" style="margin: auto;">
                            <div class="" id="" style="border: 1px solid #eee; padding: 20px;">
                                <div class="card-body mt-2" style="padding: 0px">
                                    Name: {{ $order->c_name }} <br>
                                    Phone: {{ $order->c_phone }} <br>
                                    OrderID: {{ $order->order_id }} <br>
                                    Status: @if($order->status==0)
                                        <span class="badge badge-danger">Order Pending</span>
                                    @elseif($order->status==1)
                                        <span class="badge badge-info">Order Recieved</span>
                                    @elseif($order->status==2)
                                        <span class="badge badge-primary">Order Shipped</span>
                                    @elseif($order->status==3)
                                        <span class="badge badge-success">Order Completed</span>
                                    @elseif($order->status==4)
                                        <span class="badge badge-warning">Order Return</span>
                                    @elseif($order->status==5)
                                        <span class="badge badge-danger">Order Cancel</span>
                                    @endif   <br>
                                    Date: {{ date('d F Y'),strtotime($order->c_name)}} <br>
                                    Subtotal: {{ $order->subtotal }} {{ $setting->currency }}<br>
                                    Total: {{ $order->total }} {{ $setting->currency }}<br>

                                </div>

                                <table class="shop-table account-orders-table mb-6">
                                    <thead>
                                        <tr>
                                            <th class="order-id">SL</th>
                                            <th class="order-date">Product</th>
                                            <th class="order-status">Color</th>
                                            <th class="order-total">Size</th>
                                            <th class="order-total">Qty</th>
                                            <th class="order-total">Price</th>
                                            <th class="order-actions">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order_details as $key=>$row)
                                        <tr>
                                            <td class="order-id">{{ ++$key }}</td>
                                            <td class="order-date">{{ $row->product_name  }}</td>
                                            <td class="order-date">{{ $row->color  }}</td>
                                            <td class="order-date">{{ $row->size  }}</td>
                                            <td class="order-date">{{ $row->quantity  }}</td>
                                            <td class="order-total">
                                                <span class="order-price">{{ $row->single_price }} {{ $setting->currency }}</span>
                                            </td>
                                            <td class="order-total">
                                                <span class="order-price">{{ $row->subtotal_price }} {{ $setting->currency }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <a href="{{ route('shop') }}" class="btn btn-dark btn-rounded btn-icon-right">Go
                                    Shop<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                </div>
            </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->

@endsection
