@extends('layouts.app')

@section('content')
    {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __('Users/') }}</span> {{ __('Create') }}</h4> --}}

    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">{{ __('Create User') }}</h5>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">

                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="username">{{ __('User Name') }}</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ old('username') }}" placeholder="{{ __('User Name') }}">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="email">{{ __('Email') }}</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email ?? old('email') }}" placeholder="{{ __('Email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">{{ __('Password') }}</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="name" name="password"
                                    placeholder="{{ __('Password') }}">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"
                                for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="{{ __('Confirm Password') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="role">{{ __('Role') }}</label>
                            <div class="col-sm-4">
                                <select id="role" name="role" class="form-select">
                                    <option>{{ __('Please Select') }}</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                <button type="reset" class="btn btn-secondary">{{ __('Cancel') }}</button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
