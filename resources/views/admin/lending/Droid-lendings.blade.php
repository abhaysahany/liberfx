@extends('admin.layouts.main')
@section('title', 'Droid Lending')
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
                                        style="text-decoration: none">Droid Lending</a></li>
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
                            <h4>{{ __('Droid Lending Details') }}</h4>
                        </div>
                        <div class="card-body px-3">
                            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                <li class="nav-item">
                                    <a href="#home1" data-bs-toggle="tab" aria-expanded="true"
                                        class="nav-link rounded-0 active">
                                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Droid Lending Details</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile1" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link rounded-0">
                                        <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Droid Lending Break</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane show active" id="home1">
                                    <div class="responsive" style="overflow: auto">
                                        <table id="basic-datatable" class="table  nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Start Date</th>
                                                    <th>Member Id</th>
                                                    <th>Name</th>
                                                    <th>Plan</th>
                                                    <th>Total Duration</th>
                                                    <th>Interest</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>View</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($lendData as $op_data)
                                                    @if ($op_data['break_status'] == 'Active')
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($op_data['created_at'])) }}</td>
                                                            <td>{{ $op_data['memberid'] }}</td>
                                                            <td>{{ getName($op_data['memberid']) }}</td>
                                                            <td>{{ $op_data['plan'] }}</td>
                                                            <td>{{ $op_data['total_duration'] }}</td>
                                                            <td>{{ $op_data['interest'] }}%</td>
                                                            <td>$ {{ $op_data['amount'] }}</td>
                                                            <td>
                                                                @if ($op_data['status'] == 'Active')
                                                                    <span
                                                                        class="badge bg-success p-2">{{ $op_data['status'] }}</span>
                                                                @else
                                                                    <span
                                                                        class="badge bg-danger p-2">{{ $op_data['status'] }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="table-actions text-center">
                                                                    <a href="{{ url('admin/member-login') }}/{{ $op_data['memberid'] }}"
                                                                        target="_blank" class="btn btn-success"><i
                                                                            class="ik ik-eye"></i> View</a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="table-actions text-center">
                                                                    <a href="{{ route('forceBreakLendingAdmin', $op_data['id']) }}" 
                                                                        class="btn btn-danger" 
                                                                        onclick="return confirm('Are you sure you want to FORCE BREAK this lending? Standard deduction will be applied.');"><i
                                                                            class="ik ik-slash"></i> Break</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $i++;
                                                        @endphp
                                                    @endif
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane show" id="profile1">
                                    <div class="responsive" style="overflow:auto">
                                        <table id="advance-datatable" class="table  nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Start Date</th>
                                                    <th>Member Id</th>
                                                    <th>Name</th>
                                                    <th>Plan</th>
                                                    <th>Total Duration</th>
                                                    <th>Interest</th>
                                                    <th>Amount</th>
                                                    <th>Break Amount</th>
                                                    <th>Status</th>
                                                    <th>Broken Status</th>
                                                    <th>view</th>
                                                    <th>Broken Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($lendData as $op_data)
                                                    @if ($op_data['break_status'] == 'Broken')
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($op_data['created_at'])) }}</td>
                                                            <td>{{ $op_data['memberid'] }}</td>
                                                            <td>{{ getName($op_data['memberid']) }}</td>
                                                            <td>{{ $op_data['plan'] }}</td>
                                                            <td>{{ $op_data['total_duration'] }}</td>
                                                            <td>{{ $op_data['interest'] }}%</td>
                                                            <td>$ {{ $op_data['amount'] }}</td>
                                                            <td>$ {{ $op_data['break_amount'] }}</td>
                                                            <td>
                                                                @if ($op_data['status'] == 'Active')
                                                                    <span
                                                                        class="badge bg-success p-2">{{ $op_data['status'] }}</span>
                                                                @else
                                                                    <span
                                                                        class="badge bg-danger p-2">{{ $op_data['status'] }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($op_data['break_status'] == 'Broken')
                                                                    <span
                                                                        class="badge bg-danger p-2">{{ $op_data['break_status'] }}</span>
                                                                @else
                                                                    <span
                                                                        class="badge bg-active p-2">{{ $op_data['break_status'] }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="table-actions text-center">
                                                                    <a href="{{ url('admin/member-login') }}/{{ $op_data['memberid'] }}"
                                                                        target="_blank" class="btn btn-success"><i
                                                                            class="ik ik-eye"></i> View</a>
                                                                </div>
                                                            </td>
                                                            <td>{{ date('d-m-Y', strtotime($op_data['broke_date'])) }}</td>
                                                        </tr>
                                                        @php
                                                            $i++;
                                                        @endphp
                                                    @endif
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
