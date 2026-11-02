@extends('admin.layouts.main')
@section('title', 'Funds Request')
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
                                        style="text-decoration: none">Funds Request</a></li>
                            </ol>
                        </nav>

                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            @if (session()->has('successMsgCoin'))
                <div class="alert alert-success" role="alert">
                    {{ session('successMsgCoin') }}
                </div>
            @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Funds Request Form') }}</h4>
                    </div>
                    <div class="card-body px-3">
                        <form action="{{ route('refreshCoins') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 position-relative" id="datepicker1">
                                        <label>BTC-USDT</label>
                                        <input type="text" name="btc" class="form-control"
                                            value="{{ $coins['btc'] }}" />
                                        @error('btc')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3 position-relative" id="datepicker4">
                                        <label>TRON USDT</label>
                                        <input type="text" class="form-control" name="tron"
                                            value="{{ $coins['tron'] }}" />
                                        @error('tron')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col text-center">
                                    <button class="btn btn-primary mt-3">Refresh Coins Rate</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="col-md-12">
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
                            <h4>{{ __('Funds Request Table') }}</h4>
                        </div>
                        <div class="card-body px-3">
                            <div class="responsive" style="overflow: auto">
                                <table id="basic-datatable" class="table  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('Memberid') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Time') }}</th>
                                            <th>{{ __('Coin') }}</th>
                                            <th>{{ __('Amount') }}</th>
                                            <th>{{ __('USDT Amount') }}</th>
                                            <th>{{ __('Tran Id') }}</th>
                                            <th>{{ __('Type') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('View') }}</th>
                                            <th colspan="2" class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($data as $list)
                                            <tr>
                                                <td>{{ $i }}</td>

                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ getName($list['memberid']) }}</td>
                                                <td>{{ $list['created_at'] }}</td>
                                                <td>{{ $list['coin'] }}</td>
                                                <td>{{ $list['amount'] }} {{ $list['coin'] }}</td>
                                                <td>{{ $list['usdt_amount'] }}</td>
                                                <td>{{ $list['tran_id'] }}</td>
                                                <td>{{ $list['wallet_type'] }}</td>

                                                <td>
                                                    <div class="btn btn-primary">
                                                        {{ $list['status'] }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-warning packView"
                                                        id="{{ $list['id'] }}">View </button>
                                                </td>
                                                <td><a href="{{ url('admin/accept-request') }}/{{ $list['id'] }}"
                                                        class="btn btn-sm btn-success">Accept</a></td>

                                                <td><a href="{{ url('admin/reject-request') }}/{{ $list['id'] }}"
                                                        class="btn btn-sm btn-danger">Reject</a></td>
                                            </tr>
                                            <tr style="display:none" class="mySec{{ $list['id'] }}">
                                                <td colspan="10">
                                                    <img src="{{ asset('uploads') }}/{{ $list['image'] }}" width="400">
                                                </td>
                                            </tr>
                                            @php $i++;  @endphp
                                        @endforeach
                                    </tbody>
                                </table>
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
