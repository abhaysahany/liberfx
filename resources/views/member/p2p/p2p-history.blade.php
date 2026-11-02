@extends('member.layouts.main')
@section('title', 'Fund Wallet History')
@section('container')


    <style>
        .p2p-history-table-wrap {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            width: 100%;
            margin-top: 1rem;
        }

        .p2p-history-table-wrap table {
            min-width: 820px;
            width: 100%;
            border-collapse: collapse;
        }

        .p2p-history-table-wrap th,
        .p2p-history-table-wrap td {
            white-space: nowrap;
            padding: 0.85rem 0.9rem;
        }

        .p2p-history-table-wrap thead th {
            font-weight: 600;
        }
    </style>

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
                                <h4 class="card-title">Fund Wallet History</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive p2p-history-table-wrap">
                                    <div class="table-responsive">
                                        <table id="example3" class="display min-w850">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Amount Add</th>
                                                    <th>Amount Deduct</th>
                                                    <th>Balance</th>
                                                    <th>Particular</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($passdata as $list)
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}</td>
                                                        <td>{{ $list['walletType'] }}</td>
                                                        <td>$ {{ $list['debit'] }}</td>
                                                        <td>$ {{ $list['credit'] }}</td>
                                                        <td>$ {{ $list['balance'] }}</td>
                                                        <td>{{ $list['particular'] }}</td>
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
    </div>
    <!--**********************************
                                                                                                                                Content body end
                                                                                                                            ***********************************-->
@endsection
