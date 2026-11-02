@extends('admin.layouts.main')
@section('title', 'Dashboard')
@section('container')

<!-- Scoped Modern Cards Styling -->
<style>
    .modern-dash-wrapper {
        --dash-card-bg: #ffffff;
        --dash-text-dark: #0f172a;
        --dash-text-muted: #64748b;
        --dash-border: rgba(226, 232, 240, 0.85);
        --dash-radius: 16px;
    }

    body[data-layout-config*='"darkMode":true'] .modern-dash-wrapper {
        --dash-card-bg: #1e293b;
        --dash-text-dark: #f8fafc;
        --dash-text-muted: #94a3b8;
        --dash-border: rgba(51, 65, 85, 0.7);
    }

    /* Section Category Headers */
    .dash-category-title {
        font-size: 0.88rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: var(--dash-text-muted);
        margin: 1.25rem 0 0.75rem 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .dash-category-title::after {
        content: '';
        flex-grow: 1;
        height: 1px;
        background: var(--dash-border);
        margin-left: 8px;
    }

    /* Modern Card Container */
    .modern-card {
        background: var(--dash-card-bg);
        border: 1px solid var(--dash-border);
        border-radius: var(--dash-radius);
        box-shadow: 0 4px 18px -2px rgba(0, 0, 0, 0.04);
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        margin-bottom: 24px;
    }

    .modern-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px -4px rgba(0, 0, 0, 0.09);
        border-color: rgba(59, 130, 246, 0.35);
    }

    .modern-card-link {
        text-decoration: none !important;
        color: inherit;
        display: block;
    }

    .modern-card-link:hover .modern-card {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px -4px rgba(0, 0, 0, 0.1);
        border-color: rgba(59, 130, 246, 0.45);
    }

    /* Gradient Tilebox Cards (For Top Members Cards) */
    .tilebox-gradient-blue {
        background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%) !important;
        border: none !important;
        color: #ffffff !important;
    }

    .tilebox-gradient-green {
        background: linear-gradient(135deg, #059669 0%, #10b981 100%) !important;
        border: none !important;
        color: #ffffff !important;
    }

    .tilebox-gradient-amber {
        background: linear-gradient(135deg, #d97706 0%, #f59e0b 100%) !important;
        border: none !important;
        color: #ffffff !important;
    }

    .tilebox-gradient-red {
        background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%) !important;
        border: none !important;
        color: #ffffff !important;
    }

    /* Icon Squircle Design */
    .modern-card-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        transition: transform 0.2s ease;
    }

    .modern-card:hover .modern-card-icon {
        transform: scale(1.08);
    }

    /* Icon Themes */
    .icon-theme-blue { background: rgba(59, 130, 246, 0.12); color: #2563eb; }
    .icon-theme-green { background: rgba(16, 185, 129, 0.12); color: #059669; }
    .icon-theme-amber { background: rgba(245, 158, 11, 0.12); color: #d97706; }
    .icon-theme-red { background: rgba(239, 68, 68, 0.12); color: #dc2626; }
    .icon-theme-purple { background: rgba(139, 92, 246, 0.12); color: #7c3aed; }
    .icon-theme-cyan { background: rgba(6, 182, 212, 0.12); color: #0891b2; }
    .icon-theme-teal { background: rgba(20, 184, 166, 0.12); color: #0d9488; }
    .icon-theme-indigo { background: rgba(99, 102, 241, 0.12); color: #4f46e5; }

    /* Card Content Typography */
    .modern-card-title {
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--dash-text-muted);
        margin-bottom: 6px;
    }

    .modern-card-value {
        font-size: 1.65rem;
        font-weight: 700;
        color: var(--dash-text-dark);
        letter-spacing: -0.5px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .modern-card-meta {
        font-size: 0.78rem;
        color: var(--dash-text-muted);
        margin-bottom: 0;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .modern-card-meta-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #10b981;
        display: inline-block;
    }

    /* Subdued border accent */
    .card-border-top-blue { border-top: 3px solid #3b82f6 !important; }
    .card-border-top-green { border-top: 3px solid #10b981 !important; }
    .card-border-top-amber { border-top: 3px solid #f59e0b !important; }
    .card-border-top-red { border-top: 3px solid #ef4444 !important; }
    .card-border-top-purple { border-top: 3px solid #8b5cf6 !important; }
    .card-border-top-cyan { border-top: 3px solid #06b6d4 !important; }
</style>

<div class="container-fluid modern-dash-wrapper">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-light" id="dash-daterange">
                            <span class="input-group-text bg-primary border-primary text-white">
                                <i class="mdi mdi-calendar-range font-13"></i>
                            </span>
                        </div>
                        <a href="javascript: void(0);" onclick="window.location.reload();" class="btn btn-primary ms-2" title="Refresh">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <a href="javascript: void(0);" class="btn btn-primary ms-1" title="Filter">
                            <i class="mdi mdi-filter-variant"></i>
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
            @if (session()->has('successMsg'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
                    <i class="uil uil-check-circle me-1 fs-5 align-middle"></i>
                    {{ session('successMsg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
    <!-- end page title -->

    <!-- ========================================== -->
    <!-- ROW 1: Members Statistics (4 Cards)        -->
    <!-- ========================================== -->
    <div class="dash-category-title">
        <i class="uil uil-users-alt text-primary"></i> Members Overview
    </div>

    <div class="row">
        {{-- Card 1: Total Members --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <a href="{{ url('admin/member-details') }}" class="modern-card-link">
                <div class="modern-card tilebox-one tilebox-gradient-blue">
                    <div class="card-body text-white">
                        <i class='text-white uil uil-users-alt float-end fs-1 opacity-75'></i>
                        <h6 class="text-uppercase mt-0 text-white text-opacity-75">Total Members</h6>
                        <h2 class="my-2 text-white fw-bold" id="active-users-count">{{ totalMembersadmin() }}</h2>
                        <p class="mb-0 text-white text-opacity-75">
                            {{-- <span class="text-success me-2"><span class="mdi mdi-arrow-up-bold"></span> 5.27%</span> --}}
                            <span class="text-nowrap"><span class="modern-card-meta-dot bg-white me-1"></span> Since last month</span>
                        </p>
                    </div> <!-- end card-body-->
                </div>
            </a>
        </div> <!-- end col-->

        {{-- Card 2: Total Active Members --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <a href="{{ url('admin/member-details') }}" class="modern-card-link">
                <div class="modern-card tilebox-one tilebox-gradient-green">
                    <div class="card-body text-white">
                        <i class='text-white uil uil-user-check float-end fs-1 opacity-75'></i>
                        <h6 class="text-uppercase mt-0 text-white text-opacity-75">Total Active Members</h6>
                        <h2 class="my-2 text-white fw-bold" id="active-users-count">{{ totalLendingMembers() }}</h2>
                        <p class="mb-0 text-white text-opacity-75">
                            {{-- <span class="text-success me-2"><span class="mdi mdi-arrow-up-bold"></span> 5.27%</span> --}}
                            <span class="text-nowrap"><span class="modern-card-meta-dot bg-white me-1"></span> Since last month</span>
                        </p>
                    </div> <!-- end card-body-->
                </div>
            </a>
        </div> <!-- end col-->

        {{-- Card 3: Not Active Members --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <a href="{{ url('admin/member-details') }}" class="modern-card-link">
                <div class="modern-card tilebox-one tilebox-gradient-amber">
                    <div class="card-body text-white">
                        <i class='text-white uil uil-user-exclamation float-end fs-1 opacity-75'></i>
                        <h6 class="text-uppercase mt-0 text-white text-opacity-75">Not Active Members</h6>
                        <h2 class="my-2 text-white fw-bold" id="active-users-count">
                            {{ totalActiveMembers() - totalLendingMembers() }}
                        </h2>
                        <p class="mb-0 text-white text-opacity-75">
                            {{-- <span class="text-success me-2"><span class="mdi mdi-arrow-up-bold"></span> 5.27%</span> --}}
                            <span class="text-nowrap"><span class="modern-card-meta-dot bg-white me-1"></span> Since last month</span>
                        </p>
                    </div> <!-- end card-body-->
                </div>
            </a>
        </div> <!-- end col-->

        {{-- Card 4: Total Blocked Members --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <a href="{{ url('admin/member-details') }}" class="modern-card-link">
                <div class="modern-card tilebox-one tilebox-gradient-red">
                    <div class="card-body text-white">
                        <i class='text-white uil uil-user-times float-end fs-1 opacity-75'></i>
                        <h6 class="text-uppercase mt-0 text-white text-opacity-75">Total Blocked Members</h6>
                        <h2 class="my-2 text-white fw-bold" id="active-users-count">{{ totalblockedMembers() }}</h2>
                        <p class="mb-0 text-white text-opacity-75">
                            {{-- <span class="text-success me-2"><span class="mdi mdi-arrow-up-bold"></span> 5.27%</span> --}}
                            <span class="text-nowrap"><span class="modern-card-meta-dot bg-white me-1"></span> Since last month</span>
                        </p>
                    </div> <!-- end card-body-->
                </div>
            </a>
        </div> <!-- end col-->
    </div> <!-- end row -->


    <!-- ========================================== -->
    <!-- ROW 2: Withdrawals & Wallets (8 Cards)     -->
    <!-- ========================================== -->
    <div class="dash-category-title">
        <i class="uil uil-wallet text-success"></i> Withdrawals & Wallets
    </div>

    <div class="row">
        {{-- Card 5: Today's Withdrawal --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-amber">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-amber">
                            <i class="uil uil-arrow-circle-down"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Today's Withdrawal</h5>
                    <h3 class="modern-card-value text-dark">{{ todaysWithdrawal() }}</h3>
                    <p class="modern-card-meta">
                        {{-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> --}}
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 6: Total Withdrawal --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-red">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-red">
                            <i class="uil uil-receipt"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Total Withdrawal</h5>
                    <h3 class="modern-card-value text-dark">{{ totalWithdrawal() }}</h3>
                    <p class="modern-card-meta">
                        {{-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> --}}
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 7: New Withdrawal Request --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-red">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-red">
                            <i class="uil uil-money-withdrawal"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">New Withdrawal Request</h5>
                    <a href="{{ url('admin/new-withdrawal-request') }}" class="text-decoration-none">
                        <h3 class="modern-card-value text-danger">{{ NewWithdrawalRequest() }}</h3>
                    </a>
                    <p class="modern-card-meta">
                        {{-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> --}}
                        <span class="modern-card-meta-dot bg-danger"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 8: Wallets Balance --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-green">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-green">
                            <i class="uil uil-vault"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Wallets Balance</h5>
                    <h3 class="modern-card-value text-success">
                        ${{ totalMainWallet() + totalCourseWallet() + totalTradeWallet() + totalP2PWallet() }}
                    </h3>
                    <p class="modern-card-meta">
                        {{-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> --}}
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 9: Lending Wallet Balance --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-blue">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-blue">
                            <i class="uil uil-university"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Lending Wallet Balance</h5>
                    <h3 class="modern-card-value text-primary">${{ totalMainWallet() }}</h3>
                    <p class="modern-card-meta">
                        {{-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> --}}
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 10: Course Wallet Balance --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-purple">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-purple">
                            <i class="uil uil-book-reader"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Course Wallet Balance</h5>
                    <h3 class="modern-card-value" style="color: #7c3aed;">${{ totalCourseWallet() }}</h3>
                    <p class="modern-card-meta">
                        {{-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> --}}
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 11: Trade Wallet Balance --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-teal">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-teal">
                            <i class="uil uil-chart-line"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Trade Wallet Balance</h5>
                    <h3 class="modern-card-value text-info">${{ totalTradeWallet() }}</h3>
                    <p class="modern-card-meta">
                        {{-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> --}}
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 12: P2P Wallet Balance --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-amber">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-amber">
                            <i class="uil uil-exchange-alt"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">P2P Wallet Balance</h5>
                    <h3 class="modern-card-value text-warning">${{ totalP2PWallet() }}</h3>
                    <p class="modern-card-meta">
                        {{-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> --}}
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row -->


    <!-- ========================================== -->
    <!-- ROW 3: Investment Overview (7 Cards)       -->
    <!-- ========================================== -->
    <div class="dash-category-title">
        <i class="uil uil-layers text-info"></i> Investments Overview
    </div>

    <div class="row">
        {{-- Total Micro Investment --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-cyan">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-cyan">
                            <i class="uil uil-processor"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Total Micro Investment</h5>
                    <h3 class="modern-card-value text-info">{{ totalMicroInvest() }}</h3>
                    <p class="modern-card-meta">
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 13: Total Core Investment --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-blue">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-blue">
                            <i class="uil uil-cube"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Total Core Investment</h5>
                    <h3 class="modern-card-value text-primary">{{ totalCoreInvest() }}</h3>
                    <p class="modern-card-meta">
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 14: Total Lime Investment --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-green">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-green">
                            <i class="uil uil-layer-group"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Total Lime Investment</h5>
                    <h3 class="modern-card-value text-success">{{ totalLimeInvest() }}</h3>
                    <p class="modern-card-meta">
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 15: Total Droid Investment --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-amber">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-amber">
                            <i class="uil uil-robot"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Total Droid Investment</h5>
                    <h3 class="modern-card-value text-warning">{{ totalDroidInvest() }}</h3>
                    <p class="modern-card-meta">
                        {{-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> --}}
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 16: Total Reward Income --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-purple">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-purple">
                            <i class="uil uil-award"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Total Reward Income</h5>
                    <h3 class="modern-card-value" style="color: #7c3aed;">{{ totalRewardIn() }}</h3>
                    <p class="modern-card-meta">
                        {{-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> --}}
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Today's Micro Investment --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-cyan">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-cyan">
                            <i class="uil uil-processor"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Today's Micro Investment</h5>
                    <h3 class="modern-card-value text-info">{{ todaysMicroInvest() }}</h3>
                    <p class="modern-card-meta">
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 17: Today's Core Investment --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-blue">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-blue">
                            <i class="uil uil-box"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Today's Core Investment</h5>
                    <h3 class="modern-card-value text-primary">{{ todaysCoreInvest() }}</h3>
                    <p class="modern-card-meta">
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 18: Today's Lime Investment --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-green">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-green">
                            <i class="uil uil-server"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Today's Lime Investment</h5>
                    <h3 class="modern-card-value text-success">{{ todaysLimeInvest() }}</h3>
                    <p class="modern-card-meta">
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 19: Today's Droid Investment --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-amber">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-amber">
                            <i class="uil uil-circuit"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Today's Droid Investment</h5>
                    <h3 class="modern-card-value text-warning">{{ todaysDroidInvest() }}</h3>
                    <p class="modern-card-meta">
                        {{-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> --}}
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 20: Today's Total Investment --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-cyan">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-cyan">
                            <i class="uil uil-chart-growth"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Today's Total Investment</h5>
                    <h3 class="modern-card-value text-info">{{ todaysTotalInvest() }}</h3>
                    <p class="modern-card-meta">
                        {{-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> --}}
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row -->


    <!-- ========================================== -->
    <!-- ROW 4: Incomes (4 Cards)                   -->
    <!-- ========================================== -->
    <div class="dash-category-title">
        <i class="uil uil-coins text-warning"></i> Incomes & Earnings
    </div>

    <div class="row">
        {{-- Card 21: Direct Income --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-blue">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-blue">
                            <i class="uil uil-user-plus"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Number of Customers">Direct Income</h5>
                    <h3 class="modern-card-value text-primary">{{ totalDirectIn() }}</h3>
                    <p class="modern-card-meta">
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 22: Level Income --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-green">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-green">
                            <i class="uil uil-sitemap"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Number of Orders">Level Income</h5>
                    <h3 class="modern-card-value text-success">{{ totalLevelIn() }}</h3>
                    <p class="modern-card-meta">
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 23: Lending Income --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-cyan">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-cyan">
                            <i class="uil uil-percentage"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Average Revenue">Lending Income</h5>
                    <h3 class="modern-card-value text-info">{{ totalLendingIn() }}</h3>
                    <p class="modern-card-meta">
                        {{-- <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span> --}}
                        <span class="modern-card-meta-dot"></span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 24: New KYC Requests --}}
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="modern-card widget-flat card-border-top-cyan">
                <div class="card-body">
                    <a href="{{ url('admin/new-kyc-requests') }}" class="text-decoration-none">
                        <div class="float-end">
                            <div class="modern-card-icon icon-theme-cyan">
                                <i class="uil uil-user-check"></i>
                            </div>
                        </div>
                        <h5 class="modern-card-title mt-0" title="Average Revenue">New KYC Requests</h5>
                        <h3 class="modern-card-value text-info">{{ newKycRequests() }}</h3>
                        <p class="modern-card-meta">
                            {{-- <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span> --}}
                            <span class="modern-card-meta-dot bg-info"></span>
                            <span class="text-nowrap">Requests Approval Pending</span>
                        </p>
                    </a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row -->


    <!-- ========================================== -->
    <!-- ROW 5: Operational Requests (4 Cards)      -->
    <!-- ========================================== -->
    <div class="dash-category-title">
        <i class="uil uil-bell text-danger"></i> Operational Support & Commands
    </div>

    <div class="row">
        {{-- Card 25: New Support Requests --}}
        <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="modern-card widget-flat shadow-sm card-border-top-purple">
                <div class="card-body">
                    <a href="{{ url('admin/support/new-support-ticket') }}" class="text-decoration-none">
                        <div class="float-end">
                            <div class="modern-card-icon icon-theme-purple">
                                <i class="uil uil-comments-alt"></i>
                            </div>
                        </div>
                        <h5 class="modern-card-title mt-0" title="Growth">New Support Requests</h5>
                        <h3 class="modern-card-value" style="color: #7c3aed;">{{ newSupportRequests() }}</h3>
                        <p class="modern-card-meta">
                            {{-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> --}}
                            <span class="modern-card-meta-dot" style="background: #7c3aed;"></span>
                            <span class="text-nowrap">Requests Reply Pending</span>
                        </p>
                    </a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 26: New Fund Requests --}}
        <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="modern-card widget-flat shadow-sm card-border-top-green">
                <div class="card-body">
                    <a href="{{ url('admin/funds/fund-requets') }}" class="text-decoration-none">
                        <div class="float-end">
                            <div class="modern-card-icon icon-theme-green">
                                <i class="uil uil-usd-circle"></i>
                            </div>
                        </div>
                        <h5 class="modern-card-title mt-0" title="Growth">New Fund Requests</h5>
                        <h3 class="modern-card-value text-success">{{ newFundRequests() }}</h3>
                        <p class="modern-card-meta">
                            {{-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> --}}
                            <span class="modern-card-meta-dot bg-success"></span>
                            <span class="text-nowrap">Requests Reply Pending</span>
                        </p>
                    </a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 27: New Break Requests --}}
        <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="modern-card widget-flat shadow-sm card-border-top-amber">
                <div class="card-body">
                    <a href="{{ url('admin/lending/new-break-request') }}" class="text-decoration-none">
                        <div class="float-end">
                            <div class="modern-card-icon icon-theme-amber">
                                <i class="uil uil-stop-circle"></i>
                            </div>
                        </div>
                        <h5 class="modern-card-title mt-0" title="Growth">New Break Requests</h5>
                        <h3 class="modern-card-value text-warning">{{ newBreakRequests() }}</h3>
                        <p class="modern-card-meta">
                            {{-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> --}}
                            <span class="modern-card-meta-dot bg-warning"></span>
                            <span class="text-nowrap">Requests Reply Pending</span>
                        </p>
                    </a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        {{-- Card 28: Monthly Returns Command --}}
        <div class="col-xl-12 col-lg-12">
            <div class="modern-card widget-flat card-border-top-indigo">
                <div class="card-body">
                    <div class="float-end">
                        <div class="modern-card-icon icon-theme-indigo">
                            <i class="uil uil-play-circle"></i>
                        </div>
                    </div>
                    <h5 class="modern-card-title mt-0" title="Growth">Monthly Returns Command</h5>
                    {{-- @if (getMonthlyreturns() == 1)
                       <h3 class="mt-3 mb-3"><a class="text-success" href="javascript:;">Command Executed</a></h3>
                      
                    @else
                       <h3 class="mt-3 mb-3"><a class="text-danger" href="{{url('admin/run-monthly-return')}}">Execute Command </a>   </h3>
                    @endif --}}
                    <p class="modern-card-meta mt-2">
                        {{-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> --}}
                        <span class="modern-card-meta-dot bg-primary"></span>
                        <span class="text-nowrap">Lending Command Status</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row -->

</div> <!-- end container -->

@endsection
