<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#12123a">
    <title>Forgot Password | {{ config('detailsApp.name') }}</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logo/favicon/favicon-32x32.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #3736af;
            --primary-hover: #2b2a88;
            --primary-dark: #12123a;
            --primary-soft: #eeedff;
            --title: #424562;
            --text: #717579;
            --muted: #737b8b;
            --surface: #fdfdff;
            --surface-soft: #f5f5fa;
            --border: #e6e6ee;
            --success: #198754;
            --danger: #d93f4c;
            --shadow: 0 24px 64px rgba(18, 18, 58, .14)
        }

        * {
            box-sizing: border-box
        }

        html {
            color-scheme: light
        }

        body {
            margin: 0;
            min-width: 320px;
            min-height: 100vh;
            font-family: "Poppins", sans-serif;
            color: var(--text);
            background: var(--surface-soft);
            -webkit-font-smoothing: antialiased
        }

        button,
        input {
            font: inherit
        }

        button,
        a {
            -webkit-tap-highlight-color: transparent
        }

        .auth-background {
            display: none
        }

        .auth-shell {
            width: 100%;
            min-height: 100vh;
            display: grid;
            grid-template-columns: minmax(390px, .88fr) minmax(520px, 1.12fr);
            gap: 0;
            padding: 0;
            margin: 0
        }

        .brand-panel {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            min-height: 100vh;
            padding: clamp(32px, 4vw, 64px);
            display: flex;
            flex-direction: column;
            color: #f8f8ff;
            background: var(--primary-dark)
        }

        .brand-panel:before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -2;
            background: linear-gradient(145deg, rgba(55, 54, 175, .88), rgba(18, 18, 58, .92)), url("{{ asset('uassets/images/bg-1.png') }}") center/cover no-repeat
        }

        .brand-panel:after {
            content: "";
            position: absolute;
            z-index: -1;
            width: 380px;
            height: 380px;
            right: -210px;
            bottom: -180px;
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 50%;
            box-shadow: 0 0 0 64px rgba(255, 255, 255, .025), 0 0 0 128px rgba(255, 255, 255, .02)
        }

        .brand-logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            width: fit-content;
            color: inherit;
            text-decoration: none
        }

        .brand-mark {
            width: auto;
            height: auto;
            display: block;
            border: 0;
            border-radius: 0;
            background: transparent;
            box-shadow: none
        }

        .brand-mark img {
            width: 44px;
            height: 44px;
            object-fit: contain
        }

        .brand-name {
            font-size: 1.35rem;
            font-weight: 600;
            letter-spacing: -.025em
        }

        .brand-content {
            max-width: 560px;
            margin: auto 0;
            padding: 48px 0 40px
        }

        .eyebrow {
            display: flex;
            align-items: center;
            gap: 9px;
            margin: 0 0 18px;
            color: rgba(248, 248, 255, .72);
            font-size: .75rem;
            font-weight: 600;
            letter-spacing: .12em;
            text-transform: uppercase
        }

        .eyebrow:before {
            content: "";
            width: 24px;
            height: 2px;
            border-radius: 2px;
            background: #aaa9ff
        }

        .brand-content h1 {
            max-width: 540px;
            margin: 0;
            color: #f8f8ff;
            font-size: clamp(2.2rem, 4vw, 3.8rem);
            font-weight: 700;
            line-height: 1.08;
            letter-spacing: -.045em
        }

        .brand-summary {
            max-width: 540px;
            margin: 22px 0 0;
            color: rgba(248, 248, 255, .72);
            font-size: .98rem;
            line-height: 1.8
        }

        .network-visual {
            position: relative;
            max-width: 530px;
            margin: 34px 0 30px;
            padding: 18px;
            border: 1px solid rgba(255, 255, 255, .13);
            border-radius: 16px;
            background: rgba(18, 18, 58, .58);
            box-shadow: 0 24px 50px rgba(4, 4, 25, .28)
        }

        .visual-toolbar {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 17px
        }

        .visual-toolbar i {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .24)
        }

        .visual-toolbar span {
            margin-left: auto;
            color: rgba(255, 255, 255, .45);
            font-size: .65rem
        }

        .visual-body {
            display: grid;
            grid-template-columns: 1.3fr .8fr;
            gap: 11px
        }

        .visual-chart,
        .visual-security {
            border: 1px solid rgba(255, 255, 255, .08);
            border-radius: 10px;
            background: rgba(255, 255, 255, .055)
        }

        .visual-chart {
            height: 118px;
            padding: 17px;
            display: flex;
            align-items: flex-end;
            gap: 8px
        }

        .visual-chart i {
            flex: 1;
            min-height: 14px;
            border-radius: 3px 3px 1px 1px;
            background: #aaa9ff;
            opacity: .85
        }

        .visual-chart i:nth-child(1) {
            height: 30%
        }

        .visual-chart i:nth-child(2) {
            height: 52%
        }

        .visual-chart i:nth-child(3) {
            height: 41%
        }

        .visual-chart i:nth-child(4) {
            height: 72%
        }

        .visual-chart i:nth-child(5) {
            height: 64%
        }

        .visual-chart i:nth-child(6) {
            height: 88%
        }

        .visual-security {
            padding: 17px;
            display: flex;
            flex-direction: column;
            justify-content: center
        }

        .visual-shield {
            width: auto;
            height: auto;
            margin: 0 0 12px;
            display: block;
            border: 0;
            border-radius: 0;
            color: #aaa9ff;
            background: transparent
        }

        .visual-shield svg {
            width: 27px;
            height: 27px
        }

        .visual-security b {
            color: #f8f8ff;
            font-size: .78rem
        }

        .visual-security small {
            margin-top: 5px;
            color: rgba(255, 255, 255, .48)
        }

        .trust-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 13px 18px
        }

        .trust-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: rgba(248, 248, 255, .82);
            font-size: .79rem;
            font-weight: 500
        }

        .trust-item svg {
            flex: 0 0 auto;
            width: 18px;
            height: 18px;
            color: #aaa9ff
        }

        .secure-note {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: auto;
            color: rgba(248, 248, 255, .58);
            font-size: .72rem
        }

        .secure-note svg {
            width: 16px;
            height: 16px;
            color: #aaa9ff
        }

        .login-panel {
            min-height: 100vh;
            padding: clamp(28px, 5vw, 76px);
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--surface-soft)
        }

        .login-card {
            position: relative;
            width: min(100%, 620px);
            padding: clamp(26px, 4vw, 48px);
            overflow: visible;
            border: 1px solid rgba(55, 54, 175, .1);
            border-radius: 18px;
            background: rgba(253, 253, 255, .96);
            box-shadow: var(--shadow);
            backdrop-filter: none
        }

        .login-card:before {
            display: none
        }

        .card-header {
            position: relative;
            display: block;
            margin-bottom: 28px;
            padding: 0;
            border: 0
        }

        .security-icon {
            display: none
        }

        .card-header:after {
            content: "Recovery service";
            position: absolute;
            right: 0;
            top: 0;
            padding: 7px 11px;
            border-radius: 999px;
            color: var(--primary);
            background: var(--primary-soft);
            font-size: .67rem;
            font-weight: 600;
            letter-spacing: .04em
        }

        .card-header h2 {
            margin: 0;
            color: var(--title);
            font-size: clamp(1.65rem, 2.5vw, 2.15rem);
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -.035em
        }

        .card-header p {
            margin: 8px 0 0;
            color: var(--muted);
            font-size: .83rem;
            line-height: 1.65
        }

        .alert {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 20px;
            padding: 12px 14px;
            border: 1px solid rgba(217, 63, 76, .2);
            border-radius: 10px;
            color: #a92d38;
            background: rgba(217, 63, 76, .07);
            font-size: .75rem;
            line-height: 1.55
        }

        .alert svg {
            flex: 0 0 auto;
            width: 17px;
            height: 17px;
            margin-top: 1px
        }

        .alert-success {
            border-color: rgba(25, 135, 84, .25);
            color: #0f5132;
            background: rgba(25, 135, 84, .08)
        }

        .alert-link-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 8px;
            padding: 7px 16px;
            border-radius: 8px;
            background: var(--success);
            color: #ffffff !important;
            font-size: .74rem;
            font-weight: 600;
            text-decoration: none !important;
            box-shadow: 0 4px 12px rgba(25, 135, 84, .25);
            transition: opacity .18s ease, transform .18s ease
        }

        .alert-link-btn:hover {
            opacity: .95;
            transform: translateY(-1px)
        }

        .form-stack {
            display: grid;
            gap: 17px
        }

        .field-control {
            position: relative
        }

        .field-icon {
            position: absolute;
            z-index: 2;
            left: 16px;
            top: 20px;
            width: 18px;
            height: 18px;
            display: block;
            border: 0;
            border-radius: 0;
            color: #9193a7;
            background: transparent
        }

        .field-icon svg {
            width: 18px;
            height: 18px
        }

        .field input {
            width: 100%;
            height: 58px;
            padding: 22px 46px 7px;
            border: 1px solid var(--border);
            border-radius: 10px;
            outline: 0;
            color: var(--title);
            background: var(--surface);
            font-size: .82rem;
            font-weight: 500;
            transition: border-color .18s ease, box-shadow .18s ease, background-color .18s ease
        }

        .field input::placeholder {
            color: transparent
        }

        .field label {
            position: absolute;
            z-index: 1;
            left: 46px;
            top: 18px;
            color: #858798;
            font-size: .77rem;
            font-weight: 500;
            pointer-events: none;
            transform-origin: left top;
            transition: transform .16s ease, color .16s ease
        }

        .field input:focus {
            border-color: #7c7bd0;
            background: #fdfdff;
            box-shadow: 0 0 0 3px rgba(55, 54, 175, .12)
        }

        .field-control:focus-within .field-icon {
            color: var(--primary);
            background: transparent;
            border: 0
        }

        .field input:focus+label,
        .field input:not(:placeholder-shown)+label {
            color: var(--primary);
            transform: translateY(-9px) scale(.78)
        }

        .field.has-error input {
            border-color: rgba(217, 63, 76, .66)
        }

        .field-message {
            display: block;
            margin: 5px 3px 0;
            color: var(--danger);
            font-size: .67rem;
            line-height: 1.4
        }

        .field-status {
            position: absolute;
            right: 18px;
            top: 19px;
            width: 20px;
            height: 20px;
            display: none;
            color: var(--success)
        }

        .field input:not(:placeholder-shown):valid~.field-status {
            display: block
        }

        .field-hint {
            margin: 6px 3px 0;
            color: var(--muted);
            font-size: .72rem;
            line-height: 1.5
        }

        .submit-button {
            width: 100%;
            min-height: 54px;
            margin-top: 6px;
            padding: 14px 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: 1px solid rgba(18, 18, 58, .08);
            border-radius: 10px;
            color: #f8f8ff;
            background: linear-gradient(105deg, var(--primary), var(--primary-hover));
            box-shadow: 0 10px 24px rgba(55, 54, 175, .26);
            font-size: .83rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform .18s cubic-bezier(.22, 1, .36, 1), box-shadow .18s ease, filter .18s ease
        }

        .submit-button:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(55, 54, 175, .32);
            filter: brightness(1.04)
        }

        .submit-button:focus-visible {
            outline: 3px solid rgba(55, 54, 175, .22);
            outline-offset: 3px
        }

        .submit-button:disabled {
            cursor: not-allowed;
            opacity: .68;
            box-shadow: none
        }

        .submit-button svg {
            width: 18px;
            height: 18px
        }

        .button-spinner {
            display: none;
            width: 17px;
            height: 17px;
            border: 2px solid rgba(255, 255, 255, .38);
            border-top-color: #f8f8ff;
            border-radius: 50%;
            animation: spin .7s linear infinite
        }

        .submit-button.is-loading .button-icon {
            display: none
        }

        .submit-button.is-loading .button-spinner {
            display: block
        }

        .register-section {
            margin-top: 22px;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: center;
            justify-content: center;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: .74rem
        }

        .register-section .nav-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            flex-wrap: wrap
        }

        .register-section a {
            color: var(--primary);
            font-size: .74rem;
            font-weight: 600;
            text-decoration: none
        }

        .register-section a:hover {
            text-decoration: underline;
            text-underline-offset: 3px
        }

        @keyframes spin {
            to {
                transform: rotate(360deg)
            }
        }

        @media(max-width:1060px) {
            .auth-shell {
                grid-template-columns: minmax(330px, .72fr) minmax(500px, 1.28fr)
            }

            .brand-panel {
                padding: 34px
            }

            .brand-content h1 {
                font-size: 2.35rem
            }

            .trust-grid {
                grid-template-columns: 1fr
            }
        }

        @media(max-width:860px) {
            .auth-shell {
                display: block
            }

            .brand-panel {
                min-height: auto;
                padding: 24px 28px 74px
            }

            .brand-content {
                margin: 0;
                padding: 44px 0 0;
                text-align: center
            }

            .brand-content h1,
            .brand-summary {
                margin-left: auto;
                margin-right: auto
            }

            .eyebrow {
                justify-content: center
            }

            .network-visual,
            .trust-grid,
            .secure-note {
                display: none
            }

            .login-panel {
                min-height: auto;
                position: relative;
                z-index: 2;
                margin-top: -38px;
                padding: 0 20px 40px;
                background: transparent
            }

            .login-card {
                max-width: 660px;
                margin: auto
            }
        }

        @media(max-width:560px) {
            .brand-panel {
                padding: 21px 20px 66px
            }

            .brand-mark img {
                width: 36px;
                height: 36px
            }

            .brand-name {
                font-size: 1.1rem
            }

            .brand-content {
                padding-top: 34px
            }

            .brand-content h1 {
                font-size: 2rem
            }

            .brand-summary {
                margin-top: 15px;
                font-size: .82rem;
                line-height: 1.65
            }

            .login-panel {
                padding: 0 12px 28px
            }

            .login-card {
                padding: 24px 18px 25px;
                border-radius: 14px
            }

            .card-header:after {
                display: none
            }

            .field input {
                height: 56px
            }

            .field-icon {
                top: 19px
            }

            .submit-button {
                min-height: 52px
            }
        }

        @media(prefers-reduced-motion:reduce) {

            *,
            *:before,
            *:after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important
            }
        }
    </style>
</head>

<body>
    <div class="auth-background" aria-hidden="true">
        <span class="orb orb-one"></span>
        <span class="orb orb-two"></span>
        <span class="grid-glow"></span>
    </div>

    <main class="auth-shell">
        <section class="brand-panel" aria-labelledby="welcome-title">
            <a href="{{ url('/') }}" class="brand-logo" aria-label="Liberfx home">
                <span class="brand-mark"><img src="{{ asset('logo/logo-icon.png') }}" alt=""></span>
                <span class="brand-name">Liberfx</span>
            </a>

            <div class="brand-content">
                <p class="eyebrow">Password recovery</p>
                <h1 id="welcome-title">Restore access to your account securely.</h1>
                <p class="brand-summary">Enter your registered Member ID to receive your account credentials directly to
                    your verified email address.</p>

                <div class="network-visual" aria-hidden="true">
                    <div class="visual-toolbar"><i></i><i></i><i></i><span>Security verification</span></div>
                    <div class="visual-body">
                        <div class="visual-chart"><i></i><i></i><i></i><i></i><i></i><i></i></div>
                        <div class="visual-security">
                            <span class="visual-shield">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M12 3 5 6v5c0 4.8 2.8 8.2 7 10 4.2-1.8 7-5.2 7-10V6l-7-3Z"></path>
                                    <path d="m9 12 2 2 4-4"></path>
                                </svg>
                            </span>
                            <b>Protected access</b>
                            <small>Member recovery</small>
                        </div>
                    </div>
                </div>

                <div class="trust-grid" aria-label="Platform benefits">
                    @foreach (['Instant password dispatch', 'Secure credential reset', 'Verified email delivery', 'Protected member records', 'Mobile-friendly recovery', 'Enterprise security'] as $benefit)
                        <div class="trust-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                aria-hidden="true">
                                <circle cx="12" cy="12" r="9"></circle>
                                <path d="m8 12 2.6 2.6L16.5 9"></path>
                            </svg>
                            <span>{{ $benefit }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="secure-note">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M12 3 5 6v5c0 4.8 2.8 8.2 7 10 4.2-1.8 7-5.2 7-10V6l-7-3Z"></path>
                    <path d="m9 12 2 2 4-4"></path>
                </svg>
                <span>Password resets are processed over a secure, encrypted connection.</span>
            </div>
        </section>

        <section class="login-panel" aria-labelledby="forgot-title">
            <div class="login-card">
                <div class="card-header">
                    <span class="security-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M12 3 5 6v5c0 4.8 2.8 8.2 7 10 4.2-1.8 7-5.2 7-10V6l-7-3Z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </span>
                    <div>
                        <h2 id="forgot-title">Forgot password?</h2>
                        <p>Enter your Member ID to receive your account password.</p>
                    </div>
                </div>

                @if (session('forgetPassErr'))
                    <div class="alert" role="alert">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            aria-hidden="true">
                            <circle cx="12" cy="12" r="9"></circle>
                            <path d="M12 8v5M12 16.5v.5"></path>
                        </svg>
                        <span>{{ session('forgetPassErr') }}</span>
                    </div>
                @endif

                @if (session('forgetPass'))
                    <div class="alert alert-success" role="alert">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            aria-hidden="true">
                            <circle cx="12" cy="12" r="9"></circle>
                            <path d="m8 12 2.6 2.6L16.5 9"></path>
                        </svg>
                        <div>
                            <span>{{ session('forgetPass') }}</span>
                            <div>
                                <a href="{{ url('/member') }}" class="alert-link-btn">
                                    <svg style="width:14px;height:14px;" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5">
                                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3">
                                        </path>
                                    </svg>
                                    Sign in now
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('retrivePassword') }}" id="forgotForm" novalidate>
                    @csrf
                    <div class="form-stack">
                        <div class="field @error('memberid') has-error @enderror">
                            <div class="field-control">
                                <span class="field-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                        aria-hidden="true">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </span>
                                <input type="text" name="memberid" id="memberid" value="{{ old('memberid') }}"
                                    placeholder="Member ID" autocomplete="username" required autofocus
                                    @error('memberid') aria-invalid="true" aria-describedby="memberidError" @enderror>
                                <label for="memberid">Member ID</label>
                                <span class="field-status" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="m7 12 3 3 7-7"></path>
                                    </svg>
                                </span>
                            </div>
                            <p class="field-hint">Your password will be sent to your registered email ID.</p>
                            @error('memberid')
                                <span id="memberidError" class="field-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="submit-button" id="submitButton">
                            <span class="button-spinner" aria-hidden="true"></span>
                            <svg class="button-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <path d="m22 2-7 20-4-9-9-4Z"></path>
                                <path d="M22 2 11 13"></path>
                            </svg>
                            <span class="button-label">Retrieve password</span>
                        </button>
                    </div>
                </form>

                <div class="register-section">
                    <div class="nav-item">
                        <span>Remembered your password?</span>
                        <a href="{{ url('/member') }}">Sign in here</a>
                    </div>
                    <div class="nav-item">
                        <span>New to Liberfx?</span>
                        <a href="{{ url('/member/register/1') }}">Create an account</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        (function() {
            const form = document.getElementById('forgotForm');
            const submitButton = document.getElementById('submitButton');

            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    form.reportValidity();
                    return;
                }

                submitButton.disabled = true;
                submitButton.classList.add('is-loading');
                submitButton.querySelector('.button-label').textContent = 'Processing request...';
            });
        })();
    </script>
</body>

</html>
