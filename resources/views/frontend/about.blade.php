<!DOCTYPE html>
<html class="no-js">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>About || {{ config('detailsApp.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="viewport" content="width=device-width" />
    <!--*************************
*							*
*         CSS FILES			*
*							*
************************* -->

    <link href="///css?family=Open+Sans:400,300,700,800&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">

    <!-- #favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logo/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logo/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('logo/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('logo/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Font Awesome -->
    <link href="{{ asset('front_assets/static/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
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
    <!--*************************
*							*
*      JAVASCRIPT FILES	 	*
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

                </a>
            </div><!-- end logo -->
            <nav id="main-navigation" class="navigation cf">
                <ul>
                    <li><a href="{{ url('/') }}">Home<span>Liberfx</span></a></li>
                    <li><a href="{{ url('/trading') }}">Trading<span>Forex Trading</span></a></li>
                    <li><a href="{{ url('/course') }}">Courses<span>Trading Courses</span></a></li>
                    <li><a class="active-nav" href="{{ url('/about') }}">About<span>About Liberfx</span></a></li>
                    <li class="ps-5"><a href="{{ url('/member') }}">LOGIN<span>ACCOUNT</span></a></li>
                    <li> <a href="{{ url('/member/register/1') }}">REGISTER<span>CREATE
                                ACCOUNT</span></a>
                    </li>
                </ul>
            </nav>
        </div><!-- end container-center -->
    </header>
    <section class="page-title section-bg-1">
        <div class="page-title-inner container-center cf">
            <div class="page-title-icon my-color-two"><i class="fa fa-leaf"></i></div>
            <h1>About <br>us</h1>
            <div class="breadcrumbs">
                <span>// You Are Here:</span> <a href="{{ url('/') }}">Home</a> / About us
            </div><!-- end breadcrumbs -->
        </div><!-- end container-center -->
    </section>
    <section class="container-center cf">
        <div class="main-content">
            <section class="content">
                <div class="col-row">
                    <div class="two-third">
                        <div class="feature-box animated fadeInUp" data-animation-start="onLoad"
                            data-animation="fadeInUp" style="opacity: 1;">
                            <div class="feature-box-title cf">
                                <div class="feature-box-icon my-color-two">
                                    <i class="fa fa-bars"></i>
                                </div>
                                <h4 style="color:rgba(13, 13, 68, 0.952)">INCEPTION</h4>
                            </div><!-- end feature-box-title -->
                            <p>Located in a stable and secure marketplace, Liberfx Ltd is an excellent choice to take
                                part in global trading. Opening a live trading account with us is a matter of minutes,
                                and you will get immediate access to real markets.
                            </p>
                        </div>
                        <div class="feature-box animated fadeInUp" data-animation="fadeInUp"
                            data-animation-start="onLoad" data-animation-delay="500"
                            style="opacity: 1; animation-delay: 500ms;">
                            <div class="feature-box-title cf">
                                <div class="feature-box-icon my-color-two">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                <h4 style="color:rgba(13, 13, 68, 0.952)">LEADERSHIP</h4>
                            </div><!-- end feature-box-title -->
                            <p>In the past few years, Liberfx Ltd has developed at an impressive rate, and is recognized
                                today as an industry leader. By December 2019, our clients' monthly trading volume
                                reached 348.4 billion USD and our active traders around the world surpassed 50,342.
                                Currently Liberfx Ltd offers a wide range of financial instruments, including currency
                                pairs, metals, cryptocurrencies, energies, and indices.
                            </p>
                        </div>
                        <div class="feature-box animated on-start fadeInUp" data-animation="fadeInUp"
                            data-animation-start="onLoad" data-animation-delay="900"
                            style="opacity: 1; animation-delay: 900ms;">
                            <div class="feature-box-title cf">
                                <div class="feature-box-icon my-color-two">
                                    <i class="fas fa-line-chart"></i>
                                </div>
                                <h4 style="color:rgba(13, 13, 68, 0.952)">GROWTH</h4>
                            </div><!-- end feature-box-title -->
                            <p>Continuous development, guided primarily by the systematic improvement of trading
                                conditions, is the key to the Liber Ltd's long-term success. We run an extremely
                                customer-centric business, therefore, improving the quality of our services is our top
                                priority.
                            </p>
                        </div>
                        <div class="feature-box animated on-start fadeInUp" data-animation="fadeInUp"
                            data-animation-start="onLoad" data-animation-delay="900"
                            style="opacity: 1; animation-delay: 900ms;">
                            <div class="feature-box-title cf">
                                <div class="feature-box-icon my-color-two">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <h4 style="color:rgba(13, 13, 68, 0.952)">CUSTOMER SUPPORT</h4>
                            </div><!-- end feature-box-title -->
                            <p>Our customers enjoy the highest level of customer service through our personal and truly
                                international approach. Our official website has been localized into 15 languages and we
                                offer client support in 13 languages, including 24/5 support in 11 languages. We give
                                traders exactly what they seek: constant improvement, new opportunities to explore the
                                financial markets, and the opportunity to work with a recognized leader in the
                                financial industry.</p>
                        </div>
                    </div><!-- end  -->
                    <div class="one-third">
                    </div><!-- end  -->
                </div><!-- end colr-row -->
            </section><!-- end content -->
        </div><!-- end main-content -->
    </section>
    @extends('frontend.layouts.footer')
