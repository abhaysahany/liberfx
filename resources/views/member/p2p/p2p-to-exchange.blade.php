@extends('member.layouts.main2')
@section('title', 'Fund To Other Wallet')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                Content body start
                                                                                                                                                                                                                                                                                                                                                                                            ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row pb-3">
                {{-- <div class="col-12"> --}}
                <div class="col-xl-5 col-lg-5 ">
                    <div class="card wallet-details-card cyberpunk-p2p-exchange"
                        style="background: linear-gradient(135deg, rgba(20,5,60,0.98) 0%, rgba(35,15,80,0.98) 50%, rgba(55,35,110,0.98) 100%);
                                   backdrop-filter: blur(40px);
                                   border: 2px solid rgba(120,100,255,0.6);
                                   box-shadow: 0 0 120px rgba(120,100,255,0.5), 0 60px 120px rgba(20,5,60,0.8), inset 0 1px 0 rgba(255,255,255,0.3); 
                                   border-radius: 28px; position: relative; overflow: hidden;">
                        <style>
                            .cyberpunk-p2p-exchange {
                                animation: exchangeOrbital 6s linear infinite;
                            }

                            @keyframes exchangeOrbital {

                                0%,
                                100% {
                                    box-shadow: 0 0 120px rgba(120, 100, 255, 0.5), 0 60px 120px rgba(20, 5, 60, 0.8);
                                }

                                33% {
                                    box-shadow: 0 0 160px rgba(120, 100, 255, 0.7), 0 70px 140px rgba(20, 5, 60, 1);
                                    transform: rotateY(5deg);
                                }

                                66% {
                                    box-shadow: 0 0 200px rgba(120, 100, 255, 0.9), 0 80px 160px rgba(20, 5, 60, 1);
                                    transform: rotateX(3deg);
                                }
                            }

                            .cyberpunk-p2p-exchange:hover {
                                transform: translateY(-15px) scale(1.03) rotateZ(2deg);
                                box-shadow: 0 0 280px rgba(120, 100, 255, 1), 0 90px 180px rgba(20, 5, 60, 1);
                            }

                            .exchange-violet-glow {
                                background: linear-gradient(135deg, #7864ff, #5f48ff, #3d1fff);
                                -webkit-background-clip: text;
                                background-clip: text;
                                -webkit-text-fill-color: transparent;
                                animation: violetOrbit 4s ease-in-out infinite;
                            }

                            @keyframes violetOrbit {
                                0% {
                                    filter: brightness(1) drop-shadow(0 0 30px #7864ff);
                                }

                                50% {
                                    filter: brightness(1.4) drop-shadow(0 0 60px #5f48ff);
                                }

                                100% {
                                    filter: brightness(1) drop-shadow(0 0 30px #7864ff);
                                }
                            }

                            .exchange-transfer-metrics {
                                background: rgba(120, 100, 255, 0.18);
                                border: 1px solid rgba(120, 100, 255, 0.5);
                                backdrop-filter: blur(30px);
                            }

                            .exchange-balance-amount {
                                font-size: clamp(2rem, 5vw, 3.5rem);
                                font-weight: 950;
                                line-height: 0.95;
                            }
                        </style>
                        <div class="card-body p-5">
                            <div class="row align-items-center mb-5">
                                <div class="col-auto">
                                    <div class="exchange-icon-orb rounded-circle p-5 shadow-3xl position-relative"
                                        style="width: 100px; height: 100px; background: radial-gradient(circle, rgba(120,100,255,0.8) 0%, transparent 70%); border: 3px solid rgba(120,100,255,0.9); box-shadow: 0 0 60px rgba(120,100,255,0.9);">
                                        <div
                                            class="master-card position-absolute top-50 start-50 translate-middle scale-75">
                                            <svg width="55" height="35" viewBox="0 0 55 35" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="17.5" cy="17.5" r="17.5" fill="#f79e1b"
                                                    opacity="0.98" />
                                                <circle cx="37.5" cy="17.5" r="17.5" fill="#eb001b"
                                                    opacity="0.98" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col ps-5">
                                    <h2 class="exchange-violet-glow mb-3 fs-1 fw-black text-uppercase tracking-wide">P2P →
                                        EXCHANGE</h2>
                                    <div class="d-flex gap-3 flex-wrap">
                                        <span
                                            class="badge bg-gradient-violet px-4 py-2 rounded-pill fs-5 fw-bold shadow-lg">INSTANT-TRANSFER</span>
                                        <span class="badge bg-green bg-opacity-80 px-3 py-2 rounded-pill fs-6">SECURE</span>
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative">
                                <div class="text-center">
                                    <h1 class="exchange-violet-glow exchange-balance-amount mb-5">
                                        ${{ $data['p2p_wallet'] }}</h1>
                                </div>



                                <div class="text-center mt-5">
                                    <p class="text-white-80 fs-4 lh-xl fw-semibold mb-0 mx-auto"
                                        style="max-width: 550px; text-shadow: 0 2px 6px rgba(0,0,0,0.7);">Seamless P2P to
                                        Exchange transfers - Lightning fast • Zero downtime </p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 mb-3">
                    <div class="col-12">
                        @if (session()->has('successMsg'))
                            <div class="alert alert-success " role="alert">
                                <strong>Congratulations! </strong> {{ session('successMsg') }}
                            </div>
                        @endif
                        @if (session()->has('failedMsg'))
                            <div class="alert alert-danger " role="alert">
                                <strong>Watchout! </strong> {{ session('failedMsg') }}
                            </div>
                        @endif
                        @if (session()->has('otpMsg'))
                            <div class="alert alert-danger " role="alert">
                                {{ session('otpMsg') }}
                            </div>
                        @endif
                        <div class="card ">
                            <div class="card-header">
                                <h4 class="card-title">Fund To Wallets Transfer</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('fundExngTrans') }}" method="post" class="myForm">
                                        <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Amount</label>
                                            <input type="number" id="amount" class="form-control" name="amount"
                                                placeholder="Enter Amount" required>
                                            @error('amount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <small id="amountText" class="text-danger"></small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Wallet Type</label>
                                            <select class="form-control" name="wallet_type" id="wallet_type" required>
                                                <option value="">Select Wallet Type</option>
                                                <option value="Course">Course Wallet</option>
                                                <option value="Lending">Lending Wallet</option>
                                                <!--<option value="Trading">Trading Wallet</option>-->
                                            </select>
                                            @error('wallet_type')
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
                                            <input type="hidden" name="balance" id="balance"
                                                value="{{ $data['p2p_wallet'] }}">
                                            <button class="btn btn-primary btn-rounded btn-block mt-3 float-end subBtn"
                                                id="transBtn">Transfer
                                                Amount</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            </div>
            <div class="row pt-3">
                <div class="col-12 pt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">P2P Transfer History</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Date</th>
                                                <th>Particular</th>
                                                <th>Add</th>
                                                <th>Deduct</th>
                                                <th>Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1;  @endphp
                                            @foreach ($passdata as $list)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $list['created_at'] }}</td>
                                                    <td>{{ $list['particular'] }}</td>
                                                    <td>{{ $list['debit'] }}</td>
                                                    <td>{{ $list['credit'] }}</td>
                                                    <td> <label class="badge bg-warning">{{ $list['balance'] }}</label>
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


    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                Footer start
                                                                                                                                                                                                                                                                                                                                                                                            ***********************************-->
    <div class="footer style-1">
        <div class="copyright">
            <p>Copyright © {{ config('detailsApp.name') }} <span class="current-year">2024</span></p>
        </div>
    </div>
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                Footer end
                                                                                                                                                                                                                                                                                                                                                                                            ***********************************-->

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                               Support ticket button start
                                                                                                                                                                                                                                                                                                                                                                                            ***********************************-->

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                               Support ticket button end
                                                                                                                                                                                                                                                                                                                                                                                            ***********************************-->


    </div>
    <!--********************************** Main wrapper end***********************************-->

    <!--**********************************Scripts***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('uassets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('uassets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('uassets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('uassets/vendor/datatables/responsive/responsive.js') }}"></script>
    <script src="{{ asset('uassets/js/plugins-init/datatables.init.js') }}"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('uassets/js/custom.min.js') }}"></script>
    <script src="{{ asset('uassets/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('uassets/js/demo.js') }}"></script>
    {{-- <script src="{{asset('uassets/js/styleSwitcher.js')}}"></script> --}}

    <!-- code-highlight -->
    <script src="{{ asset('uassets/js/highlight.min.js') }}"></script>
    <script>
        hljs.highlightAll();
    </script>
    <script>
        jQuery(document).ready(function() {
            setTimeout(function() {
                dlabSettingsOptions.version = 'dark';
                new dlabSettings(dlabSettingsOptions);
                setCookie('version', 'dark');
            }, 1500)
        });
    </script>
    <script>
        $(function() {
            $('.myForm').on('submit', function() {
                $('.subBtn').attr('disabled', true);
                $('.subBtn').html('Wait! Processing');
            })

            $('#fundmemberid').on('input', function() {
                var memberid = $(this).val();
                var csrf = $('#csrf').val();
                if (memberid.length == 0) {
                    $('#memMsg').html('');
                    $('#transBtn').attr('disabled', false);
                }
                $.ajax({
                    url: '/getMember',
                    type: 'POST',
                    data: {
                        'memberid': memberid,
                        _token: csrf,
                    },
                    success: function(response) {
                        $('#memMsg').html(response['data']);
                        if (response['code'] == 0) {
                            $('#transBtn').attr('disabled', true);
                        } else {
                            $('#transBtn').attr('disabled', false);
                        }
                    }
                });
            });
        })
    </script>
    </body>

    </html>
@endsection
