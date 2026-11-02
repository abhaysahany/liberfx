@extends('admin.layouts.main')
@section('title', 'Cancelled Withdrawal Requests')
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
                                        style="text-decoration: none">Cancelled Withdrawal Requests</a></li>
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
                    @if (session()->has('wMessage'))
                        <div class="alert alert-primary">{{ session('wMessage') }}</div>
                    @endif
                    <div class="card" style="zoom:90%">
                        <div class="card-header">
                            <h4>{{ __('Cancelled Withdrawal Requests') }}</h4>
                        </div>
                        <div class="card-body px-3">
                            <div class="responsive" style="overflow: auto">
                                <table id="basic-datatable" class="table  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('Request Date') }}</th>
                                            <th>{{ __('Member Id') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Wallet Address') }}</th>
                                            <th>{{ __('Coin') }}</th>
                                            <th>{{ __('Gross') }}</th>
                                            <th>{{ __('Charges') }}</th>
                                            <th>{{ __('Net ') }}</th>
                                            <th>{{ __('Wallet ') }}</th>
                                            <th>{{ __('Cancelled On ') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($data as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['request_date'])) }}<br>{{ date('H:i:s', strtotime($list['request_date'])) }}
                                                </td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ $list['name'] }}</td>
                                                <td>{{ $list['wallet_address'] }}</td>
                                                <td>{{ $list['coin'] }}</td>
                                                <td>$ {{ $list['gross_amount'] }}</td>
                                                <td>$ {{ $list['service_charge'] }}</td>
                                                <td>$ {{ $list['net_amount'] }}</td>
                                                <td><b>{{ $list['wallet_type'] }}</b></td>
                                                <td>{{ date('d-m-Y', strtotime($list['updated_at'])) }}</td>

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
