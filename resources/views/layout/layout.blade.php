<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bucker</title>
    <meta name="description"
          content="240+ Best Bootstrap Templates are available on this website. Find your template for your project compatible with the most popular HTML library in the world."/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="Replace_with_your_PAGE_URL"/>

    <!-- Open Graph (OG) meta tags are snippets of code that control how URLs are displayed when shared on social media  -->
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Bucker –  Bakery Shop Bootstrap 5 Template"/>
    <meta property="og:url" content="PAGE_URL"/>
    <meta property="og:site_name" content="Bucker –  Bakery Shop Bootstrap 5 Template"/>
    <!-- For the og:image content, replace the # with a link of an image -->
    <meta property="og:image" content="#"/>
    <meta property="og:description" content="Bucker –  Bakery Shop Bootstrap 5 Template"/>

    <!-- Add site Favicon -->
    <link rel="icon" href="https://hasthemes.com/wp-content/uploads/2019/04/cropped-favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" href="https://hasthemes.com/wp-content/uploads/2019/04/cropped-favicon-192x192.png"
          sizes="192x192"/>
    <link rel="apple-touch-icon" href="https://hasthemes.com/wp-content/uploads/2019/04/cropped-favicon-180x180.png"/>
    <meta name="msapplication-TileImage"
          content="https://hasthemes.com/wp-content/uploads/2019/04/cropped-favicon-270x270.png"/>

    <!-- CSS
    ========================= -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!--modernizr min js here-->
    <script src="{{asset('js/modernizr-3.11.2.min.js')}}"></script>


    <!-- Structured Data  -->
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "Replace_with_your_site_title",
        "url": "Replace_with_your_site_URL"
        }




    </script>
</head>

<body>


<!--offcanvas menu area start-->
<div class="body_overlay">

</div>
<div class="offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                    </div>
                    <div class="welcome_text text-center">
                        <p>Welcome to Bucker Bakery Shop</p>
                    </div>
                    <div class="active" id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children active">
                                <a href="#">Home</a>
                            </li>
                            <li><a href="#">About Us</a></li>
                            <li class="menu-item-has-children"><a href="#">Shop</a>
                            <li class="menu-item-has-children"><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--offcanvas menu area end-->

<!--header area start-->
<header class="header_section">
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header_top_inner d-flex justify-content-between">
                        <div class="welcome_text">
                            <p>World Wide Completely Free Shipping</p>
                        </div>
                        <div class="header_top_sidebar d-flex align-items-center">
                            <ul class="d-flex">
                                <li><i class="icofont-phone"></i> <a href="tel:+380631891404">+380 63 111 11 11</a>
                                </li>
                                <li><i class="icofont-envelope"></i> <a
                                        href="{{ route('contact') }}">bucker.lviv@gmail.com</a></li>
                                <li class="account_link"><i class="icofont-user-alt-7"></i><a href="#">Account</a>
                                    <ul class="dropdown_account_link">
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="login-register.html">Login</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="login-register.html">Login | Register</a>
                                        <li><a href="cart.html">Shopping Cart</a>
                                        <li><a href="wishlist.html">Wishlist</a>
                                        <li><a href="compare.html">Compare</a>
                                        <li><a href="checkout.html">Checkout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main_header d-flex justify-content-between align-items-center">
                    <div class="header_logo">
                        <a class="sticky_none" href="{{ route('home') }}"><img src="{{asset('images/logo.png')}}"
                                                                               alt=""></a>
                    </div>
                    <!--main menu start-->
                    <div class="main_menu d-none d-lg-block">
                        <nav>
                            <ul class="d-flex">
                                <li>
                                    <a class="nav-link {{request()->is('home') || request()->is('home/*') ? 'active' : ''}}"
                                       href="{{ route('home') }}"><i class="fas fa-fw fa-columns"></i>Home</a></li>
                                <li>
                                    <a class="nav-link {{request()->is('shop') || request()->is('shop/*') ? 'active' : ''}}"
                                       href="{{ route('shop') }}"><i class="fas fa-fw fa-columns"></i>Shop</a></li>
                                <li>
                                    <a class="nav-link {{request()->is('about') || request()->is('about/*') ? 'active' : ''}}"
                                       href="{{ route('about') }}"><i class="fas fa-fw fa-columns"></i>About</a></li>
                                <li>
                                    <a class="nav-link {{request()->is('contact') || request()->is('contact/*') ? 'active' : ''}}"
                                       href="{{ route('contact') }}"><i class="fas fa-fw fa-columns"></i>Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!--main menu end-->
                    <div class="header_account">
                        <ul class="d-flex">
                            <li class="header_search"><a href="javascript:void(0)"><i class="pe-7s-search"></i></a>
                            </li>
                            <li class="header_wishlist"><a href="{{ route('wishlist') }}"><i class="pe-7s-like"></i></a>
                            </li>
                            <li class="shopping_cart"><a href="javascript:void(0)"><i class="pe-7s-shopbag"></i></a>
                                <span class="item_count">{{ $cart['totalQuantity'] ?? 0 }}</span>
                            </li>
                        </ul>
                        <div class="canvas_open">
                            <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!--mini cart-->
<div class="mini_cart">
    <div class="cart_gallery">
        <div class="cart_close">
            <div class="cart_text">
                <h3>cart</h3>
            </div>
            <div class="mini_cart_close">
                <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
            </div>
        </div>
        @foreach($cart['products'] ?? [] as $product)
            <div class="cart_item">
                <div class="cart_img">
                    <a href="{{ route('show', $product['product']) }}"><img
                            src="{{asset('storage/uploads').'/'.$product['product']->image }}" alt=""></a>
                </div>
                <div class="cart_info">
                    <a href="{{ route('show', $product['product']) }}">{{ $product['product']->name }}</a>
                    <p>{{ $product['quantity'] }} X <span> {{ $product['product']->price }} </span></p>
                </div>
                <div class="cart_remove">
                    <a href="{{ route('remove-from-cart', $product['product']) }}"><i class="ion-android-close"></i></a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mini_cart_table">
        <div class="cart_table_border">
            <div class="cart_total">
                <span>Total price:</span>
                <span class="price">{{ $cart['totalPrice'] ?? 0 }} &#8372</span>
            </div>
            <div class="cart_total mt-10">
                <span>Total quantity:</span>
                <span class="price">{{ $cart['totalQuantity'] ?? 0 }}</span>
            </div>
        </div>
    </div>
    <div class="mini_cart_footer">
        <div class="cart_button">
            <a href="{{ route('cart.list') }}">View cart</a>
        </div>
        <div class="cart_button">
            <a href="{{ route('checkout') }}"><i class="fa fa-sign-in"></i> Checkout</a>
        </div>
    </div>
</div>
<!--mini cart end-->

<!-- page search box -->
<div class="page_search_box">
    <div class="search_close">
        <i class="ion-close-round"></i>
    </div>
    <form class="border-bottom" action="#">
        <input class="border-0" placeholder="Search products..." type="text">
        <button type="submit"><span class="pe-7s-search"></span></button>
    </form>
</div>

@yield('content')

<!--footer area start-->
<footer class="footer_widgets">
    <div class="container">
        <div class="main_footer">
            <div class="row">
                <div class="col-12">
                    <div class="main_footer_inner d-flex">
                        <div class="footer_widget_list contact footer_list_width">
                            <h3>Contact Us</h3>
                            <div class="footer_contact_desc">
                                <p>If you have any question, please contact us at
                                    <a href="{{ route('contact') }}">bucker.lviv@gmail.com</a></p>
                            </div>
                            <div class="footer_contact_info">
                                <div class="footer_contact_info_list d-flex align-items-center">
                                    <div class="footer_contact_info_icon">
                                        <span class="pe-7s-map-marker"></span>
                                    </div>
                                    <div class="footer_contact_info_text">
                                        <p>31 Svobody, Lviv</p>
                                    </div>
                                </div>
                                <div class="footer_contact_info_list d-flex align-items-center">
                                    <div class="footer_contact_info_icon">
                                        <span class="pe-7s-phone"></span>
                                    </div>
                                    <div class="footer_contact_info_text">
                                        <ul>
                                            <li><a href="tel:+0123456789">+380 63 111 11 11</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="footer_menu_widget footer_list_width middle d-flex">
                            <div class="footer_widget_list">
                                <h3>Information</h3>
                                <div class="footer_menu">
                                    <ul>
                                        <li><a href="{{ route('about') }}"> About us</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="footer_widget_list">
                                <h3>My Account</h3>
                                <div class="footer_menu">
                                    <ul>
                                        <li><a href="my-account.html"> My account</a></li>
                                        <li><a href="contact.html">My orders</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="footer_widget_list footer_list_width">
                            <h3>newsletter</h3>
                            <div class="footer_newsletter">
                                <div class="newsletter_desc">
                                    <p>I want to receive newsletters and
                                        special offers notices from Bucker<br>
                                        <span class="col-1" style="color:#fc7c7c;">Write your Email</span></p>
                                </div>

                                <div class="newsletter_subscribe">
                                    <form id="mc-form">
                                        <input id="mc-email" type="email" autocomplete="off"
                                               placeholder="Email Address">
                                        <button id="mc-submit"><i class="ion-arrow-right-c"></i></button>
                                    </form>
                                    <!-- mailchimp-alerts Start -->
                                    <div class="mailchimp-alerts text-centre">
                                        <div class="mailchimp-submitting"></div>
                                        <!-- mailchimp-submitting end -->
                                        <div class="mailchimp-success"></div>
                                        <!-- mailchimp-success end -->
                                        <div class="mailchimp-error"></div>
                                        <!-- mailchimp-error end -->
                                    </div><!-- mailchimp-alerts end -->
                                </div>
                                <div class="footer_paypal">
                                    <a href="#"><img src="assets/img/others/paypal.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="copyright_right text-center">
                <p> © 2022 <a href="#"> Bucker.</a> Made with <i class="ion-heart"></i> by Olena Vozniuk</p>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->


<!-- modal area start-->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="ion-android-close"></i></span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">
                                <div class="tab-content product-details-large">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="single-product.html"><img src="assets/img/product/product1.png"
                                                                               alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="single-product.html"><img src="assets/img/product/product2.png"
                                                                               alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab3" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="assets/img/product/product3.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab4" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="assets/img/product/product4.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal_tab_button">
                                    <ul class="nav product_navactive owl-carousel" role="tablist">
                                        <li>
                                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab"
                                               aria-controls="tab1" aria-selected="false"><img
                                                    src="assets/img/product/mini-product/product1.png" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"
                                               aria-controls="tab2" aria-selected="false"><img
                                                    src="assets/img/product/mini-product/product2.png" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link button_three" data-toggle="tab" href="#tab3"
                                               role="tab" aria-controls="tab3" aria-selected="false"><img
                                                    src="assets/img/product/mini-product/product3.png" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab4" role="tab"
                                               aria-controls="tab4" aria-selected="false"><img
                                                    src="assets/img/product/mini-product/product4.png" alt=""></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mb-10">
                                    <h2>Donec Ac Tempus</h2>
                                </div>
                                <div class="modal_price mb-10">
                                    <span class="new_price">$64.99</span>
                                    <span class="old_price">$78.99</span>
                                </div>
                                <div class="modal_description mb-15">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit. Mollitia iste
                                        laborum ad impedit pariatur esse optio tempora sint
                                        ullam autem deleniti nam
                                        in quos qui nemo ipsum numquam, reiciendis maiores
                                        quidem aperiam, rerum vel
                                        recusandae </p>
                                </div>
                                <div class="variants_selects">
                                    <div class="variants_size">
                                        <h2>size</h2>
                                        <select class="select_option">
                                            <option selected value="1">s</option>
                                            <option value="1">m</option>
                                            <option value="1">l</option>
                                            <option value="1">xl</option>
                                            <option value="1">xxl</option>
                                        </select>
                                    </div>
                                    <div class="variants_color">
                                        <h2>color</h2>
                                        <select class="select_option">
                                            <option selected value="1">purple</option>
                                            <option value="1">violet</option>
                                            <option value="1">black</option>
                                            <option value="1">pink</option>
                                            <option value="1">orange</option>
                                        </select>
                                    </div>
                                    <div class="modal_add_to_cart">
                                        <form action="#">
                                            <input min="1" max="100" step="1" value="1" type="number">
                                            <button type="submit">add to cart</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal_social">
                                    <h2>Share this product</h2>
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="ion-social-facebook"></i></a>
                                        </li>
                                        <li class="twitter"><a href="#"><i class="ion-social-twitter"></i></a></li>
                                        <li class="pinterest"><a href="#"><i class="ion-social-pinterest"></i></a>
                                        </li>
                                        <li class="google-plus"><a href="#"><i
                                                    class="ion-social-googleplus"></i></a>
                                        </li>
                                        <li class="linkedin"><a href="#"><i class="ion-social-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal area end-->

<!-- JS
============================================ -->

<script src="{{asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{asset('js/jquery-migrate-3.3.2.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.scrollup.min.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/mailchimp-ajax.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('js/main.js')}}"></script>


</body>

</html>
