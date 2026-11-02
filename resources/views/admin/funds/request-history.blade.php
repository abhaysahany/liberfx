@extends('admin.layouts.main')
@section('title', 'Request History')
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
                                        style="text-decoration: none">Request History</a></li>
                            </ol>
                        </nav>

                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
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
                        <h4>{{ __('Request History Table') }}</h4>
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
                                        <th>{{ __('Amount') }}</th>
                                        <th>{{ __('USDT Amount') }}</th>
                                        <th>{{ __('Tran Id') }}</th>
                                        <th>{{ __('View') }}</th>
                                        <th>{{ __('Status') }}</th>
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
                                            <td>{{ $list['amount'] }} {{ $list['coin'] }}</td>
                                            <td>$ {{ $list['usdt_amount'] }}</td>
                                            <td>{{ $list['tran_id'] }}</td>

                                            <td>
                                                <button class="btn btn-sm btn-warning packView"
                                                    id="{{ $list['id'] }}">View </button>
                                            </td>
                                            <td>
                                                <div class="btn btn-primary">
                                                    {{ $list['status'] }}
                                                </div>
                                            </td>
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
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div>
    <!-- container -->

    </div>
    <!-- content -->


@endsection
