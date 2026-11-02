<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="VoxabitGenix Admin Panel" name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logo/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logo/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('logo/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('logo/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <!-- App css -->
    <link href="{{ asset('adm_assets/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adm_assets/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('adm_assets/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="dark-style" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="loading authentication-bg"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-xxl-4 col-lg-5">
                    @if (session()->has('failedMsg'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('failedMsg') }}
                        </div>
                    @endif
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header py-0 text-center bg-dark">
                            <a href="index.html">
                                <span><img src="{{ asset('logo/logo-white.png') }}" width="180"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                                {{-- <p class="text-muted mb-4">Enter your email address and password to access admin panel.
                                </p> --}}
                            </div>

                            <form method="POST" action="{{ route('adminLogin') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" name="email" id="emailaddress"
                                        placeholder="Enter your email">
                                    @error('email')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    {{-- <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your
                                            password?</small></a> --}}
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>

                                    </div>
                                    @error('password')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <div class="position-relative auth-pass-inputgroup overflow-hidden">
                                        <label class="text-left">Captcha</label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="width: 25%">
                                                <i>{{ $str1 ?? session('admin_str1') ?? session('str1') }} +
                                                    {{ $str2 ?? session('admin_str2') ?? session('str2') }} = </i></span>
                                            <input type="text" class="form-control pe-5 password-input"
                                                name="login-captcha" id="login-captcha" placeholder="Enter Answer Here">
                                            <a href="{{ url('/admin') }}" class="btn btn-dark" type="button"
                                                id="inputGroupFileAddon04" title="Refresh Captcha"><i class="bi bi-repeat"></i></a>
                                        </div>
                                        @error('login-captcha')
                                            <span class="small text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-dark" type="submit"> Admin Log In </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        {{ date('Y') }} © liberfx.com
    </footer>

    <!-- bundle -->
    <script src="{{ asset('adm_assets/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('adm_assets/assets/js/app.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.password-eye').on('click', function() {
                if ('password' == $('#password').attr('type')) {
                    $('#password').attr('type', 'text');
                } else {
                    $('#password').attr('type', 'password');
                }

            })
        })
    </script>
</body>

</html>
