@extends('member.layouts.main')
@section('title', 'Course History')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ***********************************-->
    <div class="content-body course-history-page">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="col-12">
                        <div class="card course-history-main-card">
                            <div class="card-header">
                                <h4 class="card-title course-history-title">Course History</h4>
                            </div>
                            <div class="card-body course-history-wrap">
                                @php $i = 1;  @endphp
                                @foreach ($cdata as $list)
                                    <div class="card course-history-item-card">
                                        @if ($list['course'] == 'BTC')
                                            <div class="prot-blog course-history-item">
                                            @elseif ($list['course'] == 'TRON')
                                                <div class="prot-blog course-history-item">
                                                @elseif ($list['course'] == 'USDT TRC20')
                                                    <div class="prot-blog course-history-item">
                                                    @else
                                                        <div class="prot-blog course-history-item">
                                        @endif
                                        <div class="d-flex post justify-content-between align-items-center">
                                            <div class="d-flex align-items-center mb-2">
                                                <h5 class="text-white card-title mb-0 me-3">Course : </h5>
                                                <span class="badge badge-warning badge-sm course-badge">{{ $list['course'] }}</span>
                                            </div>
                                        </div>
                                        <div class="fill course-history-meta">
                                            <p class="mb-1">Purchase Date :
                                                {{ date('d M Y', strtotime($list['created_at'])) }} </p>
                                        </div>
                                        <h4 class="mb-0 course-detail-line">
                                            <span href="post-details.html" class="text-bla"><svg class="me-1 detail-dot"
                                                    width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                    </circle>
                                                </svg>
                                                Amount : ${{ number_format($list['amount'], 2) }}
                                            </span>
                                        </h4>
                                        <h4 class="mb-0 course-detail-line">
                                            <span href="post-details.html" class="text-bla"><svg class="me-1 detail-dot"
                                                    width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                    </circle>
                                                </svg>
                                                Interest :
                                                {{ number_format($list['intrest'], 0) }}%
                                            </span>
                                        </h4>
                                        <h4 class="mb-0 course-detail-line">
                                            <span href="post-details.html" class="text-bla"><svg class="me-1 detail-dot"
                                                    width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                    </circle>
                                                </svg>
                                                Installments :
                                                {{ $list['installment'] }}
                                            </span>
                                        </h4>
                                        <h4 class="mb-0 course-detail-line">
                                            <span href="post-details.html" class="text-bla"><svg class="me-1 detail-dot"
                                                    width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC">
                                                    </circle>
                                                </svg>
                                                Status :
                                                @if ($list['status'] == 'Active')
                                                    <span class="badge bg-success p-2">{{ $list['status'] }}</span>
                                                @elseif ($list['status'] == 'Deactive')
                                                    <span class="badge bg-danger p-2">{{ $list['status'] }}</span>
                                                @else
                                                    <span class="badge bg-primary p-2">{{ $list['status'] }}</span>
                                                @endif
                                            </span>
                                        </h4>
                                        <div class="shape course-history-shape">
                                            <img src="{{ asset('/uassets/images/course.png') }}" alt="courseImg"
                                                class="courseImg">
                                            {{-- <i class="material-symbols-outlined"
                                                style="font-size: 160px;color:#18254F">candlestick_chart</i> --}}
                                            {{-- <svg style="height: 160px;width:180px" viewBox="0 0 225 193" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.25"
                                                    d="M33.5363 229H202.479C212.704 229 222.221 224.41 228.611 216.417C235.048 208.362 237.435 197.967 235.156 187.894C226.373 149.176 199.898 118.742 165.333 104.048C174.942 92.9903 180.967 78.7346 180.967 62.9677C180.967 28.2457 152.725 0 118 0C83.2752 0 55.0333 28.2457 55.0333 62.9677C55.0333 78.7346 61.0582 92.9903 70.6672 104.048C36.1021 118.742 9.62733 149.179 0.8441 187.902C-1.43496 197.967 0.951892 208.355 7.38869 216.41C13.7793 224.41 23.3113 229 33.5363 229ZM86.5706 62.9677C86.5706 45.6414 100.676 31.5416 118 31.5416C135.324 31.5416 149.429 45.6414 149.429 62.9677C149.429 80.294 135.324 94.3938 118 94.3938C100.676 94.3938 86.5706 80.294 86.5706 62.9677ZM118 125.935C159.654 125.935 195.18 154.281 204.389 194.863C204.589 195.726 204.265 196.35 203.973 196.727C203.388 197.458 202.71 197.458 202.479 197.458H33.5363C33.3053 197.458 32.6123 197.458 32.0272 196.727C31.7346 196.35 31.4112 195.726 31.6114 194.871C40.82 154.281 76.3456 125.935 118 125.935Z"
                                                    fill="white"></path>
                                            </svg> --}}
                                        </div>
                                    </div>
                            </div>
                            @endforeach
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
