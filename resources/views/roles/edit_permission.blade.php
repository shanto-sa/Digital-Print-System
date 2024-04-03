@extends('layouts.app')

@section('content')
    @php

        $permissions = [
            'user-management' => ['user-view', 'user-create', 'user-edit', 'user-delete'],
            'location-management' => ['location-view', 'location-create', 'location-edit', 'location-delete'],
            'mouza-management' => ['mouza-view', 'mouza-create', 'mouza-edit', 'mouza-delete'],
            'dag-management' => ['dag-view', 'dag-create', 'dag-edit', 'dag-delete'],
            'role-management' => ['role-view', 'role-give-permission', 'role-create', 'role-edit', 'role-delete'],
            'settings-management' => ['general-settings-view', 'general-settings-edit', 'system-settings-view', 'system-settings-edit'],
        ];

    @endphp
    {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Roles/</span> Edit Permissions</h4> --}}

    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Roles Permission</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('roles.update_permission', $role->id) }}">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">Role Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name"
                                    value="{{ $role->name ?? old('name') }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Permissions</label>
                            <div class="col-sm-10">

                                @foreach ($permissions as $key => $permission)
                                    <div>
                                        <div class="mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" onchange="handleChange(this)"
                                                    type="checkbox" id="{{ $key }}">
                                                <label class="form-check-label text-capitalize" for="{{ $key }}">
                                                    {{ $key }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2 p-3">
                                            @foreach ($permission as $perm)
                                                <div class="form-check">
                                                    <input class="form-check-input check_{{ $key }}"
                                                        onchange="handleParent('check_{{ $key }}','{{ $key }}')"
                                                        type="checkbox" value="{{ $perm }}" id="{{ $perm }}"
                                                        name="permissions[]"
                                                        {{ $role->hasPermissionTo($perm) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="{{ $perm }}">
                                                        {{ $perm }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                @endforeach


                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            var permissions = @json($permissions);

            for (var key in permissions) {
                handleParent('check_' + key, key)
            }
        })

        function handleChange(element) {
            if (element.checked) {
                $('.check_' + element.id).each(function() {
                    $(this).prop("checked", true);
                })
            } else {
                $('.check_' + element.id).each(function() {
                    $(this).prop("checked", false);
                })
            }
        }

        function handleParent(cl, id) {
            var allchecked = true;
            $('.' + cl).each(function() {
                if ($(this).prop("checked") == false) {
                    allchecked = false;
                }
            })

            if (allchecked) {
                $('#' + id).prop("checked", true);
            } else {
                $('#' + id).prop("checked", false);
            }
        }
    </script>
@endpush
