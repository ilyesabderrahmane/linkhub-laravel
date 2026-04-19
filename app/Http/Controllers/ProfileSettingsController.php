<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileSettingsController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user();

        return view('settings.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'username' => ['required', 'string', 'min:3', 'max:50', Rule::unique('users', 'username')->ignore($user->id)],
            'display_name' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:500'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'theme_background' => ['nullable', 'string', 'max:255'],
            'theme_card' => ['nullable', 'string', 'max:50'],
            'theme_button' => ['nullable', 'string', 'max:50'],
        ]);

        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
           }

            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update([
            'username' => $data['username'],
            'display_name' => $data['display_name'],
            'bio' => $data['bio'] ?? null,
            'avatar' => $data['avatar'] ?? $user->avatar,
            'theme_background' => $data['theme_background'] ?? 'linear-gradient(135deg, #e9d5ff 0%, #bfdbfe 100%)',
            'theme_card' => $data['theme_card'] ?? '#ffffff',
            'theme_button' => $data['theme_button'] ?? '#7c3aed',
        ]);

        return redirect()
            ->route('settings.profile.edit')
            ->with('success', 'Profil mis a jour avec succes.');
    }
}
