<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#12123a">
    <title>Account Created | {{ config('detailsApp.name') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logo/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logo/favicon/favicon-16x16.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('uassets/css/account-created.css') }}" rel="stylesheet">
</head>

<body>
    <main class="success-shell">
        <section class="brand-panel" aria-labelledby="welcome-title">
            <a href="{{ url('/') }}" class="brand-logo" aria-label="Liberfx home">
                <img src="{{ asset('logo/logo-icon.png') }}" alt="">
                <span>Liberfx</span>
            </a>

            <div class="brand-copy">
                <p class="eyebrow">Registration complete</p>
                <h1 id="welcome-title">Welcome to Liberfx.</h1>
                <p>Your account is ready. Access your member workspace to manage your business, monitor your network,
                    and track your progress.</p>

                <div class="success-visual" aria-hidden="true">
                    <div class="visual-top"><i></i><i></i><i></i><span>Account overview</span></div>
                    <div class="visual-grid">
                        <div class="visual-chart"><i></i><i></i><i></i><i></i><i></i><i></i></div>
                        <div class="visual-ready">
                            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12.5 9.2 17 19 7"></path>
                                </svg></span>
                            <b>Account ready</b>
                            <small>Secure member access</small>
                        </div>
                    </div>
                </div>

                <div class="benefits" aria-label="Platform benefits">
                    @foreach (['Secure member access', 'Real-time dashboard', 'Team management', 'Business tracking', 'Mobile friendly', 'Enterprise security'] as $benefit)
                        <div class="benefit">
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

            <div class="security-note">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M12 3 5 6v5c0 4.8 2.8 8.2 7 10 4.2-1.8 7-5.2 7-10V6l-7-3Z"></path>
                    <path d="m9 12 2 2 4-4"></path>
                </svg>
                <span>Your account credentials should be stored privately and securely.</span>
            </div>
        </section>

        <section class="details-panel" aria-labelledby="success-title">
            <div class="success-card">
                <div class="success-header">
                    <div class="success-mark" aria-hidden="true">
                        <span class="success-ring"></span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                            <path d="M5 12.5 9.2 17 19 7"></path>
                        </svg>
                    </div>
                    <span class="status-badge"><i></i> Registration successful</span>
                    <h2 id="success-title">Your account is ready</h2>
                    <p>Welcome{{ session('name') ? ', ' . session('name') : '' }}. Save your account details, then
                        continue to secure sign in.</p>
                </div>

                <div class="account-details" aria-label="Account information">
                    <div class="detail-row">
                        <span class="detail-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                aria-hidden="true">
                                <circle cx="12" cy="8" r="3.5"></circle>
                                <path d="M5 20c.5-4.1 2.8-6 7-6s6.5 1.9 7 6"></path>
                            </svg>
                        </span>
                        <div class="detail-content">
                            <span>Member ID</span>
                            <strong id="memberValue">{{ session('userid') ?: 'Not available' }}</strong>
                        </div>
                        <button type="button" class="detail-action copy-action" data-copy-target="memberValue"
                            aria-label="Copy member ID">
                            <svg class="copy-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8" aria-hidden="true">
                                <rect x="8" y="8" width="11" height="11" rx="2"></rect>
                                <path d="M16 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3"></path>
                            </svg>
                            <svg class="done-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <path d="m6 12 4 4 8-9"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="detail-row">
                        <span class="detail-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                aria-hidden="true">
                                <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                                <path d="m4 7 8 6 8-6"></path>
                            </svg>
                        </span>
                        <div class="detail-content">
                            <span>Registered email</span>
                            <strong id="emailValue">{{ session('email') ?: 'Not available' }}</strong>
                        </div>
                        <button type="button" class="detail-action copy-action" data-copy-target="emailValue"
                            aria-label="Copy registered email">
                            <svg class="copy-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8" aria-hidden="true">
                                <rect x="8" y="8" width="11" height="11" rx="2"></rect>
                                <path d="M16 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3"></path>
                            </svg>
                            <svg class="done-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <path d="m6 12 4 4 8-9"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="detail-row">
                        <span class="detail-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                aria-hidden="true">
                                <rect x="7" y="2.5" width="10" height="19" rx="2"></rect>
                                <path d="M10 5h4M11 18.5h2"></path>
                            </svg>
                        </span>
                        <div class="detail-content">
                            <span>Mobile number</span>
                            <strong id="mobileValue">{{ session('mobile') ?: 'Not available' }}</strong>
                        </div>
                        <button type="button" class="detail-action copy-action" data-copy-target="mobileValue"
                            aria-label="Copy mobile number">
                            <svg class="copy-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8" aria-hidden="true">
                                <rect x="8" y="8" width="11" height="11" rx="2"></rect>
                                <path d="M16 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3"></path>
                            </svg>
                            <svg class="done-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <path d="m6 12 4 4 8-9"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="credentials-grid">
                        <div class="credential-item">
                            <span class="credential-label">Login password</span>
                            <div class="credential-value">
                                <strong id="passwordValue"
                                    data-hidden="{{ str_repeat('•', max(strlen((string) session('password')), 8)) }}"
                                    data-value="{{ session('password') }}">{{ str_repeat('•', max(strlen((string) session('password')), 8)) }}</strong>
                                <button type="button" class="visibility-toggle" data-toggle-target="passwordValue"
                                    aria-label="Show login password" aria-pressed="false">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                        aria-hidden="true">
                                        <path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"></path>
                                        <circle cx="12" cy="12" r="2.5"></circle>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="credential-item">
                            <span class="credential-label">Security PIN</span>
                            <div class="credential-value">
                                <strong id="pinValue" data-hidden="••••"
                                    data-value="{{ session('txn_password') }}">••••</strong>
                                <button type="button" class="visibility-toggle" data-toggle-target="pinValue"
                                    aria-label="Show security PIN" aria-pressed="false">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                        aria-hidden="true">
                                        <path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"></path>
                                        <circle cx="12" cy="12" r="2.5"></circle>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="security-callout">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                        aria-hidden="true">
                        <path d="M12 3 5 6v5c0 4.8 2.8 8.2 7 10 4.2-1.8 7-5.2 7-10V6l-7-3Z"></path>
                        <path d="M12 8v5M12 16.5v.5"></path>
                    </svg>
                    <div>
                        <strong>Keep your credentials secure</strong>
                        <p>Save these details privately. Never share your password or security PIN with anyone.</p>
                    </div>
                </div>

                <div class="actions">
                    <a href="{{ url('/member') }}" class="primary-action">
                        <span>Continue to sign in</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            aria-hidden="true">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </a>
                    <a href="{{ url('/member/register/1') }}" class="secondary-action">Register another member</a>
                </div>
            </div>
        </section>
    </main>

    <div class="toast" id="copyToast" role="status" aria-live="polite">Copied to clipboard</div>

    <script>
        (function() {
            const toast = document.getElementById('copyToast');
            let toastTimer;

            function showToast(message) {
                toast.textContent = message;
                toast.classList.add('is-visible');
                clearTimeout(toastTimer);
                toastTimer = setTimeout(() => toast.classList.remove('is-visible'), 1800);
            }

            document.querySelectorAll('.copy-action').forEach(button => {
                button.addEventListener('click', async function() {
                    const target = document.getElementById(this.dataset.copyTarget);
                    const value = target.textContent.trim();

                    try {
                        await navigator.clipboard.writeText(value);
                        this.classList.add('is-copied');
                        showToast('Copied to clipboard');
                        setTimeout(() => this.classList.remove('is-copied'), 1400);
                    } catch (error) {
                        showToast('Copy failed. Please copy manually.');
                    }
                });
            });

            document.querySelectorAll('.visibility-toggle').forEach(button => {
                button.addEventListener('click', function() {
                    const target = document.getElementById(this.dataset.toggleTarget);
                    const isVisible = this.getAttribute('aria-pressed') === 'true';
                    target.textContent = isVisible ? target.dataset.hidden : (target.dataset.value ||
                        target.dataset.hidden);
                    this.setAttribute('aria-pressed', String(!isVisible));
                    this.setAttribute('aria-label',
                        `${isVisible ? 'Show' : 'Hide'} ${target.id === 'pinValue' ? 'security PIN' : 'login password'}`
                    );
                });
            });
        })();
    </script>
</body>

</html>
