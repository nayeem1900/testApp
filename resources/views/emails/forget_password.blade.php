<!DOCTYPE html>
<html>
<head>
    <title>forget Password</title>
    <style>
        .btn {
            background:#fcb756;
            color:#ffffff;
            padding: 10px;
            border-radius: 10px;
            text-align:center;
            display: block;
            width: 150px;
        }
        .padding_0{
            padding:0px !important;
        }
    </style>
</head>
<body>
    <h1>Reset your {{ env("APP_NAME") }} password</h1>
    <p>Hello {{ $userInfo->name }},</p>
    <p>We’ll make this quick! Just enter this code within the next 10 minutes to reset your password:</p>
    <a class="btn" href="{{ url('password_reset?token='.$userInfo->password.'&name='.Str::slug($userInfo->name, '-').'&token_id='.$userInfo->password) }}">click here</a>
    <h1 class="btn">{{ $userInfo->otp }}</h1>
    <p>And if that code doesn’t work, try copying and pasting this link into your browser:</p>
    <p>{{ url('password_reset?token='.$userInfo->password.'&name='.Str::slug($userInfo->name, '-').'&token_id='.$userInfo->password) }}</p>
    <hr>
    <p>This email’s meant for your eyes only! If someone’s asked you to share this email or code with them, or if you think you received this by mistake, please report it.</p>
    <hr>
    <p>Having trouble? If you can’t reset your password, or you didn’t attempt to log in, please contact support .</p>


    <p style="padding: 0;"><b>Md Majadul Islam</b></p>
    <small style="padding: 0;">Recovery Team</small>
    <p style="padding: 0;">{{ env("APP_NAME") }}</p>
    <p style="padding: 0;">Thank you</p>
</body>
</html>
