<?php

namespace App\Http\Controllers;

use App\Models\Penawaran;
use App\Models\Po;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CustomerPoController extends Controller
{
    public function create(Request $request)
    {
        $penawaran_id = $request->query('penawaran_id');
        
        if (!$penawaran_id) {
            return redirect()->route('penawaran.index')->with('error', 'ID Penawaran tidak ditemukan.');
        }

        $penawaran = Penawaran::with('layanan')->findOrFail($penawaran_id);

        // Ensure customer owns the penawaran
        if ($penawaran->created_by !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Generate PO Number: PO-YYYYMMDD-0001
        $date = now()->format('Ymd');
        $lastPo = Po::where('no_po', 'like', "PO-$date-%")->orderBy('id', 'desc')->first();
        
        $sequence = 1;
        if ($lastPo) {
            $lastSequence = (int) substr($lastPo->no_po, -4);
            $sequence = $lastSequence + 1;
        }
        
        $no_po = "PO-$date-" . str_pad($sequence, 4, '0', STR_PAD_LEFT);

        return view('customer.po.create', compact('penawaran', 'no_po'));
    }

    public function show($id)
    {
        $po = Po::with(['penawaran.layanan'])->findOrFail($id);

        // Ensure customer owns the penawaran related to this PO
        if ($po->penawaran->created_by !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('customer.po.show', compact('po'));
    }

    public function file($id): StreamedResponse
    {
        $po = Po::with('penawaran')->findOrFail($id);

        // Security check
        if ($po->penawaran->created_by !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        abort_unless($po->file_po, 404);
        abort_unless(Storage::disk('public')->exists($po->file_po), 404);

        $mimeType = Storage::disk('public')->mimeType($po->file_po) ?? 'application/octet-stream';
        $filename = basename($po->file_po);

        return Storage::disk('public')->response($po->file_po, $filename, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="'.$filename.'"',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'penawaran_id' => 'required|exists:penawaran,id',
            'no_po' => 'required|string|unique:po,no_po',
            'file_po' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'catatan' => 'nullable|string|max:1000',
        ]);

        $po = new Po();
        $po->penawaran_id = $validated['penawaran_id'];
        $po->no_po = $validated['no_po'];
        $po->catatan = $validated['catatan'] ?? '-';
        $po->status = 'pending';
        $po->active = 1;

        if ($request->hasFile('file_po')) {
            $path = $request->file('file_po')->store('po', 'public');
            $po->file_po = $path;
        }

        $po->save();

        return redirect()->route('penawaran.index')->with('success', 'Purchase Order (PO) berhasil dikirim dan sedang dalam proses review.');
    }
}
