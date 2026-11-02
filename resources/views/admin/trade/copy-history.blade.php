@extends('admin.layouts.main')
@section('title', 'Copy History')
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
                                        style="text-decoration: none">Copy History</a></li>
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
                            <h4>{{ 'Copy History' }}</h4>
                        </div>
                        <div class="card-body px-3">
                            <div class="responsive" style="overflow: auto">
                                <table id="basic-datatable" class="table  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('Start Date') }}</th>
                                            <th>{{ __('End Date') }}</th>
                                            <th>{{ __('Member ID') }}</th>
                                            <th>{{ __('Brought Forward') }}</th>
                                            <th>{{ __('Total Profit') }}</th>
                                            <th>{{ __('Total Loss') }}</th>
                                            <th>{{ __('Balance ') }}</th>
                                            <th>{{ __('Carry Forward') }}</th>
                                            <th>{{ __('Status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($cpData as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $list['start_date'] }}</td>
                                                <td>{{ $list['end_date'] }}</td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ $list['brought_forward'] }}</td>
                                                <td>$ {{ $list['total_profit'] }}</td>
                                                <td>$ {{ $list['total_loss'] }}</td>
                                                <td>$ {{ $list['balance'] }}</td>
                                                <td>$ {{ $list['carry_forward'] }}</td>
                                                <td>
                                                    @if ($list['status'] == 'Open')
                                                        <span class="btn btn-success">{{ $list['status'] }}</span>
                                                    @else
                                                        <span class="btn btn-danger">{{ $list['status'] }}</span>
                                                    @endif
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
