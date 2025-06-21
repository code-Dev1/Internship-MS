<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="" />
    <title>
        @yield('title')
    </title>
    <meta charset="utf-8" />
    <link rel="shortcut icon"
        @if (isset($setting)) href="{{ $setting->frontLogo }}" @else   href="assets/media/logos/favicon.ico" @endif />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/customStyle.css') }}" rel="stylesheet" type="text/css" />
    @yield('style')
    <!--end::Global Stylesheets Bundle-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode =
                    document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ?
                    "dark" :
                    "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Header Section-->
        <div class="mb-0" id="home">
            <!--begin::Wrapper-->
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
                style="
            background-image: url(assets/media/svg/illustrations/landing.svg);
          ">
                <!--begin::Header-->
                <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
                    data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center justify-content-between">
                            <!--begin::Logo-->
                            <div class="d-flex align-items-center flex-equal">
                                <!--begin::Mobile menu toggle-->
                                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
                                    id="kt_landing_menu_toggle">
                                    <i class="ki-duotone ki-abstract-14 fs-2hx">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </button>
                                <!--end::Mobile menu toggle-->
                                <!--begin::Logo image-->
                                <a href="{{ route('home') }}">
                                    <img alt="Logo"
                                        @if (isset($setting)) src="{{ $setting->frontLogo }}"
                                        @else
                                     src="assets/media/logos/landing.svg" @endif
                                        class="logo-default h-25px h-lg-30px" />
                                    <img alt="Logo"
                                        @if (isset($setting)) src="{{ $setting->frontLogo }}"
                                        @else
                                       src="assets/media/logos/landing-dark.svg" @endif
                                        class="logo-sticky h-20px h-lg-25px" />
                                </a>
                                <!--end::Logo image-->
                            </div>
                            <!--end::Logo-->
                            <!--begin::Menu wrapper-->
                            <div class="d-lg-block" id="kt_header_nav_wrapper">
                                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true"
                                    data-kt-drawer-name="landing-menu"
                                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                    data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                                    data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                                    data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                                    <!--begin::Menu-->
                                    <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold"
                                        id="kt_landing_menu">
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link @if (Route::is('home')) active @endif py-3 px-4 px-xxl-6"
                                                href="{{ route('home') }}" data-kt-scroll-toggle="true"
                                                data-kt-drawer-dismiss="true">Home</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6 @if (Route::is('front.int')) active @endif"
                                                href="{{ route('front.int') }}" data-kt-scroll-toggle="true"
                                                data-kt-drawer-dismiss="true">Internships</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6 @if (Route::is('contact')) active @endif"
                                                href="{{ route('contact') }}" data-kt-scroll-toggle="true"
                                                data-kt-drawer-dismiss="true">Contact</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6 @if (Route::is('about')) active @endif"
                                                href="{{ route('about') }}" data-kt-scroll-toggle="true"
                                                data-kt-drawer-dismiss="true">About</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--essnd::Menu-->
                                </div>
                            </div>
                            <!--end::Menu wrapper-->
                            <!--begin::Toolbar-->
                            <div class="flex-equal text-end ms-1">
                                <div class="d-flex justify-content-end align-items-center">
                                    <div class="d-flex align-items-center py-3 py-lg-0 me-4 mt-3">
                                        <!--begin::Theme mode-->
                                        <div class="d-flex align-items-center me-3">
                                            <!--begin::Menu toggle-->
                                            <a href="#" class="btn btn-icon btn-custom btn-active-color-primary"
                                                data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-night-day theme-light-show fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                    <span class="path6"></span>
                                                    <span class="path7"></span>
                                                    <span class="path8"></span>
                                                    <span class="path9"></span>
                                                    <span class="path10"></span>
                                                </i>
                                                <i class="ki-duotone ki-moon theme-dark-show fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                            <!--begin::Menu toggle-->
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                                data-kt-menu="true" data-kt-element="theme-mode-menu">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 my-0">
                                                    <a href="#" class="menu-link px-3 py-2"
                                                        data-kt-element="mode" data-kt-value="light">
                                                        <span class="menu-icon" data-kt-element="icon">
                                                            <i class="ki-duotone ki-night-day fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                                <span class="path4"></span>
                                                                <span class="path5"></span>
                                                                <span class="path6"></span>
                                                                <span class="path7"></span>
                                                                <span class="path8"></span>
                                                                <span class="path9"></span>
                                                                <span class="path10"></span>
                                                            </i>
                                                        </span>
                                                        <span class="menu-title">{{ __('general.light') }}</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 my-0">
                                                    <a href="#" class="menu-link px-3 py-2"
                                                        data-kt-element="mode" data-kt-value="dark">
                                                        <span class="menu-icon" data-kt-element="icon">
                                                            <i class="ki-duotone ki-moon fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </span>
                                                        <span class="menu-title">{{ __('general.dark') }}</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 my-0">
                                                    <a href="#" class="menu-link px-3 py-2"
                                                        data-kt-element="mode" data-kt-value="system">
                                                        <span class="menu-icon" data-kt-element="icon">
                                                            <i class="ki-duotone ki-screen fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                                <span class="path4"></span>
                                                            </i>
                                                        </span>
                                                        <span class="menu-title">{{ __('general.system') }}</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Theme mode-->
                                    </div>
                                    @if (!auth()->user())
                                        <a href="{{ route('login') }}" class="btn btn-success">Sign In</a>
                                    @else
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <a href="{{ route('logout') }}" class="btn btn-success"
                                                onclick="event.preventDefault(); this.closest('form').submit()">Sign
                                                out</a>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                @if (Route::is('home'))
                    <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                        <!--begin::Heading-->
                        <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
                            <!--begin::Title-->
                            <h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">
                                Welcome to Internship Management System <br> where to find
                                <span
                                    style="
                    background: linear-gradient(
                      to right,
                      #12ce5d 0%,
                      #ffd80c 100%
                    );
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                  ">
                                    <span id="kt_landing_hero_text">Intern Jobs</span>
                                </span>
                            </h1>
                            <!--end::Title-->
                            <!--begin::Action-->
                            <a href="{{ route('front.int') }}" class="btn btn-primary">Apply now</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Clients-->

                        <!--end::Clients-->
                    </div>
            </div>
            <!--end::Wrapper-->
        </div>
    </div>
    <!--end::Wrapper-->
    <!--begin::Curve bottom-->
    <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
        <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                fill="currentColor"></path>
        </svg>
    </div>
    @endif
    <!--end::Header Section-->
    @if (Route::is('home'))
        @yield('content')
    @else
        <div class="content mt-0  d-flex flex-column flex-column-fluid bg-gray-100" id="kt_content">
            <!--begin::Container-->
            <div class="container-xxl" id="kt_content_container">
                <!--begin::About card-->
                <div class="card mt-20">
                    <!--begin::Body-->
                    <div class="card-body p-lg-17">
                        @yield('content')
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::About card-->
            </div>
            <!--end::Container-->
        </div>
    @endif
    <!--begin::Footer Section-->
    <div class="mb-0 pb-0">
        <!--begin::Curve top-->
        <div class="landing-curve landing-dark-color bg-gray-100">
            <svg viewBox="15 -2 1470 48" fill="none">
                <path
                    d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="landing-dark-bg pt-20">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Row-->
                <div class="row py-10 py-lg-20">
                    <!--begin::Col-->
                    <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                        <!--begin::Block-->
                        <div class="rounded landing-dark-border p-9 mb-10">
                            <!--begin::Title-->
                            <h2 class="text-white">Would you need a Custom License?</h2>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <span class="fw-normal fs-4 text-gray-700">Email us to
                                <a href="https://keenthemes.com/support"
                                    class="text-white opacity-50 text-hover-primary">support@keenthemes.com</a></span>
                            <!--end::Text-->
                        </div>
                        <!--end::Block-->
                        <!--begin::Block-->
                        <div class="rounded landing-dark-border p-9">
                            <!--begin::Title-->
                            <h2 class="text-white">How About a Custom Project?</h2>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <span class="fw-normal fs-4 text-gray-700">Use Our Custom Development Service.
                                <a href="../../demo9/dist/pages/user-profile/overview.html"
                                    class="text-white opacity-50 text-hover-primary">Click to Get a
                                    Quote</a></span>
                            <!--end::Text-->
                        </div>
                        <!--end::Block-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-6 ps-lg-16">
                        <!--begin::Navs-->
                        <div class="d-flex justify-content-center">
                            <!--begin::Links-->
                            <div class="d-flex fw-semibold flex-column me-20">
                                <!--begin::Subtitle-->
                                <h4 class="fw-bold text-gray-400 mb-6">
                                    Quick access
                                </h4>
                                <!--end::Subtitle-->
                                <!--begin::Link-->
                                <a href="{{ route('home') }}"
                                    class="text-white opacity-50 text-hover-primary fs-5 mb-6">Home</a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a href="{{ route('front.int') }}"
                                    class="text-white opacity-50 text-hover-primary fs-5 mb-6">Internships</a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a href="{{ route('contact') }}"
                                    class="text-white opacity-50 text-hover-primary fs-5 mb-6">Contact</a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a href="{{ route('about') }}"
                                    class="text-white opacity-50 text-hover-primary fs-5 mb-6">About</a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a href="{{ route('login') }}"
                                    class="text-white opacity-50 text-hover-primary fs-5 mb-6">Login</a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a href="{{ route('register') }}"
                                    class="text-white opacity-50 text-hover-primary fs-5">Register</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Links-->
                            <!--begin::Links-->
                            <div class="d-flex fw-semibold flex-column ms-lg-20">
                                <!--begin::Subtitle-->
                                <h4 class="fw-bold text-gray-400 mb-6">Stay Connected</h4>
                                <!--end::Subtitle-->
                                <!--begin::Link-->
                                @if (isset($setting))
                                    <a href="{{ $setting->facebook }}" class="mb-6" target="_blank">
                                        <img src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-2"
                                            alt="" />
                                        <span
                                            class="text-white opacity-50 text-hover-primary fs-5 mb-6">Facebook</span>
                                    </a>
                                @endif
                                <!--end::Link-->
                                <!--begin::Link-->
                                @if ($setting)
                                    <a href="{{ $setting->youtube }}" class="mb-6">
                                        <img src="{{ asset('assets/media/svg/social-logos/youtube.svg') }}"
                                            class="h-20px me-2" alt="" />
                                        <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Youtube</span>
                                    </a>
                                @endif
                                <!--end::Link-->
                                <!--begin::Link-->
                                @if (isset($setting))
                                    <a href="{{ $setting->x }}" class="mb-6" target="_blank">
                                        <img src="assets/media/svg/brand-logos/twitter.svg" class="h-20px me-2"
                                            alt="" />
                                        <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Twitter</span>
                                    </a>
                                @endif
                                <!--end::Link-->
                                <!--begin::Link-->
                                @if (isset($setting))
                                    <a href="{{ $setting->instagram }}" class="mb-6" target="_blank">
                                        <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="h-20px me-2"
                                            alt="" />
                                        <span
                                            class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
                                    </a>
                                @endif
                                <!--end::Link-->
                                <!--begin::Link-->
                                @if (isset($setting))
                                    <a href="mailto:{{ $setting->email }}" class="mb-6" target="_blank">
                                        <img src="{{ asset('assets/media/svg/social-logos/google.svg') }}"
                                            class="h-20px me-2" alt="" />
                                        <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Email</span>
                                    </a>
                                @endif
                                <!--end::Link-->
                            </div>
                            <!--end::Links-->
                        </div>
                        <!--end::Navs-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
            <!--begin::Separator-->
            <div class="landing-dark-separator"></div>
            <!--end::Separator-->
            <!--begin::Container-->
            <div class="container">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                    <!--begin::Copyright-->
                    <div class="d-flex align-items-center order-2 order-md-1">
                        <!--begin::Logo-->
                        <a href="{{ route('home') }}">
                            <img alt="Logo" src="assets/media/logos/landing.svg" class="h-15px h-md-20px" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Logo image-->
                        <span class="mx-5 fs-6 fw-semibold text-gray-600 pt-1" href="https://keenthemes.com">&copy;
                            2023 Keenthemes Inc.</span>
                        <!--end::Logo image-->
                    </div>
                    <!--end::Copyright-->
                    <!--begin::Menu-->
                    <ul class="menu menu-gray-600 menu-hover-primary fw-semibold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                        <li class="menu-item">
                            <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                        </li>
                        <li class="menu-item mx-5">
                            <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                        </li>
                    </ul>
                    <!--end::Menu-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Footer Section-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--end::Scrolltop-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--end::Scrolltop-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script src="assets/plugins/custom/typedjs/typedjs.bundle.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/js/custom/landing.js') }}"></script>
    <script src="{{ asset('assets/js/custom/pages/pricing/general.js') }}"></script>
    <scrip src="{{ asset('assets/js/select2.min.js') }}">
        </script>
        <!--end::Custom Javascript-->
        <!--end::Javascript-->
        <script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                })
                @if (Session::has('fsuccess'))
                    Toast.fire({
                        icon: 'success',
                        title: '{{ Session::get('success') }}'
                    })
                @elseif (Session::has('fdanger'))
                    Toast.fire({
                        icon: 'error',
                        title: '{{ Session::get('danger') }}'
                    })
                @endif
            });
        </script>
        @yield('script')
        <!--end::Custom Javascript-->
        <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
