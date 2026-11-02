<!doctype html>
<html lang="en">


<head>
    <!-- required meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- #title -->
    <title>Terms & Condition || {{ config('detailsApp.name') }}</title>
    <!-- #favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo/favicon/apple-touch-icon.png') }}') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logo/favicon/favicon-32x32.png') }}') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logo/favicon/favicon-16x16.png') }}') }}">
    <link rel="manifest" href="{{ asset('logo/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('logo/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- ==== css dependencies start ==== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.36.0/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('front_assets/css/style.min.css') }}">
</head>

<body>
    <!--  Preloader  -->
    <div class="preloader">
        <span class="loader"></span>
    </div>
    <!-- end preloader -->

    <!-- Scroll To Top Start-->
    <button class="scrollToTop d-none d-md-flex d-center rounded" aria-label="scroll Bar Button"><i
            class="mat-icon fs-four nb4-color ti ti-arrow-up"></i></button>
    <!-- Scroll To Top End -->

    <!-- Start Custom Cursor -->
    <div class="mouse-follower">
        <span class="cursor-outline"></span>
        <span class="cursor-dot"></span>
    </div>
    <!-- End Custom Cursor -->

    <!-- header-section start -->
    <header class="header-section a2-bg-0 header-section--secondary header-menu w-100">
        <div class="container d-center ">
            <nav class="navbar a2-lg-bg py-5 p-lg-5 rounded-3 navbar-expand-lg w-100 justify-content-between ">
                <div class="d-flex align-items-center">
                    <button class="navbar-toggler ms-4" type="button" data-bs-toggle="collapse"
                        aria-label="Navbar Toggler" data-bs-target="#navbar-content" aria-expanded="true"
                        id="nav-icon3">
                        <span></span><span></span><span></span><span></span>
                    </button>
                    <a href="{{ url('/') }}"
                        class="navbar-brand m-0 p-0 d-flex align-items-center gap-5 gap-xl-5 me-2">
                        {{-- <img src="assets/images/fav.png" class="logo small_logo d-sm-none" alt="logo">
                        <img src="assets/images/logo.png" class="logo d-none d-sm-flex" alt="logo"> --}}
                        <img src="{{ asset('logo/logo_blue.png') }}" class="logo small_logo d-sm-none" alt="logo"
                            style="width:60px">
                        <div class="brand-title ms-0 logo d-none d-sm-flex">
                            <img src="{{ asset('logo/logo_blue.png') }}" alt="logo" style="width:60px">
                            <h2 class="text-white pt-2">Liberfx</h2>
                        </div>
                    </a>
                </div>
                <div class="nav_alt">
                    <div class="right-area position-relative ms-0 d-center gap-1 gap-xl-4 d-lg-none">
                        <div class="single-item">
                            <a href="{{ url('/member') }}"
                                class="rotate_eff flex-nowrap py-1 px-2 px-xl-3 d-center gap-1 fw-bold nw1-color"> Login
                                <i class="ti ti-arrow-right fs-six-up"></i></a>
                        </div>
                        <div class="single-item">
                            <a href="{{ url('/member/register/1') }}"
                                class="cmn-btn fw-bold py-2 px-2 px-sm-3 px-lg-4 align-items-center gap-1"> Sign Up <i
                                    class="ti ti-arrow-right fw-semibold fs-six-up"></i></a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse justify-content-center" id="navbar-content">
                    <ul class="navbar-nav gap-2 gap-lg-3 gap-xxl-8  align-self-center mx-auto mt-4 mt-lg-0">
                        <li class="dropdown show-dropdown">
                        <li><a class="dropdown-item active" href="{{ url('/') }}">Home</a></li>
                        </li>
                        <li><a class="dropdown-item" href="{{ url('/about') }}">about</a></li>
                        <li><a class="dropdown-item" href="{{ url('/trading') }}">trading</a></li>
                        <li><a class="dropdown-item" href="{{ url('/course') }}">Course</a></li>
                        <li><a class="dropdown-item" href="{{ url('/contact') }}">contact</a></li>
                    </ul>
                </div>
                <div class="right-area position-relative  ms-0 d-center gap-1 gap-xl-4 d-none d-lg-flex">
                    <div class="single-item">
                        <a href="{{ url('/member') }}"
                            class="rotate_eff flex-nowrap py-1 px-2 px-xl-3 d-center gap-1 fw-bold nw1-color"> Login <i
                                class="ti ti-arrow-right fs-six-up"></i></a>
                    </div>
                    <div class="single-item">
                        <a href="{{ url('/member/register/1') }}"
                            class="cmn-btn fw-bold py-2 px-2 px-sm-3 px-lg-4 align-items-center gap-1"> Sign Up <i
                                class="ti ti-arrow-right fw-semibold fs-six-up"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- header-section end -->


    <!-- banner section start-->
    <section class="banner-section  pt-120 pb-120">
        <div class="container mt-lg-0 pt-18 pt-xl-20">
            <div class="row">
                <div class="col-12 breadcrumb-area ">
                    <h2 class="mb-4">Terms & Condition</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item ms-2 ps-7 active" aria-current="page"><span>Terms &
                                    Condition</span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section end -->

    <!-- Company Story start-->
    <section class="company-story position-relative z-0  pt-120 pb-120 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xxl-7">
                    <div class="heading__content mb-10 mb-lg-15 text-center">
                        <span class="heading p1-color fs-five mb-5">Liberfx</span>
                        <h3 class="mb-5 mb-lg-6">Terms of Service</h3>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <!-- About Content Wrap Start -->
                <div class="about-content-wrap">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="card bg-dark" style="background-color: rgba(red, green, blue, 0.1)">
                                <div class="card-body">
                                    <!-- About Content Start -->
                                    <div class="about-content">


                                        <h5 style="margin-top: 25px">Article 1:</h5>

                                        <p>This website only provides online trading platform services for you to engage
                                            in
                                            digital asset trading activities (including but not limited to digital asset
                                            trading, etc.) through this website. This website does not participate in
                                            the
                                            transaction of digital assets as a buyer or seller; this website does not
                                            provide
                                            any services related to the deposit and withdrawal of fiat currency in any
                                            country.
                                        </p>

                                        <h5 style="margin-top: 25px">Article 2:</h5>

                                        <p>1. You have the right to browse real-time quotations and transaction
                                            information of
                                            digital asset products on this website, submit digital asset transaction
                                            instructions, and complete digital asset transactions through this
                                            website.<br>

                                            2. You have the right to view the information under the member account on
                                            this
                                            website and apply the functions provided by this website.<br>

                                            3. You have the right to participate in website activities organized by this
                                            website
                                            in accordance with the activity rules published on this website.<br>

                                            4. Other services that this website promises to provide you.</p>

                                        <h5 style="margin-top: 25px"> Article 3: </h5>

                                        <p>You shall comply with applicable laws, regulations, rules and policy
                                            requirements,
                                            ensure that all digital assets in your account are of legal origin, and
                                            shall not
                                            engage in any illegal activities or other activities that damage the rights
                                            and
                                            interests of this website or any third party, such as sending or receiving
                                            illegal,
                                            Information that is inappropriate or violates the rights of any other
                                            person, sends
                                            or receives pyramid schemes or causes damage to other information or speech,
                                            unauthorized use or falsification of email header information from this
                                            website,
                                            ETC.</p>

                                        <h5 style="margin-top: 25px"> Article 4: </h5>
                                        <p>
                                            You should abide by applicable laws and regulations, correctly use and
                                            properly keep
                                            your account number and login password on this website, your financial
                                            transaction
                                            password, the mobile phone number you provided when registering an account
                                            and bound
                                            to your account, and use your The verification code received by the mobile
                                            phone
                                            security. You are solely responsible for any operation and all consequences
                                            arising
                                            therefrom using your account and login password on this website, financial
                                            transaction password, and verification code sent to your mobile phone. When
                                            you find
                                            that your account number, login password, financial transaction password or
                                            mobile
                                            phone verification code on this website is used by any unauthorized third
                                            party, and
                                            you find other issues related to your account security, you should promptly
                                            notify
                                            this website in a timely manner effective way and require this website to
                                            suspend
                                            the provision of services to your account on this website. This website has
                                            the
                                            right to take action on your request within a reasonable time; however, this
                                            website
                                            is not responsible for the consequences that have occurred before such
                                            action is
                                            taken, including but not limited to any loss you may suffer. You may not
                                            donate,
                                            lend, rent, transfer or otherwise transfer your account on this website to
                                            any other
                                            person without the consent of this website.</p>

                                        <h5 style="margin-top: 25px"> Article 5: </h5>
                                        <p>
                                            You agree to be responsible for all activities (including but not limited to
                                            information disclosure, information release, online click approval or
                                            submission of
                                            various rules and agreements, online renewal of agreement or purchase of
                                            services)
                                            on this website using your account and password.</p>

                                        <h5 style="margin-top: 25px"> Article 6: </h5>
                                        <p>
                                            When you conduct digital asset transactions on this website, you shall not
                                            maliciously interfere with the normal conduct of digital asset transactions
                                            or
                                            disrupt the transaction order; you shall not use any technical means or
                                            other means
                                            to interfere with the normal operation of this website or interfere with the
                                            use of
                                            services by other users; You may not maliciously defame the goodwill of this
                                            website
                                            based on false facts.</p>

                                        <h5 style="margin-top: 25px"> Article 7: </h5>
                                        <p>
                                            As the service provider of this website, if the user violates the relevant
                                            laws of
                                            the United States by violating this statement, this website is obliged to
                                            improve
                                            the rules and services. However, this website has no motive or fact to
                                            violate the
                                            relevant laws of the United States, and does not assume any joint and
                                            several
                                            liability.</p>
                                    </div>
                                    <!-- About Content End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About Content Wrap End -->
            </div>
        </div>
    </section>
    <!-- Company Story end -->

    @extends('frontend.layouts.footer')

    <!-- ==== js dependencies start ==== -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('front_assets/js/plugins/plugins.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/plugin-custom.js') }}"></script>
    <script src="{{ asset('front_assets/js/main.js') }}"></script>
</body>

</html>
