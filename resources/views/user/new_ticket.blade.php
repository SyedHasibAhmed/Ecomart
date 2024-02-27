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
                            <div class="" id="">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="max-width: 600px;">
                                            <div class="icon-box icon-box-side icon-box-light" style="margin-bottom:40px;">
                                                <div class="icon-box-content">
                                                    <h4 class="icon-box-title mb-0 ls-normal">Submit your ticket</h4>
                                                </div>
                                            </div>
                                            <div>
                                                <form action="{{ route('store.ticket') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Subject</label>
                                                        <input type="text" class="form-control" name="subject" style="margin-top: 6px;" value="">
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group col-lg-6">
                                                            <label for="exampleInputEmail1">Priority</label>
                                                            <select class="form-control" name="priority" style="min-width: 220px; margin-top: 6px;">
                                                                <option value="Low">Low</option>
                                                                <option value="Medium">Medium</option>
                                                                <option value="High">High</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label for="exampleInputEmail1">Service</label>
                                                            <select class="form-control" name="service" style="min-width:220px; margin-top: 6px;">
                                                                <option value="Technical">Technical</option>
                                                                <option value="Payment">Payment</option>
                                                                <option value="Affiliate">Affiliate</option>
                                                                <option value="Return">Return</option>
                                                                <option value="Refund">Refund</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="order-notes">Image</label>
                                                        <input type="file" class="form-control" name="image" style="margin-top: 6px; border: none; padding: 0px;">
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="order-notes">Message</label>
                                                        <textarea class="form-control mb-0" id="order-notes" name="message" cols="30"
                                                            rows="4"
                                                            placeholder="Notes about your order" style="margin-top: 6px;"></textarea>
                                                    </div>
                                                    <br>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
