@extends('member.layouts.main')
@section('title', 'Lending Break')
@section('container')

    <!--**********************************
                                                          Content body start
                                                                                                                                                                                                                                                                                    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="col-lg-6">
                        @if (session()->has('successMsg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('successMsg') }}
                            </div>
                        @endif
                        @if (session()->has('ErrorMsg'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('ErrorMsg') }}
                            </div>
                        @endif
                        <div class="card ">
                            <div class="card-header">
                                <h4 class="card-title">{{ $lendData['plan'] }} Lending Break Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <input type="hidden" name="rate" id="rate"
                                        value="{{ getDeductionRate('break') }}">
                                    <form action="{{ route('LendingBroken') }}" method="post" class="myForm"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <label class="form-label">Plan</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" value="{{ $lendData['plan'] }}"
                                                readonly>
                                        </div>
                                        <label class="form-label">Invest Amount</label>
                                        <div class="input-group mb-3">
                                            <input name="amount" type="text" class="form-control"
                                                value="{{ $lendData['amount'] }}" readonly id="amount">
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label class="form-label">Break Amount</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="{{ $lendData['amount'] }}"
                                                    name="break_amount" id="break_amount" readonly>
                                            </div>
                                            <small id="brkText" class="text-danger"></small>
                                            <small id="brkText2" class="text-danger"></small>
                                            @error('break_amount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Identity Image</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" placeholder="Enter Amount"
                                                    name="identity_image">
                                            </div>
                                          
                                            @error('identity_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                       
                                        <div class="mb-3">
                                            <label class="form-label">OTP</label>
                                            <div class="input-group flex-nowrap">
                                                <input type="text" class="form-control form-control-md" name="otp"
                                                    placeholder="Enter OTP" required id="prootp" minlength="6"
                                                    maxlength="6">
                                                <a href="{{ url('/member/break-otp-send') }}/{{ $data['memberid'] }}"
                                                    class="input-group-text bg-primary text-white"
                                                    style="text-decoration: none">Send
                                                    OTP</a>
                                            </div>
                                            
                                            
                                            {{-- @if (session()->has('session_brkotp'))
                                                <span class="text-danger text-center">{{ session('session_brkotp') }}</span>
                                            @endif --}}
                                            
                                            @error('otp')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                         <div class="mb-3">
                                            <label class="form-label">Identity Image</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" placeholder="Enter Amount"
                                                    name="identity_image">
                                            </div>
                                            <style>
                                                .pulse-icon {
                                                    box-shadow: 0 0 0 0 rgba(255, 193, 7, 0.5);
                                                    animation: pulse-yellow 2s infinite;
                                                }
                                                @keyframes pulse-yellow {
                                                    0% { box-shadow: 0 0 0 0 rgba(255, 193, 7, 0.5); }
                                                    70% { box-shadow: 0 0 0 8px rgba(255, 193, 7, 0); }
                                                    100% { box-shadow: 0 0 0 0 rgba(255, 193, 7, 0); }
                                                }
                                                .beautiful-alert {
                                                    transition: transform 0.2s ease-in-out;
                                                }
                                                .beautiful-alert:hover {
                                                    transform: translateY(-2px);
                                                }
                                            </style>
                                            <div class="beautiful-alert d-flex align-items-center p-3 mt-3 shadow-sm" style="background: linear-gradient(145deg, rgba(255, 243, 205, 1) 0%, rgba(255, 243, 205, 0.6) 100%); border-left: 4px solid #ffc107; border-radius: 8px;">
                                                <div class="me-3 p-2 rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 pulse-icon" style="background: rgba(255, 193, 7, 0.35); width: 48px; height: 48px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#856404" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                        <polyline points="14 2 14 8 20 8"></polyline>
                                                        <circle cx="12" cy="12" r="2"></circle>
                                                        <path d="M8 18v-1a4 4 0 0 1 8 0v1"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1" style="color: #856404; font-weight: 600; font-size: 0.95rem; margin-top: 0;">Identity Verification</h6>
                                                    <p class="mb-0" style="color: #856404; opacity: 0.85; font-size: 0.85rem; line-height: 1.4;">A selfie of yourself holding your <strong>Proof of Identity</strong> document.</p>
                                                </div>
                                            </div>
                                            @error('identity_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                        <div class="">
                                            <input type="hidden" name="id" class="form-control"
                                                value="{{ $lendData['id'] }}">
                                            @php
                                                $date = date(
                                                    'Y-m-d',
                                                    strtotime($lendData['created_at'] . '+12 months'),
                                                );
                                            @endphp
                                            <div class="pt-4">
                                                <button type="submit"
                                                    class="btn flex-fill btn-danger py-2 fs-5 text-uppercase px-5 mt-2 float-end btn-rounded subBtn">
                                                    Break Lending</button>
                                            </div>
                                        </div>
                                    </form>

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
