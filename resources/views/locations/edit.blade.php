@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">{{ __('বিভাগ আপডেট') }}</h5>
                    <a href="{{ route('locations.index') }}" class="btn btn-primary  mr-2">
                        <i class='bx bx-left-arrow-alt'></i> {{ __('বিভাগ দেখুন ') }}
                    </a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('locations.update', $location->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">{{ __('বিভাগের নাম') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ $location->name ?? old('name') }}"
                                    placeholder="{{ __('বিভাগের নাম') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="status"
                                        {{ $location->status ? 'checked' : '' }} name="status" value="1">
                                    <label class="form-check-label" for="status">{{ __('Active') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">{{ __('আপডেট') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
