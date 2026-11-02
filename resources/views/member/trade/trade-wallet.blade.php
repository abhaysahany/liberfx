@extends('member.layouts.main2')
@section('title', 'Trade Wallet')
@section('container')

    <!--**********************************
                                        Content body start
                                    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row pb-3">
                {{-- <div class="col-12"> --}}
                <div class="col-xl-5 col-lg-5 col-sm-5">
                    <div class="col-xl-12">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="profile-photo">
                                        <img src="{{ asset('mem_assets/wallet-2.png') }}" width="100" class="img-fluid"
                                            alt="">
                                    </div>
                                    <h3 class="mt-4 mb-1">Trade Wallet </h3>
                                    <a class="btn btn-outline-primary btn-rounded mt-3 px-5"
                                        href="javascript:void(0);;">Balance : ${{ $data['trade_wallet'] }}</a>
                                </div>
                            </div>

                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-6 pt-3 pb-3 border-end">
                                        <h3 class="mb-1">$ {{ totalWithdrawalsType($data['memberid'], 'Trade') }}</h3>
                                        <span>Total Withdrawal</span>
                                    </div>
                                    <div class="col-6 pt-3 pb-3 ">
                                        <h3 class="mb-1">$ {{ todayWithdrawalsType($data['memberid'], 'Trade') }}</h3>
                                        <span>Today Withdrawal</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 mb-3">
                    @if (session()->has('successMsg'))
                        <div class="alert alert-success " role="alert">
                            <strong>Congratulations! </strong> {{ session('successMsg') }}
                        </div>
                    @endif
                    @if (session()->has('failedMsg'))
                        <div class="alert alert-danger " role="alert">
                            <strong>Watchout! </strong> {{ session('failedMsg') }}
                        </div>
                    @endif
                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-title">Withdrawal Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <ul class="nav nav-pills mb-4 light">
                                    <li class=" nav-item">
                                        <a href="#navpills-1" class="nav-link active" data-bs-toggle="tab"
                                            aria-expanded="false">USDT BEP20</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#navpills-2" class="nav-link" data-bs-toggle="tab"
                                            aria-expanded="false">Tron</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#navpills-3" class="nav-link" data-bs-toggle="tab"
                                            aria-expanded="true">BTC</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="navpills-1" class="tab-pane active">
                                        <form action="{{ route('initiate-withdrawal-trade') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Amount</label>
                                                <input type="text" class="form-control " name="amount"
                                                    placeholder="Enter Amount" required>
                                                @error('amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Payment Option</label>
                                                <select class="form-control" name="paymentInFirst" id="paymentInFirst">
                                                    <option value="">Select Payment Option</option>
                                                    <option value="wallet_address">Wallet Address</option>
                                                    <option value="qr_code">QR Code</option>
                                                </select>
                                                @error('paymentInFirst')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3" style="display: none" id="usdt">
                                                <label class="form-label">USDT BEP20 Wallet Address</label>
                                                <div class="">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="wallet" placeholder="Enter Wallet Address">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Transaction Password</label>
                                                <input type="password" class="form-control" name="transaction_password"
                                                    placeholder="Enter Trancaction Password" required>
                                                @error('transaction_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" name="memberid" id="memberid"
                                                    value="{{ $data['memberid'] }}">
                                                <input type="hidden" name="requestId" id="requestId"
                                                    value="{{ $data['memberid'] . time() }}">
                                                <button
                                                    class="btn btn-primary btn-rounded  btn-block mt-3 float-end">Withdrawal
                                                    Fund</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="navpills-2" class="tab-pane">
                                        <form action="{{ route('initiate-withdrawal-trx-trade') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">USDT BEP20 Amount</label>
                                                <input type="text" class="form-control" name="amount"
                                                    id="usdt1_amount" placeholder="Enter Amount" required>
                                                @error('amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">TRON Amount</label>
                                                <input type="text" class="form-control" name="trx_amount"
                                                    id="trx_amount" placeholder="TRON Amount" required>
                                                @error('trx_amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Payment Option</label>
                                                <select class="form-control" name="paymentInSecond" id="paymentInSecond">
                                                    <option value="">Select Payment Option</option>
                                                    <option value="wallet_address">Wallet Address</option>
                                                    <option value="qr_code">QR Code</option>
                                                </select>
                                                @error('paymentInSecond')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3" style="display: none" id="tron">
                                                <label class="form-label">TRON Wallet Address</label>
                                                <div class="">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="wallet" placeholder="Enter Wallet Address">
                                                    @error('wallet')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Transaction Password</label>
                                                <input type="password" class="form-control" name="transaction_password"
                                                    placeholder="Enter Trancaction Password" required>
                                                @error('transaction_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" name="tron" id="tron_current"
                                                    value="{{ $coindata['tron'] }}">
                                                <input type="hidden" name="memberid" id="memberid"
                                                    value="{{ $data['memberid'] }}">
                                                <input type="hidden" name="requestId" id="requestId"
                                                    value="{{ $data['memberid'] . time() }}">
                                                <button
                                                    class="btn btn-primary btn-rounded  btn-block mt-3 float-end">Withdrawal
                                                    Fund</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="navpills-3" class="tab-pane">
                                        <form action="{{ route('initiate-withdrawal-btc-trade') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">USDT BEP20 Amount</label>
                                                <input type="text" class="form-control" name="amount"
                                                    id="usdt2_amount" placeholder="Enter Amount" required>
                                                @error('amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">BTC Amount</label>
                                                <input type="text" class="form-control" name="btc_amount"
                                                    id="btc_amount" placeholder="Enter BTC Amount" required>
                                                @error('btc_amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Payment Option</label>
                                                <select class="form-control" name="paymentInThird" id="paymentInThird">
                                                    <option value="">Select Payment Option</option>
                                                    <option value="wallet_address">Wallet Address</option>
                                                    <option value="qr_code">QR Code</option>
                                                </select>
                                                @error('paymentInThird')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3" style="display: none" id="btc">
                                                <label class="form-label">BTC Wallet Address</label>
                                                <div class="">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="wallet" placeholder="Enter Wallet Address">
                                                    @error('wallet')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Transaction Password</label>
                                                <input type="password" class="form-control" name="transaction_password"
                                                    placeholder="Enter Trancaction Password" required>
                                                @error('transaction_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" name="btc" id="btc_current"
                                                    value="{{ $coindata['btc'] }}">
                                                <input type="hidden" name="memberid" id="memberid"
                                                    value="{{ $data['memberid'] }}">
                                                <input type="hidden" name="requestId" id="requestId"
                                                    value="{{ $data['memberid'] . time() }}">
                                                <button
                                                    class="btn btn-primary btn-rounded  btn-block mt-3 float-end">Withdrawal
                                                    Fund</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            </div>
            <div class="row pt-3">
                <div class="col-12 pt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Trade Withdrawal History</h4>
                            </div>
                            <div class="card-body" style="overflow: auto">
                                <table id="example" class="display nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Request Date</th>
                                            <th>Request Id</th>
                                            <th>Pay Coin</th>
                                            <th>Wallet Address / QR Code</th>
                                            <th>Usdt Amount</th>
                                            <th>Gross Amount</th>
                                            <th>Service</th>
                                            <th>Net Amount</th>
                                            <th>Reason</th>
                                            <th>Payment Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($wdata as $op_data)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($op_data['created_at'])) }}<br>{{ date('H:i:s', strtotime($op_data['created_at'])) }}
                                                </td>
                                                <td>{{ $op_data['request_id'] }}</td>
                                                <td>{{ $op_data['coin'] }}</td>
                                                @if ($op_data['payment_option'] == 'wallet_address')
                                                    <td>{{ $op_data['wallet_address'] }}</td>
                                                @elseif ($op_data['payment_option'] == 'qr_code')
                                                    <td class="text-primary"><a
                                                            href="{{ asset('uploads/qr_code/') }}/{{ $op_data['qr_image'] }}">View
                                                            Image</a></td>
                                                @else
                                                    <td>--</td>
                                                @endif
                                                <td>{{ $op_data['usdt'] }}</td>
                                                <td>{{ $op_data['gross_amount'] }}</td>
                                                <td>{{ $op_data['service_charge'] }}</td>
                                                <td>{{ $op_data['net_amount'] }}</td>
                                                <td class="text-center">
                                                    @if ($op_data['reason'] == null)
                                                        <span class="text-center">--</span>
                                                    @else
                                                        {{ $op_data['reason'] }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($op_data['payment_date'] == null)
                                                        <span class="text-center">--</span>
                                                    @else
                                                        {{ date('d-m-Y', strtotime($op_data['payment_date'])) }}
                                                        <br>{{ date('H:i:s', strtotime($op_data['payment_date'])) }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($op_data['status'] == 'Pending')
                                                        <span class="btn btn-warning p-2">{{ $op_data['status'] }}</span>
                                                    @elseif($op_data['status'] == 'Approved')
                                                        <span class="btn btn-success p-2">{{ $op_data['status'] }}</span>
                                                    @else
                                                        <span class="btn btn-danger p-2">{{ $op_data['status'] }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
                                        Content body end
                                    ***********************************-->


    <!--**********************************
                                        Footer start
                                    ***********************************-->
    <div class="footer style-1">
        <div class="copyright">
            <p>Copyright © {{ config('detailsApp.name') }} <span class="current-year">2024</span></p>
        </div>
    </div>
    <!--**********************************
                                        Footer end
                                    ***********************************-->

    <!--**********************************
                                       Support ticket button start
                                    ***********************************-->

    <!--**********************************
                                       Support ticket button end
                                    ***********************************-->


    </div>
    <!--**********************************
                                    Main wrapper end
                                ***********************************-->

    <!--**********************************
                                    Scripts
                                ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('uassets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('uassets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('uassets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('uassets/vendor/datatables/responsive/responsive.js') }}"></script>
    <script src="{{ asset('uassets/js/plugins-init/datatables.init.js') }}"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('uassets/js/custom.min.js') }}"></script>
    <script src="{{ asset('uassets/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('uassets/js/demo.js') }}"></script>
    {{-- <script src="{{asset('uassets/js/styleSwitcher.js')}}"></script> --}}

    <!-- code-highlight -->
    <script src="{{ asset('uassets/js/highlight.min.js') }}"></script>
    <script>
        hljs.highlightAll();
    </script>
    <script>
        jQuery(document).ready(function() {
            setTimeout(function() {
                dlabSettingsOptions.version = 'light';
                new dlabSettings(dlabSettingsOptions);
                setCookie('version', 'light');
            }, 1500)
        });
    </script>
    <script>
        $(function() {
            $('#usdt1_amount').on('input', function() {
                var usdt = $(this).val();
                var tron = $('#tron_current').val();
                if (usdt.length == 0) {
                    $('#trx_amount').val('0');
                } else {
                    var convert = (parseFloat(usdt) / parseFloat(tron)).toFixed(4);
                    $('#trx_amount').val(convert);
                }


            });

            $('#usdt2_amount').on('input', function() {
                var usdt = $(this).val();
                var tron = $('#btc_current').val();
                if (usdt.length == 0) {
                    $('#btc_amount').val('0');
                } else {
                    var convert = (parseFloat(usdt) / parseFloat(tron)).toFixed(4);
                    $('#btc_amount').val(convert);
                }


            });

            // Usdt Paymen Option
            $('#paymentInFirst').change('select', function() {
                var opt = $(this).val();
                if (opt == 'wallet_address') {
                    $('#usdt').show();
                } else if (opt == 'qr_code') {
                    $('#usdt').hide();
                } else {
                    $('#usdt').hide();
                }
            });

            // Tron Paymen Option
            $('#paymentInSecond').change('select', function() {
                var opt = $(this).val();
                if (opt == 'wallet_address') {
                    $('#tron').show();
                } else if (opt == 'qr_code') {
                    $('#tron').hide();
                } else {
                    $('#tron').hide();
                }


            });

            // BTC Paymen Option
            $('#paymentInThird').change('select', function() {
                var opt = $(this).val();
                if (opt == 'wallet_address') {
                    $('#btc').show();
                } else if (opt == 'qr_code') {
                    $('#btc').hide();
                } else {
                    $('#btc').hide();
                }


            });
        })
    </script>
    </body>

    </html>
@endsection
