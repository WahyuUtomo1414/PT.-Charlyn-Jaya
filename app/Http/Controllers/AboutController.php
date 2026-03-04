<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Sertifikat;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function __invoke(): View
    {
        $perusahaan = Perusahaan::query()
            ->orderBy('id')
            ->first(['id', 'nama', 'tentang_kami', 'filosofi', 'visi', 'misi', 'foto']);

        $heroImage = $perusahaan?->foto;
        $heroImageUrl = $heroImage
            ? (Str::startsWith($heroImage, ['http://', 'https://'])
                ? $heroImage
                : route('private-file', ['path' => ltrim($heroImage, '/')]))
            : 'https://images.unsplash.com/photo-1574169208507-84376144848b?auto=format&fit=crop&q=80';

        $misiList = collect($perusahaan?->misi ?? []);

        $sertifikats = Sertifikat::query()
            ->orderBy('id')
            ->get(['id', 'nama', 'jenis', 'foto'])
            ->map(function (Sertifikat $item) {
                $foto = $item->foto;
                $fotoUrl = null;

                if ($foto) {
                    if (Str::startsWith($foto, ['http://', 'https://'])) {
                        $fotoUrl = $foto;
                    } elseif (Str::startsWith($foto, ['storage/', '/storage/'])) {
                        $fotoUrl = asset(ltrim($foto, '/'));
                    } else {
                        $fotoUrl = Storage::disk('public')->url($foto);
                    }
                }

                $item->foto_url = $fotoUrl;

                return $item;
            });

        return view('pages.about', [
            'perusahaan' => $perusahaan,
            'heroImageUrl' => $heroImageUrl,
            'misiList' => $misiList,
            'sertifikats' => $sertifikats,
        ]);
    }
}
