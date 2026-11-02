@extends('member.layouts.main')
@section('title', 'Lending')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ***********************************-->
    <div class="content-body lending-page">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="col-12">
                        @if (session()->has('successMsg'))
                            <div class="alert alert-success lending-alert text-warning" role="alert">
                                {{ session('successMsg') }}
                            </div>
                        @endif
                        @if (session()->has('failedMsg'))
                            <div class="alert alert-danger lending-alert text-white" role="alert">
                                 {{ session('failedMsg') }}
                            </div>
                        @endif
                        <div class="card lending-main-card lending-shell-card">
                            <div class="card-header lending-header">
                                <div class="lending-heading-wrap">
                                    <h4 class="card-title mb-1">Lending Creation</h4>
                                    <p class="lending-subtitle mb-0">Choose your plan and start a structured monthly return strategy.</p>
                                </div>
                            </div>
                            <div class="card-body lending-body">
                                <div class="basic-form lending-basic-form">
                                    <!--<div class="lending-plan-glance">-->
                                    <!--    <div class="lending-glance-item core">-->
                                    <!--        <span class="label">Core</span>-->
                                    <!--        <strong>$100 Min</strong>-->
                                    <!--    </div>-->
                                    <!--    <div class="lending-glance-item lime">-->
                                    <!--        <span class="label">Lime</span>-->
                                    <!--        <strong>$200 Min</strong>-->
                                    <!--    </div>-->
                                    <!--    <div class="lending-glance-item droid">-->
                                    <!--        <span class="label">Droid</span>-->
                                    <!--        <strong>$300 Min</strong>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="lending-market-strip">-->
                                    <!--    <span class="pill">Capital Protection</span>-->
                                    <!--    <span class="pill">Flexible Plan Switch</span>-->
                                    <!--    <span class="pill">Auto Monthly Payout</span>-->
                                    <!--</div>-->
                                    <ul class="nav nav-pills justify-content-center mb-4 light lending-pills">
                                        <li class=" nav-item">
                                            <a href="#navpills-micro" class="nav-link active lending-plan-link lending-plan-micro" data-bs-toggle="tab"
                                                aria-expanded="true">Micro Plan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#navpills-1" class="nav-link lending-plan-link lending-plan-core" data-bs-toggle="tab"
                                                aria-expanded="false">Core Plan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#navpills-2" class="nav-link lending-plan-link lending-plan-lime" data-bs-toggle="tab"
                                                aria-expanded="false">Lime Plan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#navpills-3" class="nav-link lending-plan-link lending-plan-droid" data-bs-toggle="tab"
                                                aria-expanded="false">Droid Plan</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content lending-tab-content">
                                        <div id="navpills-micro" class="tab-pane active lending-tab-pane lending-micro-pane">
                                            <div class="row g-3 px-3 justify-content-between lending-plan-row">
                                                <div class="col-xl-6 lending-form-col">
                                                    <form action="{{ route('MicroLending') }}" method="post"
                                                        class="myForm lending-form lending-micro-form">
                                                        @csrf
                                                        <div class="mb-3 lending-field">
                                                            <label class="form-label">I want to lend</label>
                                                            <div class="input-group ">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Minimum Amount 50 USDT" name="amount"
                                                                    id="micamount" required>
                                                                <button class="btn btn-outline-primary dropdown-toggle"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">USDT</button>

                                                            </div>
                                                            <span class="text-danger" id="micmsg"></span>
                                                            @error('amount')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <label class="form-label">Fund Wallet</label>
                                                        <div class="input-group mb-3 lending-field">
                                                            <input type="text" class="form-control"
                                                                value="{{ $data['p2p_wallet'] }}" readonly>
                                                        </div>
                                                        <label class="form-label">Liberfx PIN</label>
                                                        <div class="input-group mb-3 lending-field">
                                                            <input type="password" class="form-control"
                                                                placeholder="Liberfx PIN" name="pin" required>

                                                        </div>
                                                        @error('pin')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="mb-3 lending-action-row">
                                                            <input type="hidden" class="form-control"
                                                                value="{{ $data['memberid'] }}" name="memberid">
                                                            <button class="btn btn-primary  btn-block mt-3 float-end subBtn lending-submit-btn lending-micro-btn"
                                                                id="micbtn">Start
                                                                Investment Now</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-xl-5 lending-timeline-col">
                                                    <div id="DZ_W_TimeLine11_micro"
                                                        class="widget-timeline dlab-scroll  px-4 my-4 style-1 height370 lending-timeline lending-micro-timeline">
                                                        <ul class="timeline lending-timeline-list">
                                                            <li>
                                                                <div class="timeline-badge primary"></div>
                                                                <a class="timeline-panel" href="#">
                                                                    <span>Starting Of Lending</span>
                                                                    <h6 class="mb-0">Micro Plan (Liberfx Lending)<strong
                                                                            class="text-primary">$50</strong>.</h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge info">
                                                                </div>
                                                                <a class="timeline-panel" href="#">
                                                                    <span>Interest On Investment</span>
                                                                    <h6 class="mb-0">10 % Monthly (Sunday Profit Closed)</h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge success">
                                                                </div>
                                                                <a class="timeline-panel" href="#">
                                                                    <span>Investment Duration</span>
                                                                    <h6 class="mb-0">Total Investment duration <strong
                                                                            class="text-danger">Unlimited.</strong>
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge warning">
                                                                </div>
                                                                <a class="timeline-panel" href="#">
                                                                    <span>Investment Break</span>
                                                                    <h6 class="mb-0">Lending Break Option - No
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="navpills-1" class="tab-pane lending-tab-pane lending-core-pane">
                                            <!--<div class="lending-pane-banner core">-->
                                            <!--    <span class="name">Core Plan</span>-->
                                            <!--    <span class="meta">10% Monthly Return</span>-->
                                            <!--    <span class="meta">$100 Minimum</span>-->
                                            <!--</div>-->
                                            <div class="row g-3 px-3 justify-content-between lending-plan-row">
                                                <div class="col-xl-6 lending-form-col">
                                                    <form action="{{ route('CoreLending') }}" method="post"
                                                        class="myForm lending-form lending-core-form">
                                                        @csrf
                                                        <div class="mb-3 lending-field">
                                                            <label class="form-label">I want to lend</label>
                                                            <div class="input-group ">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Minimum Amount 100 USDT" name="amount"
                                                                    id="lylamount" required>
                                                                <button class="btn btn-outline-primary dropdown-toggle"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">USDT</button>

                                                            </div>
                                                            <span class="text-danger" id="lylmsg"></span>
                                                            @error('amount')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>


                                                        <label class="form-label">Fund Wallet</label>
                                                        <div class="input-group mb-3 lending-field">
                                                            <input type="text" class="form-control"
                                                                value="{{ $data['p2p_wallet'] }}" readonly>
                                                        </div>
                                                        <label class="form-label">Liberfx PIN</label>
                                                        <div class="input-group mb-3 lending-field">
                                                            <input type="password" class="form-control"
                                                                placeholder="Liberfx PIN" name="pin" required>

                                                        </div>
                                                        @error('pin')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="mb-3 lending-action-row">
                                                            <input type="hidden" class="form-control"
                                                                value="{{ $data['memberid'] }}" name="memberid">
                                                            <button class="btn btn-primary  btn-block mt-3 float-end subBtn lending-submit-btn lending-core-btn"
                                                                id="lylbtn">Start
                                                                Investment Now</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-xl-5 lending-timeline-col">
                                                    <div id="DZ_W_TimeLine11"
                                                        class="widget-timeline dlab-scroll  px-4 my-4 style-1 height370 lending-timeline lending-core-timeline">
                                                        <ul class="timeline lending-timeline-list">
                                                            <li>
                                                                <div class="timeline-badge primary"></div>
                                                                <a class="timeline-panel " href="#">
                                                                    <span>Starting Of Lending</span>
                                                                    <h6 class="mb-0">Core Plan (Liberfx Lending)<strong
                                                                            class="text-primary">$100</strong>.</h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge info">
                                                                </div>
                                                                <a class="timeline-panel" href="#">
                                                                    <span>Interest On Investment</span>
                                                                    <h6 class="mb-0">10 % Monthly</h6>

                                                                </a>
                                                            </li>
                                                            {{-- <li>
                                                                <div class="timeline-badge danger">
                                                                </div>
                                                                <a class="timeline-panel " href="#">
                                                                    <span>Increment of Interest</span>
                                                                    <h6 class="mb-0">Every after 6 Months Increment <strong
                                                                            class="text-warning">1.5%</strong></h6>
                                                                </a>
                                                            </li> --}}
                                                            <li>
                                                                <div class="timeline-badge success">
                                                                </div>
                                                                <a class="timeline-panel " href="#">
                                                                    <span>Investment Duration</span>
                                                                    <h6 class="mb-0">Total Investment duration <strong
                                                                            class="text-danger">Unlimited.</strong>
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge warning">
                                                                </div>
                                                                <a class="timeline-panel " href="#">
                                                                    <span>Investment Break</span>
                                                                    <h6 class="mb-0">Monthly Investment Break Available
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="navpills-2" class="tab-pane lending-tab-pane lending-lime-pane">
                                            <!--<div class="lending-pane-banner lime">-->
                                            <!--    <span class="name">Lime Plan</span>-->
                                            <!--    <span class="meta">10% Monthly Return</span>-->
                                            <!--    <span class="meta">$200 Minimum</span>-->
                                            <!--</div>-->
                                            <div class="row g-3 px-3 justify-content-between lending-plan-row">
                                                <div class="col-xl-6 lending-form-col">
                                                    <form action="{{ route('LimeLending') }}" method="post"
                                                        class="myForm lending-form lending-lime-form">
                                                        @csrf
                                                        <div class="mb-3 lending-field">
                                                            <label class="form-label">I want to lend</label>
                                                            <div class="input-group ">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Minimum Amount 200 USDT" name="amount"
                                                                    id="ufdamount" required>
                                                                <button class="btn btn-outline-primary dropdown-toggle"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">USDT</button>

                                                            </div>
                                                            <span class="text-danger" id="ufdmsg"></span>
                                                            @error('amount')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <label class="form-label">Fund Wallet</label>
                                                        <div class="input-group mb-3 lending-field">
                                                            <input type="text" class="form-control"
                                                                value="{{ $data['p2p_wallet'] }}" readonly>
                                                        </div>
                                                        <label class="form-label">Liberfx PIN</label>
                                                        <div class="input-group mb-3 lending-field">
                                                            <input type="password" class="form-control" name="pin"
                                                                placeholder="Liberfx PIN" required>

                                                        </div>
                                                        @error('pin')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="mb-3 lending-action-row">
                                                            <input type="hidden" class="form-control"
                                                                value="{{ $data['memberid'] }}" name="memberid">
                                                            <button
                                                                class="btn btn-primary  btn-block mt-3 float-end subBtn lending-submit-btn lending-lime-btn"
                                                                id="ufdbtn">Start
                                                                Investment Now</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-xl-5 lending-timeline-col">
                                                    <div id="DZ_W_TimeLine11"
                                                        class="widget-timeline dlab-scroll  px-4 my-4 style-1 height370 lending-timeline lending-lime-timeline">
                                                        <ul class="timeline lending-timeline-list">
                                                            <li>
                                                                <div class="timeline-badge primary"></div>
                                                                <a class="timeline-panel " href="#">
                                                                    <span>Starting Of Lending</span>
                                                                    <h6 class="mb-0">Lime Plan (Liberfx
                                                                        Lending)<strong class="text-primary">$200</strong>.
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge info">
                                                                </div>
                                                                <a class="timeline-panel" href="#">
                                                                    <span>Interest On Investment</span>
                                                                    <h6 class="mb-0">10 % Monthly</h6>

                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge danger">
                                                                </div>
                                                                <a class="timeline-panel" href="#">
                                                                    <span>Increment of Interest</span>
                                                                    <h6 class="mb-0">Every after 6 Months Increment
                                                                        <strong class="text-warning">1.5%</strong>
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge success">
                                                                </div>
                                                                <a class="timeline-panel" href="#">
                                                                    <span>Investment Duration</span>
                                                                    <h6 class="mb-0">Total Investment duration <strong
                                                                            class="text-danger">36 Month.</strong>
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge warning">
                                                                </div>
                                                                <a class="timeline-panel" href="#">
                                                                    <span>Investment Break</span>
                                                                    <h6 class="mb-0">6 Months loacking period
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="navpills-3" class="tab-pane lending-tab-pane lending-droid-pane">
                                            <!--<div class="lending-pane-banner droid">-->
                                            <!--    <span class="name">Droid Plan</span>-->
                                            <!--    <span class="meta">10% Monthly Return</span>-->
                                            <!--    <span class="meta">$300 Minimum</span>-->
                                            <!--</div>-->
                                            <div class="row g-3 px-3 justify-content-between lending-plan-row">
                                                <div class="col-xl-6 lending-form-col">
                                                    <form action="{{ route('DroidLending') }}" method="post"
                                                        class="myForm lending-form lending-droid-form">
                                                        @csrf
                                                        <div class="mb-3 lending-field">
                                                            <label class="form-label">I want to lend</label>
                                                            <div class="input-group ">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Minimum Amount 300 USDT" name="amount"
                                                                    id="vstamount" required>
                                                                <button class="btn btn-outline-primary dropdown-toggle"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">USDT</button>

                                                            </div>
                                                            <span class="text-danger" id="vstmsg"></span>
                                                            @error('amount')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <label class="form-label">Fund Wallet</label>
                                                        <div class="input-group mb-3 lending-field">
                                                            <input type="text" class="form-control"
                                                                value="{{ $data['p2p_wallet'] }}" readonly>
                                                        </div>
                                                        <label class="form-label">Liberfx PIN</label>
                                                        <div class="input-group mb-3 lending-field">
                                                            <input type="password" class="form-control"
                                                                placeholder="Liberfx PIN" name="pin" required>

                                                        </div>
                                                        @error('pin')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="mb-3 lending-action-row">
                                                            <input type="hidden" class="form-control"
                                                                value="{{ $data['memberid'] }}" name="memberid">
                                                            <button
                                                                class="btn btn-primary  btn-block mt-3 float-end subBtn lending-submit-btn lending-droid-btn"
                                                                id="vstbtn">Start
                                                                Investment Now</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-xl-5 lending-timeline-col">
                                                    <div id="DZ_W_TimeLine11"
                                                        class="widget-timeline dlab-scroll  px-4 my-4 style-1 height370 lending-timeline lending-droid-timeline">
                                                        <ul class="timeline lending-timeline-list">
                                                            <li>
                                                                <div class="timeline-badge primary"></div>
                                                                <a class="timeline-panel" href="#">
                                                                    <span>Starting Of Lending</span>
                                                                    <h6 class="mb-0">Droid Plan (Liberfx Lending)<strong
                                                                            class="text-primary">$300</strong>.</h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge info">
                                                                </div>
                                                                <a class="timeline-panel" href="#">
                                                                    <span>Interest On Investment</span>
                                                                    <h6 class="mb-0">10 % Monthly</h6>

                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge danger">
                                                                </div>
                                                                <a class="timeline-panel" href="#">
                                                                    <span>Increment of Interest</span>
                                                                    <h6 class="mb-0">Every after 12 Months Increment
                                                                        <strong class="text-warning">3%</strong>
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge success">
                                                                </div>
                                                                <a class="timeline-panel" href="#">
                                                                    <span>Investment Duration</span>
                                                                    <h6 class="mb-0">Total Investment duration <strong
                                                                            class="text-danger">48 Month.</strong>
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge warning">
                                                                </div>
                                                                <a class="timeline-panel" href="#">
                                                                    <span>Investment Break</span>
                                                                    <h6 class="mb-0">12 Months loacking period
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--********************************** Content body end ***********************************-->
@endsection
