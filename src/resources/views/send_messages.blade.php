<!DOCTYPE html>
<html>

<head>
    <title>Tasdiqlash Emaili</title>
</head>

<body>
    <h2>test uchun </h2>
    <h2>{{ $qrCode }}</h2>
    <a href="{{ config('app.url') }}/{{ $qrCode }}" target="_blank">qrCode</a>
</body>

</html>
