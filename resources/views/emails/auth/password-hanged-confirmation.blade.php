<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Changed Confirmation</title>
</head>
<body>
    <h1>Hello, {{ $user->name ?? $user->email }} your password changed successfully</h1>
    <p>If you have any questions, please don't hesitate to contact us at Dopa.</p>
    <p>Sincerely,</p>
    <p>The Dopa Team</p>
</body>
</html>
