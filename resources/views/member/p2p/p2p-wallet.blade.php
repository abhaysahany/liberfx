@extends('member.layouts.main2')
@section('title', 'Fund Wallet')
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
                    <div class="col-xl-12">
                        <div class="card wallet-details-card cyberpunk-p2p-fund"
                            style="background: linear-gradient(135deg, rgba(15,5,45,0.98) 0%, rgba(25,15,65,0.98) 50%, rgba(45,25,95,0.98) 100%);
                                   backdrop-filter: blur(40px);
                                   border: 2px solid rgba(255,100,150,0.6);
                                   box-shadow: 0 0 100px rgba(255,100,150,0.4), 0 50px 100px rgba(15,5,45,0.8), inset 0 1px 0 rgba(255,255,255,0.3); 
                                   border-radius: 26px; position: relative; overflow: hidden;">
                            <style>
                                .cyberpunk-p2p-fund {
                                    animation: p2pNeonBeat 4s ease-in-out infinite;
                                }

                                @keyframes p2pNeonBeat {

                                    0%,
                                    100% {
                                        box-shadow: 0 0 100px rgba(255, 100, 150, 0.4), 0 50px 100px rgba(15, 5, 45, 0.8);
                                    }

                                    50% {
                                        box-shadow: 0 0 160px rgba(255, 100, 150, 0.7), 0 60px 120px rgba(15, 5, 45, 1);
                                    }
                                }

                                .cyberpunk-p2p-fund:hover {
                                    transform: translateY(-12px) rotateX(8deg);
                                    box-shadow: 0 0 200px rgba(255, 100, 150, 0.9), 0 70px 140px rgba(15, 5, 45, 1);
                                }

                                .p2p-pink-glow {
                                    background: linear-gradient(45deg, #ff6494, #ff4081, #ff1493);
                                    -webkit-background-clip: text;
                                    background-clip: text;
                                    -webkit-text-fill-color: transparent;
                                    animation: pinkPulse 3s infinite;
                                }

                                @keyframes pinkPulse {

                                    0%,
                                    100% {
                                        filter: brightness(1) drop-shadow(0 0 25px #ff6494);
                                    }

                                    50% {
                                        filter: brightness(1.3) drop-shadow(0 0 45px #ff4081);
                                    }
                                }

                                .p2p-metrics-magenta {
                                    background: rgba(255, 100, 150, 0.15);
                                    border: 1px solid rgba(255, 100, 150, 0.4);
                                    backdrop-filter: blur(25px);
                                }
                            </style>
                            <div class="card-body p-5 position-relative">
                                <div class="row align-items-center mb-4">
                                    <div class="col-auto">
                                        <div class="p2p-icon-glow rounded-circle p-4 shadow-2xl"
                                            style="width: 90px; height: 90px; background: conic-gradient(from 0deg at 50% 50%, transparent 0deg 120deg, #ff6494 120deg 240deg, transparent 240deg); border: 2px solid rgba(255,100,150,0.7); box-shadow: 0 0 50px rgba(255,100,150,0.8);">
                                            <div class="master-card position-absolute top-50 start-50 translate-middle">
                                                {{-- <svg width="55" height="35" viewBox="0 0 55 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="17.5" cy="17.5" r="17.5" fill="#f79e1b" opacity="0.95"/>
                                                    <circle cx="37.5" cy="17.5" r="17.5" fill="#eb001b" opacity="0.95"/>
                                                </svg> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col ps-4">
                                        <h2 class="p2p-pink-glow mb-2 fs-2 fw-black lh-1 text-uppercase">P2P FUND WALLET
                                        </h2>
                                        <div class="d-flex gap-2">
                                            <span
                                                class="badge bg-gradient-pink px-4 py-2 rounded-pill fs-6 fw-bold shadow-lg p2p-badge-premium">PEER
                                                READY</span>
                                            <span
                                                class="badge bg-success bg-opacity-90 px-3 py-2 rounded-pill fs-6">INSTANT</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center position-relative">
                                    <h1 class="p2p-pink-glow mb-4"
                                        style="font-size: 4rem; font-weight: 950; line-height: 1; letter-spacing: -0.04em;">
                                        ${{ number_format($data['p2p_wallet'], 2) }}</h1>

                                    <div class="p2p-metrics-magenta p-4 rounded-5 shadow-xl mb-4 mx-auto"
                                        style="max-width: 420px;">
                                    <div class="row g-4">
                                        <div class="col-6">
                                            <div class="text-center">
                                                <svg class="mb-1 mx-auto" width="28" height="28" viewBox="0 0 24 24" fill="#ff6494">
                                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                <div class="h6 text-pink mb-1 fw-bold">Total Income</div>
                                                <div class="h4 text-white fw-black mb-0">$ {{ totalIncome($data['memberid']) }}</div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-center">
                                                <svg class="mb Asc  mx-auto" width="32" height="32" viewBox="0 0 24 24" fill="#00ff88">
                                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                <div class="h6 text-white-50 mb-1 fw-semibold">Total Withdrawal</div>
                                                <div class="h4 text-success fw-bold mb-0">$ {{ number_format(totalWithdrawals($data['memberid']), 2) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <p class="text-white-75 fs-5 lh-lg fw-medium mb-0"
                                        style="max-width: 500px; margin: 0 auto; text-shadow: 0 1px 3px rgba(0,0,0,0.5);">
                                        Global P2P marketplace - Lightning fast peer-to-peer crypto transfers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <div class="col-xl-4 col-sm-4 col-4 pe-1">
                            <div class="card">
                                <div class="card-header border-0 pb-0">
                                    <h6 class="mb-0 m-auto text-center text-white">Total <br>Income</h6>
                                </div>
                                <div class="card-body text-center pt-3">
                                    <div class="icon-box icon-box-sm bg-primary">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9 30H23C24.3261 30 25.5979 29.4732 26.5355 28.5355C27.4732 27.5979 28 26.3261 28 25V19C28 17.6739 27.4732 16.4021 26.5355 15.4645C25.5979 14.5268 24.3261 14 23 14H9C7.67392 14 6.40215 14.5268 5.46447 15.4645C4.52678 16.4021 4 17.6739 4 19V25C4 26.3261 4.52678 27.5979 5.46447 28.5355C6.40215 29.4732 7.67392 30 9 30ZM6 19C6 18.2044 6.31607 17.4413 6.87868 16.8787C7.44129 16.3161 8.20435 16 9 16H23C23.7956 16 24.5587 16.3161 25.1213 16.8787C25.6839 17.4413 26 18.2044 26 19V25C26 25.7956 25.6839 26.5587 25.1213 27.1213C24.5587 27.6839 23.7956 28 23 28H9C8.20435 28 7.44129 27.6839 6.87868 27.1213C6.31607 26.5587 6 25.7956 6 25V19Z"
                                                fill="white"></path>
                                            <path
                                                d="M16 26C16.7912 26 17.5645 25.7654 18.2223 25.3259C18.8801 24.8864 19.3928 24.2616 19.6955 23.5307C19.9983 22.7998 20.0775 21.9956 19.9232 21.2196C19.7688 20.4437 19.3879 19.731 18.8285 19.1716C18.269 18.6122 17.5563 18.2312 16.7804 18.0769C16.0045 17.9225 15.2002 18.0017 14.4693 18.3045C13.7384 18.6072 13.1137 19.1199 12.6741 19.7777C12.2346 20.4355 12 21.2089 12 22C12 23.0609 12.4215 24.0783 13.1716 24.8284C13.9217 25.5786 14.9392 26 16 26ZM16 20C16.3956 20 16.7823 20.1173 17.1112 20.3371C17.4401 20.5568 17.6964 20.8692 17.8478 21.2346C17.9992 21.6001 18.0388 22.0022 17.9616 22.3902C17.8844 22.7781 17.6939 23.1345 17.4142 23.4142C17.1345 23.6939 16.7782 23.8844 16.3902 23.9616C16.0022 24.0387 15.6001 23.9991 15.2347 23.8478C14.8692 23.6964 14.5569 23.44 14.3371 23.1111C14.1173 22.7822 14 22.3956 14 22C14 21.4696 14.2107 20.9609 14.5858 20.5858C14.9609 20.2107 15.4696 20 16 20ZM16 2C15.7348 2 15.4805 2.10536 15.2929 2.29289C15.1054 2.48043 15 2.73478 15 3V8.59L12.46 6.05C12.2687 5.88617 12.0227 5.80057 11.771 5.81029C11.5193 5.82001 11.2806 5.92434 11.1025 6.10244C10.9244 6.28053 10.82 6.51927 10.8103 6.77095C10.8006 7.02262 10.8862 7.2687 11.05 7.46L15.29 11.71C15.3822 11.8 15.4908 11.8713 15.61 11.92C15.7334 11.9723 15.866 11.9992 16 11.9992C16.134 11.9992 16.2666 11.9723 16.39 11.92C16.5092 11.8713 16.6179 11.8 16.71 11.71L21 7.46C21.1639 7.2687 21.2495 7.02262 21.2397 6.77095C21.23 6.51927 21.1257 6.28053 20.9476 6.10244C20.7695 5.92434 20.5308 5.82001 20.2791 5.81029C20.0274 5.80057 19.7813 5.88617 19.59 6.05L17 8.59V3C17 2.73478 16.8947 2.48043 16.7071 2.29289C16.5196 2.10536 16.2652 2 16 2Z"
                                                fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="mt-3"></div>
                                    <div class="count-num text-white mt-1">$ {{ totalIncome($data['memberid']) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-4 col-4 px-1">
                            <div class="card">
                                <div class="card-header border-0 pb-0">
                                    <h6 class="m-auto mb-0  text-center  text-white">Total <br>Withdrawal</h6>
                                </div>
                                <div class="card-body text-center pt-3">
                                    <div class="icon-box icon-box-sm bg-success">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4 19V25C4 26.3261 4.52678 27.5979 5.46447 28.5355C6.40215 29.4732 7.67392 30 9 30H23C24.3261 30 25.5979 29.4732 26.5355 28.5355C27.4732 27.5979 28 26.3261 28 25V19C28 17.6739 27.4732 16.4021 26.5355 15.4645C25.5979 14.5268 24.3261 14 23 14H9C7.67392 14 6.40215 14.5268 5.46447 15.4645C4.52678 16.4021 4 17.6739 4 19ZM26 19V25C26 25.7956 25.6839 26.5587 25.1213 27.1213C24.5587 27.6839 23.7956 28 23 28H9C8.20435 28 7.44129 27.6839 6.87868 27.1213C6.31607 26.5587 6 25.7956 6 25V19C6 18.2044 6.31607 17.4413 6.87868 16.8787C7.44129 16.3161 8.20435 16 9 16H23C23.7956 16 24.5587 16.3161 25.1213 16.8787C25.6839 17.4413 26 18.2044 26 19Z"
                                                fill="white"></path>
                                            <path
                                                d="M16.0001 25.9999C16.7912 25.9999 17.5646 25.7653 18.2224 25.3258C18.8802 24.8863 19.3929 24.2616 19.6956 23.5307C19.9984 22.7998 20.0776 21.9955 19.9232 21.2196C19.7689 20.4437 19.3879 19.7309 18.8285 19.1715C18.2691 18.6121 17.5564 18.2311 16.7804 18.0768C16.0045 17.9225 15.2003 18.0017 14.4694 18.3044C13.7384 18.6072 13.1137 19.1199 12.6742 19.7777C12.2347 20.4355 12.0001 21.2088 12.0001 21.9999C12.0001 23.0608 12.4215 24.0782 13.1717 24.8284C13.9218 25.5785 14.9392 25.9999 16.0001 25.9999ZM16.0001 19.9999C16.3956 19.9999 16.7823 20.1172 17.1112 20.337C17.4401 20.5568 17.6965 20.8691 17.8478 21.2346C17.9992 21.6 18.0388 22.0022 17.9617 22.3901C17.8845 22.7781 17.694 23.1344 17.4143 23.4142C17.1346 23.6939 16.7782 23.8843 16.3903 23.9615C16.0023 24.0387 15.6002 23.9991 15.2347 23.8477C14.8693 23.6963 14.5569 23.44 14.3371 23.1111C14.1174 22.7822 14.0001 22.3955 14.0001 21.9999C14.0001 21.4695 14.2108 20.9608 14.5859 20.5857C14.9609 20.2107 15.4697 19.9999 16.0001 19.9999ZM16.7101 2.28994C16.6171 2.19621 16.5065 2.12182 16.3847 2.07105C16.2628 2.02028 16.1321 1.99414 16.0001 1.99414C15.8681 1.99414 15.7374 2.02028 15.6155 2.07105C15.4937 2.12182 15.383 2.19621 15.2901 2.28994L11.0501 6.53994C10.8565 6.72692 10.7451 6.98315 10.7404 7.25226C10.7357 7.52138 10.8381 7.78133 11.0251 7.97494C11.2121 8.16855 11.4683 8.27995 11.7374 8.28464C12.0065 8.28933 12.2665 8.18692 12.4601 7.99994L15.0001 5.40994V10.9999C15.0001 11.2652 15.1054 11.5195 15.293 11.707C15.4805 11.8946 15.7349 11.9999 16.0001 11.9999C16.2653 11.9999 16.5197 11.8946 16.7072 11.707C16.8947 11.5195 17.0001 11.2652 17.0001 10.9999V5.40994L19.5401 7.99994C19.7263 8.18468 19.9777 8.28883 20.2401 8.28994C20.38 8.29755 20.52 8.27567 20.6509 8.22571C20.7818 8.17575 20.9008 8.09883 21.0001 7.99994C21.1863 7.81258 21.2909 7.55912 21.2909 7.29494C21.2909 7.03075 21.1863 6.7773 21.0001 6.58994L16.7101 2.28994Z"
                                                fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="mt-3"></div>
                                    <div class="count-num  text-white mt-1">$
                                        {{ number_format(totalWithdrawals($data['memberid']), 2) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-4 col-4 ps-1">
                            <div class="card">
                                <div class="card-header border-0 pb-0">
                                    <h6 class="m-auto mb-0 text-center text-white">Today's <br>Withdrawal</h6>
                                </div>
                                <div class="card-body text-center pt-3">
                                    <div class="icon-box icon-box-sm bg-danger">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4 19V25C4 26.3261 4.52678 27.5979 5.46447 28.5355C6.40215 29.4732 7.67392 30 9 30H23C24.3261 30 25.5979 29.4732 26.5355 28.5355C27.4732 27.5979 28 26.3261 28 25V19C28 17.6739 27.4732 16.4021 26.5355 15.4645C25.5979 14.5268 24.3261 14 23 14H9C7.67392 14 6.40215 14.5268 5.46447 15.4645C4.52678 16.4021 4 17.6739 4 19ZM26 19V25C26 25.7956 25.6839 26.5587 25.1213 27.1213C24.5587 27.6839 23.7956 28 23 28H9C8.20435 28 7.44129 27.6839 6.87868 27.1213C6.31607 26.5587 6 25.7956 6 25V19C6 18.2044 6.31607 17.4413 6.87868 16.8787C7.44129 16.3161 8.20435 16 9 16H23C23.7956 16 24.5587 16.3161 25.1213 16.8787C25.6839 17.4413 26 18.2044 26 19Z"
                                                fill="white"></path>
                                            <path
                                                d="M16.0001 25.9999C16.7912 25.9999 17.5646 25.7653 18.2224 25.3258C18.8802 24.8863 19.3929 24.2616 19.6956 23.5307C19.9984 22.7998 20.0776 21.9955 19.9232 21.2196C19.7689 20.4437 19.3879 19.7309 18.8285 19.1715C18.2691 18.6121 17.5564 18.2311 16.7804 18.0768C16.0045 17.9225 15.2003 18.0017 14.4694 18.3044C13.7384 18.6072 13.1137 19.1199 12.6742 19.7777C12.2347 20.4355 12.0001 21.2088 12.0001 21.9999C12.0001 23.0608 12.4215 24.0782 13.1717 24.8284C13.9218 25.5785 14.9392 25.9999 16.0001 25.9999ZM16.0001 19.9999C16.3956 19.9999 16.7823 20.1172 17.1112 20.337C17.4401 20.5568 17.6965 20.8691 17.8478 21.2346C17.9992 21.6 18.0388 22.0022 17.9617 22.3901C17.8845 22.7781 17.694 23.1344 17.4143 23.4142C17.1346 23.6939 16.7782 23.8843 16.3903 23.9615C16.0023 24.0387 15.6002 23.9991 15.2347 23.8477C14.8693 23.6963 14.5569 23.44 14.3371 23.1111C14.1174 22.7822 14.0001 22.3955 14.0001 21.9999C14.0001 21.4695 14.2108 20.9608 14.5859 20.5857C14.9609 20.2107 15.4697 19.9999 16.0001 19.9999ZM16.7101 2.28994C16.6171 2.19621 16.5065 2.12182 16.3847 2.07105C16.2628 2.02028 16.1321 1.99414 16.0001 1.99414C15.8681 1.99414 15.7374 2.02028 15.6155 2.07105C15.4937 2.12182 15.383 2.19621 15.2901 2.28994L11.0501 6.53994C10.8565 6.72692 10.7451 6.98315 10.7404 7.25226C10.7357 7.52138 10.8381 7.78133 11.0251 7.97494C11.2121 8.16855 11.4683 8.27995 11.7374 8.28464C12.0065 8.28933 12.2665 8.18692 12.4601 7.99994L15.0001 5.40994V10.9999C15.0001 11.2652 15.1054 11.5195 15.293 11.707C15.4805 11.8946 15.7349 11.9999 16.0001 11.9999C16.2653 11.9999 16.5197 11.8946 16.7072 11.707C16.8947 11.5195 17.0001 11.2652 17.0001 10.9999V5.40994L19.5401 7.99994C19.7263 8.18468 19.9777 8.28883 20.2401 8.28994C20.38 8.29755 20.52 8.27567 20.6509 8.22571C20.7818 8.17575 20.9008 8.09883 21.0001 7.99994C21.1863 7.81258 21.2909 7.55912 21.2909 7.29494C21.2909 7.03075 21.1863 6.7773 21.0001 6.58994L16.7101 2.28994Z"
                                                fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="mt-3"></div>
                                    <div class="count-num text-white mt-1">$
                                        {{ number_format(todayWithdrawals($data['memberid']), 2) }}</div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-xl-7 col-lg-7 mb-3">
                    @if (session()->has('sucMsg'))
                        <div class="alert alert-success " role="alert">
                            <strong>Congratulations! </strong> {{ session('sucMsg') }}
                        </div>
                    @endif
                    @if (session()->has('failMsg'))
                        <div class="alert alert-danger " role="alert">
                            <strong>Watchout! </strong> {{ session('failMsg') }}
                        </div>
                    @endif
                    @if (session()->has('otpMsg'))
                        <div class="alert alert-danger " role="alert">
                            {{ session('otpMsg') }}
                        </div>
                    @endif
                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-title">Fund Transfer Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('fundTrans') }}" method="post" class="myForm">
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
                                        <label class="form-label">MemberId</label>
                                        <input type="text" class="form-control" placeholder="Enter Memberid"
                                            name="member" id="fundmemberid" maxlength="9" minlength="9" required>
                                        @error('member')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <small id="memMsg" class="text-danger"></small>
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
                                        <input type="hidden" name="sender" value="{{ $data['memberid'] }}">
                                        <button class="btn btn-primary btn-rounded btn-block mt-3 float-end subBtn"
                                            id="transBtn">Transfer
                                            Amount</button>
                                    </div>
                                </form>
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
                                <h4 class="card-title">Fund Transfer History</h4>
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
                                                <td> <label class="badge bg-warning">{{ $list['balance'] }}</label></td>
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
