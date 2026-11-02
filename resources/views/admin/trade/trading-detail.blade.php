@extends('admin.layouts.main')
@section('title', 'Trade Details')
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
                                        style="text-decoration: none">Trade Details</a></li>
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
                            <h4>{{ __('Trade Details') }}</h4>
                        </div>
                        <div class="card-body px-3">
                            <div class="responsive" style="overflow: auto">
                                <table id="basic-datatable" class="table  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('Datetime') }}</th>
                                            <th>{{ __('Trade ID') }}</th>
                                            <th>{{ __('Pair') }}</th>
                                            <th>{{ __('Volume') }}</th>
                                            <th>{{ __('Buy Amount') }}</th>
                                            <th>{{ __('Sell Amount') }}</th>
                                            <th>{{ __('Profit Loss') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($tdata as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $list['datetime'] }}</td>
                                                <td>{{ $list['trade_id'] }}</td>
                                                <td>{{ $list['pair'] }}</td>
                                                <td>{{ $list['volume'] }}</td>
                                                <td>$ {{ $list['buy_amount'] }}</td>
                                                <td>$ {{ $list['sell_amount'] }}</td>
                                                <td>$ {{ $list['profit_loss'] }}</td>
                                                <td><a href="{{ url('/admin/add-members') }}/{{ $list['trade_id'] }}"
                                                        class="btn btn-primary">Add
                                                        Memebers</a></td>
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
