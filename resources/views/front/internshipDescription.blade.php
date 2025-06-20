@extends('front.layout.master')
@section('title')
    IMS | Internship
@endsection
@section('content')
    <div class="text-center mb-10">
        <h1>Title | {{ $int->title }}</h1>
    </div>
    <div class=" bg-gray-300 min-h-100px min-w-100 rounded-2">
        <div class="row p-10 text-dark">
            <div class="col-md-6">
                <p class=" min-w-10px fs-6 mb-10"> <b>Company</b> | {{ $int->company->name }} </p>
                <p class=" min-w-10px fs-6 mb-10"> <b>Start Date</b> | {{ $int->start_date->format('Y-m-d') }} </p>
                <p class=" min-w-10px fs-6 mb-4"> <b>End Date</b> | {{ $int->end_date->format('Y-m-d') }} </p>
            </div>
            <div class="col-md-6">
                <p class=" min-w-10px fs-6 mb-10"> <b>Location</b> | {{ $int->location }} </p>
                <p class=" min-w-10px fs-6 mb-10"> <b>Gender</b> | {{ $int->gender }} </p>
                <p class=" min-w-10px fs-6 mb-4"> <b>Education</b> | {{ $int->education }} </p>
            </div>
        </div>
    </div>
    <div class="p-10">
        <h5 class="mb-5 ms-3">About Company</h5>
        @php
            echo $int->company->description;
        @endphp
    </div>
    <div class="p-10">
        <h5 class="mb-5 ms-3">Internship description</h5>
        @php
            echo $int->description;
        @endphp
    </div>
    <div class="d-flex justify-content-between">
        <div class="p-10">
            {{ $int->requirements }}
            <br class="mb-3">
            <a href="mailto:{{ $int->email }}">{{ $int->email }}</a>
        </div>
        @if (!auth()->user())
            <div class="p-10 mt-3">
                <a href="{{ route('login') }}" class="btn btn-success">Sign in</a>
            </div>
        @else
            @if (auth()->user()->role === 'student')
                <div class="p-10 mt-3">
                    <button type="button" class="btn btn-flex btn-success" id="open" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_upload">Apply</button>
                </div>
            @endif
        @endif
    </div>
    <div class="modal fade" id="kt_modal_upload" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="{{ route('apply.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Apply</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body pt-10 pb-15 px-lg-17">
                        <!--begin::Input group-->
                        <input type="hidden" value="{{ $int->id }}" name="id">
                        <div class="mb-4">
                            <label for="" class="form-label ms-2">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name"
                                value="{{ old('name') }}" />
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label ms-2">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                value="{{ old('email') }}" />
                        </div>
                        <div class="dropzone-panel mb-8">
                            <label class="form-label ms-2" for="">Attach cv</label>
                            <input type="file" name="pdf" id="pdf" class="dropzone-select form-control me-2"
                                accept="application/pdf">
                            <div class="mt-2 ms-1">Maximum file size 5 mb<div class="d-inline" id="file-inof"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div><button type="submitx" class="btn btn-success btn-sm" id="submit">Send</button></div>
                        </div>

                        <!--end::Input group-->
                    </div>
                    <!--end::Modal body-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.getElementById('pdf').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const fileSizeMb = (file.size / (1024 * 1024)).toFixed(2);
                const fileName = file.name;
                document.getElementById('file-inof').innerText = `Your file size is ${fileSizeMb}`
                if (fileSizeMb <= 5.00) {
                    document.getElementById('file-inof').setAttribute('class', 'text-success')
                } else {
                    document.getElementById('file-inof').setAttribute('class', 'text-danger')
                    const subBtn = document.getElementById('submit')
                    subBtn.setAttribute('disabled', 'disabled')
                }
            } else {
                document.getElementById('file-inof').innerText = ''
            }
        })
        document.getElementById('open').addEventListener('click', function() {
            document.getElementById('pdf').value = ''
            document.getElementById('file-inof').innerText = ''
        })
    </script>
@endsection
