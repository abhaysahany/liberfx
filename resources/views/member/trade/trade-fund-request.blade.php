@extends('member.layouts.main')
@section('title', 'Trade Fund Request')
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
                                <h4 class="card-title">Trade Fund Request</h4>
                            </div>
                            <div class="card-body">
                                <table id="responsiveTable" class="display responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Date</th>
                                            <th>Coin</th>
                                            <th>Amount</th>
                                            <th>Txn Id</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($tfundData as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['date'])) }}</td>
                                                <td>{{ $list['coin'] }}</td>
                                                <td>{{ $list['amount'] }}</td>
                                                <td>{{ $list['tran_id'] }}</td>
                                                <td><span class="color-price-up">{{ $list['status'] }}</span></td>
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
    <!--**********************************
                                                            Content body end
                                                        ***********************************-->
@endsection
