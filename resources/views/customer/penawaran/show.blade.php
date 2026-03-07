<x-layout.app>
    <x-slot name="title">Detail Penawaran #{{ str_pad($penawaran->id, 5, '0', STR_PAD_LEFT) }}</x-slot>

    <!-- Hero Section -->
    <section
        class="relative bg-primary pt-32 pb-24 sm:pt-40 sm:pb-32 overflow-hidden isolate border-b-2 border-slate-100">
        <div class="absolute inset-0 -z-10 opacity-20"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px;"></div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tight text-white mb-6">Detail <span
                    class="text-secondary">Penawaran</span></h1>
            <p class="text-lg text-slate-300 max-w-3xl mx-auto font-medium">Informasi lengkap mengenai penawaran yang
                telah diajukan.</p>
        </div>
    </section>

    <div class="min-h-screen bg-slate-50 py-12 px-4 sm:px-6 lg:px-8 text-slate-900">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
                <div
                    class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 border-b border-slate-100 pb-6 gap-4">
                    <div>
                        <h1 class="text-2xl font-black text-primary tracking-tight">ID Penawaran:
                            #{{ str_pad($penawaran->id, 5, '0', STR_PAD_LEFT) }}</h1>
                        <p class="mt-1 text-sm text-slate-500">Diajukan pada
                            {{ \Carbon\Carbon::parse($penawaran->created_at)->translatedFormat('d F Y H:i') }}</p>
                    </div>
                    <div>
                        @if ($penawaran->status === 'pending')
                            <span
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-sm font-bold bg-amber-100 text-amber-800 border border-amber-200">
                                <i class="fa-solid fa-clock opacity-70"></i> Pending
                            </span>
                        @elseif($penawaran->status === 'po')
                            <span
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-sm font-bold bg-green-100 text-green-800 border border-green-200">
                                <i class="fa-solid fa-file-invoice opacity-70"></i> PO
                            </span>
                        @else
                            <span
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-sm font-bold bg-slate-100 text-slate-800 border border-slate-200">
                                {{ ucfirst($penawaran->status) }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <!-- Baris 1 -->
                    <div class="md:col-span-1">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Layanan</h3>
                        <p class="text-base font-bold text-primary">{{ $penawaran->layanan?->nama ?? 'N/A' }}</p>
                    </div>

                    <div class="md:col-span-1">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Nama Perusahaan</h3>
                        <p class="text-base font-medium text-slate-800">{{ $penawaran->nama_perusahaan ?? '-' }}</p>
                    </div>

                    <div class="md:col-span-1">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Quantity</h3>
                        <p class="text-base font-bold text-slate-800">{{ $penawaran->quantity ?? 0 }} Orang</p>
                    </div>

                    <!-- Baris 2 -->
                    <div class="md:col-span-1">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Tgl Permintaan</h3>
                        <p class="text-base font-medium text-slate-800">
                            {{ \Carbon\Carbon::parse($penawaran->tanggal_permintaan)->translatedFormat('d F Y') }}
                        </p>
                    </div>

                    <div class="md:col-span-1">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Deadline Pengerjaan
                        </h3>
                        <p class="text-base font-medium text-red-600 font-bold">
                            {{ $penawaran->deadline_pengerjaan ? \Carbon\Carbon::parse($penawaran->deadline_pengerjaan)->translatedFormat('d F Y') : '-' }}
                        </p>
                    </div>

                    <!-- Detail Section -->
                    <div class="col-span-1 md:col-span-3 border-t border-slate-100 pt-10">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Alamat Perusahaan
                        </h3>
                        <p
                            class="text-sm text-slate-700 bg-slate-50 p-5 rounded-2xl border border-slate-100 leading-relaxed text-justify">
                            {{ $penawaran->alamat ?? '-' }}</p>
                    </div>

                    <div class="col-span-1 md:col-span-3 border-t border-slate-100 pt-10">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Deskripsi Kebutuhan
                        </h3>
                        <div
                            class="text-sm text-slate-700 bg-slate-50 p-5 rounded-2xl border border-slate-100 leading-relaxed prose prose-slate max-w-none text-justify">
                            {{ $penawaran->deskripsi ?? '-' }}
                        </div>
                    </div>

                    <!-- File Customer -->
                    <div class="col-span-1 md:col-span-3 border-t border-slate-100 pt-10">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">File Lampiran
                            (Customer)</h3>
                        @if ($penawaran->file)
                            <a href="{{ route('penawaran.file', ['id' => $penawaran->id, 'type' => 'customer']) }}"
                                target="_blank"
                                class="flex items-center gap-4 p-4 rounded-2xl border-2 border-slate-100 bg-white hover:border-primary hover:shadow-xl hover:shadow-primary/10 transition-all duration-300 group max-w-md">
                                <div
                                    class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300">
                                    <i class="fa-solid fa-file-pdf text-xl"></i>
                                </div>
                                <div class="flex-grow min-w-0">
                                    <p class="text-sm font-bold text-slate-900 truncate">Lampiran Customer</p>
                                    <p class="text-[11px] text-slate-500 font-medium">Klik untuk melihat file</p>
                                </div>
                                <div class="text-slate-300 group-hover:text-primary transition-colors">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </div>
                            </a>
                        @else
                            <p
                                class="text-xs text-slate-400 italic bg-slate-50 p-4 rounded-xl border border-dashed border-slate-200 max-w-md text-justify">
                                Tidak ada lampiran dari customer.</p>
                        @endif
                    </div>

                    <!-- File Penawaran Admin -->
                    <div class="col-span-1 md:col-span-3 border-t border-slate-100 pt-10">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">Dokumen Penawaran
                            Resmi (Admin)</h3>
                        @if ($penawaran->file_penawaran)
                            <a href="{{ route('penawaran.file', ['id' => $penawaran->id, 'type' => 'admin']) }}"
                                target="_blank"
                                class="flex items-center gap-4 p-4 rounded-2xl border-2 border-slate-100 bg-white hover:border-green-600 hover:shadow-xl hover:shadow-green-600/10 transition-all duration-300 group max-w-md">
                                <div
                                    class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-700 group-hover:bg-green-600 group-hover:text-white transition-all duration-300">
                                    <i class="fa-solid fa-file-invoice-dollar text-xl"></i>
                                </div>
                                <div class="flex-grow min-w-0">
                                    <p class="text-sm font-bold text-slate-900 truncate">Dokumen Penawaran</p>
                                    <p class="text-[11px] text-slate-500 font-medium">Klik untuk mengunduh penawaran
                                        resmi</p>
                                </div>
                                <div class="text-slate-300 group-hover:text-green-600 transition-colors">
                                    <i class="fa-solid fa-download"></i>
                                </div>
                            </a>
                        @else
                            <div
                                class="flex items-center gap-4 p-5 rounded-2xl border border-dashed border-slate-200 bg-slate-50/50 max-w-md">
                                <div
                                    class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center text-slate-400">
                                    <i class="fa-solid fa-hourglass-half"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-600">Sedang Direview</p>
                                    <p class="text-xs text-slate-500 italic">Dokumen penawaran resmi sedang diproses.
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Footer Actions -->
                <div
                    class="border-t border-slate-100 pt-8 mt-12 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <a href="{{ route('penawaran.index') }}"
                        class="w-full sm:w-auto px-8 py-3 rounded-xl border border-slate-300 text-slate-700 font-bold hover:bg-slate-50 transition-all text-center text-sm">
                        <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Monitoring
                    </a>

                    @if ($penawaran->status === 'po')
                        {{-- <a href="{{ route('po.create', ['penawaran_id' => $penawaran->id]) }}"
                            class="w-full sm:w-auto px-10 py-4 rounded-xl bg-secondary text-primary font-black shadow-lg shadow-secondary/20 hover:bg-secondary-light hover:-translate-y-1 transition-all text-center">
                            <i class="fa-solid fa-plus-circle mr-2"></i> Buat PO Sekarang
                        </a> --}}
                    @endif
                </div>
            </div>

        </div>

    </div>
</x-layout.app>
