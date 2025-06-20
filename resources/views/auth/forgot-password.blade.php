@extends('auth.layout.master')
@section('content')
    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
        <!--begin::Form-->
        <form class="form w-100" action="{{ route('password.email') }}" method="POST">
            @csrf
            <!--begin::Heading-->
            <div class="text-center mb-10">
                <!--begin::Title-->
                {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
                <h1 class="text-dark fw-bolder mb-3">Forgot Password ?</h1>
                <!--end::Title-->
                <!--begin::Link-->
                <div class="text-gray-500 fw-semibold fs-6">Enter your email to reset your password.</div>
                @if (session('status'))
                    <div class="text-sm text-success mt-4">{{ session('status') }}</div>
                @endif
                <!--end::Link-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="email" placeholder="Email" name="email" :value="old('email')" autocomplete="on"
                    class="@error('email')
                     border-danger
                    @enderror form-control bg-transparent" />
                <!--end::Email-->
                @error('email')
                    <div class="text-danger ms-1 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <!--begin::Actions-->
            <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                <button type="submit" class="btn btn-primary me-4">
                    <span class="indicator-label">Submit</span>
                </button>
                <a href="{{ route('login') }}" class="btn btn-light">Cancel</a>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
@endsection


{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
