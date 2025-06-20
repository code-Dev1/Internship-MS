@extends('admin.layout.master')
@section('pageTitle')
    IMS | Application
@endsection
@section('pageSubTitle')
    Applications
@endsection
@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th class="ps-4 min-w-75px rounded-start">@lang('table.id')</th>
                            <th class="ps-4 min-w-125px rounded-start">@lang('table.user_name')</th>
                            @can('isAdmin')
                                <th class="ps-4 min-w-125px rounded-start">@lang('table.company_name')</th>
                            @endcan
                            <th class="min-w-75px">@lang('table.internship_name')</th>
                            <th class="min-w-75px">@lang('table.status')</th>
                            <th class="min-w-75px">@lang('table.applay_date')</th>
                            <th class="min-w-75px">@lang('table.cv')</th>
                            <th class="text-center rounded-end">@lang('table.action')</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($apps as $app)
                            <tr>
                                <td class="w-20px text-dark mb-1 fs-6">
                                    {{ $app->id }}
                                </td>
                                <td class="text-dark mb-1 fs-6">
                                    {{ $app->user->name }}
                                </td>
                                @can('isAdmin')
                                    <td class="text-dark mb-1 fs-6">
                                        {{ $app->company->name }}
                                    </td>
                                @endcan
                                <td class="text-dark mb-1 fs-6">
                                    {{ $app->internship->title }}
                                </td>
                                <td class="text-dark mb-1 fs-6">
                                    <span
                                        class="badge mt-2 @if ($app->status === 'pending') badge-light-warning text-light @elseif($app->status === 'accepted') badge-light-success text-light @else badge-light-danger @endif ">{{ $app->status }}</span>
                                </td>
                                <td class="text-dark mb-1 fs-6">
                                    {{ $app->created_at->diffForHumans() }}
                                </td>
                                <td class="text-dark mb-1 fs-6">
                                    <a href="{{ asset('storage/' . $app->pdf) }}" target="_blank">Cv</a>
                                </td>
                                <td class="text-center">

                                    @if ($app->status === 'rejected')
                                        <form class=" d-inline" method="POST"
                                            action="{{ route('accepted.update', ['accept' => $app->slug]) }}">
                                            @csrf
                                            @method('put')
                                            <a href="{{ route('accepted.update', ['accept' => $app->slug]) }}"
                                                class="btn btn-light-success btn-color-muted btn-sm px-4 me-2"
                                                onclick="event.preventDefault(); this.closest('form').submit();">{{ __('table.accepted') }}</a>
                                        </form>
                                    @endif
                                    @if ($app->status === 'accepted')
                                        <form class=" d-inline" method="POST"
                                            action="{{ route('reject.update', ['reject' => $app->slug]) }}">
                                            @csrf
                                            @method('put')
                                            <a href="{{ route('reject.update', ['reject' => $app->slug]) }}"
                                                class="btn btn-light-danger btn-color-muted btn-sm px-4 me-2"
                                                onclick="event.preventDefault(); this.closest('form').submit();">{{ __('table.rejected') }}</a>
                                        </form>
                                    @endif









                                    {{-- @if (auth()->user()->role === 'company') --}}
                                    <form class=" d-inline" method="POST"
                                        action="{{ route('application.destroy', ['application' => $app->slug]) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('application.destroy', ['application' => $app->slug]) }}"
                                            class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2"
                                            onclick="event.preventDefault(); this.closest('form').submit();">{{ __('table.delete') }}</a>
                                    </form>
                                    {{-- @endif --}}
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
