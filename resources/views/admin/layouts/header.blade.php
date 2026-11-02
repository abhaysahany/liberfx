<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | {{ config('detailsApp.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" /> --}}
    <!-- App favicon -->
    <!-- App favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logo/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logo/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('logo/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('logo/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <!-- Datatables css -->
    <link href="{{ asset('adm_assets/assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('adm_assets/assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- third party css -->
    <link href="{{ asset('adm_assets/assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{ asset('adm_assets/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adm_assets/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('adm_assets/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="dark-style" />
</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- LOGO -->
            <a href="{{ url('/admin/dashboard') }}" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="{{ asset('logo/logo-white.png') }}" alt="" height="80">
                    {{-- <span class="text-white h3 ">Liberfx</span> --}}
                </span>
                <span class="logo-sm">
                    <img src="{{ asset('logo/logo-icon.png') }}" alt="" height="100">
                    {{-- <span class="text-white h3">Liberfx</span> --}}
                </span>
            </a>

            <!-- LOGO -->
            <a href="{{ url('/admin/dashboard') }}" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="{{ asset('logo/logo-icon.png') }}" alt="" height="60">
                </span>
                <span class="logo-sm">
                    <img src="{{ asset('logo/logo-icon.png') }}" alt="" height="60">
                </span>
            </a>

            <div class="h-100" id="leftside-menu-container" data-simplebar>

                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title side-nav-item">Navigation</li>

                    <li class="side-nav-item">
                        <a href="{{ url('admin/dashboard') }}" aria-expanded="false" class="side-nav-link">
                            <i class="uil-layers"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{ url('/admin/dash-messages') }}" class="side-nav-link">
                            <i class="uil-comments-alt"></i>
                            <span> Dashboard Messages </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{ url('/admin/dash-videos') }}" class="side-nav-link">
                            <i class="uil-comments-alt"></i>
                            <span> Dash Videos </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ url('/admin/level-stats') }}" class="side-nav-link">
                            <i class="uil-game-structure"></i>
                            <span> Level Stat </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ url('admin/welcome-images') }}" class="side-nav-link">
                            <i class="uil-game-structure"></i>
                            <span> Welcome Images </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ url('admin/send-news') }}" class="side-nav-link">
                            <i class="uil-newspaper"></i>
                            <span> Send News </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ url('/admin/rank-ratios') }}" class="side-nav-link">
                            <i class="uil-game-structure"></i>
                            <span> Rank Ratio </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ url('/admin/deduction') }}" class="side-nav-link">
                            <i class="uil-game-structure"></i>
                            <span> Deduction </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ url('admin/fund-request-stat') }}" class="side-nav-link">
                            <i class="uil-game-structure"></i>
                            <span>Wallet Details</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ url('/admin/addon-data') }}" class="side-nav-link">
                            <i class="uil-game-structure"></i>
                            <span> Add On Data </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarFakeData" aria-expanded="false"
                            aria-controls="sidebarFakeData" class="side-nav-link">
                            <i class="uil-game-structure"></i>
                            <span> Fake Data </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarFakeData">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ url('/admin/fake-data') }}">Fake Lending Data</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/fake-reward-income') }}">Fake Reward Income Data</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/fake-light-level-income') }}">Fake Light Level Income Data</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ url('admin/send-mails') }}" class="side-nav-link">
                            <i class="uil-envelope"></i>
                            <span> Send Mails </span>
                        </a>
                    </li>
                    <li class="side-nav-title side-nav-item">Management</li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false"
                            aria-controls="sidebarPages" class="side-nav-link">
                            <i class="uil-user-circle"></i>
                            <span> Member Management </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPages">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ url('admin/member-details') }}">Members Details</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/member-security') }}">Members Security</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/member-investment') }}">Members Investment</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/account-control') }}">Account Control</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/new-kyc-requests') }}">New KYC Requests</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/verified-kyc-requests') }}">Accepted KYC Requests</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#copyTrades" aria-expanded="false"
                            aria-controls="copyTrades" class="side-nav-link">
                            <i class="uil-book"></i>
                            <span> Copy Trading Section </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="copyTrades">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ url('admin/account-details') }}">Account Details</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/create-trade') }}">Create Trade</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/trading-detail') }}">Trade Details</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/copy-summary') }}">Copy Summary</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/copy-history') }}">Copy History</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/new-pay-slip') }}">New Pay Slip</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/slip-history') }}">Slip History</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/member-deposit') }}">Member Deposit</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPages3" aria-expanded="false"
                            aria-controls="sidebarPages3" class="side-nav-link">
                            <i class="uil-suitcase"></i>
                            <span> Funds Management </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPages3">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ url('admin/funds/add-funds') }}">Add Funds</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/funds/deduct-funds') }}">Deduct Funds</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/funds/add-funds-details') }}">Funds History</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/funds/fund-requets') }}">Funds Request</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/funds/request-history') }}">Request History</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPages8" aria-expanded="false"
                            aria-controls="sidebarPages8" class="side-nav-link">
                            <i class="uil-package"></i>
                            <span> Course Section </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPages8">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ url('admin/course/all-courses') }}">All Course</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/course/course-detail') }}">Course Details</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPages100" aria-expanded="false"
                            aria-controls="sidebarPages100" class="side-nav-link">
                            <i class="uil-suitcase"></i>
                            <span> Lending Section </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPages100">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ url('admin/lending/micro-lendings') }}">Micro Lendings</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/lending/core-lendings') }}">Core Lendings</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/lending/lime-lendings') }}">Lime Lendings</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/lending/droid-lendings') }}">Droid Lendings</a>
                                </li>
                                <!--<li>-->
                                <!--    <a href="{{ url('admin/lending/break-request') }}">Break Requests</a>-->
                                <!--</li>-->
                                <!--<li>-->
                                <!--    <a href="{{ url('admin/lending/break-details') }}">Break Details</a>-->
                                <!--</li>-->
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPages101" aria-expanded="false"
                            aria-controls="sidebarPages100" class="side-nav-link">
                            <i class="uil-suitcase"></i>
                            <span> Break Section </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPages101">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ url('admin/lending/new-break-request') }}">New Requests</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/lending/approved-break-request') }}">Approved Requests</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/lending/rejected-break-request') }}">Rejected Requests</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPages4" aria-expanded="false"
                            aria-controls="sidebarPages4" class="side-nav-link">
                            <i class="uil-wallet"></i>
                            <span> Income Section </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPages4">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ url('admin/income/level-incomes') }}">Level Income</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/income/lending-incomes') }}">Lending Income</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/income/light-level-incomes') }}">Light Level Income</a>
                                </li>
                                <!--<li>-->
                                <!--    <a href="{{ url('admin/income/roi-incomes') }}">Roi Income</a>-->
                                <!--</li>-->
                                <li>
                                    <a href="{{ url('admin/income/reward-incomes') }}">Reward Income</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPages6" aria-expanded="false"
                            aria-controls="sidebarPages6" class="side-nav-link">
                            <i class="uil-money-withdrawal"></i>
                            <span> Payment Management </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPages6">
                            <ul class="side-nav-second-level">
                                {{-- <li>
                                        <a href="{{url('admin/set-pay-mode')}}">Set Payment Mode</a>
                                    </li> --}}
                                <li>
                                    <a href="{{ url('admin/new-withdrawal-request') }}">New Withdrawal Requests</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/cancelled-request') }}">Cancelled Requests</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/payment-history') }}">Payment History</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/manual-withdrawal-history') }}">Manual Withdrawal
                                        History</a>
                                </li>
                                {{-- <li>
                                    <a href="{{ url('admin/trade-wallet-history') }}">Trade Wallet History</a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPages7" aria-expanded="false"
                            aria-controls="sidebarPages7" class="side-nav-link">
                            <i class="uil-comments-alt"></i>
                            <span> Support </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPages7">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ url('admin/support/new-support-ticket') }}">New Support Tickets</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/support/open-support-ticket') }}">Open Support Tickets</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/support/close-support-ticket') }}">Closed Support
                                        Tickets</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{ url('/admin/logout') }}" class="side-nav-link">
                            <i class="uil-exit"></i>
                            <span> Logout </span>
                        </a>
                    </li>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>

                        <li class="notification-list">
                            <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                <i class="dripicons-gear noti-icon"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown"
                                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="{{ asset('uploads/avatar.jpg') }}" alt="user-image" width="32"
                                        class="rounded-circle">
                                </span>
                                <span class="d-lg-flex flex-column gap-1 d-none">
                                    <h5 class="my-0">Admin</h5>
                                    <h6 class="my-0 fw-normal">liberfx.com</h6>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="{{ url('admin/change-password') }}" class="dropdown-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>Change Password</span>
                                </a>

                                <!-- item-->
                                <a href="{{ url('admin/change-email') }}" class="dropdown-item">
                                    <i class="mdi mdi-account-edit me-1"></i>
                                    <span>Change Email</span>
                                </a>

                                <!-- item-->
                                <a href="{{ url('/admin/logout') }}" class="dropdown-item">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>



                    </ul>
                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <div class="app-search dropdown d-none d-lg-block">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control dropdown-toggle" placeholder="Search..."
                                    id="top-search">
                                <span class="mdi mdi-magnify search-icon"></span>
                                <button class="input-group-text btn-primary" type="submit">Search</button>
                            </div>
                        </form>

                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-notes font-16 me-1"></i>
                                <span>Analytics Report</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-life-ring font-16 me-1"></i>
                                <span>How can I help you?</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-cog font-16 me-1"></i>
                                <span>User profile settings</span>
                            </a>

                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex">
                                        <img class="d-flex me-2 rounded-circle"
                                            src="{{ asset('adm_assets/assets/images/users/avatar-2.jpg') }}"
                                            alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Erwin Brown</h5>
                                            <span class="font-12 mb-0">UI Designer</span>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex">
                                        <img class="d-flex me-2 rounded-circle"
                                            src="{{ asset('adm_assets/assets/images/users/avatar-5.jpg') }}"
                                            alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Jacob Deo</h5>
                                            <span class="font-12 mb-0">Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Topbar -->
