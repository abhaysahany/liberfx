@extends('member.layouts.main')
@section('title', 'Orders')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                        Content body start
                                                                                                                                                                                                                    ***********************************-->
    <div class="content-body orders-page">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="col-12">
                        <div class="card orders-main-card">
                            <div class="card-header">
                                <h4 class="card-title orders-title">Orders</h4>
                            </div>
                            <div class="card-body orders-table-wrap">
                                <div class="basic-form">
                                    <ul class="nav nav-pills justify-content-center mb-4 light orders-pills">
                                        <li class=" nav-item">
                                            <a href="#navpills-1" class="nav-link active" data-bs-toggle="tab"
                                                aria-expanded="false">Today Orders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#navpills-2" class="nav-link" data-bs-toggle="tab"
                                                aria-expanded="false">Previous Order</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="navpills-1" class="tab-pane active">

                                            <div class="table-responsive">
                                                <table id="example3" class="display min-w850">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Order Date</th>
                                                            <th>Order Type</th>
                                                            <th>Order Id</th>
                                                            <th>Coins</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Total</th>
                                                            <th>Type</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($open_data as $op_data)
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $op_data['order_time'] }}</td>
                                                                <td>
                                                                    @if ($op_data['order_type'] == 'BUY')
                                                                        <span
                                                                            class="badge bg-success px-2 py-1">{{ $op_data['order_type'] }}</span>
                                                                    @else
                                                                        <span
                                                                            class="badge bg-danger px-2 py-1">{{ $op_data['order_type'] }}
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $op_data['order_id'] }}</td>
                                                                <td>{{ $op_data['coin_name'] }}</td>
                                                                <td>{{ $op_data['quantity'] }}</td>
                                                                <td>{{ $op_data['price'] }}</td>
                                                                <td>{{ $op_data['total_value'] }}</td>
                                                                <td>{{ $op_data['price_type'] }}</td>
                                                                <td>
                                                                    @if ($op_data['status'] == 'Pending')
                                                                        <span
                                                                            class="badge bg-danger p-2">{{ $op_data['status'] }}</span>
                                                                    @else
                                                                        <span
                                                                            class="badge bg-success p-2">{{ $op_data['status'] }}</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @php
                                                                $i++;
                                                            @endphp
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="navpills-2" class="tab-pane">
                                            <div class="table-responsive">
                                                <table id="example3" class="display min-w850">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Order Date</th>
                                                            <th>Order Type</th>
                                                            <th>Order Id</th>
                                                            <th>Coins</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Total</th>
                                                            <th>Type</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($finish_data as $op_data)
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $op_data['order_time'] }}</td>
                                                                <td>
                                                                    @if ($op_data['order_type'] == 'BUY')
                                                                        <span
                                                                            class="badge bg-success px-2 py-1">{{ $op_data['order_type'] }}</span>
                                                                    @else
                                                                        <span
                                                                            class="badge bg-danger px-2 py-1">{{ $op_data['order_type'] }}
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $op_data['order_id'] }}</td>
                                                                <td>{{ $op_data['coin_name'] }}</td>
                                                                <td>{{ $op_data['quantity'] }}</td>
                                                                <td>{{ $op_data['price'] }}</td>
                                                                <td>{{ $op_data['total_value'] }}</td>
                                                                <td>{{ $op_data['price_type'] }}</td>
                                                                <td>
                                                                    @if ($op_data['status'] == 'Pending')
                                                                        <span
                                                                            class="badge bg-danger p-2">{{ $op_data['status'] }}</span>
                                                                    @else
                                                                        <span
                                                                            class="badge bg-success p-2">{{ $op_data['status'] }}</span>
                                                                    @endif
                                                                </td>
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
        </div>
    </div>
    <!--**********************************
                                                                                                                                                                                                                        Content body end
                                                                                                                                                                                                                    ***********************************-->
@endsection
