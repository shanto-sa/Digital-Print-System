@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">{{ __('থানার তালিকা') }}</h5>
                    @can('mouza-create')
                        <h5 class="card-header">
                            <a href="{{ route('mouzas.create') }}" class="btn btn-primary  mr-2">
                                <i class='bx bx-plus'></i> {{ __('থানা যুক্ত করুন ') }}
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
                                <th>{{ __('বিভাগ') }}</th>
                                <th>{{ __('স্ট্যাটাস ') }}</th>
                                {{-- <th>{{ __('Created By') }}</th> --}}
                                @canany(['mouza-edit', 'mouza-delete'])
                                    <th>{{ __('একশন্স ') }}</th>
                                @endcanany

                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @foreach ($mouzas as $mouza)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>{{ $mouza->name }}</td>
                                    <td>{{ $mouza->location->name }}</td>
                                    <td>
                                        @if ($mouza->status == 1)
                                            <span class="badge rounded-pill bg-label-success">{{ __('Active') }}</span>
                                        @else
                                            <span class="badge rounded-pill bg-label-danger">{{ __('Inactive') }}</span>
                                        @endif
                                    </td>

                                    {{-- <td>{{ $mouza->creator->username }}</td> --}}

                                    @canany(['mouza-edit', 'mouza-delete'])
                                        <td>
                                            @can('mouza-edit')
                                                <a href="{{ route('mouzas.edit', $mouza->id) }}" class="btn btn-sm btn-icon ">
                                                    <i class='bx bxs-edit-alt'></i>
                                                </a>
                                            @endcan
                                            @can('mouza-delete')
                                                <button type="button" class="btn btn-sm btn-icon" onclick="openDeleteModal(this);"
                                                    data-id="{{ $mouza->id }}">
                                                    <i class='bx bxs-trash'></i>
                                                </button>

                                                <form method="POST" id="{{ $mouza->id }}"
                                                    action="{{ route('mouzas.destroy', $mouza->id) }}" class="d-none">
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
            {!! $mouzas->links() !!}
        </div>
    </div>
@endsection
