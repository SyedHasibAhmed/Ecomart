<div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
    <div class="container">
        <div class="inner-wrap">
            <div class="header-left">
                <div class="dropdown category-dropdown has-border" data-visible="true">
                    <a href="#" class="category-toggle text-dark" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true" data-display="static"
                        title="Browse Categories">
                        <i class="w-icon-category"></i>
                        <span>Browse Categories</span>
                    </a>
                <!-- Browse Categories Start -->
                    <div class="dropdown-box">
                        <ul class="menu vertical-menu category-menu">
                            <!--Browse Categories Fashion Start  -->


                            @foreach($category as $row)
                                  @php
                                    $subcategory=DB::table('subcategories')->where('category_id',$row->id)->get();
                                  @endphp
                                    <li>
                                        <a href="{{ route('categorywise.product',$row->id) }}">

                                          {{ $row->category_name }}
                                        </a>
                                        <ul class="">
                                            @foreach($subcategory as $row)
                                            @php
                                               $childcategory=DB::table('childcategories')->where('subcategory_id',$row->id)->get();
                                            @endphp
                                            <li>
                                                <a href="{{ route('subcategorywise.product',$row->id) }}">{{ $row->subcategory_name }}</a>
                                                <ul>
                                                    @foreach($childcategory as $row)
                                                     <li><a href="{{ route('childcategorywise.product',$row->id) }}">{{ $row->childcategory_name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                        </ul>
                    </div>
                </div>
                <nav class="main-nav">
                    <ul class="menu active-underline">
                        <li class="active">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('shop') }}">Shop</a>
                        </li>
                        <li>
                            <a href="{{ route('faq') }}">FAQs</a>
                        </li>
                        <li>
                            <a href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                <!-- <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a> -->
                <a href="{{ route('order.tracking') }}"><i class="w-icon-map-marker"></i>Track Order</a>
            </div>
        </div>
    </div>
</div>
