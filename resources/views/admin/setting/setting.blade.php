@extends('admin.layout.master')
@section('pageTitle')
    IMS | Setting
@endsection
@section('style')
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
@endsection
@section('pageSubTitle')
    {{ __('general.setting') }}
@endsection
@section('content')
    <div class="py-10 px-lg-17">
        <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2">{{ __('form.frontLogo') }}</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="file"
                        class="@error('frontLogo')
                    border-danger
                    @enderror form-control form-control-solid"
                        name="frontLogo"
                        @if (isset($setting)) value="{{ $setting->frontLogo }}" @else value="{{ old('frontLogo') }}" @endif />
                    <!--end::Input-->
                    @error('frontLogo')
                        <div>
                            <span class="text-sm text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row mb-3">
                    <!--end::Label-->
                    <label class="fs-5 fw-semibold mb-2 required">{{ __('form.dashboardLogo') }}</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="file"
                        class="@error('dashboardLogo')
                    border-danger
                    @enderror form-control form-control-solid"
                        name="dashboardLogo"
                        @if (isset($setting)) value="{{ $setting->dashboardLogo }}" @else value="{{ old('dashboardLogo') }}" @endif />
                    <!--end::Input-->
                    @error('dashboardLogo')
                        <div>
                            <span class="text-sm text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 fv-row mb-3">
                    <!--end::Label-->
                    <label class="fs-5 fw-semibold mb-2 required">{{ __('form.facebook') }}</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="text"
                        class="@error('facebook')
                    border-danger
                    @enderror form-control form-control-solid"
                        name="facebook"
                        @if (isset($setting)) value="{{ $setting->facebook }}" @else value="{{ old('facebook') }}" @endif
                        placeholder="Enter the facebook url" />
                    <!--end::Input-->
                    @error('facebook')
                        <div>
                            <span class="text-sm text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 fv-row mb-3">
                    <!--end::Label-->
                    <label class="fs-5 fw-semibold mb-2 required">{{ __('form.x') }}</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="text"
                        class="@error('x')
                    border-danger
                    @enderror form-control form-control-solid"
                        name="x"
                        @if (isset($setting)) value="{{ $setting->x }}" @else value="{{ old('x') }}" @endif
                        placeholder="Enter the x url" />
                    <!--end::Input-->
                    @error('x')
                        <div>
                            <span class="text-sm text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 fv-row mb-3">
                    <!--end::Label-->
                    <label class="fs-5 fw-semibold mb-2 required">{{ __('form.instagram') }}</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="text"
                        class="@error('instagram')
                    border-danger
                    @enderror form-control form-control-solid"
                        name="instagram"
                        @if (isset($setting)) value="{{ $setting->instagram }}" @else value="{{ old('instagram') }}" @endif
                        placeholder="Enter the instagram url" />
                    <!--end::Input-->
                    @error('instagram')
                        <div>
                            <span class="text-sm text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 fv-row mb-3">
                    <!--end::Label-->
                    <label class="fs-5 fw-semibold mb-2 required">{{ __('form.youtube') }}</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="text"
                        class="@error('youtube')
                    border-danger
                    @enderror form-control form-control-solid"
                        name="youtube"
                        @if (isset($setting)) value="{{ $setting->youbube }}" @else value="{{ old('youtube') }}" @endif
                        placeholder="Enter the youtube url" />
                    <!--end::Input-->
                    @error('youtube')
                        <div>
                            <span class="text-sm text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="fv-row mb-3">
                    <!--end::Label-->
                    <label class="fs-5 fw-semibold mb-2 required">{{ __('form.email') }}</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="email"
                        class="@error('email')
                    border-danger
                    @enderror form-control form-control-solid"
                        name="email"
                        @if (isset($setting)) value="{{ $setting->email }}" @else value="{{ old('email') }}" @endif
                        placeholder="Enter the email" />
                    <!--end::Input-->
                    @error('email')
                        <div>
                            <span class="text-sm text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!--end::Col-->
            </div>
            <div>
                <!--begin::Label-->
                <label class="form-label ms-1">{{ __('form.about') }}</label>
                <!--end::Label-->
                <!--begin::Editor-->
                <textarea name="about" id="editor"
                    class="@error('about') border-danger @enderror min-h-200px mb-2 w-100 bg-white rounded-3"
                    placeholder="Type some line about your site">
                    @if (isset($setting))
{{ $setting->about }}
@else
{{ old('about') }}
@endif
                </textarea>
                <!--end::Editor-->
                <!--begin::Description-->
                @error('description')
                    <div>
                        <span class="text-sm text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="text-muted fs-6">Type some line about your site</div>
                <!--end::Description-->
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
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: ['undo', 'redo', '|', 'heading', '|', 'bold', 'underline', 'italic', '|', 'link',
                    'insertTable',
                    'blockQuote',
                    'numberedList',
                    'bulletedList',
                ]
            })
    </script>
@endsection
