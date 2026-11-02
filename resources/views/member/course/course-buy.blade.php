@extends('member.layouts.main')
@section('title', 'Course Buy')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ***********************************-->
    <div class="content-body course-buy-page">
        <!-- row -->
        <div class="container-fluid">
            <!-- Row -->
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="card course-buy-main-card">
                        <div class="card-body">
                            <div class="profile-blog">
                                <h5 class="text-primary d-inline course-buy-badge-label">Liberfx Course</h5>
                                {{-- @if ($cid == 1)
                                    @php
                                        $image = '1.jpg';
                                        $course_name = 'Basic Of Trading';
                                        $price = 210;
                                    @endphp
                                @elseif ($cid == 2)
                                    @php
                                        $image = '2.jpg';
                                        $course_name = 'CandleStick & Price Action';
                                        $price = 350;
                                    @endphp
                                @elseif ($cid == 3)
                                    @php
                                        $image = '3.jpg';
                                        $course_name = 'Advance Trading Course';
                                        $price = 450;
                                    @endphp
                                @elseif ($cid == 4)
                                    @php
                                        $image = '4.jpg';
                                        $course_name = 'Fundamental Of Equities';
                                        $price = 650;
                                    @endphp
                                @elseif ($cid == 5)
                                    @php
                                        $image = '5.jpg';
                                        $course_name = 'Advance Trading Alogrithms';
                                        $price = 1050;
                                    @endphp
                                @endif --}}

                                <img src="{{ asset('adm_assets/assets/images/courses') }}/{{ $cData['image'] }}"
                                    alt="" class="mt-4 mb-4 rounded course-buy-image card-img-hero">
                                <h3 class="course-buy-title"><a>{{ $cData['course'] }}</a></h3>
                                <p class="mb-0 course-buy-desc">an Liberfx Course Item</p>
                                <h3 class="text-primary course-buy-price">${{ $cData['price'] }}</h3>
                                <hr>
                                <h4 class="text-dark course-buy-wallet-label">Fund Wallet Balance</h4>
                                <h4 class="text-primary course-buy-wallet-value">$ {{ $data['p2p_wallet'] }}</h4>
                                <hr>
                                <div class="row">
                                    <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                    <input type="hidden" id="cid" value="{{ $cData['id'] }}">
                                    <input type="hidden" id="url" value="{{ route('buyCourse') }}">
                                    <div class="col-12">
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
                                        <h4 class="text-center">OTP
                                            @if (session()->has('prootp'))
                                                {{ session('prootp') }}
                                            @endif
                                        </h4>
                                        <div class="col-sm-12 ">
                                            <label class="form-label">OTP</label>
                                            <div class="input-group flex-nowrap">
                                                <input type="text" class="form-control form-control-md" name="otp"
                                                    placeholder="Enter OTP" required id="prootp" minlength="6"
                                                    maxlength="6">
                                                <a href="{{ url('/member/product-otp-send') }}/{{ $cData['course'] }}/{{ $cData['price'] }}"
                                                    class="input-group-text bg-primary text-white course-buy-otp-btn">Send
                                                    OTP</a>
                                            </div>
                                            @error('otp')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <button class="btn btn-primary d-block w-100 m-0 mt-4 course-buy-submit-btn" id="proBtn">Buy
                                    Course</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
