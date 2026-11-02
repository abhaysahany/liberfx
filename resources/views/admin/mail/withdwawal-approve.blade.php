@extends('emails.layout')

@section('title', 'Withdrawal Approved')
@section('preheader', 'Your withdrawal request has been approved and disbursed.')
@section('eyebrow', 'Transaction Update')
@section('heading', 'Withdrawal Approved')
@section('subheading', 'Your funds have been transferred to your registered wallet.')

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
                    &#10004; WITHDRAWAL APPROVED
                </span>
            </td>
        </tr>
    </table>

    <!-- Salutation & Message -->
    <h2 style="margin:0 0 10px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#0f172a; font-size:22px; line-height:30px; font-weight:700; letter-spacing:-0.3px;">
        Welcome <span style="color:#3736af;">{{ $name }}</span>,
    </h2>
    <p style="margin:0 0 20px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#475569; font-size:14px; line-height:24px;">
        Your withdrawal request on <strong>{{ date('d-m-Y', strtotime($date)) }}</strong> (Request ID: <strong>#{{ $request_id }}</strong>) for the gross amount of <strong>{{ $gross . ' ' . $coin }}</strong> has been approved. The net amount has been successfully transferred to your registered wallet.
    </p>

    <!-- Status Strip -->
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:0 0 24px; background-color:#f8fafc; border:1px solid #e2e8f0; border-radius:10px;">
        <tr>
            <td style="padding:10px 16px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:12px; color:#475569; font-weight:600;">
                <span style="display:inline-block; width:8px; height:8px; background-color:#10b981; border-radius:50%; margin-right:6px; vertical-align:middle;"></span>
                Disbursement: <strong style="color:#059669;">Approved &amp; Transferred</strong>
            </td>
            <td align="right" style="padding:10px 16px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:11px; color:#64748b; font-weight:700; letter-spacing:0.8px; text-transform:uppercase;">
                ID: #{{ $request_id }}
            </td>
        </tr>
    </table>

    <!-- Transaction Details Card -->
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%); background-color:#f8fafc; border:1px solid #cbd5e1; border-radius:16px; overflow:hidden; margin:0 0 24px; box-shadow:0 4px 12px rgba(15, 23, 42, 0.05);">
        <!-- Card Header -->
        <tr>
            <td colspan="2" style="background:linear-gradient(135deg, #1e1b4b 0%, #0f172a 100%); background-color:#1e1b4b; padding:14px 20px; border-bottom:1px solid #334155;">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td valign="middle">
                            <span style="font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:11px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#e0e7ff; display:inline-block;">
                                &#128179; SETTLEMENT BREAKDOWN
                            </span>
                        </td>
                        <td align="right" valign="middle">
                            <span style="font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size:10px; font-weight:600; letter-spacing:0.5px; text-transform:uppercase; color:#94a3b8;">
                                Official Receipt
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Row: Asset/Coin -->
        <tr>
            <td class="detail-label" style="padding:14px 20px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#475569; font-size:12px; font-weight:700; letter-spacing:0.5px; text-transform:uppercase; border-bottom:1px solid #e2e8f0;">
                Asset / Coin
            </td>
            <td class="detail-value" align="right" style="padding:14px 20px; font-family:'Poppins', sans-serif; font-size:13px; font-weight:700; color:#0f172a; border-bottom:1px solid #e2e8f0;">
                {{ $coin }}
            </td>
        </tr>

        <!-- Row: Gross Amount -->
        <tr>
            <td class="detail-label" style="padding:14px 20px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#475569; font-size:12px; font-weight:700; letter-spacing:0.5px; text-transform:uppercase; border-bottom:1px solid #e2e8f0;">
                Gross Amount
            </td>
            <td class="detail-value" align="right" style="padding:14px 20px; font-family:'Poppins', sans-serif; font-size:13px; font-weight:700; color:#0f172a; border-bottom:1px solid #e2e8f0;">
                {{ $gross }}
            </td>
        </tr>

        <!-- Row: Service Charge -->
        <tr>
            <td class="detail-label" style="padding:14px 20px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#475569; font-size:12px; font-weight:700; letter-spacing:0.5px; text-transform:uppercase; border-bottom:1px solid #e2e8f0;">
                Service Charge
            </td>
            <td class="detail-value" align="right" style="padding:14px 20px; font-family:'Poppins', sans-serif; font-size:13px; font-weight:600; color:#dc2626; border-bottom:1px solid #e2e8f0;">
                {{ $service }}
            </td>
        </tr>

        <!-- Row: Net Amount -->
        <tr>
            <td class="detail-label" style="padding:16px 20px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#047857; font-size:13px; font-weight:700; letter-spacing:0.5px; text-transform:uppercase; border-bottom:1px solid #e2e8f0; vertical-align:middle;">
                Net Amount Credited
            </td>
            <td class="detail-value" align="right" style="padding:16px 20px; border-bottom:1px solid #e2e8f0; vertical-align:middle;">
                <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="display:inline-table;">
                    <tr>
                        <td style="background-color:#0f172a; border:1px solid #334155; border-radius:8px; padding:6px 14px; box-shadow:inset 0 1px 3px rgba(0,0,0,0.3);">
                            <span style="font-family:'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, Courier, monospace; font-size:15px; line-height:20px; font-weight:700; letter-spacing:1px; color:#38bdf8;">
                                {{ $net }}
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Row: Pay Wallet -->
        <tr>
            <td class="detail-label" style="padding:14px 20px; font-family:'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color:#475569; font-size:12px; font-weight:700; letter-spacing:0.5px; text-transform:uppercase; vertical-align:middle;">
                Destination Wallet
            </td>
            <td class="detail-value" align="right" style="padding:14px 20px; vertical-align:middle;">
                <span style="font-family:'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, Courier, monospace; font-size:12px; font-weight:600; color:#475569; word-break:break-all;">
                    {{ $wallet }}
                </span>
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
                                Sign in to Liberfx &rarr;
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

@section('security', 'For your security, review your wallet activity regularly. If you did not recognize or request this withdrawal, please contact Liberfx support immediately.')
