@extends('member.layouts.main')
@section('title', 'Fund Request')
@section('container')

    <!--**********************************
                                                   Content body start
                                                                      ***********************************-->

    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="col-xl-12 col-lg-12 mb-3">
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
                        <div class="card">
                            <div
                                class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom align-items-center flex-wrap">
                                <h6 class="mb-0 fw-bold ms-lg-4">Fund Request Form</h6>

                                <ul class="nav nav-tabs tab-body-header rounded d-inline-flex" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#Margin"
                                            role="tab">USDT BEP20</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Future"
                                            role="tab">USDT TRC20</a></li>
                                    <li class="nav-item"><a class="nav-link " data-bs-toggle="tab" href="#Spot"
                                            role="tab">BTC</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#P2P"
                                            role="tab">Tron</a></li>

                                </ul>
                            </div>
                            <div class="card-body px-lg-5">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="Margin">
                                        <div class="row g-3 justify-content-between">
                                            <div class="col-xl-6 col-lg-6 col-12">

                                                <form action="{{ route('FundReq') }}" enctype="multipart/form-data"
                                                    method="post" class="row g-4 myForm">
                                                    @csrf
                                                    <div class="col-12 mt-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Amount</label>
                                                            <input type="number" class="form-control" name="amount"
                                                                min="0" placeholder="Enter Your Amount">
                                                            @error('amount')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Transaction Id</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Transaction Id" name="txnid">
                                                            @error('txnid')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Select Wallet</label>
                                                            <select class="form-select" name="wallet_type" required>
                                                                <option value="" disabled
                                                                    {{ old('wallet_type') ? '' : 'selected' }}>Choose a
                                                                    wallet
                                                                </option>
                                                                <option value="p2p_wallet"
                                                                    {{ old('wallet_type') === 'p2p_wallet' ? 'selected' : '' }}>
                                                                    Fund Wallet
                                                                </option>
                                                                <option value="exng_wallet"
                                                                    {{ old('wallet_type') === 'exng_wallet' ? 'selected' : '' }}>
                                                                    Trading Wallet
                                                                </option>
                                                            </select>
                                                            @error('wallet_type')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Payment Slip Screenshot</label>
                                                            <input class="form-control" type="file" name="image"
                                                                id="formFile">
                                                            @error('image')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                        <input type="hidden" class="form-control" name="coin"
                                                            value="USDT BEP20">
                                                        <button type="submit"
                                                            class="btn btn-primary text-uppercase px-5 float-end subBtn">Send
                                                            Request</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-lg-5 mt-4 text-center ">
                                                <img src="{{ asset('coin-stat') }}/{{ $walletdata[2]['image'] }}"
                                                    alt="barcode" class="text-center mx-auto" style="max-width: 300px;">
                                                <br>
                                                <h6 class="mt-4">{{ $walletdata[2]['coin'] }} Wallet Address: <br><span
                                                        class="text-muted"
                                                        id="codeMain">{{ $walletdata[2]['address'] }}</span><br><span
                                                        id="copyWalletAddId"><i class="ti-files"></i> <span
                                                            id="msgAddress3">
                                                            CopyText</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Future">
                                        <div class="row g-3 justify-content-between">
                                            <div class="col-xl-6 col-lg-6 col-12">

                                                <form action="{{ route('FundReq') }}" enctype="multipart/form-data"
                                                    method="post" class="row g-4 myForm">
                                                    @csrf
                                                    <div class="col-12 mt-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Amount</label>
                                                            <input type="number" class="form-control" name="amount"
                                                                min="0" placeholder="Enter Your Amount">
                                                            @error('amount')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Transaction Id</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Transaction Id" name="txnid">
                                                            @error('txnid')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Select Wallet</label>
                                                            <select class="form-select" name="wallet_type" required>
                                                                <option value="" disabled
                                                                    {{ old('wallet_type') ? '' : 'selected' }}>Choose a
                                                                    wallet
                                                                </option>
                                                                <option value="p2p_wallet"
                                                                    {{ old('wallet_type') === 'p2p_wallet' ? 'selected' : '' }}>
                                                                    Fund Wallet
                                                                </option>
                                                                <option value="exng_wallet"
                                                                    {{ old('wallet_type') === 'exng_wallet' ? 'selected' : '' }}>
                                                                    Trading Wallet
                                                                </option>
                                                            </select>
                                                            @error('wallet_type')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Payment Slip Screenshot</label>
                                                            <input class="form-control" type="file" name="image"
                                                                id="formFile">
                                                            @error('image')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                        <input type="hidden" class="form-control" name="coin"
                                                            value="USDT TRC20">
                                                        <button type="submit"
                                                            class="btn btn-primary text-uppercase px-5 float-end subBtn">Send
                                                            Request</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-lg-5 mt-4 text-center">
                                                <img src="{{ asset('coin-stat') }}/{{ $walletdata[3]['image'] }}"
                                                    alt="barcode"  class="text-center mx-auto" style="max-width: 300px;">
                                                <br>
                                                <h6 class="mt-4">{{ $walletdata[3]['coin'] }} Wallet Address: <br><span
                                                        class="text-muted"
                                                        id="codeMain4">{{ $walletdata[3]['address'] }}</span><br><span
                                                        id="copyWalletAddId4"><i class="ti-files"></i> <span
                                                            id="msgAddress4">
                                                            CopyText</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="Spot">
                                        <div class="row g-3 justify-content-between">
                                            <div class="col-xl-6 col-lg-6 col-12">
                                                {{-- <div class="py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                                        <h6 class="mb-0 fw-bold "></h6>
                                                    </div> --}}
                                                <form action="{{ route('FundReq') }}" enctype="multipart/form-data"
                                                    method="post" class="row g-4 myForm">
                                                    @csrf
                                                    <div class="col-12 mt-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Amount</label>
                                                            <input type="number" class="form-control" name="amount"
                                                                min="0" step=".005"
                                                                placeholder="Enter Your Amount">
                                                            @error('amount')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Transaction Id</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Transaction Id" name="txnid">
                                                            @error('txnid')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Select Wallet</label>
                                                            <select class="form-select" name="wallet_type" required>
                                                                <option value="" disabled
                                                                    {{ old('wallet_type') ? '' : 'selected' }}>Choose a
                                                                    wallet
                                                                </option>
                                                                <option value="p2p_wallet"
                                                                    {{ old('wallet_type') === 'p2p_wallet' ? 'selected' : '' }}>
                                                                    Fund Wallet
                                                                </option>
                                                                <option value="exng_wallet"
                                                                    {{ old('wallet_type') === 'exng_wallet' ? 'selected' : '' }}>
                                                                    Trading Wallet
                                                                </option>
                                                            </select>
                                                            @error('wallet_type')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Payment Slip Screenshot</label>
                                                            <input class="form-control" type="file" name="image"
                                                                id="formFile">
                                                            @error('image')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                        <input type="hidden" class="form-control" name="coin"
                                                            value="BTC">
                                                        <button type="submit"
                                                            class="btn btn-primary text-uppercase px-5 float-end subBtn">Send
                                                            Request</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-lg-5 mt-4 text-center">
                                                <img src="{{ asset('coin-stat') }}/{{ $walletdata[0]['image'] }}"
                                                    alt="barcode" class="text-center mx-auto" style="max-width: 300px;">
                                                <br>
                                                <h6 class="mt-4">{{ $walletdata[0]['coin'] }} Wallet Address: <br><span
                                                        class="text-muted"
                                                        id="codeRight">{{ $walletdata[0]['address'] }}</span><br><span
                                                        id="copyWalletAddressId"><i class="ti-files"></i> <span
                                                            id="msgAddress">
                                                            CopyText</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="P2P">
                                        <div class="row g-3 justify-content-between">
                                            <div class="col-xl-6 col-lg-6 col-12">

                                                <form action="{{ route('FundReq') }}" enctype="multipart/form-data"
                                                    method="post" class="row g-4 myForm">
                                                    @csrf
                                                    <div class="col-12 mt-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Amount</label>
                                                            <input type="number" class="form-control" name="amount"
                                                                min="0" placeholder="Enter Your Amount">
                                                            @error('amount')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Transaction Id</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Transaction Id" name="txnid">
                                                            @error('txnid')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Select Wallet</label>
                                                            <select class="form-select" name="wallet_type" required>
                                                                <option value="" disabled
                                                                    {{ old('wallet_type') ? '' : 'selected' }}>Choose a
                                                                    wallet
                                                                </option>
                                                                <option value="p2p_wallet"
                                                                    {{ old('wallet_type') === 'p2p_wallet' ? 'selected' : '' }}>
                                                                    Fund Wallet
                                                                </option>
                                                                <option value="exng_wallet"
                                                                    {{ old('wallet_type') === 'exng_wallet' ? 'selected' : '' }}>
                                                                    Trading Wallet
                                                                </option>
                                                            </select>
                                                            @error('wallet_type')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Payment Slip Screenshot</label>
                                                            <input class="form-control" type="file" name="image"
                                                                id="formFile">
                                                            @error('image')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                        <input type="hidden" class="form-control" name="coin"
                                                            value="Tron">
                                                        <button type="submit"
                                                            class="btn btn-primary text-uppercase px-5 float-end subBtn">Send
                                                            Request</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-lg-5 mt-4 text-center">
                                                <img src="{{ asset('coin-stat') }}/{{ $walletdata[1]['image'] }}"
                                                    alt="barcode"  class="text-center mx-auto" style="max-width: 300px;">
                                                <br>
                                                <h6 class="mt-4">{{ $walletdata[1]['coin'] }} Wallet Address: <br><span
                                                        class="text-muted"
                                                        id="codeLeft">{{ $walletdata[1]['address'] }}</span><br><span
                                                        id="copyWallAddressId"><i class="ti-files"></i> <span
                                                            id="msgAddress2">
                                                            CopyText</span></h6>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Fund Request</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Date</th>
                                                <th>Coin</th>
                                                <th>Txn Id</th>
                                                <th>Amount</th>
                                                <th>USDT Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($fundData as $list)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($list['date'])) }}</td>
                                                    <td>{{ $list['coin'] }}</td>
                                                    <td>{{ $list['tran_id'] }}</td>
                                                    <td>{{ $list['amount'] }} {{ $list['coin'] }}</td>
                                                    <td>${{ $list['usdt_amount'] }} </td>
                                                    <td>
                                                        @if ($list['status'] == 'Accepted')
                                                            <span class="btn btn-success">{{ $list['status'] }}</span>
                                                        @elseif ($list['status'] == 'Cancelled')
                                                            <span class="btn btn-danger">{{ $list['status'] }}</span>
                                                        @else
                                                            <span class="btn btn-info">{{ $list['status'] }}</span>
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
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Content body end
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ***********************************-->
    <script>
        window.addEventListener('load', function() {
            if (typeof jQuery !== 'undefined' && $.fn.dataTable) {
                if ($.fn.dataTable.isDataTable('#responsiveTable')) {
                    $('#responsiveTable').DataTable().destroy();
                    $('#responsiveTable').removeClass('dataTable');
                }
                $('#responsiveTable').DataTable({
                    responsive: true,
                    scrollX: true,
                    autoWidth: false,
                    language: {
                        paginate: {
                            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                        }
                    }
                });
            }
        });
    </script>
@endsection
