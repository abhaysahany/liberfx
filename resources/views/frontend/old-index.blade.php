<!doctype html>
<html lang="en">


<head>
    <!-- required meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- #title -->
    <title>Home || {{ config('detailsApp.name') }}</title>
    <!-- #favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logo/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logo/favicon/favicon-16x16.png') }}">
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
                        <img src="{{ asset('logo/logo-icon.png') }}" class="logo small_logo d-sm-none" alt="logo"
                            style="width:60px">
                        <div class="brand-title ms-0 logo d-none d-sm-flex">
                            <img src="{{ asset('logo/logo-icon.png') }}" alt="logo" style="width:60px">
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


    <!-- hero section start-->
    <section class="hero-section position-relative z-0 ">
        <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
            <img src="{{ asset('front_assets/images/hero_vector.png') }}" alt="vector"
                class="position-absolute d-none d-xxxl-flex bottom-0 end-0 previewShapeRevX">
        </div>
        <div class="container pt-20 mt-12 mt-lg-20">
            <div
                class="row pt-4 pt-lg-10 gy-12 gy-lg-0 justify-content-center justify-content-lg-between align-items-center">
                <div class="col-lg-6 col-xxl-7">
                    <div class="hero-card p1-xxl-bg pt-xl-20 pb-xl-20 position-relative">
                        <div class="pt-xxl-10 pb-xxl-10">
                            <div
                                class="circle-text first d-center cus-z1 position-absolute end-0 top-0 d-none d-xxl-flex  me-lg-10 mt-lg-10">
                                <div class="text d-center">
                                    <p class="fs-six">Trading Unlocking Diversified</p>
                                </div>
                                <img src="{{ asset('front_assets/images/circle_star.png') }}" alt="star"
                                    class="push_animat">
                            </div>
                            <span class="heading p1-max-xxl nb4-xxl-color fs-five mb-3">Trading platforms </span>
                            <h1 class="display-two nb4-xxl-color mb-5 mb-lg-6">Trade Abundance</h1>
                            <p class="fs-six-up fw_500 nb4-xxl-color">Covesting allows you to automatically copy top
                                performing traders and achieve the returns</p>
                            <div class="d-inline-flex flex-wrap gap-4 gap-lg-10 align-items-center mt-8 mt-lg-10">
                                <a href="{{ url('/member/register/1') }}"
                                    class="cmn-btn alt-xxl-bg fs-five nb4-xxl-bg gap-2 gap-lg-3 align-items-center py-2 px-5 py-lg-3 px-lg-6">Start
                                    Trading <i class="ti ti-trending-up"></i></a>
                                <a href="{{ url('/member') }}"
                                    class="cmn-btn link link-xxl-color fs-five  gap-2 gap-lg-3 align-items-center "><i
                                        class="ti ti-arrow-narrow-right fs-four"></i> Create New Account</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-lg-6 col-xxl-5">
                    <div class="hero-section__thumbs pb-xxl-10">
                        <img src="{{ asset('front_assets/images/hero_thumb.png') }}" class="max-auto max-xxl-un"
                            alt="img">
                    </div>
                </div>
                <ul
                    class="list_items col-12 d-flex row-gap-6 gap-lg-15 justify-content-between flex-wrap pt-2 pt-lg-15 pt-xl-2 pt-xxl-15 pb-15">
                    <li class="d-flex gap-3 align-items-center">
                        <span class="d-center s1-bg p-3 p-lg-4 rounded-circle"><i
                                class="ti ti-tools fs-three nb4-color"></i></span>
                        <h4 class="nw1-color">Enhanced Tools</h4>
                    </li>
                    <li class="d-flex gap-3 align-items-center">
                        <span class="d-center s1-bg p-3 p-lg-4 rounded-circle"><i
                                class="ti ti-trending-up fs-three nb4-color"></i></span>
                        <h4 class="nw1-color">Trading Guides</h4>
                    </li>
                    <li class="d-flex gap-3 align-items-center">
                        <span class="d-center s1-bg p-3 p-lg-4 rounded-circle"><i
                                class="ti ti-broadcast fs-three nb4-color"></i></span>
                        <h4 class="nw1-color">Fast Execution</h4>
                    </li>
                    <li class="d-flex gap-3 align-items-center">
                        <span class="d-center s1-bg p-3 p-lg-4 rounded-circle"><i
                                class="ti ti-percentage fs-three nb4-color"></i></span>
                        <h4 class="nw1-color">0% Commission</h4>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- hero section end -->

    <!-- Why Trade start-->
    <section class="why-trade s1-bg alt-color position-relative z-0">
        <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
            <img src="{{ asset('front_assets/images/sun.png') }}" alt="vector"
                class="position-absolute push_animat">
            <img src="{{ asset('front_assets/images/star.png') }}" alt="vector"
                class="position-absolute  d-xxxl-flex previewSkew">
        </div>
        <div class="container">
            <div class="row gy-3 gy-lg-0 justify-content-center">
                <div class="col-sm-7 col-lg-6 col-xxl-5 order-2 order-lg-0">
                    <div class="why-trade__thumbs h-100 d-flex align-items-end ps-20 ps-sm-5 ps-lg-0">
                        <img src="{{ asset('front_assets/images/why_trade.png') }}" alt="Imgae">
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-7">
                    <div class="row pt-120 pb-120">
                        <div class="col-xxl-6 offset-xxl-2">
                            <div class="why-trade__part">
                                <span class="heading fs-five">Why Trade With</span>
                                <h3 class="mb-3 mt-5">Trade Genius</h3>
                                <p>Trading is the art and science of buying and selling financial instruments, such as
                                    stocks bonds currencies. </p>
                                <a href="about.html"
                                    class="cmn-btn link secondary-link fs-six-up  gap-2 gap-lg-3 align-items-center mt-5">
                                    Learn more <i class="ti ti-arrow-narrow-right fs-four"></i></a>
                            </div>
                        </div>
                        <div class="col-xxl-12 mt-7 mt-md-8 mt-xxl-3">
                            <div class="why-trade__part d-flex align-items-center">
                                <div class="vector d-none d-xxl-flex px-xxl-15">
                                    <img src="{{ asset('front_assets/images/trade_vector.png') }}" alt="Image"
                                        class="max-xxl-un">
                                </div>
                                <div class="content">
                                    <h3 class="mb-3">Trade Apex</h3>
                                    <p>Trading is the art and science of buying and selling financial instruments, suc
                                        stocks, bonds, currencies commodities, and cryptocurrencies, with the aim of
                                        making a profit. It's a dynamic and multifaceted professionals from around the
                                        world.</p>
                                    <a href="about.html"
                                        class="cmn-btn link secondary-link fs-six-up  gap-2 gap-lg-3 align-items-center mt-5">
                                        Learn more <i class="ti ti-arrow-narrow-right fs-four"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Trade end -->

    <!--provide-world start-->
    <section class="provide-world bg nb4-bg pt-120 pb-120  position-relative z-0">
        <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1 d-none d-md-flex">
            <img src="{{ asset('front_assets/images/button.png') }}" alt="vector"
                class="position-absolute pt-6 pt-xl-15 previewShapeRevX">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xxl-7">
                    <div class="heading__content mb-10 mb-lg-15 text-center">
                        <span class="heading p1-color fs-five mb-5">We Provide World’s</span>
                        <h3 class="mb-5 mb-lg-6">Join a club of more than <span class="s1-color">480,000</span>
                            traders</h3>
                        <p class="fs-six-up mx-ch mx-auto">Trading is the art and science of buying and selling
                            financial instruments, such as stocks bonds currencies commodities</p>
                    </div>
                </div>
            </div>
            <div class="row gy-6 gy-xxl-0">
                <div class="col-md-6 col-xxl-4">
                    <div class="provide-world__card nb3-bg text-center cus-rounded-1 py-5 py-lg-10 px-4 px-lg-9">
                        <span class="provide-card__icon d-center nb4-bg p-4 rounded-circle mx-auto">
                            <i class="ti ti-award-filled fs-three p1-color"></i>
                        </span>
                        <h4 class="mt-5 mb-5">Best Reputation</h4>
                        <p>transformed the trading landscape. Online trading platforms and mobile apps have made it
                            easier than ever for individuals</p>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-4">
                    <div class="provide-world__card nb3-bg text-center cus-rounded-1 py-5 py-lg-10 px-4 px-lg-9">
                        <span class="provide-card__icon d-center nb4-bg p-4 rounded-circle mx-auto">
                            <i class="ti ti-users fs-three p1-color"></i>
                        </span>
                        <h4 class="mt-5 mb-5">480,000+ Clients</h4>
                        <p>One of the fundamental principles of trading is risk management. Successful traders carefully
                            manage their capital,</p>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-4">
                    <div class="provide-world__card nb3-bg text-center cus-rounded-1 py-5 py-lg-10 px-4 px-lg-9">
                        <span class="provide-card__icon d-center nb4-bg p-4 rounded-circle mx-auto">
                            <i class="ti ti-shield-check-filled fs-three p1-color"></i>
                        </span>
                        <h4 class="mt-5 mb-5">Trusted and Secure</h4>
                        <p>Trading is not without its challenges, as markets can be highly volatile and unpredictable.
                            It requires discipline</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- provide-world end -->

    <!--Trade On start-->
    <section class="trade_on a2-bg pt-120 pb-120 position-relative z-0">
        <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
            <img src="{{ asset('front_assets/images/coin.png') }}" alt="vector"
                class="position-absolute d-none d-md-flex previewShapeRevX">
            <img src="{{ asset('front_assets/images/star2.png') }}" alt="vector"
                class="position-absolute d-none d-xl-flex push_animat">
            <img src="{{ asset('front_assets/images/coin_vector.png') }}" alt="vector"
                class="position-absolute d-none d-xxxl-flex bottom-0 end-0 previewShapeRevX opacity-50">
        </div>
        <div class="container">
            <div class="row gy-10 gy-xxl-0 justify-content-center justify-content-xxl-between align-items-center">
                <div class="col-lg-6 col-xxl-5">
                    <div class="trade_on__content">
                        <span class="heading s1-color fs-five mb-5">Trade On Our</span>
                        <h3 class="mb-4 mb-lg-5">World Class Platform</h3>
                        <p class="fs-six mx-ch">Trading in financial markets involves a wide range of strategies that
                            traders employ to make informed decisions. From trading to swing trading and long-term
                            investing, each strategy has its own set of principles and risk factors.</p>
                        <ul class="d-flex gap-4 flex-column mt-6">
                            <li class="d-flex align-items-center gap-3 fs-six-up"><i
                                    class="ti ti-circle-check s1-color fs-four"></i>Charts trading</li>
                            <li class="d-flex align-items-center gap-3 fs-six-up"><i
                                    class="ti ti-circle-check s1-color fs-four"></i>Understanding Trading Strategies
                            </li>
                            <li class="d-flex align-items-center gap-3 fs-six-up"><i
                                    class="ti ti-circle-check s1-color fs-four"></i>Risk Management in Trading </li>
                            <li class="d-flex align-items-center gap-3 fs-six-up"><i
                                    class="ti ti-circle-check s1-color fs-four"></i>Technical vs. Fundamental Analysis
                            </li>
                        </ul>
                        <a href="{{ url('/member/register/1') }}"
                            class="cmn-btn secondary-alt fs-six-up nb4-xxl-bg gap-2 gap-lg-3 align-items-center py-2 px-5 py-lg-3 px-lg-6 mt-7 mt-xxl-8">Sign
                            up Now <i class="ti ti-arrow-right fs-four"></i></a>
                    </div>
                </div>
                <div class="col-md-8 col-lg-6">
                    <div class="trade_on__thumbs d-flex justify-content-end">
                        <img src="{{ asset('front_assets/images/trade_on.png') }}" alt="Imgae">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Trade On end -->

    <!--People Trust start-->
    <section class="people_trust pt-120 pb-120 position-relative z-0">
        <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
            <img src="{{ asset('front_assets/images/vector.png') }}" alt="vector"
                class="position-absolute jello d-none d-xl-flex">
            <img src="{{ asset('front_assets/images/star3.png') }}" alt="vector"
                class="position-absolute push_animat d-none d-xxxl-flex">
            <img src="{{ asset('front_assets/images/vector3.png') }}" alt="vector"
                class="position-absolute bottom-0 end-0 d-none d-xxxl-flex">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-xxl-7">
                    <div class="heading__content mb-8 mb-lg-10 text-center">
                        <span class="heading p1-color fs-five mb-5">People Trust Us</span>
                        <h3 class="mb-4 mb-lg-6">Millions of Users Worldwide</h3>
                        <p class="fs-six-up mx-ch mx-auto">The rise of cryptocurrencies has opened up new trading this
                            beginner's guide to cryptocurrency trading,</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="singletab">
                        <ul class="tablinks d-center flex-wrap gap-3 gap-lg-4  mb-10 mb-xxl-15">
                            <li class="nav-links active">
                                <button
                                    class="tablink cmn-btn outline_btn align-items-center fs-six-up py-2 py-lg-3 px-6  px-md-3 px-xxl-10 d-flex gap-3 align-items-center"><i
                                        class="ti ti-video fs-four s1-color"></i>Test Your Knowledge</button>
                            </li>
                            <li class="nav-links">
                                <button
                                    class="tablink cmn-btn outline_btn align-items-center fs-six-up py-2 py-lg-3 px-6  px-md-3 px-xxl-10 d-flex gap-3 align-items-center"><i
                                        class="ti ti-video fs-four s1-color"></i>Tutorial Videos</button>
                            </li>
                            <li class="nav-links">
                                <button
                                    class="tablink cmn-btn outline_btn align-items-center fs-six-up py-2 py-lg-3 px-6  px-md-3 px-xxl-10 d-flex gap-3 align-items-center"><i
                                        class="ti ti-video fs-four s1-color"></i>Live Commentary</button>
                            </li>
                        </ul>
                        <div class="tabcontents">
                            <div class="tabitem active">
                                <div
                                    class="row gy-10 gy-xl-0 justify-content-center justify-content-lg-between align-items-center">
                                    <div class="col-xl-6 col-xxl-7 ">
                                        <div
                                            class="people_trust_thumb d-center p-2 p-lg-5 pseudo_element_after overflow-hidden">
                                            <img src="{{ asset('front_assets/images/people_trust_video.png') }}"
                                                class="w-100 max-xxl-un cus-rounded-2" alt="video">
                                            <a href="https://www.youtube.com/watch?v=BHACKCNDMW8"
                                                class="popup-video box_10 btn-popup-animation position-absolute d-center rounded-circle">
                                                <i class="fa-solid fa-play fs-four"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-xxl-5">
                                        <div class="trade_on__content">
                                            <h4 class="mb-4">What you will learn</h4>
                                            <p class="mx-ch">The rise of cryptocurrencies has opened up new trading In
                                                this beginner's guide to cryptocurrency trading we demystify the world
                                                of digital currencies</p>
                                            <ul class="list_divided d-flex flex-wrap gap-5 mt-5 mt-xxl-6">
                                                <li class="d-flex align-items-center gap-3 fs-six-up"><i
                                                        class="ti ti-circle-check s1-color fs-four"></i>Charts trading
                                                </li>
                                                <li class="d-flex align-items-center gap-3 fs-six-up"><i
                                                        class="ti ti-circle-check s1-color fs-four"></i>Supreme
                                                    Authority</li>
                                                <li class="d-flex align-items-center gap-3 fs-six-up"><i
                                                        class="ti ti-circle-check s1-color fs-four"></i>Worldly Power
                                                </li>
                                                <li class="d-flex align-items-center gap-3 fs-six-up"><i
                                                        class="ti ti-circle-check s1-color fs-four"></i>Global
                                                    Dominance</li>
                                            </ul>
                                            <div class="mt-8 mt-xxl-10">
                                                <div class="counter-area d-flex gap-8 gap-xxl-10 ">
                                                    <div class="counter-part">
                                                        <div class="counters d-flex">
                                                            <span class="odometer display-four s1-color"
                                                                data-odometer-final="12">0</span>
                                                            <span class="display-four symbol s1-color">K</span>
                                                        </div>
                                                        <span class="mt-4">Users Joined</span>
                                                    </div>
                                                    <div class="counter-part">
                                                        <div class="counters d-flex">
                                                            <span class="odometer display-four s1-color"
                                                                data-odometer-final="5.5">0</span>
                                                            <span class="display-four symbol s1-color">M</span>
                                                        </div>
                                                        <span class="mt-4">Monthly Voulme (In USD)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabitem">
                                <div
                                    class="row gy-10 gy-xl-0 justify-content-center justify-content-lg-between align-items-center">
                                    <div class="col-xl-6 col-xxl-5">
                                        <div class="trade_on__content">
                                            <h4 class="mb-4">What you will learn</h4>
                                            <p class="mx-ch">The rise of cryptocurrencies has opened up new trading In
                                                this beginner's guide to cryptocurrency trading we demystify the world
                                                of digital currencies</p>
                                            <ul class="list_divided d-flex flex-wrap gap-5 mt-5 mt-xxl-6">
                                                <li class="d-flex align-items-center gap-3 fs-six-up"><i
                                                        class="ti ti-circle-check s1-color"></i>Charts trading</li>
                                                <li class="d-flex align-items-center gap-3 fs-six-up"><i
                                                        class="ti ti-circle-check s1-color"></i>Supreme Authority</li>
                                                <li class="d-flex align-items-center gap-3 fs-six-up"><i
                                                        class="ti ti-circle-check s1-color"></i>Worldly Power</li>
                                                <li class="d-flex align-items-center gap-3 fs-six-up"><i
                                                        class="ti ti-circle-check s1-color"></i>Global Dominance</li>
                                            </ul>
                                            <div class="mt-8 mt-xxl-10">
                                                <div class="counter-area d-flex gap-8 gap-xxl-10 ">
                                                    <div class="counter-part">
                                                        <div class="counters d-flex">
                                                            <span class="odometer display-four s1-color"
                                                                data-odometer-final="12">0</span>
                                                            <span class="display-four symbol s1-color">K</span>
                                                        </div>
                                                        <span class="mt-4">Users Joined</span>
                                                    </div>
                                                    <div class="counter-part">
                                                        <div class="counters d-flex">
                                                            <span class="odometer display-four s1-color"
                                                                data-odometer-final="5.5">0</span>
                                                            <span class="display-four symbol s1-color">M</span>
                                                        </div>
                                                        <span class="mt-4">Monthly Voulme (In USD)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-xxl-7 ">
                                        <div
                                            class="people_trust_thumb d-center p-2 p-lg-5 pseudo_element_after overflow-hidden">
                                            <img src="{{ asset('front_assets/images/people_trust_video.png') }}"
                                                class="w-100 max-xxl-un cus-rounded-2" alt="video">
                                            <a href="https://www.youtube.com/watch?v=BHACKCNDMW8"
                                                class="popup-video box_10 btn-popup-animation position-absolute d-center rounded-circle">
                                                <i class="fa-solid fa-play fs-four"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabitem">
                                <div
                                    class="row gy-10 gy-xl-0 justify-content-center justify-content-lg-between align-items-center">
                                    <div class="col-xl-6 col-xxl-7 ">
                                        <div
                                            class="people_trust_thumb d-center p-2 p-lg-5 pseudo_element_after overflow-hidden">
                                            <img src="{{ asset('front_assets/images/people_trust_video.png') }}"
                                                class="w-100 max-xxl-un cus-rounded-2" alt="video">
                                            <a href="https://www.youtube.com/watch?v=BHACKCNDMW8"
                                                class="popup-video box_10 btn-popup-animation position-absolute d-center rounded-circle">
                                                <i class="fa-solid fa-play fs-four"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-xxl-5">
                                        <div class="trade_on__content">
                                            <h4 class="mb-4">What you will learn</h4>
                                            <p class="mx-ch">The rise of cryptocurrencies has opened up new trading In
                                                this beginner's guide to cryptocurrency trading we demystify the world
                                                of digital currencies</p>
                                            <ul class="list_divided d-flex flex-wrap gap-5 mt-5 mt-xxl-6">
                                                <li class="d-flex align-items-center gap-3 fs-six-up"><i
                                                        class="ti ti-circle-check s1-color fs-four"></i>Charts trading
                                                </li>
                                                <li class="d-flex align-items-center gap-3 fs-six-up"><i
                                                        class="ti ti-circle-check s1-color fs-four"></i>Supreme
                                                    Authority</li>
                                                <li class="d-flex align-items-center gap-3 fs-six-up"><i
                                                        class="ti ti-circle-check s1-color fs-four"></i>Worldly Power
                                                </li>
                                                <li class="d-flex align-items-center gap-3 fs-six-up"><i
                                                        class="ti ti-circle-check s1-color fs-four"></i>Global
                                                    Dominance</li>
                                            </ul>
                                            <div class="mt-8 mt-xxl-10">
                                                <div class="counter-area d-flex gap-8 gap-xxl-10 ">
                                                    <div class="counter-part">
                                                        <div class="counters d-flex">
                                                            <span class="odometer display-four s1-color"
                                                                data-odometer-final="12">0</span>
                                                            <span class="display-four symbol s1-color">K</span>
                                                        </div>
                                                        <span class="mt-4">Users Joined</span>
                                                    </div>
                                                    <div class="counter-part">
                                                        <div class="counters d-flex">
                                                            <span class="odometer display-four s1-color"
                                                                data-odometer-final="5.5">0</span>
                                                            <span class="display-four symbol s1-color">M</span>
                                                        </div>
                                                        <span class="mt-4">Monthly Voulme (In USD)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- People Trust end -->

    <!--Testimonial start-->
    <section class="testimonial p1-bg pt-120 pb-120 position-relative z-0">
        <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
            <img src="{{ asset('front_assets/images/star.png') }}" alt="vector"
                class="position-absolute push_animat">
            <img src="{{ asset('front_assets/images/vector2.png') }}" alt="vector"
                class="position-absolute bottom-0 start-0 d-none d-xxxl-flex">
            <img src="{{ asset('front_assets/images/sun.png') }}" alt="vector"
                class="position-absolute push_animat d-none d-xxl-flex">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xxl-7">
                    <div class="heading__content alt-color mb-10 mb-lg-15 text-center">
                        <span class="heading fs-five mb-5">Testimonial</span>
                        <h3>What people say</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="swiper common-slider1 cus-rounded-1 d-center align-items-end align-items-xxl-center ">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide cus-rounded-1 overflow-hidden cus-rounded-1 overflow-hidden">
                                <div
                                    class="testimonial__part a2-bg d-flex flex-column flex-sm-row  align-items-center">
                                    <div class="testimonial__author d-none d-sm-flex">
                                        <img src="{{ asset('front_assets/images/author.png') }}" class="max-xxl-un "
                                            alt="Image">
                                    </div>
                                    <div class="testimonial__content p-4 px-lg-7 px-xxl-8 py-lg-6 py-xxl-7">
                                        <div class="content__part">
                                            <img src="{{ asset('front_assets/images/icon/quote_left.png') }}"
                                                alt="icon">
                                            <p class=" fs-six-up mt-5 mt-xxl-6">"Trading has always been a passion, but
                                                it wasn't management that began to see consistent profits. The journey
                                                was not without its ups and downs, but the lessons I learned along the
                                                way have been embraced riskinvaluable.</p>
                                            <h5 class="heading p1-color mt-4">Brooklyn Simmons</h5>
                                            <span class="fs-seven fw_500 mt-2">Marketing Director</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide cus-rounded-1 overflow-hidden">
                                <div
                                    class="testimonial__part a2-bg d-flex flex-column flex-sm-row  align-items-center">
                                    <div class="testimonial__author d-none d-sm-flex">
                                        <img src="{{ asset('front_assets/images/author2.png') }}" class="max-xxl-un "
                                            alt="Image">
                                    </div>
                                    <div class="testimonial__content p-4 p-lg-7 p-xxl-8">
                                        <div class="content__part">
                                            <img src="{{ asset('front_assets/images/icon/quote_left.png') }}"
                                                alt="icon">
                                            <p class=" fs-six-up mt-5 mt-xxl-6">"Trading has always been a passion, but
                                                it wasn't management that began to see consistent profits. The journey
                                                was not without its ups and downs, but the lessons I learned along the
                                                way have been embraced riskinvaluable.</p>
                                            <h5 class="heading p1-color mt-4">Chris Moore</h5>
                                            <span class="fs-seven fw_500 mt-2">President of Sales</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide cus-rounded-1 overflow-hidden">
                                <div
                                    class="testimonial__part a2-bg d-flex flex-column flex-sm-row  align-items-center">
                                    <div class="testimonial__author d-none d-sm-flex">
                                        <img src="{{ asset('front_assets/images/author3.png') }}" class="max-xxl-un"
                                            alt="Image">
                                    </div>
                                    <div class="testimonial__content p-4 p-lg-7 p-xxl-8">
                                        <div class="content__part">
                                            <img src="{{ asset('front_assets/images/icon/quote_left.png') }}"
                                                alt="icon">
                                            <p class=" fs-six-up mt-5 mt-xxl-6">"Trading has always been a passion, but
                                                it wasn't management that began to see consistent profits. The journey
                                                was not without its ups and downs, but the lessons I learned along the
                                                way have been embraced riskinvaluable.</p>
                                            <h5 class="heading p1-color mt-4">Balogh Imre</h5>
                                            <span class="fs-seven fw_500 mt-2">Account Executive</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="slider-btn position-absolute justify-content-end d-center justify-content-xxl-between gap-2 w-100 pb-3 pb-sm-5 pb-xxl-0 px-8 px-sm-18 px-xl-12 px-xxl-18">
                            <button type="button" aria-label="Slide Prev"
                                class="ara-prev slide-button cmn-btn2 d-center">
                                <i class="ti ti-arrow-narrow-right"></i>
                            </button>
                            <button type="button" aria-label="Slide Next"
                                class="ara-next slide-button cmn-btn2 d-center">
                                <i class="ti ti-arrow-narrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial end -->

    <!--blog_news start-->
    <section class="blog_news pt-120 pb-120 position-relative z-0">
        <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
            <img src="{{ asset('front_assets/images/star.png') }}" alt="vector" class="position-absolute">
            <img src="{{ asset('front_assets/images/vector2.png') }}" alt="vector"
                class="position-absolute bottom-0 start-0">
            <img src="{{ asset('front_assets/images/sun.png') }}" alt="vector" class="position-absolute">
        </div>
    </section>
    <!-- blog_news end -->

    @extends('frontend.layouts.footer')

    <!-- ==== js dependencies start ==== -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('front_assets/js/plugins/plugins.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/plugin-custom.js') }}"></script>
    <script src="{{ asset('front_assets/js/main.js') }}"></script>
</body>

</html>
