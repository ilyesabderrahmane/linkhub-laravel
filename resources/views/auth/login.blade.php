@extends('layouts.app')

@section('content')
<div class="flex min-h-screen items-center justify-center bg-gradient-to-br from-violet-100 to-indigo-200 px-4">

    <div class="w-full max-w-md rounded-3xl bg-white p-8 shadow-2xl">

        <h2 class="mb-6 text-center text-3xl font-bold text-gray-800">
            Connexion
        </h2>

        @if(session('error'))
            <div class="mb-4 rounded-xl bg-red-100 p-3 text-sm text-red-600">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email"
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-violet-500 focus:ring focus:ring-violet-200"
                    placeholder="email@email.com" required>
            </div>

            <!-- Password -->
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" name="password"
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-violet-500 focus:ring focus:ring-violet-200"
                    placeholder="********" required>
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full rounded-xl bg-violet-600 py-3 font-semibold text-white shadow-lg transition hover:bg-violet-700">
                Se connecter
            </button>

            <!-- Register link -->
            <p class="text-center text-sm text-gray-600">
                Pas encore de compte ?
                <a href="{{ route('register') }}" class="font-semibold text-violet-600 hover:underline">
                    Créer un compte
                </a>
            </p>
        </form>
    </div>
</div>
@endsection
