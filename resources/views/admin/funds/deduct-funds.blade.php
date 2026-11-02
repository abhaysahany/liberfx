@extends('admin.layouts.main')
@section('title', 'Deduct Fund')
@section('container')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active" aria-current="page"><a href="#"
                                        style="text-decoration: none">Deduct Fund</a></li>
                            </ol>
                        </nav>

                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="col-md-6">
                    @if (session()->has('failedMsg'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('failedMsg') }}
                        </div>
                    @endif
                    @if (session()->has('successMsg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('successMsg') }}
                        </div>
                    @endif
                    <div class="card" style="zoom:90%">
                        <div class="card-header">
                            <span class="h4">{{ __('Deduct Fund Form') }}</span>
                        </div>

                        <div class="card-body px-3">
                            <form action="{{ route('deductMemFunds') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Memberid </label>
                                    <input type="text" class="form-control" id="memberid" name="memberid"
                                        placeholder="Enter Memberid">
                                    <span id="memMsg"></span>
                                    @error('memberid')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <select name="wallet_type" id="wallet_type" class="form-control">
                                        <option value="">Select Wallet</option>
                                        <option value="Main">Main Wallet</option>
                                        <option value="Fund">Fund Wallet</option>
                                    </select>
                                </div>
                                @error('wallet_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group mb-3">
                                    <label>Amount </label>
                                    <input type="text" class="form-control" name="amount"
                                        placeholder="Enter amount to deduct">
                                    @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                    <button class="btn btn-primary float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div>
    <!-- container -->

    </div>
    <!-- content -->


@endsection
