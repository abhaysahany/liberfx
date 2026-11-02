@extends('member.layouts.main')
@section('title', 'Level Income')
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
                                <h4 class="card-title">Level Income</h4>
                            </div>
                            <div class="card-body">
                                @if (count($lvlData) > 0)
                                    @foreach ($lvlData as $list)
                                        <div class="card">
                                            <div class="prot-blog" style="background-color:#09153F">
                                                <div class="d-flex post justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center ">
                                                        <p class="text-white card-title mb-0 me-3">Level
                                                            : {{ $list['level'] }} </p>

                                                    </div>
                                                </div>
                                                <div class="fill mb-2">
                                                    <p class="mb-0 text-white text-opacity-75 small">Date : {{ date('d M Y', strtotime($list['created_at'])) }}</p>
                                                </div>
                                                <div class="fill">
                                                    <p class="mb-1">Level ID :
                                                        {{ $list['level_id'] }} </p>
                                                </div>
                                                <h4 class="mb-0">
                                                    <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                            width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                            </circle>
                                                        </svg>
                                                        User Name : {{ $list['name'] }}
                                                    </span>
                                                </h4>
                                                <h4 class="mb-0">
                                                    <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                            width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                            </circle>
                                                        </svg>
                                                        Amount :
                                                        ${{ number_format($list['amount'],2) }}
                                                    </span>
                                                </h4>
                                                <h4 class="mb-0">
                                                    <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                            width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                            </circle>
                                                        </svg>
                                                        Trade Fee :
                                                        ${{ number_format($list['trade_fee'],2) }}
                                                    </span>
                                                </h4>
                                                <h4 class="mb-0">
                                                    <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                            width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                            </circle>
                                                        </svg>
                                                        Status :
                                                        @if ($list['status'] == 'Paid')
                                                            <span class="badge bg-success p-2">{{ $list['status'] }}</span>
                                                        @elseif ($list['status'] == 'Unpaid')
                                                            <span class="badge bg-danger p-2">{{ $list['status'] }}</span>
                                                        @else
                                                            <span class="badge bg-primary p-2">{{ $list['status'] }}</span>
                                                        @endif
                                                    </span>
                                                </h4>
                                                <!--<div class="shape ">-->
                                                <!--    <img src="{{ asset('/uassets/images/level.png') }}" alt="courseImg"-->
                                                <!--        class="courseImg" style="padding-right: 10px;padding-bottom:10px; width:30%">-->
                                                <!--</div>-->
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h3>No Income Found</h3>
                                @endif
                                {{-- <table id="responsiveTable" class="display responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Date</th>
                                            <th>Memberid</th>
                                            <th>Name</th>
                                            <th>Level</th>
                                            <th>Package</th>
                                            <th>Amount </th>
                                            <th>Activating Id </th>
                                            <th>Name </th>
                                            <th>Type </th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($lvlData as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}</td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ getName($list['memberid']) }}</td>
                                                <td>{{ $list['level'] }}</td>
                                                <td>{{ $list['package'] }}</td>
                                                <td>{{ $list['amount'] }}</td>
                                                <td>{{ $list['activatingId'] }}</td>
                                                <td>{{ $list['name'] }}</td>
                                                <td>{{ $list['type'] }}</td>
                                                <td>
                                                    @if ($list['status'] == 'Unpaid')
                                                        <div class="btn btn-danger">{{ $list['status'] }}</div>
                                                    @elseif ($list['status'] == 'Paid')
                                                        <div class="btn btn-success">{{ $list['status'] }}</div>
                                                    @else
                                                        <div class="btn btn-warning">{{ $list['status'] }}</div>
                                                    @endif
                                                </td>
                                            </tr>
                                            @php $i++;  @endphp
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
