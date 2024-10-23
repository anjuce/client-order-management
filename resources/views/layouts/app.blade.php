<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Management</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    <nav>
        <a href="{{ route('clients.index') }}">Clients</a>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>© 2024 Client Management</p>
</footer>
</body>
</html>
