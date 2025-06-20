@extends('auth.layout.master')
@section('content')
    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
        <!--begin::Form-->
        <form class="form w-100" action="{{ route('login') }}" method="POST">
            @csrf
            <!--begin::Heading-->
            <div class="text-center mb-11">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                <!--end::Title-->
            </div>
            <!--begin::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="email" placeholder="Email" name="email" autocomplete="off"
                    class="@error('email') border-danger @enderror form-control bg-transparent" required />
                <!--end::Email-->
                @error('email')
                    <div class="text-danger ms-1 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <!--end::Input group=-->
            <div class="fv-row mb-3">
                <!--begin::Password-->
                <input type="password" placeholder="Password" name="password" autocomplete="off"
                    class="@error('password') border-danger @enderror form-control bg-transparent" required />
                <!--end::Password-->
                @error('password')
                    <div class="text-danger ms-1 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <!--end::Input group=-->
            <!--begin::Wrapper-->
            <div class="d-flex justify-content-between gap-3 fs-base fw-semibold my-8">
                <label class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="remember" />
                    <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">Remember me
                    </span>
                </label>
                <!--begin::Link-->
                <a href="{{ route('password.request') }}" class="link-primary">Forgot
                    Password ?</a>
                <!--end::Link-->
            </div>
            <!--begin::Accept-->
            <div class="fv-row mb-8">

            </div>
            <!--end::Accept-->
            <!--end::Wrapper-->
            <!--begin::Submit button-->
            <div class="d-grid mb-10">
                <button type="submit" class="btn btn-primary">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">Sign In</span>
                    <!--end::Indicator label-->
                </button>
            </div>
            <!--end::Submit button-->
            <!--begin::Sign up-->
            <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                <a href="{{ route('register') }}" class="link-primary">Sign up</a>
            </div>
            <!--end::Sign up-->
        </form>
        <!--end::Form-->
    </div>
@endsection
