@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="rounded-3xl bg-gradient-to-r from-violet-600 to-indigo-600 p-8 text-white shadow-xl">
        <h1 class="text-3xl font-bold">
            Bonjour {{ $user->name ?? 'Utilisateur' }} 👋
        </h1>
        <p class="mt-2 text-white/90">
            Bienvenue sur ton dashboard LinkHub.
        </p>
    </div>

    <div class="grid gap-6 md:grid-cols-3">
        <div class="rounded-3xl bg-white p-6 shadow">
            <p class="text-sm text-slate-500">Total liens</p>
            <h2 class="mt-2 text-3xl font-bold text-slate-900">
                {{ $user ? $user->links->count() : 0 }}
            </h2>
        </div>

        <div class="rounded-3xl bg-white p-6 shadow">
            <p class="text-sm text-slate-500">Profil public</p>
            <a href="{{ $user ? route('public.profile', $user->username) : '#' }}"
               class="mt-2 inline-block font-semibold text-violet-600 hover:underline">
                Voir mon profil
            </a>
        </div>

        <div class="rounded-3xl bg-white p-6 shadow">
            <p class="text-sm text-slate-500">QR Code</p>
            <a href="{{ route('qr.show') }}"
               class="mt-2 inline-block font-semibold text-violet-600 hover:underline">
                Voir mon QR code
            </a>
        </div>
    </div>

    <div class="rounded-3xl bg-white p-6 shadow">
        <div class="mb-6 flex items-center justify-between">
            <h2 class="text-xl font-bold text-slate-900">Mes liens récents</h2>
            <a href="{{ route('links.index') }}" class="text-sm font-semibold text-violet-600 hover:text-violet-700">
                Voir tout
            </a>
        </div>

        <div class="space-y-4">
            @forelse($user->links->take(5) as $link)
                <div class="flex items-center justify-between rounded-2xl border border-slate-200 px-4 py-4">
                    <div>
                        <h3 class="font-semibold text-slate-900">{{ $link->title }}</h3>
                        <p class="text-sm text-slate-500">{{ $link->url }}</p>
                    </div>

                    <div class="text-sm text-slate-500">
                        {{ $link->click_count ?? 0 }} clics
                    </div>
                </div>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-300 p-6 text-center text-slate-500">
                    Aucun lien pour le moment.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
