@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">ম্যাপ প্রিন্ট রিপোর্ট </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('report.basic') }}" method="GET">
                        <div class="row">

                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="start_date">প্রিন্টের ধরণ</label>

                                <select name="print_type" class="form-control">
                                    <option value="print" {{ request()->print_type == 'print' ? 'selected' : '' }}>প্রিন্ট
                                    </option>
                                    <option value="email" {{ request()->print_type == 'email' ? 'selected' : '' }}>ইমেইল
                                    </option>
                                </select>

                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="">স্টাফ </label>

                                <select name="staff_id" id="staff_id"
                                    class="form-select @error('staff_id') is-invalid @enderror select2 ">
                                    <option value="">{{ __('স্টাফ সিলেক্ট করুন  ') }}</option>
                                    @foreach ($staffs as $staff)
                                        <option value="{{ $staff->id }}"
                                            {{ request()->staff_id == $staff->id ? 'selected' : '' }}>
                                            {{ $staff->username }}</option>
                                    @endforeach

                                </select>

                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="start_date">তারিখ থেকে</label>

                                <input class="form-control" type="date" name="start_date"
                                    value="{{ request()->start_date }}" id="start_date">

                            </div>


                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="end_date">তারিখ</label>

                                <input class="form-control" type="date" name="end_date" value="{{ request()->end_date }}"
                                    id="end_date">

                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">সার্চ করুন</button>
                    </form>
                </div>
            </div>


            <div class="card mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">{{ __('ম্যাপ প্রিন্ট তালিকা') }}</h5>

                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('নং') }}</th>
                                <th>{{ __('স্টাফের নাম') }}</th>
                                <th>{{ __('বিভাগ') }}</th>
                                <th>{{ __('থানা') }}</th>
                                <th>{{ __('মৌজা') }}</th>
                                <th>{{ __('টাইপ') }}</th>
                                <th>{{ __('জে এল নং') }}</th>
                                <th>{{ __('দাগ নং') }}</th>
                                <th>{{ __('সিট নং') }}</th>
                                <th>{{ __('তারিখ ও সময় ') }}</th>

                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $transaction->creator->username }}</td>
                                    <td>{{ $transaction->location->name }}</td>
                                    <td>{{ $transaction->mouza->name }}</td>
                                    <td>{{ $transaction->newmouza?->name }}</td>
                                    <td>{{ $transaction->map_type }}</td>
                                    <td>{{ $transaction->jalno }}</td>
                                    <td>{{ $transaction->dag_no }}</td>
                                    <td>{{ $transaction->sit_no }}</td>
                                    <td>{{ date('d M y - h:i a', strtotime($transaction->created_at)) }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {!! $transactions->links() !!}
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
