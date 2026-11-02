@extends('admin.layouts.main')
@section('title', 'Fake Lending Details')
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
                                <li class="breadcrumb-item"><a href="{{ url('admin/fake-data') }}">Fake Data</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="#"
                                        style="text-decoration: none">Fake Lending Details</a></li>
                            </ol>
                        </nav>

                    </div>
                    <h4 class="page-title">Fake Lending Details</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
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
                    @if (session()->has('delMsg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('delMsg') }}
                        </div>
                    @endif
                    <div class="card" style="zoom:90%">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="m-0">{{ __('Fake Lending Details Table') }}</h4>
                            <a href="{{ url('admin/fake-data') }}" class="btn btn-sm btn-primary">
                                <i class="uil uil-plus me-1"></i> Add Fake Lending Data
                            </a>
                        </div>
                        <div class="card-body px-3">
                            <div class="responsive" style="overflow: auto">
                                <table id="basic-datatable" class="table nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Member ID</th>
                                            <th>Name</th>
                                            <th>Start Date</th>
                                            <th>Plan</th>
                                            <th>Amount</th>
                                            <th>Total Duration</th>
                                            <th>Interest</th>
                                            <th>Status</th>
                                            <th>B_Status</th>
                                            <th>B_Amount</th>
                                            <th>B_Date</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($data as $list)
                                           <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ getName($list['memberid']) }}</td>
                                                <td>{{ !empty($list['start_date']) ? date('d-m-Y H:i:s', strtotime($list['start_date'] . '-1day')) : 'N/A' }}</td>
                                                <td>{{ $list['plan'] }}</td>
                                                <td>$ {{ $list['amount'] }}</td>
                                                <td>{{ $list['total_duration'] }}</td>
                                                <td>{{ $list['interest'] }}%</td>
                                                <td>
                                                    @if ($list['status'] == 'Active')
                                                        <span class="badge bg-success p-2">{{ $list['status'] }}</span>
                                                    @else
                                                        <span class="badge bg-danger p-2">{{ $list['status'] }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($list['break_status'] == 'Broken')
                                                        <span class="badge bg-primary p-2">{{ $list['break_status'] }}</span>
                                                    @else
                                                        <span class="badge bg-success p-2">{{ $list['break_status'] ?? 'N/A' }}</span>
                                                    @endif
                                                </td>
                                                <td>${{ $list['break_amount'] ?? 0 }}</td>
                                                <td>{{ $list['broke_date'] ?? 'N/A' }}</td>
                                                <td class="text-center">
                                                    <a href="{{ url('admin/fake-lending-details/delete/' . $list['id']) }}" 
                                                       class="btn btn-sm btn-danger text-white" 
                                                       onclick="return confirm('Are you sure you want to delete this fake lending entry?')" 
                                                       title="Delete Entry">
                                                        <i class="mdi mdi-delete me-1"></i> Delete
                                                    </a>
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
