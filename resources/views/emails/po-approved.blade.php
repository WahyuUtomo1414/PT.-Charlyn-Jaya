<x-mail::message>
@if(isset($logoBase64) && $logoBase64)
<div style="text-align: center; margin-bottom: 20px;">
<img src="{{ $logoBase64 }}" alt="{{ $perusahaan?->nama ?? 'PT. CHARLYN JAYA' }}" style="max-height: 80px;">
</div>
@endif

# Purchase Order Approved

Halo **{{ $po->createdBy?->name ?? 'Pelanggan' }}**,

Kami informasikan bahwa Purchase Order anda dengan nomor **{{ $po->no_po }}** telah di-**Approve**.

**Detail PO:**
- **Nomor PO:** {{ $po->no_po }}
- **Perusahaan:** {{ $po->penawaran?->nama_perusahaan ?? '-' }}
- **Layanan:** {{ $po->penawaran?->layanan?->nama ?? '-' }}
- **Status:** Approved

Jika anda memiliki pertanyaan lebih lanjut, silakan hubungi kami melalui kontak di bawah ini.

Terima kasih,<br>
**{{ $perusahaan?->nama ?? config('app.name') }}**

---
@if($perusahaan)
**{{ $perusahaan->nama }}**  
{{ $perusahaan->alamat ?? '-' }}  
Email: {{ $perusahaan->email ?? '-' }} | Telp/WA: {{ $perusahaan->no_wa ?? '-' }}
@endif
</x-mail::message>
