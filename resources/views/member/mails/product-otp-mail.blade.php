@extends('emails.layout')

@section('title', 'Your Liberfx Course Verification Code')
@section('preheader', 'Your OTP for purchasing ' . ($course_name ?? 'Course') . ' on Liberfx is ' . ($otp ?? '') . '.')
@section('eyebrow', 'Course Enrollment Verification')
@section('heading', 'Confirm Course Purchase')
@section('subheading', 'Use this one-time code to authorize your enrollment in ' . ($course_name ?? 'the course') . '.')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');
        .button:hover { background: linear-gradient(135deg, #2b2a88 0%, #17153a 100%) !important; box-shadow: 0 14px 28px -4px rgba(55, 54, 175, 0.55) !important; }
    </style>

    <!-- Header Badge -->
    <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin:0 0 16px;">
        <tr>
            <td style="background:linear-gradient(135deg, #eef2ff 0%, #e0e7ff 100%); background-color:#eef2ff; border:1px solid #c7d2fe; border-radius:24px; padding:6px 16px;">
                <span style="font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:11px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#3730a3; display:inline-block;">
                    &#9733; ONE-TIME VERIFICATION CODE
                </span>
            </td>
        </tr>
    </table>

    <!-- Salutation & Message -->
    <h2 style="margin:0 0 10px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#0f172a; font-size:22px; line-height:30px; font-weight:700; letter-spacing:-0.3px;">
        Hello <span style="color:#3736af;">{{ $name }}</span>,
    </h2>
    <p style="margin:0 0 20px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#475569; font-size:14px; line-height:24px;">
        You have initiated a purchase request for the course <strong style="color:#0f172a;">{{ $course_name }}</strong> on the <strong>{{ config('detailsApp.name', 'Liberfx') }}</strong> platform. To confirm your enrollment, please use the one-time verification password (OTP) provided below.
    </p>

    <!-- Status Strip -->
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:0 0 24px; background-color:#f8fafc; border:1px solid #e2e8f0; border-radius:10px;">
        <tr>
            <td style="padding:10px 16px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:12px; color:#475569; font-weight:600;">
                <span style="display:inline-block; width:8px; height:8px; background-color:#f59e0b; border-radius:50%; margin-right:6px; vertical-align:middle;"></span>
                Action: <strong style="color:#0f172a;">Course Enrollment</strong>
            </td>
            <td align="right" style="padding:10px 16px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:11px; color:#64748b; font-weight:700; letter-spacing:0.8px; text-transform:uppercase;">
                Auth: Pending
            </td>
        </tr>
    </table>

    <!-- OTP Display Box -->
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%); background-color:#f8fafc; border:1px solid #cbd5e1; border-radius:16px; overflow:hidden; margin:0 0 24px; box-shadow:0 4px 12px rgba(15, 23, 42, 0.05);">
        <tr>
            <td style="background:linear-gradient(135deg, #1e1b4b 0%, #0f172a 100%); background-color:#1e1b4b; padding:12px 20px; border-bottom:1px solid #334155; text-align:center;">
                <span style="font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:11px; font-weight:700; letter-spacing:1.2px; text-transform:uppercase; color:#e0e7ff; display:inline-block;">
                    &#128274; ONE-TIME AUTHORIZATION PASSWORD (OTP)
                </span>
            </td>
        </tr>
        <tr>
            <td align="center" style="padding:28px 20px;">
                <div style="display:inline-block; background-color:#0f172a; border:1px solid #334155; border-radius:12px; padding:14px 32px; box-shadow:inset 0 2px 6px rgba(0,0,0,0.4);">
                    <span style="font-family:'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, Courier, monospace; font-size:36px; line-height:44px; font-weight:700; letter-spacing:8px; color:#38bdf8;">
                        {{ $otp }}
                    </span>
                </div>
                <p style="margin:12px 0 0; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:11px; color:#64748b;">
                    This code is valid for a single transaction. Do not share it with anyone.
                </p>
            </td>
        </tr>
    </table>

    <!-- Course & Order Details Card -->
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%); background-color:#f8fafc; border:1px solid #cbd5e1; border-radius:16px; overflow:hidden; margin:0 0 24px; box-shadow:0 4px 12px rgba(15, 23, 42, 0.05);">
        <!-- Table Header -->
        <tr>
            <td colspan="2" style="background:linear-gradient(135deg, #1e1b4b 0%, #0f172a 100%); background-color:#1e1b4b; padding:14px 20px; border-bottom:1px solid #334155;">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td valign="middle">
                            <span style="font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:11px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#e0e7ff; display:inline-block;">
                                &#128203; PURCHASE ORDER DETAILS
                            </span>
                        </td>
                        <td align="right" valign="middle">
                            <span style="font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:10px; font-weight:600; letter-spacing:0.5px; text-transform:uppercase; color:#94a3b8;">
                                Verification Step
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Row: Course Name -->
        <tr>
            <td class="detail-label" style="padding:14px 20px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#475569; font-size:11px; font-weight:700; letter-spacing:0.8px; text-transform:uppercase; border-bottom:1px solid #e2e8f0; width:40%;">
                Course Name
            </td>
            <td class="detail-value" align="right" style="padding:14px 20px; font-family:'Poppins', sans-serif; font-size:13px; font-weight:700; color:#0f172a; border-bottom:1px solid #e2e8f0;">
                {{ $course_name }}
            </td>
        </tr>

        <!-- Row: Course Price -->
        <tr>
            <td class="detail-label" style="padding:14px 20px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#475569; font-size:11px; font-weight:700; letter-spacing:0.8px; text-transform:uppercase; border-bottom:1px solid #e2e8f0;">
                Price / Amount
            </td>
            <td class="detail-value" align="right" style="padding:14px 20px; font-family:'Poppins', sans-serif; font-size:14px; font-weight:700; color:#3736af; border-bottom:1px solid #e2e8f0;">
                ${{ is_numeric($price) ? number_format((float)$price, 2) : $price }}
            </td>
        </tr>

        <!-- Row: Member ID -->
        <tr>
            <td class="detail-label" style="padding:14px 20px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#475569; font-size:11px; font-weight:700; letter-spacing:0.8px; text-transform:uppercase; border-bottom:1px solid #e2e8f0;">
                Member ID
            </td>
            <td class="detail-value" align="right" style="padding:14px 20px; font-family:'Poppins', sans-serif; font-size:13px; font-weight:700; color:#0f172a; border-bottom:1px solid #e2e8f0;">
                {{ $memberid }}
            </td>
        </tr>

        <!-- Row: Registered Email -->
        <tr>
            <td class="detail-label" style="padding:14px 20px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#475569; font-size:11px; font-weight:700; letter-spacing:0.8px; text-transform:uppercase;">
                Registered Email
            </td>
            <td class="detail-value" align="right" style="padding:14px 20px; font-family:'Poppins', sans-serif; font-size:13px; font-weight:600; color:#475569;">
                {{ $email }}
            </td>
        </tr>
    </table>

    <!-- Instructions Box -->
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:0 0 24px; background-color:#f1f5f9; border:1px solid #cbd5e1; border-radius:12px;">
        <tr>
            <td style="padding:16px 20px;">
                <p style="margin:0 0 8px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:12px; font-weight:700; color:#1e293b; text-transform:uppercase; letter-spacing:0.5px;">
                    &#9432; How to complete your enrollment:
                </p>
                <ol style="margin:0; padding-left:18px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:12px; line-height:20px; color:#475569;">
                    <li style="margin-bottom:4px;">Return to the Liberfx course purchase screen in your browser.</li>
                    <li style="margin-bottom:4px;">Enter the 6-digit OTP code shown above into the verification field.</li>
                    <li>Click <strong>Buy Course</strong> to confirm and start learning immediately.</li>
                </ol>
            </td>
        </tr>
    </table>

    <!-- Call to Action Button -->
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:0 0 28px;">
        <tr>
            <td align="center">
                <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td class="button-cell" style="border-radius:12px; background:linear-gradient(135deg, #3736af 0%, #1e1b4b 100%); background-color:#3736af; box-shadow:0 10px 22px -4px rgba(55, 54, 175, 0.45), 0 4px 10px -2px rgba(55, 54, 175, 0.25);">
                            <a class="button" href="{{ url('/member/voxa-course') }}" style="display:inline-block; padding:16px 40px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#ffffff; font-size:14px; line-height:20px; font-weight:700; letter-spacing:0.5px; text-decoration:none; border-radius:12px; text-align:center;">
                                Go to Courses &rarr;
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- Corporate Registered Office Strip -->
    @if(config('detailsApp.registered office address'))
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:20px 0 0; background-color:#f1f5f9; border:1px solid #e2e8f0; border-radius:10px;">
        <tr>
            <td style="padding:12px 16px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:11px; line-height:17px; color:#64748b;">
                <span style="display:inline-block; font-size:13px; margin-right:6px; vertical-align:middle;">&#127970;</span>
                <strong style="color:#334155;">{{ config('detailsApp.name', 'Liberfx') }} Registered Office:</strong> {{ config('detailsApp.registered office address') }}
            </td>
        </tr>
    </table>
    @endif
@endsection

@section('security', 'Liberfx representatives will never ask you for your one-time verification password. If you did not initiate this course purchase request, please secure your account immediately.')
