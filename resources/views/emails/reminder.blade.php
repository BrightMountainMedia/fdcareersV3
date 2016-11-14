<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<?php

$style = [
    /* Layout ------------------------------ */

    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #a61326;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #a61326;',
    'logo' => 'background-color: #f3f1e6; padding: 0 20px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;',

    /* Masthead ----------------------- */

    'email-masthead' => 'padding: 0; text-align: center;',

    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #a61326; border-bottom: 1px solid #a61326; background-color: #f3f1e6;',
    'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 35px;',

    'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #fff; padding: 35px 0 25px; text-align: center;',
    'email-footer-paragraph-sub' => 'margin-top: 0; color: #fff; font-size: 12px; line-height: 1.5em;',

    /* Body ------------------------------ */

    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #000;',

    /* Type ------------------------------ */

    'anchor' => 'color: #3869D4;',
    'header-1' => 'margin-top: 0; font-size: 19px; font-weight: bold; text-align: left;',
    'paragraph' => 'margin-top: 0; color: #000; font-size: 16px; line-height: 1.5em;',
    'paragraph-sub' => 'margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;',
    'paragraph-center' => 'text-align: center;',

    /* Buttons ------------------------------ */

    'button' => 'display: block; display: inline-block; min-height: 20px; padding: 10px;
                 background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px;
                 text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',

    'button--green' => 'background-color: #22BC66;',
    'button--red' => 'background-color: #dc4d2f;',
    'button--blue' => 'background-color: #3869D4;',
];
?>

<?php $fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;'; ?>

<body style="{{ $style['body'] }}">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="{{ $style['email-wrapper'] }}" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="{{ $style['email-masthead'] }}">
                            <a style="{{ $fontFamily }}" href="{{ url('/') }}" target="_blank">
                                <img src="{{ $message->embed(url('/img/fd-careers-logo.png')) }}" alt="FD Careers Logo" width="234" height="75" style="{{ $style['logo'] }}">
                            </a>
                        </td>
                    </tr>

                    <!-- Email Body -->
                    <tr>
                        <td style="{{ $style['email-body'] }}" width="100%">
                            <table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">
                                        <!-- Greeting -->
                                        <h1 style="{{ $style['header-1'] }}">
                                            Hello {{ $user->first_name }},
                                        </h1>

                                        <p style="{{ $style['paragraph'] }}">
                                            You have some positions that require some attention. These positions are the continuous and untilFilled positions for the month:
                                        </p>

                                        @foreach ($positions as $position)
                                            <p style="{{ $style['paragraph'] }}">
                                                <a href="{{ url("/position/$position->id") }}"
                                                    style="{{ $fontFamily }} {{ $style['button'] }} {{ $style["button--blue"] }}"
                                                    class="button"
                                                    target="_blank">
                                                    {{ $position->title }}
                                                </a>
                                            </p>
                                        @endforeach

                                        <!-- Salutation -->
                                        <p style="{{ $style['paragraph'] }}">
                                            Regards,<br>{{ config('app.name') }}
                                        </p>

                                        <!-- Sub Copy -->
                                        @if (isset($actionText))
                                            <table style="{{ $style['body_sub'] }}">
                                                <tr>
                                                    <td style="{{ $fontFamily }}">
                                                        <p style="{{ $style['paragraph-sub'] }}">
                                                            If you’re having trouble clicking the "{{ $actionText }}" button,
                                                            copy and paste the URL below into your web browser:
                                                        </p>

                                                        <p style="{{ $style['paragraph-sub'] }}">
                                                            <a style="{{ $style['anchor'] }}" href="{{ $actionUrl }}" target="_blank">
                                                                {{ $actionUrl }}
                                                            </a>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td>
                            <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                                        <p style="{{ $style['email-footer-paragraph-sub'] }}">
                                            Copyright &copy; {{ date('Y') }}
                                            <a style="{{ $style['anchor'] }}" href="{{ url('/') }}" target="_blank">{{ config('app.name') }}</a>.
                                            All rights reserved.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
