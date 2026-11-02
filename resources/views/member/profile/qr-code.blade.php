@extends('member.layouts.main')
@section('title', 'QR Code Details')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
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
                <div class="col-xl-6 col-lg-6">
                    <div class="card profile-card card-bx m-b30">
                        <div class="card-header">
                            <h4 class="card-title">QR Code Details</h4>
                        </div>
                        <form class="profile-form" action="{{ route('qrCodeData') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div>
                                        <div class="mb-3">
                                            <label class="form-label">USDT BEP20 Wallet Address</label>
                                            <input class="form-control" type="text" name="usdt_wlt_address"
                                                id="formFile" placeholder="Enter Your USDT BEP20 Wallet Address">
                                            @error('usdt_wlt_address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mb-3">
                                            <label class="form-label">USDT QR Code</label>
                                            <input class="form-control" type="file" name="usdt_qr" id="formFile">
                                            @error('usdt_qr')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mb-3">
                                            <label class="form-label">TRON QR Code</label>
                                            <input class="form-control" type="file" name="tron_qr" id="formFile">
                                            @error('tron_qr')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mb-3">
                                            <label class="form-label">BTC QR Code</label>
                                            <input class="form-control" type="file" name="btc_qr" id="formFile">
                                            @error('btc_qr')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" class="form-control" name="id" value="{{ $data['id'] }}">
                                <button type="submit" class="btn btn-primary text-uppercase px-5">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-md-6 col-xl-4 col-12 text-center">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('uploads/qr_code') }}/{{ $data['usdt_qr'] }}" alt="idfront-img"
                                width="300" height="300">
                            <h4 class="mt-2  fw-bold d-block fs-6 text-center">USDT Image</h4>
                        </div>
                    </div>
                </div>
                <div class=" col-md-6 col-xl-4 col-12 text-center">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('uploads/qr_code') }}/{{ $data['tron_qr'] }}" alt="idback-img"
                                width="300" height="300">
                            <h4 class="mt-2  fw-bold d-block fs-6 text-center">TRON Image</h4>
                        </div>
                    </div>
                </div>
                <div class=" col-md-6 col-xl-4 col-12 text-center">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('uploads/qr_code') }}/{{ $data['btc_qr'] }}" alt="selfie-img"
                                width="300" height="300">
                            <h4 class="mt-2  fw-bold d-block fs-6 text-center">BTC Image</h4>
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
