<x-layout.app>
    <x-slot name="title">Detail Purchase Order #{{ $po->no_po }}</x-slot>

    <!-- Hero Section -->
    <section class="relative bg-primary pt-32 pb-24 sm:pt-40 sm:pb-32 overflow-hidden isolate border-b-2 border-slate-100">
        <div class="absolute inset-0 -z-10 opacity-20"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px;"></div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tight text-white mb-6">Detail <span
                    class="text-secondary">Purchase Order</span></h1>
            <p class="text-lg text-slate-300 max-w-3xl mx-auto font-medium">Informasi lengkap mengenai Purchase Order yang telah dikirim.</p>
        </div>
    </section>

    <div class="min-h-screen bg-slate-50 py-12 px-4 sm:px-6 lg:px-8 text-slate-900">
        <div class="max-w-4xl mx-auto space-y-8">
            @php
                $statusLabel = match ($po->status) {
                    'pending' => 'Menunggu Review',
                    'approve' => 'PO Disetujui',
                    'reject' => 'PO Ditolak',
                    default => ucfirst($po->status ?? '-'),
                };

                $statusClasses = match ($po->status) {
                    'pending' => 'bg-amber-50 text-amber-700 border-amber-200',
                    'approve' => 'bg-green-50 text-green-700 border-green-200',
                    'reject' => 'bg-red-50 text-red-700 border-red-200',
                    default => 'bg-slate-100 text-slate-700 border-slate-200',
                };
            @endphp

            <div class="bg-white p-8 sm:p-10 rounded-3xl shadow-sm border border-slate-100">
                <!-- Header -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 border-b border-slate-100 pb-6 gap-4">
                    <div>
                        <div class="flex flex-wrap items-center gap-2 mb-2">
                            <span class="px-3 py-1 bg-indigo-50 text-indigo-700 text-xs font-bold rounded-full uppercase tracking-wide border border-indigo-100">Purchase Order</span>
                            <span class="text-slate-500 text-xs font-semibold">Ref: #{{ str_pad($po->penawaran_id, 5, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <h1 class="text-2xl sm:text-3xl font-black text-primary tracking-tight">{{ $po->no_po }}</h1>
                        <p class="mt-1 text-sm text-slate-500">Dikirim pada {{ \Carbon\Carbon::parse($po->created_at)->translatedFormat('d F Y H:i') }}</p>
                    </div>
                    <div>
                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-bold border {{ $statusClasses }}">
                            <i class="fa-solid fa-circle text-[8px] opacity-70"></i> {{ $statusLabel }}
                        </span>
                    </div>
                </div>

                <!-- Grid Data -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Penawaran Info -->
                    <div class="md:col-span-2 rounded-2xl border border-slate-200 bg-slate-50 p-5 sm:p-6">
                        <h3 class="text-sm font-bold text-slate-700 mb-4">Informasi Penawaran</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="rounded-xl bg-white border border-slate-200 p-4">
                                <p class="text-xs font-semibold text-slate-500 mb-1">Layanan Terkait</p>
                                <p class="text-base font-bold text-primary">{{ $po->penawaran->layanan?->nama ?? '-' }}</p>
                            </div>
                            <div class="rounded-xl bg-white border border-slate-200 p-4">
                                <p class="text-xs font-semibold text-slate-500 mb-1">Perusahaan</p>
                                <p class="text-base font-bold text-slate-800">{{ $po->penawaran->nama_perusahaan ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- File PO -->
                    <div class="col-span-1 md:col-span-2">
                        <h3 class="text-sm font-bold text-slate-700 mb-3">Dokumen Purchase Order</h3>
                        <a href="{{ route('po.file', $po->id) }}" target="_blank"
                            class="flex items-center gap-4 p-5 rounded-2xl border border-slate-200 bg-white hover:border-indigo-300 hover:bg-indigo-50/40 transition-colors group">
                            <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600">
                                <i class="fa-solid fa-file-lines text-lg"></i>
                            </div>
                            <div class="flex-grow">
                                <p class="text-sm sm:text-base font-bold text-slate-900 truncate">{{ basename($po->file_po ?? 'Berkas Purchase Order') }}</p>
                                <p class="text-xs text-slate-500">Klik untuk membuka atau mengunduh dokumen.</p>
                            </div>
                            <div class="text-slate-400 group-hover:text-indigo-600 transition-colors">
                                <i class="fa-solid fa-download"></i>
                            </div>
                        </a>
                    </div>

                    <!-- Catatan -->
                    <div class="col-span-1 md:col-span-2">
                        <h3 class="text-sm font-bold text-slate-700 mb-3">Catatan Tambahan</h3>
                        <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 text-slate-700 text-sm leading-relaxed">
                            {{ filled($po->catatan) ? $po->catatan : '-' }}
                        </div>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="border-t border-slate-100 pt-6 mt-8 flex flex-col sm:flex-row justify-between items-center gap-3">
                    <a href="{{ route('penawaran.index') }}"
                        class="w-full sm:w-auto px-6 py-3 rounded-xl border border-slate-300 text-slate-700 font-bold hover:bg-slate-50 transition-colors text-center">
                        <i class="fa-solid fa-arrow-left-long mr-2"></i> Kembali ke Monitoring
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-layout.app>
