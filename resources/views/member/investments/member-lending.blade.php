@extends('member.layouts.main')
@section('title', 'Member Lending')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                Content body start
                                                                                                                                                                                                                            ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="col-12">
                        <input type="hidden" name="rate" id="rate" value="{{ getDeductionRate('lending') }}">
                        @if (session()->has('PassMsg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('PassMsg') }}
                            </div>
                        @endif
                        @if (session()->has('ErrorMsg'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('ErrorMsg') }}
                            </div>
                        @endif
                        <div class="card ">
                            <div class="card-header">
                                <h4 class="card-title">Other Member Lending</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <ul class="nav nav-pills justify-content-center mb-4 light">
                                        <li class=" nav-item">
                                            <a href="#navpills-1" class="nav-link active" data-bs-toggle="tab"
                                                aria-expanded="false">Loyal Plan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#navpills-2" class="nav-link" data-bs-toggle="tab"
                                                aria-expanded="false">Unified Plan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#navpills-3" class="nav-link" data-bs-toggle="tab"
                                                aria-expanded="true">Vasted Plan</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="navpills-1" class="tab-pane active">
                                            <div class="row g-3 px-3 justify-content-between">
                                                <div class="col-xl-6">
                                                    <form action="{{ route('memLoyalLending') }}" method="post"
                                                        class="myForm">
                                                        @csrf
                                                        <label class="form-label">MemberId</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control "
                                                                placeholder="Enter Memberid" name="memberid" id="userid_b">
                                                            @error('memberid')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <small id="memMsg_b"></small><br>
                                                        <div class=" mb-3">
                                                            <label class="form-label " id="memName_b"> Lending
                                                                Amount</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Minimum Amount 100 USDT" name="amount"
                                                                    id="lylamount">
                                                                <button class="btn btn-outline-secondary dropdown-toggle"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">USDT BEP20</button>
                                                                @error('amount')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <span id="lylmsg" class="text-danger"></span>
                                                        </div>
                                                        <label class="form-label">Fund Wallet</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                value="{{ $data['p2p_wallet'] }}" readonly>
                                                        </div>
                                                        <label class="form-label">Transaction Password</label>
                                                        <div class="input-group mb-3">
                                                            <input type="password" class="form-control"
                                                                placeholder="Transaction Password" name="txn_password">
                                                            @error('txn_password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <input type="hidden" class="form-control"
                                                            value="{{ $data['memberid'] }}" name="senderid">
                                                        <input type="hidden" class="form-control csrf"
                                                            value="{{ csrf_token() }}">
                                                        <div class="mb-3">
                                                            <button class="btn btn-primary  btn-block mt-3 float-end subBtn"
                                                                id="lylbtn">Start
                                                                Investment Now</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div id="DZ_W_TimeLine11"
                                                        class="widget-timeline dlab-scroll  px-4 my-4 style-1 height370">
                                                        <ul class="timeline">
                                                            <li>
                                                                <div class="timeline-badge primary"></div>
                                                                <a class="timeline-panel text-muted" href="#">
                                                                    <span>Starting Of Lending</span>
                                                                    <h6 class="mb-0">Loyal Plan (Liberfx Lending)<strong
                                                                            class="text-primary">$100</strong>.</h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge info">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="#">
                                                                    <span>Interest On Investment</span>
                                                                    <h6 class="mb-0">10 % Monthly</h6>

                                                                </a>
                                                            </li>
                                                            {{-- <li>
                                                                <div class="timeline-badge danger">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="#">
                                                                    <span>Increment of Interest</span>
                                                                    <h6 class="mb-0">Every after 6 Months Increment <strong
                                                                            class="text-warning">1.5%</strong></h6>
                                                                </a>
                                                            </li> --}}
                                                            <li>
                                                                <div class="timeline-badge success">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="#">
                                                                    <span>Investment Duration</span>
                                                                    <h6 class="mb-0">Total Investment duration <strong
                                                                            class="text-danger">Unlimited.</strong>
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge warning">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="#">
                                                                    <span>Investment Break</span>
                                                                    <h6 class="mb-0">Any time Investment Break Available
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="navpills-2" class="tab-pane">
                                            <div class="row g-3 px-3 justify-content-between">
                                                <div class="col-xl-6">
                                                    <form action="{{ route('memUnifiedLending') }}" method="post"
                                                        class="myForm">
                                                        @csrf
                                                        <label class="form-label">MemberId</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control "
                                                                placeholder="Enter Memberid" name="memberid"
                                                                id="userid_r">

                                                        </div>
                                                        <small id="memMsg_r"></small><br>
                                                        <div class="mb-3">
                                                            <label class="form-label " id="memName_r"> Lending
                                                                Amount</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Minimum Amount 200 USDT" name="amount"
                                                                    id="ufdamount">
                                                                <button class="btn btn-outline-secondary dropdown-toggle"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">USDT BEP20</button>
                                                                @error('amount')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <span class="text-danger" id="ufdmsg"></span>
                                                        </div>
                                                        <label class="form-label">Fund Wallet</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                value="{{ $data['p2p_wallet'] }}" readonly>
                                                        </div>
                                                        <label class="form-label">Transaction Password</label>
                                                        <div class="input-group mb-3">
                                                            <input type="password" class="form-control"
                                                                name="txn_password" placeholder="Transaction Password">
                                                            @error('amount')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <input type="hidden" class="form-control"
                                                            value="{{ $data['memberid'] }}" name="senderid">
                                                        <div class="mb-3">
                                                            <button
                                                                class="btn btn-primary  btn-block mt-3 float-end subBtn"
                                                                id="ufdbtn">Start
                                                                Investment Now</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div id="DZ_W_TimeLine11"
                                                        class="widget-timeline dlab-scroll  px-4 my-4 style-1 height370">
                                                        <ul class="timeline">
                                                            <li>
                                                                <div class="timeline-badge primary"></div>
                                                                <a class="timeline-panel text-muted" href="#">
                                                                    <span>Starting Of Lending</span>
                                                                    <h6 class="mb-0">Unified Plan (Liberfx
                                                                        Lending)<strong class="text-primary">$200</strong>.
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge info">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="#">
                                                                    <span>Interest On Investment</span>
                                                                    <h6 class="mb-0">10 % Monthly</h6>

                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge danger">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="#">
                                                                    <span>Increment of Interest</span>
                                                                    <h6 class="mb-0">Every after 6 Months Increment
                                                                        <strong class="text-warning">1.5%</strong>
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge success">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="#">
                                                                    <span>Investment Duration</span>
                                                                    <h6 class="mb-0">Total Investment duration <strong
                                                                            class="text-danger">36 Month.</strong>
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge warning">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="#">
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
                                        <div id="navpills-3" class="tab-pane">
                                            <div class="row g-3 px-3 justify-content-between">
                                                <div class="col-xl-6">
                                                    <form action="{{ route('memVastedLending') }}" method="post"
                                                        class="myForm">
                                                        @csrf
                                                        <label class="form-label">MemberId</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control "
                                                                placeholder="Enter Memberid" name="memberid"
                                                                id="userid_t">

                                                        </div>
                                                        <small id="memMsg_t"></small><br>
                                                        <div class="mb-3">
                                                            <label class="form-label  " id="memName_t"> Lending
                                                                Amount</label>
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Minimum Amount 300 USDT" name="amount"
                                                                    id="vstamount">
                                                                <button class="btn btn-outline-secondary dropdown-toggle"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">USDT BEP20</button>
                                                                @error('amount')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <span id="vstmsg" class="text-danger"></span>
                                                        </div>
                                                        <label class="form-label">Fund Wallet</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                value="{{ $data['p2p_wallet'] }}" readonly>
                                                        </div>
                                                        <label class="form-label">Transaction Password</label>
                                                        <div class="input-group mb-3">
                                                            <input type="password" class="form-control"
                                                                placeholder="Transaction Password" name="txn_password">
                                                            @error('txn_password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <input type="hidden" class="form-control"
                                                            value="{{ $data['memberid'] }}" name="senderid">
                                                        <div class="mb-3">
                                                            <button
                                                                class="btn btn-primary  btn-block mt-3 float-end subBtn"
                                                                id="vstbtn">Start
                                                                Investment Now</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div id="DZ_W_TimeLine11"
                                                        class="widget-timeline dlab-scroll  px-4 my-4 style-1 height370">
                                                        <ul class="timeline">
                                                            <li>
                                                                <div class="timeline-badge primary"></div>
                                                                <a class="timeline-panel text-muted" href="#">
                                                                    <span>Starting Of Lending</span>
                                                                    <h6 class="mb-0">Vasted Plan (Liberfx Lending)<strong
                                                                            class="text-primary">$300</strong>.</h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge info">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="#">
                                                                    <span>Interest On Investment</span>
                                                                    <h6 class="mb-0">10 % Monthly</h6>

                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge danger">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="#">
                                                                    <span>Increment of Interest</span>
                                                                    <h6 class="mb-0">Every after 12 Months Increment
                                                                        <strong class="text-warning">3%</strong>
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge success">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="#">
                                                                    <span>Investment Duration</span>
                                                                    <h6 class="mb-0">Total Investment duration <strong
                                                                            class="text-danger">48 Month.</strong>
                                                                    </h6>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <div class="timeline-badge warning">
                                                                </div>
                                                                <a class="timeline-panel text-muted" href="#">
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
    <!--**********************************
                                                                                                                                                                                                                                Content body end
                                                                                                                                                                                                                            ***********************************-->
@endsection
