@extends('member.layouts.main2')
@section('title', 'Liberfx Wallet')
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
                        <div class="card wallet-details-card"
                            style="background: linear-gradient(135deg, rgba(5, 10, 40, 0.98) 0%, rgba(20, 10, 60, 0.98) 50%, rgba(40, 20, 100, Asc 0.98) 100%); backdrop-filter: blur(30px); border: 1px solid rgba(100, 200, 255, 0.4); box-shadow: 0 35px 70px rgba(0, 100, 255, 0.4), 0 0 0 1px rgba(255,255,255,0.1), Asc inset 0 1px 0 rgba(255,255,255,0.3), inset 0 -1px 0 rgba(0,0,0,0.3); border-radius: 32px; position: relative; overflow: hidden;">
                            <style>
                                .wallet-details-card {
                                    animation: fadeInUp 1.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                                }

                                @keyframes fadeInUp {
                                    from {
                                        opacity: 0;
                                        transform: translateY(40px) scale(0.95);
                                    }

                                    to {
                                        opacity: 1;
                                        transform: translateY(0) scale(1);
                                    }
                                }

                                .wallet-icon {
                                    animation: pulse-glow 3s infinite;
                                    box-shadow: 0 0 30px rgba(99, 102, 241, 0.6);
                                }

                                @keyframes pulse-glow {

                                    0%,
                                    100% {
                                        transform: scale(1);
                                        box-shadow: 0 0 20px rgba(99, 102, 241, 0.4);
                                    }

                                    50% {
                                        transform: scale(1.08);
                                        box-shadow: 0 0 40px rgba(99, 102, 241, 0.8);
                                    }
                                }

                                .stat-item {
                                    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                                    position: relative;
                                }

                                .stat-item:hover {
                                    transform: translateY(-8px) scale(1.02);
                                    box-shadow: 0 20px 40px rgba(0, 100, 255, 0.3);
                                }

                                .stat-circle {
                                    width: 80px;
                                    height: 80px;
                                    border-radius: 50%;
                                    margin: 0 auto 12px;
                                    position: relative;
                                    background: conic-gradient(#00d4ff 0deg 120deg, rgba(0, 212, 255, 0.1) 120deg 360deg);
                                }

                                .stat-circle::after {
                                    content: '';
                                    width: 60px;
                                    height: 60px;
                                    border-radius: 50%;
                                    position: absolute;
                                    top: 10px;
                                    left: 10px;
                                    background: rgba(5, 10, 40, 0.95);
                                }

                                .counter-text {
                                    position: absolute;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    font-weight: bold;
                                    font-size: 1.2rem;
                                    color: #fff;
                                    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.8);
                                    z-index: 2;
                                }

                                .stat-number {
                                    position: absolute;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    font-weight: bold;
                                    color: #fff;
                                    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.8);
                                }

                                .balance-glow {
                                    text-shadow: 0 0 20px currentColor;
                                    animation: shimmer 3s infinite;
                                }

                                @keyframes shimmer {
                                    0% {
                                        text-shadow: 0 0 20px currentColor, 0 0 30px currentColor;
                                    }

                                    50% {
                                        text-shadow: 0 0 30px currentColor, 0 0 40px currentColor;
                                    }

                                    100% {
                                        text-shadow: 0 0 20px currentColor, 0 0 30px currentColor;
                                    }
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
                                        <h3 class="text-white mb-1 fw-bold">Wallet Overview</h3>
                                        <p class="text-muted mb-0">Member ID: {{ $data['memberid'] }}</p>
                                    </div>
                                </div>
                                <div class="row text-center g-4">
                                    <div class="col-lg-3 col-md-6 col-sm-6 stat-item">
                                        <div class="stat-circle"
                                            style="background: conic-gradient(from 0deg, #ffd700 0deg 360deg, transparent 360deg);">
                                            <span class="counter counter-text"
                                                data-target="{{ allWalletBalance($data['memberid']) }}">0</span>
                                        </div>
                                        <h6 class="text-white-50 small mb-0">Total Balance</h6>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 stat-item">
                                        <div class="stat-circle"
                                            style="background: conic-gradient(#00d4ff 0deg 40%, rgba(0,212,255,0.2) 40deg 360deg);">
                                            <svg class="stat-number" width="50" height="50" viewBox="0 0 24 24"
                                                fill="#00d4ff">
                                                <path
                                                    d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                                            </svg>
                                            <span class="counter counter-text"
                                                data-target="{{ $data['exng_wallet'] }}">0</span>
                                        </div>
                                        <h6 class="text-info small mb-0 balance-glow">Trading Wallet</h6>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 stat-item">
                                        <div class="stat-circle"
                                            style="background: conic-gradient(#00ff88 0deg 30%, rgba(0,255,136,0.2) 30deg 360deg);">
                                            <svg class="stat-number" width="45" height="45" viewBox="0 0 24 24"
                                                fill="#00ff88">
                                                <path d="M9 16.17L4.17 11.17l1.41-1.41L9 12.35l7.59-7.59L19 8l Asc" />
                                            </svg>
                                            <span class="counter counter-text"
                                                data-target="{{ $data['course_wallet'] }}">0</span>
                                        </div>
                                        <h6 class="text-success small mb-0 balance-glow">Course Wallet</h6>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm Asc stat-item">
                                        <div class="stat-circle"
                                            style="background: conic-gradient(#ffaa00 0deg 30%, rgba(255,170,0,0.2) 30deg 360deg);">
                                            <svg class="stat Asc-number" width="48" height="48" viewBox="0 0 24 24"
                                                fill="#ffaa00">
                                                <path
                                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10 Asc S17.52 2 12 2zm Asc l Asc -5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                            </svg>
                                            <span class="counter counter-text"
                                                data-target="{{ $data['lending_wallet'] }}">0</span>
                                        </div>
                                        <h6 class="text-warning small mb-0 balance-glow">Lending Wallet</h6>
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
                                <style>
                                    .wallet-icon-wrap .icon-btn{
                                        width:84px;
                                        height:84px;
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;
                                        border-radius:50%;
                                        background:rgba(255,255,255,0.03);
                                        border:1px solid rgba(255,255,255,0.06);
                                        position:relative;
                                        padding:0;
                                        box-sizing:border-box;
                                        transition:transform .2s ease,box-shadow .2s ease,background .2s ease;
                                    }
                                    .wallet-icon-wrap .icon-btn::after{
                                        content:'';
                                        position:absolute;
                                        inset:0;
                                        border-radius:50%;
                                        background:radial-gradient(circle at top left, rgba(255,255,255,.35), transparent 35%);
                                        opacity:0;
                                        transition:opacity .2s ease;
                                        pointer-events:none;
                                    }
                                    .wallet-icon-wrap .icon-btn:hover,
                                    .wallet-icon-wrap .icon-btn:focus{
                                        transform:scale(1.08);
                                        box-shadow:0 0 22px rgba(255,255,255,.25);
                                        background:rgba(255,255,255,.08);
                                    }
                                    .wallet-icon-wrap .icon-btn:hover::after,
                                    .wallet-icon-wrap .icon-btn:focus::after,
                                    .wallet-icon-wrap .icon-btn.active::after{
                                        opacity:.85;
                                    }
                                    .wallet-icon-wrap .icon-btn:active{
                                        animation:icon-blink .18s ease;
                                    }
                                    /* center logos exactly even when source images have extra padding */
                                    .wallet-icon-wrap .icon-btn img{
                                        position:absolute;
                                        left:50%;
                                        top:50%;
                                        transform:translate(-50%,-50%);
                                        width:52%;
                                        height:auto;
                                        max-width:52%;
                                        max-height:52%;
                                        object-fit:contain;
                                        display:block;
                                        transition:transform .18s ease,filter .18s ease;
                                        pointer-events:none;
                                    }

                                    @media (max-width:575.98px){
                                        .wallet-icon-wrap .icon-btn img{ width:46%; }
                                    }
                                    /* fine-tune BNB logo centering (adjust for asset padding) */
                                    .wallet-icon-wrap .icon-btn.bnb img{
                                        width:72%;
                                        max-width:72%;
                                        left:50%;
                                        top:50%;
                                        transform:translate(-50%,-50%);
                                    }
                                    @media (max-width:575.98px){
                                        .wallet-icon-wrap .icon-btn.bnb img{ width:60%; }
                                    }
                                    .wallet-icon-wrap .icon-btn.active,
                                    .wallet-icon-wrap .icon-btn.show{
                                        transform:scale(1.05);
                                        box-shadow:0 0 28px rgba(255,255,255,.32);
                                        background:rgba(255,255,255,.12) !important;
                                    }
                                    .wallet-icon-wrap .icon-btn.active img,
                                    .wallet-icon-wrap .icon-btn.show img{
                                        transform:scale(1.02);
                                        filter:drop-shadow(0 0 10px rgba(255,255,255,.2));
                                    }
                                    @keyframes icon-blink{
                                        0%{transform:scale(1.05);opacity:1;}
                                        50%{transform:scale(1.12);opacity:.6;}
                                        100%{transform:scale(1.05);opacity:1;}
                                    }
                                    /* per-token colored rings (outer stroke) */
                                    .wallet-icon-wrap .icon-btn.bnb{ box-shadow: 0 0 0 8px rgba(243,198,35,0.95); }
                                    .wallet-icon-wrap .icon-btn.trx{ box-shadow: 0 0 0 8px rgba(0,0,0,0.85); }
                                    .wallet-icon-wrap .icon-btn.btc{ box-shadow: 0 0 0 8px rgba(247,147,26,0.95); }
                                    .wallet-icon-wrap .icon-btn.usdt{ box-shadow: 0 0 0 8px rgba(39,174,96,0.95); }
                                    .wallet-icon-wrap .icon-btn.bnb:hover,
                                    .wallet-icon-wrap .icon-btn.bnb:focus{ box-shadow: 0 0 18px rgba(243,198,35,0.95); }
                                    .wallet-icon-wrap .icon-btn.trx:hover,
                                    .wallet-icon-wrap .icon-btn.trx:focus{ box-shadow: 0 0 18px rgba(0,0,0,0.7); }
                                    .wallet-icon-wrap .icon-btn.btc:hover,
                                    .wallet-icon-wrap .icon-btn.btc:focus{ box-shadow: 0 0 18px rgba(247,147,26,0.85); }
                                    .wallet-icon-wrap .icon-btn.usdt:hover,
                                    .wallet-icon-wrap .icon-btn.usdt:focus{ box-shadow: 0 0 18px rgba(39,174,96,0.85); }
                                    @media (max-width:575.98px){ .wallet-icon-wrap .icon-btn{width:68px;height:68px} }
                                </style>

                                <div class="row row-cols-2 row-cols-sm-4 g-3 mb-4 wallet-icon-wrap nav nav-pills" role="tablist">
                                    <div class="col text-center">
                                        <a id="navpills-1-tab" href="#navpills-1" class="icon-btn nav-link bnb active text-center d-inline-block"
                                            data-bs-toggle="pill" role="tab" aria-controls="navpills-1" aria-selected="true">
                                            <img src="{{ asset('uassets/currency/BNB.png') }}" alt="usdt">
                                        </a>
                                        <h6 class="mt-2">USDT BEP20</h6>
                                    </div>
                                    <div class="col text-center">
                                        <a id="navpills-2-tab" href="#navpills-2" class="icon-btn nav-link trx text-center d-inline-block"
                                            data-bs-toggle="pill" role="tab" aria-controls="navpills-2" aria-selected="false">
                                            <img src="{{ asset('uassets/currency/TRX.png') }}" alt="tron">
                                        </a>
                                        <h6 class="mt-2">TRON</h6>
                                    </div>
                                    <div class="col text-center">
                                        <a id="navpills-3-tab" href="#navpills-3" class="icon-btn nav-link btc text-center d-inline-block"
                                            data-bs-toggle="pill" role="tab" aria-controls="navpills-3" aria-selected="false">
                                            <img src="{{ asset('uassets/currency/BTC.png') }}" alt="btc">
                                        </a>
                                        <h6 class="mt-2">BTC</h6>
                                    </div>
                                    <div class="col text-center">
                                        <a id="navpills-4-tab" href="#navpills-4" class="icon-btn nav-link usdt text-center d-inline-block"
                                            data-bs-toggle="pill" role="tab" aria-controls="navpills-4" aria-selected="false">
                                            <img src="{{ asset('uassets/currency/USDT.png') }}" alt="usdt trc20">
                                        </a>
                                        <h6 class="mt-2">USDT TRC20</h6>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div id="navpills-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="navpills-1-tab">
                                        {{-- <form action="{{ route('initiate-withdrawal') }}" method="post" class="myForm">
                                            @csrf --}}
                                        <div class="mb-3">
                                            <label class="form-label">Amount</label>
                                            <input type="number" class="form-control " name="amount" id="AmountFirst"
                                                placeholder="Enter Amount" required>
                                            @error('amount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Payment Option</label>
                                            <select class="form-control" name="paymentInFirst" id="paymentInFirst"
                                                required>
                                                <option value="">Select Payment Option</option>
                                                <option value="wallet_address">Wallet Address</option>
                                                {{-- <option value="qr_code">QR Code</option> --}}
                                            </select>
                                            @error('paymentInFirst')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3" style="display: none" id="usdt">
                                            <label class="form-label">USDT BEP20 Wallet Address</label>
                                            <div class="">
                                                <input type="text" class="form-control form-control-sm" name="wallet"
                                                    placeholder="Enter Wallet Address" id="walAddress1" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Wallet Type</label>
                                            <select class="form-control" name="wallet_type" id="wallet_type_first"
                                                required>
                                                <option value="">Select Wallet Type</option>
                                                <option value="Course">Course Wallet - {{ $data['course_wallet'] }}
                                                </option>
                                                <option value="Lending">Lending Wallet - {{ $data['lending_wallet'] }}
                                                </option>
                                                <option value="Trading">Trading Wallet - {{ $data['exng_wallet'] }}
                                                </option>
                                            </select>
                                            @error('wallet_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label class="form-label">Exchange Type</label>
                                            <select class="form-control" name="exng_type" id="exng_type_first" required>
                                                <option value="">Select Exchange Type</option>
                                                <option value="Coinbase">Coinbase</option>
                                                <option value="Binance">Binance</option>
                                                <option value="Kracken">Kracken</option>
                                                <option value="CoinDCX">CoinDCX</option>
                                                <option value="Cryptology">Cryptology</option>
                                                <option value="Gemini">Gemini</option>
                                                <option value="KuCoin">KuCoin</option>
                                                <option value="Salavi Exchange">Salavi Exchange</option>
                                                <option value="Trust wallet">Trust wallet</option>
                                                <option value="Meta mask">Meta mask</option>
                                                <option value="PrimeXBT">PrimeXBT</option>
                                                <option value="UnoCoin">UnoCoin</option>
                                                <option value="Wazirx">Wazirx</option>
                                                <option value="ZebPay">ZebPay</option>
                                                <option value="BitBank">BitBank</option>
                                                <option value="Bitbns">Bitbns</option>
                                            </select>
                                            @error('exng_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <div class="mb-3">
                                            <label class="form-label">Liberfx PIN</label>
                                            <input type="password" class="form-control" name="pin"
                                                placeholder="Enter Liberfx PIN" id="PinFirst" required>
                                            @error('pin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" name="memberid" id="memberid"
                                                value="{{ $data['memberid'] }}">
                                            <input type="hidden" name="requestId" id="requestId"
                                                value="{{ $data['memberid'] . time() }}">
                                            <button class="btn btn-primary btn-rounded  btn-block mt-3 float-end subBtn"
                                                onclick="WithdrawalConfirm1()">Withdrawal
                                                Fund</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalFirst">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            {{-- <span class="material-symbols-outlined"
                                                                    data-bs-dismiss="modal" style="cursor: pointer">
                                                                    arrow_back
                                                                </span> --}}
                                                            <h5 class="modal-title"> Withdrawal</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="text-muted">Conform your withdrawal request</h5>
                                                            <h3>Details</h3>
                                                            <div class="card">
                                                                <div class="card-body p-0" style="border-radius:25px;">
                                                                    <div class="basic-list-group">
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Withdrawal
                                                                                    Type</h6>
                                                                                <h6 class="float-end"
                                                                                    id="with_type_first"></h6>
                                                                            </li>
                                                                            {{-- <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Exchange
                                                                                    Type</h6>
                                                                                <h6 class="float-end" id="exngTypeFirst">

                                                                                </h6>
                                                                            </li> --}}
                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Wallet
                                                                                    Type</h6>
                                                                                <h6 class="float-end"
                                                                                    id="walletTypeFirst">
                                                                                    Lending Wallet
                                                                                </h6>
                                                                            </li>
                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Payment
                                                                                    Option</h6>
                                                                                <h6 class="float-end" id="payOptFirst">

                                                                                </h6>
                                                                            </li>

                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Amount</h6>
                                                                                <h4 class="float-end"><span
                                                                                        id="amountFirst"></span> USDT
                                                                                </h4>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('initiate-withdrawal') }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="memberid"
                                                                    value="{{ $data['memberid'] }}">
                                                                <input type="hidden" name="exng_type"
                                                                    id="exngTypeFirst_input">
                                                                <input type="hidden" name="wallet_type"
                                                                    id="walletTypeFirst_input">
                                                                <input type="hidden" name="paymentInFirst"
                                                                    value="wallet_address">
                                                                <input type="hidden" name="wallet"
                                                                    id="with_addressFirst_input">
                                                                <input type="hidden" name="amount"
                                                                    id="amountFirst_input">
                                                                <input type="hidden" name="pin" id="pinFirst_input">
                                                                <input type="hidden" name="requestId" id="requestId"
                                                                    value="{{ $data['memberid'] . time() }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-rounded btn-block mt-3">Confirm</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- </form> --}}
                                    </div>
                                    <div id="navpills-2" class="tab-pane fade" role="tabpanel" aria-labelledby="navpills-2-tab">
                                        {{-- <form action="{{ route('initiate-withdrawal-trx') }}" method="post"
                                            class="myForm">
                                            @csrf --}}
                                        <div class="mb-3">
                                            <label class="form-label">USDT BEP20 Amount</label>
                                            <input type="number" class="form-control" name="amount" id="usdt1_amount"
                                                placeholder="Enter Amount" required>
                                            @error('amount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">TRON Amount</label>
                                            <input type="text" class="form-control" name="trx_amount" id="trx_amount"
                                                placeholder="TRON Amount" required readonly>
                                            @error('trx_amount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Payment Option</label>
                                            <select class="form-control" name="paymentInSecond" id="paymentInSecond"
                                                required>
                                                <option value="">Select Payment Option</option>
                                                <option value="wallet_address">Wallet Address</option>
                                                {{-- <option value="qr_code">QR Code</option> --}}
                                            </select>
                                            @error('paymentInSecond')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3" style="display: none" id="tron">
                                            <label class="form-label">TRON Wallet Address</label>
                                            <div class="">
                                                <input type="text" class="form-control form-control-sm" name="wallet"
                                                    placeholder="Enter Wallet Address" id="walAddress2">
                                                @error('wallet')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Wallet Type</label>
                                            <select class="form-control" name="wallet_type" id="wallet_type_second"
                                                required>
                                                <option value="">Select Wallet Type</option>
                                                <option value="Course">Course Wallet - {{ $data['course_wallet'] }}
                                                </option>
                                                <option value="Lending">Lending Wallet - {{ $data['lending_wallet'] }}
                                                </option>
                                                <option value="Trading">Trading Wallet - {{ $data['exng_wallet'] }}
                                                </option>
                                            </select>
                                            @error('wallet_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label class="form-label">Exchange Type</label>
                                            <select class="form-control" name="exng_type" id="exng_type_second" required>
                                                <option value="">Select Exchange Type</option>
                                                <option value="Coinbase">Coinbase</option>
                                                <option value="Binance">Binance</option>
                                                <option value="Kracken">Kracken</option>
                                                <option value="CoinDCX">CoinDCX</option>
                                                <option value="Cryptology">Cryptology</option>
                                                <option value="Gemini">Gemini</option>
                                                <option value="KuCoin">KuCoin</option>
                                                <option value="Salavi Exchange">Salavi Exchange</option>
                                                <option value="Trust wallet">Trust wallet</option>
                                                <option value="Meta mask">Meta mask</option>
                                                <option value="PrimeXBT">PrimeXBT</option>
                                                <option value="UnoCoin">UnoCoin</option>
                                                <option value="Wazirx">Wazirx</option>
                                                <option value="ZebPay">ZebPay</option>
                                                <option value="BitBank">BitBank</option>
                                                <option value="Bitbns">Bitbns</option>
                                            </select>
                                            @error('exng_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <div class="mb-3">
                                            <label class="form-label">Liberfx PIN</label>
                                            <input type="password" class="form-control" name="pin"
                                                placeholder="Enter Liberfx PIN" id="PinSecond" required>
                                            @error('pin')
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
                                            <button class="btn btn-primary btn-rounded  btn-block mt-3 float-end subBtn"
                                                onclick="WithdrawalConfirm2()">Withdrawal
                                                Fund</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalSecond">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            {{-- <span class="material-symbols-outlined"
                                                                    data-bs-dismiss="modal" style="cursor: pointer">
                                                                    arrow_back
                                                                </span> --}}
                                                            <h5 class="modal-title"> Withdrawal</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="text-muted">Conform your withdrawal request</h5>
                                                            <h3>Details</h3>
                                                            <div class="card">
                                                                <div class="card-body p-0" style="border-radius:25px;">
                                                                    <div class="basic-list-group">
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Withdrawal
                                                                                    Type</h6>
                                                                                <h6 class="float-end"
                                                                                    id="with_type_second"></h6>
                                                                            </li>
                                                                            {{-- <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Exchange
                                                                                    Type</h6>
                                                                                <h6 class="float-end" id="exngTypeSecond">

                                                                                </h6>
                                                                            </li> --}}
                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Wallet
                                                                                    Type</h6>
                                                                                <h6 class="float-end"
                                                                                    id="walletTypeSecond">
                                                                                    Lending Wallet
                                                                                </h6>
                                                                            </li>
                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Payment
                                                                                    Option</h6>
                                                                                <h6 class="float-end" id="payOptSecond">

                                                                                </h6>
                                                                            </li>

                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Amount</h6>
                                                                                <h4 class="float-end"><span
                                                                                        id="amountSecond"></span> USDT
                                                                                </h4>
                                                                            </li>
                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    TRON
                                                                                    Amount</h6>
                                                                                <h4 class="float-end"><span
                                                                                        id="amountTRC"></span> TRX
                                                                                </h4>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('initiate-withdrawal-trx') }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="memberid"
                                                                    value="{{ $data['memberid'] }}">
                                                                <input type="hidden" name="exng_type"
                                                                    id="exngTypeSecond_input">
                                                                <input type="hidden" name="wallet_type"
                                                                    id="walletTypeSecond_input">
                                                                <input type="hidden" name="paymentInSecond"
                                                                    value="wallet_address">
                                                                <input type="hidden" name="wallet"
                                                                    id="with_addressSecond_input">
                                                                <input type="hidden" name="amount"
                                                                    id="amountSecond_input">
                                                                <input type="hidden" name="trx_amount" id="trx_amount">
                                                                <input type="hidden" name="pin"
                                                                    id="pinSecond_input">
                                                                <input type="hidden" name="requestId" id="requestId"
                                                                    value="{{ $data['memberid'] . time() }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-rounded btn-block mt-3">Confirm</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- </form> --}}
                                    </div>
                                    <div id="navpills-3" class="tab-pane fade" role="tabpanel" aria-labelledby="navpills-3-tab">
                                        {{-- <form action="{{ route('initiate-withdrawal-btc') }}" method="post"
                                            class="myForm">
                                            @csrf --}}
                                        <div class="mb-3">
                                            <label class="form-label">USDT BEP20 Amount</label>
                                            <input type="number" class="form-control" name="amount" id="usdt2_amount"
                                                placeholder="Enter Amount" required>
                                            @error('amount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">BTC Amount</label>
                                            <input type="text" class="form-control" name="btc_amount" id="btc_amount"
                                                placeholder="BTC Amount" required readonly>
                                            @error('btc_amount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Payment Option</label>
                                            <select class="form-control" name="paymentInThird" id="paymentInThird"
                                                required>
                                                <option value="">Select Payment Option</option>
                                                <option value="wallet_address">Wallet Address</option>
                                                {{-- <option value="qr_code">QR Code</option> --}}
                                            </select>
                                            @error('paymentInThird')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3" style="display: none" id="btc">
                                            <label class="form-label">BTC Wallet Address</label>
                                            <div class="">
                                                <input type="text" class="form-control form-control-sm" name="wallet"
                                                    placeholder="Enter Wallet Address" id="walAddress3">
                                                @error('wallet')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Wallet Type</label>
                                            <select class="form-control" name="wallet_type" id="wallet_type_third"
                                                required>
                                                <option value="">Select Wallet Type</option>
                                                <option value="Course">Course Wallet - {{ $data['course_wallet'] }}
                                                </option>
                                                <option value="Lending">Lending Wallet - {{ $data['lending_wallet'] }}
                                                </option>
                                                <option value="Trading">Trading Wallet - {{ $data['exng_wallet'] }}
                                                </option>
                                            </select>
                                            @error('wallet_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label class="form-label">Exchange Type</label>
                                            <select class="form-control" name="exng_type" id="exng_type_third" required>
                                                <option value="">Select Exchange Type</option>
                                                <option value="Coinbase">Coinbase</option>
                                                <option value="Binance">Binance</option>
                                                <option value="Kracken">Kracken</option>
                                                <option value="CoinDCX">CoinDCX</option>
                                                <option value="Cryptology">Cryptology</option>
                                                <option value="Gemini">Gemini</option>
                                                <option value="KuCoin">KuCoin</option>
                                                <option value="Salavi Exchange">Salavi Exchange</option>
                                                <option value="Trust wallet">Trust wallet</option>
                                                <option value="Meta mask">Meta mask</option>
                                                <option value="PrimeXBT">PrimeXBT</option>
                                                <option value="UnoCoin">UnoCoin</option>
                                                <option value="Wazirx">Wazirx</option>
                                                <option value="ZebPay">ZebPay</option>
                                                <option value="BitBank">BitBank</option>
                                                <option value="Bitbns">Bitbns</option>
                                            </select>
                                            @error('exng_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <div class="mb-3">
                                            <label class="form-label">Liberfx PIN</label>
                                            <input type="password" class="form-control" name="pin"
                                                placeholder="Enter Liberfx PIN" id="PinThird" required>
                                            @error('pin')
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
                                            <button class="btn btn-primary btn-rounded  btn-block mt-3 float-end subBtn"
                                                onclick="WithdrawalConfirm3()">Withdrawal
                                                Fund</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalThird">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            {{-- <span class="material-symbols-outlined"
                                                                    data-bs-dismiss="modal" style="cursor: pointer">
                                                                    arrow_back
                                                                </span> --}}
                                                            <h5 class="modal-title"> Withdrawal</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="text-muted">Conform your withdrawal request</h5>
                                                            <h3>Details</h3>
                                                            <div class="card">
                                                                <div class="card-body p-0" style="border-radius:25px;">
                                                                    <div class="basic-list-group">
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Withdrawal
                                                                                    Type</h6>
                                                                                <h6 class="float-end"
                                                                                    id="with_type_third"></h6>
                                                                            </li>
                                                                            {{-- <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Exchange
                                                                                    Type</h6>
                                                                                <h6 class="float-end" id="exngTypeThird">

                                                                                </h6>
                                                                            </li> --}}
                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Wallet
                                                                                    Type</h6>
                                                                                <h6 class="float-end"
                                                                                    id="walletTypeThird">
                                                                                    Lending Wallet
                                                                                </h6>
                                                                            </li>
                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Payment
                                                                                    Option</h6>
                                                                                <h6 class="float-end" id="payOptThird">

                                                                                </h6>
                                                                            </li>

                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Amount</h6>
                                                                                <h4 class="float-end"><span
                                                                                        id="amountThird"></span> USDT
                                                                                </h4>
                                                                            </li>
                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    BTC
                                                                                    Amount</h6>
                                                                                <h4 class="float-end"><span
                                                                                        id="amountBTC"></span> BTC
                                                                                </h4>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('initiate-withdrawal-btc') }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="memberid"
                                                                    value="{{ $data['memberid'] }}">
                                                                <input type="hidden" name="exng_type"
                                                                    id="exngTypeThird_input">
                                                                <input type="hidden" name="wallet_type"
                                                                    id="walletTypeThird_input">
                                                                <input type="hidden" name="paymentInThird"
                                                                    value="wallet_address">
                                                                <input type="hidden" name="wallet"
                                                                    id="with_addressThird_input">
                                                                <input type="hidden" name="amount"
                                                                    id="amountThird_input">
                                                                <input type="hidden" name="btc_amount" id="btc_amount">
                                                                <input type="hidden" name="pin" id="pinThird_input">
                                                                <input type="hidden" name="requestId" id="requestId"
                                                                    value="{{ $data['memberid'] . time() }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-rounded btn-block mt-3">Confirm</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- </form> --}}
                                    </div>
                                    <div id="navpills-4" class="tab-pane fade" role="tabpanel" aria-labelledby="navpills-4-tab">
                                        {{-- <form action="{{ route('initiate-withdrawal-trc20') }}" method="post"
                                            class="myForm">
                                            @csrf --}}
                                        <div class="mb-3">
                                            <label class="form-label">Amount</label>
                                            <input type="number" class="form-control " id="AmountFourth" name="amount"
                                                placeholder="Enter Amount" required>
                                            @error('amount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Payment Option</label>
                                            <select class="form-control" name="paymentInFourth" id="paymentInFourth"
                                                required>
                                                <option value="">Select Payment Option</option>
                                                <option value="wallet_address">Wallet Address</option>
                                                {{-- <option value="qr_code">QR Code</option> --}}
                                            </select>
                                            @error('paymentInFourth')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3" style="display: none" id="trc20">
                                            <label class="form-label">USDT TRC20 Wallet Address</label>
                                            <div class="">
                                                <input type="text" class="form-control form-control-sm" name="wallet"
                                                    placeholder="Enter Wallet Address" id="walAddress4" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Wallet Type</label>
                                            <select class="form-control" name="wallet_type" id="wallet_type_fourth"
                                                required>
                                                <option value="">Select Wallet Type</option>
                                                <option value="Course">Course Wallet - {{ $data['course_wallet'] }}
                                                </option>
                                                <option value="Lending">Lending Wallet - {{ $data['lending_wallet'] }}
                                                </option>
                                                <option value="Trading">Trading Wallet - {{ $data['exng_wallet'] }}
                                                </option>
                                            </select>
                                            @error('wallet_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label class="form-label">Exchange Type</label>
                                            <select class="form-control" name="exng_type" id="exng_type_fourth" required>
                                                <option value="">Select Exchange Type</option>
                                                <option value="Coinbase">Coinbase</option>
                                                <option value="Binance">Binance</option>
                                                <option value="Kracken">Kracken</option>
                                                <option value="CoinDCX">CoinDCX</option>
                                                <option value="Cryptology">Cryptology</option>
                                                <option value="Gemini">Gemini</option>
                                                <option value="KuCoin">KuCoin</option>
                                                <option value="Salavi Exchange">Salavi Exchange</option>
                                                <option value="Trust wallet">Trust wallet</option>
                                                <option value="Meta mask">Meta mask</option>
                                                <option value="PrimeXBT">PrimeXBT</option>
                                                <option value="UnoCoin">UnoCoin</option>
                                                <option value="Wazirx">Wazirx</option>
                                                <option value="ZebPay">ZebPay</option>
                                                <option value="BitBank">BitBank</option>
                                                <option value="Bitbns">Bitbns</option>
                                            </select>
                                            @error('exng_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <div class="mb-3">
                                            <label class="form-label">Liberfx PIN</label>
                                            <input type="password" class="form-control" name="pin"
                                                placeholder="Enter Liberfx PIN" id="PinFourth" required>
                                            @error('pin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" name="memberid" id="memberid"
                                                value="{{ $data['memberid'] }}">
                                            <input type="hidden" name="requestId" id="requestId"
                                                value="{{ $data['memberid'] . time() }}">
                                            <button class="btn btn-primary btn-rounded  btn-block mt-3 float-end subBtn"
                                                onclick="WithdrawalConfirm4()">Withdrawal
                                                Fund</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalFourth">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            {{-- <span class="material-symbols-outlined"
                                                                    data-bs-dismiss="modal" style="cursor: pointer">
                                                                    arrow_back
                                                                </span> --}}
                                                            <h5 class="modal-title"> Withdrawal</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="text-muted">Conform your withdrawal request</h5>
                                                            <h3>Details</h3>
                                                            <div class="card">
                                                                <div class="card-body p-0" style="border-radius:25px;">
                                                                    <div class="basic-list-group">
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Withdrawal
                                                                                    Type</h6>
                                                                                <h6 class="float-end"
                                                                                    id="with_type_fourth"></h6>
                                                                            </li>
                                                                            {{-- <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Exchange
                                                                                    Type</h6>
                                                                                <h6 class="float-end" id="exngTypeFourth">

                                                                                </h6>
                                                                            </li> --}}
                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Wallet
                                                                                    Type</h6>
                                                                                <h6 class="float-end"
                                                                                    id="walletTypeFourth">
                                                                                    Lending Wallet
                                                                                </h6>
                                                                            </li>
                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Payment
                                                                                    Option</h6>
                                                                                <h6 class="float-end" id="payOptFourth">

                                                                                </h6>
                                                                            </li>

                                                                            <li class="list-group-item px-0">
                                                                                <h6 class="float-start text-muted">
                                                                                    Amount</h6>
                                                                                <h4 class="float-end"><span
                                                                                        id="amountFourth"></span> USDT
                                                                                </h4>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('initiate-withdrawal-trc20') }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="memberid"
                                                                    value="{{ $data['memberid'] }}">
                                                                <input type="hidden" name="exng_type"
                                                                    id="exngTypeFourth_input">
                                                                <input type="hidden" name="wallet_type"
                                                                    id="walletTypeFourth_input">
                                                                <input type="hidden" name="paymentInFourth"
                                                                    value="wallet_address">
                                                                <input type="hidden" name="wallet"
                                                                    id="with_addressFourth_input">
                                                                <input type="hidden" name="amount"
                                                                    id="amountFourth_input">
                                                                <input type="hidden" name="pin"
                                                                    id="pinFourth_input">
                                                                <input type="hidden" name="requestId" id="requestId"
                                                                    value="{{ $data['memberid'] . time() }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-rounded btn-block mt-3">Confirm</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- </form> --}}
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
                                <h4 class="card-title">Withdrawal History</h4>
                            </div>
                            <div class="card-body" style="overflow: auto">
                                @php $i = 1;  @endphp
                                @foreach ($wdata as $op_data)
                                    <div class="card">
                                        @if ($op_data['coin'] == 'BTC')
                                            <div class="prot-blog" style="background-color:#09153F">
                                            @elseif ($op_data['coin'] == 'TRON')
                                                <div class="prot-blog" style="background-color:#09153F">
                                                @elseif ($op_data['coin'] == 'USDT TRC20')
                                                    <div class="prot-blog" style="background-color:#09153F">
                                                    @else
                                                        <div class="prot-blog" style="background-color:#09153F">
                                        @endif
                                        <div class="d-flex post justify-content-between align-items-center">
                                            <div class="d-flex align-items-center mb-2">
                                                <h5 class="text-white card-title mb-0 me-3">Coin : </h5>
                                                <span class="badge badge-warning badge-sm">{{ $op_data['coin'] }}</span>
                                            </div>
                                        </div>
                                        <div class="fill">
                                            <p class="mb-1">Request Id :
                                                {{ $op_data['request_id'] }} </p>
                                            <p class="mb-1">Request Date :
                                                {{ date('d M Y', strtotime($op_data['request_date'])) }} </p>
                                        </div>
                                        <h4 class="mb-0">
                                            <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                    width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                    </circle>
                                                </svg>
                                                Wallet Address : {{ $op_data['wallet_address'] }}
                                            </span>
                                        </h4>
                                        <h4 class="mb-0">
                                            <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                    width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                    </circle>
                                                </svg>
                                                Wallet Type : {{ $op_data['wallet_type'] }}
                                            </span>
                                        </h4>
                                        <h4 class="mb-0">
                                            <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                    width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                    </circle>
                                                </svg>
                                                USDT : ${{ number_format($op_data['usdt'], 2) }}
                                            </span>
                                        </h4>
                                        <h4 class="mb-0">
                                            <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                    width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                    </circle>
                                                </svg>
                                                Gross Amount :
                                                ${{ number_format($op_data['gross_amount'], 2) }}
                                            </span>
                                        </h4>
                                        <h4 class="mb-0">
                                            <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                    width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                    </circle>
                                                </svg>
                                                Charges :
                                                ${{ number_format($op_data['service_charge'], 2) }}
                                            </span>
                                        </h4>
                                        <h4 class="mb-0">
                                            <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                    width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                    </circle>
                                                </svg>
                                                Net Amount :
                                                ${{ number_format($op_data['net_amount'], 2) }}
                                            </span>
                                        </h4>
                                        <h4 class="mb-0">
                                            <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                    width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                    </circle>
                                                </svg>
                                                Status :
                                                @if ($op_data['status'] == 'Approved' || $op_data['status'] == 'Paid')
                                                    <span class="badge bg-success p-2">{{ $op_data['status'] }}</span>
                                                @elseif ($op_data['status'] == 'Cancelled')
                                                    <span class="badge bg-danger p-2">{{ $op_data['status'] }}</span>
                                                @else
                                                    <span class="badge bg-primary p-2">{{ $op_data['status'] }}</span>
                                                @endif
                                            </span>
                                        </h4>
                                        @if ($op_data['status'] == 'Approved' || $op_data['status'] == 'Paid')
                                            <h4 class="mb-0">
                                                <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                        width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                        </circle>
                                                    </svg>
                                                    Pay Date : {{ $op_data['payment_date'] }}
                                                </span>
                                            </h4>
                                        @elseif ($op_data['status'] == 'Cancelled')
                                            <h4 class="mb-0">
                                                <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                        width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                        </circle>
                                                    </svg>
                                                    Cancelled Reason : {{ $op_data['reason'] }}
                                                </span>
                                            </h4>
                                        @else
                                        @endif
                                        <div class="shape">
                                            <svg style="height: 160px;width:180px" viewBox="0 0 225 193" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.25"
                                                    d="M33.5363 229H202.479C212.704 229 222.221 224.41 228.611 216.417C235.048 208.362 237.435 197.967 235.156 187.894C226.373 149.176 199.898 118.742 165.333 104.048C174.942 92.9903 180.967 78.7346 180.967 62.9677C180.967 28.2457 152.725 0 118 0C83.2752 0 55.0333 28.2457 55.0333 62.9677C55.0333 78.7346 61.0582 92.9903 70.6672 104.048C36.1021 118.742 9.62733 149.179 0.8441 187.902C-1.43496 197.967 0.951892 208.355 7.38869 216.41C13.7793 224.41 23.3113 229 33.5363 229ZM86.5706 62.9677C86.5706 45.6414 100.676 31.5416 118 31.5416C135.324 31.5416 149.429 45.6414 149.429 62.9677C149.429 80.294 135.324 94.3938 118 94.3938C100.676 94.3938 86.5706 80.294 86.5706 62.9677ZM118 125.935C159.654 125.935 195.18 154.281 204.389 194.863C204.589 195.726 204.265 196.35 203.973 196.727C203.388 197.458 202.71 197.458 202.479 197.458H33.5363C33.3053 197.458 32.6123 197.458 32.0272 196.727C31.7346 196.35 31.4112 195.726 31.6114 194.871C40.82 154.281 76.3456 125.935 118 125.935Z"
                                                    fill="white"></path>
                                            </svg>
                                        </div>
                                    </div>
                            </div>
                            @endforeach
                            {{-- <table id="example" class="display nowrap w-100">
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
                                            <th>Wallet Type</th>
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
                                                <td>{{ $op_data['wallet_type'] }} Wallet</td>
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
                                                    @elseif($op_data['status'] == 'Approved' || $op_data['status'] == 'Paid')
                                                        <span class="btn btn-success p-2">{{ $op_data['status'] }}</span>
                                                    @elseif($op_data['status'] == 'Cancelled')
                                                        <span class="btn btn-danger p-2">{{ $op_data['status'] }}</span>
                                                    @else
                                                        <span class="btn btn-primary p-2">{{ $op_data['status'] }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @php $i++;  @endphp
                                        @endforeach
                                    </tbody>
                                </table> --}}
                        </div>
                    </div>
                </div>
            </div>

         
        </div>
    </div>

    <!--**********************************Content body end***********************************-->
    <!--**********************************Footer start***********************************-->
    <div class="footer style-1">
        <div class="copyright">
            <p>Copyright © {{ config('detailsApp.name') }} <span class="current-year">2024</span></p>
        </div>
    </div>
    <!--**********************************Footer end ***********************************-->
    <!--**********************************Support ticket button start ***********************************-->
    <!--********************************** Support ticket button end***********************************-->
    </div>
    <!--**********************************Main wrapper end***********************************-->

    <!--**********************************Scripts***********************************-->
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

    <!-- code-highlight -->
    <script src="{{ asset('uassets/js/highlight.min.js') }}"></script>

    <script>
        function animateCounters() {
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = parseFloat(counter.getAttribute('data-target'));
                const increment = target / 100;
                let current = 0;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    counter.textContent = current.toLocaleString('en-US', {
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 2
                    });
                }, 30);
            });
        }

        hljs.highlightAll();

        window.addEventListener('load', animateCounters);
    </script>
    <script>
        jQuery(document).ready(function() {
            setTimeout(function() {
                dlabSettingsOptions.version = 'dark';
                new dlabSettings(dlabSettingsOptions);
                setCookie('version', 'dark');
            }, 1500)
        });
    </script>
    <script>
        $(function() {
            $('.myForm').on('submit', function() {
                $('.subBtn').attr('disabled', true);
                $('.subBtn').html('Wait! Processing');
            })

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

            //TRC20 Pay Option
            $('#paymentInFourth').change('select', function() {
                var opt = $(this).val();
                if (opt == 'wallet_address') {
                    $('#trc20').show();
                } else if (opt == 'qr_code') {
                    $('#trc20').hide();
                } else {
                    $('#trc20').hide();
                }
            });
        });

        function WithdrawalConfirm1() {
            var member = $('#memberid').val();
            var amount = $('#AmountFirst').val();
            var payOpt = $('#walAddress1').val();
            var walletType = $('#wallet_type_first').val();
            var exngType = $('#exng_type_first').val();
            var pin = $('#PinFirst').val();

            if (member != '' && amount != '' && payOpt != '' && walletType != '' && exngType != '' && pin != '') {

                $('#modalFirst').modal('show');

                $('#modalFirst #with_type_first').html('USDT BEP20');
                $('#modalFirst #exngTypeFirst').html(exngType);
                $('#modalFirst #walletTypeFirst').html(walletType);
                $('#modalFirst #payOptFirst').html(payOpt);
                $('#modalFirst #amountFirst').html(amount);

                $('#modalFirst #with_type_first_input').val('USDT BEP20');
                $('#modalFirst #exngTypeFirst_input').val(exngType);
                $('#modalFirst #walletTypeFirst_input').val(walletType);
                $('#modalFirst #with_addressFirst_input').val(payOpt);
                $('#modalFirst #amountFirst_input').val(amount);
                $('#modalFirst #pinFirst_input').val(pin);
            }
        }

        function WithdrawalConfirm2() {
            var member = $('#memberid').val();
            var amount = $('#usdt1_amount').val();
            var trxAmount = $('#trx_amount').val();
            var payOpt = $('#walAddress2').val();
            var walletType = $('#wallet_type_second').val();
            var exngType = $('#exng_type_second').val();
            var pin = $('#PinSecond').val();

            if (member != '' && amount != '' && payOpt != '' && walletType != '' && exngType != '' && pin != '') {
                $('#modalSecond').modal('show');

                $('#modalSecond #with_type_second').html('TRON');
                $('#modalSecond #exngTypeSecond').html(exngType);
                $('#modalSecond #walletTypeSecond').html(walletType);
                $('#modalSecond #payOptSecond').html(payOpt);
                $('#modalSecond #amountSecond').html(amount);
                $('#modalSecond #amountTRC').html(trxAmount);

                $('#modalSecond #with_type_second_input').val('TRON');
                $('#modalSecond #exngTypeSecond_input').val(exngType);
                $('#modalSecond #walletTypeSecond_input').val(walletType);
                $('#modalSecond #with_addressSecond_input').val(payOpt);
                $('#modalSecond #amountSecond_input').val(amount);
                $('#modalSecond #pinSecond_input').val(pin);
                $('#modalSecond #trx_amount').val(trxAmount);
            }
        }

        function WithdrawalConfirm3() {
            var member = $('#memberid').val();
            var amount = $('#usdt2_amount').val();
            var btcAmount = $('#btc_amount').val();
            var payOpt = $('#walAddress3').val();
            var walletType = $('#wallet_type_third').val();
            var exngType = $('#exng_type_third').val();
            var pin = $('#PinThird').val();

            if (member != '' && amount != '' && payOpt != '' && walletType != '' && exngType != '' && pin != '') {
                $('#modalThird').modal('show');

                $('#modalThird #with_type_third').html('TRON');
                $('#modalThird #exngTypeThird').html(exngType);
                $('#modalThird #walletTypeThird').html(walletType);
                $('#modalThird #payOptThird').html(payOpt);
                $('#modalThird #amountThird').html(amount);
                $('#modalThird #amountBTC').html(btcAmount);

                $('#modalThird #with_type_third_input').val('TRON');
                $('#modalThird #exngTypeThird_input').val(exngType);
                $('#modalThird #walletTypeThird_input').val(walletType);
                $('#modalThird #with_addressThird_input').val(payOpt);
                $('#modalThird #amountThird_input').val(amount);
                $('#modalThird #pinThird_input').val(pin);
                $('#modalThird #btc_amount').val(btcAmount);
            }
        }

        function WithdrawalConfirm4() {
            var member = $('#memberid').val();
            var amount = $('#AmountFourth').val();
            var payOpt = $('#walAddress4').val();
            var walletType = $('#wallet_type_fourth').val();
            var exngType = $('#exng_type_fourth').val();
            var pin = $('#PinFourth').val();

            if (member != '' && amount != '' && payOpt != '' && walletType != '' && exngType != '' && pin != '') {

                $('#modalFourth').modal('show');

                $('#modalFourth #with_type_fourth').html('USDT TRC20');
                $('#modalFourth #exngTypeFourth').html(exngType);
                $('#modalFourth #walletTypeFourth').html(walletType);
                $('#modalFourth #payOptFourth').html(payOpt);
                $('#modalFourth #amountFourth').html(amount);

                $('#modalFourth #with_type_fourth_input').val('USDT TRC20');
                $('#modalFourth #exngTypeFourth_input').val(exngType);
                $('#modalFourth #walletTypeFourth_input').val(walletType);
                $('#modalFourth #with_addressFourth_input').val(payOpt);
                $('#modalFourth #amountFourth_input').val(amount);
                $('#modalFourth #pinFourth_input').val(pin);
            }
        }
    </script>

    </body>

    </html>
@endsection
