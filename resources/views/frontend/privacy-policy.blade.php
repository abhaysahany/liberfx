<!doctype html>
<html lang="en">


<head>
    <!-- required meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- #title -->
    <title>Privacy Policy || {{ config('detailsApp.name') }}</title>
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
                    <h2 class="mb-4">Privacy Policy</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item ms-2 ps-7 active" aria-current="page"><span>Privacy
                                    Policy</span>
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
                        <span class="heading p1-color fs-five mb-5">Privacy Policy</span>
                        <h3 class="mb-5 mb-lg-6">Dear Liberfx Users</h3>
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
                                        <p style="margin-top: 15px">

                                            The operator of the Liberfx website (hereinafter referred to as "this
                                            website" or "the website"). This website is a platform dedicated to digital
                                            asset transactions and the provision of related services (hereinafter
                                            referred to as "services"). For convenience in the wording of this
                                            Agreement, the Company and the Site are collectively referred to in this
                                            Agreement as "we" or other applicable forms of first-person pronouns.</p>
                                        <p style="margin-top: 15px">
                                            All natural persons or other subjects who log in to this website are users
                                            of this website. For convenience in the wording of this Agreement, users are
                                            referred to by "you" or other applicable forms of second-person pronouns.
                                            For the convenience of wording this Agreement, you and we are collectively
                                            referred to as the "Parties" and individually as a "Party".</p>

                                        <h5 style="margin-top: 20px">"Privacy Policy"</h5>

                                        <p style="margin-top: 15px">The Privacy Policy sets out the types of
                                            information we may collect from you
                                            when you log on to this website, register with this website and/or use the
                                            services we provide, and how we will use and protect the information
                                            collected in this way.</p>

                                        <h5 style="margin-top: 20px">Your license</h5>

                                        <p style="margin-top: 15px">To ensure that you have confidence in the way we
                                            process your personal data,
                                            you are advised to read and understand the terms of this Privacy Policy in
                                            detail. It should be specially pointed out that as long as you log in to
                                            this website, whether you register on this website or not, you are deemed to
                                            have accepted, agreed, promised and confirmed:<br>
                                            You consent to the disclosure of your personal information to us based on
                                            your own free will and necessary consent;<br>
                                            You will comply with all terms and limitations of this Privacy Policy;
                                            You agree that we may collect your information by logging into this website,
                                            registering on this website and/or using the services we provide; you agree
                                            to any future changes and modifications to our Privacy Policy that we may
                                            make;
                                            You agree that our affiliates, affiliates and employees may contact you
                                            about products and services that may be of interest to you (unless you have
                                            indicated that you do not wish to receive such information).</p>


                                        <h5 style="margin-top: 20px">Information Collection and Use</h5>

                                        <p style="margin-top: 15px">When using this website, you agree to allow us to
                                            use cookies to track your
                                            every action and to collect and retain all information you leave on this
                                            website, including but not limited to your IP address, location and other
                                            information.</p>

                                        <p style="margin-top: 15px">If you are willing to use the services provided by
                                            this website, you need to
                                            fill in and provide the following two types of information:</p>

                                        <p style="margin-top: 15px">Identifiable Information: This information helps us
                                            verify your eligibility
                                            to register as a member of this site. Including but not limited to your
                                            name, residential address, mailing address, other certificates and
                                            corresponding numbers issued by your country or government to prove your
                                            identity information, and all other information that helps us to verify your
                                            identity (hereinafter referred to as "" Identity Information").</p>

                                        <p style="margin-top: 15px">Service Information. Such information helps us
                                            contact you and provide you
                                            with services, including, but not limited to, your telephone number, fax
                                            number, valid email address, mailing address, and your debit card and/or
                                            other account numbers (collectively, "" Service Information").</p>

                                        <p style="margin-top: 15px">When you use this website or the services provided
                                            by this website, we may
                                            collect more necessary information through our dedicated mailbox or other
                                            methods that we deem to meet the relevant requirements, so as to improve the
                                            functions of this website and enhance your experience of using this website
                                            , to improve its services and security, or to enforce any court order, any
                                            applicable law, administrative regulation, or any order of any other
                                            competent government agency.</p>

                                        <p style="margin-top: 15px">If you access any link to a third-party website
                                            listed on this website or any
                                            link to our third-party partners, you agree to and abide by a separate
                                            separate privacy policy for that third-party website. We are not responsible
                                            for the content and activities of such sites or partners.</p>

                                        <h5 style="margin-top: 20px">Cookies</h5>

                                        <p style="margin-top: 15px">When you visit our website, we use Google
                                            statistics through cookies to
                                            record our performance and to see the effectiveness of online advertising. A
                                            cookie is a small amount of data that is sent to your browser and stored on
                                            your computer's hard drive. Cookies are only sent to your computer's hard
                                            drive when you use a computer to access our website.</p>

                                        <p style="margin-top: 15px">Cookies are generally used to record the habits and
                                            preferences of visitors
                                            while browsing our website items. The information collected by cookies is
                                            non-registered collective statistical data and does not involve personal
                                            data.</p>

                                        <p style="margin-top: 15px">Cookies allow websites or service provider systems
                                            to recognize your browser
                                            and capture and recall information, but cannot be used to obtain data on
                                            your hard drive, your email address, or your personal data. Most browsers
                                            are designed to accept cookies. You can choose to set your browser to refuse
                                            cookies, or choose to notify you as soon as you load a cookie. However, if
                                            you set your browser to disable cookies, you may not be able to activate or
                                            use certain features of our website.</p>


                                        <h5 style="margin-top: 20px">Purpose of the information</h5>

                                        <p style="margin-top: 15px">We will use the user information we collect for the
                                            following purposes or in
                                            the following ways:<<br>
                                                To provide services to you through our website;<br>
                                                To identify and confirm your identity when you use our website;<br>
                                                Improve and upgrade the services of this website (the user information
                                                and feedback we receive can help us improve the services of this website
                                                so that we can more effectively respond to your service requests and
                                                support needs);
                                                To keep statistical data about the usage of our website and to use it
                                                for data analysis in cooperation with government agencies, public
                                                affairs agencies;
                                                Provide a personalized experience (your information will help us better
                                                respond to your personalized needs);<br>
                                                Facilitate transactions (will not sell, exchange, transfer or otherwise
                                                provide your public or private information to any other company for any
                                                reason without your consent, except to complete the transaction you
                                                require);
                                                Send periodic emails (the email address you provide to process your
                                                order may be used to receive information and updates about your order,
                                                as well as newsletters, updates, related product or service information,
                                                etc. we send you from time to time)<br>
                                                To meet other purposes set out in the User Agreement of this website and
                                                to use all lawful means to meet such purposes.<br>
                                                We do not sell, trade, or otherwise transfer information or allow others
                                                to collect or use information; however, such information does not
                                                involve or include information about our affiliates and those who help
                                                us operate our website, manage our business, or Trusted third parties
                                                who provide services to you, provided such parties agree to keep such
                                                information confidential; we believe disclosure is appropriate or to
                                                enforce any applicable law, regulation, regulation or any order of a
                                                court or other competent authority Orders are required and are necessary
                                                to implement our website strategy and ensure the proper functioning of
                                                information, or to provide services to interested parties, or to protect
                                                our or others' rights, property or safety. However, your information
                                                will not be provided to other parties for marketing, advertising or
                                                other purposes.</p>


                                        <h5 style="margin-top: 20px">Personal data protection</h5>
                                        <p style="margin-top: 15px">
                                            We take appropriate physical, electronic, managerial and technical measures
                                            to protect and secure your personal data. We will do our best to ensure that
                                            any personal data collected through our website is not harassed by any third
                                            party not affiliated with us. Security measures we may take include but are
                                            not limited to:<br>
                                            Physical measures: Personal data records will be securely stored in
                                            fault-tolerant secure storage.<br>
                                            Electronic measures: Computer data containing your personal information will
                                            be stored on computer systems and storage media subject to strict login
                                            restrictions.<br>
                                            Administrative measures: Only our duly authorised staff will have access to
                                            your personal data, and these staff shall abide by our internal code of
                                            conduct regarding the confidentiality of personal data.<br>
                                            Technical measures: Your personal data may be transmitted using encryption
                                            technologies such as SSL encryption.<br>
                                            Additional measures: Our web servers are protected by a suitable "firewall".
                                            If you become aware of any security breach on our website, please contact us
                                            immediately so that we can take appropriate action as soon as possible.<br>
                                            Despite the technical and security measures described above, we cannot
                                            guarantee the absolute security of information transmitted over the
                                            Internet, and therefore we cannot absolutely guarantee that the personal
                                            data you provide to us through our website will be secure at all times. We
                                            are not responsible for, and we are not liable for, any loss or damage
                                            arising out of or resulting from any event that may occur as a result of
                                            unauthorized access to your personal data.</p>


                                        <h5 style="margin-top: 20px">Amendments to the Privacy Policy</h5>
                                        <p style="margin-top: 15px">
                                            We reserve the right to amend the Privacy Policy at any time. We will notify
                                            you of changes to the Privacy Policy by updating and posting the new version
                                            effective date and highlighting the changes. From time to time, we may
                                            notify changes made in the Privacy Policy by notice, but this is not our
                                            obligation. You should periodically review the Privacy Policy and pay
                                            attention to its revisions, and if you do not agree to such revisions, you
                                            should immediately stop accessing this website. When an updated version of
                                            this Privacy Policy is posted, your continued access to this website
                                            constitutes your agreement to the update and to abide by the updated Privacy
                                            Policy.</p>


                                        <h5 style="margin-top: 20px">Contact with us</h5>
                                        <p style="margin-top: 15px">
                                            For any requests and comments, you can send an email to: This is the only
                                            valid official email address we communicate with you, so we are not
                                            responsible for your failure to use valid contact information and for any
                                            actions or omissions .<br>
                                            We only publish announcements and information or publish announcements on
                                            this website according to the valid contact information on this website;
                                            therefore, we are not responsible for any loss caused by your trust in
                                            information not obtained through the above methods.<br>
                                            If you have any questions about our Privacy Policy, you are welcome to
                                            contact us at any time.
                                            <br><br>
                                            VOXABITGENIX LTD<br>
                                            Company number: 15249927<br>
                                            Registered office: 37 South Street, Torrington, EX38 8AB<br>
                                            Company status: ACTIVE<br>
                                            Incorporated on: 31 October 2023<br>
                                            Adrew FORD<br>
                                            Age: 27; Born: May 1996<br>
                                            Nationality: British<br>
                                            Occupation: Managing Director<br>
                                            Appointed: 31 October 2023<br>
                                            Service address: 25, High Street, Prestbury, Cheltenham, GL52 3AR
                                        </p>

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
