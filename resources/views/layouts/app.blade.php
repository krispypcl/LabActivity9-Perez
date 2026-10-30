<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bakuna Tracker')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col font-sans">

    <!-- Navigation Header -->
    <header class="bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-6">
                <a href="/dashboard" class="text-xl font-bold text-emerald-600 hover:text-emerald-700">
                    Bakuna Tracker
                </a>
                @auth
                    <a href="/dashboard" class="text-sm font-medium text-gray-600 hover:text-emerald-600">
                        Dashboard
                    </a>
                    <a href="/schedule" class="text-sm font-medium text-gray-600 hover:text-emerald-600">
                        Schedule
                    </a>
                @endauth
            </div>

            <div class="flex items-center gap-4">
                @auth
                    <span class="text-sm font-medium text-gray-700">
                        Hi, {{ auth()->user()->name }}
                    </span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-700 underline">
                            Logout
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-700 underline">
                        Sign in
                    </a>
                @endguest
            </div>
        </div>
    </header>

    <!-- Main Content Body -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-4 text-center text-sm text-gray-500 mt-auto">
        &copy; {{ date('Y') }} Davao City Health Center. All rights reserved.
    </footer>

</body>
</html>