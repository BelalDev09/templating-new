<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    @yield('head')

    <link rel="shortcut icon" href="{{ asset('Backend/assets/images/favicon.ico') }}">

    <!-- CSS Libraries -->
    <link href="{{ asset('Backend/assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('Backend/assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <!-- Core CSS -->
    <link href="{{ asset('Backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('Backend/assets/css/icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('Backend/assets/css/app.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('Backend/assets/css/custom.min.css') }}" rel="stylesheet" />


    <!-- Layout JS -->
    <script src="{{ asset('Backend/assets/js/layout.js') }}"></script>
    <!-- Page Specific Styles -->
    @stack('styles')
</head>

<body>

    <div id="layout-wrapper">

        {{-- TOP NAVBAR --}}
        @include('backend.partials.navbar')

        {{-- SIDEBAR --}}
        <div class="app-menu navbar-menu">
            <div class="navbar-brand-box">
                <a href="#" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('Backend/assets/images/logo-sm.png') }}" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('Backend/assets/images/logo-dark.png') }}" height="17">
                    </span>
                </a>
                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('Backend/assets/images/logo-sm.png') }}" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('Backend/assets/images/logo-light.png') }}" height="17">
                    </span>
                </a>
            </div>

            <div id="scrollbar">
                @include('backend.partials.sidebar')
            </div>

            <div class="sidebar-background"></div>
        </div>

        <div class="vertical-overlay"></div>

        {{-- MAIN CONTENT --}}
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    {{-- PAGE CONTENT --}}
                    @yield('content')

                </div>
            </div>

            {{-- FOOTER --}}
            @include('backend.partials.footer')
        </div>

    </div>

    {{-- BACK TO TOP --}}
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    {{-- PRELOADER --}}
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm"></div>
        </div>
    </div>
    <!-- Core JS -->
    <script src="{{ asset('Backend/assets/js/app.js') }}"></script>
    <!-- JS Libraries -->
    <script src="{{ asset('Backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/plugins.js') }}"></script>

    <script src="{{ asset('Backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('Backend/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Page Specific Scripts -->
    @stack('scripts')

</body>

</html>
