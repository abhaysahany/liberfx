@extends('member.layouts.main')
@section('title', 'Trading Swap Income')
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
                                <h4 class="card-title">Trading Swap Income</h4>
                            </div>
                            <div class="card-body">
                                @if (count($roiData) > 0)
                                    @foreach ($roiData as $list)
                                        <div class="card">
                                            <div class="prot-blog" style="background-color:#09153F">
                                                <div class="d-flex post justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center ">
                                                        <h5 class="text-white card-title mb-0 me-3">Course : </h5>
                                                        <span
                                                            class="badge badge-primary badge-sm">{{ $list['course'] }}</span>

                                                    </div>
                                                </div>
                                                <div class="fill">
                                                    <p class="mb-1">Date :
                                                        {{ date('d M Y', strtotime($list['created_at'])) }} </p>
                                                </div>
                                                <h4 class="mb-0">
                                                    <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                            width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                            </circle>
                                                        </svg>
                                                        Interest : {{ $list['intrest'] }}%
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
                                                        ${{ $list['amount'] }}
                                                    </span>
                                                </h4>
                                                <h4 class="mb-0">
                                                    <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                            width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                            </circle>
                                                        </svg>
                                                        Month :
                                                        {{ $list['month'] }}
                                                    </span>
                                                </h4>
                                                <h4 class="mb-0">
                                                    <span href="post-details.html" class="text-bla"><svg class="me-1"
                                                            width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                            </circle>
                                                        </svg>
                                                        Year :
                                                        {{ $list['year'] }}
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
                                                <div class="shape">
                                                    <img src="{{ asset('/uassets/images/roi.png') }}" alt="courseImg"
                                                        class="courseImg" style="padding-right: 10px;padding-bottom:10px">
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
                                            <th>S.No</th>
                                            <th>Date</th>
                                            <th>Memberid</th>
                                            <th>Course</th>
                                            <th>Interest</th>
                                            <th>Amount</th>
                                            <th>Month </th>
                                            <th>Year</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($roiData as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}</td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ $list['course'] }}</td>
                                                <td>{{ $list['intrest'] }}%</td>
                                                <td>$ {{ $list['amount'] }}</td>
                                                <td>{{ $list['month'] }}</td>
                                                <td>{{ $list['year'] }}</td>
                                                <td>
                                                    @if ($list['status'] == 'Paid')
                                                        <div class="btn btn-sm btn-success">{{ $list['status'] }}</div>
                                                    @elseif ($list['status'] == 'Deactive')
                                                        <div class="btn btn-sm btn-danger">{{ $list['status'] }}</div>
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
