@extends('admin.layouts.main')
@section('title', 'Reward Income')
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
                                        style="text-decoration: none">Reward Income</a></li>
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
                            <h4>{{ __('Reward Income Details') }}</h4>
                        </div>
                        <div class="card-body px-3">
                            <div class="responsive" style="overflow: auto">
                                <table id="basic-datatable" class="table  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Member Id') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Rank') }}</th>
                                            <th>{{ __('Month') }}</th>
                                            <th>{{ __('Amount') }}</th>
                                            <th>{{ __('Pay Date') }}</th>
                                            <th>{{ __('Status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($rewardData as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}<br>{{ date('h:i:s', strtotime($list['created_at'])) }}
                                                </td>
                                                <td>{{ __($list['memberid']) }}</td>
                                                <td>{{ getName($list['memberid']) }}</td>
                                                <td>{{ $list['rank'] }}</td>
                                                <td>{{ $list['month'] }}</td>
                                                <td>$ {{ $list['amount'] }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['pay_date'])) }}</td>
                                                <td>
                                                    @if ($list['status'] == 'Paid')
                                                        <div class="badge badge-pill bg-success p-2">
                                                            {{ __($list['status']) }}
                                                        </div>
                                                    @else
                                                        <div class="badge badge-pill bg-danger p-2">
                                                            {{ __($list['status']) }}
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
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
