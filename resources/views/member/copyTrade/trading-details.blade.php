@extends('member.layouts.main')
@section('title', 'Trading Details')
@section('container')

    <!--**********************************
                                                                                                                                                                        Content body start
                                                                                                                                                                    ***********************************-->
    <div class="content-body trading-details-page">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="col-12">
                        <div class="card trading-details-card">
                            <div class="card-header">
                                <h4 class="card-title trading-details-title">Trading Details</h4>
                            </div>
                            <div class="card-body trading-details-wrap">
                                <div class="table-responsive">
                                <table id="example3" class="display min-w850">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Date</th>
                                            <th>Trade ID</th>
                                            <th>Pair</th>
                                            <th>Volume</th>
                                            <th>Buy Amount</th>
                                            <th>Sell Amount</th>
                                            <th>Profit Loss</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($copyData as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}</td>
                                                <td>{{ $list['trade_id'] }}</td>
                                                <td>{{ $list['pair'] }}</td>
                                                <td>{{ $list['volume'] }}</td>
                                                <td>$ {{ $list['buy_amount'] }}</td>
                                                <td>$ {{ $list['sell_amount'] }}</td>
                                                <td>$ {{ $list['profit_loss'] }}</td>
                                            </tr>
                                            @php $i++;  @endphp
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
    <!--**********************************
                                                                                                                                                                        Content body end
                                                                                                                                                                    ***********************************-->
@endsection
