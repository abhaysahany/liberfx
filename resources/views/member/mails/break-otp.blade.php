@extends('emails.layout')

@section('title', 'Confirm your lending break request')
@section('preheader', 'Your one-time code for the Liberfx lending break request.')
@section('eyebrow', 'Lending security')
@section('heading', 'Confirm your request')
@section('subheading', 'Use this verification code to continue your lending break request.')

@section('content')
    <p style="margin:0 0 10px; color:#424562; font-size:16px; line-height:25px; font-weight:700;">Hello {{ $name }},</p>
    <p style="margin:0 0 22px; color:#717579; font-size:14px; line-height:23px;">Enter the code below for member account <strong style="color:#424562;">{{ $memberid }}</strong>.</p>
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#eeedff; border:1px solid #dcdaf6; border-radius:12px;"><tr><td align="center" style="padding:24px 16px;"><p style="margin:0 0 7px; color:#737b8b; font-size:10px; line-height:16px; font-weight:700; letter-spacing:1.2px; text-transform:uppercase;">One-time password</p><p style="margin:0; color:#3736af; font-family:'Courier New', monospace; font-size:34px; line-height:42px; font-weight:700; letter-spacing:7px;">{{ $otp }}</p></td></tr></table>
@endsection

@section('security', 'Never share this code. If you did not initiate a lending break request, ignore this email and review your account security.')
