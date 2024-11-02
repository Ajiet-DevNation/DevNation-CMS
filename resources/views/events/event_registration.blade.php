<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        .header {
            background-color: #4C50AF;
            color: #fff;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        .logo {
            text-align: center;
            padding: 10px 0; 
        }
        .logo img {
            max-width: 40%; 
            height: auto; 
        }
        .content {
            padding: 30px;
        }
        .content h1 {
            color: #333;
            font-size: 22px;
        }
        .content p {
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4C50AF;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 4px;
        }
        .note {
            margin-top: 20px;
            font-size: 12px; 
            color: #666; 
        }
        .footer {
            background-color: #f4f4f4;
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="container">
        <div class="logo">
            <img src="{{ asset('assets/img/logo-dark.png') }}" alt="DevNation Logo"> 
        </div>
        <div class="header">
            Event registration confirmation
        </div>
        <div class="content">
            <h1>Hello, {{ $userName }}</h1>
            <p>You have successfully registered for the event: <strong>{{ $eventName }}</strong>.</p>
            <p>We look forward to seeing you at the event!</p>
            <a href="{{ $eventUrl }}" class="button">View Event Details</a>
            <p>Regards,<br>DevNation</p>
            <p class="note">If you're having trouble clicking the "View Event" button, copy and paste the URL below into your web browser: <a href="{{ $eventUrl }}">{{ $eventUrl }}</a></p> <!-- Klikateľná URL -->
        </div>
        <div class="footer">
            &copy; 2024 DevNations | All Rights Reserved
        </div>
    </div>
</body>
</html>
