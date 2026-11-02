<!DOCTYPE html>
<html lang="en">

<head>
    <!--Title-->
    <title>Lending Dashboard || {{ config('detailsApp.name') }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Dexignlabs">
    <meta name="robots" content="index, follow">

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Datatable -->
    <link href="{{ asset('uassets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!-- FAVICONS ICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logo/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logo/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('logo/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('logo/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link href="{{ asset('uassets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('uassets/vendor/swiper/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">

    <!-- Style css -->
    <link href="{{ asset('uassets/css/style.css') }}" rel="stylesheet">
    <style>
        @media (max-width: 575.98px) {
            #dashVideoModal {
                padding-right: 0 !important;
                padding-left: 0 !important;
            }

            #dashVideoModal .modal-dialog {
                width: calc(100% - 1rem);
                margin-right: auto;
                margin-left: auto;
            }
        }
    </style>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" class="wallet-open active">
        <div class="header-banner" style="background-image:url('{{ asset('uassets/images/bg-1.png') }}');">

        </div>
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ url('/member/dashboard') }}" class="brand-logo">

                <img src="{{ asset('logo/logo-icon.png') }}" alt="logo" style="width:50px">
                <div class="brand-title pt-3 pe-3 ms-0">
                    <h1 class="text-white">Liberfx</h1>
                </div>

            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box start
        ***********************************-->

        <!--**********************************
            Chat box End
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header home">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="input-group search-area">
                                <input type="text" class="form-control" placeholder="Search Dashboard">
                                <span class="input-group-text"><a href="javascript:void(0)">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                    fill="var(--primary)" fill-rule="nonzero" opacity="0.3"></path>
                                                <path
                                                    d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                    fill="var(--primary)" fill-rule="nonzero"></path>
                                            </g>
                                        </svg>
                                    </a></span>
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown notification_dropdown sm-search">
                                <a class="nav-link " href="javascript:void(0);" role="button"
                                    data-bs-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                        class="svg-main-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path
                                                d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end of-visible">
                                    <div class="input-group search-area-2">
                                        <input type="text" class="form-control" placeholder="Search Dashboard"
                                            autofocus>
                                        <span class="input-group-text"><a href="javascript:void(0)">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1"
                                                    class="svg-main-icon">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                        <path
                                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                            fill="#000000" fill-rule="nonzero"></path>
                                                    </g>
                                                </svg>
                                            </a></span>
                                    </div>
                                    <div class="px-3">
                                        <h5>Recently Searched:</h5>
                                    </div>
                                    <div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3"
                                        style="height:380px;">
                                        <ul class="timeline">
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="me-2 search-p">
                                                        <svg class="one" width="25" height="25"
                                                            viewBox="0 0 42 42" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M21 0C9.40205 0 0 9.40205 0 21C0 32.5979 9.40205 42 21 42C32.5979 42 42 32.5979 42 21C41.9867 9.40754 32.5925 0.0132752 21 0ZM28.5 31.5002H16.5002C15.6716 31.5002 15.0001 30.8287 15.0001 30.0001C15.0001 29.9292 15.0051 29.8582 15.0152 29.7877L16.144 21.8844L13.8639 22.4548C13.7449 22.485 13.6226 22.5001 13.5 22.5001C12.6714 22.4992 12.0008 21.8272 12.0012 20.9986C12.0022 20.3111 12.47 19.7123 13.137 19.5448L16.6018 18.6787L18.0149 8.78727C18.1321 7.96695 18.892 7.39749 19.7123 7.51468C20.5326 7.63187 21.1021 8.39176 20.9849 9.21208L19.7443 17.8931L25.1364 16.545C25.9388 16.3404 26.755 16.8252 26.9592 17.6276C27.1638 18.4301 26.679 19.2463 25.8766 19.4509C25.872 19.4518 25.8674 19.4532 25.8628 19.4541L19.2857 21.0984L18.2287 28.5H28.5C29.3286 28.5 30.0001 29.1716 30.0001 30.0001C30.0001 30.8282 29.3286 31.5002 28.5 31.5002Z"
                                                                fill="#374C98"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="media-body ms-2">
                                                        <h6 class="mb-1">LTC in DexignLab</h6>
                                                        <small class="d-block">#0001</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="me-2 search-p">
                                                        <svg class="two" width="25" height="25"
                                                            viewBox="0 0 56 56" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M37.3334 22.167C37.3318 20.2347 35.7654 18.6688 33.8336 18.6667H23.3334V25.6667H33.8336C35.7654 25.6651 37.3318 24.0987 37.3334 22.167Z"
                                                                fill="#FFAB2D"></path>
                                                            <path
                                                                d="M23.3334 37.3333H33.8336C35.7664 37.3333 37.3334 35.7664 37.3334 33.8336C37.3334 31.9003 35.7664 30.3333 33.8336 30.3333H23.3334V37.3333Z"
                                                                fill="#FFAB2D"></path>
                                                            <path
                                                                d="M28 0C12.5361 0 0 12.5361 0 28C0 43.4639 12.5361 56 28 56C43.4639 56 56 43.4639 56 28C55.9823 12.5434 43.4566 0.0177002 28 0ZM42.0003 33.9998C41.9948 38.4163 38.4163 41.9948 34.0004 41.9997V43.9998C34.0004 45.1046 33.1044 46 32.0003 46C30.8955 46 30.0001 45.1046 30.0001 43.9998V41.9997H26.0005V43.9998C26.0005 45.1046 25.1045 46 24.0003 46C22.8956 46 22.0002 45.1046 22.0002 43.9998V41.9997H16.0004C14.8957 41.9997 14.0003 41.1043 14.0003 40.0002C14.0003 38.8954 14.8957 38 16.0004 38H18V18H16.0004C14.8957 18 14.0003 17.1046 14.0003 15.9998C14.0003 14.8951 14.8957 13.9997 16.0004 13.9997H22.0002V12.0002C22.0002 10.8954 22.8956 10 24.0003 10C25.1051 10 26.0005 10.8954 26.0005 12.0002V13.9997H30.0001V12.0002C30.0001 10.8954 30.8955 10 32.0003 10C33.105 10 34.0004 10.8954 34.0004 12.0002V13.9997C38.3998 13.9814 41.9814 17.5324 42.0003 21.9319C42.0101 24.2616 40.9999 26.479 39.2354 28C40.9835 29.5039 41.9924 31.6933 42.0003 33.9998Z"
                                                                fill="#FFAB2D"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="media-body ms-2">
                                                        <h6 class="mb-1">BTC/USD in DexignLab</h6>
                                                        <small class="d-block">#0001</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="me-2 search-p">
                                                        <svg class="three" width="25" height="25"
                                                            viewBox="0 0 42 42" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M21.6654 24.2783C21.2382 24.4206 20.7623 24.4206 20.3351 24.2783L15.7502 22.75L21.0002 31.5L26.2502 22.75L21.6654 24.2783Z"
                                                                fill="#00ADA3"></path>
                                                            <path
                                                                d="M21.0002 21L26.2502 18.9001L21.0002 10.5L15.7502 18.9001L21.0002 21Z"
                                                                fill="#00ADA3"></path>
                                                            <path
                                                                d="M21.0001 0C9.40216 0 0.00012207 9.40204 0.00012207 21C0.00012207 32.5979 9.40216 41.9999 21.0001 41.9999C32.598 41.9999 42.0001 32.5979 42.0001 21C41.9873 9.40753 32.5925 0.0128174 21.0001 0ZM29.8418 20.171L22.3418 35.171C21.9715 35.9121 21.0701 36.2124 20.3295 35.8421C20.0388 35.697 19.8035 35.4617 19.6584 35.171L12.1584 20.171C11.9254 19.7031 11.9519 19.1479 12.2284 18.7043L19.7284 6.70443C20.2269 6.00222 21.1997 5.8365 21.9019 6.33501C22.0452 6.43664 22.1701 6.56115 22.2718 6.70443L29.7713 18.7043C30.0483 19.1479 30.0748 19.7031 29.8418 20.171Z"
                                                                fill="#00ADA3"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="media-body ms-2">
                                                        <h6 class="mb-1">Dlab Meeting</h6>
                                                        <small class="d-block">#0001</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="me-2 search-p">
                                                        <svg class="four" width="25" height="25"
                                                            viewBox="0 0 56 56" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M37.3334 22.167C37.3318 20.2347 35.7654 18.6688 33.8336 18.6667H23.3334V25.6667H33.8336C35.7654 25.6651 37.3318 24.0987 37.3334 22.167Z"
                                                                fill="#FFAB2D"></path>
                                                            <path
                                                                d="M23.3334 37.3333H33.8336C35.7664 37.3333 37.3334 35.7664 37.3334 33.8336C37.3334 31.9003 35.7664 30.3333 33.8336 30.3333H23.3334V37.3333Z"
                                                                fill="#FFAB2D"></path>
                                                            <path
                                                                d="M28 0C12.5361 0 0 12.5361 0 28C0 43.4639 12.5361 56 28 56C43.4639 56 56 43.4639 56 28C55.9823 12.5434 43.4566 0.0177002 28 0ZM42.0003 33.9998C41.9948 38.4163 38.4163 41.9948 34.0004 41.9997V43.9998C34.0004 45.1046 33.1044 46 32.0003 46C30.8955 46 30.0001 45.1046 30.0001 43.9998V41.9997H26.0005V43.9998C26.0005 45.1046 25.1045 46 24.0003 46C22.8956 46 22.0002 45.1046 22.0002 43.9998V41.9997H16.0004C14.8957 41.9997 14.0003 41.1043 14.0003 40.0002C14.0003 38.8954 14.8957 38 16.0004 38H18V18H16.0004C14.8957 18 14.0003 17.1046 14.0003 15.9998C14.0003 14.8951 14.8957 13.9997 16.0004 13.9997H22.0002V12.0002C22.0002 10.8954 22.8956 10 24.0003 10C25.1051 10 26.0005 10.8954 26.0005 12.0002V13.9997H30.0001V12.0002C30.0001 10.8954 30.8955 10 32.0003 10C33.105 10 34.0004 10.8954 34.0004 12.0002V13.9997C38.3998 13.9814 41.9814 17.5324 42.0003 21.9319C42.0101 24.2616 40.9999 26.479 39.2354 28C40.9835 29.5039 41.9924 31.6933 42.0003 33.9998Z"
                                                                fill="#FFAB2D"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="media-body ms-2">
                                                        <h6 class="mb-1">BTC/USD in DexignLab</h6>
                                                        <small class="d-block">#0001</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="me-2 search-p">
                                                        <svg class="one" width="25" height="25"
                                                            viewBox="0 0 42 42" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M21 0C9.40205 0 0 9.40205 0 21C0 32.5979 9.40205 42 21 42C32.5979 42 42 32.5979 42 21C41.9867 9.40754 32.5925 0.0132752 21 0ZM28.5 31.5002H16.5002C15.6716 31.5002 15.0001 30.8287 15.0001 30.0001C15.0001 29.9292 15.0051 29.8582 15.0152 29.7877L16.144 21.8844L13.8639 22.4548C13.7449 22.485 13.6226 22.5001 13.5 22.5001C12.6714 22.4992 12.0008 21.8272 12.0012 20.9986C12.0022 20.3111 12.47 19.7123 13.137 19.5448L16.6018 18.6787L18.0149 8.78727C18.1321 7.96695 18.892 7.39749 19.7123 7.51468C20.5326 7.63187 21.1021 8.39176 20.9849 9.21208L19.7443 17.8931L25.1364 16.545C25.9388 16.3404 26.755 16.8252 26.9592 17.6276C27.1638 18.4301 26.679 19.2463 25.8766 19.4509C25.872 19.4518 25.8674 19.4532 25.8628 19.4541L19.2857 21.0984L18.2287 28.5H28.5C29.3286 28.5 30.0001 29.1716 30.0001 30.0001C30.0001 30.8282 29.3286 31.5002 28.5 31.5002Z"
                                                                fill="#374C98"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="media-body ms-2">
                                                        <h6 class="mb-1">LTC in DexignLab</h6>
                                                        <small class="d-block">#0001</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="me-2 search-p">
                                                        <svg class="two" width="25" height="25"
                                                            viewBox="0 0 56 56" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M37.3334 22.167C37.3318 20.2347 35.7654 18.6688 33.8336 18.6667H23.3334V25.6667H33.8336C35.7654 25.6651 37.3318 24.0987 37.3334 22.167Z"
                                                                fill="#FFAB2D"></path>
                                                            <path
                                                                d="M23.3334 37.3333H33.8336C35.7664 37.3333 37.3334 35.7664 37.3334 33.8336C37.3334 31.9003 35.7664 30.3333 33.8336 30.3333H23.3334V37.3333Z"
                                                                fill="#FFAB2D"></path>
                                                            <path
                                                                d="M28 0C12.5361 0 0 12.5361 0 28C0 43.4639 12.5361 56 28 56C43.4639 56 56 43.4639 56 28C55.9823 12.5434 43.4566 0.0177002 28 0ZM42.0003 33.9998C41.9948 38.4163 38.4163 41.9948 34.0004 41.9997V43.9998C34.0004 45.1046 33.1044 46 32.0003 46C30.8955 46 30.0001 45.1046 30.0001 43.9998V41.9997H26.0005V43.9998C26.0005 45.1046 25.1045 46 24.0003 46C22.8956 46 22.0002 45.1046 22.0002 43.9998V41.9997H16.0004C14.8957 41.9997 14.0003 41.1043 14.0003 40.0002C14.0003 38.8954 14.8957 38 16.0004 38H18V18H16.0004C14.8957 18 14.0003 17.1046 14.0003 15.9998C14.0003 14.8951 14.8957 13.9997 16.0004 13.9997H22.0002V12.0002C22.0002 10.8954 22.8956 10 24.0003 10C25.1051 10 26.0005 10.8954 26.0005 12.0002V13.9997H30.0001V12.0002C30.0001 10.8954 30.8955 10 32.0003 10C33.105 10 34.0004 10.8954 34.0004 12.0002V13.9997C38.3998 13.9814 41.9814 17.5324 42.0003 21.9319C42.0101 24.2616 40.9999 26.479 39.2354 28C40.9835 29.5039 41.9924 31.6933 42.0003 33.9998Z"
                                                                fill="#FFAB2D"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="media-body ms-2">
                                                        <h6 class="mb-1">BTC/USD in DexignLab</h6>
                                                        <small class="d-block">#0001</small>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <a class="all-notification" href="javascript:void(0);">See all notifications <i
                                            class="ti-arrow-end"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-theme-mode" href="javascript:void(0);">
                                    <svg id="icon-light" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32"
                                        viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                            <path
                                                d="M19.5,10.5 L21,10.5 C21.8284271,10.5 22.5,11.1715729 22.5,12 C22.5,12.8284271 21.8284271,13.5 21,13.5 L19.5,13.5 C18.6715729,13.5 18,12.8284271 18,12 C18,11.1715729 18.6715729,10.5 19.5,10.5 Z M16.0606602,5.87132034 L17.1213203,4.81066017 C17.7071068,4.22487373 18.6568542,4.22487373 19.2426407,4.81066017 C19.8284271,5.39644661 19.8284271,6.34619408 19.2426407,6.93198052 L18.1819805,7.99264069 C17.5961941,8.57842712 16.6464466,8.57842712 16.0606602,7.99264069 C15.4748737,7.40685425 15.4748737,6.45710678 16.0606602,5.87132034 Z M16.0606602,18.1819805 C15.4748737,17.5961941 15.4748737,16.6464466 16.0606602,16.0606602 C16.6464466,15.4748737 17.5961941,15.4748737 18.1819805,16.0606602 L19.2426407,17.1213203 C19.8284271,17.7071068 19.8284271,18.6568542 19.2426407,19.2426407 C18.6568542,19.8284271 17.7071068,19.8284271 17.1213203,19.2426407 L16.0606602,18.1819805 Z M3,10.5 L4.5,10.5 C5.32842712,10.5 6,11.1715729 6,12 C6,12.8284271 5.32842712,13.5 4.5,13.5 L3,13.5 C2.17157288,13.5 1.5,12.8284271 1.5,12 C1.5,11.1715729 2.17157288,10.5 3,10.5 Z M12,1.5 C12.8284271,1.5 13.5,2.17157288 13.5,3 L13.5,4.5 C13.5,5.32842712 12.8284271,6 12,6 C11.1715729,6 10.5,5.32842712 10.5,4.5 L10.5,3 C10.5,2.17157288 11.1715729,1.5 12,1.5 Z M12,18 C12.8284271,18 13.5,18.6715729 13.5,19.5 L13.5,21 C13.5,21.8284271 12.8284271,22.5 12,22.5 C11.1715729,22.5 10.5,21.8284271 10.5,21 L10.5,19.5 C10.5,18.6715729 11.1715729,18 12,18 Z M4.81066017,4.81066017 C5.39644661,4.22487373 6.34619408,4.22487373 6.93198052,4.81066017 L7.99264069,5.87132034 C8.57842712,6.45710678 8.57842712,7.40685425 7.99264069,7.99264069 C7.40685425,8.57842712 6.45710678,8.57842712 5.87132034,7.99264069 L4.81066017,6.93198052 C4.22487373,6.34619408 4.22487373,5.39644661 4.81066017,4.81066017 Z M4.81066017,19.2426407 C4.22487373,18.6568542 4.22487373,17.7071068 4.81066017,17.1213203 L5.87132034,16.0606602 C6.45710678,15.4748737 7.40685425,15.4748737 7.99264069,16.0606602 C8.57842712,16.6464466 8.57842712,17.5961941 7.99264069,18.1819805 L6.93198052,19.2426407 C6.34619408,19.8284271 5.39644661,19.8284271 4.81066017,19.2426407 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <svg id="icon-dark" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32"
                                        viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M12.0700837,4.0003006 C11.3895108,5.17692613 11,6.54297551 11,8 C11,12.3948932 14.5439081,15.9620623 18.9299163,15.9996994 C17.5467214,18.3910707 14.9612535,20 12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 C12.0233848,4 12.0467462,4.00010034 12.0700837,4.0003006 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                </a>
                            </li>

                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link  menu-wallet" href="https://www.forexfactory.com/"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="32px" height="32px" viewBox="0 0 24 24" version="1.1"
                                        class="svg-main-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <rect fill="#fff" x="4" y="4" width="7" height="7"
                                                rx="1.5" />
                                            <path
                                                d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                fill="#fff" opacity="0.3" />
                                        </g>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown header-profile2">
                                    <a class="nav-link" href="javascript:void(0);" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="header-info2 d-flex align-items-center">
                                            <div class="d-flex align-items-center sidebar-info">
                                                <div>
                                                    <h5 class="mb-0 text-white">{{ getName($data['memberid']) }}</h5>
                                                    <span class="d-block text-end">{{ $data['email'] }}</span>
                                                </div>
                                            </div>
                                            @if ($data['profile_image'] != '')
                                                <img src="{{ asset('uploads') }}/{{ $data['profile_image'] }}"
                                                    alt="">
                                            @else
                                                <img src="{{ asset('uploads/avatar.jpg') }}" alt="">
                                            @endif
                                        </div>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ url('/member/profile') }}" class="dropdown-item ai-icon ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1"
                                                class="svg-main-icon">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                        fill="var(--primary)" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <span class="ms-2">Profile </span>
                                        </a>
                                        <a href="{{ url('/member/wallet') }}" class="dropdown-item ai-icon ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1"
                                                class="svg-main-icon">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                        fill="#000000" />
                                                    <circle fill="var(--primary)" opacity="0.3" cx="19.5"
                                                        cy="17.5" r="2.5" />
                                                </g>
                                            </svg>
                                            <span class="ms-2">Wallet </span>
                                        </a>
                                        <a href="{{ url('/member/security') }}" class="dropdown-item ai-icon ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1"
                                                class="svg-main-icon">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <span class="ms-2">Settings </span>
                                        </a>

                                        <a href="{{ url('/member/logout') }}" class="dropdown-item ai-icon">
                                            <svg class="logout" xmlns="http://www.w3.org/2000/svg" width="18"
                                                height="18" viewBox="0 0 24 24" fill="none" stroke="#fd5353"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12">
                                                </line>
                                            </svg>
                                            <span class="ms-2 text-danger">Logout </span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            {{-- <div class="page-titles">
                <div class="sub-dz-head">
                    <div class="d-flex align-items-center dz-head-title">
                        <h2 class="text-white m-0">Lending Dashboard</h2>
                        <p class="ms-2 text-warning">Welcome Back {{ $data['first_name'] }}!</p>
                    </div>

                </div>
            </div> --}}
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav follow-info">
            <div class="feature-box">
                <div class="wallet-box">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50px"
                        height="50px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#fff" opacity="0.3" cx="20.5" cy="12.5" r="1.5" />
                            <rect fill="#fff" opacity="0.3"
                                transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) "
                                x="3" y="3" width="18" height="7" rx="1" />
                            <path
                                d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z"
                                fill="#fff" />
                        </g>
                    </svg>
                    <div class="ms-3">
                        <h4 class="text-white mb-0 d-block">${{ allWalletBalance($data['memberid']) }}</h4>
                        <small>Withdraw Amount</small>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="item-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="30px" height="40px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path
                                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                    fill="#fff" fill-rule="nonzero" opacity="0.3" />
                                <path
                                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                    fill="#fff" fill-rule="nonzero" />
                            </g>
                        </svg>
                        <h4 class="mb-0 text-white"><span
                                class="counter">{{ totalLevelMembers($data['memberid']) + $Fdata['team'] }}</span>
                        </h4>
                        <small>Team</small>
                    </div>
                    <div class="item-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="30px" height="40px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path
                                    d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                    fill="#fff" fill-rule="nonzero" opacity="0.3" />
                                <path
                                    d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                    fill="#fff" fill-rule="nonzero" />
                            </g>
                        </svg>
                        <h4 class="mb-0 text-white"><span
                                class="counter">{{ $data['downline'] + $Fdata['direct'] }}</span></h4>
                        <small>Directs</small>
                    </div>
                </div>
            </div>
            <span class="main-menu">Main Menu</span>
            @include('member.layouts.sidebar')
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->



        <div class="bread-body" style="min-height: 0px !important;margin-top:80px;margin-bottom: 20px;">
            <!-- Page-titles (Breadcrumb) - Only covers content width -->
            <div class="page-titles" style="max-width: calc(100% - 20px); margin: 0 10px 5px 10px;">
                <div class="d-flex align-items-center">
                    <h2 class="text-white">Lending Dashboard</h2>
                    {{-- <p class="text-warning ms-2">Welcome Back {{ $data['first_name'] }} !</p> --}}
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active ms-auto">
                        <a class="d-flex align-self-center" href="{{ url('/member/dashboard') }}">
                            <svg class="me-2 svg-main-icon" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,3 2.21.00006799998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                                        fill="#aaa9ff" />
                                </g>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Lending Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row mt-0 mb-0">
            <div class="col-sm-12 mb-4">
                <marquee>
                    <h5 class="text-white px-2 my-0" style="color: #fff !important;">
                        @foreach ($dashMsg as $item)
                            <span class="me-5 text-white"
                                style="color: #fff !important;">{{ ucfirst($item['message']) }}</span>
                        @endforeach
                    </h5>
                </marquee>
            </div>
        </div>
        <div class="wallet-bar-close"></div>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row  main-card">
                            <div class="col-xl-12 col-md-12">
                                <div class="card justify-content-center">
                                    <div class="card-body d-flex">
                                        <div class="d-block">
                                            @if ($data['profile_image'] != '')
                                                <img src="{{ asset('uploads') }}/{{ $data['profile_image'] }}"
                                                    class="avatar avatar-xxl border-primary rounded-circle"
                                                    alt="">
                                            @else
                                                <img src="{{ asset('uploads/avatar.jpg') }}"
                                                    class="avatar avatar-xxl border-primary rounded-circle"
                                                    alt="">
                                            @endif
                                        </div>
                                        <div class="w-100 ps-4">
                                            <div class="d-flex justify-content-between">
                                                <div class="">
                                                    <h4 class="card-title mb-1"> {{ $data['first_name'] }}
                                                        {{ $data['last_name'] }}</h4>
                                                    <span>({{ $data['country'] }}) </span>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="icon-box icon-box-sm bgl-danger me-2 btn-edit">
                                                        <a href="javascript:void(0)">
                                                            <svg width="32" height="32" viewBox="0 0 32 32"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_787_189)">
                                                                    <path
                                                                        d="M16.0001 2.66699C13.363 2.66699 10.7851 3.44898 8.59248 4.91406C6.39983 6.37915 4.69086 8.46153 3.68169 10.8979C2.67253 13.3342 2.40848 16.0151 2.92295 18.6015C3.43742 21.1879 4.7073 23.5637 6.572 25.4284C8.4367 27.2931 10.8125 28.563 13.3989 29.0775C15.9853 29.5919 18.6662 29.3279 21.1025 28.3187C23.5389 27.3096 25.6213 25.6006 27.0863 23.4079C28.5514 21.2153 29.3334 18.6374 29.3334 16.0003C29.3334 14.2494 28.9885 12.5156 28.3185 10.8979C27.6484 9.2802 26.6663 7.81035 25.4282 6.57224C24.1901 5.33412 22.7202 4.35199 21.1025 3.68193C19.4849 3.01187 17.751 2.66699 16.0001 2.66699ZM16.0001 26.667C13.8904 26.667 11.8281 26.0414 10.074 24.8693C8.31988 23.6973 6.95271 22.0314 6.14537 20.0823C5.33804 18.1332 5.1268 15.9885 5.53838 13.9194C5.94995 11.8502 6.96586 9.94961 8.45761 8.45785C9.94938 6.96609 11.85 5.95019 13.9191 5.53862C15.9883 5.12704 18.133 5.33828 20.082 6.14561C22.0311 6.95295 23.697 8.32012 24.8691 10.0742C26.0412 11.8284 26.6668 13.8907 26.6668 16.0003C26.6668 18.8293 25.5429 21.5424 23.5426 23.5428C21.5422 25.5432 18.8291 26.667 16.0001 26.667Z"
                                                                        fill="#fd5353" />
                                                                    <path
                                                                        d="M16.0001 22.6667C16.7365 22.6667 17.3334 22.0697 17.3334 21.3333C17.3334 20.597 16.7365 20 16.0001 20C15.2637 20 14.6667 20.597 14.6667 21.3333C14.6667 22.0697 15.2637 22.6667 16.0001 22.6667Z"
                                                                        fill="#fd5353" />
                                                                    <path
                                                                        d="M16.0001 9.33301C15.6465 9.33301 15.3073 9.47348 15.0573 9.72353C14.8072 9.97358 14.6667 10.3127 14.6667 10.6663V17.333C14.6667 17.6866 14.8072 18.0258 15.0573 18.2758C15.3073 18.5259 15.6465 18.6663 16.0001 18.6663C16.3537 18.6663 16.6928 18.5259 16.9429 18.2758C17.1929 18.0258 17.3334 17.6866 17.3334 17.333V10.6663C17.3334 10.3127 17.1929 9.97358 16.9429 9.72353C16.6928 9.47348 16.3537 9.33301 16.0001 9.33301Z"
                                                                        fill="#fd5353" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_787_189">
                                                                        <rect width="32" height="32"
                                                                            fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div class="dropdown ms-auto">
                                                        <a href="javascript:void(0)"
                                                            class="icon-box icon-box-sm bgl-primary"
                                                            data-bs-toggle="dropdown">
                                                            <svg width="32" height="32" viewBox="0 0 32 32"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M27.3925 4.60647C26.1493 3.36576 24.4647 2.66895 22.7083 2.66895C20.9519 2.66895 19.2673 3.36576 18.0241 4.60647L15.5295 7.10101L4.30461 18.3265C4.10055 18.5303 3.96826 18.7948 3.92767 19.0803L2.67994 27.8109C2.65288 28 2.66679 28.1927 2.72072 28.376C2.77465 28.5593 2.86735 28.7289 2.99252 28.8732C3.11769 29.0176 3.27243 29.1333 3.44624 29.2126C3.62005 29.292 3.80888 29.333 3.99994 29.333C4.06311 29.3331 4.12621 29.3287 4.18874 29.3197L12.9199 28.0726C13.2054 28.0313 13.4698 27.8989 13.6738 27.695L27.3938 13.9762C28.0091 13.361 28.4972 12.6307 28.8302 11.8268C29.1632 11.023 29.3346 10.1614 29.3346 9.29134C29.3346 8.42126 29.1632 7.5597 28.8302 6.75586C28.4972 5.95202 28.0091 5.22166 27.3938 4.60647H27.3925ZM12.1022 25.4958L5.57154 26.4281L6.50487 19.8981L16.4726 9.92954L22.0709 15.5274L12.1022 25.4958ZM25.5066 12.0909L23.9559 13.6421L18.3574 8.04394L19.9094 6.49181C20.6635 5.77219 21.6659 5.3707 22.7083 5.3707C23.7507 5.3707 24.753 5.77219 25.5071 6.49181C26.2494 7.2344 26.6664 8.24138 26.6664 9.29134C26.6664 10.3413 26.2494 11.3483 25.5071 12.0909H25.5066Z"
                                                                    fill="var(--primary)" />
                                                            </svg>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li class="dropdown-item"><a
                                                                    href="{{ url('/member/profile') }}"><i
                                                                        class="fa fa-user-circle text-primary me-2"></i>
                                                                    View profile</a></li>
                                                            <li class="dropdown-item"><a
                                                                    href="{{ url('/member/security') }}"><i
                                                                        class="fa fa-check text-primary me-2"></i> Go
                                                                    To Security </a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="d-flex flex-wrap pt-4">
                                                <div class="d-flex align-items-center pe-md-4 pe-2 mb-2">
                                                    <div class="pe-2">
                                                        <svg width="24" height="25" viewBox="0 0 24 25"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M20 4.5H4C3.20435 4.5 2.44129 4.81607 1.87868 5.37868C1.31607 5.94129 1 6.70435 1 7.5V17.5C1 18.2956 1.31607 19.0587 1.87868 19.6213C2.44129 20.1839 3.20435 20.5 4 20.5H20C20.7956 20.5 21.5587 20.1839 22.1213 19.6213C22.6839 19.0587 23 18.2956 23 17.5V7.5C23 6.70435 22.6839 5.94129 22.1213 5.37868C21.5587 4.81607 20.7956 4.5 20 4.5ZM21 17.25L16.1 12.85L21 9.42V17.25ZM3 9.42L7.9 12.85L3 17.25V9.42ZM9.58 14.03L11.43 15.32C11.5974 15.4361 11.7963 15.4984 12 15.4984C12.2037 15.4984 12.4026 15.4361 12.57 15.32L14.42 14.03L19.42 18.5H4.6L9.58 14.03ZM4 6.5H20C20.1857 6.50149 20.3673 6.55467 20.5245 6.65358C20.6817 6.75249 20.8083 6.89322 20.89 7.06L12 13.28L3.11 7.06C3.19171 6.89322 3.31826 6.75249 3.47545 6.65358C3.63265 6.55467 3.81428 6.50149 4 6.5Z"
                                                                fill="#F79F19" />
                                                        </svg>
                                                    </div>
                                                    <h5 class="font-w400 mb-0">{{ $data['email'] }}</h5>
                                                </div>
                                                <div class="d-flex align-items-center pe-md-4 pe-2 mb-2">
                                                    <div class="pe-2">
                                                        <svg width="24" height="25" viewBox="0 0 24 25"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M19.4401 13.5004C19.2201 13.5004 18.9901 13.4304 18.7701 13.3804C18.3246 13.2822 17.8868 13.1518 17.4601 12.9904C16.9962 12.8216 16.4862 12.8304 16.0284 13.015C15.5706 13.1996 15.1972 13.547 14.9801 13.9904L14.7601 14.4404C13.7861 13.8985 12.8911 13.2256 12.1001 12.4404C11.3149 11.6494 10.6419 10.7544 10.1001 9.78036L10.5201 9.50036C10.9635 9.28327 11.3109 8.90989 11.4955 8.45205C11.6801 7.99421 11.6889 7.48427 11.5201 7.02036C11.3613 6.59278 11.231 6.15515 11.1301 5.71036C11.0801 5.49036 11.0401 5.26036 11.0101 5.03036C10.8887 4.32598 10.5197 3.6881 9.96972 3.2316C9.41972 2.77509 8.7248 2.52997 8.0101 2.54036H5.0101C4.57913 2.53631 4.15235 2.62517 3.75881 2.80089C3.36527 2.9766 3.01421 3.23505 2.72953 3.55864C2.44485 3.88222 2.23324 4.26335 2.10909 4.67607C1.98494 5.08879 1.95118 5.52342 2.0101 5.95036C2.54284 10.1397 4.45613 14.0322 7.44775 17.013C10.4394 19.9938 14.3388 21.8929 18.5301 22.4104H18.9101C19.6475 22.4114 20.3595 22.1409 20.9101 21.6504C21.2265 21.3674 21.4792 21.0205 21.6516 20.6327C21.8239 20.2448 21.9121 19.8248 21.9101 19.4004V16.4004C21.8979 15.7057 21.6449 15.0369 21.1944 14.508C20.744 13.9791 20.1239 13.623 19.4401 13.5004ZM19.9401 19.5004C19.9399 19.6423 19.9095 19.7827 19.8509 19.912C19.7923 20.0413 19.7068 20.1566 19.6001 20.2504C19.4884 20.3468 19.3577 20.4189 19.2165 20.462C19.0753 20.505 18.9267 20.5181 18.7801 20.5004C15.035 20.0202 11.5563 18.3068 8.89282 15.6306C6.2293 12.9545 4.53251 9.46769 4.0701 5.72036C4.05419 5.57387 4.06813 5.42569 4.1111 5.28475C4.15407 5.14381 4.22517 5.01304 4.3201 4.90036C4.41381 4.79369 4.52916 4.7082 4.65848 4.64957C4.7878 4.59095 4.92812 4.56054 5.0701 4.56036H8.0701C8.30265 4.55518 8.52972 4.63124 8.71224 4.77543C8.89476 4.91962 9.02131 5.12293 9.0701 5.35036C9.1101 5.62369 9.1601 5.89369 9.2201 6.16036C9.33562 6.6875 9.48936 7.20554 9.6801 7.71036L8.2801 8.36036C8.1604 8.41528 8.05272 8.4933 7.96326 8.58995C7.87379 8.6866 7.8043 8.79997 7.75877 8.92355C7.71324 9.04713 7.69257 9.17849 7.69795 9.31008C7.70332 9.44167 7.73464 9.5709 7.7901 9.69036C9.2293 12.7731 11.7073 15.2512 14.7901 16.6904C15.0336 16.7904 15.3066 16.7904 15.5501 16.6904C15.6748 16.6458 15.7894 16.5768 15.8873 16.4875C15.9851 16.3983 16.0643 16.2905 16.1201 16.1704L16.7401 14.7704C17.2571 14.9552 17.7847 15.1088 18.3201 15.2304C18.5868 15.2904 18.8568 15.3404 19.1301 15.3804C19.3575 15.4291 19.5608 15.5557 19.705 15.7382C19.8492 15.9207 19.9253 16.1478 19.9201 16.3804L19.9401 19.5004Z"
                                                                fill="#FF5B5B" />
                                                        </svg>
                                                    </div>
                                                    <h5 class="font-w400 mb-0">{{ $data['mobile'] }}</h5>
                                                </div>
                                                <div class="d-flex align-items-center pe-md-4 pe-2 mb-2">
                                                    <div class="pe-2">
                                                        <svg width="24" height="25" viewBox="0 0 24 25"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5.97117 23.5767H18.0289C20.8125 23.5767 23.0769 21.3123 23.0769 18.5286V6.47093C23.0769 3.68727 20.8125 1.42285 18.0289 1.42285H5.97117C3.18752 1.42285 0.923096 3.68727 0.923096 6.47093V18.5286C0.923096 21.3123 3.18752 23.5767 5.97117 23.5767ZM2.76925 6.47093C2.76925 4.70545 4.20525 3.26901 5.97117 3.26901H18.0289C19.7948 3.26901 21.2308 4.70545 21.2308 6.47093V18.5286C21.2308 20.2941 19.7948 21.7305 18.0289 21.7305H5.97117C4.20525 21.7305 2.76925 20.2941 2.76925 18.5286V6.47093Z"
                                                                fill="#00A389" />
                                                            <path
                                                                d="M7.0557 19.2014H16.9454C17.544 19.2014 18.1011 18.9328 18.4752 18.4649C18.852 17.9935 18.9917 17.385 18.8583 16.7954C18.3441 14.5292 16.7943 12.7479 14.7709 11.8879C15.3334 11.2406 15.6861 10.4062 15.6861 9.4834C15.6861 7.4511 14.0329 5.79785 12.0001 5.79785C9.96736 5.79785 8.31412 7.4511 8.31412 9.4834C8.31412 10.4062 8.66681 11.2406 9.22931 11.8879C7.20591 12.7479 5.6561 14.5294 5.14194 16.7959C5.00853 17.385 5.14825 17.993 5.52505 18.4645C5.89915 18.9328 6.45715 19.2014 7.0557 19.2014ZM10.1603 9.4834C10.1603 8.46928 10.986 7.64401 12.0001 7.64401C13.0142 7.64401 13.84 8.46928 13.84 9.4834C13.84 10.4975 13.0142 11.3228 12.0001 11.3228C10.986 11.3228 10.1603 10.4975 10.1603 9.4834ZM12.0001 13.1689C14.4385 13.1689 16.5181 14.828 17.0572 17.2034C17.0689 17.2538 17.05 17.2903 17.0329 17.3124C16.9986 17.3552 16.9589 17.3552 16.9454 17.3552H7.0557C7.04218 17.3552 7.00162 17.3552 6.96736 17.3124C6.95024 17.2903 6.9313 17.2538 6.94302 17.2038C7.48209 14.828 9.56171 13.1689 12.0001 13.1689Z"
                                                                fill="#00A389" />
                                                        </svg>

                                                    </div>
                                                    <h5 class="font-w400 mb-0">KYC Status -
                                                        @if ($data['kyc_status'] == 'Verified')
                                                            <span class="text-success">
                                                                {{ $data['kyc_status'] }}</span>
                                                        @elseif ($data['kyc_status'] == 'Submitted')
                                                            <span class="text-warning">
                                                                {{ $data['kyc_status'] }}</span>
                                                        @else
                                                            <span class="text-danger">
                                                                {{ $data['kyc_status'] }}</span>
                                                        @endif
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-sm-12">
                                @foreach ($lendata as $item)
                                    <div class="alert alert-success" role="alert" style="overflow: auto">
                                        <b>You can break this {{ $item['plan'] }} lending before
                                            {{ date('Y-m-d', strtotime($item['close_date'] . '+7 days')) }} </b><a
                                            id="codeRight"></a>
                                        <span class="float-end" id="copyRightButtonId"><i class="ti-files"></i> <a
                                                href="{{ url('/member/investment-break') }}"> OpenLink</a></span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-sm-6">
                                <div class="widget-stat card">
                                    <div class="card-body p-4">
                                        <div class="media ai-icon">
                                            <span class="me-3 bgl-primary text-primary">
                                                <!-- <i class="ti-user"></i> -->
                                                <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg"
                                                    width="30" height="30" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                            </span>
                                            <div class="media-body">
                                                <p class="mb-1">Team</p>
                                                <h4 class="mb-0">
                                                    {{ totalLevelMembers($data['memberid']) + $Fdata['team'] }}
                                                </h4>
                                                {{-- <span class="badge badge-primary">+3.5%</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-sm-6">
                                <div class="widget-stat card">
                                    <div class="card-body p-4">
                                        <div class="media ai-icon">
                                            <span class="me-3 bgl-warning text-warning">
                                                <svg id="icon-orders" xmlns="http://www.w3.org/2000/svg"
                                                    width="30" height="30" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-file-text">
                                                    <path
                                                        d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                    </path>
                                                    <polyline points="14 2 14 8 20 8"></polyline>
                                                    <line x1="16" y1="13" x2="8"
                                                        y2="13"></line>
                                                    <line x1="16" y1="17" x2="8"
                                                        y2="17"></line>
                                                    <polyline points="10 9 9 9 8 9"></polyline>
                                                </svg>
                                            </span>
                                            <div class="media-body">
                                                <p class="mb-1">Downline</p>
                                                <h4 class="mb-0">{{ $data['downline'] + $Fdata['direct'] }}</h4>
                                                {{-- <span class="badge badge-warning">+3.5%</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3  col-lg-6 col-sm-6">
                                <div class="widget-stat card">
                                    <div class="card-body  p-4">
                                        <div class="media ai-icon">
                                            <span class="me-3 bgl-danger text-danger">
                                                <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg"
                                                    width="30" height="30" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-dollar-sign">
                                                    <line x1="12" y1="1" x2="12"
                                                        y2="23"></line>
                                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                                </svg>
                                            </span>
                                            <div class="media-body">
                                                <p class="mb-1">Lending Wallet</p>
                                                <h5 class="mb-0">{{ $data['lending_wallet'] }}</h5>
                                                {{-- <span class="badge badge-danger">-3.5%</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-sm-6">
                                <div class="widget-stat card">
                                    <div class="card-body p-4">
                                        <div class="media ai-icon">
                                            <span class="me-3 bgl-success text-success">
                                                <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-database">
                                                    <ellipse cx="12" cy="5" rx="9"
                                                        ry="3"></ellipse>
                                                    <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                                    <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                                </svg>
                                            </span>
                                            <div class="media-body">
                                                <p class="mb-1">Fund Wallet</p>
                                                <h5 class="mb-0">{{ $data['p2p_wallet'] + $Fdata['fund_wallet'] }}
                                                </h5>
                                                {{-- <span class="badge badge-success">-3.5%</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4  col-lg-6 col-sm-6">
                                <div class="widget-stat card bg-info">
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="la la-microchip"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1">Micro Investment</p>
                                                <h3 class="text-white">
                                                    ${{ totalMicroInvestment($data['memberid']) + ($Fdata['micro_invest'] ?? 0) - selfBizCoreDeinvest($data['memberid'], 'Micro') }}
                                                </h3>
                                                <div class="progress mb-2 bg-secondary">
                                                    <div class="progress-bar progress-animated bg-white"
                                                        style="width: 80%">
                                                    </div>
                                                </div>
                                                <small>Total Micro Investment</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                <div class="widget-stat card bg-primary">
                                    <div class="card-body  p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="la la-users"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1">Core Investment</p>
                                                <h3 class="text-white">
                                                    ${{ totalCoreInvestment($data['memberid']) + $Fdata['core_invest'] - selfBizCoreDeinvest($data['memberid'], 'Core') }}
                                                </h3>
                                                <div class="progress mb-2 bg-secondary">
                                                    <div class="progress-bar progress-animated bg-white"
                                                        style="width: 80%">
                                                    </div>
                                                </div>
                                                <small>Total Core Investment</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                <div class="widget-stat card bg-warning">
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="la la-user"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1">Lime Investment</p>
                                                <h3 class="text-white">
                                                    ${{ totalLimeInvestment($data['memberid']) + $Fdata['lime_invest'] - selfBizCoreDeinvest($data['memberid'], 'Lime') }}
                                                </h3>
                                                <div class="progress mb-2 bg-primary">
                                                    <div class="progress-bar progress-animated bg-white"
                                                        style="width: 50%">
                                                    </div>
                                                </div>
                                                <small>Total Lime Investment</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-6">
                                <div class="widget-stat card bg-secondary">
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="la la-graduation-cap"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1">Droid Investment</p>
                                                <h3 class="text-white">
                                                    ${{ totalDroidInvestment($data['memberid']) + $Fdata['droid_invest'] - selfBizCoreDeinvest($data['memberid'], 'Droid') }}
                                                </h3>
                                                <div class="progress mb-2 bg-primary">
                                                    <div class="progress-bar progress-animated bg-white"
                                                        style="width: 76%">
                                                    </div>
                                                </div>
                                                <small>Total Droid Investment</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6  col-lg-6 col-sm-6">
                                <div class="widget-stat card bg-danger ">
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="la la-dollar"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1">Total Investment</p>
                                                <h3 class="text-white">$
                                                    {{ totalInvestment($data['memberid']) + $Fdata['total_invest'] - selfBizDeinvest($data['memberid']) }}
                                                </h3>
                                                <div class="progress mb-2 bg-secondary">
                                                    <div class="progress-bar progress-animated bg-white"
                                                        style="width: 30%">
                                                    </div>
                                                </div>
                                                <small>Total Investment</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3  col-lg-6 col-sm-6">
                                <div class="widget-stat card">
                                    <div class="card-body p-4">
                                        <h4 class="card-title">Total Income</h4>
                                        <h3>$ {{ totalIncome($data['memberid']) + $Fdata['total_inc'] }}</h3>

                                        {{-- <h3>$ {{ totalIncome($data['memberid']) + $Fdata['lending'] + $Fdata['level'] + $Fdata['rewards']}}</h3> --}}
                                        <div class="progress mb-2">
                                            <div class="progress-bar progress-animated bg-primary" style="width: 80%">
                                            </div>
                                        </div>
                                        <small>Total of all Incomes</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-sm-6">
                                <a href="{{ url('/member/income/level-incomes') }}">
                                    <div class="widget-stat card">
                                        <div class="card-body p-4">
                                            <h4 class="card-title">Level Income</h4>
                                            <h3>$
                                                {{ totalLevelIncome($data['memberid']) + $Fdata['level'] }}
                                            </h3>
                                            <div class="progress mb-2">
                                                <div class="progress-bar progress-animated bg-warning"
                                                    style="width: 50%"></div>
                                            </div>
                                            <small>Total Level Income</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3  col-lg-6 col-sm-6">
                                <a href="{{ url('/member/income/lending-incomes') }}">
                                    <div class="widget-stat card">
                                        <div class="card-body p-4">
                                            <h4 class="card-title">Lending Income</h4>
                                            <h3>$
                                                {{ totalLendingIncome($data['memberid']) + $Fdata['lending'] }}
                                            </h3>
                                            <div class="progress mb-2">
                                                <div class="progress-bar progress-animated bg-red" style="width: 76%">
                                                </div>
                                            </div>
                                            <small>Total Lending Income</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3  col-lg-6 col-sm-6">
                                <a href="{{ url('/member/income/reward-incomes') }}">
                                    <div class="widget-stat card">
                                        <div class="card-body p-4">
                                            <h4 class="card-title">Reward Income</h4>
                                            <h3>$
                                                {{ totalRewardIncome($data['memberid']) + $Fdata['rewards'] }}
                                            </h3>
                                            <div class="progress mb-2">
                                                <div class="progress-bar progress-animated bg-success"
                                                    style="width: 30%"></div>
                                            </div>
                                            <small>Total Reward Income</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-6">
                                <div class="widget-stat card">
                                    <div class="card-body p-4">
                                        <h4 class="card-title">Bonus</h4>
                                        <h3>$ {{ 0 + $Fdata['bonus_inc'] }}
                                        </h3>
                                        <div class="progress mb-2">
                                            <div class="progress-bar progress-animated bg-danger" style="width: 50%">
                                            </div>
                                        </div>
                                        <small>Total Bonus</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6  col-lg-6 col-sm-6">
                                <a href="{{ url('/member/income/light-lev-incomes') }}">
                                    <div class="widget-stat card">
                                        <div class="card-body p-4">
                                            <h4 class="card-title">Light Level Income</h4>
                                            <h3>$
                                                {{ totalLightLevelIncome($data['memberid']) + $Fdata['light_lvl_inc'] }}
                                            </h3>
                                            <div class="progress mb-2">
                                                <div class="progress-bar progress-animated bg-info"
                                                    style="width: 76%">
                                                </div>
                                            </div>
                                            <small>Total Light Level Income</small>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="row g-3 mb-3 justify-content-center">
                            <div class="col-lg-12">
                                <div class="alert alert-primary" role="alert" style="overflow: auto">
                                    <b>Referral Code : </b><a
                                        id="code">https://liberfx.com/member/register/{{ $data['memberid'] }}</a>
                                    <span class="float-end" id="copyButtonId"><i class="ti-files"></i> <span
                                            id="msgText"> CopyText</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($dashVideos->isNotEmpty() && !session()->has('ADMIN_LOGIN'))
            <div class="modal fade" id="dashVideoModal" tabindex="-1" aria-labelledby="dashVideoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dashVideoModalLabel">
                                {{ $dashVideos->count() > 1 ? 'Dashboard Videos' : 'Dashboard Video' }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-0">
                            <div class="row g-0 justify-content-center">
                                @foreach ($dashVideos as $dashVideo)
                                    <div class="col-12 {{ $dashVideos->count() > 1 ? 'col-md-6' : '' }}">
                                        <div class="ratio ratio-16x9 bg-dark rounded overflow-hidden">
                                            <video class="w-100 h-100" controls autoplay muted preload="auto"
                                                playsinline aria-label="Dashboard video {{ $loop->iteration }}"
                                                style="object-fit: contain;">
                                                <source
                                                    src="{{ asset('uploads/dash-videos/' . basename($dashVideo->video)) }}"
                                                    type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- modal-box-strat -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title">Make Payment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Payment method</label>
                        <div>
                            <select class="image-select default-select dashboard-select w-100 mb-3"
                                aria-label="Default">
                                <option selected>Open this select menu</option>
                                <option value="1">Bank Card</option>
                                <option value="2">Online</option>
                                <option value="3">Cash On Time</option>
                            </select>
                        </div>
                        <label class="form-label">Amount</label>
                        <input type="number" class="form-control mb-3" id="exampleInputEmail4" placeholder="Rupee">
                        <label class="form-label">Card Holder Name</label>
                        <input type="number" class="form-control mb-3" id="exampleInputEmail5"
                            placeholder="Amount">
                        <label class="form-label">Card Name</label>
                        <input type="text" class="form-control mb-3" id="exampleInputEmail6"
                            placeholder="Amount">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title">Make Payment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label">Seller Mobile Number</label>
                            <input type="number" class="form-control mb-3" id="exampleInputEmail1"
                                placeholder="Number">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control mb-3" id="exampleInputEmail2"
                                placeholder=" Name">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control mb-3" id="exampleInputEmail3"
                                placeholder="Amount">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer style-1">
            <div class="copyright">
                <p>Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    {{ config('detailsApp.name') }}, All Right Reserved
                </p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('uassets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('uassets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    @if ($dashVideos->isNotEmpty() && !session()->has('ADMIN_LOGIN'))
        <script>
            $(function() {
                const dashVideoModal = $('#dashVideoModal');

                dashVideoModal.modal('show');
                if (window.matchMedia('(max-width: 575.98px)').matches) {
                    document.body.style.paddingRight = '0px';
                }
                dashVideoModal.on('hidden.bs.modal', function() {
                    $(this).find('video').each(function() {
                        this.pause();
                    });
                });
            });
        </script>
    @endif

    <!-- Apex Chart -->
    <script src="{{ asset('uassets/vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('uassets/vendor/chart-js/chart.bundle.min.js') }}"></script>

    <!-- counter -->
    <script src="{{ asset('uassets/vendor/counter/counter.min.js') }}"></script>
    <script src="{{ asset('uassets/vendor/counter/waypoint.min.js') }}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('uassets/vendor/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('uassets/vendor/swiper/js/swiper-bundle.min.js') }}"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('uassets/js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('uassets/js/custom.min.js') }}"></script>
    <script src="{{ asset('uassets/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('uassets/js/demo.js') }}"></script>

    <script>
        jQuery(document).ready(function() {
            setTimeout(function() {
                dlabSettingsOptions.version = 'dark';
                new dlabSettings(dlabSettingsOptions);
                setCookie('version', 'dark');
            }, 1500000)
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#copyButtonId').on('click', function() {
                var text = $('#code').text()
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val(text).select();
                document.execCommand("copy");
                $temp.remove();
                $('#msgText').html('Text Copied')
            });
        });
    </script>
</body>

</html>
