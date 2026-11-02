@extends('member.layouts.main')
@section('title', 'Add Fund')
@section('container')

    <!--**********************************
                                                                        Content body start
                                                                    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="col-xl-7 col-lg-7 mb-3">
                        @if (session()->has('successMsg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('successMsg') }}
                            </div>
                        @endif
                        @if (session()->has('failedMsg'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('failedMsg') }}
                            </div>
                        @endif
                        <div class="card ">
                            <div class="card-header">
                                <h4 class="card-title">Add Fund Form</h4>
                                <p>USDT BEP20</p>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('instantFunds') }}" method="post" enctype="multipart/form-data"
                                        class="myForm">
                                        <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Amount</label>
                                            <input type="number" class="form-control" name="amount" min="0"
                                                placeholder="Enter Your Amount" required>
                                            @error('amount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Liberfx PIN</label>
                                            <input type="password" class="form-control" placeholder="Enter Liberfx PIN"
                                                name="pin" required>
                                            @error('pin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" name="memberid" value="{{ $data['memberid'] }}">
                                            <button
                                                class="btn btn-primary btn-rounded btn-block mt-3 float-end subBtn">Import
                                                Funds</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Fund History</h4>
                            </div>
                            <div class="card-body" style="overflow:auto">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Date</th>
                                                <th>Order Id</th>
                                                <th>Txn Id</th>
                                                <th>Amount</th>
                                                <th>Type</th>
                                                <th>Mode</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($addfundData as $list)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}</td>
                                                    <td>{{ $list['orderid'] }}</td>
                                                    <td>{{ $list['txnid'] }}</td>
                                                    <td>{{ $list['amount'] }}</td>
                                                    <td>{{ $list['type'] }}</td>
                                                    <td>{{ $list['mode'] }}</td>
                                                    <td><span class="btn btn-success">{{ $list['status'] }}</span></td>
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
    <!--**********************************
                                                                        Content body end
                                                                    ***********************************-->
@endsection
