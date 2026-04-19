@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-5xl grid gap-6 lg:grid-cols-2">
    <div class="rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-200">
        <h1 class="text-3xl font-extrabold text-slate-900">Mon QR Code</h1>
        <p class="mt-2 text-slate-500">Ce QR code redirige vers ta page publique de liens.</p>

        <div class="mt-8 flex justify-center rounded-3xl bg-slate-50 p-8">
            <div class="rounded-2xl bg-white p-4 shadow-sm">
                <img
                    src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data={{ urlencode($publicUrl) }}"
                    alt="QR Code"
                    class="h-[280px] w-[280px]"
                >
            </div>
        </div>

        <div class="mt-6">
            <p class="text-sm font-semibold text-slate-700">URL publique</p>
            <div class="mt-2 rounded-2xl bg-slate-50 p-4 text-sm text-slate-600 break-all">
                {{ $publicUrl }}
            </div>
        </div>
    </div>
</div>
@endsection
