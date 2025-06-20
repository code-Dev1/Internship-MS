@extends('admin.layout.master')
@section('pageTitle')
    IMS | Users
@endsection
@section('pageSubTitle')
    {{ __('general.users') }}
@endsection
@section('content')
    <div class="row justify-content-end me-md-5 mb-4">
        <div class="col ms-md-5">
            <a href="{{ route('user.create') }}"
                class="btn btn-primary opacity-100-hover opacity-75">{{ __('general.add_user') }}</a>
        </div>
        <div class="col-md-4">
            <div class="position-relative">
                <i
                    class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute @if (Session::has('direction') && Session::get('direction') == 'rtl') start-0 @else end-0 pe-5 @endif  top-50 translate-middle ms-6">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <input type="text" class="form-control form-control-solid ps-10" name="search" value=""
                    placeholder="{{ __('table.search') }}" />
            </div>
        </div>
    </div>
    <div class="card mb-5 mb-xl-8 mt-8">
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th class="ps-4">{{ __('table.id') }}</th>
                            <th class="min-w-125px">{{ __('table.name') }}</th>
                            <th class="min-w-125px">{{ __('table.email') }}</th>
                            <th class="min-w-200px">{{ __('table.role') }}</th>
                            <th class="min-w-200px text-center">{{ __('table.action') }}</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-dark  mb-1 fs-6">
                                    {{ $user->id }}
                                </td>
                                <td class="text-dark mb-1 fs-6">
                                    {{ $user->name }}
                                </td>
                                <td class="text-dark mb-1 fs-6">
                                    {{ $user->email }}
                                </td>
                                <td class="text-dark mb-1 fs-6">
                                    {{ $user->role }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                                        class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">{{ __('table.edit') }}</a>
                                    <form class=" d-inline" method="POST"
                                        action="{{ route('user.destroy', ['user' => $user->id]) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('user.destroy', ['user' => $user->id]) }}"
                                            class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2"
                                            onclick="event.preventDefault(); this.closest('form').submit();">{{ __('table.delete') }}</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <div class="text-cneter mt-13">
                    {{ $users->links() }}
                </div>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
@endsection
