@extends('member.layouts.main')
@section('title', 'Reward Income')
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
                                <h4 class="card-title">Reward Details & Income</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills mb-4 light">
                                    <li class=" nav-item">
                                        <a href="#navpills-1" class="nav-link active" data-bs-toggle="tab"
                                            aria-expanded="false">Reward Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#navpills-2" class="nav-link" data-bs-toggle="tab"
                                            aria-expanded="false">Reward Income</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="navpills-1" class="tab-pane active">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                                <div class="widget-stat card bg-primary">
                                                    <div class="card-body p-4">
                                                        <div class="media ai-icon">
                                                            <span class="me-3 bgl-white text-primary">
                                                                <!-- <i class="ti-user"></i> -->
                                                                <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg"
                                                                    width="30" height="30" viewBox="0 0 24 24"
                                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-user">
                                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2">
                                                                    </path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                            </span>
                                                            <div class="media-body text-white">
                                                                <p class="mb-1">Rank</p>
                                                                <h4 class="mb-0 text-white">
                                                                    {{ $data->rank }}
                                                                </h4>
                                                                {{-- <span class="badge badge-primary">+3.5%</span> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                                <div class="widget-stat card bg-warning">
                                                    <div class="card-body p-4">
                                                        <div class="media ai-icon">
                                                            <span class="me-3 bgl-warning text-warning">
                                                                <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg"
                                                                    width="30" height="30" viewBox="0 0 24 24"
                                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-dollar-sign">
                                                                    <line x1="12" y1="1" x2="12"
                                                                        y2="23"></line>
                                                                    <path
                                                                        d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                            <div class="media-body text-white">
                                                                <p class="mb-1">Strong Leg -> ( {{ $ratio->first }} %)</p>
                                                                <h4 class="mb-0 text-white">
                                                                    @if ($first)
                                                                        $ {{ $first->team_invest }}
                                                                    @else
                                                                        --
                                                                    @endif
                                                                </h4>
                                                                {{-- <span class="badge badge-warning">+3.5%</span> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4  col-lg-6 col-sm-6">
                                                <div class="widget-stat card bg-danger">
                                                    <div class="card-body  p-4">
                                                        <div class="media ai-icon">
                                                            <span class="me-3 bgl-danger text-danger">
                                                                <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg"
                                                                    width="30" height="30" viewBox="0 0 24 24"
                                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-dollar-sign">
                                                                    <line x1="12" y1="1" x2="12"
                                                                        y2="23"></line>
                                                                    <path
                                                                        d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                            <div class="media-body text-white">
                                                                <p class="mb-1">Rest Legs -> ( {{ $ratio->rest }} %)</p>
                                                                <h4 class="mb-0  text-white">
                                                                    @if ($first)
                                                                        $ {{ $rest }}
                                                                    @else
                                                                        --
                                                                    @endif

                                                                </h4>
                                                                {{-- <span class="badge badge-danger">-3.5%</span> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <table class=" table table-hover table-bordered align-middle mb-0 text-center"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Rank</th>
                                                    <th>Strong Leg -> ( {{ $ratio->first }} %)</th>
                                                    <th>Rest Legs -> ( {{ $ratio->rest }} %)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($first)
                                                    <tr>
                                                        <td class="text-danger"><b>{{ $data->rank }}</b></td>
                                                        <td class="text-danger">$ {{ $first->team_invest }}</td>
                                                        <td class="text-danger">$ {{ $rest }}</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td class="text-danger"><b>{{ $data->rank }}</b></td>
                                                        <td class="text-danger">--</td>
                                                        <td class="text-danger">--</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table> --}}
                                        <hr>
                                        <div style="overflow:auto;">
                                            <table class=" table table-hover table-bordered align-middle mb-0 text-center"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Rank</th>
                                                        <th>Strong Leg -> (
                                                            {{ $ratio->first }} %)</th>
                                                        <th>Rest Legs -> (
                                                            {{ $ratio->rest }} %)</th>
                                                        <th>Income</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><b>Basic</b></td>
                                                        <td>$ {{ (7000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (7000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 40 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Start</b></td>
                                                        <td>$ {{ (15000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (15000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 70 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Silver</b></td>
                                                        <td>$ {{ (25000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (25000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 110 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Gold</b></td>
                                                        <td>$ {{ (55000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (55000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 250 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Platinum</b></td>
                                                        <td>$ {{ (75000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (75000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 310 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Pearl</b></td>
                                                        <td>$ {{ (85000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (85000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 425 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Ruby</b></td>
                                                        <td>$ {{ (130000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (130000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 610 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Sapphire</b></td>
                                                        <td>$ {{ (165000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (165000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 750 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Emerald</b></td>
                                                        <td>$ {{ (195000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (195000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 1100 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Diamond</b></td>
                                                        <td>$ {{ (230000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (230000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 1500 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Crown</b></td>
                                                        <td>$ {{ (255000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (255000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 3100 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Prince</b></td>
                                                        <td>$ {{ (300000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (300000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 4100 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Imperial Star</b></td>
                                                        <td>$ {{ (450000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (450000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 5100 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Imperial Moon</b></td>
                                                        <td>$ {{ (500000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (500000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 6100 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Imperial King</b></td>
                                                        <td>$ {{ (650000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (650000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 8500 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Ace Ambassador</b></td>
                                                        <td>$ {{ (800000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (800000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 10000 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Star Ambassador</b></td>
                                                        <td>$ {{ (1000000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (1000000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 12000 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Royal Ambassador</b></td>
                                                        <td>$ {{ (1500000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (1500000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 15000 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>King Club</b></td>
                                                        <td>$ {{ (2000000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (2000000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 18000 </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Universe Club</b></td>
                                                        <td>$ {{ (3000000 / 100) * $ratio->first }}</td>
                                                        <td>$ {{ (3000000 / 100) * $ratio->rest }}</td>
                                                        <td>$ 30000 </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="navpills-2" class="tab-pane">
                                        @if (count($rewdata) > 0)
                                            <div class="row">
                                                @foreach ($rewdata as $op_data)
                                                    <div class="col-xl-4 col-lg-6 col-md-6 col-12 mb-3">
                                                        <div class="card h-100 mb-0 border-0" style="border-radius: 16px; overflow: hidden; box-shadow: 0 4px 18px rgba(0, 0, 0, 0.18);">
                                                            <div class="prot-blog h-100 position-relative" style="background: linear-gradient(135deg, #09153F 0%, #102159 100%); padding: 22px 24px; border-radius: 16px; overflow: hidden;">
                                                                <div class="reward-content-wrap" style="position: relative; z-index: 2; padding-right: 105px;">
                                                                    <div class="d-flex align-items-center mb-1">
                                                                        <h5 class="text-white fw-bold mb-0">Rank : <span class="text-warning">{{ $op_data['rank'] }}</span></h5>
                                                                    </div>
                                                                    <div class="fill mb-2">
                                                                        <p class="mb-0 text-white text-opacity-75 small">Issue Date : {{ date('d M Y', strtotime($op_data['created_at'])) }}</p>
                                                                    </div>
                                                                    <h6 class="mb-2 text-white d-flex align-items-center">
                                                                        <svg class="me-2 flex-shrink-0" width="8" height="8" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC"></circle>
                                                                        </svg>
                                                                        <span class="text-white text-opacity-75 me-1">Month :</span>
                                                                        <strong class="text-white">{{ $op_data['month'] }}</strong>
                                                                    </h6>
                                                                    <h6 class="mb-2 text-white d-flex align-items-center">
                                                                        <svg class="me-2 flex-shrink-0" width="8" height="8" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC"></circle>
                                                                        </svg>
                                                                        <span class="text-white text-opacity-75 me-1">Amount :</span>
                                                                        <strong class="text-success fs-5 fw-bold">${{ $op_data['amount'] }}</strong>
                                                                    </h6>
                                                                    <h6 class="mb-0 text-white d-flex align-items-center">
                                                                        <svg class="me-2 flex-shrink-0" width="8" height="8" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC"></circle>
                                                                        </svg>
                                                                        <span class="text-white text-opacity-75 me-2">Status :</span>
                                                                        @if ($op_data['status'] == 'Paid')
                                                                            <span class="badge bg-success px-2 py-1">{{ $op_data['status'] }}</span>
                                                                        @elseif ($op_data['status'] == 'Unpaid')
                                                                            <span class="badge bg-danger px-2 py-1">{{ $op_data['status'] }}</span>
                                                                        @else
                                                                            <span class="badge bg-primary px-2 py-1">{{ $op_data['status'] }}</span>
                                                                        @endif
                                                                    </h6>
                                                                </div>
                                                                <div class="reward-trophy-shape" style="position: absolute; right: 12px; bottom: 12px; width: 105px; height: 105px; display: flex; align-items: flex-end; justify-content: flex-end; pointer-events: none; z-index: 1;">
                                                                    <img src="{{ asset('/uassets/images/reward.png') }}"
                                                                        alt="Reward Trophy" 
                                                                        class="reward-trophy-img"
                                                                        style="width: 100px !important; height: 100px !important; max-width: 100px !important; max-height: 100px !important; object-fit: contain !important; display: block !important; filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.4));">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="text-center py-4">
                                                <h4 class="text-muted">No Income Found</h4>
                                            </div>
                                        @endif
                                        {{-- <table id="responsiveTable" class="display responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Issue Date</th>
                                                    <th>Rank</th>
                                                    <th>Month</th>
                                                    <th>Amount</th>
                                                    <th>Pay Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($rewdata as $op_data)
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($op_data['created_at'])) }}</td>
                                                        <td>{{ $op_data['rank'] }}</td>
                                                        <td>{{ $op_data['month'] }}</td>
                                                        <td>$ {{ $op_data['amount'] }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($op_data['pay_date'])) }}</td>
                                                        <td><span
                                                                class="badge bg-success p-2">{{ $op_data['status'] }}</span>
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
        </div>
    </div>
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Content body end
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ***********************************-->
@endsection
