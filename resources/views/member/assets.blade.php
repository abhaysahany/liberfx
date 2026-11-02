@extends('member.layouts.main')
@section('title', 'Trading Pair')
@section('container')

    <!--**********************************
                                                                                                                                                                                        Content body start
                                                                                                                                                                                    ***********************************-->
    <div class="content-body assets-page">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    @if (session()->has('PassMsg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('PassMsg') }}
                        </div>
                    @endif
                    @if (session()->has('ErrorMsg'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('ErrorMsg') }}
                        </div>
                    @endif
                    <div class="col-xl-12">
                        <div class="card assets-main-card">
                            <div
                                class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0 align-items-center">
                                <h6 class="mb-0 fw-bold assets-title">User Trading</h6>
                            </div>
                            <div class="card-body trade-table-wrap">

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="OpenOrder">
                                        <table
                                            class="priceTable table table-hover custom-table table-bordered align-middle mb-0"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Currency Pair</th>
                                                    <th>Lot Size</th>
                                                    <th>Avg. Price</th>
                                                    <th>Balance</th>
                                                    <th>Trading Mode</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- <tr>
                                                    <td><i class="icon ion-md-star"></i> USDT BEP20</td>
                                                    <td>$ {{ $data['wallet'] }}</td>
                                                    <td>0.0000</td>
                                                    <td class="green">$ {{ $data['wallet'] }}</td>
                                                    <td style="width: 10%"> <a href="{{ url('/member/add-funds') }}"
                                                            class="btn btn-warning py-1"> Import Funds</a>
                                                        <a href="{{ url('/member/wallet') }}"
                                                            class="btn btn-black py-1">Withdrawal</a>
                                                    </td>

                                                </tr> --}}
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'EURUSD');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> EURUSD</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURUSD')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURUSD')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURUSD')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/EURUSD') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/EURUSD') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>

                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'USDJPY');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> USDJPY</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'USDJPY')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'USDJPY')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'USDJPY')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/USDJPY') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/USDJPY') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'USDCHF');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> USDCHF</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'USDCHF')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'USDCHF')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'USDCHF')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/USDCHF') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/USDCHF') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'AUDUSD');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> AUDUSD</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'AUDUSD')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'AUDUSD')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'AUDUSD')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/AUDUSD') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/AUDUSD') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'NZDUSD');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> NZDUSD</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'NZDUSD')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'NZDUSD')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'NZDUSD')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/NZDUSD') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/NZDUSD') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'USDCAD');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> USDCAD</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'USDCAD')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'USDCAD')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'USDCAD')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/USDCAD') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/USDCAD') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'GBPUSD');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> GBPUSD</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPUSD')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPUSD')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPUSD')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/GBPUSD') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/GBPUSD') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'EURGBP');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> EURGBP</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURGBP')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURGBP')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURGBP')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/EURGBP') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/EURGBP') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'EURJPY');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> EURJPY</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURJPY')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURJPY')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURJPY')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/EURJPY') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/EURJPY') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'EURCHF');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> EURCHF</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURCHF')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURCHF')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURCHF')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/EURCHF') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/EURCHF') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'GBPCHF');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> GBPCHF</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPCHF')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPCHF')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPCHF')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/GBPCHF') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/GBPCHF') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'GBPMXN');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> GBPMXN</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPMXN')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPMXN')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPMXN')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/GBPMXN') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/GBPMXN') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'GBPNZD');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> GBPNZD</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPNZD')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPNZD')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPNZD')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/GBPNZD') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/GBPNZD') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'GBPZAR');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> GBPZAR</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPZAR')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPZAR')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPZAR')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/GBPZAR') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/GBPZAR') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'NZDCAD');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> NZDCAD</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'NZDCAD')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'NZDCAD')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'NZDCAD')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/NZDCAD') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/NZDCAD') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'NZDCHF');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> NZDCHF</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'NZDCHF')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'NZDCHF')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'NZDCHF')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/NZDCHF') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/NZDCHF') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'NZDJPY');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> NZDJPY</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'NZDJPY')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'NZDJPY')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'NZDJPY')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/NZDJPY') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/NZDJPY') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'USDMXN');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> USDMXN</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'USDMXN')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'USDMXN')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'USDMXN')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/USDMXN') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/USDMXN') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'USDZAR');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> USDZAR</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'USDZAR')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'USDZAR')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'USDZAR')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a href="{{ url('member/exchange/forex/USDZAR') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/USDZAR') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'ZARJPY');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> ZARJPY</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'ZARJPY')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'ZARJPY')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'ZARJPY')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a
                                                            href="{{ url('member/exchange/forex/ZARJPY') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/ZARJPY') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'XAUUSD');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> XAUUSD</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'XAUUSD')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'XAUUSD')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'XAUUSD')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a
                                                            href="{{ url('member/exchange/forex/XAUUSD') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/XAUUSD') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'AUDCHF');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> AUDCHF</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'AUDCHF')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'AUDCHF')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'AUDCHF')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a
                                                            href="{{ url('member/exchange/forex/AUDCHF') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/AUDCHF') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'AUDMZD');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> AUDMZD</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'AUDMZD')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'AUDMZD')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'AUDMZD')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a
                                                            href="{{ url('member/exchange/forex/AUDMZD') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/AUDMZD') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'CADCHF');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> CADCHF</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'CADCHF')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'CADCHF')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'CADCHF')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a
                                                            href="{{ url('member/exchange/forex/CADCHF') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/CADCHF') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'EURCAD');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> EURCAD</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURCAD')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURCAD')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURCAD')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a
                                                            href="{{ url('member/exchange/forex/EURCAD') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/EURCAD') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'EURMXN');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> EURMXN</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURMXN')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURMXN')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURMXN')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a
                                                            href="{{ url('member/exchange/forex/EURMXN') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/EURMXN') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>

                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'EURNZD');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> EURNZD</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURNZD')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURNZD')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURNZD')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a
                                                            href="{{ url('member/exchange/forex/EURNZD') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/EURNZD') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'EURZAR');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> EURZAR</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURZAR')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURZAR')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'EURZAR')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a
                                                            href="{{ url('member/exchange/forex/EURZAR') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/EURZAR') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'GBPCAD');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> GBPCAD</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPCAD')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPCAD')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPCAD')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a
                                                            href="{{ url('member/exchange/forex/GBPCAD') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/GBPCAD') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $assets_data = assetsData($data['memberid'], 'GBPCHF');
                                                @endphp
                                                <tr>
                                                    <td><i class="icon ion-md-star"></i> GBPCHF</td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPCHF')
                                                            {{ $assets_data['quantity'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPCHF')
                                                            {{ $assets_data['avg_price'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="text-success">
                                                        @if ($assets_data != null && $assets_data['coins'] == 'GBPCHF')
                                                            {{ $assets_data['total_value'] }}
                                                        @else
                                                            0.0000
                                                        @endif
                                                    </td>
                                                    <td class="trade-action-col"> <a
                                                            href="{{ url('member/exchange/forex/GBPCHF') }}"
                                                            class="btn btn-sm btn-success py-1 trade-action-btn">Buy
                                                        </a>
                                                        <a href="{{ url('member/exchange/forex/GBPCHF') }}"
                                                            class="btn btn-sm btn-danger py-1 trade-action-btn">Sell</a>
                                                    </td>
                                                </tr>

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

