@extends('layouts.app')

@section('content')
    {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __('Roles/') }}</span> {{ __('Edit') }}</h4> --}}

    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">{{ __('Edit Role') }}</h5>
                    <a href="{{ route('roles.index') }}" class="btn btn-primary  mr-2">
                        <i class='bx bx-left-arrow-alt'></i> {{ __('View Roles') }}
                    </a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('roles.update', $role->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">{{ __('Role Name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ $role->name ?? old('name') }}"
                                    placeholder="{{ __('Role Name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="description">{{ __('Description') }}</label>
                            <div class="col-sm-10">
                                <textarea id="description" class="form-control" name="description"
                                    placeholder="{{ __('Give some description for this role.') }}">{{ $role->description }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="status"
                                        {{ $role->status ? 'checked' : '' }} name="status">
                                    <label class="form-check-label" for="status">{{ __('Active') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
