@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">{{ __('ম্যাপ আপডেট') }}</h5>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('dags.update', $dag->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="location_id">{{ __('বিভাগ') }}</label>
                            <div class="col-sm-10">
                                <select name="location_id" id="location_id"
                                    class="form-select @error('location_id') is-invalid @enderror select2 ">
                                    <option value="">{{ __('Please Select') }}</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}"
                                            {{ $dag->location_id == $location->id ? 'selected' : '' }}>
                                            {{ $location->name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('location_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="mouza_id">{{ __('থানা') }}</label>
                            <div class="col-sm-10">
                                <select name="mouza_id" id="mouza_id"
                                    class="form-select @error('mouza_id') is-invalid @enderror select2">
                                    <option value="">{{ __('Select Mouza') }}</option>
                                    @foreach ($mouzas as $mouza)
                                        <option value="{{ $mouza->id }}"
                                            {{ $dag->mouza_id == $mouza->id ? 'selected' : '' }}>{{ $mouza->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('mouza_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="mouza_id">{{ __('মৌজা') }}</label>
                            <div class="col-sm-10">
                                <select name="new_mouza_id" id="new_mouza_id"
                                    class="form-select @error('new_mouza_id') is-invalid @enderror select2">
                                    <option value="">{{ __('Select Mouza') }}</option>
                                    @foreach ($newmouzas as $mouza)
                                        <option value="{{ $mouza->id }}"
                                            {{ $dag->mouza_id == $mouza->id ? 'selected' : '' }}>{{ $mouza->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('new_mouza_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="mouza_id">{{ __('টাইপ') }}</label>
                            <div class="col-sm-10">
                                <select name="map_type" class="form-select">

                                    <option {{ $dag->map_type == 'CS' ? 'selected' : '' }} value="CS">CS</option>
                                    <option {{ $dag->map_type == 'Rs' ? 'selected' : '' }} value="RS">RS</option>
                                    <option {{ $dag->map_type == 'SA' ? 'selected' : '' }} value="SA">SA</option>
                                    <option {{ $dag->map_type == 'BRS' ? 'selected' : '' }} value="BRS">BRS</option>

                                </select>
                                @error('mouza_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="jalno">{{ __('জে এল নং') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('jalno') is-invalid @enderror"
                                    id="jalno" name="jalno" value="{{ old('jalno', $dag->jalno) }}"
                                    placeholder="জে এল নং">
                                @error('jalno')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="dag_no">{{ __('দাগ নং') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('dag_no') is-invalid @enderror"
                                    id="dag_no" name="dag_no" value="{{ old('dag_no', $dag->dag_no) }}"
                                    placeholder="দাগ নং">
                                @error('dag_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="sit_no">{{ __('সিট নং') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('sit_no') is-invalid @enderror"
                                    id="sit_no" name="sit_no" value="{{ old('sit_no', $dag->sit_no) }}"
                                    placeholder="সিট নং">
                                @error('sit_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">{{ __('Existing Map') }}</label>
                            <div class="col-sm-3">
                                <img src="{{ asset('images/maps') . '/' . $dag->map_image }}" alt=""
                                    width="100">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="map_image">{{ __('Map Image') }}</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('map_image') is-invalid @enderror" type="file"
                                    id="map_image" name="map_image">
                                @error('map_image')
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
                                    <input class="form-check-input" type="checkbox" id="status" checked=""
                                        name="status" value="1" {{ $dag->status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Active</label>
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
                                <button type="submit" class="btn btn-primary">আপডেট</button>
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
            $('#location_id').on('change', function() {
                var location_id = this.value;
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
                            $("#mouza_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

        });
    </script>


    <script>
        $(document).ready(function() {
            $('#mouza_id').on('change', function() {
                var mouza_id = this.value;
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
                            $("#new_mouza_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

        });
    </script>
@endpush
