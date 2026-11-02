@extends('admin.layouts.main')
@section('title', 'Break Details')
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
                                        style="text-decoration: none">Break Details</a></li>
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
                            <h4>{{ __('Break Details') }}</h4>
                        </div>
                        <div class="card-body px-3">
                            <div class="responsive" style="overflow: auto">
                                <table id="basic-datatable" class="table  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Investment Date</th>
                                            <th>Member Id</th>
                                            <th>Plan</th>
                                            <th>Investment</th>
                                            <th>Deduction</th>
                                            <th>Break Amount</th>
                                            <th>Break Date</th>
                                            <th>Status</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($breakData as $break_data)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $break_data['investment_date'] }}</td>
                                                <td>{{ $break_data['memberid'] }}</td>
                                                <td>{{ $break_data['lending_type'] }}</td>
                                                <td>$ {{ $break_data['investment'] }}</td>
                                                <td>$ {{ $break_data['deduction'] }}</td>
                                                <td>$ {{ $break_data['break_amount'] }}</td>
                                                <td>{{ $break_data['created_at'] }}</td>
                                                <td>
                                                    @if ($break_data['status'] == 'Approved')
                                                        <div class="btn btn-sm btn-success">{{ __($break_data['status']) }}
                                                        </div>
                                                    @else
                                                        <div class="btn btn-sm btn-danger ">{{ __($break_data['status']) }}
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
