<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Dopa App</title>
</head>
<body>
    <h1>Welcome, {{ $user->name ?? $user->email }}!</h1>
    <p>Thank you for registering with Dopa. We're excited to have you on board!</p>
    <p>Here are some things you can do now:</p>
    <ul>
        <li>Explore our website and discover the features we offer.</li>
        <li>Update your profile information to personalize your experience.</li>
    </ul>
    <p>If you have any questions, please don't hesitate to contact us at Dopa.</p>
    <p>Sincerely,</p>
    <p>The Dopa Team</p>
</body>
</html>
