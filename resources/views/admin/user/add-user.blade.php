@extends('admin.layout.master')
@section('pageTitle')
    IMS | Add User
@endsection
@section('pageSubTitle')
    @if (isset($user))
        {{ __('general.update_user') }}
    @else
        {{ __('general.add_user') }}
    @endif
@endsection
@section('content')
    <div class="py-10 px-lg-17">
        <!--begin::Input group-->
        <form
            @if (isset($user)) action="{{ route('user.update', ['user' => $user->id]) }}" @else action="{{ route('user.store') }}" @endif
            method="POST">
            @csrf
            @if (isset($user))
                @method('put')
            @endif
            <div class="row mb-2">
                <div class="col-md-6 fv-row">
                    <div class="mb-5 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-semibold mb-2">{{ __('form.name') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" @if (isset($user)) value="{{ $user->name }}" @endif
                            class="@error('name')
                            border-danger
                            @enderror form-control form-control-solid"
                            placeholder="{{ __('form.user_name_input') }}" name="name" />
                        <!--end::Input-->
                        @error('name')
                            <div>
                                <span class="ps-2 text-sm text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 fv-row">
                    <div class="mb-5 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-semibold mb-2">{{ __('form.email') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="email" @if (isset($user)) value="{{ $user->email }}" @endif
                            class="@error('email')
                            border-danger
                            @enderror form-control form-control-solid"
                            placeholder="{{ __('form.user_email_input') }}" name="email" />
                        <!--end::Input-->
                        @error('email')
                            <div>
                                <span class="ps-2 text-sm text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>
                @if (isset($user))
                    <div class="mb-5 fv-row">
                        <!--begin::Label-->
                        <div class="position-relative">
                            <i class="position-absolute fa fa-eye @if (Session::has('direction') && Session::get('direction') == 'rtl') start-0 ps-5 @else end-0 @endif bottom-0 pb-5 pe-5 text-gray-500"
                                id="oipassword">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <label class="required fs-5 fw-semibold mb-2">{{ __('form.old_password') }}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="password"
                                class="@error('old_password')
                            border-danger
                            @enderror form-control form-control-solid"
                                placeholder="{{ __('form.user_old_password_input') }}" name="old_password" id="opassword"
                                autocomplete="false" />
                        </div>
                        @error('old_password')
                            <div>
                                <span class="ps-2 text-sm text-danger">{{ $message }}</span>
                            </div>
                        @enderror

                        <!--end::Input-->
                    </div>
                @endif
                <div class="col-md-6 fv-row">
                    <div class="mb-5 fv-row">
                        <!--begin::Label-->
                        <div class="position-relative">
                            <i class="position-absolute fa fa-eye @if (Session::has('direction') && Session::get('direction') == 'rtl') start-0 ps-5 @else end-0 @endif bottom-0 pb-5 pe-5 text-gray-500"
                                id="ipassword">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <label class="required fs-5 fw-semibold mb-2">{{ __('form.password') }}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="password"
                                class="@error('password')
                            border-danger
                            @enderror form-control form-control-solid"
                                placeholder="{{ __('form.user_password_input') }}" name="password" id="password"
                                autocomplete="false" />
                        </div>
                        @error('password')
                            <div>
                                <span class="ps-2 text-sm text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                        <!--end::Input-->
                    </div>
                </div>
                <div class="col-md-6 fv-row">
                    <div class="position-relative">
                        <i class="position-absolute fa fa-eye @if (Session::has('direction') && Session::get('direction') == 'rtl') start-0 ps-5 @else end-0 @endif bottom-0 pb-5 pe-5 text-gray-500"
                            id="cipassword">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <label class="required fs-5 fw-semibold mb-2">{{ __('form.confirm_password') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="password"
                            class="@error('password')
                            border-danger
                            @enderror form-control form-control-solid"
                            placeholder="{{ __('form.user_confirm_password_input') }}" name="password_confirmation"
                            id="cpassword" />
                    </div>
                    @error('password')
                        <div>
                            <span class="ps-2 text-sm text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="d-flex flex-column mb-10 fv-row">
                <!--begin::Label-->
                <label class="required fs-5 fw-semibold mb-2">{{ __('form.role') }}</label>
                <!--end::Label-->
                <!--begin::Select-->
                <select name="role" data-control="select2" data-hide-search="true" data-placeholder="Select Role..."
                    class="form-select form-select-solid">
                    <option selected value="student">{{ __('form.student_role') }}</option>
                    <option value="company">{{ __('form.company_role') }}</option>
                    <option value="admin">{{ __('form.admin_role') }}</option>
                </select>
                <!--end::Select-->
            </div>
            <div class="d-flex justify-content-end pt-7">
                <button type="submit" onclick="check"
                    class="btn btn-sm fw-bold btn-primary">{{ __('form.save') }}</button>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $('#ipassword').click(function(e) {
            if ($(this).hasClass('fa-eye')) {
                $(this).removeClass('fa-eye');
                $(this).addClass('fa-eye-slash');
                $('#password').attr('type', 'text');
            } else {
                $(this).removeClass('fa-eye-slash');
                $(this).addClass('fa-eye');
                $('#password').attr('type', 'password');
            }
        });
        $('#cipassword').click(function(e) {
            if ($(this).hasClass('fa-eye')) {
                $(this).removeClass('fa-eye');
                $(this).addClass('fa-eye-slash');
                $('#cpassword').attr('type', 'text');
            } else {
                $(this).removeClass('fa-eye-slash');
                $(this).addClass('fa-eye');
                $('#cpassword').attr('type', 'password');
            }
        });
        $('#oipassword').click(function(e) {
            if ($(this).hasClass('fa-eye')) {
                $(this).removeClass('fa-eye');
                $(this).addClass('fa-eye-slash');
                $('#opassword').attr('type', 'text');
            } else {
                $(this).removeClass('fa-eye-slash');
                $(this).addClass('fa-eye');
                $('#opassword').attr('type', 'password');
            }
        });
    </script>
@endsection
