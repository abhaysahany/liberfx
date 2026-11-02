@extends('member.layouts.main')
@section('title', 'Kyc Details')
@section('container')

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <div class="container-fluid py-4">

            <style>
                /* Scoped Styles for Modern Theme-Aligned KYC Card */
                .kyc-page-container {
                    max-width: 440px;
                    margin: 0 auto;
                    width: 100%;
                    padding: 0 10px;
                    box-sizing: border-box;
                }

                .kyc-card-modern {
                    background: linear-gradient(150deg, rgba(16, 36, 71, 0.92) 0%, rgba(13, 29, 56, 0.96) 100%);
                    border: 1px solid rgba(117, 161, 255, 0.25);
                    border-radius: 20px;
                    box-shadow: 0 16px 36px -8px rgba(0, 0, 0, 0.4), 0 0 20px rgba(43, 102, 234, 0.08);
                    backdrop-filter: blur(12px);
                    overflow: hidden;
                    width: 100%;
                    box-sizing: border-box;
                    transition: box-shadow 0.2s ease-in-out, border-color 0.2s ease-in-out;
                }

                /* Header for Verified State */
                .kyc-header-verified {
                    background: linear-gradient(180deg, rgba(43, 102, 234, 0.14) 0%, rgba(16, 36, 71, 0.35) 100%);
                    border-bottom: 1px solid rgba(117, 161, 255, 0.15);
                    padding: 28px 20px 20px 20px;
                    text-align: center;
                    position: relative;
                }

                /* Header for Submitted State */
                .kyc-header-submitted {
                    background: linear-gradient(180deg, rgba(227, 150, 47, 0.12) 0%, rgba(16, 36, 71, 0.35) 100%);
                    border-bottom: 1px solid rgba(117, 161, 255, 0.15);
                    padding: 28px 20px 20px 20px;
                    text-align: center;
                    position: relative;
                }

                /* Profile Avatar Section */
                .kyc-avatar-wrapper {
                    position: relative;
                    display: inline-block;
                    margin-bottom: 14px;
                }

                .kyc-avatar-box {
                    width: 88px;
                    height: 88px;
                    border-radius: 50%;
                    padding: 3px;
                    background: linear-gradient(135deg, rgba(117, 161, 255, 0.4) 0%, rgba(43, 102, 234, 0.2) 100%);
                    display: inline-block;
                }

                .kyc-avatar-verified {
                    box-shadow: 0 6px 20px rgba(16, 185, 129, 0.25);
                }

                .kyc-avatar-submitted {
                    box-shadow: 0 6px 20px rgba(245, 158, 11, 0.25);
                }

                .kyc-avatar-img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    border-radius: 50%;
                    display: block;
                }

                .kyc-badge-icon-overlay {
                    position: absolute;
                    bottom: 0px;
                    right: 0px;
                    width: 26px;
                    height: 26px;
                    border-radius: 50%;
                    border: 2px solid #0d1d38;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.35);
                }

                .kyc-badge-icon-verified {
                    background-color: #10b981;
                    color: #ffffff;
                }

                .kyc-badge-icon-submitted {
                    background-color: #d97706;
                    color: #ffffff;
                }

                /* Status Pill Badges */
                .kyc-status-pill {
                    display: inline-flex;
                    align-items: center;
                    gap: 6px;
                    padding: 6px 16px;
                    border-radius: 50px;
                    font-size: 13px;
                    font-weight: 700;
                    letter-spacing: 0.3px;
                }

                .kyc-pill-verified {
                    background-color: rgba(16, 185, 129, 0.14);
                    color: #34d399;
                    border: 1px solid rgba(52, 211, 153, 0.35);
                    box-shadow: 0 0 14px rgba(16, 185, 129, 0.16);
                }

                .kyc-pill-submitted {
                    background-color: rgba(245, 158, 11, 0.14);
                    color: #fbbf24;
                    border: 1px solid rgba(251, 191, 36, 0.35);
                    box-shadow: 0 0 14px rgba(245, 158, 11, 0.16);
                }

                /* Information Rows */
                .kyc-body {
                    padding: 8px 22px 22px 22px;
                    overflow: hidden;
                }

                .kyc-info-row {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    padding: 14px 0;
                    border-bottom: 1px solid rgba(117, 161, 255, 0.12);
                    gap: 12px;
                    min-width: 0;
                }

                .kyc-info-row:last-child {
                    border-bottom: none;
                }

                .kyc-info-label-group {
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    flex-shrink: 0;
                }

                .kyc-icon-tile {
                    width: 36px;
                    height: 36px;
                    border-radius: 10px;
                    background: rgba(43, 102, 234, 0.12);
                    border: 1px solid rgba(117, 161, 255, 0.2);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #75a1ff;
                }

                .kyc-label-text {
                    font-size: 13px;
                    font-weight: 600;
                    color: #9eb2d9;
                    margin: 0;
                    white-space: nowrap;
                }

                .kyc-value-text {
                    font-size: 13.5px;
                    font-weight: 700;
                    color: #f8fafc;
                    text-align: right;
                    margin: 0;
                    word-break: break-word;
                    overflow-wrap: anywhere;
                    min-width: 0;
                    flex: 1;
                }

                .kyc-email-value {
                    word-break: break-all;
                    overflow-wrap: anywhere;
                }

                .kyc-mono-value {
                    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
                    letter-spacing: 0.5px;
                    color: #cbd5e1;
                }

                /* KYC Form Styles */
                .kyc-form-card {
                    background: linear-gradient(150deg, rgba(16, 36, 71, 0.92) 0%, rgba(13, 29, 56, 0.96) 100%);
                    border: 1px solid rgba(117, 161, 255, 0.25);
                    border-radius: 20px;
                    box-shadow: 0 16px 36px -8px rgba(0, 0, 0, 0.4);
                    overflow: hidden;
                }

                .kyc-form-card .card-header {
                    background: rgba(7, 16, 32, 0.35);
                    border-bottom: 1px solid rgba(117, 161, 255, 0.15);
                    padding: 16px 22px;
                }

                .kyc-form-card .card-footer {
                    background: rgba(7, 16, 32, 0.35);
                    border-top: 1px solid rgba(117, 161, 255, 0.15);
                    padding: 14px 22px;
                }

                .kyc-form-card .form-control {
                    background: rgba(6, 15, 31, 0.65) !important;
                    border: 1px solid rgba(117, 161, 255, 0.22) !important;
                    color: #f1f5f9 !important;
                    border-radius: 10px;
                }

                .kyc-form-card .form-control:focus {
                    border-color: #2b66ea !important;
                    box-shadow: 0 0 0 3px rgba(43, 102, 234, 0.25) !important;
                }

                .kyc-alert-reject {
                    border-radius: 12px;
                    border: 1px solid rgba(239, 68, 68, 0.3);
                    background-color: rgba(220, 38, 38, 0.12);
                    color: #fca5a5;
                    padding: 14px 16px;
                }

                .kyc-btn-submit {
                    background: linear-gradient(135deg, #2b66ea 0%, #1eb6ff 100%);
                    border: none;
                    color: #ffffff;
                    border-radius: 10px;
                    font-weight: 700;
                    padding: 9px 24px;
                    box-shadow: 0 4px 14px rgba(43, 102, 234, 0.35);
                    transition: transform 0.15s ease, box-shadow 0.15s ease;
                }

                .kyc-btn-submit:hover {
                    color: #ffffff;
                    box-shadow: 0 6px 18px rgba(43, 102, 234, 0.5);
                }

                /* Mobile Optimization Rules */
                @media (max-width: 576px) {
                    html, body {
                        max-width: 100vw !important;
                        overflow-x: hidden !important;
                    }

                    #main-wrapper {
                        max-width: 100vw !important;
                        overflow-x: hidden !important;
                    }

                    .content-body {
                        margin-left: 0 !important;
                        width: 100% !important;
                        max-width: 100% !important;
                        overflow-x: hidden !important;
                    }

                    .content-body .container-fluid {
                        padding-left: 12px !important;
                        padding-right: 12px !important;
                        padding-top: 16px !important;
                        max-width: 100% !important;
                    }

                    .page-titles {
                        flex-direction: column !important;
                        align-items: flex-start !important;
                        gap: 6px !important;
                        padding: 10px 14px !important;
                        max-width: 100% !important;
                    }

                    .page-titles .breadcrumb {
                        margin-left: 0 !important;
                        flex-wrap: wrap !important;
                    }

                    .page-titles h2 {
                        font-size: 16px !important;
                    }

                    .page-titles p {
                        font-size: 12px !important;
                        margin-bottom: 0 !important;
                    }

                    .kyc-page-container {
                        padding-left: 0 !important;
                        padding-right: 0 !important;
                        max-width: 100% !important;
                        width: 100% !important;
                    }

                    .kyc-card-modern {
                        border-radius: 16px !important;
                        max-width: 100% !important;
                        width: 100% !important;
                    }

                    .kyc-header-verified,
                    .kyc-header-submitted {
                        padding: 22px 14px 16px 14px;
                    }

                    .kyc-avatar-box {
                        width: 80px;
                        height: 80px;
                    }

                    .kyc-badge-icon-overlay {
                        width: 24px;
                        height: 24px;
                    }

                    .kyc-badge-icon-overlay .material-symbols-outlined {
                        font-size: 15px !important;
                    }

                    .kyc-body {
                        padding: 4px 14px 16px 14px;
                    }

                    .kyc-info-row {
                        padding: 12px 0;
                        gap: 8px;
                        white-space: normal !important;
                    }

                    .kyc-icon-tile {
                        width: 32px;
                        height: 32px;
                        border-radius: 8px;
                    }

                    .kyc-icon-tile .material-symbols-outlined {
                        font-size: 17px !important;
                    }

                    .kyc-label-text {
                        font-size: 12px;
                    }

                    .kyc-value-text {
                        font-size: 12.5px;
                        white-space: normal !important;
                        word-break: break-word !important;
                        overflow-wrap: anywhere !important;
                    }

                    .kyc-email-value {
                        word-break: break-all !important;
                        white-space: normal !important;
                        font-size: 12px !important;
                    }
                }
            </style>

            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                    <div class="kyc-page-container">

                        @if ($data['kyc_status'] == 'Verified')
                            <!-- Verified State Card -->
                            <div class="kyc-card-modern">
                                <div class="kyc-header-verified">
                                    <div class="kyc-avatar-wrapper">
                                        <div class="kyc-avatar-box kyc-avatar-verified">
                                            @if ($data['profile_image'] != '')
                                                <img src="{{ asset('uploads') }}/{{ $data['profile_image'] }}"
                                                    alt="Profile Image" class="kyc-avatar-img">
                                            @else
                                                <img src="{{ asset('uploads/avatar.jpg') }}" alt="Profile Image"
                                                    class="kyc-avatar-img">
                                            @endif
                                        </div>
                                        <div class="kyc-badge-icon-overlay kyc-badge-icon-verified">
                                            <span class="material-symbols-outlined"
                                                style="font-size: 16px; font-weight: bold; line-height: 1;">
                                                check
                                            </span>
                                        </div>
                                    </div>

                                    <div>
                                        <span class="kyc-status-pill kyc-pill-verified">
                                            <span class="material-symbols-outlined"
                                                style="font-size: 16px; line-height: 1;">check_circle</span>
                                            Verified
                                        </span>
                                    </div>
                                </div>

                                <div class="kyc-body">
                                    <!-- Name Row -->
                                    <div class="kyc-info-row">
                                        <div class="kyc-info-label-group">
                                            <div class="kyc-icon-tile">
                                                <span class="material-symbols-outlined"
                                                    style="font-size: 18px;">person</span>
                                            </div>
                                            <p class="kyc-label-text">Name</p>
                                        </div>
                                        <p class="kyc-value-text">
                                            {{ $data['first_name'] . ' ' . $data['last_name'] }}
                                        </p>
                                    </div>

                                    <!-- Email ID Row -->
                                    <div class="kyc-info-row">
                                        <div class="kyc-info-label-group">
                                            <div class="kyc-icon-tile">
                                                <span class="material-symbols-outlined"
                                                    style="font-size: 18px;">mail</span>
                                            </div>
                                            <p class="kyc-label-text">Email ID</p>
                                        </div>
                                        <p class="kyc-value-text kyc-email-value">
                                            {{ $data['email'] }}
                                        </p>
                                    </div>

                                    <!-- ID Proof No Row -->
                                    <div class="kyc-info-row">
                                        <div class="kyc-info-label-group">
                                            <div class="kyc-icon-tile">
                                                <span class="material-symbols-outlined"
                                                    style="font-size: 18px;">badge</span>
                                            </div>
                                            <p class="kyc-label-text">ID Proof No</p>
                                        </div>
                                        <p class="kyc-value-text kyc-mono-value">
                                            {{ $data['id_no'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @elseif ($data['kyc_status'] == 'Submitted')
                            <!-- Submitted / Under Review State Card -->
                            <div class="kyc-card-modern">
                                <div class="kyc-header-submitted">
                                    <div class="kyc-avatar-wrapper">
                                        <div class="kyc-avatar-box kyc-avatar-submitted">
                                            @if ($data['profile_image'] != '')
                                                <img src="{{ asset('uploads') }}/{{ $data['profile_image'] }}"
                                                    alt="Profile Image" class="kyc-avatar-img">
                                            @else
                                                <img src="{{ asset('uploads/avatar.jpg') }}" alt="Profile Image"
                                                    class="kyc-avatar-img">
                                            @endif
                                        </div>
                                        <div class="kyc-badge-icon-overlay kyc-badge-icon-submitted">
                                            <span class="material-symbols-outlined"
                                                style="font-size: 16px; font-weight: bold; line-height: 1;">
                                                hourglass_top
                                            </span>
                                        </div>
                                    </div>

                                    <div>
                                        <span class="kyc-status-pill kyc-pill-submitted">
                                            <span class="material-symbols-outlined"
                                                style="font-size: 16px; line-height: 1;">schedule</span>
                                            Submitted
                                        </span>
                                    </div>
                                </div>

                                <div class="kyc-body">
                                    <!-- Name Row -->
                                    <div class="kyc-info-row">
                                        <div class="kyc-info-label-group">
                                            <div class="kyc-icon-tile">
                                                <span class="material-symbols-outlined"
                                                    style="font-size: 18px;">person</span>
                                            </div>
                                            <p class="kyc-label-text">Name</p>
                                        </div>
                                        <p class="kyc-value-text">
                                            {{ $data['first_name'] . ' ' . $data['last_name'] }}
                                        </p>
                                    </div>

                                    <!-- Email ID Row -->
                                    <div class="kyc-info-row">
                                        <div class="kyc-info-label-group">
                                            <div class="kyc-icon-tile">
                                                <span class="material-symbols-outlined"
                                                    style="font-size: 18px;">mail</span>
                                            </div>
                                            <p class="kyc-label-text">Email ID</p>
                                        </div>
                                        <p class="kyc-value-text kyc-email-value">
                                            {{ $data['email'] }}
                                        </p>
                                    </div>

                                    <!-- ID Proof No Row -->
                                    <div class="kyc-info-row">
                                        <div class="kyc-info-label-group">
                                            <div class="kyc-icon-tile">
                                                <span class="material-symbols-outlined"
                                                    style="font-size: 18px;">badge</span>
                                            </div>
                                            <p class="kyc-label-text">ID Proof No</p>
                                        </div>
                                        <p class="kyc-value-text kyc-mono-value">
                                            {{ $data['id_no'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Update / Re-submit KYC Form State -->
                            @if (session()->has('failedMsg'))
                                <div class="alert alert-danger d-flex align-items-center mb-3 kyc-alert-reject"
                                    role="alert">
                                    <span class="material-symbols-outlined me-2" style="font-size: 20px;">warning</span>
                                    <div>{{ session('failedMsg') }}</div>
                                </div>
                            @endif

                            @if ($data['kyc_status'] == 'Rejected')
                                <div class="alert alert-danger d-flex align-items-center mb-3 kyc-alert-reject">
                                    <span class="material-symbols-outlined me-2" style="font-size: 20px;">error</span>
                                    <div><b>Reject Reason :</b> {{ $data['reject_reason'] }}</div>
                                </div>
                            @endif

                            <div class="kyc-form-card">
                                <div class="card-header border-bottom py-3 px-4">
                                    <h4 class="card-title mb-0"
                                        style="font-size: 16px; font-weight: 700; color: #f1f5f9;">Update KYC Details
                                    </h4>
                                </div>
                                <form class="profile-form" action="{{ route('updateKyc') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="formIdProof"
                                                        style="font-weight: 600; font-size: 13px; color: #9eb2d9;">ID
                                                        Proof No</label>
                                                    <input type="text" class="form-control" name="idproof_no"
                                                        id="formIdProof" placeholder="Enter Your Id Proof No."
                                                        style="height: 46px; font-size: 14px;">
                                                    @error('idproof_no')
                                                        <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="formSelfie"
                                                        style="font-weight: 600; font-size: 13px; color: #9eb2d9;">User
                                                        Selfie</label>
                                                    <input type="file" class="form-control" name="selfie"
                                                        id="formSelfie"
                                                        style="padding: 10px 12px;">
                                                    @error('selfie')
                                                        <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="formFrontImage"
                                                        style="font-weight: 600; font-size: 13px; color: #9eb2d9;">ID Front
                                                        Image</label>
                                                    <input type="file" class="form-control" name="front_image"
                                                        id="formFrontImage"
                                                        style="padding: 10px 12px;">
                                                    @error('front_image')
                                                        <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="formBackImage"
                                                        style="font-weight: 600; font-size: 13px; color: #9eb2d9;">ID Back
                                                        Image</label>
                                                    <input class="form-control" name="back_image" type="file"
                                                        id="formBackImage"
                                                        style="padding: 10px 12px;">
                                                    @error('back_image')
                                                        <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-end">
                                        <input type="hidden" name="id" value="{{ $data['id'] }}">
                                        <button class="kyc-btn-submit">UPDATE</button>
                                    </div>
                                </form>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--**********************************Content body end ***********************************-->
@endsection
