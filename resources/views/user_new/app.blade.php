<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->


<!-- Mirrored from ableproadmin.com/dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2024 18:19:58 GMT -->
<head>
    <title>Dashboard</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
          content="Able Pro is trending dashboard template made using Bootstrap 5 design framework. Able Pro is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies.">
    <meta name="keywords"
          content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard">
    <meta name="author" content="Phoenixcoded">

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{asset('backend/logo.svg')}}" type="image/x-icon"> <!-- [Font] Family -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/inter/inter.css')}}" id="main-font-link"/>
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/tabler-icons.min.css')}}">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/feather.css')}}">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/fontawesome.css')}}">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/material.css')}}">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}" id="main-style-link">
    <link rel="stylesheet" href="{{asset('backend/assets/css/style-preset.css')}}">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-14K1GBX9FG"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Bootstrap CSS -->
    {{--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">--}}

    <!-- Bootstrap JS and dependencies -->
    {{--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    ></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>


    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-14K1GBX9FG');
    </script>
    <!-- WiserNotify -->
    <script>
        !(function () {
            if (window.t4hto4) console.log('WiserNotify pixel installed multiple time in this page');
            else {
                window.t4hto4 = !0;
                var t = document,
                    e = window,
                    n = function () {
                        var e = t.createElement('script');
                        (e.type = 'text/javascript'),
                            (e.async = !0),
                            (e.src = '../../pt.wisernotify.com/pixel6d4c.js?ti=1jclj6jkfc4hhry'),
                            document.body.appendChild(e);
                    };
                'complete' === t.readyState ? n() : window.attachEvent ? e.attachEvent('onload', n) : e.addEventListener('load', n, !1);
            }
        })();
    </script>
    <!-- Microsoft clarity -->
    <script type="text/javascript">
        (function (c, l, a, r, i, t, y) {
            c[a] =
                c[a] ||
                function () {
                    (c[a].q = c[a].q || []).push(arguments);
                };
            t = l.createElement(r);
            t.async = 1;
            t.src = 'https://www.clarity.ms/tag/' + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, 'clarity', 'script', 'gkn6wuhrtb');
    </script>

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast=""
      data-pc-theme="light">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
<nav style=" background: linear-gradient(90deg, #0d0d0d 0%, #4c2835 100%, #0d0d0d 100%);" class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{route('user.dashboard')}}" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img style="height: 60px" src="{{asset('frontend/images/Lieblings-300x126.png')}}" class="img-fluid" alt="logo">
                {{--                <span class="badge bg-light-success rounded-pill ms-2 theme-version">v9.0</span>--}}
            </a>
        </div>
        <div class="navbar-content">
            <div class="card pc-user-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{asset('backend/assets/images/user/avatar-1.jpg')}}" alt="user-image"
                                 class="user-avtar wid-45 rounded-circle"/>
                        </div>
                        <div class="flex-grow-1 ms-3 me-2">
                            <h6 class="mb-0">{{Auth::user()->first_name}}</h6>
                            <small>Dashboard</small>
                        </div>
                        <a class="btn btn-icon btn-link-secondary avtar" data-bs-toggle="collapse"
                           href="#pc_sidebar_userlink">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-sort-outline"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="collapse pc-user-links" id="pc_sidebar_userlink">
                        <div class="pt-3">
                            <a href="{{route('user.profile')}}">
                                <i class="ti ti-user"></i>
                                <span>My Account</span>
                            </a>

                            <a href="{{route('logout')}}">
                                <i class="ti ti-power"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{route('user.dashboard')}}" class="pc-link">
            <span class="pc-micon">
              <svg class="ph-duotone ph-user-list ph-user-list">
                <use xlink:href="#custom-status-up"></use>
              </svg>
            </span><span class="pc-mtext">Dashboard</span>
                        {{--                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>--}}
                        {{--                        <span class="pc-badge">2</span>--}}
                    </a>

                </li>





                <li class="pc-item pc-hasmenu">
                    <a href="{{route('user.profile')}}" class="pc-link">
                        <i style="font-size: 20px;" class="ph-duotone ph-user-focus"></i>
                        <span class="pc-mtext">Mein Profil</span>
                        {{--                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>--}}
                        {{--                        <span class="pc-badge">2</span>--}}
                    </a>
                </li>

<li class="pc-item pc-hasmenu">
                    <a href="{{route('show.model.chat')}}" class="pc-link">
                        <i style="font-size: 20px;" class="ph-duotone ph-chat-circle"></i>
                        <span class="pc-mtext">Meine Chats</span>
                        {{--                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>--}}
                        {{--                        <span class="pc-badge">2</span>--}}
                    </a>
                </li>


                <li class="pc-item pc-hasmenu">
                    <a href="{{route('user.news')}}" class="pc-link">
                        <i style="font-size: 20px;" class="ph-duotone ph-newspaper"></i>
                        <span class="pc-mtext">Nachrichten anzeigen</span>
                        {{--                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>--}}
                        {{--                        <span class="pc-badge">2</span>--}}
                    </a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{route('models')}}" class="pc-link">
                        <i style="font-size: 20px;" class="ph-duotone ph-users-three"></i>
                        <span class="pc-mtext">Model suchen</span>
                        {{--                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>--}}
                        {{--                        <span class="pc-badge">2</span>--}}
                    </a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{route('user.wheel')}}" class="pc-link">
                        <i style="font-size: 20px;" class="ph-duotone ph-pinwheel"></i>
                        <span class="pc-mtext">Glucksrad </span>
                    </a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{route('user.coins')}}" class="pc-link">
                        <i style="font-size: 20px;" class="ph-duotone ph-hand-coins"></i>
                        <span class="pc-mtext">Coins Kaufen </span>
                    </a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{route('user.payment')}}" class="pc-link">
                        <i style="font-size: 20px;" class="ph-duotone ph-paypal-logo"></i>
                        <span class="pc-mtext">Bestellverlauf </span>
                    </a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{route('logout')}}" class="pc-link">
                        <i style="font-size: 20px;" class="ph-duotone ph-sign-out"></i>

                        <span class="pc-mtext" style="color: red">Logout</span>
                        {{--                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>--}}
                        {{--                        <span class="pc-badge">2</span>--}}
                    </a>
                </li>


            </ul>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
<header class="pc-header">
    <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <!-- ======= Menu collapse Icon ===== -->
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>

            </ul>
        </div>
        <!-- [Mobile Media Block end] -->
        <div class="ms-auto">
            <ul class="list-unstyled">


                <li class="dropdown pc-h-item">
                    <a
                        class="pc-head-link dropdown-toggle arrow-none me-0"
                        data-bs-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-haspopup="false"
                        aria-expanded="false"
                    >
                        <svg class="pc-icon">
                            <use xlink:href="#custom-notification"></use>
                        </svg>
                        <span class="badge bg-success pc-h-badge"></span>
                    </a>

                </li>
            </ul>
        </div>
    </div>
</header>

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">@yield('page')</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h4 style="margin: 20px 1px;" class="mb-0">@yield('title')</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')


        {{--        <div class="pct-c-btn">--}}
        {{--            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_pc_layout">--}}
        {{--                <i class="ph-duotone ph-gear-six"></i>--}}
        {{--            </a>--}}
        {{--        </div>--}}
        {{--        <div class="offcanvas border-0 pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_pc_layout">--}}
        {{--            <div class="offcanvas-header">--}}
        {{--                <h5 class="offcanvas-title">Settings</h5>--}}
        {{--                <button type="button" class="btn btn-icon btn-link-danger" data-bs-dismiss="offcanvas"--}}
        {{--                        aria-label="Close"><i--}}
        {{--                        class="ti ti-x"></i></button>--}}
        {{--            </div>--}}
        {{--            <div class="pct-body customizer-body">--}}
        {{--                <div class="offcanvas-body py-0">--}}
        {{--                    <ul class="list-group list-group-flush">--}}
        {{--                        <li class="list-group-item">--}}
        {{--                            <div class="pc-dark">--}}
        {{--                                <h6 class="mb-1">Theme Mode</h6>--}}
        {{--                                <p class="text-muted text-sm">Choose light or dark mode or Auto</p>--}}
        {{--                                <div class="row theme-color theme-layout">--}}
        {{--                                    <div class="col-4">--}}
        {{--                                        <div class="d-grid">--}}
        {{--                                            <button class="preset-btn btn active" data-value="true"--}}
        {{--                                                    onclick="layout_change('light');" data-bs-toggle="tooltip"--}}
        {{--                                                    title="Light">--}}
        {{--                                                <svg class="pc-icon text-warning">--}}
        {{--                                                    <use xlink:href="#custom-sun-1"></use>--}}
        {{--                                                </svg>--}}
        {{--                                            </button>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="col-4">--}}
        {{--                                        <div class="d-grid">--}}
        {{--                                            <button class="preset-btn btn" data-value="false"--}}
        {{--                                                    onclick="layout_change('dark');" data-bs-toggle="tooltip"--}}
        {{--                                                    title="Dark">--}}
        {{--                                                <svg class="pc-icon">--}}
        {{--                                                    <use xlink:href="#custom-moon"></use>--}}
        {{--                                                </svg>--}}
        {{--                                            </button>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="col-4">--}}
        {{--                                        <div class="d-grid">--}}
        {{--                                            <button class="preset-btn btn" data-value="default"--}}
        {{--                                                    onclick="layout_change_default();"--}}
        {{--                                                    data-bs-toggle="tooltip"--}}
        {{--                                                    title="Automatically sets the theme based on user's operating system's color scheme.">--}}
        {{--                        <span class="pc-lay-icon d-flex align-items-center justify-content-center">--}}
        {{--                          <i class="ph-duotone ph-cpu"></i>--}}
        {{--                        </span>--}}
        {{--                                            </button>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </li>--}}
        {{--                        <li class="list-group-item">--}}
        {{--                            <h6 class="mb-1">Theme Contrast</h6>--}}
        {{--                            <p class="text-muted text-sm">Choose theme contrast</p>--}}
        {{--                            <div class="row theme-contrast">--}}
        {{--                                <div class="col-6">--}}
        {{--                                    <div class="d-grid">--}}
        {{--                                        <button class="preset-btn btn" data-value="true"--}}
        {{--                                                onclick="layout_theme_contrast_change('true');" data-bs-toggle="tooltip"--}}
        {{--                                                title="True">--}}
        {{--                                            <svg class="pc-icon">--}}
        {{--                                                <use xlink:href="#custom-mask"></use>--}}
        {{--                                            </svg>--}}
        {{--                                        </button>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="col-6">--}}
        {{--                                    <div class="d-grid">--}}
        {{--                                        <button class="preset-btn btn active" data-value="false"--}}
        {{--                                                onclick="layout_theme_contrast_change('false');"--}}
        {{--                                                data-bs-toggle="tooltip" title="False">--}}
        {{--                                            <svg class="pc-icon">--}}
        {{--                                                <use xlink:href="#custom-mask-1-outline"></use>--}}
        {{--                                            </svg>--}}
        {{--                                        </button>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </li>--}}
        {{--                        <li class="list-group-item">--}}
        {{--                            <h6 class="mb-1">Custom Theme</h6>--}}
        {{--                            <p class="text-muted text-sm">Choose your primary theme color</p>--}}
        {{--                            <div class="theme-color preset-color">--}}
        {{--                                <a href="#!" data-bs-toggle="tooltip" title="Blue" class="active" data-value="preset-1"><i--}}
        {{--                                        class="ti ti-checks"></i></a>--}}
        {{--                                <a href="#!" data-bs-toggle="tooltip" title="Indigo" data-value="preset-2"><i--}}
        {{--                                        class="ti ti-checks"></i></a>--}}
        {{--                                <a href="#!" data-bs-toggle="tooltip" title="Purple" data-value="preset-3"><i--}}
        {{--                                        class="ti ti-checks"></i></a>--}}
        {{--                                <a href="#!" data-bs-toggle="tooltip" title="Pink" data-value="preset-4"><i--}}
        {{--                                        class="ti ti-checks"></i></a>--}}
        {{--                                <a href="#!" data-bs-toggle="tooltip" title="Red" data-value="preset-5"><i--}}
        {{--                                        class="ti ti-checks"></i></a>--}}
        {{--                                <a href="#!" data-bs-toggle="tooltip" title="Orange" data-value="preset-6"><i--}}
        {{--                                        class="ti ti-checks"></i></a>--}}
        {{--                                <a href="#!" data-bs-toggle="tooltip" title="Yellow" data-value="preset-7"><i--}}
        {{--                                        class="ti ti-checks"></i></a>--}}
        {{--                                <a href="#!" data-bs-toggle="tooltip" title="Green" data-value="preset-8"><i--}}
        {{--                                        class="ti ti-checks"></i></a>--}}
        {{--                                <a href="#!" data-bs-toggle="tooltip" title="Teal" data-value="preset-9"><i--}}
        {{--                                        class="ti ti-checks"></i></a>--}}
        {{--                                <a href="#!" data-bs-toggle="tooltip" title="Cyan" data-value="preset-10"><i--}}
        {{--                                        class="ti ti-checks"></i></a>--}}
        {{--                            </div>--}}
        {{--                        </li>--}}
        {{--                        <li class="list-group-item">--}}
        {{--                            <h6 class="mb-1">Sidebar Caption</h6>--}}
        {{--                            <p class="text-muted text-sm">Sidebar Caption Hide/Show</p>--}}
        {{--                            <div class="row theme-color theme-nav-caption">--}}
        {{--                                <div class="col-6">--}}
        {{--                                    <div class="d-grid">--}}
        {{--                                        <button class="preset-btn btn-img btn active" data-value="true"--}}
        {{--                                                onclick="layout_caption_change('true');" data-bs-toggle="tooltip"--}}
        {{--                                                title="Caption Show">--}}
        {{--                                            <img src="../assets/images/customizer/caption-on.svg" alt="img"--}}
        {{--                                                 class="img-fluid">--}}
        {{--                                        </button>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="col-6">--}}
        {{--                                    <div class="d-grid">--}}
        {{--                                        <button class="preset-btn btn-img btn" data-value="false"--}}
        {{--                                                onclick="layout_caption_change('false');" data-bs-toggle="tooltip"--}}
        {{--                                                title="Caption Hide">--}}
        {{--                                            <img src="../assets/images/customizer/caption-off.svg" alt="img"--}}
        {{--                                                 class="img-fluid">--}}
        {{--                                        </button>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </li>--}}
        {{--                        <li class="list-group-item">--}}
        {{--                            <div class="pc-rtl">--}}
        {{--                                <h6 class="mb-1">Theme Layout</h6>--}}
        {{--                                <p class="text-muted text-sm">LTR/RTL</p>--}}
        {{--                                <div class="row theme-color theme-direction">--}}
        {{--                                    <div class="col-6">--}}
        {{--                                        <div class="d-grid">--}}
        {{--                                            <button class="preset-btn btn-img btn active" data-value="false"--}}
        {{--                                                    onclick="layout_rtl_change('false');" data-bs-toggle="tooltip"--}}
        {{--                                                    title="LTR">--}}
        {{--                                                <img src="../assets/images/customizer/ltr.svg" alt="img"--}}
        {{--                                                     class="img-fluid">--}}
        {{--                                            </button>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="col-6">--}}
        {{--                                        <div class="d-grid">--}}
        {{--                                            <button class="preset-btn btn-img btn" data-value="true"--}}
        {{--                                                    onclick="layout_rtl_change('true');" data-bs-toggle="tooltip"--}}
        {{--                                                    title="RTL">--}}
        {{--                                                <img src="../assets/images/customizer/rtl.svg" alt="img"--}}
        {{--                                                     class="img-fluid">--}}
        {{--                                            </button>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </li>--}}
        {{--                        <li class="list-group-item pc-box-width">--}}
        {{--                            <div class="pc-container-width">--}}
        {{--                                <h6 class="mb-1">Layout Width</h6>--}}
        {{--                                <p class="text-muted text-sm">Choose Full or Container Layout</p>--}}
        {{--                                <div class="row theme-color theme-container">--}}
        {{--                                    <div class="col-6">--}}
        {{--                                        <div class="d-grid">--}}
        {{--                                            <button class="preset-btn btn-img btn active" data-value="false"--}}
        {{--                                                    onclick="change_box_container('false')" data-bs-toggle="tooltip"--}}
        {{--                                                    title="Full Width">--}}
        {{--                                                <img src="../assets/images/customizer/full.svg" alt="img"--}}
        {{--                                                     class="img-fluid">--}}
        {{--                                            </button>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="col-6">--}}
        {{--                                        <div class="d-grid">--}}
        {{--                                            <button class="preset-btn btn-img btn" data-value="true"--}}
        {{--                                                    onclick="change_box_container('true')" data-bs-toggle="tooltip"--}}
        {{--                                                    title="Fixed Width">--}}
        {{--                                                <img src="../assets/images/customizer/fixed.svg" alt="img"--}}
        {{--                                                     class="img-fluid">--}}
        {{--                                            </button>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </li>--}}
        {{--                        <li class="list-group-item">--}}
        {{--                            <div class="d-grid">--}}
        {{--                                <button class="btn btn-light-danger" id="layoutreset">Reset Layout</button>--}}
        {{--                            </div>--}}
        {{--                        </li>--}}
        {{--                    </ul>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <!-- [Page Specific JS] start -->
        <script src="{{asset('backend/assets/js/plugins/apexcharts.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/pages/dashboard-default.js')}}"></script>
        <!-- [Page Specific JS] end -->
        <!-- Required Js -->
        <script src="{{asset('backend/assets/js/plugins/popper.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/plugins/simplebar.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/plugins/bootstrap.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/fonts/custom-font.js')}}"></script>
        <script src="{{asset('backend/assets/js/pcoded.js')}}"></script>
        <script src="{{asset('backend/assets/js/plugins/feather.min.js')}}"></script>


        <script>layout_change('light');</script>


        <script>layout_theme_contrast_change('false');</script>


        <script>change_box_container('false');</script>


        <script>layout_caption_change('true');</script>


        <script>layout_rtl_change('false');</script>


        <script>preset_change("preset-1");</script>

</body>
<!-- [Body] end -->


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}";
    switch (type) {
        case 'info':
            Toastify({
                text: "{{ Session::get('message') }}", duration: 3000,
                style: {background: "linear-gradient(to right, #00b09b, #96c93d)"}
            }).showToast();
            break;

        case 'success':
            Toastify({
                text: "{{ Session::get('message') }}", duration: 3000,
                style: {background: "linear-gradient(to right, #00b09b, #96c93d)"}
            }).showToast();
            break;

        case 'warning':
            Toastify({
                text: "{{ Session::get('message') }}", duration: 3000,
                style: {background: "linear-gradient(to right, #00b09b, #96c93d)"}
            }).showToast();
            break;

        case 'error':
            Toastify({
                text: "{{ Session::get('message') }}", duration: 3000,
                style: {background: "linear-gradient(to right, #ff0000, #ff0000)"}
            }).showToast();
            break;
    }

    // Unset the session
    {{ Session::forget('message') }}
    {{ Session::forget('alert-type') }}
    @endif
</script>

<div class="ff-fab-container">
    <button id="ff-main-fab" class="ff-fab">+</button>
    <div id="ff-secondary-buttons" class="ff-hidden">
        <button id="ff-chat-btn" class="ff-fab ff-secondary">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSR9IyxsfqiQSWjikSN9R_qovButKOzYbYxqA&s"/>
        </button>

        <script>
            document.getElementById('ff-chat-btn').addEventListener('click', function() {
                window.location.href = "{{ route('show.model.chat') }}";
            });
        </script>
        <button id="ff-update-status-btn" class="ff-fab ff-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS__2Q54HucOe8WGDOpNVpzuTTk0HYe1eV-Fw&s"/></button>
    </div>
</div>

<!-- Status Modal -->
<div id="ff-status-modal" class="ff-modal ff-hidden">
    <div class="ff-modal-content">
        <span id="ff-close-modal" class="ff-close">&times;</span>
        <h4 style="text-align: center; margin-bottom: 20px;">Status Update</h4>
        <form id="ff-status-form" method="post" action="{{route('user.status.update')}}" enctype="multipart/form-data">
            @csrf
            <input type="file"  name="file-upload" required>
            <button style="margin-top: 40px;" type="submit">Update Status</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mainFab = document.getElementById('ff-main-fab');
        const secondaryButtons = document.getElementById('ff-secondary-buttons');
        const chatBtn = document.getElementById('ff-chat-btn');
        const updateStatusBtn = document.getElementById('ff-update-status-btn');
        const statusModal = document.getElementById('ff-status-modal');
        const closeModal = document.getElementById('ff-close-modal');

        // Toggle secondary buttons visibility
        mainFab.addEventListener('click', () => {
            secondaryButtons.classList.toggle('ff-hidden');
            const secondaryBtns = document.querySelectorAll('.ff-secondary');
            secondaryBtns.forEach(btn => {
                btn.style.display = btn.style.display === 'block' ? 'none' : 'block';
            });
        });

        // Redirect to chat page
        chatBtn.addEventListener('click', () => {
            window.location.href = '#';
        });

        // Open the status modal
        updateStatusBtn.addEventListener('click', () => {
            statusModal.style.display = 'block';
        });

        // Close the modal
        closeModal.addEventListener('click', () => {
            statusModal.style.display = 'none';
        });

        // Close the modal when clicking outside of it
        window.addEventListener('click', (event) => {
            if (event.target === statusModal) {
                statusModal.style.display = 'none';
            }
        });

    });

    // Sample chat data

</script>
<style>
    :root {
        --primary-color: #3498db;
        --secondary-color: #2c3e50;
        --background-color: #f4f6f8;
        --text-color: #34495e;
        --icon-size: 24px;
    }

    body {
        background-color: var(--background-color);
        color: var(--text-color);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        padding: 30px;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    /* Icon Container */
    .icon-container {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    /* Base Icon Styles */
    .custom-icon {
        width: var(--icon-size);
        height: var(--icon-size);
        position: relative;
        cursor: pointer;
        transition: transform 0.3s ease;
        background-size: cover;
        background-position: center;
    }

    .custom-icon:hover {
        transform: scale(1.1);
    }

    /* Sophisticated Eye Icon */
    .custom-eye-icon {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" fill="%233498db" viewBox="0 0 24 24"><path d="M12 4.5c-3.5 0-6.5 2.8-8 6.5 1.5 3.7 4.5 6.5 8 6.5s6.5-2.8 8-6.5c-1.5-3.7-4.5-6.5-8-6.5zm0 11c-2.1 0-3.8-1.7-3.8-3.8S9.9 8 12 8s3.8 1.7 3.8 3.8S14.1 15.5 12 15.5z"/><circle cx="12" cy="12" r="2.5" fill="%23ffffff"/></svg>');
    }

    /* Sophisticated Chat Icon */
    .custom-chat-icon {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" fill="%232c3e50" viewBox="0 0 24 24"><path d="M20 4h-16c-1.1 0-2 .9-2 2v14l4-4h14c1.1 0 2-.9 2-2v-8c0-1.1-.9-2-2-2zm-8 7h-8v-2h8v2zm4-4h-12v-2h12v2zm0 8h-12v-2h12v2z"/></svg>');
    }

    /* NFT Container Styling */
    .nft {
        border: none;
        border-radius: 12px;
        padding: 25px;
        background-color: #ffffff;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .nft:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .nft .title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--secondary-color);
        margin-top: 15px;
    }

    /* Tooltip styles */
    [title] {
        position: relative;
    }

    [title]:hover::after {
        content: attr(title);
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        background-color: var(--secondary-color);
        color: #ffffff;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        white-space: nowrap;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    [title]:hover::after {
        opacity: 1;
    }

    .ff-fab-container {
        position: fixed;
        bottom: 150px;
        right: 20px;
        display: flex;
        flex-direction: column-reverse; /* Reverse the column direction */
        align-items: center;
    }

    .ff-fab {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: #343434;
        color: white;
        border: none;
        font-size: 24px;
        cursor: pointer;
        margin-top: 10px; /* Add margin to separate the buttons */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .ff-fab img {
        width: 50%;  /* Make the image smaller than the button */
        height: 50%; /* Maintain aspect ratio and center it */
        object-fit: contain; /* Ensure the image fits well within the button */
    }

    .ff-fab:hover {
        background-color: #600f2d;
    }

    .ff-secondary {
        display: none;
    }

    .ff-hidden {
        display: none;
    }

    .ff-modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .ff-modal-content {
        background-color: white;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 5px;
    }

    .ff-close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .ff-close:hover,
    .ff-close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    #ff-status-form {
        display: flex;
        flex-direction: column;
    }

    #ff-status-form label {
        margin-bottom: 10px;
    }

    #ff-status-form input {
        margin-bottom: 20px;
    }

    #ff-status-form button {
        padding: 10px;
        background-color: #562d38;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #ff-status-form button:hover {
        background-color: #824554;
    }

    /* End Responsive */


</style>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    /* CSS for floating chat button */
    .chat-btn {
        position: fixed;
        bottom: 140px;
        right: 20px;
        width: 60px;
        height: 60px;
        background-color: #b01e1e;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        z-index: 1000;
    }

    .chat-btn i {
        color: white;
        font-size: 24px;
    }

    /* Chat window styling */
    .chat-window {
        display: none;
        position: fixed;
        bottom: 90px;
        right: 20px;
        width: 300px;
        height: 400px;
        background-color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        z-index: 1000;
    }

    .chat-header {
        background-color: #28a745;
        color: white;
        padding: 10px;
        border-radius: 10px 10px 0 0;
        font-weight: bold;
    }

    .chat-body {
        padding: 10px;
        height: calc(100% - 60px);
        overflow-y: auto;
    }

    .close-btn {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 3px;
    }
</style>

<script>
    $(document).ready(function () {
        $('#my-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true
        });
    });
</script>


<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: [
                'heading', '|',
                'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
                'undo', 'redo'
            ],
            removePlugins: [
                'Image',
                'ImageToolbar',
                'ImageCaption',
                'ImageStyle',
                'ImageResize',
                'ImageUpload',
                'ImageInsert',
                'PictureEditing',
                'EasyImage',
                'CKBox',
                'CKBoxEditing',
                'CKFinder',
                'CKFinderUploadAdapter'
            ]
        })
        .catch(error => {
            console.error(error);
        });
</script>

<style>
    /* Custom styles to enlarge the editor */
    .ck-editor__editable_inline {
        min-height: 200px;
        width: 100%;
    }
</style>


<!-- Mirrored from ableproadmin.com/dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2024 18:20:32 GMT -->
</html>
