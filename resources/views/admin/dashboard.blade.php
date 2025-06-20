@extends('admin.layout.master')
@section('pageTitle')
    IMS | Dashboard
@endsection

@section('pageSubTitle')
    {{ __('general.dashboard') }}
@endsection


@section('content')
    <div class="row g-5 g-xl-8">
        <div class="col-xl-3">
            <!--begin::Statistics Widget 5-->
            <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <i class="ki-duotone ki-user-edit text-gray-100 fs-2x ms-n1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                        <span class="path6"></span>
                        <span class="path7"></span>
                    </i>
                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">{{ $newStudent }}</div>
                    <div class="fs-4 text-gray-100">{{ __('general.new_student') }}</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
        <div class="col-xl-3">
            <!--begin::Statistics Widget 5-->
            <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <i class="ki-duotone ki-user text-gray-100 fs-2x ms-n1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                        <span class="path6"></span>
                        <span class="path7"></span>
                    </i>
                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">{{ $totleStudent }}</div>
                    <div class="fs-4 text-gray-100">{{ __('general.totle_student') }}</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
        <div class="col-xl-3">
            <!--begin::Statistics Widget 5-->
            <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <i class="ki-duotone ki-cheque text-gray-100 fs-2x ms-n1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                        <span class="path6"></span>
                        <span class="path7"></span>
                    </i>
                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">{{ $int }}</div>
                    <div class="fs-4 text-gray-100">{{ __('general.avaliable_internship') }}</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
        <div class="col-xl-3">
            <!--begin::Statistics Widget 5-->
            <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <i class="ki-duotone ki-briefcase text-gray-100 fs-2x ms-n1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">{{ $companies }}</div>
                    <div class="fs-4 text-gray-100">{{ __('general.totle_company') }}</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
    </div>
    <div class="card mb-5 mb-xl-8 mt-8">
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th class="min-w-40px">{{ __('table.id') }}</th>
                            <th class="min-w-75px">{{ __('table.user_name') }}</th>
                            @can('isAdmin')
                                <th class="min-w-75px">{{ __('table.company_name') }}</th>
                            @endcan
                            <th class="min-w-75px">{{ __('table.internship_name') }}</th>
                            <th class="min-w-75px">{{ __('table.applay_date') }}</th>
                            <th class="min-w-120px">{{ __('table.cv') }}</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @php
                            $x = 1;
                        @endphp
                        @foreach ($apps as $app)
                            <tr>
                                <td class="text-dark  mb-1 fs-6">
                                    {{ $x++ }}
                                </td>
                                <td class="text-dark  mb-1 fs-6">
                                    {{ $app->user->name }}
                                </td>
                                @can('isAdmin')
                                    <td class="text-dark  mb-1 fs-6">
                                        {{ $app->company->name }}
                                    </td>
                                @endcan
                                <td class="text-dark  mb-1 fs-6">
                                    {{ $app->internship->title }}
                                </td>
                                <td class="text-dark  mb-1 fs-6">
                                    {{ $app->created_at->diffForHumans() }}
                                </td>
                                <td class="text-dark mb-1 fs-6">
                                    <a href="{{ asset('storage/' . $app->pdf) }}" target="_blank">Cv</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
@endsection
