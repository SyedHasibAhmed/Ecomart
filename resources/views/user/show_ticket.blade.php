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
                                        <div class="row">
                                            <h3 style="margin-bottom: 10px;">Your Ticket Details</h3>
                                            <div class="col-md-9">
                                                <strong>Subject: {{  $ticket->subject }}</strong><br>
                                                <strong>Service: {{  $ticket->service }}</strong><br>
                                                <strong>Priority: {{  $ticket->priority }}</strong><br>
                                                <strong>Message: {{  $ticket->message }}</strong>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="{{ asset($ticket->image) }}" target="_blank"><img src="{{ asset($ticket->image) }}" style="height:80px; width:120px;"></a>
                                            </div>
                                        </div>

                                        <!-- All reply message show here  -->
                                        @php
                                            $replies=DB::table('replies')->where('ticket_id',$ticket->id)->orderBy('id','DESC')->get();
                                        @endphp

                                        <div class="card p-2 mt-2">
                                            <h4 class="icon-box-title mb-0 ls-normal">All Reply Message.</h4>
                                            <div class="card-body" style="height: 450px; overflow-y: scroll; border: 1px solid #eee; margin-bottom: 34px; margin-top: 34px;">
                                            @isset($replies)
                                                @foreach($replies as $row)
                                                    <div class="card mt-1 @if($row->user_id==0) ml-4 @endif">
                                                        <div class="card-header @if($row->user_id==0) bg-info @else bg-danger @endif ">
                                                        <i class="fa fa-user"></i> @if($row->user_id==0) Admin @else {{ Auth::user()->name }}@endif
                                                        </div>
                                                        <div class="card-body">
                                                            <blockquote class="blockquote mb-0">
                                                            <p>{{ $row->message }}</p>
                                                            <footer class="blockquote-footer">{{ date('d F Y'),strtotime($row->reply_date) }}</footer>
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endisset
                                            </div>
                                        </div>

                                        <div style="max-width: 600px;">
                                            <div class="icon-box icon-box-side icon-box-light" style="margin-bottom:40px;">
                                                <div class="icon-box-content">
                                                    <h4 class="icon-box-title mb-0 ls-normal">Reply Message.</h4>
                                                </div>
                                            </div>
                                            <div>
                                                <form action="{{ route('reply.ticket') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
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
                                                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                                    </div>
                                                    <br>
                                                    <button type="submit" class="btn btn-primary">Submit Ticket</button>
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
