@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body" style="padding: 16px">

                    <div class="d-flex gap-3">
                        <div class="d-flex align-items-start">
                            <div class="d-inline bg-label-primary p-2 rounded text-primary">
                                <i class='bx bxs-map'></i>
                            </div>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">{{ __('মোট বিভাগ') }}</small>
                                <h3 class="mb-0">{{ $total_locations }}</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body" style="padding: 16px">
                    <div class="d-flex gap-3">
                        <div class="d-flex align-items-start">
                            <div class="d-inline bg-label-info p-2 rounded text-info">
                                <i class='bx bxs-spreadsheet'></i>
                            </div>
                        </div>

                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">{{ __('মোট থানা') }} </small>
                                <h3 class="mb-0">{{ $total_mouza }}</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body" style="padding: 16px">
                    <div class="d-flex gap-3">
                        <div class="d-flex align-items-start">
                            <div class="d-inline bg-label-info p-2 rounded text-info">
                                <i class='bx bxs-spreadsheet'></i>
                            </div>
                        </div>

                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">{{ __('মোট মৌজা') }} </small>
                                <h3 class="mb-0">{{ $total_mouza }}</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body" style="padding: 16px">
                    <div class="d-flex gap-3">
                        <div class="d-flex align-items-start">
                            <div class="d-inline bg-label-info p-2 rounded text-info">
                                <i class='bx bxs-map-alt'></i>
                            </div>
                        </div>

                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">{{ __('মোট ম্যাপ') }} </small>
                                <h3 class="mb-0">{{ $total_map }}</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body" style="padding: 16px">
                    <div class="d-flex gap-3">
                        <div class="d-flex align-items-start">
                            <div class="d-inline bg-label-info p-2 rounded text-info">
                                <i class='bx bxs-map-alt'></i>
                            </div>
                        </div>

                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">{{ __('আজকের প্রিন্ট ') }} </small>
                                <h3 class="mb-0">{{ $todays_print }}</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body" style="padding: 16px">
                    <div class="d-flex gap-3">
                        <div class="d-flex align-items-start">
                            <div class="d-inline bg-label-info p-2 rounded text-info">
                                <i class='bx bxs-map-alt'></i>
                            </div>
                        </div>

                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">{{ __('চলতি মাসের  প্রিন্ট ') }} </small>
                                <h3 class="mb-0">{{ $this_months_print }}</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--<div class="col-md-2">-->
        <!--    <div class="card mb-2">-->
        <!--        <div class="card-body" style="padding: 16px">-->
        <!--            <div class="d-flex gap-3">-->
        <!--                <div class="d-flex align-items-start">-->
        <!--                    <div class="d-inline bg-label-primary p-2 rounded text-primary">-->
        <!--                        <i class='bx bxs-map-alt'></i>-->
        <!--                    </div>-->
        <!--                </div>-->

        <!--                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">-->
        <!--                    <div class="me-2">-->
        <!--                        <small class="text-muted d-block mb-1">আজকের<small>-->
        <!--                        <h3 class="mb-0">{{ $todays_map_added }}</h3>-->
        <!--                    </div>-->

        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->


        <!--<div class="col-md-2">-->
        <!--    <div class="card mb-3">-->
        <!--        <div class="card-body" style="padding: 16px">-->

        <!--            <div class="d-flex gap-3">-->
        <!--                <div class="d-flex align-items-start">-->
        <!--                    <div class="d-inline bg-label-success p-2 rounded text-success">-->
        <!--                        <i class='bx bxs-user'></i>-->
        <!--                    </div>-->
        <!--                </div>-->

        <!--                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">-->
        <!--                    <div class="me-2">-->
        <!--                        <small class="text-muted d-block mb-1">{{ __('ব্যবহারকারী') }}</small>-->
        <!--                        <h3 class="mb-0">{{ $total_users }}</h3>-->
        <!--                    </div>-->

        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->


        {{--
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body" style="padding: 16px">
                    <div class="d-flex gap-3">
                        <div class="d-flex align-items-start">
                            <div class="d-inline bg-label-success p-2 rounded text-success">
                                <i class='bx bxs-report'></i>
                            </div>
                        </div>

                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">{{ __('আজকের বিক্রি') }} </small>
                                <h2 class="mb-0">{{ $todays_map_sell }}</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
