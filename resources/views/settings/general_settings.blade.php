@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit General Settings</h5>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('general_settings.update') }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="basic-default-fullname">Site Logo</label>
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="{{ asset('images/uploads') . '/' . $general_settings->site_logo }}"
                                        alt="user-avatar" class="d-block rounded" height="100" width="100"
                                        id="uploadedAvatar">
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" class="account-file-input" hidden=""
                                                accept="image/png, image/jpeg">
                                        </label>
                                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>

                                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                        @error('site_logo')
                                            <span class="text-xs text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="site_title">Site Title</label>
                                <input type="text" class="form-control @error('site_title') is-invalid @enderror"
                                    name="site_title" id="site_title" value="{{ $general_settings->site_title }}"
                                    placeholder="ACME Inc.">
                                @error('site_title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="contact_person">Contact Person</label>
                                <input type="text" class="form-control @error('contact_person') is-invalid @enderror"
                                    name="contact_person" id="contact_person"
                                    value="{{ $general_settings->contact_person }}" placeholder="ACME Inc.">
                                @error('contact_person')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" value="{{ $general_settings->email }}"
                                    placeholder="ACME Inc.">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" id="phone" value="{{ $general_settings->phone }}"
                                    placeholder="ACME Inc.">
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="address_line_1">Address Line 1</label>
                                <input type="text" class="form-control @error('address_line_1') is-invalid @enderror"
                                    name="address_line_1" id="address_line_1"
                                    value="{{ $general_settings->address_line_1 }}" placeholder="ACME Inc.">
                                @error('address_line_1')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="address_line_2">Address Line 2</label>
                                <input type="text" class="form-control @error('address_line_2') is-invalid @enderror"
                                    name="address_line_2" id="address_line_2"
                                    value="{{ $general_settings->address_line_2 }}" placeholder="ACME Inc.">
                                @error('address_line_2')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="city">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                    name="city" id="city" value="{{ $general_settings->city }}"
                                    placeholder="ACME Inc.">
                                @error('city')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="state">State</label>
                                <input type="text" class="form-control @error('state') is-invalid @enderror"
                                    name="state" id="state" value="{{ $general_settings->state }}"
                                    placeholder="ACME Inc.">
                                @error('state')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="zipcode">Zipcode</label>
                                <input type="text" class="form-control @error('zipcode') is-invalid @enderror"
                                    name="zipcode" id="zipcode" value="{{ $general_settings->zipcode }}"
                                    placeholder="ACME Inc.">
                                @error('zipcode')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('backend/assets/js/pages-account-settings-account.js') }}"></script>
@endpush
