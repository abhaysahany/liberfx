<div>
    {{-- <div class="card dz-card bg-primary text-white" id="card-title-1">
            <div class="card-header flex-wrap border-0 py-3 bg-danger">
                <h5 class="card-title text-white">{{ $message['plan'] }}</h5>
            </div>
            <div class="card-body">
                <div class="card-text">
                    Amount : $ {{ $message['amount'] }}<br>
                    Total Duration : {{ $message['total_duration'] }}<br>
                    Interest : {{ $message['interest'] }}%<br>

                    <span>
                        Status :
                        @if ($message['status'] == 'Active')
                            <span class="badge bg-success p-2">{{ $message['status'] }}</span>
                        @else
                            <span class="badge bg-danger p-2">{{ $message['status'] }}</span>
                        @endif
                    </span>
                    <br>
                    <span>
                        Break Status :
                        @if ($message['break_status'] == 'Broken')
                            <span class="badge bg-primary p-2">{{ $message['break_status'] }}</span>
                        @else
                            <span class="badge bg-success p-2">{{ $message['break_status'] }}</span>
                        @endif
                    </span>
                    <span>Break Amount : ${{ $message['break_amount'] }}</span>
                    <br>
                    <span>Start Date : {{ date('d-m-Y H:i:s', strtotime($message['start_date'] . '-1day')) }}</span>
                    <br>
                    <span>Break Date : {{ $message['broke_date'] }}</span>
                </div>

            </div>

        </div> --}}
    <div class="card">
        @if ($message['plan'] == 'Unified')
            <div class="prot-blog" style="background-color:rgb(193, 67, 67)">
            @elseif ($message['plan'] == 'Vasted')
                <div class="prot-blog" style="background-color:rgb(10, 175, 10)">
                @else
                    <div class="prot-blog">
        @endif
        <div class="d-flex post justify-content-between align-items-center">
            <div class="d-flex align-items-center mb-2">
                <h5 class="text-white card-title mb-0 me-3">Plan : </h5>
                <span class="badge badge-warning badge-sm">{{ $message['plan'] }}</span>
            </div>
        </div>
        <div class="fill">

            <p class="mb-1">Created Date :
                {{ date('d M Y', strtotime($message['created_at'] )) }} </p>
        </div>
        <h4 class="mb-0">
            <span href="post-details.html" class="text-bla"><svg class="me-1" width="9" height="9"
                    viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC"></circle>
                </svg>
                Amount : $ {{ $message['amount'] }} , Interest : {{ $message['interest'] }}%
            </span>
        </h4>
        <h4 class="mb-0">
            <span href="post-details.html" class="text-bla"><svg class="me-1" width="9" height="9"
                    viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC"></circle>
                </svg>
                Total Duration : {{ $message['total_duration'] }}
            </span>
        </h4>
        <h4 class="mb-0">
            <span href="post-details.html" class="text-bla"><svg class="me-1" width="9" height="9"
                    viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC"></circle>
                </svg>
                Status :
                @if ($message['status'] == 'Active')
                    <span class="badge bg-success p-2">{{ $message['status'] }}</span>
                @else
                    <span class="badge bg-danger p-2">{{ $message['status'] }}</span>
                @endif
            </span>
        </h4>
        <h4 class="mb-0">
            <span href="post-details.html" class="text-bla"><svg class="me-1" width="9" height="9"
                    viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC"></circle>
                </svg>
                Break Status :
                @if ($message['break_status'] == 'Broken')
                    <span class="badge bg-danger p-2">{{ $message['break_status'] }}</span>
                @else
                    <span class="badge bg-success p-2">{{ $message['break_status'] }}</span>
                @endif
            </span>
        </h4>
        <h4 class="mb-0">
            <span href="post-details.html" class="text-bla"><svg class="me-1" width="9" height="9"
                    viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC"></circle>
                </svg>
                Break Amount : ${{ $message['break_amount'] }} , Break Date : {{ $message['broke_date'] }}
            </span>
        </h4>
        <div class="shape">
            <svg style="height: 160px;width:180px" viewBox="0 0 225 193" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.25"
                    d="M33.5363 229H202.479C212.704 229 222.221 224.41 228.611 216.417C235.048 208.362 237.435 197.967 235.156 187.894C226.373 149.176 199.898 118.742 165.333 104.048C174.942 92.9903 180.967 78.7346 180.967 62.9677C180.967 28.2457 152.725 0 118 0C83.2752 0 55.0333 28.2457 55.0333 62.9677C55.0333 78.7346 61.0582 92.9903 70.6672 104.048C36.1021 118.742 9.62733 149.179 0.8441 187.902C-1.43496 197.967 0.951892 208.355 7.38869 216.41C13.7793 224.41 23.3113 229 33.5363 229ZM86.5706 62.9677C86.5706 45.6414 100.676 31.5416 118 31.5416C135.324 31.5416 149.429 45.6414 149.429 62.9677C149.429 80.294 135.324 94.3938 118 94.3938C100.676 94.3938 86.5706 80.294 86.5706 62.9677ZM118 125.935C159.654 125.935 195.18 154.281 204.389 194.863C204.589 195.726 204.265 196.35 203.973 196.727C203.388 197.458 202.71 197.458 202.479 197.458H33.5363C33.3053 197.458 32.6123 197.458 32.0272 196.727C31.7346 196.35 31.4112 195.726 31.6114 194.871C40.82 154.281 76.3456 125.935 118 125.935Z"
                    fill="white"></path>
            </svg>
        </div>
    </div>
</div>
</div>
