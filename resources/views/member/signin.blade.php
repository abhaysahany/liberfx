<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#12123a">
    <title>Sign In | {{ config('detailsApp.name') }}</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logo/favicon/favicon-32x32.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{--primary:#3736af;--primary-hover:#2b2a88;--primary-dark:#12123a;--primary-soft:#eeedff;--title:#424562;--text:#717579;--muted:#737b8b;--surface:#fdfdff;--surface-soft:#f5f5fa;--border:#e6e6ee;--success:#198754;--danger:#d93f4c;--shadow:0 24px 64px rgba(18,18,58,.14)}
        *{box-sizing:border-box}html{color-scheme:light}body{margin:0;min-width:320px;min-height:100vh;font-family:"Poppins",sans-serif;color:var(--text);background:var(--surface-soft);-webkit-font-smoothing:antialiased}button,input{font:inherit}button,a{-webkit-tap-highlight-color:transparent}.auth-background{display:none}
        .auth-shell{width:100%;min-height:100vh;display:grid;grid-template-columns:minmax(390px,.88fr) minmax(520px,1.12fr);gap:0;padding:0;margin:0}
        .brand-panel{position:relative;isolation:isolate;overflow:hidden;min-height:100vh;padding:clamp(32px,4vw,64px);display:flex;flex-direction:column;color:#f8f8ff;background:var(--primary-dark)}
        .brand-panel:before{content:"";position:absolute;inset:0;z-index:-2;background:linear-gradient(145deg,rgba(55,54,175,.88),rgba(18,18,58,.92)),url("{{ asset('uassets/images/bg-1.png') }}") center/cover no-repeat}
        .brand-panel:after{content:"";position:absolute;z-index:-1;width:380px;height:380px;right:-210px;bottom:-180px;border:1px solid rgba(255,255,255,.12);border-radius:50%;box-shadow:0 0 0 64px rgba(255,255,255,.025),0 0 0 128px rgba(255,255,255,.02)}
        .brand-logo{display:inline-flex;align-items:center;gap:12px;width:fit-content;color:inherit;text-decoration:none}.brand-mark{width:auto;height:auto;display:block;border:0;border-radius:0;background:transparent;box-shadow:none}.brand-mark img{width:44px;height:44px;object-fit:contain}.brand-name{font-size:1.35rem;font-weight:600;letter-spacing:-.025em}
        .brand-content{max-width:560px;margin:auto 0;padding:48px 0 40px}.eyebrow{display:flex;align-items:center;gap:9px;margin:0 0 18px;color:rgba(248,248,255,.72);font-size:.75rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase}.eyebrow:before{content:"";width:24px;height:2px;border-radius:2px;background:#aaa9ff}
        .brand-content h1{max-width:540px;margin:0;color:#f8f8ff;font-size:clamp(2.2rem,4vw,3.8rem);font-weight:700;line-height:1.08;letter-spacing:-.045em}.brand-summary{max-width:540px;margin:22px 0 0;color:rgba(248,248,255,.72);font-size:.98rem;line-height:1.8}
        .network-visual{position:relative;max-width:530px;margin:34px 0 30px;padding:18px;border:1px solid rgba(255,255,255,.13);border-radius:16px;background:rgba(18,18,58,.58);box-shadow:0 24px 50px rgba(4,4,25,.28)}.visual-toolbar{display:flex;align-items:center;gap:6px;margin-bottom:17px}.visual-toolbar i{width:7px;height:7px;border-radius:50%;background:rgba(255,255,255,.24)}.visual-toolbar span{margin-left:auto;color:rgba(255,255,255,.45);font-size:.65rem}.visual-body{display:grid;grid-template-columns:1.3fr .8fr;gap:11px}.visual-chart,.visual-security{border:1px solid rgba(255,255,255,.08);border-radius:10px;background:rgba(255,255,255,.055)}.visual-chart{height:118px;padding:17px;display:flex;align-items:flex-end;gap:8px}.visual-chart i{flex:1;min-height:14px;border-radius:3px 3px 1px 1px;background:#aaa9ff;opacity:.85}.visual-chart i:nth-child(1){height:30%}.visual-chart i:nth-child(2){height:52%}.visual-chart i:nth-child(3){height:41%}.visual-chart i:nth-child(4){height:72%}.visual-chart i:nth-child(5){height:64%}.visual-chart i:nth-child(6){height:88%}.visual-security{padding:17px;display:flex;flex-direction:column;justify-content:center}.visual-shield{width:auto;height:auto;margin:0 0 12px;display:block;border:0;border-radius:0;color:#aaa9ff;background:transparent}.visual-shield svg{width:27px;height:27px}.visual-security b{color:#f8f8ff;font-size:.78rem}.visual-security small{margin-top:5px;color:rgba(255,255,255,.48)}
        .trust-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:13px 18px}.trust-item{display:flex;align-items:center;gap:10px;color:rgba(248,248,255,.82);font-size:.79rem;font-weight:500}.trust-item svg{flex:0 0 auto;width:18px;height:18px;color:#aaa9ff}.secure-note{display:flex;align-items:center;gap:10px;margin-top:auto;color:rgba(248,248,255,.58);font-size:.72rem}.secure-note svg{width:16px;height:16px;color:#aaa9ff}
        .login-panel{min-height:100vh;padding:clamp(28px,5vw,76px);display:flex;align-items:center;justify-content:center;background:var(--surface-soft)}.login-card{position:relative;width:min(100%,620px);padding:clamp(26px,4vw,48px);overflow:visible;border:1px solid rgba(55,54,175,.1);border-radius:18px;background:rgba(253,253,255,.96);box-shadow:var(--shadow);backdrop-filter:none}.login-card:before{display:none}
        .card-header{position:relative;display:block;margin-bottom:28px;padding:0;border:0}.security-icon{display:none}.card-header:after{content:"Secure access";position:absolute;right:0;top:0;padding:7px 11px;border-radius:999px;color:var(--primary);background:var(--primary-soft);font-size:.67rem;font-weight:600;letter-spacing:.04em}.card-header h2{margin:0;color:var(--title);font-size:clamp(1.65rem,2.5vw,2.15rem);font-weight:700;line-height:1.2;letter-spacing:-.035em}.card-header p{margin:8px 0 0;color:var(--muted);font-size:.83rem;line-height:1.65}
        .alert{display:flex;align-items:flex-start;gap:10px;margin-bottom:20px;padding:12px 14px;border:1px solid rgba(217,63,76,.2);border-radius:10px;color:#a92d38;background:rgba(217,63,76,.07);font-size:.75rem;line-height:1.55}.alert svg{flex:0 0 auto;width:17px;height:17px;margin-top:1px}.form-stack{display:grid;gap:17px}.field-control{position:relative}.field-icon{position:absolute;z-index:2;left:16px;top:20px;width:18px;height:18px;display:block;border:0;border-radius:0;color:#9193a7;background:transparent}.field-icon svg{width:18px;height:18px}.field input{width:100%;height:58px;padding:22px 46px 7px;border:1px solid var(--border);border-radius:10px;outline:0;color:var(--title);background:var(--surface);font-size:.82rem;font-weight:500;transition:border-color .18s ease,box-shadow .18s ease,background-color .18s ease}.field input::placeholder{color:transparent}.field label{position:absolute;z-index:1;left:46px;top:18px;color:#858798;font-size:.77rem;font-weight:500;pointer-events:none;transform-origin:left top;transition:transform .16s ease,color .16s ease}.field input:focus{border-color:#7c7bd0;background:#fdfdff;box-shadow:0 0 0 3px rgba(55,54,175,.12)}.field-control:focus-within .field-icon{color:var(--primary);background:transparent;border:0}.field input:focus+label,.field input:not(:placeholder-shown)+label{color:var(--primary);transform:translateY(-9px) scale(.78)}.field.has-error input{border-color:rgba(217,63,76,.66)}.field-message{display:block;margin:5px 3px 0;color:var(--danger);font-size:.67rem;line-height:1.4}.field-status{position:absolute;right:18px;top:19px;width:20px;height:20px;display:none;color:var(--success)}.field input:not(:placeholder-shown):valid~.field-status{display:block}
        .password-toggle,.captcha-refresh{border:0;color:#858798;background:transparent;cursor:pointer;transition:color .18s ease,background-color .18s ease}.password-toggle{position:absolute;z-index:3;right:8px;top:9px;width:40px;height:40px;display:grid;place-items:center;border-radius:8px}.password-toggle svg,.captcha-refresh svg{width:18px;height:18px}.password-toggle:hover{color:var(--primary);background:var(--primary-soft)}.password-toggle:focus-visible,.captcha-refresh:focus-visible{outline:3px solid rgba(55,54,175,.2)}
        .captcha-section{margin-top:2px}.section-label{display:flex;align-items:center;gap:8px;margin:0 0 9px 2px;color:var(--title);font-size:.72rem;font-weight:600}.section-label svg{width:16px;height:16px;color:var(--primary)}.captcha-box{display:grid;grid-template-columns:auto minmax(90px,1fr) 42px;align-items:center;gap:10px;padding:10px;border:1px solid var(--border);border-radius:10px;background:#f8f8fc}.captcha-challenge{min-height:42px;padding:0 14px;display:flex;align-items:center;justify-content:center;border:0;border-radius:8px;color:var(--primary-dark);background:var(--primary-soft);font-size:1rem;font-weight:700;letter-spacing:.06em}.captcha-box input{width:100%;height:42px;padding:6px 10px;border:1px solid #dedef0;border-radius:8px;outline:0;color:var(--title);background:var(--surface);text-align:center;font-size:.86rem;font-weight:600;letter-spacing:.08em}.captcha-box input::placeholder{color:#a3a4b2}.captcha-box input:focus{border-color:#7c7bd0;box-shadow:0 0 0 3px rgba(55,54,175,.12)}.captcha-refresh{width:42px;height:42px;display:grid;place-items:center;border:1px solid #dedef0;border-radius:8px;color:var(--primary);background:var(--surface)}.captcha-refresh:hover{color:var(--primary-hover);border-color:#c9c8eb;background:var(--primary-soft)}
        .form-options{display:flex;align-items:center;justify-content:space-between;gap:20px}.remember-control{position:relative;display:flex;align-items:center;gap:9px;color:var(--muted);font-size:.72rem;cursor:pointer}.remember-control input{position:absolute;width:1px;height:1px;opacity:0}.checkbox-ui{width:18px;height:18px;display:grid;place-items:center;border:1px solid #bfc0ca;border-radius:3px;color:transparent;background:white}.checkbox-ui svg{width:13px;height:13px}.remember-control input:checked+.checkbox-ui{color:white;border-color:var(--primary);background:var(--primary)}.remember-control input:focus-visible+.checkbox-ui{outline:3px solid rgba(55,54,175,.2)}.forgot-link,.register-section a{color:var(--primary);font-size:.72rem;font-weight:600;text-decoration:none}.forgot-link:hover,.register-section a:hover{text-decoration:underline;text-underline-offset:3px}
        .submit-button{width:100%;min-height:54px;margin-top:4px;padding:14px 24px;display:flex;align-items:center;justify-content:center;gap:10px;border:1px solid rgba(18,18,58,.08);border-radius:10px;color:#f8f8ff;background:linear-gradient(105deg,var(--primary),var(--primary-hover));box-shadow:0 10px 24px rgba(55,54,175,.26);font-size:.83rem;font-weight:600;cursor:pointer;transition:transform .18s cubic-bezier(.22,1,.36,1),box-shadow .18s ease,filter .18s ease}.submit-button:hover:not(:disabled){transform:translateY(-2px);box-shadow:0 14px 28px rgba(55,54,175,.32);filter:brightness(1.04)}.submit-button:focus-visible{outline:3px solid rgba(55,54,175,.22);outline-offset:3px}.submit-button:disabled{cursor:not-allowed;opacity:.68;box-shadow:none}.submit-button svg{width:18px;height:18px}.button-spinner{display:none;width:17px;height:17px;border:2px solid rgba(255,255,255,.38);border-top-color:#f8f8ff;border-radius:50%;animation:spin .7s linear infinite}.submit-button.is-loading .button-icon{display:none}.submit-button.is-loading .button-spinner{display:block}.register-section{margin-top:22px;padding-top:20px;display:flex;align-items:center;justify-content:center;gap:5px;border-top:1px solid var(--border);color:var(--muted);font-size:.74rem}@keyframes spin{to{transform:rotate(360deg)}}
        @media(max-width:1060px){.auth-shell{grid-template-columns:minmax(330px,.72fr) minmax(500px,1.28fr)}.brand-panel{padding:34px}.brand-content h1{font-size:2.35rem}.trust-grid{grid-template-columns:1fr}}
        @media(max-width:860px){.auth-shell{display:block}.brand-panel{min-height:auto;padding:24px 28px 74px}.brand-content{margin:0;padding:44px 0 0;text-align:center}.brand-content h1,.brand-summary{margin-left:auto;margin-right:auto}.eyebrow{justify-content:center}.network-visual,.trust-grid,.secure-note{display:none}.login-panel{min-height:auto;position:relative;z-index:2;margin-top:-38px;padding:0 20px 40px;background:transparent}.login-card{max-width:660px;margin:auto}}
        @media(max-width:560px){.brand-panel{padding:21px 20px 66px}.brand-mark img{width:36px;height:36px}.brand-name{font-size:1.1rem}.brand-content{padding-top:34px}.brand-content h1{font-size:2rem}.brand-summary{margin-top:15px;font-size:.82rem;line-height:1.65}.login-panel{padding:0 12px 28px}.login-card{padding:24px 18px 25px;border-radius:14px}.card-header:after{display:none}.field input{height:56px}.field-icon{top:19px}.captcha-box{grid-template-columns:auto minmax(70px,1fr) 42px;gap:8px}.captcha-challenge{padding:0 10px}.form-options{align-items:flex-start}.submit-button{min-height:52px}}
        @media(prefers-reduced-motion:reduce){*,*:before,*:after{animation-duration:.01ms!important;animation-iteration-count:1!important;transition-duration:.01ms!important}}
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
                <p class="eyebrow">Member access</p>
                <h1 id="welcome-title">Secure access to your business network.</h1>
                <p class="brand-summary">Return to your Liberfx workspace to monitor activity, manage your account, and stay connected to your growing team.</p>

                <div class="network-visual" aria-hidden="true">
                    <div class="visual-toolbar"><i></i><i></i><i></i><span>Business overview</span></div>
                    <div class="visual-body">
                        <div class="visual-chart"><i></i><i></i><i></i><i></i><i></i><i></i></div>
                        <div class="visual-security">
                            <span class="visual-shield">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3 5 6v5c0 4.8 2.8 8.2 7 10 4.2-1.8 7-5.2 7-10V6l-7-3Z"></path><path d="m9 12 2 2 4-4"></path></svg>
                            </span>
                            <b>Protected access</b>
                            <small>Member workspace</small>
                        </div>
                    </div>
                </div>

                <div class="trust-grid" aria-label="Platform benefits">
                    @foreach (['Real-time dashboard', 'Secure authentication', 'Business growth tracking', 'Team monitoring', 'Mobile-friendly access', 'Enterprise security'] as $benefit)
                        <div class="trust-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="m8 12 2.6 2.6L16.5 9"></path></svg>
                            <span>{{ $benefit }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="secure-note">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 3 5 6v5c0 4.8 2.8 8.2 7 10 4.2-1.8 7-5.2 7-10V6l-7-3Z"></path><path d="m9 12 2 2 4-4"></path></svg>
                <span>Your credentials are submitted over a secure, protected connection.</span>
            </div>
        </section>

        <section class="login-panel" aria-labelledby="login-title">
            <div class="login-card">
                <div class="card-header">
                    <span class="security-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3 5 6v5c0 4.8 2.8 8.2 7 10 4.2-1.8 7-5.2 7-10V6l-7-3Z"></path><path d="m9 12 2 2 4-4"></path></svg>
                    </span>
                    <div>
                        <h2 id="login-title">Welcome back</h2>
                        <p>Sign in to continue to your Liberfx workspace.</p>
                    </div>
                </div>

                @if (session('loginmsg'))
                    <div class="alert" role="alert">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M12 8v5M12 16.5v.5"></path></svg>
                        <span>{{ session('loginmsg') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('userLogin') }}" id="loginForm" novalidate>
                    @csrf
                    <div class="form-stack">
                        <div class="field @error('email') has-error @enderror">
                            <div class="field-control">
                                <span class="field-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m4 7 8 6 8-6"></path></svg>
                                </span>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email address" autocomplete="username" inputmode="email" required autofocus @error('email') aria-invalid="true" aria-describedby="emailError" @enderror>
                                <label for="email">Email address</label>
                                <span class="field-status" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m7 12 3 3 7-7"></path></svg>
                                </span>
                            </div>
                            @error('email')<span id="emailError" class="field-message">{{ $message }}</span>@enderror
                        </div>

                        <div class="field @error('password') has-error @enderror">
                            <div class="field-control">
                                <span class="field-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="4" y="10" width="16" height="11" rx="2"></rect><path d="M8 10V7a4 4 0 0 1 8 0v3M12 14v3"></path></svg>
                                </span>
                                <input type="password" name="password" id="password" placeholder="Password" autocomplete="current-password" required @error('password') aria-invalid="true" aria-describedby="passwordError" @enderror>
                                <label for="password">Password</label>
                                <button type="button" class="password-toggle" id="passwordToggle" aria-label="Show password" aria-pressed="false">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"></path><circle cx="12" cy="12" r="2.5"></circle></svg>
                                </button>
                            </div>
                            @error('password')<span id="passwordError" class="field-message">{{ $message }}</span>@enderror
                        </div>

                        <div class="captcha-section @error('login-captcha') has-error @enderror">
                            <div class="section-label" id="captchaLabel">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 3 5 6v5c0 4.8 2.8 8.2 7 10 4.2-1.8 7-5.2 7-10V6l-7-3Z"></path><path d="m9 12 2 2 4-4"></path></svg>
                                <span>Security verification</span>
                            </div>
                            <div class="captcha-box">
                                <span class="captcha-challenge" aria-label="What is {{ session('str1') }} plus {{ session('str2') }}?">{{ session('str1') }} + {{ session('str2') }} =</span>
                                <input type="text" name="login-captcha" id="login-captcha" value="{{ old('login-captcha') }}" maxlength="2" pattern="[0-9]{1,2}" inputmode="numeric" autocomplete="off" placeholder="Answer" required aria-labelledby="captchaLabel" @error('login-captcha') aria-invalid="true" aria-describedby="captchaError" @enderror>
                                <button type="button" class="captcha-refresh" id="captchaRefresh" aria-label="Get a new security question">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 7v5h-5"></path><path d="M4 17v-5h5"></path><path d="M6.1 9A7 7 0 0 1 18.4 6L20 8M4 16l1.6 2A7 7 0 0 0 17.9 15"></path></svg>
                                </button>
                            </div>
                            @error('login-captcha')<span id="captchaError" class="field-message">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-options">
                            <label class="remember-control" for="remember">
                                <input type="checkbox" name="remember" id="remember" value="1" @checked(old('remember'))>
                                <span class="checkbox-ui" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m6 12 4 4 8-9"></path></svg>
                                </span>
                                <span>Remember me</span>
                            </label>
                            <a href="{{ url('/forget-password') }}" class="forgot-link">Forgot password?</a>
                        </div>

                        <button type="submit" class="submit-button" id="submitButton">
                            <span class="button-spinner" aria-hidden="true"></span>
                            <svg class="button-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M10 17l5-5-5-5M15 12H3"></path><path d="M14 3h5a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-5"></path></svg>
                            <span class="button-label">Sign in securely</span>
                        </button>
                    </div>
                </form>

                <div class="register-section">
                    <span>New to Liberfx?</span>
                    <a href="{{ url('/member/register/1') }}">Create your account</a>
                </div>
            </div>
        </section>
    </main>

    <script>
        (function () {
            const form = document.getElementById('loginForm');
            const submitButton = document.getElementById('submitButton');
            const password = document.getElementById('password');
            const passwordToggle = document.getElementById('passwordToggle');

            passwordToggle.addEventListener('click', function () {
                const showPassword = password.type === 'password';
                password.type = showPassword ? 'text' : 'password';
                this.setAttribute('aria-pressed', String(showPassword));
                this.setAttribute('aria-label', showPassword ? 'Hide password' : 'Show password');
            });

            document.getElementById('captchaRefresh').addEventListener('click', function () {
                window.location.reload();
            });

            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    form.reportValidity();
                    return;
                }

                submitButton.disabled = true;
                submitButton.classList.add('is-loading');
                submitButton.querySelector('.button-label').textContent = 'Verifying access...';
            });
        })();
    </script>
</body>
</html>
