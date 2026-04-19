@extends('layouts.public')

@section('content')
<div class="min-h-screen px-4 py-10" style="background: {{ $user->theme_background ?: 'linear-gradient(135deg, #e9d5ff 0%, #bfdbfe 100%)' }};">
    <div class="mx-auto max-w-md">
        <div class="overflow-hidden rounded-[2rem] p-5 shadow-2xl" style="background-color: {{ $user->theme_card ?: '#ffffffee' }};">
            <div class="text-center">
                <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://placehold.co/120x120' }}" class="mx-auto h-28 w-28 rounded-full object-cover ring-4 ring-white/70" alt="avatar">
                <h1 class="mt-5 text-3xl font-extrabold text-slate-900">{{ $user->display_name ?: $user->username }}</h1>

                @if($user->bio)
                    <p class="mx-auto mt-3 max-w-sm text-sm leading-6 text-slate-600">{{ $user->bio }}</p>
                @endif
            </div>

            <div class="mt-8 space-y-4">
                @forelse($links as $link)
                    <a href="{{ route('links.redirect', $link) }}" class="block rounded-2xl px-5 py-4 text-center text-base font-semibold text-white shadow-lg transition duration-200 hover:scale-[1.02]" style="background-color: {{ $user->theme_button ?: '#7c3aed' }};">
                        {{ $link->title }}
                    </a>
                @empty
                    <div class="rounded-2xl border border-dashed border-slate-300 p-6 text-center text-slate-500">
                        Aucun lien disponible.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
