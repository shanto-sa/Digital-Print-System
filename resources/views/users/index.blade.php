@extends('layouts.app')

@section('content')
    {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __('Users/') }}</span> {{ __('All Users') }}</h4> --}}

    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">{{ __('User List') }}</h5>
                    @can('user-create')
                        <a href="{{ route('users.create') }}" class="btn btn-primary mr-2">
                            <i class='bx bx-plus'></i> {{ __('Create User') }}
                        </a>
                    @endcan


                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th>{{ __('User Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Role') }}</th>
                                @canany(['user-edit', 'user-delete'])
                                    <th>{{ __('Actions') }}</th>
                                @endcanany

                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach ($user->roles as $role)
                                                <span
                                                    class="badge rounded-pill bg-label-primary">{{ $role->name }}</span>
                                            @endforeach
                                        </div>
                                    </td>

                                    @canany(['user-edit', 'user-delete'])
                                        <td>
                                            @can('user-edit')
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-icon ">
                                                    <i class='bx bxs-edit-alt'></i>
                                                </a>
                                            @endcan

                                            @can('user-delete')
                                                <button type="button" class="btn btn-sm btn-icon" onclick="openDeleteModal(this);"
                                                    data-id="{{ $user->id }}">
                                                    <i class='bx bxs-trash'></i>
                                                </button>

                                                <form method="POST" id="{{ $user->id }}"
                                                    action="{{ route('users.destroy', $user->id) }}" class="d-none">
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


            {!! $users->links() !!}

        </div>
    </div>
@endsection
