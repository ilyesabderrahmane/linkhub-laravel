@extends('layouts.app')

@section('content')
<div class="flex min-h-screen items-center justify-center bg-gradient-to-br from-violet-100 to-indigo-200 px-4">

    <div class="w-full max-w-md rounded-3xl bg-white p-8 shadow-2xl">

        <h2 class="mb-6 text-center text-3xl font-bold text-gray-800">
            Créer un compte
        </h2>

        @if ($errors->any())
            <div class="mb-4 rounded-xl bg-red-100 p-3 text-sm text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Nom -->
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" name="name"
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-violet-500 focus:ring focus:ring-violet-200"
                    placeholder="Ton nom" required>
            </div>

            <!-- Username -->
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username"
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-violet-500 focus:ring focus:ring-violet-200"
                    placeholder="ex: abderrahmane" required>
            </div>

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

            <!-- Confirm Password -->
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700">Confirmer mot de passe</label>
                <input type="password" name="password_confirmation"
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-violet-500 focus:ring focus:ring-violet-200"
                    placeholder="********" required>
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full rounded-xl bg-violet-600 py-3 font-semibold text-white shadow-lg transition hover:bg-violet-700">
                S'inscrire
            </button>

            <!-- Login link -->
            <p class="text-center text-sm text-gray-600">
                Déjà un compte ?
                <a href="{{ route('login') }}" class="font-semibold text-violet-600 hover:underline">
                    Se connecter
                </a>
            </p>
        </form>
    </div>
</div>
@endsection
