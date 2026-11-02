@extends('admin.layouts.main')
@section('title', 'Member Deposit')
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
                                        style="text-decoration: none">Member Deposit</a></li>
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
                            <h4>{{ __('Member Deposit Details') }}</h4>
                        </div>
                        <div class="card-body px-3">
                            <div class="responsive" style="overflow: auto">
                                <table id="basic-datatable" class="table  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Memberid') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Level') }}</th>
                                            <th>{{ __('Amount ') }}</th>
                                            <th>{{ __('Level Id') }}</th>
                                            <th>{{ __('Trade Fee') }}</th>
                                            <th>{{ __('Status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        {{-- @foreach ($data as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}<br>{{ date('h:i:s', strtotime($list['created_at'])) }}
                                                </td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ getName($list['memberid']) }}</td>
                                                <td>{{ $list['level'] }}</td>
                                                <td>$ {{ $list['amount'] }}</td>
                                                <td>{{ $list['level_id'] }}</td>
                                                <td>{{ $list['trade_fee'] }}</td>
                                                <td>
                                                    @if ($list['status'] == 'Unpaid')
                                                        <div class="btn btn-sm  btn-danger">{{ $list['status'] }}</div>
                                                    @elseif ($list['status'] == 'Paid')
                                                        <div class="btn btn-sm btn-success">{{ $list['status'] }}</div>
                                                    @else
                                                        <div class="btn btn-sm btn-warning">{{ $list['status'] }}</div>
                                                    @endif
                                                </td>
                                            </tr>
                                            @php $i++;  @endphp
                                        @endforeach --}}
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
