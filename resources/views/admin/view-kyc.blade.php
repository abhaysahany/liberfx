@extends('admin.layouts.main')
@section('title', 'View KYC')
@section('container')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active" aria-current="page"><a href="#"
                                        style="text-decoration: none">View KYC</a></li>
                            </ol>
                        </nav>

                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                @if (session()->has('update'))
                    <div class="alert alert-success" role="alert">
                        {{ session('update') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap">
                        <h5 class="mb-0">KYC Details</h5>
                        <div class="d-flex align-items-center" style="gap: 6px;">
                            @if ($data['kyc_status'] == 'Verified')
                                <span class="badge badge-success bg-success p-1" style="font-size: 13px; margin-right: 6px;">Status: Accepted / Verified</span>
                                <button type="button" class="btn btn-sm btn-danger" id="rejectKyc">Reject KYC</button>
                            @elseif ($data['kyc_status'] == 'Rejected')
                                <span class="badge badge-danger bg-danger p-1" style="font-size: 13px; margin-right: 6px;">Status: Rejected</span>
                                <a href="{{ url('admin/kyc/verify') }}/{{ $data['id'] }}"
                                    class="btn btn-sm btn-primary">Verify KYC</a>
                            @else
                                <a href="{{ url('admin/kyc/verify') }}/{{ $data['id'] }}"
                                    class="btn btn-sm btn-primary" style="margin-right: 6px;">Verify KYC</a>
                                <button type="button" class="btn btn-sm btn-danger" id="rejectKyc">Reject KYC</button>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 px-4 pt-3" id="rejectform" style="display: none;">
                        <div class="alert alert-warning">
                            <strong>Reject KYC:</strong> Please provide the rejection reason below. This will reject the KYC and allow the member to upload/submit documents again.
                        </div>
                        <form action="{{ route('rejectReason') }}" method="post">
                            @csrf
                            <div class="row align-items-end">
                                <div class="col-md-9">
                                    <div class="form-group mb-2">
                                        <label>Reject Reason <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="reject_reason"
                                            placeholder="Enter Reject Reason (e.g. ID blurry, selfie unclear, etc.)" required>
                                        @error('reject_reason')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <input type="hidden" class="form-control" name="id"
                                            value="{{ $data['id'] }}">
                                        <button type="submit" class="btn btn-danger btn-block w-100">Submit Rejection</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                    </div>

                    @if ($data['kyc_status'] == 'Rejected' && !empty($data['reject_reason']))
                        <div class="col-12 px-4 pt-2">
                            <div class="alert alert-danger mb-0">
                                <strong>Rejection Reason:</strong> {{ $data['reject_reason'] }}
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">

                                <form action="{{ route('updateKYC') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Id Proof No </label>
                                                <input type="text" class="form-control" name="idno"
                                                    value="{{ $data['id_no'] }}">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label>Wallet Address </label>
                                <input type="text" class="form-control" name="wallet_address" value="{{$data['wallet_address']}}">
                            </div>
                        </div> --}}
                                    </div>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <input type="hidden" class="form-control" name="id"
                                                value="{{ $data['id'] }}">
                                            <button class="btn btn-primary float-right mt-4">Update Details</button>
                                        </div>
                                    </div>
                                    <hr>
                                </form>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row justify-content-around">
                                <div class="col-md-4 col-sm-12 ">
                                    <div class="card shadow">
                                        <div class="card-body ">
                                            <div class="text-center ">
                                                @if ($data['front_image'] != '')
                                                    <img src="{{ asset('uploads') }}/{{ $data['front_image'] }}"
                                                        class="rounded" style="width: 100%; height:280px" />
                                                @else
                                                    <img src="{{ asset('uploads/image_place.jpg') }}" class="rounded"
                                                        style="width: 100%; height:280px" />
                                                @endif

                                            </div>
                                            <h4 class="card-title mt-10">{{ __('Front Image') }}</h4>
                                            <form action="{{ route('updatePan') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="file" name="front_image" class="file-upload-default"
                                                        required>
                                                    <div class="input-group col-xs-12">
                                                        <input type="text" class="form-control file-upload-info" disabled
                                                            placeholder="Upload Image">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-primary"
                                                                type="button">{{ __('Upload') }}</button>
                                                        </span>
                                                    </div>
                                                    @error('barcode')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <input type="hidden" name="id" value="{{ $data['id'] }}">
                                                <input type="hidden" name="oldImage" value="{{ $data['front_image'] }}">
                                                <button class="btn btn-sm btn-primary float-right mb-5">Update
                                                    Image</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="card shadow">
                                        <div class="card-body ">
                                            <div class="text-center ">
                                                @if ($data['back_image'] != '')
                                                    <img src="{{ asset('uploads') }}/{{ $data['back_image'] }}"
                                                        class="rounded" style="width: 100%; height:280px" />
                                                @else
                                                    <img src="{{ asset('uploads/image_place.jpg') }}" class="rounded"
                                                        style="width: 100%; height:280px" />
                                                @endif
                                            </div>
                                            <h4 class="card-title mt-10">{{ __('Back Image') }}</h4>
                                            <form action="{{ route('updateAfront') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="file" name="back_image" class="file-upload-default"
                                                        required>
                                                    <div class="input-group col-xs-12">
                                                        <input type="text" class="form-control file-upload-info"
                                                            disabled placeholder="Upload Image">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-primary"
                                                                type="button">{{ __('Upload') }}</button>
                                                        </span>
                                                    </div>
                                                    @error('back_image')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <input type="hidden" name="id" value="{{ $data['id'] }}">
                                                <input type="hidden" name="oldImage" value="{{ $data['back_image'] }}">
                                                <button class="btn btn-sm btn-primary float-right">Update Image</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="card shadow">
                                        <div class="card-body shadow">
                                            <div class="text-center">
                                                @if ($data['selfie_image'] != '')
                                                    <img src="{{ asset('uploads') }}/{{ $data['selfie_image'] }}"
                                                        class="rounded" style="width: 100%; height:280px" />
                                                @else
                                                    <img src="{{ asset('uploads/image_place.jpg') }}" class="rounded"
                                                        style="width: 100%; height:280px" />
                                                @endif
                                            </div>
                                            <h4 class="card-title mt-10">{{ __('Selfie Image') }}</h4>
                                            <form action="{{ route('updateAback') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="file" name="selfie_image" class="file-upload-default"
                                                        required>
                                                    <div class="input-group col-xs-12">
                                                        <input type="text" class="form-control file-upload-info"
                                                            disabled placeholder="Upload Image">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-primary"
                                                                type="button">{{ __('Upload') }}</button>
                                                        </span>
                                                    </div>
                                                    @error('selfie_image')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <input type="hidden" name="id" value="{{ $data['id'] }}">
                                                <input type="hidden" name="oldImage"
                                                    value="{{ $data['selfie_image'] }}">
                                                <button class="btn btn-sm btn-primary float-right">Update Image</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div>
    <!-- container -->

    </div>
    <!-- content -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#rejectKyc').click(function() {
                $('#rejectform').toggle();
            });

        })
    </script>
@endsection
