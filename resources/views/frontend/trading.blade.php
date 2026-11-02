<!DOCTYPE html>
<html class="no-js">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Trading || Liberfx</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <style>
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: .30rem
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
                <ul>
                    <li><a href="{{ url('/') }}">Home<span>Liberfx</span></a></li>
                    <li><a class="active-nav" href="{{ url('/trading') }}">Trading<span>Forex Trading</span></a></li>
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
    <section class="page-title section-bg-1">
        <div class="page-title-inner container-center cf">
            <div class="page-title-icon my-color-two"><i class="fa-solid fa-money-bill-trend-up"></i>
            </div>
            <h1>Forex <br> Trading</h1>
            <div class="breadcrumbs">
                <span>// You Are Here:</span> <a href="{{ url('/') }}">Home</a> / Trading
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
                    <p class="prewrap"><i class="fa fa-warning">&nbsp;</i><strong> Note:</strong> The Trading Settings
                        service is integrated into the Client Cabinet. You can pick various settings for various trading
                        accounts and trading instruments. Global setting applies to all trading instruments besides the
                        ones with a different local setting picked. Every setting is described in the table below:</p>
                </h3>
            </div>

            <div class="col-row">
                <div class="col-xl-4 col-lg-4 col-md-6 mb-3">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js"
                            async>
                            {
                                "symbol": "FX:EURUSD",
                                "locale": "en",
                                "dateRange": "12M",
                                "colorTheme": "light",
                                "isTransparent": false,
                                "autosize": false,
                                "largeChartUrl": ""
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
            <div class="col-row">
                <div class="col-xl-4 col-lg-4 col-md-6 mb-3">
                    <!-- TradingView Widget BEGIN -->
                    <!-- TradingView Widget BEGIN -->
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js"
                            async>
                            {
                                "symbol": "FX:USDJPY",
                                "locale": "en",
                                "dateRange": "12M",
                                "colorTheme": "light",
                                "isTransparent": false,
                                "autosize": false,
                                "largeChartUrl": ""
                            }
                        </script>

                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
            <div class="col-row">
                <div class="col-xl-4 col-lg-4 col-md-6 mb-3">
                    <!-- TradingView Widget BEGIN -->
                    <!-- TradingView Widget BEGIN -->
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js"
                            async>
                            {
                                "symbol": "FX:USDCHF",
                                "locale": "en",
                                "dateRange": "12M",
                                "colorTheme": "light",
                                "isTransparent": false,
                                "autosize": false,
                                "largeChartUrl": ""
                            }
                        </script>

                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
            {{-- <div class="col-row">
                <div class="col-xl-4 col-lg-4 col-md-6 mb-3">
                    <!-- TradingView Widget BEGIN -->
                    <!-- TradingView Widget BEGIN -->
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js"
                            async>
                            {
                                "symbol": "FX:USDCAD",
                                "locale": "en",
                                "dateRange": "12M",
                                "colorTheme": "light",
                                "isTransparent": false,
                                "autosize": false,
                                "largeChartUrl": ""
                            }
                        </script>

                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div> --}}
            <div class="col-row">
                <div class="col-xl-4 col-lg-4 col-md-6 mb-3">
                    <!-- TradingView Widget BEGIN -->
                    <!-- TradingView Widget BEGIN -->
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js"
                            async>
                            {
                                "symbol": "FX:NZDUSD",
                                "locale": "en",
                                "dateRange": "12M",
                                "colorTheme": "light",
                                "isTransparent": false,
                                "autosize": false,
                                "largeChartUrl": ""
                            }
                        </script>

                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
            {{-- <div class="col-row">
                <div class="col-xl-4 col-lg-4 col-md-6 mb-3">
                    <!-- TradingView Widget BEGIN -->
                    <!-- TradingView Widget BEGIN -->
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js"
                            async>
                            {
                                "symbol": "FX:ZARJPY",
                                "locale": "en",
                                "dateRange": "12M",
                                "colorTheme": "light",
                                "isTransparent": false,
                                "autosize": false,
                                "largeChartUrl": ""
                            }
                        </script>

                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div> --}}
            <div class="separator-1"></div><!-- end separator -->
            <div class="section-title align-center">
                <h2>Forex Market</h2>
                <h3 class="sub-heading">View Forex Market With Liberfx</h3>
            </div>
            <div class="col-row">
                <div class="col-xl-12 mb-3">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                            {
                                "width": "100%",
                                "height": 550,
                                "defaultColumn": "overview",
                                "defaultScreen": "general",
                                "market": "forex",
                                "showToolbar": true,
                                "colorTheme": "light",
                                "locale": "en"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>

        </div><!-- end container-center -->
    </section>
    @extends('frontend.layouts.footer')
