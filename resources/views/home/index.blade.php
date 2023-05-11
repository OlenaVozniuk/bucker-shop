@extends('layout.layout')
@section('content')

    <!--slide banner section start-->
    <div class="hero_banner_section d-flex align-items-center mb-110">
        <div class="container">
            <div class="hero_banner_inner">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="hero_content">
                            <h3 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s" style="visibility: visible; animation-duration: 1.1s; animation-delay: 0.1s; animation-name: fadeInUp;"><span>70%</span>
                                Sale Off</h3>
                            <h1 class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s" style="visibility: visible; animation-duration: 1.2s; animation-delay: 0.2s; animation-name: fadeInUp;">
                                Quality Products
                                Pastry Items</h1>
                            <a class="btn btn-link wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s" href="{{ route('shop') }}" style="visibility: visible; animation-duration: 1.3s; animation-delay: 0.3s; animation-name: fadeInUp;">Shop Now</a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero_shape_banner">
                            <img class="banner_keyframes_animation wow animated" src="{{ asset('images/hero-banner-shape. png.webp') }}" alt="" style="visibility: visible; animation-name: animateUpDown;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero_mini_shape shape1">
            <img src="{{ asset('images/hero-mini-shape1.png') }}" alt="">
        </div>
        <div class="hero_mini_shape shape2">
            <img src="{{ asset('images/hero-mini-shape2.png') }}" alt="">
        </div>
        <div class="hero_mini_shape shape3">
            <img src="{{ asset('images/hero-mini-shape3.png') }}" alt="">
        </div>
        <div class="hero_mini_shape shape4">
            <img src="{{ asset('images/hero-mini-shape4.png') }}" alt="">
        </div>
        <div class="hero_mini_shape shape5">
            <img src="{{ asset('images/hero-mini-shape5.png') }}" alt="">
        </div>
    </div>
    <!--slider area end-->

    <!-- service section start-->
    <div class="service_section services_style2 service_container mb-86">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="services_section_inner d-flex justify-content-between">
                        @foreach($categories as $category)
                            <div class="single_services one text-center wow fadeInUp" data-wow-delay="0.1s"
                                 data-wow-duration="1.1s">
                                <div class="services_content">
                                    <h3>
                                        <a href="{{ route('shop', ['category_id' => $category->id]) }}">{{$category->name}}</a>
                                    </h3>
                                    <ul>
                                        @foreach($category->subcategories as $subcategory)
                                            <li>
                                                <a href="{{ route('shop', ['subcategory_id' => $subcategory->id]) }}">{{$subcategory->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service section end-->

{{--    <!-- product section start -->--}}
{{--    <div class="product_section mb-80 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">--}}
{{--        <div class="container">--}}
{{--            <div class="product_header">--}}
{{--                <div class="section_title text-center">--}}
{{--                    <h2>New Products</h2>--}}
{{--                </div>--}}
{{--                <div class="product_tab_button">--}}
{{--                    <ul class="nav justify-content-center" role="tablist" id="nav-tab">--}}
{{--                        <li>--}}
{{--                            <a class="active" data-toggle="tab" href="#features" role="tab" aria-controls="features"--}}
{{--                               aria-selected="false">Our Features </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a data-toggle="tab" href="#seller" role="tab" aria-controls="seller" aria-selected="false">--}}
{{--                                Best Sellers </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a data-toggle="tab" href="#sales" role="tab" aria-controls="sales"--}}
{{--                               aria-selected="false">New Items </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="tab-content product_container">--}}
{{--                <div class="tab-pane fade show active" id="features" role="tabpanel">--}}
{{--                    <div class="product_gallery">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-3 col-md-4 col-sm-6">--}}
{{--                                <article class="single_product">--}}
{{--                                    <figure>--}}
{{--                                        <div class="product_thumb">--}}
{{--                                            <a href="single-product.html"><img src="assets/img/product/product1.png"--}}
{{--                                                                               alt=""></a>--}}
{{--                                            <div class="action_links">--}}
{{--                                                <ul class="d-flex justify-content-center">--}}
{{--                                                    <li class="add_to_cart"><a href="cart.html" title="Add to cart">--}}
{{--                                                            <span class="pe-7s-shopbag"></span></a></li>--}}
{{--                                                    <li class="wishlist"><a href="wishlist.html"--}}
{{--                                                                            title="Add to Wishlist"><span--}}
{{--                                                                class="pe-7s-like"></span></a>--}}
{{--                                                    </li>--}}
{{--                                                    <li class="quick_button"><a href="#" title="Quick View"--}}
{{--                                                                                data-bs-toggle="modal"--}}
{{--                                                                                data-bs-target="#modal_box">--}}
{{--                                                            <span class="pe-7s-look"></span></a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <figcaption class="product_content text-center">--}}
{{--                                            <h4><a href="single-product.html">Product Name </a></h4>--}}
{{--                                            <div class="price_box">--}}
{{--                                                <span class="current_price">Price</span>--}}
{{--                                            </div>--}}
{{--                                        </figcaption>--}}
{{--                                    </figure>--}}
{{--                                </article>--}}
{{--                            </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- product section end -->--}}
@endsection
