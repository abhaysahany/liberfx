<!DOCTYPE html>
<html class="no-js">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Courses || {{ config('detailsApp.name') }}</title>
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="{{ asset('front_assets/static/css/font-awesome.min.css') }}" rel="stylesheet">
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        a {
            text-decoration: none;
        }

        .course-card {
            margin-right: 20px;
            margin-left: 20px;
            opacity: 1;
            padding-top: 20px;
            border: 4px solid rgba(9, 7, 24, 0.966);
            background-color: rgba(3, 2, 8, 0.966);
            border-radius: 10px;
            box-shadow: rgb(159, 175, 241) 0px 0px 0.25em, rgb(159, 175, 241) 0px 0.25em 1em;
        }

        .course-card:hover {
            border-radius: 10px;
            border: 4px solid rgb(44, 8, 145);
            transition: all 0.2s ease-out;
            transform: scale(1.05);
            animation: left: 125% 0.85s;
            box-shadow: rgb(159, 175, 241) 0px 0px 0.25em, rgb(159, 175, 241) 0px 0.25em 1em;
            background-color: rgb(44, 8, 145);

        }

        .course-card:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.4);
            -webkit-transition: none;
            -moz-transition: none;
            transition: none;
        }

        .course-card:hover:after {
            width: 100%;
            background-color: rgba(255, 255, 255, 0);

            -webkit-transition: all 0.4s ease-in-out;
            -moz-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
        }

        .course-card .button {
            font-size: 16px;
            background-color: rgb(44, 8, 145);
            border-radius: 30px
        }

        .course-card:hover .button {
            background-color: rgb(7, 6, 17);
        }
    </style>
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
                <ul style="margin-bottom: 0px">
                    <li><a href="{{ url('/') }}">Home<span>Liberfx</span></a></li>
                    <li><a href="{{ url('/trading') }}">Trading<span>Forex Trading</span></a></li>
                    <li><a class="active-nav" href="{{ url('/course') }}">Courses<span>Trading Courses</span></a></li>
                    <li><a href="{{ url('/about') }}">About<span>About Liberfx</span></a></li>
                    <li><a href="{{ url('/member') }}">LOGIN<span>ACCOUNT</span></a></li>
                    <li> <a href="{{ url('/member/register/1') }}">REGISTER<span>CREATE
                                ACCOUNT</span></a>
                    </li>
                </ul>
            </nav>
        </div><!-- end container-center -->
    </header>
    <section class="page-title section-bg-1">
        <div class="page-title-inner container-center cf">
            <div class="page-title-icon my-color-two"><i class="fa fa-book"></i></div>
            <h1>Trading <br> Courses</h1>
            <div class="breadcrumbs">
                <span>// You Are Here:</span> <a href="{{ url('/') }}" class="text-decoration-none">Home</a> /
                Trading
            </div><!-- end breadcrumbs -->
        </div><!-- end container-center -->
    </section>
    <section class="content">
        <div class="container-center">
            <div class="section-title align-left">
                <h3 class="sub-heading">
                    <p class="prewrap">Liberfx offers an opportunity of trading fine-tuning for every demo or live
                        account with a positive balance. You can set writing slippage volumes to the orders comments,
                        choose Limit orders execution methods, set the execution of related and Stop orders in case of
                        GAP.</p>
                    <p class="prewrap"> Continuous
                        development, guided primarily by the systematic improvement of trading conditions, is the key to
                        the Liber Ltd's long-term success. We run an extremely customer-centric business, therefore,
                        improving the quality of our services is our top priority</p>
                </h3>
            </div>

            <div class="separator-1"></div><!-- end separator -->
            <div class="section-title align-center">
                <h2>Our Courses</h2>
                <h3 class="sub-heading">Enroll Our Trading Course</h3>
            </div>
            <div class="col-row">
                @foreach ($courses as $item)
                    <div class="one-half">
                        <div class="content-box cog-tl course-card animated fadeIn" data-animation="fadeIn"
                            style="">
                            <img src="{{ asset('adm_assets/assets/images/courses') }}/{{ $item['image'] }}"
                                alt="" style="width: 100%;height:240px;border-radius:20px"
                                class="img-fluid px-2 ">
                            <div class="box-title">
                                <h3 class="text-primary">{{ $item['course'] }}</h3>
                                <h2 style="padding-top: 10px" class="text-white">$ {{ $item['price'] }}</h2>
                            </div><!-- end box-title -->
                            <p class="text-muted pt-0 mt-0">{{ $item['description'] }}</p>
                            <a class="button small-btn btn px-4 py-2 text-white" style=""
                                href="{{ url('/member') }}">Enroll
                                Course</a>
                        </div><!-- end content-box -->
                    </div><!-- end -->
                @endforeach
            </div><!-- end col-row -->
        </div>

        </div><!-- end container-center -->
    </section>
    @extends('frontend.layouts.footer')
