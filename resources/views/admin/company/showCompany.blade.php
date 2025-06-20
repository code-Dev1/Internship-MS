@extends('front.layout.master')
@section('content')
    <div class="bg-gray-300 min-h-65px min-w-100 rounded-2">
        <div class="row p-10 text-dark">
            <div class="col-md-6 mt-2">
                <p class="min-w-10px fs-6"> <b>@lang('table.company_name')</b> | {{ $company->name }} </p>
            </div>
            <div class="col-md-6 mt-2 ">
                <p class="min-w-10px fs-6"> <b>@lang('table.website')</b> | {{ $company->website }} </p>
            </div>
        </div>
    </div>
    <div class="p-10">
        @php
            echo $company->description;
        @endphp
    </div>
@endsection
