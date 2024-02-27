@extends('layouts.app')
    @section('navbar')
    @include('layouts.front_partial.secondary_nav')
    @endsection
@section('content')

 <!-- Start of Main -->
    <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header" style="height: 180px;">
                <div class="container">
                    <h1 class="page-title mb-0">Blog</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">

                    <div class="row grid cols-sm-2 mb-2" data-grid-options="{
                        'layoutMode': 'fitRows'
                    }">
                        <article class="post post-grid-type grid-item overlay-zoom fashion">
                            <figure class="post-media br-sm">
                                <a href="#">
                                    <img src="{{ asset('frontend-assets') }}/assets/images/blog/2cols/1.jpg" width="600"
                                        height="420" alt="blog">
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Fashion</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="#">New found the men dress for summer</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo,
                                    eget blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at
                                    vulputate volutpat, uctus metus libero eu augue, vitae luctus</p>
                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a>
                                    - <a href="#" class="post-date">03.01.2021</a>
                                    <a href="#" class="post-comment"><i class="w-icon-comments"></i><span>7</span>Comments</a>
                                </div>
                            </div>
                        </article>
                        <article class="post post-grid-type grid-item overlay-zoom others technology">
                            <figure class="post-media br-sm">
                                <a href="#">
                                    <img src="{{ asset('frontend-assets') }}/assets/images/blog/2cols/2.jpg" width="600"
                                        height="420" alt="blog">
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Others</a>,
                                    <a href="#">Technology</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="#">Recognitory the needs is primary condition  for design</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo,
                                    eget blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at
                                    vulputate volutpat, uctus metus libero eu augue, vitae luctus</p>

                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a>
                                    - <a href="#" class="post-date">03.05.2021</a>
                                    <a href="#" class="post-comment"><i class="w-icon-comments"></i><span>4</span>Comments</a>
                                </div>
                            </div>
                        </article>
                        <article class="post post-grid-type grid-item overlay-zoom clothes">
                            <figure class="post-media br-sm">
                                <a href="#">
                                    <img src="{{ asset('frontend-assets') }}/assets/images/blog/2cols/3.jpg" width="600"
                                        height="420" alt="blog">
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Clothes</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="#">New found the women’s shirt  for summer season</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo,
                                    eget blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at
                                    vulputate volutpat, uctus metus libero eu augue, vitae luctus</p>

                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a>
                                    - <a href="#" class="post-date">03.01.2021</a>
                                    <a href="#" class="post-comment"><i class="w-icon-comments"></i><span>2</span>Comments</a>
                                </div>
                            </div>
                        </article>
                        <article class="post post-grid-type grid-item overlay-zoom lifestyle">
                            <figure class="post-media br-sm">
                                <a href="#">
                                    <img src="{{ asset('frontend-assets') }}/assets/images/blog/2cols/4.jpg" width="600"
                                        height="420" alt="blog">
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Lifestyle</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="#">We want to be different and fashion gives to me that outlet</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo,
                                    eget blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at
                                    vulputate volutpat, uctus metus libero eu augue, vitae luctus</p>

                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a>
                                    - <a href="#" class="post-date">03.03.2021</a>
                                    <a href="#" class="post-comment"><i class="w-icon-comments"></i><span>5</span>Comments</a>
                                </div>
                            </div>
                        </article>
                        <article class="post post-grid-type grid-item overlay-zoom entertainment lifestyle shoes others">
                            <figure class="post-media br-sm">
                                <a href="#">
                                    <img src="{{ asset('frontend-assets') }}/assets/images/blog/2cols/5.jpg" width="600"
                                        height="420" alt="blog">
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Entertainment</a>,
                                    <a href="#">Lifestyle</a>,
                                    <a href="#">Others</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="#">Comes a cool blog post with Images</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo,
                                    eget blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at
                                    vulputate volutpat, uctus metus libero eu augue, vitae luctus</p>

                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a>
                                    - <a href="#" class="post-date">03.01.2021</a>
                                    <a href="#" class="post-comment"><i class="w-icon-comments"></i><span>2</span>Comments</a>
                                </div>
                            </div>
                        </article>
                        <article class="post post-grid-type grid-item overlay-zoom fashion lifestyle">
                            <figure class="post-media br-sm">
                                <a href="#">
                                    <img src="{{ asset('frontend-assets') }}/assets/images/blog/2cols/6.jpg" width="600"
                                        height="420" alt="blog">
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Fashion</a>,
                                    <a href="#">Technology</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="#">Fusce lacinia arcuet nulla</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo,
                                    eget blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at
                                    vulputate volutpat, uctus metus libero eu augue, vitae luctus.</p>

                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a>
                                    - <a href="#" class="post-date">03.06.2021</a>
                                    <a href="#" class="post-comment"><i class="w-icon-comments"></i><span>3</span>Comments</a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <!-- End of Page Content -->


        </main>
        <!-- End of Main -->

@endsection
