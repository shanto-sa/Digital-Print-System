@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit System Settings</h5>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('system_settings.update') }}">
                        @method('PUT')
                        @csrf

                        <div class="row">


                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="date_format">Date Format</label>

                                <select class="select2 form-select @error('date_format') is-invalid @enderror"
                                    name="date_format" id="date_format">
                                    <option {{ $system_settings->date_format == 'd-m-Y' ? 'selected' : '' }} value="d-m-Y">
                                        dd-mm-YYYY (05-04-2023)
                                    </option>

                                    <option {{ $system_settings->date_format == 'm-d-Y' ? 'selected' : '' }} value="m-d-Y">
                                        mm-dd-YYYY (04-05-2023)
                                    </option>

                                    <option {{ $system_settings->date_format == 'd-M-Y' ? 'selected' : '' }} value="d-M-Y">
                                        dd-MM-YYYY (05-Dec-2023)
                                    </option>
                                    <option {{ $system_settings->date_format == 'M-d-Y' ? 'selected' : '' }} value="M-d-Y">
                                        MM-dd-YYYY (Dec-05-2023)
                                    </option>
                                    <option {{ $system_settings->date_format == 'M d, Y' ? 'selected' : '' }}
                                        value="M d, Y">MM dd, YYYY (Dec 05, 2023)
                                    </option>
                                </select>

                                @error('date_format')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="time_zone">Time Zone</label>

                                <select class="select2 form-select @error('time_zone') is-invalid @enderror"
                                    name="time_zone" id="time_zone">
                                    <option {{ $system_settings->time_zone == 'Pacific/Midway' ? 'selected' : '' }}
                                        value="Pacific/Midway">
                                        (GMT-11:00) Midway Island
                                    </option>
                                    <option {{ $system_settings->time_zone == 'US/Samoa' ? 'selected' : '' }}
                                        value="US/Samoa">(GMT-11:00) Samoa
                                    </option>

                                    <option {{ $system_settings->time_zone == 'Asia/Tbilisi' ? 'selected' : '' }}
                                        value="Asia/Tbilisi">(GMT+04:00) Tbilisi
                                    </option>
                                    <option {{ $system_settings->time_zone == 'Asia/Yerevan' ? 'selected' : '' }}
                                        value="Asia/Yerevan">(GMT+04:00) Yerevan
                                    </option>
                                    <option {{ $system_settings->time_zone == 'Asia/Kabul' ? 'selected' : '' }}
                                        value="Asia/Kabul">(GMT+04:30) Kabul
                                    </option>
                                    <option {{ $system_settings->time_zone == 'Asia/Karachi' ? 'selected' : '' }}
                                        value="Asia/Karachi">(GMT+05:00) Karachi
                                    </option>
                                    <option {{ $system_settings->time_zone == 'Asia/Tashkent' ? 'selected' : '' }}
                                        value="Asia/Tashkent">(GMT+05:00) Tashkent
                                    </option>
                                    <option {{ $system_settings->time_zone == 'Asia/Kolkata' ? 'selected' : '' }}
                                        value="Asia/Kolkata">(GMT+05:30) Kolkata
                                    </option>
                                    <option {{ $system_settings->time_zone == 'Asia/Kathmandu' ? 'selected' : '' }}
                                        value="Asia/Kathmandu">(GMT+05:45) Kathmandu
                                    </option>
                                    <option {{ $system_settings->time_zone == 'Asia/Yekaterinburg' ? 'selected' : '' }}
                                        value="Asia/Yekaterinburg">(GMT+06:00)
                                        Ekaterinburg
                                    </option>
                                    <option {{ $system_settings->time_zone == 'Asia/Almaty' ? 'selected' : '' }}
                                        value="Asia/Almaty">(GMT+06:00) Almaty
                                    </option>
                                    <option {{ $system_settings->time_zone == 'Asia/Dhaka' ? 'selected' : '' }}
                                        value="Asia/Dhaka">(GMT+06:00) Dhaka
                                    </option>
                                    <option {{ $system_settings->time_zone == 'Asia/Novosibirsk' ? 'selected' : '' }}
                                        value="Asia/Novosibirsk">(GMT+07:00) Novosibirsk
                                    </option>
                                    <option {{ $system_settings->time_zone == 'Asia/Bangkok' ? 'selected' : '' }}
                                        value="Asia/Bangkok">(GMT+07:00) Bangkok
                                    </option>
                                    <option {{ $system_settings->time_zone == 'sia/Jakarta' ? 'selected' : '' }}
                                        value="Asia/Jakarta">(GMT+07:00) Jakarta
                                    </option>
                                    <option {{ $system_settings->time_zone == 'Asia/Krasnoyarsk' ? 'selected' : '' }}
                                        value="Asia/Krasnoyarsk">(GMT+08:00) Krasnoyarsk
                                    </option>
                                    <option {{ $system_settings->time_zone == 'Asia/Chongqing' ? 'selected' : '' }}
                                        value="Asia/Chongqing">(GMT+08:00) Chongqing
                                    </option>
                                    <option {{ $system_settings->time_zone == 'Asia/Hong_Kong' ? 'selected' : '' }}
                                        value="Asia/Hong_Kong">(GMT+08:00) Hong Kong
                                    </option>
                                    <option {{ $system_settings->time_zone == 'Asia/Kuala_Lumpur' ? 'selected' : '' }}
                                        value="Asia/Kuala_Lumpur">(GMT+08:00) Kuala
                                        Lumpur
                                    </option>

                                </select>

                                @error('time_zone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="currency_code">Currency Code</label>

                                <select class="select2 form-select @error('currency_code') is-invalid @enderror"
                                    name="currency_code" id="currency_code">
                                    <option {{ $system_settings->currency_code == 'BDT' ? 'selected' : '' }}
                                        value="BDT">
                                        BDT
                                    </option>

                                    <option {{ $system_settings->currency_code == 'USD' ? 'selected' : '' }}
                                        value="USD">USD
                                    </option>
                                    <option {{ $system_settings->currency_code == 'INR' ? 'selected' : '' }}
                                        value="INR">INR
                                    </option>
                                    <option {{ $system_settings->currency_code == 'GBP' ? 'selected' : '' }}
                                        value="GBP">GBP
                                    </option>
                                    <option {{ $system_settings->currency_code == 'JPY' ? 'selected' : '' }}
                                        value="JPY">JPY
                                    </option>
                                </select>

                                @error('currency_code')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="currency_symbol">Currency Symbol</label>

                                <select class="select2 form-select @error('currency_symbol') is-invalid @enderror"
                                    name="currency_symbol" id="currency_symbol">
                                    <option {{ $system_settings->currency_symbol == '৳' ? 'selected' : '' }}
                                        value="৳">TK
                                        &#2547;
                                    </option>

                                    <option {{ $system_settings->currency_symbol == '$' ? 'selected' : '' }}
                                        value="$">USD &#36;
                                    </option>

                                    <option {{ $system_settings->currency_symbol == '₹' ? 'selected' : '' }}
                                        value="₹">Rupee
                                        &#8377;
                                    </option>
                                    <option {{ $system_settings->currency_symbol == '£' ? 'selected' : '' }}
                                        value="£">Pounds
                                        sterling &#163;
                                    </option>
                                    <option {{ $system_settings->currency_symbol == '¥' ? 'selected' : '' }}
                                        value="¥">Japanese yen
                                        &#165;
                                    </option>
                                </select>

                                @error('currency_symbol')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="currency">Currency (Symbol / Code)</label>

                                <select class="select2 form-select @error('currency') is-invalid @enderror" name="currency"
                                    id="currency">
                                    <option {{ $system_settings->currency == 'code' ? 'selected' : '' }} value="code">
                                        Code
                                    </option>
                                    <option {{ $system_settings->currency == 'symbol' ? 'selected' : '' }} value="symbol">
                                        Symbol
                                    </option>
                                </select>

                                @error('currency')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="currency_position">Currency Position</label>

                                <select class="select2 form-select @error('currency_position') is-invalid @enderror"
                                    name="currency_position" id="currency_position">
                                    <option {{ $system_settings->currency_position == 'prefix' ? 'selected' : '' }}
                                        value="prefix">Prefix
                                    </option>
                                    <option {{ $system_settings->currency_position == 'suffix' ? 'selected' : '' }}
                                        value="suffix">Suffix
                                    </option>
                                </select>

                                @error('currency_position')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
