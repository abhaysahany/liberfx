@extends('member.layouts.main')
@section('title', 'Internal Transfer')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row pb-3">
                {{-- <div class="col-12"> --}}
                <div class="col-xl-5 col-lg-5 col-sm-5">
                    <div class="col-xl-12">
                        <div class="card wallet-details-card"
                            style="background: linear-gradient(135deg, rgba(9, 21, 63, 0.98) 0%, rgba(20, 30, 80, 0.98) 50%, rgba(40, 50, 120, 0.98) 100%); backdrop-filter: blur(30px); border: 1px solid rgba(100, 200, 255, 0.4); box-shadow: 0 35px 70px rgba(9, 21, 63, 0.4), 0 0 0 1px rgba(255,255,255,0.1), inset 0 1px 0 rgba(255,255,255,0.3), inset 0 -1px 0 rgba(0,0,0,0.3); border-radius: 32px; position: relative; overflow: hidden;">
                            <style>
                                .wallet-details-card:hover {
                                    transform: translateY(-8px) scale(1.02);
                                    box-shadow: 0 45px 90px rgba(9, 21, 63, 0.6);
                                }

                                .fund-glow {
                                    animation: shimmer 3s infinite;
                                    text-shadow: 0 0 20px rgba(100, 200, 255, 0.8);
                                }

                                @keyframes shimmer {

                                    0%,
                                    100% {
                                        text-shadow: 0 0 20px rgba(100, 200, 255, 0.6);
                                    }

                                    50% {
                                        text-shadow: 0 0 30px rgba(100, 200, 255, 1);
                                    }
                                }

                                .fund-icon {
                                    box-shadow: 0 0 30px rgba(255, 158, 27, 0.6);
                                    transition: all 0.4s ease;
                                }

                                .fund-icon:hover {
                                    transform: rotate(360deg) scale(1.1);
                                    box-shadow: 0 0 50px rgba(255, 158, 27, 0.9);
                                }
                            </style>
                            <div class="card-body p-5">
                                <div class="row align-items-center mb-4">
                                    <div class="col-auto">
                                        <div class="wallet-icon bg-gradient-primary rounded-circle p-3"
                                            style="background: linear-gradient(45deg, #667eea 0%, #764ba2 100%); width: 70px; height: 70px;">
                                            <img src="{{ asset('mem_assets/wallet-2.png') }}" alt=""
                                                style="width:38px;height:38px">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-white mb-1 fw-bold">Fund Wallet</h3>
                                        <p class="text-muted mb-0">Member ID: {{ $data['memberid'] }}</p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h4 class="fund-glow mb-1" style="font-size: 2.5rem; font-weight: 800; color: #f79e1b;">
                                        ${{ $data['p2p_wallet'] }}</h4>
                                    <p class="text-white-50 mb-3">Available for P2P Transfer</p>
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
                    @if (session()->has('p2p_wallet_otp'))
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Internal Transfer OTP Verification</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('walletP2pOtpVerify') }}" method="post">
                                        <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">OTP</label>
                                            <input type="text" class="form-control form-control-sm" minlength="6"
                                                maxlength="6" placeholder="Enter received OTP" name="otp">
                                            @error('otp')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <small class="text-warning"> Enter One Time Password (OTP) receied on your
                                                registered email</small>
                                        </div>
                                        <div class="mb-3">

                                            <button class="btn btn-primary btn-rounded  btn-block mt-3 float-end">Verify
                                                OTP</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Internal Transfer</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('walletP2pTransfer') }}" method="post" class="myForm">
                                        <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Amount</label>
                                            <input type="number" id="tr_amount" class="form-control form-control-sm"
                                                min="1" placeholder="Enter amount to transfer" name="amount"
                                                required>
                                            @error('amount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <small id="amountText" class="text-danger"></small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Wallet Type</label>
                                            <select class="form-control" name="wallet_type" id="wallet_type" required>
                                                <option value="">Select Wallet Type</option>
                                                <option value="Course">Course Wallet</option>
                                                <option value="Lending">Lending Wallet</option>
                                                {{-- <option value="Trading">Trading Wallet</option> --}}
                                            </select>
                                            @error('wallet_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Liberfx PIN</label>
                                            <input type="password" class="form-control" placeholder="Enter Liberfx PIN"
                                                name="pin" required>
                                            @error('pin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" name="balance" id="balance"
                                                value="{{ $data['wallet'] }}">
                                            <input type="hidden" name="sender" value="{{ $data['memberid'] }}">
                                            <input type="hidden" name="rate" id="rate"
                                                value="{{ getDeductionRate('p2p') }}">
                                            <button class="btn btn-primary btn-rounded  btn-block mt-3 float-end subBtn"
                                                id="transBtn">Transfer
                                                Amount</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                {{-- </div> --}}
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Wallet To Internal History</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table id="example3" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Date</th>
                                                <th width="50%">Particular</th>
                                                <th>Add</th>
                                                <th>Deduct</th>
                                                <th>Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($passdata as $list)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $list['created_at'] }}</td>
                                                    <td>{{ $list['particular'] }}</td>
                                                    <td>{{ $list['debit'] }}</td>
                                                    <td>{{ $list['credit'] }}</td>
                                                    <td> <label class="badge bg-warning">{{ $list['balance'] }}</label>
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
    </div>
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Content body end
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ***********************************-->
@endsection
