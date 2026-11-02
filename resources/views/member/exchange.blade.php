@extends('member.layouts.main2')
@section('title', 'Trade')
@section('container')

    <!--**********************************Content body start***********************************-->
    <input type="hidden" id="excType" value="{{ $type }}">
    <input type="hidden" id="varToken" value="{{ $token }}">
    <input type="hidden" id="token_csrf" value="{{ csrf_token() }}">
    <input type="hidden" id="symbol" value="{{ str_replace('/', '', $token) }}">
    <input type="hidden" name="memberid" id="memberid" value="{{ $data['memberid'] }}">
    <input type="hidden" id="coin_price" value="{{ $coin_price }}">
    <div class="content-body">
        <div class="container-fluid">
            @if (session()->has('model') && $first_image)
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"
                    data-bs-backdrop="static" data-bs-keyboard="false" id="getCodeModal">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Welcome to Liberfx</h5>
                                <a href="{{ url('/member/delete-session') }}/model">Close
                                </a>
                            </div>
                            <div class="modal-body p-0">
                                <video width="100%" height="50%" style="padding: 0px;width:100%;" controls autoplay
                                    id="myVideo">
                                    <source src="{{ asset('uploads') }}/{{ $first_image['image'] }}" type="video/mp4">
                                </video>
                            </div>

                        </div>
                    </div>
                </div>
            @else
                <!-- row -->
                <div class="row g-3 mb-3">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-sm-12  col-md-12">
                                        {{-- <div class="btn-group">
                                        <button class="btn btn-outline-white dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="h5 me-4" id="setToken">{{ $token }}</span>
                                        </button>
                                        <ul class="dropdown-menu row" aria-labelledby="dropdownMenuButton">
                                            @foreach ($coindata as $value)
                                                <li class="col-3"><a class="dropdown-item "
                                                        href="{{ url('member/exchange') }}/{{ $value['code'] }}">{{ $value['coin'] }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div> --}}
                                        <div>
                                            <select name="coin" id="setToken" class="form-control"
                                                onchange="location = this.value;" style="height: 50px">
                                                <option value="">{{ $token }}</option>
                                                @foreach ($coindata as $value)
                                                    @if ($value['coin'] == $token)
                                                    @else
                                                        <option>
                                                            <a href="{{ url('member/exchange') }}/{{ $value['coin'] }}">
                                                                {{ $value['coin'] }}</a>
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Row End -->
                <div class="row g-3 mb-3">
                    <div class="col-md-12 vh-100">
                        @php
                            $currency = $prefix . ':' . $token;
                        @endphp
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container" style="height:100%;width:100%">
                            <div class="tradingview-widget-container__widget" style="height:calc(100% - 32px);width:100%">
                            </div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                                {
                                    "autosize": true,
                                    "symbol": "{{ $currency }}",
                                    "interval": "1",
                                    "timezone": "Etc/UTC",
                                    "theme": "dark",
                                    "style": "1",
                                    "locale": "en",
                                    "enable_publishing": false,
                                    "withdateranges": true,
                                    "hide_side_toolbar": false,
                                    "allow_symbol_change": false,
                                    "calendar": false,
                                    "support_host": "https://www.tradingview.com"
                                }
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                      @if ($type == 'forex')
                    <div class="col-xl-12 my-4">
                        <div class="row" style="justify-content:space-between;">
                            <div class="col-4" style="padding-right: 5px;" id="SellLots">
                                <div class="col-12 pe-2 excBox"
                                    style="text-align:end;background:linear-gradient(to bottom right,red,#8d0a13);border-top-left-radius: 50rem !important;border-bottom-left-radius: 50rem !important;border-top-right-radius: 80px;border-bottom-right-radius: 80px;cursor: pointer;">
                                    <h6 class="pe-2 pt-2" style="font-weight:500;margin-bottom: 0px;">SELL</h6>
                                    {{-- <p class="pe-2 pb-2" style="font-size:16px" id="SellAsset">
                                        {{ number_format($assets, 2, '.', '') }}</p> --}}
                                            <p  class="pe-2 pb-2" style="font-size:16px"  id="SellAsset">
                                        {{ number_format($data['exng_wallet'], 2, '.', '') }}</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row"
                                    style="justify-content:space-between;background:radial-gradient(circle,black 0%,black 40%,rgba(255,255,255,.075) 100%);border-radius: 3px;height:59.2px">
                                    <div class="col-2 text-dark" id="minusBtn"
                                        style="font-size:22px;display: flex;justify-content: center;align-items: center;cursor:pointer">
                                        -
                                    </div>
                                    <div class="col-6" style="text-align: center">
                                        <h6 class="pe-2 text-dark pt-2" style="font-weight:500;margin-bottom: 0px;">LOTS
                                        </h6>
                                        <p class="pe-2 text-dark" id="lotval">0.00</p>
                                    </div>
                                    <div class="col-2 text-dark" id="plusBtn"
                                        style="font-size:22px;display: flex;justify-content: center;align-items: center;cursor:pointer">
                                        +
                                    </div>
                                </div>
                            </div>
                            <div class="col-4" style="padding-left: 5px;" id="BuyLots">
                                <div class="col-12 ps-2 excBox"
                                    style="text-align:left;background:linear-gradient(to bottom right, #00b300, #055a43);border-top-right-radius: 50rem !important;border-bottom-right-radius: 50rem !important;border-top-left-radius: 80px;border-bottom-left-radius: 80px;cursor: pointer;">
                                    <h6 class="ps-2 pt-2" style="font-weight:500;margin-bottom: 0px;">BUY</h6>
                                    <p class="ps-2 pb-2" style="font-size:16px" id="WalBal">
                                        {{ number_format($data['exng_wallet'], 2, '.', '') }}</p>
                                </div>
                            </div>
                            <span id="BuyErr" class="text-danger text-center"></span>
                            <span id="SellErr" class="text-danger text-center"></span>
                        </div>
                    </div>
                @endif
                @if ($type == 'crypto')
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title mb-0">Buy Currency</h4>
                            </div>
                            <div class="card-body pt-2">
                                <div class="d-flex align-items-center justify-content-between mt-3 mb-2">
                                    <span class="small text-muted">Avbl Balance</span>
                                    <span class="text-dark">{{ $data['exng_wallet'] }} USDT</span>
                                </div>
                                {{-- <form> --}}
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Price</span>
                                    <input type="text" class="form-control" value="Market Price" readonly>
                                    <span class="input-group-text">USDT</span>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Amount</span>
                                    <input type="number" class="form-control" placeholder="Amount" id="market_buy_amount"
                                        name="amount">
                                    <span class="input-group-text">USDT</span>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="mb-2 d-flex justify-content-between align-items-center w-100">
                                        <span class="text-muted">0%</span>
                                        <span class="text-muted px-2">25%</span>
                                        <span class="text-muted px-1">50%</span>
                                        <span class="text-muted px-1">75%</span>
                                        <span class="text-muted">100%</span>
                                    </div>
                                    <input type="range" class="form-range" value="{{ $data['exng_wallet'] }}"
                                        min='0' step='0.0001' max="{{ $data['exng_wallet'] }}"
                                        id="market_buy_range">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Total</span>
                                    <input type="number" class="form-control" id="market_tot_bal" value="0.0000"
                                        readonly>
                                    <span class="input-group-text">USDT</span>
                                </div>
                                <div class="mt-4 d-flex justify-content-between">
                                    {{-- <small id="price-msg-mar" class="text-danger mt-0 pt-0"></small> --}}
                                    <input type="hidden" name="memberid" id="memberid"
                                        value="{{ $data['memberid'] }}">
                                    <input type="hidden" name="token" id="token" value="{{ $token }}">
                                    <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                    <button class="btn btn-success btn-sm light text-uppercase btn-block me-3"
                                        id="buyMarketBtn">BUY {{ $token }}</button>
                                </div>
                                <p id="price-msg-mar" class="text-danger"></p><br>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title mb-0">Sell Currency</h4>
                            </div>
                            <div class="card-body pt-2">
                                <div class="d-flex align-items-center justify-content-between mt-3 mb-2">
                                    <span class="small text-muted">Avbl Quantity</span>
                                    <span class="text-dark">{{ number_format($assets, 4) }} {{ $token }}
                                    </span>
                                </div>
                                {{-- <form> --}}
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Price</span>
                                    <input type="text" class="form-control" value="Market Price" readonly>
                                    <span class="input-group-text">USDT</span>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Quantity</span>
                                    <input type="number" class="form-control" placeholder="Quantity"
                                        id="market_quantity_sell" name="quantity">
                                    <span class="input-group-text">{{ $token }}</span>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="mb-2 d-flex justify-content-between align-items-center w-100">
                                        <span class="text-muted">0%</span>
                                        <span class="text-muted px-2">25%</span>
                                        <span class="text-muted px-1">50%</span>
                                        <span class="text-muted px-1">75%</span>
                                        <span class="text-muted">100%</span>
                                    </div>
                                    <input type="range" class="form-range" min='0' value="{{ $assets }}"
                                        step='0.0001' max="{{ $assets }}" id="market_sell_range">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Total</span>
                                    <input type="number" class="form-control" id="market_total_sell" value="0.0000"
                                        readonly>
                                    <span class="input-group-text">{{ $token }}</span>
                                </div>
                                <div class="mt-4 d-flex justify-content-between">
                                    <input type="hidden" name="memberid" id="memberid"
                                        value="{{ $data['memberid'] }}">
                                    <input type="hidden" name="total_assets" id="total_assets"
                                        value="{{ $assets }}">
                                    <input type="hidden" name="token" id="token" value="{{ $token }}">
                                    <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                    <button class="btn btn-danger btn-sm light text-uppercase btn-block"
                                        id="sellMarketBtn">SELL {{ $token }}</button>
                                </div>
                                <p id="sell-market-msg" class="text-danger"></p><br>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                @endif
                </div><!-- Row End -->
            @endif
        </div>
    </div>
    <!--**********************************Content body end***********************************-->
    <!--**********************************Footer start***********************************-->
    <div class="footer style-1">
        <div class="copyright">
            <p>Copyright © {{ config('detailsApp.name') }} <span class="current-year">2026</span></p>
        </div>
    </div>
    <!--**********************************Footer end ***********************************-->
    <!--**********************************Support ticket button start ***********************************-->
    <!--********************************** Support ticket button end***********************************-->
    </div>
    <!--**********************************Main wrapper end***********************************-->

    <!--**********************************Scripts***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('uassets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('uassets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('uassets/js/custom.min.js') }}"></script>
    <script src="{{ asset('uassets/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('uassets/js/demo.js') }}"></script>

    <!-- Jquery Page Js -->
    <script src="{{ asset('uassets/js/exchange/template.js') }}"></script>
    <script src="{{ asset('uassets/js/exchange/index.js') }}"></script>
    <script src="{{ asset('uassets/js/exchange/exchange.js') }}"></script>
    <script type="text/javascript" src="{{ asset('charting_library/charting_library.standalone.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datafeeds/udf/dist/bundle.js') }}"></script>
    <!-- code-highlight -->
    <script src="{{ asset('uassets/js/highlight.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('uassets/main.js') }}"></script>
    <script>
        hljs.highlightAll();
    </script>
    <script>
        jQuery(document).ready(function() {
            setTimeout(function() {
                dlabSettingsOptions.version = 'dark';
                new dlabSettings(dlabSettingsOptions);
                setCookie('version', 'dark');
            }, 1500000)
        });
    </script>
    <script type="text/javascript">
        var tok = document.getElementById('setToken').innerHTML;
        var token = tok.replace("/", "");

        function getParameterByName(name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
            return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }

        function initOnReady() {

            var datafeedUrl = "{{ url('/') }}";
            // var datafeedUrl = "https://demo-feed-data.tradingview.com/";
            var customDataUrl = getParameterByName('dataUrl');
            if (customDataUrl !== "") {
                datafeedUrl = customDataUrl.startsWith('https://') ? customDataUrl : `https://${customDataUrl}`;
            }

            var widget = window.tvWidget = new TradingView.widget({
                // debug: true, // uncomment this line to see Library errors and warnings in the console
                fullscreen: true,
                symbol: token,
                interval: '1',
                container: "tv_chart_container",

                //  BEWARE: no trailing slash is expected in feed URL
                datafeed: new Datafeeds.UDFCompatibleDatafeed(datafeedUrl, undefined, {
                    maxResponseLength: 1000,
                    expectedOrder: 'latestFirst',
                }),
                library_path: "/charting_library/",
                locale: getParameterByName('lang') || "en",

                disabled_features: ["use_localstorage_for_settings", "header_compare", "header_symbol_search"],
                enabled_features: ["study_templates"],
                charts_storage_url: 'https://saveload.tradingview.com',
                charts_storage_api_version: "1.1",
                client_id: 'tradingview.com',
                user_id: 'public_user_id',
                theme: 'light',

            });



        };

        window.addEventListener('DOMContentLoaded', initOnReady, false);
    </script>
     <script>
            const csrf = document.querySelector("#token_csrf");
            const varTok = document.querySelector("#varToken");
        </script>
        <script>
            $(document).ready(function() {
                $("#getCodeModal").modal('show');

                // $('#market_buy_range').on('input',function(){
                //     var amount = $(this).val();
                //     $('#market_buy_amount').val(amount);
                //     $('#market_tot_bal').val(amount);
                //     $('#buyTextAmount').html(amount);
                // })

                $('#plusBtn').on("click", function() {
                    var lot = parseFloat($('#lotval').html()) + 0.01;
                    $('#lotval').html(lot.toFixed(2));
                    $('#BuyErr').html('')
                    $('#SellErr').html('')
                })

                $('#plusBtn').mousedown(function() {
                    invervalId = setInterval(function() {
                        var lot = parseFloat($('#lotval').html()) + 0.01;
                        $('#lotval').html(lot.toFixed(2));
                    }, 100);


                    $('#BuyErr').html('')
                    $('#SellErr').html('')
                });

                $('#plusBtn').mouseup(function() {
                    isMouseDown = false;
                    clearInterval(invervalId);
                });

                $('#plusBtn').mouseleave(function() {
                    isMouseDown = false;
                    clearInterval(invervalId);
                });

                $('#minusBtn').on("click", function() {
                    var lot = parseFloat($('#lotval').html());
                    if (lot > 0) {
                        var lotBal = lot - 0.01;
                        $('#lotval').html(lotBal.toFixed(2));
                    }
                    $('#BuyErr').html('')
                    $('#SellErr').html('')
                })

                $('#minusBtn').mousedown(function() {
                    invervalId = setInterval(function() {
                        var lot = parseFloat($('#lotval').html());
                        if (lot > 0) {
                            var lotBal = lot - 0.01;
                            $('#lotval').html(lotBal.toFixed(2));
                        }
                    }, 100);


                    $('#BuyErr').html('')
                    $('#SellErr').html('')
                });

                $('#minusBtn').mouseup(function() {
                    isMouseDown = false;
                    clearInterval(invervalId);
                });

                $('#minusBtn').mouseleave(function() {
                    isMouseDown = false;
                    clearInterval(invervalId);
                });

                $('#BuyLots').on("click", function() {
                    // $('.main-content .container-fluid').empty();
                    // $('.main-content .container-fluid').append('<center><div class="d-flex justify-content-center mb-4"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div></center>');
                    var lot = parseFloat($('#lotval').html());
                    var walBal = parseFloat($('#WalBal').html());
                    var d = new Date();
                    var day = d.getDay();
                    if (day == 6 || day == 0) {
                        return swal("Watchout!", 'Trade not allowed on saturday and sunday', "error");
                    }
                    if (lot == 0) {
                        return swal("Watchout!", 'Lots must be greater than 0', "error");
                    }
                    if (lot > walBal) {
                        $('#BuyErr').html('Lot must not be greater than wallet')
                    } else {
                        $('#loader').css('display', 'flex');
                        $('#loader').removeClass('d-none');
                        var amount = lot;
                        var memberid = $('#memberid').val();
                        var token = $('#varToken').val();
                        var csrf = $('#token_csrf').val();
                        setTimeout(() => {
                            $.ajax({
                                url: "{{ route('placeMarketOrder') }}",
                                type: 'POST',
                                async: false,
                                data: {
                                    'memberid': memberid,
                                    'amount': amount,
                                    'token': token,
                                    '_token': csrf,
                                },
                                success: function(response) {
                                    $('#loader').css('display', 'none');
                                    $('#loader').addClass('d-none');
                                    if (response['code'] == 1) {
                                        swal("Success", response['message'], "success")
                                            .then(function() {
                                                window.location.reload()
                                            });
                                    } else {
                                        swal("Watchout", response['message'], "error")
                                            .then(function() {
                                                window.location.reload()
                                            }).delay(500);
                                    }
                                },
                                error: function() {
                                    alert('there is error');
                                }
                            });
                        }, 3000);
                        $('#BuyErr').html('')
                    }
                    $('#SellErr').html('')
                })

                $('#SellLots').on("click", function() {
                    var lot = parseFloat($('#lotval').html());
                    // var walBal = parseFloat($('#SellAsset').html());
                     var walBal = parseFloat($('#WalBal').html());
                    var d = new Date();
                    var day = d.getDay();
                    if (day == 6 || day == 0) {
                        return swal("Watchout!", 'Trade not allowed on saturday and sunday', "error");
                    }
                    if (lot == 0) {
                        return swal("Watchout!", 'Lots must be greater than 0', "error");
                    }
                    if (lot > walBal) {
                        // $('#SellErr').html('Lot must not be greater than sell quantity')
                        $('#SellErr').html('Lot must not be greater than wallet')
                    } else {
                        $('#loader').css('display', 'flex');
                        $('#loader').removeClass('d-none');
                        var quantity = lot;
                        var memberid = $('#memberid').val();
                        var token = $('#varToken').val();
                        var csrf = $('#token_csrf').val();
                        // if (!quantity) {
                        //     $('#sellMarketBtn').html('SELL');
                        //     return swal("Watchout!", 'Enter quantity to sell', "error");
                        // }
                        setTimeout(() => {
                            $.ajax({
                                url: "{{ route('sellMarketOrder') }}",
                                type: 'POST',
                                async: false,
                                data: {
                                    'memberid': memberid,
                                    'quantity': quantity,
                                    'token': token,
                                    '_token': csrf,
                                },
                                success: function(response) {
                                    $('#loader').css('display', 'none');
                                    $('#loader').addClass('d-none');
                                    if (response['code'] == 1) {
                                        swal("Success", response['message'], "success")
                                            .then(function() {
                                                window.location.reload()
                                            });
                                    } else {
                                        swal("Watchout", response['message'], "error")
                                            .then(function() {
                                                window.location.reload()
                                            });
                                    }

                                },
                                error: function() {
                                    alert('there is error');
                                }
                            });
                        }, 3000);
                        $('#SellErr').html('')
                    }
                    $('#BuyErr').html('')
                })

                $('#buyLimitBtn').on('click', function() {
                    $('#buyLimitBtn').html('Processing ......');
                    var price = $('#limit_price').val();
                    var amount = $('#buy_amount').val();
                    var memberid = $('#memberid').val();
                    var token = $('#token').val();
                    var csrf = $('#csrf').val();

                    if (!price) {
                        $('#buyLimitBtn').html('BUY');
                        return swal("Watchout!", "Enter Limit Price", "error");
                    }
                    if (!amount) {
                        $('#buyLimitBtn').html('BUY');
                        return swal("Watchout!", 'Enter amount to buy', "error");
                    }
                    $.ajax({
                        url: "{{ route('placeLimitOrder') }}",
                        type: 'POST',
                        async: false,
                        data: {
                            'memberid': memberid,
                            'amount': amount,
                            'price': price,
                            'token': token,
                            '_token': csrf,
                        },
                        success: function() {
                            swal("Success", 'Order has been placed successfully', "success")
                                .then(function() {
                                    window.location.reload()
                                });
                        },
                        error: function() {
                            alert('there is error');
                        }
                    });
                });

                //Buy market orders function
                $('#buyMarketBtn').on('click', function() {
                    $('#buyMarketBtn').html('Processing ......');
                    var amount = $('#market_buy_amount').val();
                    var memberid = $('#memberid').val();
                    var token = $('#token').val();
                    var csrf = $('#csrf').val();
                    var today = new Date();

                    // if (today.getDay() == 6 || today.getDay() == 0) {
                    //     return swal("Watchout!", 'Trading off on saturday and sunday', "error").then(
                    // function() {
                    //         location.reload();
                    //     });
                    // };

                    if (!amount) {
                        $('#buyMarketBtn').html('BUY');
                        return swal("Watchout!", 'Enter amount to buy', "error");
                    }
                    $.ajax({
                        url: "{{ route('placeMarketOrder') }}",
                        type: 'POST',
                        async: false,
                        data: {
                            'memberid': memberid,
                            'amount': amount,
                            'token': token,
                            '_token': csrf,
                        },

                        success: function(response) {
                            if (response['code'] == 1) {
                                swal("Success", response['message'], "success")
                                    .then(function() {
                                        window.location.reload()
                                    });
                            } else {
                                swal("Watchout", response['message'], "error")
                                    .then(function() {
                                        window.location.reload()
                                    }).delay(500);
                            }

                        },
                        error: function() {
                            alert('there is error');
                        }
                    });
                })

                //Sell limit orders functions
                $('#sellLimitBtn').on('click', function() {
                    $('#sellLimitBtn').html('Processing ......')
                    var price = $('#limit_price_sell').val();
                    var quantity = $('#limit_quant_sell').val();
                    var memberid = $('#memberid').val();
                    var token = $('#token').val();
                    var csrf = $('#csrf').val();

                    if (!price) {
                        $('#sellLimitBtn').html('SELL');
                        return swal("Watchout!", "Enter Limit Price", "error");
                    }
                    if (!quantity) {
                        $('#sellLimitBtn').html('SELL');
                        return swal("Watchout!", 'Enter quantity to sell', "error");
                    }
                    $.ajax({
                        url: "{{ route('sellLimitOrder') }}",
                        type: 'POST',
                        async: false,
                        data: {
                            'memberid': memberid,
                            'quantity': quantity,
                            'price': price,
                            'token': token,
                            '_token': csrf,
                        },
                        success: function() {
                            swal("Success", 'Order has been placed successfully', "success")
                                .then(function() {
                                    window.location.reload()
                                });
                        },
                        error: function() {
                            alert('there is error');
                        }
                    });
                });

                //Sell market orders function
                $('#sellMarketBtn').on('click', function() {
                    $('#sellMarketBtn').html('Processing ......')
                    var quantity = $('#market_quantity_sell').val();  
                    var memberid = $('#memberid').val();
                    var token = $('#token').val();
                    var csrf = $('#csrf').val();
                    if (!quantity) {
                        $('#sellMarketBtn').html('SELL');
                        return swal("Watchout!", 'Enter quantity to sell', "error");
                    }
                    var today = new Date();

                    // if (today.getDay() == 6 || today.getDay() == 0) {
                    //     return swal("Watchout!", 'Trading off on saturday and sunday', "error").then(
                    // function() {
                    //         location.reload();
                    //     });
                    // };
                    $.ajax({
                        url: "{{ route('sellMarketOrder') }}",
                        type: 'POST',
                        async: false,
                        data: {
                            'memberid': memberid,
                            'quantity': quantity,
                            'token': token,
                            '_token': csrf,
                        },
                        success: function(response) {
                            if (response['code'] == 1) {
                                swal("Success", response['message'], "success")
                                    .then(function() {
                                        window.location.reload()
                                    });
                            } else {
                                swal("Watchout", response['message'], "error")
                                    .then(function() {
                                        window.location.reload()
                                    });
                            }

                        },
                        error: function() {
                            alert('there is error');
                        }
                    });
                })

            });
        </script>

    </body>

    </html>
@endsection
