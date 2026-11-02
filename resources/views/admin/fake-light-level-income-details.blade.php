@extends('admin.layouts.main')
@section('title', 'Fake Light Level Income Details')
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
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}" style="text-decoration: none">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('admin/fake-light-level-income') }}" style="text-decoration: none">Fake Light Level Income Data</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details</li>
                            </ol>
                        </nav>
                    </div>
                    <h4 class="page-title">Fake Light Level Income Details</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-8 mx-auto">
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

                <div class="card" style="zoom:95%">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="m-0">{{ __('Fake Light Level Income Information') }}</h4>
                        <div>
                            <a href="{{ url('admin/fake-light-level-income/edit/' . $data->id) }}" class="btn btn-sm btn-primary">
                                <i class="uil-edit"></i> Edit
                            </a>
                            <a href="{{ url('admin/fake-light-level-income') }}" class="btn btn-sm btn-secondary ms-1">
                                <i class="uil-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width: 35%;">ID</th>
                                        <td>#{{ $data->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Member ID</th>
                                        <td><strong class="text-primary">{{ $data->memberid }}</strong></td>
                                    </tr>
                                    <tr>
                                        <th>Member Name</th>
                                        <td>{{ getName($data->memberid) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Level</th>
                                        <td><span class="badge bg-primary p-1">Level {{ $data->level }}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Installment</th>
                                        <td><span class="badge bg-info p-1">Installment {{ $data->installment }}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Amount</th>
                                        <td><strong class="text-success">${{ number_format($data->amount, 2) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <th>Type</th>
                                        <td><span class="badge bg-secondary p-1">{{ $data->type }}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($data->status == 'Paid')
                                                <span class="badge bg-success p-2">{{ $data->status }}</span>
                                            @else
                                                <span class="badge bg-danger p-2">{{ $data->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <td>{{ !empty($data->created_at) ? date('d-m-Y', strtotime($data->created_at)) : 'N/A' }}</td>
                                    </tr>
                                    <!--<tr>-->
                                    <!--    <th>Last Updated</th>-->
                                    <!--    <td>{{ !empty($data->updated_at) ? date('d-m-Y H:i:s', strtotime($data->updated_at)) : 'N/A' }}</td>-->
                                    <!--</tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
    <!-- container -->
@endsection
