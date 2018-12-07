<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--[if !mso]><!-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!--[if (gte mso 9)|(IE)]>
    <style type="text/css">
        table {border-collapse: collapse;}
    </style>
    <![endif]-->
</head>
<style>
    /* Basics */
    body {
        margin: 0 !important;
        padding: 0;
        background-color: #ffffff;
        font-family: Avenir, Helvetica, sans-serif; !important;
    }
    table {
        border-spacing: 0;
        font-family: sans-serif;
        color: #333333;
    }
    td {
        padding: 0;
    }
    img {
        border: 0;
    }
    div[style*="margin: 16px 0"] {
        margin:0 !important;
    }
</style>
<body style="font-family: Avenir, Helvetica, sans-serif; !important;">
<div class="wrapper">
    <div class="webkit">
        <table width="600" align="center">
            <tr>
                <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
                    <img src="{{ asset('images/IMG-20171213-WA0003.jpg') }}" alt="WorkCity Nigeria" width="300" height="230" style="display: block;" />
        </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td>
                            Hello <b>{{ $user->fullname }}</b>!,
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px 0 30px 0;">
                            Thanks for registering to WorkCity Nigeria! To verify your email address, <a href="{{route('sendEmailConfirmed',["email" => $user->email, "verifyToken" => $user->verifyToken])}}">click here</a>
                            <br>
                            If you did not register to WorkCity Nigeria, please disregard this mail.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            We hope to serve you well!
                            <br>
                            WorkCity Nigeria.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#2F170F" style="padding: 30px 30px 30px 30px;">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td width="75%" style="color: white!important;">
                            &reg; WorkCity, Nigeria {{ date('Y') }}<br/>
                        </td>
                        <td>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        </table>
    </div>
</div>
</body>
</html>
