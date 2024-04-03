@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">{{ __('ম্যাপ তালিকা') }}</h5>
                    @can('dag-create')
                        <h5 class="card-header">
                            <a href="{{ route('dags.create') }}" class="btn btn-primary  mr-2">
                                <i class='bx bx-plus'></i> {{ __('ম্যাপ যোগ করুন ') }}
                            </a>
                        </h5>
                    @endcan
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('নং') }}</th>
                                <th>{{ __('ম্যাপ এর ছবি') }}</th>
                                <th>{{ __('বিভাগ') }}</th>
                                <th>{{ __('থানা') }}</th>
                                <th>{{ __('মৌজা') }}</th>
                                <th>{{ __('টাইপ') }}</th>
                                <th>{{ __('জে এল নং') }}</th>
                                <th>{{ __('দাগ নং') }}</th>
                                <th>{{ __('সিট নং') }}</th>
                                <th>{{ __('স্ট্যাটাস ') }}</th>
                                @canany(['dag-edit', 'dag-delete'])
                                    <th>{{ __('একশন্স ') }}</th>
                                @endcanany

                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @foreach ($dags as $dag)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td><img src="{{ asset('images/maps') . '/' . $dag->map_image }}" alt=""
                                            width="100"></td>
                                    <td>{{ $dag->location->name }}</td>
                                    <td>{{ $dag->mouza->name }}</td>
                                    <td>{{ $dag->newmouza?->name }}</td>
                                    <td>{{ $dag->map_type }}</td>
                                    <td>{{ $dag->jalno }}</td>
                                    <td>{{ $dag->dag_no }}</td>
                                    <td>{{ $dag->sit_no }}</td>


                                    <td>
                                        @if ($dag->status == 1)
                                            <span class="badge rounded-pill bg-label-success">{{ __('Active') }}</span>
                                        @else
                                            <span class="badge rounded-pill bg-label-danger">{{ __('Inactive') }}</span>
                                        @endif
                                    </td>

                                    @canany(['dag-edit', 'dag-delete'])
                                        <td>
                                            @can('dag-edit')
                                                <a href="{{ route('dags.edit', $dag->id) }}" class="btn btn-sm btn-icon ">
                                                    <i class='bx bxs-edit-alt'></i>
                                                </a>
                                            @endcan
                                            @can('dag-delete')
                                                <button type="button" class="btn btn-sm btn-icon" onclick="openDeleteModal(this);"
                                                    data-id="{{ $dag->id }}">
                                                    <i class='bx bxs-trash'></i>
                                                </button>

                                                <form method="POST" id="{{ $dag->id }}"
                                                    action="{{ route('dags.destroy', $dag->id) }}" class="d-none">
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
            {!! $dags->links() !!}
        </div>
    </div>
@endsection
