@extends('member.layouts.main')
@section('title', 'Pay Now')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-xl-7 col-lg-7 mb-3">
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
                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-title">Pay Now Form</h4>
                            {{-- <p>USDT BEP20</p> --}}
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('payCopyPayment') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Total Profit</label>
                                        <input type="number" class="form-control" name="total_profit" min="0"
                                            value="{{ $cpData['total_profit'] }}" readonly>
                                        @error('total_profit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Amount</label>
                                        <input type="number" class="form-control" name="amount" min="0"
                                            value="{{ $cpData['balance'] / 2 }}" readonly>
                                        @error('amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Payment Slip</label>
                                        <input type="file" class="form-control" name="pay_slip">
                                        @error('pay_slip')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Transaction Password</label>
                                        <input type="password" class="form-control" placeholder="Enter Transaction Password"
                                            name="txn_password">
                                        @error('txn_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="hidden" name="memberid" value="{{ $data['memberid'] }}">
                                        <input type="hidden" name="cpId" value="{{ $cpData['id'] }}">
                                        <button class="btn btn-primary btn-rounded btn-block mt-3 float-end">Pay
                                            Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 mb-3">

                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-title">QR Code</h4>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <img src="{{ asset('uassets/images/qr.png') }}" alt=""
                                    style="width: 300px;height:300px">
                                <h6 class="mt-2" style="font-size: 15px">Wallet Address : <br><span
                                        class="text-muted">0xaskjkdjo23ij897y62871tghsb</span></h6>
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
