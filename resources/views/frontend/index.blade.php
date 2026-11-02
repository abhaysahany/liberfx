<!DOCTYPE html>
<html class="no-js">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Home || {{ config('detailsApp.name') }}</title>
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="viewport" content="width=device-width" />
    <!--*************************
*							*
*         CSS FILES			*
*							*
************************* -->

    <link href="///css?family=Open+Sans:400,300,700,800&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('old_front_assets/_next/static/css/fa77090bddba086a.css') }}"
        data-precedence="next" />

    <!-- #favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logo/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logo/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('logo/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('logo/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Font Awesome -->
    <link href="{{ asset('front_assets/static/css/font-awesome.min.cs') }}s" rel="stylesheet">
    <!-- edit the value to change the skin color -->
    <link rel="stylesheet" href="{{ asset('front_assets/static/css/skins/tangerine.css') }}" />
    <!-- used for animation effects on elements -->
    <link rel="stylesheet" href="{{ asset('front_assets/static/css/animate.min.css') }}" />
    <!-- styling for Nivo Lightbox gallery -->
    <link rel="stylesheet" href="{{ asset('front_assets/static/css/nivo-lightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('front_assets/static/css/default.css') }}" />
    <!-- styles for the Revolution Slider -->
    <link rel="stylesheet" href="{{ asset('front_assets/static/plugins/rs-plugin/css/settings.css') }}"
        media="screen" />
    <!--imports the media queries css file-->
    <link rel="stylesheet" href="{{ asset('front_assets/static/css/responsive.css') }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <!--*************************
*							*
*      JAVASCR
IPT FILES	 	*
*							*
************************* -->
    <!-- imports modernizr plugin for detecting browser features -->
    <script src="{{ asset('front_assets/static/js/modernizr.custom.js') }}"></script>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <header id="header">
        <div class="container-center cf">
            <div class="logo" style="margin-bottom:0px">
                <a href="{{ url('/') }}"> <img src="{{ asset('logo/logo-b.png') }}" alt="logo"
                        style="width:150px;height:50px;margin-bottom:5px">
                    {{-- <span class="text-primary" style="font-size:25px;font-weight:800;padding-bottom:30px">
                        Liberfx</span> --}}
                </a>
            </div><!-- end logo -->
            <nav id="main-navigation" class="navigation cf">
                <ul>
                    <li><a class="active-nav" href="{{ url('/') }}">Home<span>Liberfx</span></a></li>
                    <li><a href="{{ url('/trading') }}">Trading<span>Forex Trading</span></a></li>
                    <li><a href="{{ url('/course') }}">Courses<span>Trading Courses</span></a></li>
                    <li><a href="{{ url('/about') }}">About<span>About Liberfx</span></a></li>
                    <li class="ps-5"><a href="{{ url('/member') }}">LOGIN<span>ACCOUNT</span></a></li>
                    <li> <a href="{{ url('/member/register/1') }}">REGISTER<span>CREATE
                                ACCOUNT</span></a>
                    </li>
                </ul>
            </nav>
        </div><!-- end container-center -->
    </header>
    <!--Revolution Slider begin-->
    <section class="container-slider">
        <div id="slider">
            <ul>
                <!-- Slide 1 -->
                <li data-transition="fade" data-slotamount="7">
                    <!-- Required Background Image  -->
                    <img src="{{ asset('front_assets/static/img/slides/bg/001.jpg') }}" alt="Image Description" />
                    <video class="videoBg "
                        style=" position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    object-fit: cover;
    max-width: 1920px;
    max-height: 700px;
    z-index: 0"
                        preload="auto" loop="" playsInline="" autoPlay=""
                        src="{{ asset('old_front_assets/videos/0412-final.mp4') }}" tabindex="-1"
                        muted=""></video>
                    <!-- Big Title Caption -->
                    <div class="caption lft ltb tp-resizeme" data-x="0" data-y="40" data-speed="1000"
                        data-start="800" data-easing="easeOutExpo">
                        <h2 class="layer-h2-no " style="color: white">The ULTIMATE platform</h2>
                    </div>
                    <!-- Subtitle Caption -->
                    <div class="caption lft ltb tp-resizeme" data-x="0" data-y="80" data-speed="1000"
                        data-start="800" data-easing="easeOutExpo">
                        <h3 class="layer-h3">Our trading platforms offer you a world-class trading experience</h3>
                    </div>
                    <!-- List of Features - Bullets -->
                    <!-- Feature 1  -->
                    <div class="slider-bullets caption lfl fadeout tp-resizeme" data-x="left" data-y="170"
                        data-speed="1200" data-start="800" data-easing="Power4.easeIn">
                        <i class="fa fa-laptop my-color-two"></i><span>Trade on Any Device, Anywhere</span>
                    </div><!-- slider-bullets -->
                    <!-- Feature 2  -->
                    <div class="slider-bullets caption lfl fadeout tp-resizeme" data-x="left" data-y="218"
                        data-speed="1200" data-start="900" data-easing="Power4.easeIn">
                        <i class="fa fa-dashboard my-color-two"></i><span>With numerous features and tools that suit
                            your
                            trading style</span>
                    </div><!-- slider-bullets -->
                    <!-- Feature 3  -->
                    <div class="slider-bullets caption lfl fadeout tp-resizeme" data-x="left" data-y="266"
                        data-speed="1200" data-start="1000" data-easing="Power4.easeIn">
                        <i class="fa fa-gears my-color-two"></i><span>Try our unique service "Trading settings"</span>
                    </div><!-- slider-bullets -->
                    <!-- Call To Action Buttons -->
                    <div class="layer-buttons caption lfb str tp-resizeme" data-x="left" data-y="350"
                        data-speed="800" data-start="4500" data-easing="easeOutExpo">
                        <a class="my-color-two" href="{{ url('/member') }}">LOGIN</a>
                        <a style="background-color:orange" href="{{ url('/member/register/1') }}">REGISTER</a>
                    </div><!-- end layer-buttons -->
                </li>
                <!-- end Slide 1 -->
            </ul>
        </div><!-- end slider -->
    </section><!--end Revolution Slider-->
    <section class="content">
        <div class="container-center">
            <div class="tagline col-row animated" data-animation="fadeInUp">
                <section class="three-fourth">
                    <h2>Trade with a <span style="color: orange">Global Forex Broker</span></h2>
                    <p> Located in a stable and secure marketplace, Liberfx is an excellent choice to take part in
                        global trading. Opening a live trading account with us is a matter of minutes, and you will get
                        immediate access to real markets. Liberfx has revolutionized the tech industry with
                        groundbreaking AI advancements. For investors looking to capitalize on this innovation, now is
                        an opportune moment for trading with Liberfx. Investing in Liberfx means being part of a
                        transformative journey in artificial
                        intelligence, with potential for significant returns as the company continues to grow.
                    </p>
                </section><!-- end section -->
                <div class="one-fourth cf">
                    <a class="big-button my-color-two" href="{{ url('/about') }}">Learn More<span
                            class="btn-arrow"><i class="fa fa-angle-right"></i></span></a>
                </div><!-- end big-button -->
            </div><!-- end tagline -->
        </div><!-- end container-center -->
    </section><!-- end content -->
    <div class="separator-1"></div><!-- end separator -->
      <section class="content">
        <div class="container-center cf">
            <div class="row" style="margin-bottom:20px;">
                <div class="card">
                    <div class="section-title align-center" style="padding-bottom: 0px;margin-bottom:30px">
                        <h2>Trading Options</h2>
                        <h3 class="sub-heading">START YOUR TRADING WITH LIBERFX</h3>
                    </div>
                    {{-- <div class="separator-1"></div><!-- end separator --> --}}
                    <div class="feature-box animated fadeInUp" data-animation-start="onLoad"
                        data-animation="fadeInUp" style="opacity: 1;">
                        <div class="feature-box-title cf">
                            <div class="feature-box-icon my-color-two">
                                <i class="fa-solid fa-sack-dollar"></i>
                            </div>
                            <h4 style="color:rgba(13, 13, 68, 0.952)">Hot assets
                            </h4>
                        </div><!-- end feature-box-title -->
                        <p>Take a look at the most popular assets on the Liberfx trading platform. Traders choose these
                            due to volatility and profit potential. Choose one and start trading it right away.

                        </p>
                    </div>
                    <div class="feature-box animated fadeInUp" data-animation="fadeInUp"
                        data-animation-start="onLoad" data-animation-delay="500"
                        style="opacity: 1; animation-delay: 500ms;">
                        <div class="feature-box-title cf">
                            <div class="feature-box-icon my-color-two">
                                <i class="fa-solid fa-cubes"></i>
                            </div>
                            <h4 style="color:rgba(13, 13, 68, 0.952)">Stocks</h4>
                        </div><!-- end feature-box-title -->
                        <p>At Liberfx, you'll find over 50 stock CFDs with the highest volatility on the market. US
                            Blue Chips and the most popular stocks from Europe and Latin America await you. Trade them
                            now.
                        </p>
                    </div>
                    <div class="feature-box animated on-start fadeInUp" data-animation="fadeInUp"
                        data-animation-start="onLoad" data-animation-delay="900"
                        style="opacity: 1; animation-delay: 900ms;">
                        <div class="feature-box-title cf">
                            <div class="feature-box-icon my-color-two">
                                <i class="fas fa-line-chart"></i>
                            </div>
                            <h4 style="color:rgba(13, 13, 68, 0.952)">Forex</h4>
                        </div><!-- end feature-box-title -->
                        <p>Forex

                            The most popular currency pairs with Liberfx

                            The best thing about Liberfx is the liberty to trade it presents. We offer you a variety of
                            cross and exotic currency pairs. In addition to that, you can trade metals, indices, stocks,
                            ETFs, oil and gas, cryptocurrencies and agriculture. Of course, we have all the major
                            currency pairs for you to trade, as seen below:
                        </p>
                    </div>
                    <div class="feature-box animated on-start fadeInUp" data-animation="fadeInUp"
                        data-animation-start="onLoad" data-animation-delay="900"
                        style="opacity: 1; animation-delay: 900ms;">
                        <div class="feature-box-title cf">
                            <div class="feature-box-icon my-color-two">
                                <i class="fa-solid fa-coins"></i>
                            </div>
                            <h4 style="color:rgba(13, 13, 68, 0.952)">Metals</h4>
                        </div><!-- end feature-box-title -->
                        <p>Want to trade in metals? Our news and forecasts section will keep you up to date with the
                            latest analysis and market moves you need to know. Pick your asset — be it gold, silver or
                            Brent crude — and start trading with as little as $10.
                        </p>
                    </div>
                    <div class="feature-box animated on-start fadeInUp" data-animation="fadeInUp"
                        data-animation-start="onLoad" data-animation-delay="900"
                        style="opacity: 1; animation-delay: 900ms;">
                        <div class="feature-box-title cf">
                            <div class="feature-box-icon my-color-two">
                                <i class="fa-solid fa-bars-progress"></i>
                            </div>
                            <h4 style="color:rgba(13, 13, 68, 0.952)">Indices</h4>
                        </div><!-- end feature-box-title -->
                        <p>Get involved in the American, European and Asian economies with the top-performing stock
                            indices. Choose from a variety of indices to invest in, from US SP500 to Israeli TA35

                        </p>
                    </div>
                    <div class="feature-box animated on-start fadeInUp" data-animation="fadeInUp"
                        data-animation-start="onLoad" data-animation-delay="900"
                        style="opacity: 1; animation-delay: 900ms;">
                        <div class="feature-box-title cf">
                            <div class="feature-box-icon my-color-two">
                                <i class="fa-solid fa-gas-pump"></i>
                            </div>
                            <h4 style="color:rgba(13, 13, 68, 0.952)">Oil and gas
                            </h4>
                        </div><!-- end feature-box-title -->
                        <p>Want to invest? Choose assets whose movements are highly predictable. The platform's
                            forecasts and news will help you understand how Brent crude and other natural resources will
                            move. Select one and start investing from as low as $5.

                        </p>
                    </div>
                    <div class="feature-box animated on-start fadeInUp" data-animation="fadeInUp"
                        data-animation-start="onLoad" data-animation-delay="900"
                        style="opacity: 1; animation-delay: 900ms;">
                        <div class="feature-box-title cf">
                            <div class="feature-box-icon my-color-two">
                                <i class="fa-solid fa-wheat-awn"></i>
                            </div>
                            <h4 style="color:rgba(13, 13, 68, 0.952)">Agriculture
                            </h4>
                        </div><!-- end feature-box-title -->
                        <p>Feeling conservative? Try trading agricultural CFDs. Low volatility and predictability make
                            these assets great for long-term investing with high profitability.
                        </p>
                    </div>
                </div><!-- end  -->
                <div class="one-third">
                </div><!-- end  -->
            </div><!-- end colr-row -->
        </div><!-- end container-center -->
    </section><!-- end content -->
    <div class="separator-1"></div><!-- end separator -->
    <section class="content section-bg-4">
        <div class="container-center">
            <div class="section-title align-center">
                <h2>Why us</h2>
                <h3 class="sub-heading">REASONS TO TRADE WITH LIBERFX</h3>
            </div>
            <div class="col-row animated" data-animation="fadeInUp">
                <div class="feature-box one-third">
                    <div class="feature-box-title cf">
                        <div class="feature-box-icon" style="background-color:rgba(13, 13, 68, 0.952)">
                            <i class="fa fa-rocket"></i>
                        </div>
                        <h4 style="color:rgba(13, 13, 68, 0.952)">EASY TO START</h4>
                    </div><!-- end feature-box-title -->
                    <p>In just 15 minutes you can sign up, deposit with your credit card and start trading.
                    </p>
                </div>
                <div class="feature-box one-third">
                    <div class="feature-box-title cf">
                        <div class="feature-box-icon" style="background-color:rgba(13, 13, 68, 0.952)">
                            <i class="fa fa-shield"></i>
                        </div>
                        <h4 style="color:rgba(13, 13, 68, 0.952)">TRUSTED</h4>
                    </div><!-- end feature-box-title -->
                    <p>We adhere to the strictest international regulatory bodies to give you the safest trading
                        environment wherever you are in the world.</p>
                </div>
                <div class="feature-box one-third">
                    <div class="feature-box-title cf">
                        <div class="feature-box-icon" style="background-color:rgba(13, 13, 68, 0.952)">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <h4 style="color:rgba(13, 13, 68, 0.952)">MARKET EXPERTISE</h4>
                    </div><!-- end feature-box-title -->
                    <p>Make important trading decisions with our market insights and a vast variety of technical
                        analysis & fundamental analysis.
                    </p>
                </div>
            </div><!-- end col-row -->
            <div class="col-row animated" data-animation="fadeIn">
                <div class="feature-box one-third">
                    <div class="feature-box-title cf">
                        <div class="feature-box-icon" style="background-color:rgba(13, 13, 68, 0.952)">
                            <i class="fa fa-trophy"></i>
                        </div>
                        <h4 style="color:rgba(13, 13, 68, 0.952)">TRADING ADVANTAGE</h4>
                    </div><!-- end feature-box-title -->
                    <p>We guarantee your stops, so regardless of market conditions, you always know the costs of your
                        trading.
                    </p>
                </div>
                <div class="feature-box one-third">
                    <div class="feature-box-title cf">
                        <div class="feature-box-icon" style="background-color:rgba(13, 13, 68, 0.952)">
                            <i class="fa fa-desktop"></i>
                        </div>
                        <h4 style="color:rgba(13, 13, 68, 0.952)">POPULAR PLATFORMS</h4>
                    </div><!-- end feature-box-title -->
                    <p>With one account you can trade currencies, commodities and indices on your web, desktop or mobile
                        platform.
                    </p>
                </div>
                <div class="feature-box one-fourth">
                    <div class="feature-box-title cf">
                        <div class="feature-box-icon" style="background-color:rgba(13, 13, 68, 0.952)">
                            <i class="fa fa-gears"></i>
                        </div>
                        <h4 style="color:rgba(13, 13, 68, 0.952)">SUPPORT 24/5</h4>
                    </div><!-- end feature-box-title -->
                    <p>Access global markets with our supporters 24 hours / 5 days.</p>
                </div>
            </div><!-- end col-row -->
        </div><!-- end container-center -->
    </section><!-- end content -->
    <section class="dark-section section-bg-1">
        <div class="container-center">
            <div class="col-row">
                <div class="one-half">
                    <div class="animated" data-animation="flipInX">
                        <img src="{{ asset('front_assets/static/img/slides/screen.png') }}"
                            alt="image description" />
                    </div>
                </div><!-- end  -->
                <div class="one-half animated" data-animation="fadeInRight">
                    <div class="section-title">
                        <h2 class="heading-extra-big">ADVANCED PLATFORMS & TECHNOLOGY</h2>
                        <h3 class="sub-heading">the fastest and most flexible solutions for online trading </h3>
                    </div>
                    <ul class="fa-ul custom-list green-list">
                        <li><i class="fa-li fa fa-check"></i>MetaTrader5: Desktop, Mobile and WebTerminal</li>
                        <li><i class="fa-li fa fa-check"></i>Advanced client portal to track your trades</li>
                        <li><i class="fa-li fa fa-check"></i>Superior VPS solutions for EA's, Scalpers & Auto-trading
                        </li>
                    </ul>
                    <p>We provide enhanced security of clients' funds and high professionalism in confidential finance
                        matters.</p>
                    <a class="button medium-btn" style="background-color:orange" href="{{ url('/') }}">Open an
                        account</a>
                </div><!-- end  -->
            </div><!-- end col-row -->
        </div><!-- end container-center -->
    </section>
    <section class="container-center">
        <div class="section-title align-center">
            <h2>HOW TO START?</h2>
            <h3 class="sub-heading">Just four easy steps</h3>
        </div>
        <div class="col-row">
            <div class="one-fourth animated" data-animation="fadeInUp">
                <div class="step">
                    <div class="step-icon">
                        <i class="fa fa-edit"></i>
                    </div><!-- end step-icon -->
                    <span>Step One</span>
                    <h4 class="heading-big">REGISTER</h4>
                    <p>Open account via Liberfx direct </p>
                </div><!-- end step -->
            </div>
            <div class="one-fourth animated" data-animation="fadeInDown">
                <div class="step">
                    <div class="step-icon">
                        <i class="fa fa-file-text-o"></i>
                    </div><!-- end step-icon -->
                    <span>Step Two</span>
                    <h4 class="heading-big">VERIFY</h4>
                    <p>Upload your documents to verify your account </p>
                </div><!-- end step -->
            </div>
            <div class="one-fourth animated" data-animation="fadeInUp">
                <div class="step">
                    <div class="step-icon">
                        <i class="fa fa-money"></i>
                    </div><!-- end step-icon -->
                    <span>Step Three</span>
                    <h4 class="heading-big">FUND</h4>
                    <p>Login to Liberfx and fund your account </p>
                </div><!-- end step -->
            </div>
            <div class="one-fourth animated" data-animation="bounceIn" data-animation-delay="500">
                <div class="step">
                    <div class="step-icon-last" style="background-color: rgba(13, 13, 68, 0.952)">
                        <i class="fa fa-briefcase"></i>
                    </div><!-- end step-icon -->
                    <span>Step Four</span>
                    <h4 class="heading-big">INVEST</h4>
                    <p>Choose from 75+ instruments to invest </p>
                </div><!-- end step -->
            </div>
        </div><!-- end col-row -->
    </section><!-- end  -->
    @extends('frontend.layouts.footer')
