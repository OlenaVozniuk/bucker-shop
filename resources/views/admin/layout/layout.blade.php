<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/libs.style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/fontawesome-all.css') }}">
    <title>Admin Shop</title>
</head>

<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">

    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand" href="index.html">Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <li class="nav-item">

                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><img
                                src="https://mdbcdn.b-cdn.net/img/new/avatars/5.webp" alt="Avatar"
                                class="rounded-circle shadow-4" style="width: 50px;"></a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                             aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
                            </div>
                            <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Settings</a>
                            <a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-power-off mr-2"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            MENU
                        </li>
                        {{--                        <li class="nav-item ">--}}
                        {{--                            <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Categories<span class="badge badge-success">6</span></a>--}}
                        {{--                            <div id="submenu-1" class="collapse submenu" style="">--}}
                        {{--                                <ul class="nav flex-column">--}}
                        {{--                                    <li class="nav-item">--}}
                        {{--                                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">Choose category</a>--}}
                        {{--                                        <div id="submenu-1-2" class="collapse submenu" style="">--}}
                        {{--                                            <ul class="nav flex-column">--}}
                        {{--                                                <li class="nav-item">--}}
                        {{--                                                    @foreach(\App\Models\Category::query()->get()->all() as $category)--}}
                        {{--                                                        <a class="nav-link" href="index.html">{{$category->name}}</a>--}}
                        {{--                                                    @endforeach--}}

                        {{--                                        </div>--}}
                        {{--                                    </li>--}}
                        {{--                                    <li class="nav-item">--}}
                        {{--                                        @foreach(\App\Models\Category::query()->get()->all() as $category)--}}
                        {{--                                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-{{$category->id}}" aria-controls="submenu-1-1">{{$category->name}}</a>--}}
                        {{--                                        <div id="submenu-{{$category->id}}" class="collapse submenu" style="">--}}
                        {{--                                            <ul class="nav flex-column">--}}
                        {{--                                                <li class="nav-item">--}}
                        {{--                                                    @foreach($category->subcategories as $subcategory)--}}
                        {{--                                                        <a class="nav-link" href="{{ route('subcategories.show', $subcategory->id) }}">{{$subcategory->name}}</a>--}}
                        {{--                                                    @endforeach--}}
                        {{--                                                </li>--}}
                        {{--                                            </ul>--}}
                        {{--                                        </div>--}}
                        {{--                                    </li>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </ul>--}}
                        {{--                            </div>--}}
                        {{--                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : ''}}"
                               href="{{ route('admin.categories.index') }}"><i class="fas fa-fw fa-columns"></i>Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('admin/subcategories') || request()->is('admin/subcategories/*') ? 'active' : ''}}"
                               href="{{ route('admin.subcategories.index') }}"><i class="fas fa-fw fa-columns"></i>Subcategories</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : ''}}"
                               href="{{ route('admin.products.index') }}"><i class="fas fa-fw fa-map-marker-alt"></i>Products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : ''}}"
                               href="{{ route('admin.users.index') }}"><i class="fas fa-fw fa-map-marker-alt"></i>Users</a>
                        </li>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                @if ($message = \Illuminate\Support\Facades\Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = \Illuminate\Support\Facades\Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->

<!-- Optional JavaScript -->
<!-- jquery 3.3.1  -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<!-- bootstap bundle js-->
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<!-- slimscroll js-->
<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
<!-- main js-->
<script src="{{ asset('js/main-js.js') }}"></script>
</body>


</html>
