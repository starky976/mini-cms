<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'My CMS')</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 text-gray-900">
        <header class="bg-white shadow p-4 mb-6">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{ route('index') }}" class="text-xl font-bold">My CMS</a>

                <form action="{{ route('search') }}" method="GET" class="flex">
                    <input type="text" name="q" placeholder="検索..." value="{{ request('q') }}"
                        class="border border-gray-300 rounded-l px-3 py-1">
                    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded-r hover:bg-blue-700">検索</button>
                </form>
            </div>
        </header>

        <main class="container mx-auto px-4">
            @yield('content')
        </main>

        <footer class="text-center text-sm text-gray-500 mt-10 mb-4">
            &copy; {{ date('Y') }} My CMS
        </footer>
    </body>
</html>
