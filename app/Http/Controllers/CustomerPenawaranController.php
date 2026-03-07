<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Penawaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CustomerPenawaranController extends Controller
{


    public function index()
    {
        // View for monitoring penawaran
        // We assume 'created_by' is used to track ownership via AuditedBySoftDelete trait, or we just rely on standard methods. 
        // If there's no explicit relation, we query by created_by.
        $penawarans = Penawaran::with(['layanan', 'po'])
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
            'quantity' => 'required|integer|min:1',
            'deadline_pengerjaan' => 'required|date_format:Y-m-d',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
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
        $penawaran->quantity = $validated['quantity'];
        $penawaran->deadline_pengerjaan = $validated['deadline_pengerjaan'];
        $penawaran->deskripsi = $validated['deskripsi'] ?? null;
        $penawaran->catatan = $validated['catatan'] ?? null;
        $penawaran->status = 'pending';
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

    public function file($id, Request $request): StreamedResponse
    {
        $penawaran = Penawaran::findOrFail($id);

        // Ensure customer can only view their own penawaran
        if ($penawaran->created_by !== Auth::id() && !Auth::user()->hasRole('super-admin') && Auth::id() !== 1) {
            abort(403, 'Unauthorized action.');
        }

        $type = $request->query('type', 'customer');
        $filePath = ($type === 'admin') ? $penawaran->file_penawaran : $penawaran->file;

        abort_unless($filePath, 404);

        $normalizedPath = ltrim($filePath, '/');
        $publicPath = Str::startsWith($normalizedPath, 'storage/')
            ? Str::after($normalizedPath, 'storage/')
            : $normalizedPath;

        $disk = null;
        $resolvedPath = null;

        if (Storage::disk('local')->exists($normalizedPath)) {
            $disk = Storage::disk('local');
            $resolvedPath = $normalizedPath;
        } elseif (Storage::disk('public')->exists($publicPath)) {
            $disk = Storage::disk('public');
            $resolvedPath = $publicPath;
        }

        abort_unless($disk && $resolvedPath, 404);

        $mimeType = $disk->mimeType($resolvedPath) ?? 'application/octet-stream';
        $filename = basename($resolvedPath);

        return $disk->response($resolvedPath, $filename, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="'.$filename.'"',
        ]);
    }
}
