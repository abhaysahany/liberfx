<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#12123a">
    <title>Create Account | {{ config('detailsApp.name') }}</title>
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
            --secondary: #3693ff;
            --title: #424562;
            --text: #717579;
            --muted: #737b8b;
            --surface: #fdfdff;
            --surface-soft: #f5f5fa;
            --border: #e6e6ee;
            --success: #198754;
            --danger: #d93f4c;
            --shadow: 0 24px 64px rgba(18, 18, 58, .14);
        }

        * { box-sizing: border-box; }

        html { color-scheme: light; }

        body {
            margin: 0;
            min-width: 320px;
            min-height: 100vh;
            font-family: "Poppins", sans-serif;
            color: var(--text);
            background: var(--surface-soft);
            -webkit-font-smoothing: antialiased;
        }

        button, input, select { font: inherit; }
        button, a { -webkit-tap-highlight-color: transparent; }

        .signup-shell {
            width: 100%;
            min-height: 100vh;
            display: grid;
            grid-template-columns: minmax(390px, .88fr) minmax(560px, 1.12fr);
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
            background: var(--primary-dark);
        }

        .brand-panel::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -2;
            background: linear-gradient(145deg, rgba(55, 54, 175, .88), rgba(18, 18, 58, .92)),
                        url("{{ asset('uassets/images/bg-1.png') }}") center / cover no-repeat;
        }

        .brand-panel::after {
            content: "";
            position: absolute;
            width: 380px;
            height: 380px;
            right: -210px;
            bottom: -180px;
            z-index: -1;
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 50%;
            box-shadow: 0 0 0 64px rgba(255, 255, 255, .025), 0 0 0 128px rgba(255, 255, 255, .02);
        }

        .brand-logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            width: fit-content;
            color: inherit;
            text-decoration: none;
        }

        .brand-logo img { width: 44px; height: 44px; object-fit: contain; }
        .brand-logo span { font-size: 1.35rem; font-weight: 600; letter-spacing: -.025em; }

        .brand-copy { max-width: 560px; margin: auto 0; padding: 48px 0 40px; }

        .eyebrow {
            display: flex;
            align-items: center;
            gap: 9px;
            margin: 0 0 18px;
            color: rgba(248, 248, 255, .72);
            font-size: .75rem;
            font-weight: 600;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .eyebrow::before { content: ""; width: 24px; height: 2px; border-radius: 2px; background: #aaa9ff; }

        .brand-copy h1 {
            max-width: 520px;
            margin: 0;
            color: #f8f8ff;
            font-size: clamp(2.2rem, 4vw, 3.8rem);
            line-height: 1.08;
            letter-spacing: -.045em;
        }

        .brand-copy > p:not(.eyebrow) {
            max-width: 540px;
            margin: 22px 0 0;
            color: rgba(248, 248, 255, .72);
            font-size: .98rem;
            line-height: 1.8;
        }

        .platform-visual {
            position: relative;
            max-width: 530px;
            margin: 34px 0 30px;
            padding: 18px;
            border: 1px solid rgba(255, 255, 255, .13);
            border-radius: 16px;
            background: rgba(18, 18, 58, .58);
            box-shadow: 0 24px 50px rgba(4, 4, 25, .28);
        }

        .visual-top { display: flex; align-items: center; gap: 6px; margin-bottom: 17px; }
        .visual-top i { width: 7px; height: 7px; border-radius: 50%; background: rgba(255, 255, 255, .24); }
        .visual-top span { margin-left: auto; color: rgba(255, 255, 255, .45); font-size: .65rem; }
        .visual-grid { display: grid; grid-template-columns: 1.3fr .8fr; gap: 11px; }
        .visual-chart, .visual-metric { border: 1px solid rgba(255, 255, 255, .08); border-radius: 10px; background: rgba(255, 255, 255, .055); }
        .visual-chart { height: 118px; padding: 17px; display: flex; align-items: flex-end; gap: 8px; }
        .visual-chart i { flex: 1; min-height: 14px; border-radius: 3px 3px 1px 1px; background: #aaa9ff; opacity: .85; }
        .visual-chart i:nth-child(1) { height: 30%; } .visual-chart i:nth-child(2) { height: 52%; }
        .visual-chart i:nth-child(3) { height: 41%; } .visual-chart i:nth-child(4) { height: 72%; }
        .visual-chart i:nth-child(5) { height: 64%; } .visual-chart i:nth-child(6) { height: 88%; }
        .visual-metric { padding: 17px; display: flex; flex-direction: column; justify-content: center; }
        .visual-metric b { color: #f8f8ff; font-size: 1.45rem; }
        .visual-metric small { margin-top: 5px; color: rgba(255, 255, 255, .48); }

        .benefits { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 13px 18px; }
        .benefit { display: flex; align-items: center; gap: 10px; color: rgba(248, 248, 255, .82); font-size: .79rem; font-weight: 500; }
        .benefit svg { flex: 0 0 auto; width: 18px; height: 18px; color: #aaa9ff; }

        .security-note {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: auto;
            color: rgba(248, 248, 255, .58);
            font-size: .72rem;
        }

        .security-note svg { width: 16px; height: 16px; color: #aaa9ff; }

        .form-panel {
            min-height: 100vh;
            padding: clamp(28px, 5vw, 76px);
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--surface-soft);
        }

        .registration-card {
            width: min(100%, 760px);
            padding: clamp(26px, 4vw, 48px);
            border: 1px solid rgba(55, 54, 175, .1);
            border-radius: 18px;
            background: rgba(253, 253, 255, .96);
            box-shadow: var(--shadow);
        }

        .mobile-logo { display: none; }
        .card-heading { display: flex; justify-content: space-between; gap: 24px; align-items: flex-start; margin-bottom: 28px; }
        .card-heading h2 { margin: 0; color: var(--title); font-size: clamp(1.65rem, 2.5vw, 2.15rem); line-height: 1.2; letter-spacing: -.035em; }
        .card-heading p { margin: 8px 0 0; color: var(--muted); font-size: .83rem; line-height: 1.65; }
        .step-badge { flex: 0 0 auto; padding: 7px 11px; border-radius: 999px; color: var(--primary); background: var(--primary-soft); font-size: .67rem; font-weight: 600; letter-spacing: .04em; }

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
            line-height: 1.55;
        }

        .alert svg { flex: 0 0 auto; width: 17px; height: 17px; margin-top: 1px; }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px 16px; }
        .field-full { grid-column: 1 / -1; }
        .field { min-width: 0; }
        .field-control { position: relative; }

        .field-control > svg {
            position: absolute;
            z-index: 2;
            left: 16px;
            top: 20px;
            width: 18px;
            height: 18px;
            color: #9193a7;
            pointer-events: none;
            transition: color .18s ease;
        }

        .field input, .field select {
            width: 100%;
            height: 58px;
            padding: 22px 44px 7px 46px;
            border: 1px solid var(--border);
            border-radius: 10px;
            outline: 0;
            color: var(--title);
            background: var(--surface);
            font-size: .82rem;
            font-weight: 500;
            transition: border-color .18s ease, box-shadow .18s ease, background-color .18s ease;
        }

        .field select { padding-top: 27px; padding-bottom: 4px; cursor: pointer; appearance: none; }
        .field input::placeholder { color: transparent; }

        .field label {
            position: absolute;
            z-index: 1;
            left: 46px;
            top: 18px;
            max-width: calc(100% - 90px);
            overflow: hidden;
            color: #858798;
            font-size: .77rem;
            font-weight: 500;
            text-overflow: ellipsis;
            white-space: nowrap;
            pointer-events: none;
            transform-origin: left top;
            transition: transform .16s ease, color .16s ease;
        }

        .field input:focus, .field select:focus {
            border-color: #7c7bd0;
            background: #fdfdff;
            box-shadow: 0 0 0 3px rgba(55, 54, 175, .12);
        }

        .field-control:focus-within > svg { color: var(--primary); }
        .field input:focus + label, .field input:not(:placeholder-shown) + label { color: var(--primary); transform: translateY(-9px) scale(.78); }
        .field.has-value label, .field select ~ label { color: var(--primary); transform: translateY(-11px) scale(.72); }
        .field.has-error input, .field.has-error select { border-color: rgba(217, 63, 76, .66); }
        .field.has-error .field-control > svg { color: var(--danger); }
        .field.is-success input { border-color: rgba(25, 135, 84, .55); }

        .field-message { display: block; min-height: 18px; margin: 5px 3px 0; color: var(--danger); font-size: .67rem; line-height: 1.4; }
        #sponhtml { color: var(--muted); }
        #sponhtml .text-success { color: var(--success) !important; }

        .select-arrow {
            position: absolute;
            right: 17px;
            top: 23px;
            width: 7px;
            height: 7px;
            border-right: 1.5px solid #858798;
            border-bottom: 1.5px solid #858798;
            transform: rotate(45deg);
            pointer-events: none;
        }

        .password-toggle {
            position: absolute;
            z-index: 3;
            right: 8px;
            top: 9px;
            width: 40px;
            height: 40px;
            display: grid;
            place-items: center;
            border: 0;
            border-radius: 8px;
            color: #858798;
            background: transparent;
            cursor: pointer;
        }

        .password-toggle:hover { color: var(--primary); background: var(--primary-soft); }
        .password-toggle:focus-visible { outline: 3px solid rgba(55, 54, 175, .2); }
        .password-toggle svg { width: 18px; height: 18px; }

        .terms-row { display: flex; align-items: flex-start; gap: 10px; margin-top: 20px; }
        .terms-row input { width: 18px; height: 18px; margin: 1px 0 0; accent-color: var(--primary); cursor: pointer; }
        .terms-row label { color: var(--muted); font-size: .74rem; line-height: 1.55; cursor: pointer; }
        .terms-row a, .signin-row a { color: var(--primary); font-weight: 600; text-decoration: none; }
        .terms-row a:hover, .signin-row a:hover { text-decoration: underline; text-underline-offset: 3px; }

        .submit-button {
            position: relative;
            width: 100%;
            min-height: 54px;
            margin-top: 22px;
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
            transition: transform .18s cubic-bezier(.22, 1, .36, 1), box-shadow .18s ease, filter .18s ease;
        }

        .submit-button:hover:not(:disabled) { transform: translateY(-2px); box-shadow: 0 14px 28px rgba(55, 54, 175, .32); filter: brightness(1.04); }
        .submit-button:active:not(:disabled) { transform: translateY(0); }
        .submit-button:focus-visible { outline: 3px solid rgba(55, 54, 175, .22); outline-offset: 3px; }
        .submit-button:disabled { cursor: not-allowed; opacity: .68; box-shadow: none; }
        .submit-button svg { width: 18px; height: 18px; }
        .button-spinner { display: none; width: 17px; height: 17px; border: 2px solid rgba(255, 255, 255, .38); border-top-color: #f8f8ff; border-radius: 50%; animation: spin .7s linear infinite; }
        .submit-button.is-loading .button-icon { display: none; }
        .submit-button.is-loading .button-spinner { display: block; }

        .signin-row { margin: 20px 0 0; text-align: center; color: var(--muted); font-size: .74rem; }

        @keyframes spin { to { transform: rotate(360deg); } }

        @media (max-width: 1060px) {
            .signup-shell { grid-template-columns: minmax(330px, .72fr) minmax(520px, 1.28fr); }
            .brand-panel { padding: 34px; }
            .brand-copy h1 { font-size: 2.35rem; }
            .platform-visual { margin-top: 28px; }
            .benefits { grid-template-columns: 1fr; }
        }

        @media (max-width: 860px) {
            .signup-shell { display: block; }
            .brand-panel { min-height: auto; padding: 24px 28px 74px; }
            .brand-copy { margin: 0; padding: 44px 0 0; text-align: center; }
            .brand-copy h1, .brand-copy > p:not(.eyebrow) { margin-left: auto; margin-right: auto; }
            .eyebrow { justify-content: center; }
            .platform-visual, .benefits, .security-note { display: none; }
            .form-panel { min-height: auto; margin-top: -38px; padding: 0 20px 40px; background: transparent; position: relative; z-index: 2; }
            body { background: var(--surface-soft); }
            .registration-card { max-width: 700px; }
        }

        @media (max-width: 560px) {
            .brand-panel { padding: 21px 20px 66px; }
            .brand-logo img { width: 36px; height: 36px; }
            .brand-logo span { font-size: 1.1rem; }
            .brand-copy { padding-top: 34px; }
            .brand-copy h1 { font-size: 2rem; }
            .brand-copy > p:not(.eyebrow) { margin-top: 15px; font-size: .82rem; line-height: 1.65; }
            .form-panel { padding: 0 12px 28px; }
            .registration-card { padding: 24px 18px 25px; border-radius: 14px; }
            .card-heading { margin-bottom: 23px; }
            .step-badge { display: none; }
            .form-grid { grid-template-columns: 1fr; gap: 15px; }
            .field-full { grid-column: auto; }
            .field input, .field select { height: 56px; }
            .field-control > svg { top: 19px; }
            .submit-button { min-height: 52px; }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { scroll-behavior: auto !important; animation-duration: .01ms !important; animation-iteration-count: 1 !important; transition-duration: .01ms !important; }
        }
    </style>
</head>
<body>
    <main class="signup-shell">
        <section class="brand-panel" aria-labelledby="welcome-title">
            <a href="{{ url('/') }}" class="brand-logo" aria-label="Liberfx home">
                <img src="{{ asset('logo/logo-icon.png') }}" alt="">
                <span>Liberfx</span>
            </a>

            <div class="brand-copy">
                <p class="eyebrow">Member registration</p>
                <h1 id="welcome-title">Your network. Your progress. One secure workspace.</h1>
                <p>Join the Liberfx member ecosystem and manage your account, activity, and growing team from one professional dashboard.</p>

                <div class="platform-visual" aria-hidden="true">
                    <div class="visual-top"><i></i><i></i><i></i><span>Member overview</span></div>
                    <div class="visual-grid">
                        <div class="visual-chart"><i></i><i></i><i></i><i></i><i></i><i></i></div>
                        <div class="visual-metric"><b>24/7</b><small>Account access</small></div>
                    </div>
                </div>

                <div class="benefits" aria-label="Platform highlights">
                    @foreach (['Secure registration', 'Fast account activation', 'Real-time dashboard', 'Instant team tracking'] as $benefit)
                        <div class="benefit">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="m8 12 2.6 2.6L16.5 9"></path></svg>
                            <span>{{ $benefit }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="security-note">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 3 5 6v5c0 4.8 2.8 8.2 7 10 4.2-1.8 7-5.2 7-10V6l-7-3Z"></path><path d="m9 12 2 2 4-4"></path></svg>
                <span>Your information is submitted over a secure, protected connection.</span>
            </div>
        </section>

        <section class="form-panel" aria-labelledby="registration-title">
            <div class="registration-card">
                <div class="card-heading">
                    <div>
                        <h2 id="registration-title">Create your account</h2>
                        <p>Enter your member details to get started with Liberfx.</p>
                    </div>
                    <span class="step-badge">Secure signup</span>
                </div>

                @if (session('signupmsg'))
                    <div class="alert" role="alert">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M12 8v5M12 16.5v.5"></path></svg>
                        <span>{{ session('signupmsg') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('userRegister') }}" id="signupForm" novalidate>
                    @csrf
                    <div class="form-grid">
                        <div class="field field-full @error('sponsor') has-error @enderror" id="sponsorField">
                            <div class="field-control">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="9" cy="8" r="3"></circle><path d="M3.8 19c.4-3.4 2.2-5 5.2-5s4.8 1.6 5.2 5M16 8h5M18.5 5.5v5"></path></svg>
                                <input type="text" name="sponsor" id="sponsor" minlength="9" maxlength="9" value="{{ old('sponsor', $sdata != '1' ? $sdata : '') }}" placeholder="Sponsor ID" autocomplete="off" required aria-describedby="sponhtml sponsorError" @error('sponsor') aria-invalid="true" @enderror>
                                <label for="sponsor">Sponsor ID</label>
                            </div>
                            <span id="sponhtml" class="field-message" role="status" aria-live="polite"></span>
                            @error('sponsor')<span id="sponsorError" class="field-message">{{ $message }}</span>@enderror
                        </div>

                        <div class="field @error('first_name') has-error @enderror">
                            <div class="field-control">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="8" r="3.5"></circle><path d="M5 20c.5-4.1 2.8-6 7-6s6.5 1.9 7 6"></path></svg>
                                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="First name" autocomplete="given-name" required @error('first_name') aria-invalid="true" aria-describedby="firstNameError" @enderror>
                                <label for="first_name">First name</label>
                            </div>
                            @error('first_name')<span id="firstNameError" class="field-message">{{ $message }}</span>@enderror
                        </div>

                        <div class="field @error('last_name') has-error @enderror">
                            <div class="field-control">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="8" r="3.5"></circle><path d="M5 20c.5-4.1 2.8-6 7-6s6.5 1.9 7 6"></path></svg>
                                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Last name" autocomplete="family-name" required @error('last_name') aria-invalid="true" aria-describedby="lastNameError" @enderror>
                                <label for="last_name">Last name</label>
                            </div>
                            @error('last_name')<span id="lastNameError" class="field-message">{{ $message }}</span>@enderror
                        </div>

                        <div class="field @error('email') has-error @enderror">
                            <div class="field-control">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m4 7 8 6 8-6"></path></svg>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email address" autocomplete="email" inputmode="email" required @error('email') aria-invalid="true" aria-describedby="emailError" @enderror>
                                <label for="email">Email address</label>
                            </div>
                            @error('email')<span id="emailError" class="field-message">{{ $message }}</span>@enderror
                        </div>

                        <div class="field @error('mobile') has-error @enderror">
                            <div class="field-control">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="7" y="2.5" width="10" height="19" rx="2"></rect><path d="M10 5h4M11 18.5h2"></path></svg>
                                <input type="tel" name="mobile" id="mobile" value="{{ old('mobile') }}" placeholder="Mobile number" autocomplete="tel-national" inputmode="numeric" pattern="[0-9]{10}" minlength="10" maxlength="10" required @error('mobile') aria-invalid="true" aria-describedby="mobileError" @enderror>
                                <label for="mobile">Mobile number</label>
                            </div>
                            @error('mobile')<span id="mobileError" class="field-message">{{ $message }}</span>@enderror
                        </div>

                        <div class="field field-full has-value @error('country') has-error @enderror" id="countryField">
                            <div class="field-control">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M3 12h18M12 3c2.5 2.6 3.7 5.6 3.7 9s-1.2 6.4-3.7 9c-2.5-2.6-3.7-5.6-3.7-9S9.5 5.6 12 3Z"></path></svg>
                                <select name="country" id="country" required @error('country') aria-invalid="true" aria-describedby="countryError" @enderror>
                                    <option value="">Select country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country['name'] }}" @selected(old('country') == $country['name'])>({{ $country['phonecode'] }}) {{ $country['name'] }}</option>
                                    @endforeach
                                </select>
                                <label for="country">Country and calling code</label>
                                <span class="select-arrow" aria-hidden="true"></span>
                            </div>
                            @error('country')<span id="countryError" class="field-message">{{ $message }}</span>@enderror
                        </div>

                        <div class="field field-full @error('password') has-error @enderror">
                            <div class="field-control">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="4" y="10" width="16" height="11" rx="2"></rect><path d="M8 10V7a4 4 0 0 1 8 0v3M12 14v3"></path></svg>
                                <input type="password" name="password" id="password" placeholder="Password" autocomplete="new-password" required @error('password') aria-invalid="true" aria-describedby="passwordError" @enderror>
                                <label for="password">Password</label>
                                <button type="button" class="password-toggle" id="passwordToggle" aria-label="Show password" aria-pressed="false">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"></path><circle cx="12" cy="12" r="2.5"></circle></svg>
                                </button>
                            </div>
                            @error('password')<span id="passwordError" class="field-message">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="terms-row">
                        <input type="checkbox" name="terms" id="terms" value="1" required>
                        <label for="terms">I agree to the <a href="{{ url('/terms-&-condition') }}" target="_blank" rel="noopener">Terms &amp; Conditions</a> and acknowledge the platform policies.</label>
                    </div>

                    <button type="submit" class="submit-button" id="submitButton">
                        <span class="button-spinner" aria-hidden="true"></span>
                        <svg class="button-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12.5 9.2 17 19 7"></path></svg>
                        <span class="button-label">Create secure account</span>
                    </button>
                </form>

                <p class="signin-row">Already a member? <a href="{{ url('/member') }}">Sign in to your account</a></p>
            </div>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        (function () {
            const form = document.getElementById('signupForm');
            const submitButton = document.getElementById('submitButton');
            const password = document.getElementById('password');
            const passwordToggle = document.getElementById('passwordToggle');
            const country = document.getElementById('country');
            const countryField = document.getElementById('countryField');

            function syncCountryLabel() {
                countryField.classList.toggle('has-value', country.value !== '');
            }

            syncCountryLabel();
            country.addEventListener('change', syncCountryLabel);

            passwordToggle.addEventListener('click', function () {
                const showPassword = password.type === 'password';
                password.type = showPassword ? 'text' : 'password';
                this.setAttribute('aria-pressed', String(showPassword));
                this.setAttribute('aria-label', showPassword ? 'Hide password' : 'Show password');
            });

            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    form.reportValidity();
                    return;
                }

                submitButton.disabled = true;
                submitButton.classList.add('is-loading');
                submitButton.querySelector('.button-label').textContent = 'Creating your account...';
            });

            let sponsorRequest;
            $('#sponsor').on('input', function () {
                const sponsor = this.value.trim();
                const $message = $('#sponhtml');
                const sponsorField = document.getElementById('sponsorField');

                sponsorField.classList.remove('is-success');
                if (sponsor.length === 0) {
                    $message.empty();
                    return;
                }

                if (sponsorRequest) sponsorRequest.abort();
                if (sponsor.length !== 9) {
                    $message.text('Sponsor ID must contain 9 characters.');
                    return;
                }

                $message.text('Checking sponsor...');
                sponsorRequest = $.ajax({
                    url: '/getSponname',
                    type: 'POST',
                    data: {
                        sponsorid: sponsor,
                        _token: $('input[name=_token]').val()
                    },
                    success: function (response) {
                        $message.html(response.data || '');
                        sponsorField.classList.toggle('is-success', $message.find('.text-success').length > 0);
                    },
                    error: function (xhr, status) {
                        if (status !== 'abort') $message.text('Sponsor could not be verified. Please try again.');
                    }
                });
            });
        })();
    </script>
</body>
</html>
