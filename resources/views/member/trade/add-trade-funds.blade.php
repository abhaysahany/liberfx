@extends('member.layouts.main')
@section('title', 'Add Trade Fund')
@section('container')

    <!--**********************************
                                                                    Content body start
                                                                ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-12">
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
                                <h4 class="card-title">Add Trade Fund Form</h4>
                                <p>USDT BEP20</p>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('instantTradeFunds') }}" method="post"
                                        enctype="multipart/form-data">
                                        <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Amount</label>
                                            <input type="number" class="form-control" name="amount" min="0"
                                                placeholder="Enter Your Amount">
                                            @error('amount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Transaction Password</label>
                                            <input type="password" class="form-control"
                                                placeholder="Enter Transaction Password" name="txn_password">
                                            @error('txn_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" name="memberid" value="{{ $data['memberid'] }}">
                                            <button type="submit"
                                                class="btn btn-primary btn-rounded btn-block mt-3 float-end">Import
                                                Funds</button>
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
    <!--**********************************
                                                                    Content body end
                                                                ***********************************-->
@endsection
