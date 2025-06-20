@extends('admin.layout.master')

@section('pageTitle')
    IMS | Add Company
@endsection
@section('style')
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
@endsection
@section('pageSubTitle')
    @if (isset($company))
        {{ __('general.update_company') }}
    @else
        {{ __('general.add_company') }}
    @endif
@endsection
@section('content')
    <div class="py-10 px-lg-17">
        <form
            @if (isset($company)) action="{{ route('company.update', ['company' => $company->id]) }}" @else action="{{ route('company.store') }}" @endif
            method="POST">
            @csrf
            @if (isset($company))
                @method('put')
            @endif
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2">{{ __('form.company_name') }}</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text"
                        class="@error('company_name')
                    border-danger
                    @enderror form-control form-control-solid"
                        placeholder="{{ __('form.company_name_input') }}" name="company_name"
                        @if (isset($company)) value="{{ $company->name }}" @else value="{{ old('company_name') }}" @endif />
                    <!--end::Input-->
                    @error('company_name')
                        <div>
                            <span class="text-sm text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="fs-5 fw-semibold mb-2">{{ __('form.website') }}</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="text"
                        class="@error('website_address')
                    border-danger
                    @enderror form-control form-control-solid"
                        placeholder="{{ __('form.company_website_input') }}" name="website_address"
                        @if (isset($company)) value="{{ $company->website }}" @else value="{{ old('website_address') }}" @endif />
                    <!--end::Input-->
                    @error('website_address')
                        <div>
                            <span class="text-sm text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <!--end::Col-->
            </div>
            <div>
                <!--begin::Label-->
                <label class="form-label">{{ __('form.description') }}</label>
                <!--end::Label-->
                <!--begin::Editor-->
                <textarea name="description" id="editor"
                    class="@error('descrption') border-danger @enderror min-h-200px mb-2 w-100 bg-white rounded-3">
                    @if (isset($company))
                            {{ $company->description }}
                    @else
                    {{ old('description') }}
                    @endif
                </textarea>
                <!--end::Editor-->
                <!--begin::Description-->
                @error('description')
                    <div>
                        <span class="text-sm text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="text-muted fs-6">{{ __('form.company_description_text') }}</div>
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
                language: 'af',
                toolbar: ['undo', 'redo', '|', 'heading', '|', 'bold', 'italic', '|', 'link',
                    'insertTable',
                    'blockQuote',
                    '|',
                    'numberedList',
                    'bulletedList'
                ]
            })
    </script>
@endsection
