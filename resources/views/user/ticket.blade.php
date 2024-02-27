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
                                <div class="card-header">
                                    All Tickets
                                    <!-- <a href="{{ route('new.ticket') }}" class="btn btn-sm btn-danger" style="float:right;">Open Ticket</a> -->
                                    </div>
                            </div>
                            <div class="" id="">
                                <table class="shop-table account-orders-table mb-6">
                                    <thead>
                                        <tr>
                                            <th class="order-id">Date</th>
                                            <th class="order-date">Service</th>
                                            <th class="order-status">Subject</th>
                                            <th class="order-total">Status</th>
                                            <th class="order-actions">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ticket as $row)
                                        <tr>
                                            <td class="order-id">{{ date('d F , Y') ,strtotime($row->date)  }}</td>
                                            <td class="order-date">{{ $row->service  }}</td>
                                            <td class="order-date">{{ $row->subject }}</td>
                                            <td class="order-status">
                                                @if($row->status==0)
                                                    <span class="badge badge-danger">Pending</span>
                                                @elseif($row->status==1)
                                                    <span class="badge badge-success">Replied</span>
                                                @elseif($row->status==2)
                                                    <span class="badge badge-muted">Closed</span>
                                                @endif
                                            </td>
                                            <td class="order-action">
                                                <a href="{{ route('show.ticket',$row->id) }}"
                                                    class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
