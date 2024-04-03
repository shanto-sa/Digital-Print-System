@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">ম্যাপ সার্চ করুন</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('map_search') }}" method="GET">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="">বিভাগ</label>

                                <select name="location_id" id="location_id"
                                    class="form-select @error('location_id') is-invalid @enderror select2 ">
                                    <option value="">{{ __('বিভাগ সিলেক্ট করুন  ') }}</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}"
                                            {{ request()->location_id == $location->id ? 'selected' : '' }}>
                                            {{ $location->name }}</option>
                                    @endforeach

                                </select>

                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="">থানা</label>

                                <select name="mouza_id" id="mouza_id"
                                    class="form-select @error('mouza_id') is-invalid @enderror select2">

                                </select>

                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="">মৌজা</label>

                                <select name="new_mouza_id" id="new_mouza_id"
                                    class="form-select @error('new_mouza_id') is-invalid @enderror select2">

                                </select>

                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="">ম্যাপ টাইপ</label>
                                <select name="map_type" class="form-select">
                                    <option value="">ম্যাপ টাইপ সিলেক্ট করুন</option>
                                    <option value="CS" {{ request()->map_type == 'CS' ? 'selected' : '' }}>CS</option>
                                    <option value="RS" {{ request()->map_type == 'RS' ? 'selected' : '' }}>RS</option>
                                    <option value="SA" {{ request()->map_type == 'SA' ? 'selected' : '' }}>SA</option>
                                    <option value="BRS" {{ request()->map_type == 'BRS' ? 'selected' : '' }}>BRS</option>

                                </select>
                            </div>

                            <div class="col-md-4 mb-3">

                                <label class="form-label" for="jalno">জে এল নং</label>
                                <input type="text" class="form-control" id="jalno" name="jalno"
                                    value="{{ request()->jalno }}">

                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="dag_no">দাগ নং</label>
                                <input type="text" class="form-control" id="dag_no" name="dag_no"
                                    value="{{ request()->dag_no }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="sit_no">সিট নং</label>
                                <input type="text" class="form-control" id="sit_no" name="sit_no"
                                    value="{{ request()->sit_no }}">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">সার্চ করুন</button>
                    </form>
                </div>
            </div>


            <div class="card mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">{{ __('ম্যাপ তালিকা') }}</h5>

                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('নং') }}</th>
                                <!--<th>{{ __('ম্যাপ এর ছবি') }}</th>-->
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

                                    <td>
                                        <a target="_blank" href="{{ route('map_print_show', $dag->id) }}"
                                            class="btn btn-sm btn-primary">
                                            ম্যাপ দেখুন
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection



@push('script')
    <script>
        $(document).ready(function() {




            $('#location_id').on('change', function() {
                var location_id = this.value;
                var req_mouza_id = {!! request()->mouza_id !!}

                $("#mouza_id").html('');
                $.ajax({
                    url: "{{ route('get_mouza') }}",
                    type: "POST",
                    data: {
                        location_id: location_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#mouza_id').html('<option value="">Select Mouza</option>');
                        $.each(result.data, function(key, value) {

                            if (req_mouza_id == value.id) {
                                $("#mouza_id").append('<option value="' + value
                                    .id + '" selected>' + value.name +
                                    '</option>');
                            } else {
                                $("#mouza_id").append('<option value="' + value
                                    .id + '">' + value.name +
                                    '</option>');
                            }

                        });
                        $('#mouza_id').trigger("change")

                    }
                });
            });


            $('#mouza_id').on('change', function() {
                var mouza_id = this.value;
                var req_new_mouza_id = {!! request()->new_mouza_id !!}

                console.log(req_new_mouza_id)
                $("#new_mouza_id").html('');
                $.ajax({
                    url: "{{ route('get_newmouza') }}",
                    type: "POST",
                    data: {
                        mouza_id: mouza_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#new_mouza_id').html('<option value="">Select new</option>');
                        $.each(result.data, function(key, value) {

                            if (req_new_mouza_id == value.id) {
                                $("#new_mouza_id").append('<option value="' + value
                                    .id + '" selected>' + value.name + '</option>');
                            } else {
                                $("#new_mouza_id").append('<option value="' + value
                                    .id + '">' + value.name + '</option>');
                            }

                        });
                    }
                });
            });


            $('#location_id').trigger("change")

        });
    </script>
@endpush
