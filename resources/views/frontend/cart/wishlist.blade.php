@extends('layouts.app')
    @section('navbar')

    @include('layouts.front_partial.secondary_nav')
    @endsection
@section('content')

 <!-- Start of Main -->
 <main class="main wishlist-page">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">Wishlist</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Wishlist</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content">
                <div class="container">
                    <h3 class="wishlist-title">My wishlist</h3>
                    <table class="shop-table wishlist-table">
                        <thead>
                            <tr>
                                <th class="product-name"><span>Product</span></th>
                                <th></th>
                                <!-- <th class="product-price"><span>Price</span></th> -->
                                <th class="product-stock-status"><span>Date</span></th>
                                <th class="wishlist-action">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($wishlist as $row)
                            <tr>
                                <td class="product-thumbnail">
                                    <div class="p-relative">
                                        <a href="product-default.html">
                                            <figure>
                                                <img src="{{ asset($row->thumbnail) }}" alt="product" width="300"
                                                    height="338">
                                            </figure>
                                        </a>
                                        <a href="{{ route('wishlistproduct.delete',$row->id) }}"><button class="btn btn-close"><i
                                                class="fas fa-times"></i></button></a>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a href="product-default.html">
                                    {{ $row->name }}
                                    </a>
                                </td>

                                <!-- <td class="product-price">
                                    <ins class="new-price">80</ins>
                                </td> -->
                                <td class="product-stock-status">
                                    <span class="wishlist-in-stock">{{ $row->date }}</span>
                                </td>
                                <td class="wishlist-action">
                                    <div class="d-lg-flex">

                                        <a href="{{ route('product.details',$row->slug) }}" class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart">Add to
                                            cart</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="social-links">
                        <label>Share On:</label>
                        <div class="social-icons social-no-color border-thin">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                            <a href="#" class="social-icon social-email far fa-envelope"></a>
                            <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->


@endsection
