<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Layanan;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $customers = Customer::query()
            ->orderBy('id')
            ->limit(6)
            ->get(['id', 'nama', 'logo']);

        $layanan = Layanan::query()
            ->orderBy('id')
            ->limit(3)
            ->get(['id', 'nama', 'deskripsi', 'benner', 'icon', 'foto']);

        return view('pages.home', [
            'customers' => $customers,
            'layanan' => $layanan,
        ]);
    }
}
