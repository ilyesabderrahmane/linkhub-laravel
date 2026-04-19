<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user()->load(['links' => function ($query) {
            $query->orderBy('position')->orderByDesc('created_at');
        }]);

        return view('dashboard', [
            'user' => $user,
            'links' => $user->links,
        ]);
    }
}
