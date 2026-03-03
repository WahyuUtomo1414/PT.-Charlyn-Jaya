<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(): View
    {
        $layanan = Layanan::query()
            ->orderBy('id')
            ->get(['id', 'nama', 'deskripsi', 'lingkup_layanan', 'benner', 'icon', 'foto']);

        return view('pages.project', [
            'layanan' => $layanan,
        ]);
    }

    public function show($slug): View
    {
        $layanan = Layanan::query()
            ->orderBy('id')
            ->get()
            ->first(function (Layanan $item) use ($slug) {
                return Str::slug($item->nama) === $slug;
            });

        if (!$layanan) {
            abort(404);
        }

        $customers = Customer::query()
            ->orderBy('id')
            ->limit(6)
            ->get(['id', 'nama', 'logo']);

        return view('pages.service_detail', [
            'layanan' => $layanan,
            'customers' => $customers,
        ]);
    }
}
