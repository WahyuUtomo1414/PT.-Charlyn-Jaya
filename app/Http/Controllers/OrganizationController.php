<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\View\View;

class OrganizationController extends Controller
{
    public function __invoke(): View
    {
        $karyawans = Karyawan::query()
            ->where('active', true)
            ->orderBy('urutan')
            ->orderBy('id')
            ->get(['id', 'nama', 'jabatan', 'foto', 'parent_id', 'urutan']);

        $grouped = $karyawans->groupBy('parent_id');
        $root = $grouped->get(null)?->first();
        $level2 = $root ? $grouped->get($root->id)?->first() : null;
        $level3 = $level2 ? $grouped->get($level2->id, collect()) : collect();

        return view('pages.organization', [
            'root' => $root,
            'level2' => $level2,
            'level3' => $level3,
            'grouped' => $grouped,
        ]);
    }
}
