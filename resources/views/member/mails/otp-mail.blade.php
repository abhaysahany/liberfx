@extends('emails.layout')

@section('title', 'Your Liberfx verification code')
@section('preheader', 'Use this one-time code to complete your request.')
@section('eyebrow', 'Secure verification')
@section('heading', 'Your verification code')
@section('subheading', 'Use this code to authorize your ' . $type . ' request.')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');
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
        Enter the one-time verification code below for member account <strong style="color:#0f172a;">{{ $memberid }}</strong> to authorize your <strong>{{ $type }}</strong> request.
    </p>

    <!-- Status Strip -->
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:0 0 24px; background-color:#f8fafc; border:1px solid #e2e8f0; border-radius:10px;">
        <tr>
            <td style="padding:10px 16px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:12px; color:#475569; font-weight:600;">
                <span style="display:inline-block; width:8px; height:8px; background-color:#f59e0b; border-radius:50%; margin-right:6px; vertical-align:middle;"></span>
                Action: <strong style="color:#0f172a;">{{ $type }}</strong>
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
                    &#128274; ONE-TIME AUTHORIZATION PASSWORD
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

@section('security', 'Never share this code with anyone, including Liberfx support. If you did not request it, you can safely ignore this email.')
