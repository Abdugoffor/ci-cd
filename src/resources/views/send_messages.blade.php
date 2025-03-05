<!DOCTYPE html>
<html>

<head>
    <title>Tasdiqlash Emaili</title>
</head>

<body>
    <h2>test uchun </h2>
    <h2>{{ $qrCode }}</h2>

    <h2>{{ asset($qrCode) }}</h2>

    <h2>{{ secure_asset($qrCode) }}</h2>

    <img src="{{ $qrCode }}" alt="test">

    <img src="{{ asset($qrCode) }}" alt="test">

    <img src="{{ secure_asset($qrCode) }}" alt="test">
</body>

</html>
