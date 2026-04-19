<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();
        $publicUrl = route('public.profile', $user->username);

        return view('qr.show', compact('user', 'publicUrl'));
    }
}
