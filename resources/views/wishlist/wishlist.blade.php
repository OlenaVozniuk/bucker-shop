@extends('layout.layout')
@section('content')
<!-- breadcrumbs area start -->
<div class="breadcrumbs_aree breadcrumbs_bg mb-110" data-bgimg="{{ asset('images/breadcrumbs-bg.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs_text">
                    <h1>Wishlist</h1>
                    <ul>
                        <li><a href="{{ url()->previous() }}">Back</a></li>
                        <li> // Wishlist </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<div class="wishlist-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="product_remove">remove</th>
                                <th class="product-thumbnail">images</th>
                                <th class="cart-product-name">Product</th>
                                <th class="product-price">Unit Price</th>
                                <th class="cart_btn">add to cart</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td class="product_remove">
                                    <a href="{{ route('remove-from-wishlist', $product) }}">
                                        <i class="pe-7s-close" title="Remove"></i>
                                    </a>
                                </td>
                                <td class="cart_img">
                                    <a href="#">
                                        <img src="{{ asset('storage/uploads').'/'. $product->image }}"
                                             alt="">
                                    </a>
                                </td>
                                <td class="product-name"><a href="{{ route('show', $product) }}">{{ $product->name }}</a></td>
                                <td class="product-price"><span class="amount">{{ $product->price }}&#8372</span></td>
                                <td class="cart_btn"><a href="{{ route('add-to-cart', $product) }}">add to cart</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
