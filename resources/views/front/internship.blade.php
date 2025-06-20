@extends('front.layout.master')
@section('title')
    IMS | Internship
@endsection
@section('content')
    <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3 text-center">
        <!--begin::Table head-->
        <thead>
            <tr class="fw-bold text-muted">
                <th class="min-w-140px">{{ __('table.id') }}</th>
                <th class="min-w-140px">{{ __('table.title') }}</th>
                <th class="min-w-140px">{{ __('table.company') }}</th>
                <th class="min-w-140px">{{ __('form.location') }}</th>
                <th class="min-w-120px">{{ __('table.start_date') }}</th>
                <th class="min-w-120px">{{ __('table.end_date') }}</th>
            </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody>
            @if (count($internships) == 0)
                <tr>
                    <td colspan="5">
                        <p class="mt-5 alert alert-warning">There is data not exist</p>
                    </td>
                </tr>
            @else
                @php
                    $x = 1;
                @endphp
                @foreach ($internships as $int)
                    <tr class=" h-70px">
                        <td>
                            <span class="text-dark fw-bold  mb-1 fs-6">{{ $x++ }}</span>
                        </td>
                        <td>
                            <a href="{{ route('front.single', ['int' => $int->slug]) }}"
                                class="text-dark fw-bold text-hover-primary fs-6">{{ $int->title }}</a>
                        </td>
                        <td>
                            <span class="text-dark fw-bold  mb-1 fs-6">{{ $int->company->name }}</span>
                        </td>
                        <td>
                            <span class="text-dark fw-bold  mb-1 fs-6">{{ $int->location }}</span>
                        </td>
                        <td>
                            <span class="text-dark fw-bold mb-1 fs-6">{{ $int->start_date->format('Y-m-d') }}</span>
                        </td>
                        <td>
                            <span class="text-dark fw-bold mb-1 fs-6">{{ $int->end_date->format('Y-m-d') }}</span>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <!--end::Table body-->
    </table>
    {{ $internships->links() }}
@endsection
