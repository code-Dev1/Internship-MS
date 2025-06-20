@extends('admin.layout.master')
@section('pageTitle')
    IMS | Internship
@endsection
@section('pageSubTitle')
    {{ __('general.internships') }}
@endsection
@section('content')
    <div class="row justify-content-end me-md-5 mb-4">
        @if (auth()->user()->company && auth()->user()->role === 'company')
            <div class="col ms-md-5">
                <a href="{{ route('internship.create') }}"
                    class="btn btn-primary opacity-100-hover opacity-75">{{ __('general.add_internship') }}
                </a>
            </div>
        @endif
        <div class="col-md-4">
            <div class="position-relative">
                <i
                    class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute @if (Session::has('direction') && Session::get('direction') === 'rtl') start-0 @else end-0 pe-2 @endif top-50 translate-middle ms-6">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <input type="text" class="form-control form-control-solid ps-10" name="search" value=""
                    placeholder="{{ __('table.search') }}" />
            </div>
        </div>
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
                            <th class=" min-w-60px">{{ __('table.id') }}</th>
                            <th class="min-w-140px">{{ __('table.title') }}</th>
                            <th class="min-w-140px">{{ __('form.education') }}</th>
                            <th class="min-w-140px">{{ __('form.location') }}</th>
                            <th class="min-w-120px">{{ __('table.start_date') }}</th>
                            <th class="min-w-120px">{{ __('table.end_date') }}</th>
                            <th class="min-w-120px text-center">{{ __('table.action') }}</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($internships as $int)
                            <tr>
                                <td class="text-dark  mb-1 fs-6">
                                    {{ $int->id }}
                                </td>
                                <td class="text-dark  mb-1 fs-6">
                                    {{ $int->title }}
                                </td>
                                <td class="text-dark  mb-1 fs-6">
                                    {{ $int->education }}
                                </td>
                                <td class="text-dark  mb-1 fs-6">
                                    {{ $int->location }}
                                </td>
                                <td class="text-dark  mb-1 fs-6">
                                    {{ $int->start_date->format('Y-m-d') }}
                                </td>
                                <td class="text-dark  mb-1 fs-6">
                                    {{ $int->end_date->format('Y-m-d') }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('internship.show', ['internship' => $int->slug]) }}"
                                        class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">{{ __('table.view') }}</a>
                                    @can('isCompany')
                                        <a href="{{ route('internship.edit', ['internship' => $int->slug]) }}"
                                            class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">{{ __('table.edit') }}</a>
                                        <form class="d-inline" method="POST"
                                            action="{{ route('internship.destroy', ['internship' => $int->slug]) }}">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('internship.destroy', ['internship' => $int->slug]) }}"
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
