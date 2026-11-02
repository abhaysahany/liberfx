@extends('member.layouts.main')
@section('title', 'Light Level Income')
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
                                <h4 class="card-title">Light Level Income</h4>
                            </div>
                            <div class="card-body">
                                @if (count($lightLevelData) > 0)
                                    <div class="row">
                                        @foreach ($lightLevelData as $list)
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mb-3">
                                                <div class="card h-100 mb-0 border-0" style="border-radius: 16px; overflow: hidden; box-shadow: 0 4px 18px rgba(0, 0, 0, 0.18);">
                                                    <div class="prot-blog h-100 position-relative" style="background: linear-gradient(135deg, #09153F 0%, #102159 100%); padding: 22px 24px; border-radius: 16px; overflow: hidden;">
                                                        <div class="light-content-wrap" style="position: relative; z-index: 2; padding-right: 105px;">
                                                            <div class="d-flex align-items-center mb-1">
                                                                <h5 class="text-white fw-bold mb-0">Level : <span class="text-info">{{ $list['level'] }}</span></h5>
                                                            </div>
                                                            <div class="fill mb-2">
                                                                <p class="mb-0 text-white text-opacity-75 small">Date : {{ date('d M Y', strtotime($list['created_at'])) }}</p>
                                                            </div>
                                                            <h6 class="mb-2 text-white d-flex align-items-center">
                                                                <svg class="me-2 flex-shrink-0" width="8" height="8" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC"></circle>
                                                                </svg>
                                                                <span class="text-white text-opacity-75 me-1">Amount :</span>
                                                                <strong class="text-success fs-5 fw-bold">${{ $list['amount'] }}</strong>
                                                            </h6>
                                                            <h6 class="mb-2 text-white d-flex align-items-center">
                                                                <svg class="me-2 flex-shrink-0" width="8" height="8" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC"></circle>
                                                                </svg>
                                                                <span class="text-white text-opacity-75 me-1">Installment :</span>
                                                                <strong class="text-white">{{ $list['installment'] }}</strong>
                                                            </h6>
                                                            <h6 class="mb-0 text-white d-flex align-items-center">
                                                                <svg class="me-2 flex-shrink-0" width="8" height="8" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="4.5" cy="4.5" r="4.5" fill="#FCFCFC"></circle>
                                                                </svg>
                                                                <span class="text-white text-opacity-75 me-2">Status :</span>
                                                                @if ($list['status'] == 'Paid')
                                                                    <span class="badge bg-success px-2 py-1">{{ $list['status'] }}</span>
                                                                @elseif ($list['status'] == 'Unpaid')
                                                                    <span class="badge bg-danger px-2 py-1">{{ $list['status'] }}</span>
                                                                @else
                                                                    <span class="badge bg-primary px-2 py-1">{{ $list['status'] }}</span>
                                                                @endif
                                                            </h6>
                                                        </div>
                                                        <div class="light-shape-wrap" style="position: absolute; right: 12px; bottom: 12px; width: 105px; height: 105px; display: flex; align-items: flex-end; justify-content: flex-end; pointer-events: none; z-index: 1;">
                                                            <img src="{{ asset('/uassets/images/light.png') }}"
                                                                alt="Light Level Income" 
                                                                class="courseImg"
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
                                            <th>S.No</th>
                                            <th>Date</th>
                                            <th>Memberid</th>
                                            <th>Installment</th>
                                            <th>Amount </th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($lightLevelData as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}</td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ $list['installment'] }}</td>
                                                <td>{{ $list['amount'] }}</td>
                                                <td><span class="btn btn-sm btn-success">{{ $list['status'] }}</span></td>
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
