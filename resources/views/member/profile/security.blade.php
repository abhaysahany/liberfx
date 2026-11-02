@extends('member.layouts.main')
@section('title', 'Security')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                            ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile card card-body px-3 pt-3 pb-0">
                        <div class="profile-head">
                            <div class="photo-content">
                                <div class="cover-photo rounded"></div>
                            </div>
                            <div class="profile-info">
                                <div class="profile-photo">
                                    @if ($data['profile_image'] != '')
                                        <img src="{{ asset('uploads') }}/{{ $data['profile_image'] }}" alt=""
                                            class="img-fluid rounded-circle">
                                    @else
                                        <img src="{{ asset('uploads/avatar.jpg') }}" class="img-fluid rounded-circle"
                                            alt="">
                                    @endif
                                </div>
                                <div class="profile-details">
                                    <div class="profile-name px-3 pt-2">
                                        <h4 class="text-primary mb-0">{{ $data['first_name'] . ' ' . $data['last_name'] }}
                                        </h4>
                                        <p>Name</p>
                                    </div>
                                    <div class="profile-email px-2 pt-2">
                                        <h4 class="text-muted mb-0">{{ $data['email'] }}</h4>
                                        <p>Email</p>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <div class="btn sharp btn-primary tp-btn" data-bs-toggle="dropdown">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <circle fill="#000000" cx="12" cy="5" r="2"></circle>
                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                    <circle fill="#000000" cx="12" cy="19" r="2"></circle>
                                                </g>
                                            </svg>
                                        </div>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li class="dropdown-item"><a href="javascript:void(0);"><i
                                                        class="fa fa-user-circle text-primary me-2"></i> View profile</a>
                                            </li>
                                            <li class="dropdown-item"><a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#addCloseFriendModal"><i
                                                        class="fa fa-users text-primary me-2"></i> Add to close friends</a>
                                            </li>
                                            <li class="dropdown-item"><a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#createGroupModal"><i
                                                        class="fa fa-plus text-primary me-2"></i> Create group</a></li>
                                            <li class="dropdown-item"><a href="javascript:void(0);"
                                                    class="text-danger sweet-confirm"><i
                                                        class="fa fa-ban text-danger me-2"></i> Block</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if (session()->has('confirm_passSuccess'))
                    <div class="alert alert-success" role="alert">
                        {{ session('confirm_passSuccess') }}
                    </div>
                @endif
                @if (session()->has('failedMsg'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('failedMsg') }}
                    </div>
                @endif
                @if (session()->has('confirm_pasSuccess'))
                    <div class="alert alert-success" role="alert">
                        {{ session('confirm_pasSuccess') }}
                    </div>
                @endif
                @if (session()->has('pass_otp'))
                    <div class="col-xl-6 col-lg-6">
                        <div class="card profile-card card-bx m-b30">
                            <div class="card-header">
                                <h4 class="card-title">Password Change</h4>
                            </div>
                            <form class="profile-form" action="{{ route('otpPassChange') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div>
                                            <div class="mb-3">
                                                <label class="form-label">OTP</label>
                                                <input type="number" class="form-control" name="otp"
                                                    placeholder="Enter OTP">
                                                @error('otp')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="id" value="{{ $data['id'] }}">
                                    <button type="submit" class="btn btn-primary text-uppercase px-5">Verifiy
                                        OTP</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="col-xl-6 col-lg-6">
                        <div class="card profile-card card-bx m-b30">
                            <div class="card-header">
                                <h4 class="card-title">Password Change</h4>
                            </div>
                            <form class="profile-form" action="{{ route('passChange') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div>
                                            <div class="mb-3">
                                                <label class="form-label" for="Name">New Password</label>
                                                <input type="password" class="form-control" placeholder="Enter Password"
                                                    id="Name" name="password">
                                                @error('password')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <div class="mb-3">
                                                <label class="form-label" for="Surname">Confirm Password</label>
                                                <input type="password" class="form-control"
                                                    placeholder="Enter Confirmation Password" id="Surname"
                                                    name="password_confirmation">
                                                @error('password_confirmation')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="id" value="{{ $data['id'] }}">
                                    <button class="btn btn-primary btn-sm">UPDATE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif

                @if (session()->has('txn_otp'))
                    <div class="col-xl-6 col-lg-6">
                        <div class="card profile-card card-bx m-b30">
                            <div class="card-header">
                                <h4 class="card-title">Liberfx PIN Change</h4>
                            </div>
                            <form class="profile-form" action="{{ route('otpTxnChange') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div>
                                            <div class="mb-3">
                                                <label class="form-label">OTP</label>
                                                <input type="number" class="form-control" name="otp"
                                                    placeholder="Enter OTP">

                                            </div>
                                            @error('otp')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="id" value="{{ $data['id'] }}">
                                    <button type="submit" class="btn btn-primary text-uppercase px-5">Verifiy
                                        OTP</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="col-xl-6 col-lg-6">
                        <div class="card profile-card card-bx m-b30">
                            <div class="card-header">
                                <h4 class="card-title">Liberfx PIN Change</h4>
                            </div>
                            <form class="profile-form" action="{{ route('txnChange') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div>
                                            <div class="mb-3">
                                                <label class="form-label" for="Name">New Liberfx PIN</label>
                                                <input type="password" class="form-control" placeholder="Enter Password"
                                                    id="Name" name="pin">
                                                @error('pin')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div>
                                            <div class="mb-3">
                                                <label class="form-label" for="Surname">Confirm PIN</label>
                                                <input type="password" class="form-control"
                                                    placeholder="Enter Confirmation PIN" id="Surname"
                                                    name="pin_confirmation">
                                            </div>
                                            @error('pin_confirmation')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="id" value="{{ $data['id'] }}">
                                    <button class="btn btn-primary btn-sm">UPDATE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                     Content body end
                                                                                                                                                                                                                                                                                                                                                                                    ***********************************-->
@endsection
