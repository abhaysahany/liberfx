@extends('member.layouts.main')
@section('title', 'Lending Income')
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
                                <h4 class="card-title">Lending Income</h4>
                            </div>
                            <div class="card-body">
                                @if (count($lendata) > 0)
                                    @foreach ($lendata as $op_data)
                                        <div class="card">
                                            <div class="prot-blog" style="background-color:#09153F">
                                                <div class="d-flex post justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center ">
                                                        <p class="text-white card-title mb-0 me-3">Plan
                                                            : {{ $op_data['plan'] }} </p>

                                                    </div>
                                                </div>
                                                <div class="fill">
                                                    <p class="mb-1">Date :
                                                        {{ date('d-m-Y', strtotime($op_data['created_at'])) }}
                                                        {{ date('H:i:s', strtotime($op_data['created_at'])) }}
                                                    </p>
                                                </div>
                                                <h4 class="mb-0">
                                                    <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                            width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                            </circle>
                                                        </svg>
                                                        Amount :
                                                        ${{ $op_data['amount'] }}
                                                    </span>
                                                </h4>
                                                <!--<h4 class="mb-0">-->
                                                <!--    <span href="post-details.html" class="text-bla"><svg class="me-1"-->
                                                <!--            width="9" height="9" viewBox="0 0 9 9" fill="none"-->
                                                <!--            xmlns="http://www.w3.org/2000/svg">-->
                                                <!--            <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">-->
                                                <!--            </circle>-->
                                                <!--        </svg>-->
                                                <!--        Lending Incomes : {{ $op_data['installment'] }}-->
                                                <!--    </span>-->
                                                <!--</h4>-->
                                                <h4 class="mb-0">
                                                    <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                            width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                            </circle>
                                                        </svg>
                                                        Status :
                                                        @if ($op_data['status'] == 'Paid')
                                                            <span
                                                                class="badge bg-success p-2">{{ $op_data['status'] }}</span>
                                                        @elseif ($op_data['status'] == 'Unpaid')
                                                            <span
                                                                class="badge bg-danger p-2">{{ $op_data['status'] }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-primary p-2">{{ $op_data['status'] }}</span>
                                                        @endif
                                                    </span>
                                                </h4>
                                                <div class="shape">
                                                    <!--<img src="{{ asset('/uassets/images/lending.png') }}" alt="courseImg"-->
                                                    <!--    class="courseImg" style="padding-right: 10px;padding-bottom:10px">-->
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h3>No Income Found</h3>
                                @endif
                                {{-- <table id="responsiveTable" class="display responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Date</th>
                                            <th>Plan</th>
                                            <th>Amount</th>
                                            <th>Days</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($lendata as $op_data)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($op_data['created_at'])) }}<br>{{ date('H:i:s', strtotime($op_data['created_at'])) }}
                                                </td>
                                                <td>{{ $op_data['plan'] }}</td>
                                                <td>$ {{ $op_data['amount'] }}</td>
                                                <td>{{ $op_data['installment'] }}</td>
                                                <td><span class="badge bg-primary p-2">{{ $op_data['status'] }}</span>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
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
    <!--**********************************
                                                                                                                                    Content body end
                                                                                                                                ***********************************-->
@endsection
