@extends('member.layouts.main')
@section('title', 'Lending Details')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                Content body start
                                                                                                                                                                                                                                                                                                                                                            ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Lending Details</h4>
                            </div>
                            <div class="card-body" style="overflow: auto">
                                <div class="basic-form">
                                    <ul class="nav nav-pills justify-content-center mb-4 light">
                                        <li class=" nav-item">
                                            <a href="#navpills-micro" class="nav-link active" data-bs-toggle="tab"
                                                aria-expanded="true">Micro Plan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#navpills-1" class="nav-link" data-bs-toggle="tab"
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
                                        <div id="navpills-micro" class="tab-pane active">
                                            <div class="row">
                                                @foreach ($ldata as $op_data)
                                                    @if ($op_data['plan'] == 'Micro')
                                                        <div class="col-xl-4">
                                                            <x-FirstComponent :message="$op_data" />
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div id="navpills-1" class="tab-pane">
                                            <div class="row">
                                                @foreach ($ldata as $op_data)
                                                    @if ($op_data['plan'] == 'Core')
                                                        <div class="col-xl-4">
                                                            <x-FirstComponent :message="$op_data" />
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>

                                            {{--                                             
                                            <table class="table table-hover align-middle mb-0 dataTables"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Start Date</th>
                                                        <th>Plan</th>
                                                        <th>Amount</th>
                                                        <th>Total Duration</th>
                                                        <th>Interest</th>
                                                        <th>Status</th>
                                                        <th>B_Status</th>
                                                        <th>B_Amount</th>
                                                        <th>B_Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($ldata as $op_data)
                                                        @if ($op_data['plan'] == 'Core')
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ date('d-m-Y H:i:s', strtotime($op_data['start_date'] . '-1day')) }}
                                                                </td>
                                                                <td>{{ $op_data['plan'] }}</td>
                                                                <td>$ {{ $op_data['amount'] }}</td>
                                                                <td>{{ $op_data['total_duration'] }}</td>
                                                                <td>{{ $op_data['interest'] }}%</td>

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
                                                                            class="badge bg-primary p-2">{{ $op_data['break_status'] }}</span>
                                                                    @else
                                                                        <span
                                                                            class="badge bg-success p-2">{{ $op_data['break_status'] }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>${{ $op_data['break_amount'] }}</td>
                                                                <td>{{ $op_data['broke_date'] }}</td>
                                                            </tr>
                                                            @php
                                                                $i++;
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                </tbody>
                                            </table> --}}

                                        </div>
                                        <div id="navpills-2" class="tab-pane">
                                            <div class="row">
                                                @foreach ($ldata as $op_data)
                                                    @if ($op_data['plan'] == 'Lime')
                                                        <div class="col-xl-4">
                                                            <x-FirstComponent :message="$op_data" />
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            {{-- <table class="table table-hover align-middle mb-0 dataTables"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Start Date</th>
                                                        <th>Plan</th>
                                                        <th>Amount</th>
                                                        <th>Total Duration</th>
                                                        <th>Interest</th>
                                                        <th>Status</th>
                                                        <th>B_Status</th>
                                                        <th>B_Amount</th>
                                                        <th>B_Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($ldata as $op_data)
                                                        @if ($op_data['plan'] == 'Lime')
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ date('d-m-Y H:i:s', strtotime($op_data['start_date'] . '-1day')) }}
                                                                </td>
                                                                <td>{{ $op_data['plan'] }}</td>
                                                                <td>$ {{ $op_data['amount'] }}</td>
                                                                <td>{{ $op_data['total_duration'] }}</td>
                                                                <td>{{ $op_data['interest'] }}%</td>

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
                                                                            class="badge bg-primary p-2">{{ $op_data['break_status'] }}</span>
                                                                    @else
                                                                        <span
                                                                            class="badge bg-success p-2">{{ $op_data['break_status'] }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>${{ $op_data['break_amount'] }}</td>
                                                                <td>{{ $op_data['broke_date'] }}</td>
                                                            </tr>
                                                            @php
                                                                $i++;
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                </tbody>
                                            </table> --}}
                                        </div>
                                        <div id="navpills-3" class="tab-pane">
                                            <div class="row">
                                                @foreach ($ldata as $op_data)
                                                    @if ($op_data['plan'] == 'Droid')
                                                        <div class="col-xl-4">
                                                            <x-FirstComponent :message="$op_data" />
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            {{-- <table class="table table-hover align-middle mb-0 dataTables"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Start Date</th>
                                                        <th>Plan</th>
                                                        <th>Amount</th>
                                                        <th>Total Duration</th>
                                                        <th>Interest</th>
                                                        <th>Status</th>
                                                        <th>B_Status</th>
                                                        <th>B_Amount</th>
                                                        <th>B_Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($ldata as $op_data)
                                                        @if ($op_data['plan'] == 'Droid')
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ date('d-m-Y H:i:s', strtotime($op_data['start_date'] . '-1day')) }}
                                                                </td>
                                                                <td>{{ $op_data['plan'] }}</td>
                                                                <td>$ {{ $op_data['amount'] }}</td>
                                                                <td>{{ $op_data['total_duration'] }}</td>
                                                                <td>{{ $op_data['interest'] }}%</td>

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
                                                                            class="badge bg-primary p-2">{{ $op_data['break_status'] }}</span>
                                                                    @else
                                                                        <span
                                                                            class="badge bg-success p-2">{{ $op_data['break_status'] }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>${{ $op_data['break_amount'] }}</td>
                                                                <td>{{ $op_data['broke_date'] }}</td>

                                                            </tr>
                                                            @php
                                                                $i++;
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                </tbody>
                                            </table> --}}
                                        </div>
                                    </div>
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
