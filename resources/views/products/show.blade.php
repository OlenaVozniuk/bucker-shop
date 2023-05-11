@extends('layout.layout')
@section('content')

    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_area breadcrumbs_bg mb-100" data-bgimg="{{asset('images/background.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>{{$product->name}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->

    <!-- single product section start-->
    <div class="single_product_section mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single_product_gallery">
                        <div class="gallery_img_list">
                            <img data-image="{{asset('storage/uploads').'/'.$product->image}}"
                                 src="{{asset('storage/uploads').'/'.$product->image}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_details_sidebar">
                        <h2 class="product__title">{{$product->name}}</h2>
                        <div class="price_box">
                            <span class="current_price">{{$product->price}} &#8372</span>
                        </div>
                        <br>
                        <div class="product_pro_button quantity d-flex align-items-center">
                            <div class="pro-qty border">
                                <input type="text" value="1">
                            </div>
                            @if(in_array($product->id, $wishlist))
                                <a class="add_to_cart" href="{{ route('add-to-cart', $product, 1) }}">add to cart</a>
                                <a href="{{ route('remove-from-wishlist', $product) }}"
                                   title="Remove from Wishlist" class="active-in-wishlist"><span
                                        class="pe-7s-like"></span></a>
                            @elseif (in_array($product->id, $cart['product_ids'] ?? []))
                            @else
                                <a class="add_to_cart" href="{{ route('add-to-cart', $product, 1) }}">add to cart</a>
                                <a href="{{ route('add-item-to-wishlist', $product) }}"
                                   title="Add to Wishlist"><span
                                        class="pe-7s-like"></span></a>
                            @endif
                        </div>
                        <div class="product_paypal">
                            <img src="{{asset('images/payicons.jpg')}}" style="max-width: 40%" alt="payments">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product details section end-->

    <!-- product section start -->
    <div class="product_section mb-80">
        <div class="container">
            <div class="section_title text-center mb-55">
                <h2>Related Products</h2>
            </div>
            <div class="row product_slick slick_navigation slick__activation" data-slick='{
                "slidesToShow": 4,
                "slidesToScroll": 1,
                "arrows": true,
                "dots": false,
                "autoplay": false,
                "speed": 300,
                "infinite": true ,
                "responsive":[
                  {"breakpoint":992, "settings": { "slidesToShow": 3 } },
                  {"breakpoint":768, "settings": { "slidesToShow": 2 } },
                  {"breakpoint":500, "settings": { "slidesToShow": 1 } }
                 ]
            }'>
                @foreach($product->subcategory->products->where('id', '!=', $product->getKey())->shuffle()->take(10) as $relatedProduct)
                    <div class="col-lg-3">
                        <article class="single_product">
                            @include('products.partials.product-single', ['product' => $relatedProduct])
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- product section end -->
@endsection
