@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">{{ __('বিভাগের তালিকা') }}</h5>
                    @can('location-create')
                        <h5 class="card-header">
                            <a href="{{ route('locations.create') }}" class="btn btn-primary  mr-2">
                                <i class='bx bx-plus'></i> {{ __('বিভাগ যোগ করুন') }}
                            </a>
                        </h5>
                    @endcan
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('নং') }}</th>
                                <th>{{ __('নাম') }}</th>
                                <th>{{ __('স্ট্যাটাস ') }}</th>
                                {{-- <th>{{ __('Created By') }}</th> --}}
                                @canany(['location-edit', 'location-delete'])
                                    <th>{{ __('একশন্স ') }}</th>
                                @endcanany

                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @foreach ($locations as $location)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>{{ $location->name }}</td>
                                    <td>
                                        @if ($location->status == 1)
                                            <span class="badge rounded-pill bg-label-success">Active</span>
                                        @else
                                            <span class="badge rounded-pill bg-label-danger">Inactive</span>
                                        @endif
                                    </td>
                                    {{-- <td>{{ $location->creator->username }}</td> --}}


                                    @canany(['location-edit', 'location-delete'])
                                        <td>
                                            @can('location-edit')
                                                <a href="{{ route('locations.edit', $location->id) }}"
                                                    class="btn btn-sm btn-icon ">
                                                    <i class='bx bxs-edit-alt'></i>
                                                </a>
                                            @endcan
                                            @can('location-delete')
                                                <button type="button" class="btn btn-sm btn-icon" onclick="openDeleteModal(this);"
                                                    data-id="{{ $location->id }}">
                                                    <i class='bx bxs-trash'></i>
                                                </button>

                                                <form method="POST" id="{{ $location->id }}"
                                                    action="{{ route('locations.destroy', $location->id) }}" class="d-none">
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
            {!! $locations->links() !!}
        </div>
    </div>
@endsection
