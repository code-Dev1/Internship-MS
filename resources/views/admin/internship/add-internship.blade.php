@extends('admin.layout.master')
@section('pageTitle')
    IMS | Add Internship
@endsection
@section('pageSubTitle')
    @if (isset($internship))
        {{ __('general.update_internship') }}
    @else
        {{ __('general.add_internship') }}
    @endif
@endsection
@section('style')
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
@endsection
@section('content')
    <div class="py-10 px-lg-17">
        <form
            @if (isset($internship)) action="{{ route('internship.update', ['internship' => $internship->slug]) }}" @else action="{{ route('internship.store') }}" @endif
            method="POST">
            @csrf
            @if (isset($internship))
                @method('put')
            @endif
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-6 fv-row mb-3">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2">{{ __('form.title') }}</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text"
                        class="@error('title') border-danger
                    @enderror form-control form-control-solid"
                        placeholder="{{ __('form.enter_internship_title') }}" name="title"
                        @if (isset($internship)) value="{{ $internship->title }}" @else value="{{ old('title') }}" @endif />
                    <!--end::Input-->
                    @error('title')
                        <div>
                            <span class="text-danger text-sm">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 fv-row mb-3">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2">{{ __('form.location') }}</label>
                    <select name="location" cdata-control="select2" data-hide-search="true"
                        class="form-select form-select-solid @error('location') border-danger
                    @enderror"
                        data-placeholder="{{ __('form.select_input') }}">
                        @foreach (\App\Enums\Cities::cases() as $city)
                            <option value="{{ $city->value }}" @if (isset($internship) && $internship->location->value == $city->value) selected @endif>
                                {{ $city->value }}</option>
                        @endforeach
                    </select>
                    <!--end::Input-->
                    @error('location')
                        <div>
                            <span class="text-danger text-sm">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 fv-row mb-3">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2">{{ __('form.gender') }}</label>
                    <select name="gender" cdata-control="select2" data-hide-search="true"
                        class="form-select form-select-solid @error('gender') border-danger
                    @enderror"
                        data-placeholder="{{ __('form.select_input') }}">
                        @foreach (\App\Enums\Gengers::cases() as $gender)
                            <option value="{{ $gender->value }}" @if (isset($internship) && $internship->gender->value == $gender->value) selected @endif>
                                {{ $gender->value }}</option>
                        @endforeach
                    </select>
                    <!--end::Input-->
                    @error('gender')
                        <div>
                            <span class="text-danger text-sm">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 fv-row mb-3">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2">{{ __('form.education') }}</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text"
                        class="@error('education') border-danger
                    @enderror form-control form-control-solid"
                        placeholder="{{ __('form.enter_int_edu') }}" name="education"
                        @if (isset($internship)) value="{{ $internship->education }}" @else value="{{ old('education') }}" @endif />
                    <!--end::Input-->
                    @error('education')
                        <div>
                            <span class="text-danger text-sm">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 fv-row mb-3">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2">{{ __('form.time') }}</label>
                    <select name="time" cdata-control="select2" data-hide-search="true"
                        class="form-select form-select-solid @error('time') border-danger
                    @enderror"
                        data-placeholder="{{ __('form.select_input') }}">
                        @foreach (\App\Enums\WorkTime::cases() as $time)
                            <option value="{{ $time->value }}" @if (isset($internship) && $internship->time->value == $time->value) selected @endif>
                                {{ $time->value }}</option>
                        @endforeach
                    </select>
                    <!--end::Input-->
                    @error('time')
                        <div>
                            <span class="text-danger text-sm">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 fv-row mb-3">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2">{{ __('form.email') }}</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text"
                        class="@error('email') border-danger
                    @enderror form-control form-control-solid"
                        placeholder="{{ __('form.user_email_input') }}" name="email"
                        @if (isset($internship)) value="{{ $internship->email }}" @else value="{{ old('email') }}" @endif />
                    <!--end::Input-->
                    @error('email')
                        <div>
                            <span class="text-danger text-sm">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="fv-row mb-3">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2">{{ __('form.requirements') }}</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text"
                        class="@error('requirements') border-danger
                    @enderror form-control form-control-solid"
                        placeholder="{{ __('form.enter_int_req') }}" name="requirements"
                        @if (isset($internship)) value="{{ $internship->requirements }}" @else value="{{ old('requirements') }}" @endif />
                    <!--end::Input-->
                    @error('requirements')
                        <div>
                            <span class="text-danger text-sm">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-semibold mb-2">{{ __('form.start_date') }}</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="date"
                        class="@error('start_date') border-danger
                    @enderror form-control form-control-solid  @if (isset($internship))  @endif"
                        name="start_date"
                        @if (isset($internship)) value="{{ $internship->start_date->format('Y-m-d') }}" readonly @else value="{{ old('start_date') }}" @endif
                        min="{{ \Carbon\Carbon::today()->toDateString() }}" />
                    <!--end::Input-->
                    @error('start_date')
                        <div>
                            <span class="text-danger text-sm">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-semibold mb-2">{{ __('form.end_date') }}</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="date"
                        class="@error('end_date') border-danger
                    @enderror form-control form-control-solid"
                        name="end_date"
                        @if (isset($internship)) value="{{ $internship->end_date->format('Y-m-d') }}" @else value="{{ old('end_date') }}" @endif
                        min="{{ \Carbon\Carbon::today()->toDateString() }}" />
                    <!--end::Input-->
                    @error('end_date')
                        <div>
                            <span class="text-danger text-sm">{{ $message }}</span>
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
                <textarea name="description" id="editor" class="min-h-200px mb-2 w-100 bg-white rounded-3">
                    @if (isset($internship))
{{ $internship->description }}
@else
{{ old('description') }}
@endif
                </textarea>
                <!--end::Editor-->
                <!--begin::Description-->
                @error('description')
                    <div>
                        <span class="text-danger text-sm">{{ $message }}</span>
                    </div>
                @enderror
                <div class="text-muted fs-7">{{ __('form.internship_description_text') }}</div>
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
