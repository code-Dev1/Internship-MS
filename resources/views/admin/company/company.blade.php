@extends('admin.layout.master')
@section('pageTitle')
    IMS | Company
@endsection
@section('pageSubTitle')
    {{ __('general.companies') }}
@endsection
@section('content')
    <div class="row justify-content-end me-md-5 mb-4">
        @if (!auth()->user()->company && auth()->user()->role === 'company')
            <div class="col ms-md-5">
                <a href="{{ route('company.create') }}"
                    class="btn btn-primary opacity-100-hover opacity-75">{{ __('general.add_company') }}
                </a>
            </div>
        @endif
        @if (auth()->user()->role === 'admin')
            <div class="col-md-4">
                <div class="position-relative">
                    <i
                        class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 @if (Session::has('direction') && Session::get('direction') == 'rtl') start-0 @else end-0 pe-5 @endif translate-middle ms-6">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" class="form-control form-control-solid ps-10" name="search" value=""
                        placeholder="{{ __('table.search') }}" />
                </div>
            </div>
        @endif
    </div>
    <div class="card mb-5 mb-xl-8">

        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th class="min-w-150px">{{ __('table.id') }}</th>
                            <th class="min-w-120px">{{ __('table.company_owner') }}</th>
                            <th class="min-w-140px">{{ __('table.company_name') }}</th>
                            <th class="min-w-120px">{{ __('table.website') }}</th>
                            <th class="min-w-120px text-center">{{ __('table.action') }}</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td class="w-20px text-dark  mb-1 fs-6">
                                    {{ $company->id }}
                                </td>
                                <td class="text-dark  mb-1 fs-6">
                                    {{ $company->user->name }}
                                </td>
                                <td class="text-dark mb-1 fs-6">
                                    {{ $company->name }}
                                </td>
                                <td class="text-dark mb-1 fs-6">
                                    <a href="{{ $company->website }}">{{ $company->website }}</a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('company.show', ['company' => $company->slug]) }}"
                                        class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">{{ __('table.view') }}</a>
                                    @can('isCompany')
                                        <a href="{{ route('company.edit', ['company' => $company->slug]) }}"
                                            class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">{{ __('table.edit') }}</a>
                                        <form class=" d-inline" method="POST"
                                            action="{{ route('company.destroy', ['company' => $company->slug]) }}">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('company.destroy', ['company' => $company->slug]) }}"
                                                class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2"
                                                onclick="event.preventDefault(); this.closest('form').submit();">{{ __('table.delete') }}</a>
                                        </form>
                                    @endcan
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
