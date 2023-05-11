@extends('layout.layout')
@section('content')

    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree  breadcrumbs_bg mb-110" data-bgimg="{{ asset('images/background.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>Checkout</h1>
                        <ul>
                            <li><a href="{{ url()->previous() }}">Back</a></li>
                            <li> // Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <div class="checkout-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <form action="{{ route('checkout-store') }}" method="POST">
                        @csrf
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>
                                        <input placeholder="First Name" name="first_name" type="text">
                                    </div>
                                    @error('first_name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input placeholder="Last Name" name="second_name" type="text">
                                    </div>
                                    @error('second_name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input placeholder="Your city" name="city" type="text">
                                    </div>
                                    @error('city')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input placeholder="Street address, apartment number" name="address" type="text">
                                    </div>
                                    @error('address')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>City code <span class="required">*</span></label>
                                        <input placeholder="12345" name="city_code" type="text">
                                    </div>
                                    @error('city_code')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input placeholder="email@email.com" name="email" type="email">
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input placeholder="+380 12 345 67 89" name="phone" type="text">
                                    </div>
                                    @error('phone')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list create-acc">
                                        <input id="cbox" type="checkbox">
                                        <label for="cbox">Create an account?</label>
                                    </div>
                                    <div id="cbox-info" class="checkout-form-list create-account">
                                        <p>Create an account by entering the information below. If you are a returning
                                            customer please login at the top of the page.</p>
                                        <label>Account password <span class="required">*</span></label>
                                        <input placeholder="password" type="password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-button-payment">
                            <input value="Place order" type="submit">
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-12" style="height: 90%">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="cart-product-name">Product</th>
                                    <th class="cart-product-total">Total</th>
                                </tr>
                                @foreach($products['products'] ?? [] as $product)
                                </thead>
                                <tbody>
                                <tr class="cart-item">
                                    <td class="cart-product-name"> {{ $product['product']->name }}<strong
                                            class="product-quantity">
                                            × {{ $product['quantity'] }}</strong></td>
                                    <td class="cart-product-total"><span class="amount">{{$product['product']->price * $product['quantity'] }}&#8372</span></td>
                                </tr>
                                </tbody>
                                <tfoot>
                                @endforeach
                                <tr class="cart-subtotal">
                                    <th>Total Quantity</th>
                                    <td><strong><span class="amount">{{$products['totalQuantity'] ?? 0 }} </span></strong></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">{{$products['totalPrice'] ?? 0 }}&#8372</span></strong></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
