<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no">
    <title>@yield('title', 'Liberfx notification')</title>
    <!--[if mso]><noscript><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml></noscript><![endif]-->
    <style>
        html, body { margin: 0 !important; padding: 0 !important; width: 100% !important; }
        * { -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; border-collapse: collapse !important; }
        img { display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
        a { color: #3736af; }
        .button:hover { background-color: #2b2a88 !important; }
        @media screen and (max-width: 620px) {
            .page-pad { padding: 12px !important; }
            .hero-pad { padding: 30px 24px 28px !important; }
            .body-pad { padding: 28px 22px !important; }
            .footer-pad { padding: 22px !important; }
            .email-title { font-size: 27px !important; line-height: 34px !important; }
            .button-cell, .button { width: 100% !important; }
            .button { box-sizing: border-box !important; text-align: center !important; }
            .detail-label, .detail-value { display: block !important; width: 100% !important; text-align: left !important; }
            .detail-value { padding-top: 5px !important; }
        }
    </style>
</head>
<body style="margin:0; padding:0; background-color:#f5f5fa; font-family:Poppins, Arial, Helvetica, sans-serif; color:#717579;">
    <div style="display:none; max-height:0; overflow:hidden; opacity:0; color:transparent;">@yield('preheader', 'A secure notification from Liberfx.')</div>
    <center role="article" aria-roledescription="email" lang="en" style="width:100%; background-color:#f5f5fa;">
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td class="page-pad" align="center" style="padding:32px 16px;">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%; max-width:640px;">
                        <tr>
                            <td style="background-color:#12123a; border-radius:18px 18px 0 0; overflow:hidden;">
                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td style="padding:22px 30px; border-bottom:1px solid #32325f;">
                                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                                <tr>
                                                    <td valign="middle">
                                                        <table role="presentation" cellpadding="0" cellspacing="0" border="0"><tr>
                                                            <td valign="middle" style="padding-right:12px;"><img src="{{ isset($message) ? $message->embed(public_path('logo/logo-icon.png')) : asset('logo/logo-icon.png') }}" width="40" height="40" alt="Liberfx" style="width:40px; height:40px;"></td>
                                                            <td valign="middle" style="color:#f8f8ff; font-size:20px; line-height:24px; font-weight:700; letter-spacing:-0.4px;">Liberfx</td>
                                                        </tr></table>
                                                    </td>
                                                    <td align="right" valign="middle" style="color:#b9bad4; font-size:11px; line-height:17px; letter-spacing:.7px; text-transform:uppercase;">Secure digital<br>business platform</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hero-pad" style="padding:38px 40px 36px; background-color:#1b1b56;">
                                            <p style="margin:0 0 12px; color:#aaa9ff; font-size:12px; line-height:18px; font-weight:700; letter-spacing:1.4px; text-transform:uppercase;">@yield('eyebrow', 'Account notification')</p>
                                            <h1 class="email-title" style="margin:0; color:#f8f8ff; font-size:34px; line-height:42px; font-weight:700; letter-spacing:-1px;">@yield('heading')</h1>
                                            @hasSection('subheading')<p style="margin:13px 0 0; max-width:500px; color:#c9cae0; font-size:15px; line-height:24px;">@yield('subheading')</p>@endif
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="body-pad" style="padding:36px 40px; background-color:#fdfdff; border:1px solid #e6e6ee; border-top:0;">
                                @yield('content')
                                @hasSection('security')
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:26px; background-color:#eeedff; border:1px solid #dcdaf6; border-radius:12px;">
                                        <tr><td width="42" valign="top" style="padding:16px 0 16px 16px; color:#3736af; font-size:20px; line-height:24px;">&#128274;</td><td style="padding:16px 16px 16px 8px;"><p style="margin:0 0 4px; color:#424562; font-size:13px; line-height:19px; font-weight:700;">Security notice</p><p style="margin:0; color:#656a79; font-size:12px; line-height:19px;">@yield('security')</p></td></tr>
                                    </table>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="footer-pad" style="padding:24px 30px; background-color:#eeeeF5; border-radius:0 0 18px 18px; text-align:center;">
                                <p style="margin:0 0 6px; color:#424562; font-size:12px; line-height:18px; font-weight:700;">{{ config('detailsApp.name', 'Liberfx') }}</p>
                                @if(config('detailsApp.registered office address'))
                                    <p style="margin:0 0 8px; color:#787f95; font-size:11px; line-height:17px;">
                                        <strong>Registered Office:</strong> {{ config('detailsApp.registered office address') }}
                                    </p>
                                @endif
                                <p style="margin:0; color:#737b8b; font-size:11px; line-height:18px;">Need help? <a href="mailto:info@liberfx.com" style="color:#3736af; text-decoration:none;">info@liberfx.com</a> &nbsp;&bull;&nbsp; <a href="https://liberfx.com" style="color:#3736af; text-decoration:none;">liberfx.com</a></p>
                                <p style="margin:9px 0 0; color:#8b8f9d; font-size:10px; line-height:16px;">&copy; {{ date('Y') }} {{ config('detailsApp.name', 'Liberfx') }}. This is an automated service email.</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>
