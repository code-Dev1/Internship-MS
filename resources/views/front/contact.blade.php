@extends('front.layout.master')
@section('title')
    IMS | Contact
@endsection
@section('content')
    <form action="">
        <div class="p-10 row align-items-center justify-content-center mb-10">
            <div class="img-fluid col-md-5">
                <img src="{{ asset('assets/media/illustrations/sigma-1/17.png') }}" alt=""
                    class="mw-100 h-200px h-sm-325px theme-light-show">
                <img src="{{ asset('assets/media/illustrations/sigma-1/17-dark.png') }}" alt=""
                    class="mw-100 h-200px h-sm-325px theme-dark-show">
            </div>
            <div class="col-md-7">
                <div class="card bg-gray-100">
                    <div class="card-body">
                        <h3 class="text-center mb-10">Contact us</h3>
                        <div class="fv-row mb-8">
                            <input type="text" class=" form-control bg-transparent border-gray-500"
                                placeholder="Enter your name" value="{{ old('name') }}" name="name">
                        </div>
                        <div class="fv-row mb-8">
                            <input type="email" class=" form-control bg-transparent border-gray-500"
                                placeholder="Enter your email" value="{{ old('email') }}" name="email">
                        </div>
                        <div class="fv-row">
                            <textarea name="message" class="form-control" rows="10" placeholder="write your message hrre....">{{ old('message') }}</textarea>
                        </div>
                        <div class="mt-8 text-end">
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
