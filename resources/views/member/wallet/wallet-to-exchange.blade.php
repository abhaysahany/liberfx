@extends('member.layouts.main')
@section('title', 'Wallet To Trading wallet')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row mb-3">
                {{-- <div class="col-12"> --}}
                <div class="col-xl-5 col-lg-5 col-sm-5">
                    <div class="col-xl-12">
                        <div class="card overflow-hidden" style="background-image: url('/uploads/black.jpg')">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="profile-photo">
                                        <img src="{{ asset('mem_assets/wallet-2.png') }}" width="100" class="img-fluid"
                                            alt="">
                                    </div>
                                    <h3 class="mt-4 mb-1 text-white">Main Wallet </h3>
                                    <a class="btn btn-outline-primary btn-rounded mt-3 px-5"
                                        href="javascript:void(0);;">Balance : ${{ $data['wallet'] }}</a>
                                </div>
                            </div>

                            <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-white">$ {{ totalIncome($data['memberid']) }}</h3><span>Total
                                            Income</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3 border-end">
                                        <h3 class="mb-1 text-white">$
                                            {{ number_format(todayWithdrawalsType($data['memberid'], 'Main'), 2) }}
                                        </h3>
                                        <span>Total Withdrawal</span>
                                    </div>
                                    <div class="col-4 pt-3 pb-3">
                                        <h3 class="mb-1 text-white">$
                                            {{ number_format(totalWithdrawalsType($data['memberid'], 'Main'), 2) }}
                                        </h3>
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
                    @if (session()->has('exng_wallet_otp'))
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Wallet to Trading OTP
                                    Verification</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('walletExngOtpVerify') }}" method="post">
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
                                <h4 class="card-title">Wallet to Trading Wallet</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('walletExchangeTransfer') }}" method="post" class="myForm">
                                        <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Amount</label>
                                            <input type="number" class="form-control form-control-sm" min="1"
                                                placeholder="Enter amount to transfer" name="amount" required>
                                            @error('amount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <small id="amountText" class="text-danger"></small>
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
                                                value="{{ $data['exng_wallet'] }}">
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
                        <div class="card mt-5">
                            <div class="card-header">
                                <h4 class="card-title">Wallet To Trading wallet History</h4>
                            </div>
                            <div class="card-body">
                                <table id="responsiveTable" class="display responsive nowrap w-100">
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
                                                <td> <label class="badge bg-warning">{{ $list['balance'] }}</label></td>
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
@endsection
