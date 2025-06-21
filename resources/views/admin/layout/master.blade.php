@php
    if (auth()->user()->role === 'student') {
        return redirect()->route('home');
    }
@endphp
<!DOCTYPE html>
<html dir={{ Session::get('direction', 'ltr') }}>
<!--begin::Head-->

<head>
    <base href="../" />
    <title>@yield('pageTitle')</title>
    <meta charset="utf-8" />
    <link rel="icon"
        @if (isset($setting)) href='{{ asset("$setting->dashboardLogo") }}'
    @else href="{{ asset('assets/media/logos/favicon.ico') }}" @endif />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/customStyle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/sweetalert2.min.css') }}" rel="stylesheet" />
    @yield('style')
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
                data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
                <!--begin::Logo-->
                <div class="aside-logo flex-column-auto pt-10 pt-lg-20" id="kt_aside_logo">
                    <img alt="Logo"
                        @if (isset($setting)) src='{{ asset("$setting->dashboardLogo") }}' @else src="{{ asset('assets/media/logos/demo9.svg') }}" @endif
                        class="h-40px" />
                </div>
                <!--end::Logo-->
                <!--begin::Nav-->
                <div class="aside-menu flex-column-fluid pt-0 pb-7 py-lg-10" id="kt_aside_menu">
                    <!--begin::Aside menu-->
                    <div id="kt_aside_menu_wrapper" class="w-100 hover-scroll-y scroll-ms d-flex" data-kt-scroll="true"
                        data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                        data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="0">
                        <div id="kt_aside_menu"
                            class="menu menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-icon-gray-400 menu-arrow-gray-400 fw-semibold fs-6 my-auto"
                            data-kt-menu="true">
                            <!--begin:Menu item-->
                            <div class="menu-item py-2">
                                <!--begin:Menu link-->
                                <a href="/dashboard" class="menu-link menu-center"
                                    title="{{ __('general.dashboard') }}" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon me-0">
                                        <i class="ki-duotone ki-home-2 fs-2x">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item py-2">
                                <!--begin:Menu link-->
                                <a href="/company" class="menu-link menu-center" title="{{ __('general.company') }}"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                    data-bs-placement="right">
                                    <span class="menu-icon me-0">
                                        <i class="ki-duotone ki-briefcase fs-2x">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item py-2">
                                <!--begin:Menu link-->
                                <a href="/internship" class="menu-link menu-center"
                                    title="{{ __('general.internship') }}" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon me-0">
                                        <i class="ki-duotone ki-book-square fs-2x">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item py-2">
                                <!--begin:Menu link-->
                                <a href="/application" class="menu-link menu-center"
                                    title="{{ __('general.application') }}" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon me-0">
                                        <i class="ki-duotone ki-abstract fs-2x">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            @can('isAdmin')
                                <div class="menu-item py-2">
                                    <!--begin:Menu link-->
                                    <a href="/user" class="menu-link menu-center" title="{{ __('general.user') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-icon me-0">
                                            <i class="ki-duotone ki-user fs-2x">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <div class="menu-item py-2">
                                    <!--begin:Menu link-->
                                    <a href="/setting" class="menu-link menu-center" title="{{ __('general.setting') }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                        data-bs-placement="right">
                                        <span class="menu-icon me-0">
                                            <i class="ki-duotone ki-setting fs-2x">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            @endcan
                            <!--end:Menu item-->
                        </div>
                    </div>
                    <!--end::Aside menu-->
                </div>
                <!--end::Nav-->
                <!--begin::Footer-->
                <!--end::Footer-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header tablet and mobile-->
                <div class="header-mobile py-3">
                    <!--begin::Container-->
                    <div class="container d-flex flex-stack">
                        <!--begin::Mobile logo-->
                        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                            <img alt="Logo"
                                @if (isset($setting)) src='{{ asset("$setting->dashboardLogo") }}' @else src="{{ asset('assets/media/logos/demo9.svg') }}" @endif
                                class="h-35px" />
                        </div>
                        <!--end::Mobile logo-->
                        <!--begin::Aside toggle-->
                        <button class="btn btn-icon btn-active-color-primary me-n4" id="kt_aside_toggle">
                            <i class="ki-duotone ki-abstract-14 fs-2x">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </button>
                        <!--end::Aside toggle-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header tablet and mobile-->
                <!--begin::Header-->
                <div id="kt_header" class="header-img header py-6 py-lg-0 rounded-bottom-3" data-kt-sticky="true"
                    data-kt-sticky-name="header" data-kt-sticky-offset="{lg: '300px'}">
                    <!--begin::Container-->
                    <div class="header-container container-xxl">
                        <!--begin::Page title-->
                        <div
                            class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-20 py-3 py-lg-0 me-3">
                            <!--begin::Heading-->
                            <h1 class="d-flex flex-column text-dark fw-bold my-1">
                                <span class="text-white fs-1">@yield('pageSubTitle')</span>
                            </h1>
                            <!--end::Heading-->
                        </div>
                        <!--end::Page title=-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center flex-wrap">
                            <!--begin::Search-->
                            <div class="header-search py-3 py-lg-0 me-3">
                            </div>
                            <!--end::Search-->
                            <!--begin::Action-->
                            <div class="d-flex align-items-center py-3 py-lg-0">
                                <!--begin::Item-->
                                <div class="me-3">
                                    <a href="#" class="btn btn-icon btn-custom btn-active-color-primary"
                                        data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                        data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-user fs-1 text-white">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </a>
                                    <!--begin::User account menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content d-flex align-items-center px-3">
                                                <!--begin::Username-->
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bold d-flex align-items-center fs-5">
                                                        {{ auth()->user()->name }}
                                                        <span
                                                            class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{ auth()->user()->role }}</span>
                                                    </div>
                                                    <a href="#"
                                                        class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                                                </div>
                                                <!--end::Username-->
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                        <div class="separator my-2"></div>
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5"
                                            data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                            data-kt-menu-placement="right-start" data-kt-menu-offset="-15px, 0">
                                            <a href="#" class="menu-link px-5">
                                                <span
                                                    class="menu-title position-relative">{{ __('general.lang') }}</span>
                                            </a>
                                            <!--begin::Menu sub-->
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('locale', ['locale' => 'en']) }}"
                                                        class="menu-link d-flex px-5">
                                                        <span class="symbol symbol-20px me-4">
                                                        </span>{{ __('general.english') }}</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('locale', ['locale' => 'dr']) }}"
                                                        class="menu-link d-flex px-5">
                                                        <span class="symbol symbol-20px me-4">
                                                        </span>{{ __('general.dari') }}</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu sub-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5 my-1">
                                            <a href="{{ route('profile.edit') }}"
                                                class="menu-link px-5">{{ __('general.account_settings') }}</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->

                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::User account menu-->
                                </div>
                                <!--end::Item-->
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
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                data-kt-value="light">
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
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                data-kt-value="dark">
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
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                data-kt-value="system">
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
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Menu toggle-->
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf

                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="btn btn-icon btn-custom btn-active-color-primary">
                                            <i class="ki-duotone ki-entrance-left fs-1">
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
                                        </a>
                                    </form>
                                </div>
                                <!--end::Theme mode-->
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                    <div class="header-offset"></div>
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div class="container-xxl" id="kt_content_container">
                        <!--begin::About card-->
                        <div class="card">
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
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Modal - Invite Friend-->
    <!--end::Modals-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
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
                @if (Session::has('success'))
                    Toast.fire({
                        icon: 'success',
                        title: '{{ Session::get('success') }}'
                    })
                @elseif (Session::has('danger'))
                    Toast.fire({
                        icon: 'error',
                        title: '{{ Session::get('danger') }}'
                    })
                @endif
            });
        </script>

        @yield('script')
</body>
<!--end::Body-->

</html>
