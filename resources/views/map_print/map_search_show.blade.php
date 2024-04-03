@extends('layouts.blank')

@section('content')
    <style type="text/css">
        #myiframe {
            width: 100%;
            height: 400px;
        }
    </style>

    <div class="container">
        <div class="row mt-4">
            <div class="col-lg">
                <div class="card">

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-header">{{ __('ম্যাপের বিবরন') }}</h5>
                            <h5 class="card-header">
                                <a href="{{ route('print_map', $dag->id) }}" id="print-pdf" class="btn btn-primary  mr-2">
                                    <i class='bx bxs-printer'></i> প্রিন্ট করুন
                                </a>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalCenter">
                                    ইমেইল এ পাঠান
                                </button>

                            </h5>
                        </div>

                        <div class="card-body">
                            <div><strong>বিভাগ : </strong>{{ $dag->location->name }} -- <strong>থানা :
                                </strong>{{ $dag->mouza->name }} -- <strong>মৌজা : </strong>{{ $dag->newmouza?->name }} --
                                <strong>জে. এল নং : </strong>{{ $dag->jalno }} --<strong>দাগ
                                    নং</strong>{{ $dag->dag_no }} -- <strong>সিট নং </strong>{{ $dag->sit_no }}
                            </div>




                            <img src="{{ asset('images/maps') . '/' . $dag->map_image }}" alt="">

                            <div id="scroller">
                                <iframe name="myiframe" id="myiframe"
                                    src="{{ asset('images/maps') . '/' . $dag->map_image }}"></iframe>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCenter" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Send PDF in email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="map_send_form" action="{{ route('send_map') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Enter Email" required>
                                <input type="hidden" value="{{ $dag->id }}" name="map_id">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        var printLink = document.getElementById('print-pdf');
        printLink.addEventListener('click', function(e) {
            e.preventDefault();
            var pdfUrl = this.getAttribute('href');
            var printWindow = window.open(pdfUrl);
            printWindow.print();
        });
    </script>
@endpush
