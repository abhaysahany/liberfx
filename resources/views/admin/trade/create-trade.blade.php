@extends('admin.layouts.main')
@section('title', 'Create Trade')
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
                                        style="text-decoration: none">Create Trade</a></li>
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
                    <div class="card" style="zoom:90%">
                        <div class="card-header">
                            <h4>{{ __('Create Trades Form') }}</h4>
                        </div>
                        <div class="card-body px-3">
                            <div class="responsive" style="overflow: auto">
                                <form action="{{ route('insertTrade') }}" method="post">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label>Trade ID</label>
                                        <input type="text" name="trade_id" class="form-control"
                                            placeholder="Enter Trade ID" />
                                        @error('trade_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Date & Time</label>
                                        <input type="datetime-local" name="date_time" class="form-control"
                                            placeholder="Enter Trade ID" />
                                        @error('date_time')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Pair</label>
                                        <input type="text" name="pair" class="form-control"
                                            placeholder="Enter Pair" />
                                        @error('pair')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Volume</label>
                                        <input type="number" name="volume" class="form-control" placeholder="Enter Volume"
                                            step="any" />
                                        @error('volume')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Buy Amount</label>
                                        <input type="number" name="buy_amount" class="form-control"
                                            placeholder="Enter Buy Amount" step="any" />
                                        @error('buy_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Sell Amount</label>
                                        <input type="number" name="sell_amount" class="form-control"
                                            placeholder="Enter Sell Amount" step="any" />
                                        @error('sell_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Profit / Loss</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="Profit">Profit</option>
                                            <option value="Loss">Loss</option>
                                        </select>
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Profit & Loss</label>
                                        <input type="text" name="profit_loss" class="form-control"
                                            placeholder="Enter Proft & Loss" />
                                        @error('profit_loss')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary float-right">Create Trade</button>
                            </div>
                            </form>
                        </div>
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
