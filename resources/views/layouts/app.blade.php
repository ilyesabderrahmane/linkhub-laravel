<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'LinkHub') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900 antialiased">
    <div class="min-h-screen">
        <nav class="border-b border-slate-200 bg-white shadow-sm">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <a href="{{ route('dashboard') }}" class="text-2xl font-extrabold text-violet-600">LinkHub</a>

                @auth
                    <div class="flex items-center gap-3 text-sm">
                        <a href="{{ route('dashboard') }}" class="rounded-lg px-3 py-2 hover:bg-slate-100">Dashboard</a>
                        <a href="{{ route('links.index') }}" class="rounded-lg px-3 py-2 hover:bg-slate-100">Liens</a>
                        <a href="{{ route('qr.show') }}" class="rounded-lg px-3 py-2 hover:bg-slate-100">QR Code</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="rounded-xl bg-slate-900 px-4 py-2 font-medium text-white hover:bg-slate-800">
                                Deconnexion
                            </button>
                        </form>
                    </div>
                @endauth

                @guest
                    <div class="flex items-center gap-3 text-sm">
                        <a href="{{ route('login') }}" class="rounded-lg px-3 py-2 hover:bg-slate-100">Connexion</a>
                        <a href="{{ route('register') }}" class="rounded-xl bg-violet-600 px-4 py-2 font-medium text-white hover:bg-violet-700">
                            Inscription
                        </a>
                    </div>
                @endguest
            </div>
        </nav>

        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
            {{ $slot ?? '' }}
        </main>
    </div>
</body>
</html>
