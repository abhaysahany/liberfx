@extends('admin.layouts.main')
@section('title', 'New Break Request')
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
                                        style="text-decoration: none">New Break Request</a></li>
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
                    @if (session()->has('successMsg'))
                        <div class="alert alert-primary">{{ session('successMsg') }}</div>
                    @endif
                    <div class="card" style="zoom:90%">
                        <div class="card-header">
                            <h4>{{ __('New Break Request Details') }}</h4>
                        </div>
                        <div class="card-body px-3">
                            <div class="responsive" style="overflow: auto">
                                <table id="basic-datatable" class="table  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Investment Date</th>
                                            <th>Member Id</th>
                                            <th>Name</th>
                                            <th>Lending Type</th>
                                            <th>Total Investment</th>
                                            <th>Investment</th>
                                            <th>Deduction</th>
                                            <th>Break Amount</th>
                                            <th>Break Date</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th class="text-center" colspan="2">Action</th>
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
                                                <td>{{ getname($break_data['memberid']) }}</td>
                                                <td>{{ $break_data['lending_type'] }}</td>
                                                <td>{{ totalInvestment($break_data['memberid']) }}</td>
                                                <td>$ {{ $break_data['investment'] }}</td>
                                                <td>$ {{ $break_data['deduction'] }}</td>
                                                <td>$ {{ $break_data['break_amount'] }}</td>
                                                <td>{{ $break_data['created_at'] }}</td>
                                                <td><span class="badge bg-dark p-2">{{ $break_data['status'] }}</span></td>
                                                <td>
                                                    <div class="table-actions text-center">
                                                        <a href="{{ url('admin/lending/view-image') }}/{{ $break_data['id'] }}"
                                                            class="btn btn-primary"><i class="ik ik-eye"></i> View</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($break_data['lending_type'] == 'Teto')
                                                        <div class="table-actions text-center">
                                                            <a href="{{ url('admin/lending/approved-teto-request') }}/{{ $break_data['id'] }}"
                                                                class="btn btn-sm btn-success"><i class="ik ik-eye"></i>
                                                                Approved</a>
                                                        </div>
                                                    @else
                                                        <div class="table-actions text-center">
                                                            <a href="{{ url('admin/lending/approved-request') }}/{{ $break_data['id'] }}"
                                                                class="btn btn-sm btn-success"><i class="ik ik-eye"></i>
                                                                Approved</a>
                                                        </div>
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($break_data['lending_type'] == 'Teto')
                                                        <div class="table-actions text-center">
                                                            <a href="{{ url('admin/lending/reject-teto-request') }}/{{ $break_data['id'] }}"
                                                                class="btn btn-sm btn-danger"><i class="ik ik-eye"></i>
                                                                Rejected</a>
                                                        </div>
                                                    @else
                                                        <div class="table-actions text-center">
                                                            <a href="{{ url('admin/lending/reject-request') }}/{{ $break_data['id'] }}"
                                                                class="btn btn-sm btn-danger"><i class="ik ik-eye"></i>
                                                                Rejected</a>
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
