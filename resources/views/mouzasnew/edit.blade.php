@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">{{ __('মৌজা আপডেট') }}</h5>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('mouzasnew.update', $MouzaNew->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">{{ __('মৌজার নাম') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $MouzaNew->name) }}"
                                    placeholder="মৌজার নাম লিখুন ">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="mouzas_id">{{ __('বিভাগ') }}</label>
                            <div class="col-sm-10">
                                <select name="mouzas_id" id="mouzas_id" class="form-select select2">
                                    <option value="">{{ __('বিভাগ সিলেক্ট করুন ') }}</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}"
                                            {{ $MouzaNew->mouzas_id == $location->id ? 'selected' : '' }}>
                                            {{ $location->name }}</option>
                                    @endforeach

                                </select>
                                @error('mouzas_id')
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
                                    <input class="form-check-input" type="checkbox" id="status" name="status"
                                        value="1" {{ $MouzaNew->status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">{{ __('Active') }}</label>
                                </div>
                                @error('status')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
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
