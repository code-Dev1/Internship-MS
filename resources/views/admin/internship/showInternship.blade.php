@extends('front.layout.master')
@section('content')
    <div class="text-center mb-10">
        <h1>Title | {{ $int->title }}</h1>
    </div>
    <div class=" bg-gray-300 min-h-100px min-w-100 rounded-2">
        <div class="row p-10 text-dark">
            <div class="col-md-6">
                <p class=" min-w-10px fs-6 mb-10"> <b>Company</b> | {{ $int->company->name }} </p>
                <p class=" min-w-10px fs-6 mb-10"> <b>Start Date</b> | {{ $int->start_date->format('Y-m-d') }} </p>
                <p class=" min-w-10px fs-6 mb-4"> <b>End Date</b> | {{ $int->end_date->format('Y-m-d') }} </p>
            </div>
            <div class="col-md-6">
                <p class=" min-w-10px fs-6 mb-10"> <b>Location</b> | {{ $int->location }} </p>
                <p class=" min-w-10px fs-6 mb-10"> <b>Gender</b> | {{ $int->gender }} </p>
                <p class=" min-w-10px fs-6 mb-4"> <b>Education</b> | {{ $int->education }} </p>
            </div>
        </div>
    </div>
    <div class="p-10">
        @php
            echo $int->description;
        @endphp
    </div>
    <div class="p-10">
        {{ $int->requirements }}
        <br class="mb-3">
        <a href="mailto:{{ $int->email }}">{{ $int->email }}</a>
    </div>
@endsection
