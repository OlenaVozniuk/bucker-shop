@extends('layout.layout')
@section('content')

    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-100" data-bgimg="{{asset('images/breadcrumbs-bg.png')}}">
        <div class="container">
            <div class="row">
                <div class="text-black">
                    <div class="breadcrumbs_text">
                        <h1>Products</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->

    <!-- product page section start -->
    <div class="product_page_section mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="product_sidebar product_widget">
                        <div class="widget__list widget_filter wow fadeInUp" data-wow-delay="0.1s"
                             data-wow-duration="1.1s">
                            <h3>Filter</h3>
                            <div class="widget_filter_list">
                                <div class="widget__list category wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                                    <h3>category</h3>
                                    <div class="widget_category">
                                        <ul>
                                            <li>
                                                <a class="{{is_null(request()->get('category_id')) ? 'active' : ''}}"
                                                   href="{{route('shop')}}">All</a></li>
                                            @foreach($categories as $category)
                                                <li>
                                                    <a class="{{request()->get('category_id') == $category->getKey() ? 'active' : ''}}"
                                                       href="{{route('shop', ['category_id' => $category->id])}}">{{$category->name}}
                                                        <span>{{$category->products->count()}}</span></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @if(!is_null(request()->get('category_id')))
                                    <div class="widget__list category wow fadeInUp" data-wow-delay="0.2s"
                                         data-wow-duration="1.2s">
                                        <h3>subcategory</h3>
                                        <div class="widget_category">
                                            <ul>
                                                @foreach($subcategories->where('category_id', request()->get('category_id')) as $subcategory)
                                                    <li>
                                                        <a class="{{request()->get('subcategory_id') == $subcategory->getKey() ? 'active' : ''}}"
                                                           href="{{route('shop', ['subcategory_id' => $subcategory->id, 'category_id' => $subcategory->category_id])}}">{{$subcategory->name}}
                                                            <span>{{$subcategory->products->count()}}</span></a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="widget__list wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                            <div class="widget_banner">
                                <img src="assets/img/others/product-sidaber-banner.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product_page_wrapper">
                        <!--shop toolbar area start-->
                        <div class="product_sidebar_header mb-60 d-flex justify-content-between align-items-center">
                            <div class="page__amount border">
                                <p><span>{{$products->count()}}</span> Product Found of <span>{{$products->total()}}</span></p>
                            </div>
                            <div class="product_header_right d-flex align-items-center">
                                <div class="sorting__by d-flex align-items-center">
                                    <span>Sort By : </span>
                                    <form class="select_option" action="{{route('shop')}}">
                                        <input type="hidden" class="sort_by" name="sort_by">
                                        <select id="short">
                                            <option selected value="1">Default</option>
                                            <option value="4"> low to high</option>
                                            <option value="5"> high to low</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="product__toolbar__btn">
                                    <ul class="nav" role="tablist">
                                        <li class="nav-item">
                                            <a class="active" data-bs-toggle="tab" href="#grid" role="tab"
                                               aria-controls="grid" aria-selected="true"><i class="ion-grid"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-bs-toggle="tab" href="#list" aria-controls="list" role="tab"
                                               aria-selected="false"><i class="ion-ios-list"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--shop toolbar area end-->


                        <!--shop gallery start-->
                        <div class="product_page_gallery">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="grid">
                                    <div class="row grid__product">
                                        @foreach($products as $product)
                                            @include('products.partials.product-card-block')
                                        @endforeach

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list">
                                    <div class="list__product">
                                        @foreach($products as $product)
                                            @include('products.partials.product-card-list')
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    {{--                        <div class="pagination product_pagination">--}}
                    {{--                            <ul>--}}
                    {{--                                    <li class="current"><span>1</span></li>--}}
                    {{--                                    <li><a href="#">2</a></li>--}}
                    {{--                                    <li><a href="#">3</a></li>--}}
                    {{--                                    <li class="next"><a href="#"><i class="ion-chevron-right"></i></a></li>--}}
                    {{--                            </ul>--}}
                    {{--                        </div>--}}

                    {!! $products->links('vendor.pagination.pagination') !!}
                    <!--shop gallery end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product page section end -->
@endsection
