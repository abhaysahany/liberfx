@extends('member.layouts.main2')
@section('title', 'Automatic Fund')
@section('container')

    <style>
        .add-fund-history-table-wrap {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        #addFundHistoryTable {
            min-width: 760px;
        }

        .fund-instructions-card {
            background: rgba(11, 19, 37, 0.95);
            color: #f8fafc;
        }

        .fund-instructions-card .instruction-list li {
            position: relative;
            padding-left: 28px;
            margin-bottom: 16px;
            color: #d1d5db;
            line-height: 1.7;
        }

        .fund-instructions-card .instruction-list li::before {
            content: '\2022';
            position: absolute;
            left: 0;
            top: 0;
            color: #22c55e;
            font-size: 18px;
            line-height: 1.1;
        }

        .wallet-details {
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.96), rgba(15, 23, 42, 0.8));
        }

        .wallet-copy {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .wallet-copy #companyWalletAddress {
            font-family: 'Roboto Mono', monospace;
            font-size: 0.95rem;
        }

        @media (max-width: 991px) {
            .fund-instructions-card {
                margin-top: 15px;
            }

            .content-body .row.justify-content-center {
                text-align: center;
            }
        }

        @media (max-width: 767px) {
            .fund-instructions-card .wallet-details {
                padding: 18px 14px;
            }

            .fund-instructions-card .instruction-list li {
                padding-left: 24px;
                font-size: 0.95rem;
            }

            .fund-instructions-card .wallet-copy {
                gap: 10px;
            }

            .fund-instructions-card .btn {
                width: 100%;
            }
        }
    </style>

    <!--**********************************
                                                                                                    Content body start
                                                                                                ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row justify-content-center">
                <div class="col-12">
                    @if (session()->has('successMsg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('successMsg') }}
                        </div>
                    @endif
                    @if (session()->has('failedMsg'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('failedMsg') }}
                        </div>
                    @endif
                </div>

                <div class="col-12 col-md-8 col-lg-8 col-xl-7 mb-3 mx-auto">
                    <div class="card shadow-sm rounded-4 border-0">
                        <div class="card-header border-bottom py-3">
                            <h4 class="card-title mb-1">Automatic Fund Form</h4>
                            <p class="text-muted mb-0">USDT BEP20</p>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Member ID</label>
                                    <input type="text" class="form-control" name="memberid" id="memberid"
                                        value="{{ $data['memberid'] }}" readonly>

                                    @error('memberid')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Amount</label>
                                    <input type="number" class="form-control" name="amount" id="amount" min="0"
                                        placeholder="Enter Your Amount" required>
                                    @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" id="route" value="{{ route('addFund') }}">
                                    <button class="btn btn-primary btn-rounded btn-block mt-3 float-end subBtn"
                                        id="depositBtn">Import Funds</button>
                                </div>
                            </div>
                            <p style="margin-top: 6.5rem !important;">Please make sure the amount is correct before
                                submitting. After clicking the button, wait a few moments until you receive confirmation.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4 col-xl-5 mb-3 mx-auto">
                    <div class="card fund-instructions-card shadow-sm rounded-4 border-0">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title mb-1">dApp Deposit Instructions</h4>
                            <p class="text-muted mb-0">Follow these steps to fund your account safely.</p>
                        </div>
                        <div class="card-body">
                            <ul class="instruction-list list-unstyled mb-4">
                                <li>1. Connect your wallet to the dApp and choose BNB Smart Chain.</li>
                                <li>2. Enter the USDT amount you want to deposit.</li>
                                <li>3. Confirm the transaction in your wallet.</li>
                                <li>4. Wait 1-5 minutes for confirmation and balance update.</li>
                                <li>5. If you face any issue, contact support with your txn ID.</li>
                            </ul>

                            <div class="wallet-details p-3 rounded-3"
                                style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <div class="text-muted small">Wallet Type</div>
                                        <div class="fw-semibold">BNB BEP20 / dApp Wallet</div>
                                    </div>
                                    <div>
                                        <div class="text-muted small">Network</div>
                                        <div class="fw-semibold">BNB Smart Chain</div>
                                    </div>
                                </div>

                                <div class="wallet-copy">
                                    <div class="w-100 mb-2">
                                        <div class="text-muted small">Company Wallet Address</div>
                                        <div id="companyWalletAddress" class="text-white fw-medium"
                                            style="word-break: break-all;">
                                            {{ config('detailsApp.company_wallet_address') ?? '0xbC43C269229264827B006e8f1117D07A3E92502a' }}
                                        </div>
                                    </div>
                                    <button id="copyWalletBtn" type="button"
                                        class="btn btn-outline-light btn-sm rounded-pill mt-2">Copy Address</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Fund History</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive add-fund-history-table-wrap">
                                <table id="addFundHistoryTable" class="display nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Date</th>
                                            <th>Order Id</th>
                                            <th>Txn Id</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Mode</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($addfundData as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}</td>
                                                <td>{{ $list['orderid'] }}</td>
                                                <td>{{ $list['txnid'] }}</td>
                                                <td>${{ number_format($list['amount'], 2) }}</td>
                                                <td>{{ $list['type'] }}</td>
                                                <td>{{ $list['mode'] }}</td>
                                                <td><span class="btn btn-success">{{ $list['status'] }}</span></td>
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


    <div class="footer style-1">
        <div class="copyright">
            <p>Copyright ©
                <script>
                    document.write(new Date().getFullYear())
                </script>
                {{ config('detailsApp.name') }}, All Right Reserved
            </p>
        </div>
    </div>

    </div>
    <script src="{{ asset('uassets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('uassets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('uassets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script>
        (function($) {
            'use strict';

            $('#addFundHistoryTable').DataTable({
                autoWidth: false,
                language: {
                    paginate: {
                        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                    }
                }
            });

            document.getElementById('copyWalletBtn')?.addEventListener('click', function() {
                const addressText = document.getElementById('companyWalletAddress').innerText.trim();
                if (!addressText) return;

                navigator.clipboard.writeText(addressText).then(() => {
                    this.classList.remove('btn-outline-light');
                    this.classList.add('btn-success');
                    this.innerText = 'Copied';
                    setTimeout(() => {
                        this.classList.remove('btn-success');
                        this.classList.add('btn-outline-light');
                        this.innerText = 'Copy Address';
                    }, 2000);
                }).catch(() => {
                    alert('Unable to copy address. Please copy it manually.');
                });
            });
        })(jQuery);
    </script>


    <!-- Apex Chart -->
    <script src="{{ asset('uassets/vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('uassets/vendor/chart-js/chart.bundle.min.js') }}"></script>

    <!-- counter -->
    <script src="{{ asset('uassets/vendor/counter/counter.min.js') }}"></script>
    <script src="{{ asset('uassets/vendor/counter/waypoint.min.js') }}"></script>


    <!-- Chart piety plugin files -->
    {{-- <script src="{{asset('uassets/vendor/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('uassets/vendor/swiper/js/swiper-bundle.min.js')}}"></script> --}}
    <script src="{{ asset('uassets/vendor/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('uassets/js/dashboard/trading-market.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/3.0.0-rc.5/web3.min.js"></script>
    <script src="https://unpkg.com/@walletconnect/web3-provider@1.7.1/dist/umd/index.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ethers/5.7.2/ethers.umd.js"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('uassets/js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('uassets/js/custom.min.js') }}"></script>
    <script src="{{ asset('uassets/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('uassets/js/demo.js') }}"></script>
    <script src="{{ asset('uassets/js/main.js') }}"></script>
    <script src="{{ asset('mem_assets/js/blockzz.js') }}"></script>

    <!--**********************************
                                                                                                    Content body end
                                                                                                ***********************************-->
@endsection
