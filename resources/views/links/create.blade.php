@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-3xl rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-200">
    <h1 class="text-3xl font-extrabold text-slate-900">Ajouter un lien</h1>

    <form method="POST" action="{{ route('links.store') }}" class="mt-8 space-y-6">
        @csrf

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">Titre</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full rounded-2xl border-slate-300 px-4 py-3 focus:border-violet-500 focus:ring-violet-500" placeholder="Instagram">
            @error('title') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">URL</label>
            <input type="url" name="url" value="{{ old('url') }}" class="w-full rounded-2xl border-slate-300 px-4 py-3 focus:border-violet-500 focus:ring-violet-500" placeholder="https://instagram.com/moncompte">
            @error('url') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">Icone</label>
            <input type="text" name="icon" value="{{ old('icon') }}" class="w-full rounded-2xl border-slate-300 px-4 py-3 focus:border-violet-500 focus:ring-violet-500" placeholder="instagram">
            @error('icon') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
        </div>

        <label class="flex items-center gap-3 rounded-2xl bg-slate-50 p-4">
            <input type="checkbox" name="is_active" value="1" checked class="rounded border-slate-300 text-violet-600 focus:ring-violet-500">
            <span class="text-sm font-medium text-slate-700">Activer ce lien immediatement</span>
        </label>

        <div class="flex flex-wrap gap-3">
            <button class="rounded-2xl bg-violet-600 px-5 py-3 font-semibold text-white hover:bg-violet-700">Enregistrer</button>
            <a href="{{ route('links.index') }}" class="rounded-2xl border border-slate-300 px-5 py-3 font-semibold text-slate-700 hover:bg-slate-50">Annuler</a>
        </div>
@endsection
