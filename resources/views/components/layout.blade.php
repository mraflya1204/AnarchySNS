<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Network | @yield('title', 'Home')</title>

    @vite('resources/css/app.css')
</head>
<body>
@if(session('success'))
    <div class="bg-blue-500 text-white p-4 text-center">
        {{ session('success') }}
    </div>
@endif

    <header>
        <nav>
            <h1>Ninja Network</h1>
            <a href="{{ route('sns.index') }}">Home</a>
            <a href="{{ route('sns.create') }}">Create New Post</a> 
            <a href="/about">About</a>
        </nav>
    </header>
    <main class = "container">
        {{ $slot }}
    </main>
</body>
</html>