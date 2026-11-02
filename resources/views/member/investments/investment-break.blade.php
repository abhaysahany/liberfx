@extends('member.layouts.main')
@section('title', 'Investment Break')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                            Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                                        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row g-3">
                @if (session()->has('successMsg'))
                    <div class="alert alert-success" role="alert">
                        {{ session('successMsg') }}
                    </div>
                @endif
                @if (session()->has('ErrorMsg'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('ErrorMsg') }}
                    </div>
                @endif
                <div class="col-xl-12">

                    <div class="card">
                        <div
                            class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0 align-items-center">
                            <h6 class="mb-0 fw-bold ">Investment Break</h6>
                        </div>
                        <div class="card-body" style="overflow: auto">
                            <div class="basic-form">
                                <ul class="nav nav-pills justify-content-center mb-4 light">
                                    <li class=" nav-item">
                                        <a href="#navpills-1" class="nav-link active" data-bs-toggle="tab"
                                            aria-expanded="false">Core Plan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#navpills-2" class="nav-link" data-bs-toggle="tab"
                                            aria-expanded="false">Lime Plan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#navpills-3" class="nav-link" data-bs-toggle="tab"
                                            aria-expanded="true">Droid Plan</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="navpills-1">
                                        <table id="ordertabone" class=" table table-hover  table-bordered  mb-0"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Start Date</th>
                                                    <th>Plan</th>
                                                    <th>Amount</th>
                                                    {{-- <th>Total Duration</th> --}}
                                                    {{-- <th>Interest</th> --}}
                                                    <th>Status</th>
                                                    <th>Break Status</th>
                                                    <th style="text-align: center !important">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($lendata as $op_data)
                                                    @if ($op_data['plan'] == 'Core')
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($op_data['created_at'])) }}</td>
                                                            <td>{{ $op_data['plan'] }}</td>
                                                            <td>$ {{ $op_data['amount'] }}</td>
                                                            {{-- <td>{{ $op_data['total_duration'] }}</td> --}}
                                                            {{-- <td>{{ $op_data['interest'] }}%</td> --}}
                                                            <td><span
                                                                    class="badge bg-success p-2">{{ $op_data['status'] }}</span>
                                                            </td>
                                                            <td>
                                                                @if ($op_data['break_status'])
                                                                    <span
                                                                        class="badge bg-primary p-2">{{ $op_data['break_status'] }}</span>
                                                                @else
                                                                    <span class="badge bg-secondary p-2">No Break</span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($deduction['lending_break_status'])
                                                                    @if (
                                                                        $op_data['break_status'] == 'Requested' ||
                                                                            $op_data['break_status'] == 'Approved' ||
                                                                            $op_data['break_status'] == 'Rejected')
                                                                        <button class="btn btn-sm btn-danger p-2"
                                                                            disabled>Break Not
                                                                            Allowed</button>
                                                                    @else
                                                                        @if (date('Y-m-d') != date('Y-m-d', strtotime($op_data['created_at'])))
                                                                            <a
                                                                                href="{{ url('member/investment-break/lending') }}/{{ $op_data['id'] }}"><span
                                                                                    class="badge bg-danger p-2">Break</span></a>
                                                                        @else
                                                                            --
                                                                        @endif
                                                                    @endif
                                                                @else
                                                                    --
                                                                @endif

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
                                    <div class="tab-pane fade" id="navpills-2">
                                        <table id="ordertabthree"
                                            class="priceTable table table-hover custom-table table-bordered align-middle mb-0"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Start Date</th>
                                                    <th>Plan</th>
                                                    <th>Amount</th>
                                                    {{-- <th>Total Duration</th> --}}
                                                    {{-- <th>Interest</th> --}}
                                                    <th>Status</th>
                                                    <th>Break Status</th>
                                                    <th style="text-align: center !important">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($Limedata as $op_data)
                                                    @if ($op_data['plan'] == 'Lime')
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($op_data['created_at'])) }}</td>
                                                            <td>{{ $op_data['plan'] }}</td>
                                                            <td>$ {{ $op_data['amount'] }}</td>
                                                            {{-- <td>{{ $op_data['total_duration'] }}</td> --}}
                                                            {{-- <td>{{ $op_data['interest'] }}%</td> --}}
                                                            <td><span
                                                                    class="badge bg-success p-2">{{ $op_data['status'] }}</span>
                                                            </td>
                                                            <td>
                                                                @if ($op_data['break_status'])
                                                                    <span
                                                                        class="badge bg-primary p-2">{{ $op_data['break_status'] }}</span>
                                                                @else
                                                                    <span class="badge bg-secondary p-2">No Break</span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($deduction['lending_break_status'])
                                                                    @if (
                                                                        $op_data['break_status'] == 'Requested' ||
                                                                            $op_data['break_status'] == 'Approved' ||
                                                                            $op_data['break_status'] == 'Rejected')
                                                                        <button class="btn btn-sm btn-danger p-2"
                                                                            disabled>Break Not
                                                                            Allowed</button>
                                                                    @else
                                                                        <a
                                                                            href="{{ url('member/investment-break/lending') }}/{{ $op_data['id'] }}"><span
                                                                                class="badge bg-danger p-2">Break</span></a>
                                                                    @endif
                                                                @else
                                                                    --
                                                                @endif

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
                                    <div class="tab-pane fade" id="navpills-3">
                                        <table id="ordertabtwo"
                                            class="priceTable table table-hover custom-table-2 table-bordered align-middle mb-0"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Start Date</th>
                                                    <th>Plan</th>
                                                    <th>Amount</th>
                                                    {{-- <th>Total Duration</th> --}}
                                                    {{-- <th>Interest</th> --}}
                                                    <th>Status</th>
                                                    <th>Break Status</th>
                                                    <th style="text-align: center !important">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($Droiddata as $op_data)
                                                    @if ($op_data['plan'] == 'Droid')
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($op_data['created_at'])) }}</td>
                                                            <td>{{ $op_data['plan'] }}</td>
                                                            <td>$ {{ $op_data['amount'] }}</td>
                                                            {{-- <td>{{ $op_data['total_duration'] }}</td> --}}
                                                            {{-- <td>{{ $op_data['interest'] }}%</td> --}}
                                                            <td><span
                                                                    class="badge bg-success p-2">{{ $op_data['status'] }}</span>
                                                            </td>
                                                            <td>
                                                                @if ($op_data['break_status'])
                                                                    <span
                                                                        class="badge bg-primary p-2">{{ $op_data['break_status'] }}</span>
                                                                @else
                                                                    <span class="badge bg-secondary p-2">No Break</span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($deduction['lending_break_status'])
                                                                    @if (
                                                                        $op_data['break_status'] == 'Requested' ||
                                                                            $op_data['break_status'] == 'Approved' ||
                                                                            $op_data['break_status'] == 'Rejected')
                                                                        <button class="btn btn-sm btn-danger p-2"
                                                                            disabled>Break Not
                                                                            Allowed</button>
                                                                    @else
                                                                        <a
                                                                            href="{{ url('member/investment-break/lending') }}/{{ $op_data['id'] }}"><span
                                                                                class="badge bg-danger p-2">Break</span></a>
                                                                    @endif
                                                                @else
                                                                    --
                                                                @endif

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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">

                    <div class="card">
                        <div
                            class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0 align-items-center">
                            <h6 class="mb-0 fw-bold ">Broken Lendings</h6>
                        </div>
                        <div class="card-body" style="overflow: auto">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="OpenOrder">
                                    <table id="ordertabone"
                                        class="priceTable table table-hover custom-table table-bordered align-middle mb-0"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Invest Date</th>
                                                <th>Break Date</th>
                                                <th>Memberid</th>
                                                <th>Plan</th>
                                                <th>Investment</th>
                                                <th>Deduction</th>
                                                <th>Break Amount</th>
                                                <th style="text-align: center !important">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($breakdata as $op_data)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($op_data['investment_date'])) }}
                                                    </td>
                                                    <td>{{ date('d-m-Y', strtotime($op_data['created_at'])) }}</td>
                                                    <td>{{ $op_data['memberid'] }}</td>
                                                    <td>{{ $op_data['lending_type'] }}</td>
                                                    <td>$ {{ $op_data['investment'] }}</td>
                                                    <td>$ {{ $op_data['deduction'] }}</td>
                                                    <td>$ {{ $op_data['break_amount'] }}</td>
                                                    <td class="text-center">
                                                        @if ($op_data['status'] == 'Approved')
                                                            <div class="btn btn-sm btn-success">
                                                                {{ __($op_data['status']) }}
                                                            </div>
                                                        @else
                                                            <div class="btn btn-sm btn-danger ">
                                                                {{ __($op_data['status']) }}
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
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                            Content body end
                                                                                                                                                                                                                                                                                                                                                                                                                                        ***********************************-->
@endsection
