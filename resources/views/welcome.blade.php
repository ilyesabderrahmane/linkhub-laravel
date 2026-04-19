<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkHub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 flex items-center justify-center">
    <div class="max-w-xl rounded-3xl bg-white p-10 shadow-xl text-center">
        <h1 class="text-4xl font-bold text-slate-900">LinkHub</h1>
        <p class="mt-6 text-lg leading-8 text-slate-600">
            Cree ton profil, ajoute tes reseaux et partage un seul QR code.
        </p>

        <div class="mt-8 flex justify-center gap-3">
            <a href="{{ route('register') }}" class="rounded-2xl bg-violet-600 px-6 py-3 font-semibold text-white shadow hover:bg-violet-700">
                Creer un compte
            </a>
            <a href="{{ route('login') }}" class="rounded-2xl border border-slate-300 px-6 py-3 font-semibold text-slate-700 hover:bg-slate-50">
                Se connecter
            </a>
        </div>
    </div>
</body>
</html>
