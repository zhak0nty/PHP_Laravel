<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Welcome')</title>

    <style>
        body { font-family: Arial; background:#f5f6fa; margin:0; }
        header { background:#111; color:#fff; padding:16px; }
        main { max-width:800px; margin:24px auto; background:#fff; padding:24px; border-radius:12px; }
        .tag { display:inline-block; padding:6px 10px; border-radius:999px; background:#eee; margin:4px; }
    </style>
</head>
<body>

<header>
    <h2 style="margin:0;">My Laravel Website</h2>
</header>

<main>
    @yield('content')
</main>

</body>
</html>