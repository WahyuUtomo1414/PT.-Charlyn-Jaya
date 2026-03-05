<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Penawaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CustomerPenawaranController extends Controller
{


    public function index()
    {
        // View for monitoring penawaran
        // We assume 'created_by' is used to track ownership via AuditedBySoftDelete trait, or we just rely on standard methods. 
        // If there's no explicit relation, we query by created_by.
        $penawarans = Penawaran::with('layanan')
            ->where('created_by', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('customer.penawaran.index', compact('penawarans'));
    }

    public function create()
    {
        $layanans = Layanan::all();
        return view('customer.penawaran.create', compact('layanans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'layanan_id' => 'required|exists:layanan,id',
            'nama_perusahaan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'tanggal_permintaan' => 'required|date_format:Y-m-d',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png',
            'catatan' => 'nullable|string',
        ]);

        $penawaran = new Penawaran();
        $penawaran->layanan_id = $validated['layanan_id'];
        $penawaran->nama_perusahaan = $validated['nama_perusahaan'] ?? null;
        $penawaran->alamat = $validated['alamat'] ?? null;
        $defaultTime = now()->format('H:i:s');
        $penawaran->tanggal_permintaan = Carbon::createFromFormat('Y-m-d', $validated['tanggal_permintaan'])
            ->setTimeFromTimeString($defaultTime)
            ->format('Y-m-d H:i:s');
        $penawaran->deskripsi = $validated['deskripsi'] ?? null;
        $penawaran->catatan = $validated['catatan'] ?? null;
        $penawaran->status = 'pending';
        // Active status is not for customer and is handled by filament default, or we can set it here:
        $penawaran->active = 1;

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('penawaran', 'public');
            $penawaran->file = $path;
        }

        $penawaran->save();

        return redirect()->route('penawaran.index')->with('success', 'Penawaran berhasil dibuat dan sedang dalam status Pending.');
    }

    public function show($id)
    {
        $penawaran = Penawaran::with('layanan')->findOrFail($id);
        
        // Ensure customer can only view their own penawaran
        if ($penawaran->created_by !== Auth::id() && !Auth::user()->hasRole('super-admin') && Auth::id() !== 1) {
            abort(403, 'Unauthorized action.');
        }

        return view('customer.penawaran.show', compact('penawaran'));
    }

    public function file($id): StreamedResponse
    {
        $penawaran = Penawaran::findOrFail($id);

        if ($penawaran->created_by !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        abort_unless($penawaran->file, 404);
        abort_unless(Storage::disk('public')->exists($penawaran->file), 404);

        $mimeType = Storage::disk('public')->mimeType($penawaran->file) ?? 'application/octet-stream';
        $filename = basename($penawaran->file);

        return Storage::disk('public')->response($penawaran->file, $filename, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="'.$filename.'"',
        ]);
    }
}
