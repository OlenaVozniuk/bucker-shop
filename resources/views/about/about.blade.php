@extends('layout.layout')
@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-110" data-bgimg="{{ asset('images/breadcrumbs-bg.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>About Us</h1>
                        <ul>
                            <li><a href="{{ route('home') }}">Home </a></li>
                            <li> // About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->

    <!-- about video section start -->
    <div class="about_video-section wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about_video_thumb" style="text-align: center;">
                        <iframe width="1160" height="515" src="https://www.youtube.com/embed/XNXuwrXFHRs"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about video section end -->

    <!-- about description section start -->
    <div class="about_description_section mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about_desc wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <h2>Our Core Values</h2>
                        <p><b>Accountability:</b> We acknowledge and accept responsibility for actions, products,
                            decisions, time and policies.</p>
                        <p><b>Community:</b> We actively support our community, donating our product and time to the
                            specific needs of the organizations, neighborhoods and families we serve.</p>
                        <p><b>Teamwork:</b>
                        We strive to create a positive work environment by building a spirit of
                            cooperative effort among individuals and departments; realizing our success depends on
                            our ability to perform as one successful team.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about_desc wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <h2>Our Mission</h2>
                        <p><b>Bucker Bakery</b> serves our families, employees, community by preparing baked goods of
                            exceptional quality that bring a special joy to life.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about description section end -->

    <!-- team member section start -->
    <div class="team_member_section mb-110">
        <div class="container">
            <div class="section_title text-center wow fadeInUp mb-50" data-wow-delay="0.1s" data-wow-duration="1.1s">
                <h2>Team Members</h2>
            </div>
            <div class="team_member_inner">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single_team_member wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                            <div class="team_thumb">
                                <a href="#"><img src="{{ asset('images/team1.jpg') }}" alt=""></a>
                                <div class="team_text">
                                    <h3>Bradley Cooper</h3>
                                    <h4>Sale Manager</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single_team_member wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                            <div class="team_thumb">
                                <a href="#"><img src="{{asset('images/team2.jpg')}}" alt=""></a>
                                <div class="team_text">
                                    <h3>Kianna Pham</h3>
                                    <h4>Owner</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single_team_member wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                            <div class="team_thumb">
                                <a href="#"><img src="{{ asset('images/team3.jpg') }}" alt=""></a>
                                <div class="team_text">
                                    <h3>Antonio Bahur</h3>
                                    <h4>Chef</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team member section end -->

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
@endsection
