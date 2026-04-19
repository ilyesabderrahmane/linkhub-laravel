<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        $links = $request->user()
            ->links()
            ->orderBy('position')
            ->orderByDesc('created_at')
            ->get();

        return view('links.index', compact('links'));
         }

    public function create()
    {
        return view('links.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:2048'],
            'icon' => ['nullable', 'string', 'max:50'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $maxPosition = (int) $request->user()->links()->max('position');

        $request->user()->links()->create([
            'title' => $data['title'],
            'url' => $data['url'],
            'icon' => $data['icon'] ?? null,
            'is_active' => $request->boolean('is_active', true),
            'position' => $maxPosition + 1,
        ]);

        return redirect()
            ->route('links.index')
            ->with('success', 'Lien ajoute avec succes.');
    }

    public function edit(Request $request, Link $link)
    {
        abort_unless($link->user_id === $request->user()->id, 403);

        return view('links.edit', compact('link'));
    }

    public function update(Request $request, Link $link)
    {
        abort_unless($link->user_id === $request->user()->id, 403);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:2048'],
            'icon' => ['nullable', 'string', 'max:50'],
            'is_active' => ['nullable', 'boolean'],
        ]);
         $link->update([
            'title' => $data['title'],
            'url' => $data['url'],
            'icon' => $data['icon'] ?? null,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('links.index')
            ->with('success', 'Lien mis a jour avec succes.');
    }

    public function destroy(Request $request, Link $link)
    {
        abort_unless($link->user_id === $request->user()->id, 403);

        $link->delete();

        return redirect()
            ->route('links.index')
            ->with('success', 'Lien supprime avec succes.');
    }
}
