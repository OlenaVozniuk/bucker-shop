@extends('layout.layout')
    @section('content')

<!-- breadcrumbs area start -->
<div class="breadcrumbs_aree breadcrumbs_bg mb-110" data-bgimg="{{ asset('images/breadcrumbs-bg.png') }}">
    <div class="container">
        <div class="row">
            <div class="text-black">
                <div class="breadcrumbs_text">
                    <h1>Cart</h1>
                    <ul>
                        <li><a href="{{ url()->previous() }}">Back</a></li>
                        <li> // Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<div class="cart-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="product_remove">remove</th>
                                <th class="cart_img">images</th>
                                <th class="cart-product-name">Product</th>
                                <th class="product-price">Unit Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products['products'] ?? [] as $product)
                                <tr>
                                <td class="product_remove">
                                    <a href="{{ route('remove-from-cart', $product['product']) }}">
                                        <i class="pe-7s-close" title="Remove"></i>
                                    </a>
                                </td>
                                <td class="cart_img">
                                    <img src="{{ asset('storage/uploads').'/'. $product['product']->image }}" alt="">
                                </td>
                                    <td class="product-name"><a href="{{ route('show', $product['product']) }}">{{ $product['product']->name }}</a>
                                    </td>
                                    <td class="product-price"><span class="amount">{{ $product['product']->price }}&#8372</span></td>
                                    <td class="product_pro_button quantity">
                                        <div class="pro-qty border">
                                            @if($product['quantity']>1)
                                                <a href="{{ route('update', ['product' => $product['product'], 'quantity'=> $product['quantity']-1]) }}" class="dec qty-btn">-</a>
                                            @endif
                                            <input value="{{ $product['quantity'] }}">
                                            <a href="{{ route('update', ['product' => $product['product'], 'quantity' => $product['quantity']+1]) }}" class="inc qty-btn">+</a>
                                        </div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{$product['product']->price * $product['quantity'] }}&#8372</span></td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                           placeholder="Coupon code" type="text">
                                    <input class="button mt-xxs-30" name="apply_coupon" value="Apply coupon"
                                           type="submit">
                                </div>
                                <div class="coupon2">
                                    <a class="button" href="{{ route('clear-all') }}" >Clear cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                        <li>Total price <span>{{ $products['totalPrice'] ?? 0}}&#8372</span></li>
                                        <li>Total quantity<span>{{ $products['totalQuantity'] ?? 0 }}</span></li>
                                </ul>
                                <a href="{{ route('checkout') }}">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection('content')
