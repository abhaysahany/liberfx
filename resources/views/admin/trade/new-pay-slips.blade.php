@extends('admin.layouts.main')
@section('title', 'New Pay Slips')
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
                                        style="text-decoration: none">New Pay Slips</a></li>
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
                <div class="col-md-12">
                    @if (session()->has('successMsg'))
                        <div class="alert alert-success">{{ session('successMsg') }}</div>
                    @endif
                    <div class="card" style="zoom:90%">
                        <div class="card-header">
                            <h4>{{ 'New Pay Slips' }}</h4>
                        </div>
                        <div class="card-body px-3">
                            <div class="responsive" style="overflow: auto">
                                <table id="basic-datatable" class="table  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Copy ID') }}</th>
                                            <th>{{ __('Member ID') }}</th>
                                            <th>{{ __('Total Profit') }}</th>
                                            <th>{{ __('Amount') }}</th>
                                            <th>{{ __('Pay Slip') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Action') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($payData as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}<br>{{ date('h:i:s', strtotime($list['created_at'])) }}
                                                </td>
                                                <td>{{ $list['cp_trade_id'] }}</td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>${{ $list['total_profit'] }}</td>
                                                <td>$ {{ $list['amount'] }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-warning packView"
                                                        id="{{ $list['id'] }}">View </button>
                                                </td>
                                                <td>
                                                    @if ($list['status'] == 'Requested')
                                                        <span class="btn btn-primary">{{ $list['status'] }}</span>
                                                    @else
                                                        <span class="btn btn-danger">{{ $list['status'] }}</span>
                                                    @endif
                                                </td>
                                                <td><a href="{{ url('/admin/accept-pay-slip') }}/{{ $list['id'] }}"
                                                        class="btn btn-primary">Approved</a>
                                                </td>
                                            </tr>
                                            <tr style="display:none" class="mySec{{ $list['id'] }}">
                                                <td colspan="10">
                                                    <img src="{{ asset('uploads') }}/{{ $list['payment_slip'] }}"
                                                        width="400">
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
