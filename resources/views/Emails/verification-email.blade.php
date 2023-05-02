<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verification Email</title>
</head>
<body>
<p>Dear {{ $mailData['name'] }},</p>
<p>Below is your Email Verification Code</p>
<p><b>{{ $mailData['code'] }}</b></p>
<p>Thank You</p>
</body>
</html>
