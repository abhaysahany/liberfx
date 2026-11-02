<!doctype html>
<html lang="en">


<head>
    <!-- required meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- #title -->
    <title>Contact || {{ config('detailsApp.name') }}</title>
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
        <div class="container mt-10 mt-lg-0 pt-15 pt-lg-20 pb-5 pb-lg-0">
            <div class="row">
                <div class="col-12 breadcrumb-area ">
                    <h2 class="mb-4">Contact</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item ms-2 ps-7 active" aria-current="page"><span>Contact</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section end -->


    <!-- Contact start -->
    <section class="contact nb4-bg pt-120 pb-120">
        <div class="container ">
            <div class="row gy-18 justify-content-between">
                <div class="col-12 col-lg-5 col-xl-5">
                    <div class="submissions-area d-flex flex-column gap-8 gap-lg-10">
                        <div class="submissions">
                            <h3>Business submissions</h3>
                            <p class="fs-six-up mt-4">For business plan submissions. Please submit using this</p>
                        </div>
                        <div
                            class="contact__mail d-flex flex-column gap-5 gap-lg-6 pb-8 pb-lg-10 border-bottom border-color four">
                            <div class="d-flex align-items-center gap-3">
                                <span class="box_12 p1-bg rounded-circle d-center"><i
                                        class="ti ti-message-2 fs-four-up nb4-color"></i></span>
                                <span class="fs-six-up"><a href="https://pixner.net/cdn-cgi/l/email-protection"
                                        class="__cf_email__"
                                        data-cfemail="f89c9d99969699d69b8d8a8c918bb89d80999588949dd69b9795">[email&#160;protected]</a></span>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <span class="box_12 p1-bg rounded-circle d-center"><i
                                        class="ti ti-phone fs-four-up nb4-color"></i></span>
                                <span class="fs-six-up">(555) 555-555</span>
                            </div>
                        </div>
                        <div class="submissions">
                            <h3>Our socials media</h3>
                            <ul class="social-area d-center justify-content-start gap-2 gap-md-3 mt-7 mt-lg-8">
                                <li>
                                    <a class="d-center cus-rounded-1 fs-four" href="#"><i
                                            class="ti ti-brand-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="d-center cus-rounded-1 fs-four" href="#"><i
                                            class="ti ti-brand-twitch"></i></a>
                                </li>
                                <li>
                                    <a class="d-center cus-rounded-1 fs-four" href="#"><i
                                            class="ti ti-brand-instagram"></i></a>
                                </li>
                                <li>
                                    <a class="d-center cus-rounded-1 fs-four" href="#"><i
                                            class="ti ti-brand-discord-filled"></i></a>
                                </li>
                                <li>
                                    <a class="d-center cus-rounded-1 fs-four" href="#"><i
                                            class="ti ti-brand-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7 col-xl-6">
                    <form method="POST" autocomplete="off" id="frmContactus"
                        class="contact__form alt_form px-4 px-lg-8">
                        <h3 class="contact__title mb-7 mb-md-10 mb-lg-15">Enquiry Form</h3>
                        <div class="d-flex gap-3 gap-sm-5 gap-lg-8 flex-column">
                            <div class="row gap-3 gap-sm-0">
                                <div class="col-sm-6">
                                    <div class="single-input">
                                        <input type="text" class="fs-six-up" name="fname"
                                            placeholder="Fast Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="single-input">
                                        <input type="text" class="fs-six-up" name="lname"
                                            placeholder="Last Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row gap-3 gap-sm-0 ">
                                <div class="col-sm-6">
                                    <div class="single-input">
                                        <input type="email" class="fs-six-up" name="email" placeholder="Email"
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="single-input">
                                        <input type="text" class="fs-six-up" name="Phone" placeholder="Phone"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="input-single">
                                <textarea class="fs-six-up" name="message" rows="4" placeholder="Message" required></textarea>
                            </div>
                        </div>
                        <span id="msg"></span>
                        <button type="submit" class="cmn-btn py-3 px-5 px-lg-6 mt-8 mt-lg-10 d-flex ms-auto"
                            name="submit" id="submit">Send Message<i
                                class="bi bi-arrow-up-right"></i><span></span></button>
                    </form>
                </div>
                <div class="col-12">
                    <iframe class="cus-rounded-1 cus_map"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5156.793422135061!2d-105.02171047857397!3d39.77899593135569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1699354709950!5m2!1sen!2sbd"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact end -->

    @extends('frontend.layouts.footer')

    <!-- ==== js dependencies start ==== -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('front_assets/js/plugins/plugins.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/plugin-custom.js') }}"></script>
    <script src="{{ asset('front_assets/js/main.js') }}"></script>
</body>

</html>
