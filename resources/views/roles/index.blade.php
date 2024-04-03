@extends('layouts.app')

@section('content')
    {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __('Roles/') }}</span> {{ __('All Roles') }}</h4> --}}

    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">{{ __('Roles List') }}</h5>
                    @can('role-create')
                        <h5 class="card-header">
                            <a href="{{ route('roles.create') }}" class="btn btn-primary  mr-2">
                                <i class='bx bx-plus'></i> {{ __('Add Role') }}
                            </a>
                        </h5>
                    @endcan
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th>{{ __('Role Name') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Status') }}</th>
                                @canany(['role-give-permission', 'role-edit', 'role-delete'])
                                    <th>{{ __('Actions') }}</th>
                                @endcanany

                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @foreach ($roles as $role)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>{{ $role->name }}</td>
                                    <td class=" w-50">
                                        {{ $role->description }}
                                    </td>


                                    <td>
                                        @if ($role->status == 1)
                                            <span class="badge rounded-pill bg-label-success">Active</span>
                                        @else
                                            <span class="badge rounded-pill bg-label-danger">Inactive</span>
                                        @endif
                                    </td>

                                    @canany(['role-give-permission', 'role-edit', 'role-delete'])
                                        <td>
                                            @can('role-give-permission')
                                                <a href="{{ route('roles.edit_permission', $role->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    Permission
                                                </a>
                                            @endcan

                                            @can('role-edit')
                                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-icon ">
                                                    <i class='bx bxs-edit-alt'></i>
                                                </a>
                                            @endcan
                                            @can('role-delete')
                                                <button type="button" class="btn btn-sm btn-icon" onclick="openDeleteModal(this);"
                                                    data-id="{{ $role->id }}">
                                                    <i class='bx bxs-trash'></i>
                                                </button>

                                                <form method="POST" id="{{ $role->id }}"
                                                    action="{{ route('roles.destroy', $role->id) }}" class="d-none">
                                                    @csrf
                                                    @method('DELETE')

                                                </form>
                                            @endcan
                                        </td>
                                    @endcanany
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>

            {!! $roles->links() !!}
        </div>
    </div>
@endsection
