@extends('layouts.app')

@section('content')
<div class="grid gap-6 lg:grid-cols-3">
    <div class="lg:col-span-2 rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-200">
        <h1 class="text-3xl font-extrabold text-slate-900">Personnaliser mon profil</h1>

        <form method="POST" action="{{ route('settings.profile.update') }}" enctype="multipart/form-data" class="mt-8 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Nom d'utilisateur</label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}" class="w-full rounded-2xl border-slate-300 px-4 py-3 focus:border-violet-500 focus:ring-violet-500">
                    @error('username') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Nom affiche</label>
                    <input type="text" name="display_name" value="{{ old('display_name', $user->display_name) }}" class="w-full rounded-2xl border-slate-300 px-4 py-3 focus:border-violet-500 focus:ring-violet-500">
                    @error('display_name') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Bio</label>
                <textarea name="bio" rows="4" class="w-full rounded-2xl border-slate-300 px-4 py-3 focus:border-violet-500 focus:ring-violet-500">{{ old('bio', $user->bio) }}</textarea>
                @error('bio') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Avatar</label>
                <input type="file" name="avatar" class="block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700">
                @error('avatar') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
            </div>
@endsection
