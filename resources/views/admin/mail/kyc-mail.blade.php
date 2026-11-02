@extends('emails.layout')

@section('title', 'KYC Verification Status')
@section('preheader', 'Your account KYC verification status has been updated.')
@section('eyebrow', 'Compliance & Security')
@section('heading', 'KYC Verification Update')
@section('subheading', 'Official identity verification status update for your Liberfx account.')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');
        .button:hover { background: linear-gradient(135deg, #2b2a88 0%, #17153a 100%) !important; box-shadow: 0 14px 28px -4px rgba(55, 54, 175, 0.55) !important; }
    </style>

    <!-- Header Badge -->
    <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin:0 0 16px;">
        <tr>
            <td style="background:linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%); background-color:#ecfdf5; border:1px solid #a7f3d0; border-radius:24px; padding:6px 16px;">
                <span style="font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:11px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#047857; display:inline-block;">
                    &#9733; KYC VERIFICATION STATUS
                </span>
            </td>
        </tr>
    </table>

    <!-- Salutation & Headline -->
    <h2 style="margin:0 0 12px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#0f172a; font-size:22px; line-height:30px; font-weight:700; letter-spacing:-0.3px;">
        {{ $smsg }}
    </h2>
    <p style="margin:0 0 20px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#475569; font-size:14px; line-height:24px;">
        Your identity verification documentation has been reviewed by our compliance department. Below are the details regarding your KYC verification update.
    </p>

    <!-- Status Strip -->
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:0 0 24px; background-color:#f8fafc; border:1px solid #e2e8f0; border-radius:10px;">
        <tr>
            <td style="padding:10px 16px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:12px; color:#475569; font-weight:600;">
                <span style="display:inline-block; width:8px; height:8px; background-color:#10b981; border-radius:50%; margin-right:6px; vertical-align:middle;"></span>
                Compliance Review: <strong style="color:#059669;">Processed</strong>
            </td>
            <td align="right" style="padding:10px 16px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:11px; color:#64748b; font-weight:700; letter-spacing:0.8px; text-transform:uppercase;">
                Type: Member Verification
            </td>
        </tr>
    </table>

    <!-- KYC Notice Card -->
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%); background-color:#f8fafc; border:1px solid #cbd5e1; border-radius:16px; overflow:hidden; margin:0 0 24px; box-shadow:0 4px 12px rgba(15, 23, 42, 0.05);">
        <!-- Card Header -->
        <tr>
            <td style="background:linear-gradient(135deg, #1e1b4b 0%, #0f172a 100%); background-color:#1e1b4b; padding:14px 20px; border-bottom:1px solid #334155;">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td valign="middle">
                            <span style="font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:11px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#e0e7ff; display:inline-block;">
                                &#128737; VERIFICATION DETAILS
                            </span>
                        </td>
                        <td align="right" valign="middle">
                            <span style="font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:10px; font-weight:600; letter-spacing:0.5px; text-transform:uppercase; color:#94a3b8;">
                                Official Record
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding:22px 24px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#334155; font-size:14px; line-height:24px;">
                {{ $kycmessage }}
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
                            <a class="button" href="{{ url('/member') }}" style="display:inline-block; padding:16px 40px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#ffffff; font-size:14px; line-height:20px; font-weight:700; letter-spacing:0.5px; text-decoration:none; border-radius:12px; text-align:center;">
                                Go to Member Portal &rarr;
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

@section('security', 'Keep your account credentials confidential. Liberfx compliance officers will never ask for your login password or transaction PIN.')
