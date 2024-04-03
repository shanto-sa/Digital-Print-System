@extends('layouts.app')


@section('content')
    <div class="col-md-12">

        <div class="card mb-4">
            <h5 class="card-header">প্রোফাইলের তথ্য</h5>

            <!-- Account -->

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body" style="padding-top:0;">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">

                        <img src="{{ $user->profile_photo ? asset('images/users') . '/' . $user->profile_photo : ($user->gender == 'female' ? asset('backend/images/defaults/default-user-female.png') : asset('backend/images/defaults/default-user-male.png')) }}"
                            alt="user-avatar" class="d-block rounded-circle" height="100" width="100"
                            id="uploadedAvatar">
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">নুতন ছবি আপলোড করুন </span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" hidden=""
                                    name="profile_photo" accept="image/png, image/jpeg">
                            </label>
                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">রিসেট </span>
                            </button>
                            @error('profile_photo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <p class="text-muted mb-0">Allowed JPG, JPEG or PNG. Max size of 800K</p>
                        </div>
                    </div>
                </div>
                <hr class="my-0">
                <div class="card-body">

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="firstname" class="form-label">আপনার নাম</label>
                            <input class="form-control @error('firstname') is-invalid @enderror" type="text"
                                name="firstname" id="firstname" value="{{ old('firstname', $user->firstname) }}"
                                placeholder="আপনার নাম লিখুন ">
                            @error('firstname')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="lastname" class="form-label">আপনার পদবি</label>
                            <input class="form-control @error('lastname') is-invalid @enderror" type="text"
                                name="lastname" id="lastname" value="{{ old('lastname', $user->lastname) }}"
                                placeholder="আপনার পদবি লিখুন ">
                            @error('lastname')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="username" class="form-label">ইউসার নাম </label>
                            <input class="form-control @error('username') is-invalid @enderror" type="text"
                                name="username" id="username" value="{{ $user->username }}">
                            @error('username')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">ইমেইল</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" id="email"
                                name="email" value="{{ $user->email }}" placeholder="john.doe@example.com">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="phone">মোবাইল নম্বর</label>

                            <input type="text" id="phone" name="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone', $user->phone) }}" placeholder="1992 327887">
                            @error('phone')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">লিঙ্গ</label>
                            <div>
                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input" type="radio" name="gender" id="male"
                                        value="male" {{ $user->gender == 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="female" {{ $user->gender == 'female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>

                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input" type="radio" name="gender" id="other"
                                        value="other" {{ $user->gender == 'other' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="address" class="form-label">ঠিকানা </label>
                            <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3"
                                placeholder="Address"> {{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">পরিবর্তন সংরক্ষণ</button>
                        <button type="reset" class="btn btn-outline-secondary">বাতিল</button>
                    </div>

                </div>

            </form>
            <!-- /Account -->
        </div>

        <div class="card mb-4">
            <h5 class="card-header">পাসওয়ার্ড পরিবর্তন </h5>
            <!-- Change Password -->
            <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="current_password" class="form-label">বর্তমান পাসওয়ার্ড </label>
                            <input class="form-control @error('current_password') is-invalid @enderror" type="password"
                                id="current_password" name="current_password">
                            @error('current_password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="password" class="form-label">নুতন পাসওয়ার্ড </label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                id="password" name="password">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="password_confirmation" class="form-label">কন্ফার্ম পাসওয়ার্ড </label>
                            <input class="form-control" type="password" id="password_confirmation"
                                name="password_confirmation">
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">পরিবর্তন সংরক্ষণ</button>
                        <button type="reset" class="btn btn-outline-secondary">বাতিল</button>
                    </div>
                </form>
            </div>
            <!-- /Change Password -->
        </div>

        {{-- <div class="card">
            <h5 class="card-header">Delete Account</h5>
            <div class="card-body">
                <div class="mb-3 col-12">
                    <div class="alert alert-warning">
                        <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                        <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                    </div>
                </div>
                <form action="{{ route('profile.destroy') }}" method="POST" id="account-delete-form">
                    @csrf
                    @method('delete')
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="delete-confirm-password" class="form-label">Password</label>
                            <input class="form-control @error('account_password') is-invalid @enderror" type="password"
                                id="delete-confirm-password" name="account_password">
                            @error('account_password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>

                    <button type="submit" class="btn btn-danger deactivate-account">Delete Account</button>
                </form>
            </div>
        </div> --}}
    </div>
@endsection


@push('script')
    <script src="{{ asset('backend/assets/js/pages-account-settings-account.js') }}"></script>
@endpush
