@extends('front.layout.master')
@section('title')
    IMS | Abouts
@endsection
@section('content')
    <div class="p-10 row align-items-center justify-content-center">
        <div class="col-md-5 img-fluid">
            <img src="{{ asset('assets/media/illustrations/sigma-1/20.png') }}" alt=""
                class="mw-100 h-200px h-sm-325px theme-light-show">
            <img src="{{ asset('assets/media/illustrations/sigma-1/20-dark.png') }}" alt=""
                class="mw-100 h-200px h-sm-325px theme-dark-show">
        </div>
        <div class="col-md-7">
            <div class="card bg-gray-100">
                <div class="card-body">
                    <h3 class="text-center">About us</h3>
                    @if (isset($setting))
                        @php
                            echo $setting->about;
                        @endphp
                    @else
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem veniam aut impedit
                            recusandae nam consequatur cum in nemo possimus, tenetur eaque pariatur! Sed minus sapiente
                            dolor
                            voluptate, impedit porro tempora.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
