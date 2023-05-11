@extends('layout.layout')
@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-100" data-bgimg="{{ asset('images/breadcrumbs-bg.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>Contact Us</h1>
                        <ul>
                            <li><a href="{{ route('home') }}">Home </a></li>
                            <li> // Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->

    <!-- contact section start -->
    <div class="contact_page_section mb-100">
        <div class="container">
            <div class="contact_details">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="contact_info_content">
                            <h2>We Are Here For Help You!
                                Please Contact Us.</h2>
                            <div class="contact_info_details mb-45">
                                <h3>Store In Lviv</h3>
                                <p>31 Svobody, Lviv</p>
                                <p><a href="tel:0123456789">+38 063 111 11 11</a></p>
                                <p><a href="#">bucker.lviv@gmail.com</a></p>
                                <br>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2573.000554656667!2d24.026238499999998!3d49.84244710000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473add72418ec34b%3A0xc7ca771a4c344bb8!2z0L_RgNC-0YHQvy4g0KHQstC-0LHQvtC00YssIDMxLCDQm9GM0LLQvtCyLCDQm9GM0LLQvtCy0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsIDc5MDAw!5e0!3m2!1sru!2sua!4v1662054980471!5m2!1sru!2sua"
                                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="contact_form">
                            <h2>Send A Question</h2>
                            <form id="contact-form" action="{{ route('contact.send') }} " method="POST">
                                @csrf
                                @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <div class="form_input">
                                    <input name="name" placeholder="Name*" type="text">
                                </div>
                                @error('email')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <div class="form_input">
                                    <input name="email" placeholder="E-Mail*" type="text">
                                </div>
                                @error('message')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <div class="form_textarea">
                                    <textarea name="message" placeholder="Message Here"></textarea>
                                </div>
                                <div class="form_input_btn">
                                    <button type="submit" class="btn btn-link">send message</button>
                                </div>
                                <p class="form-message"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact section end -->

    <!--contact map start-->
    <div class="contact_map mt-70">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11180612.304999094!2d12.732072788911434!3d46.83105679467907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d1d9c154700e8f%3A0x1068488f64010!2sUkraine!5e0!3m2!1sen!2sbd!4v1662054266674!5m2!1sen!2sbd"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!--contact map end-->
@endsection
