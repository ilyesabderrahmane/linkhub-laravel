@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Mes liens</h1>
            <p class="mt-1 text-slate-500">Gère tous tes liens depuis ici.</p>
        </div>
    </div>

    <div class="rounded-3xl bg-white p-6 shadow">
        <h2 class="mb-4 text-xl font-bold text-slate-900">Ajouter un lien</h2>

        <form method="POST" action="{{ route('links.store') }}" class="grid gap-4 md:grid-cols-2">
            @csrf

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Titre</label>
                <input type="text" name="title" class="w-full rounded-xl border border-slate-300 px-4 py-3" placeholder="Instagram" required>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">URL</label>
                <input type="url" name="url" class="w-full rounded-xl border border-slate-300 px-4 py-3" placeholder="https://instagram.com/..." required>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Icône</label>
                <input type="text" name="icon" class="w-full rounded-xl border border-slate-300 px-4 py-3" placeholder="instagram">
            </div>

            <div class="flex items-end">
                <button type="submit" class="w-full rounded-xl bg-violet-600 px-4 py-3 font-semibold text-white hover:bg-violet-700">
                    Ajouter
                </button>
            </div>
        </form>
    </div>

    <div class="rounded-3xl bg-white p-6 shadow">
        <h2 class="mb-4 text-xl font-bold text-slate-900">Liste des liens</h2>

        <div class="space-y-4">
            @forelse($links as $link)
                <div class="rounded-2xl border border-slate-200 p-4">
                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900">{{ $link->title }}</h3>
                            <p class="text-sm text-slate-500 break-all">{{ $link->url }}</p>

                            <div class="mt-2 flex flex-wrap gap-4 text-sm text-slate-500">
                                <span>Icône : {{ $link->icon ?: 'Aucune' }}</span>
                                <span>Position : {{ $link->position }}</span>
                                <span>Clics : {{ $link->click_count ?? 0 }}</span>
                                <span>
                                    Statut :
                                    @if($link->is_active)
                                        <span class="font-semibold text-emerald-600">Actif</span>
                                    @else
                                        <span class="font-semibold text-red-600">Inactif</span>
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('links.edit', $link) }}"
                               class="rounded-xl border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
                                Modifier
                            </a>

                            <form method="POST" action="{{ route('links.destroy', $link) }}" onsubmit="return confirm('Supprimer ce lien ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="rounded-xl bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">
                                    Supprimer
                                </button>
                            </form>
                        </div>
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
