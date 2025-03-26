<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GlowTrack - INVENTORY MANAGEMENT</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <style>
        body { background-color: #0D0D5F; }
        .navbar { background-color: #4B0D74; }
        .sidebar { background-color: #4B0D74; min-height: 100vh; padding-top: 20px; }
        .nav-link { color: #FFFFFF; }
        .nav-link:hover { background-color: #8813A8; color: white; }
        .content { background: #D529B4; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .content h1, .content p { color: #F05AE0; }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <script>
        window.location.href = "{{ route('login') }}";
    </script>
</body>
</html>