<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;

class ProfilePageController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $links = $user->links()
            ->where('is_active', true)
            ->orderBy('position')
            ->orderByDesc('created_at')
            ->get();

        return view('public.profile', compact('user', 'links'));
    }

    public function redirect(Link $link)
    {
        abort_unless($link->is_active, 404);

        $link->increment('click_count');

        return redirect()->away($link->url);
    }
}
