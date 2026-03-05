<x-layout.app>
    <x-slot name="title">Detail Penawaran #{{ str_pad($penawaran->id, 5, '0', STR_PAD_LEFT) }}</x-slot>

    <!-- Hero Section -->
    <section class="relative bg-primary pt-32 pb-24 sm:pt-40 sm:pb-32 overflow-hidden isolate border-b-2 border-slate-100">
        <div class="absolute inset-0 -z-10 opacity-20"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px;"></div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tight text-white mb-6">Detail <span
                    class="text-secondary">Penawaran</span></h1>
            <p class="text-lg text-slate-300 max-w-3xl mx-auto font-medium">Informasi lengkap mengenai penawaran yang
                telah diajukan.</p>
        </div>
    </section>

    <div class="min-h-screen bg-slate-50 py-12 px-4 sm:px-6 lg:px-8 text-slate-900" x-data="{ fileUrl: '{{ $penawaran->file ? route('penawaran.file', $penawaran->id) : '' }}' }">
        <div class="max-w-3xl mx-auto">

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
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-sm font-bold bg-amber-100 text-amber-800">
                                <i class="fa-solid fa-clock opacity-70"></i> Pending
                            </span>
                        @elseif($penawaran->status === 'approve')
                            <span
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-sm font-bold bg-green-100 text-green-800">
                                <i class="fa-solid fa-check-circle opacity-70"></i> Approve
                            </span>
                        @elseif($penawaran->status === 'reject')
                            <span
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-sm font-bold bg-red-100 text-red-800">
                                <i class="fa-solid fa-times-circle opacity-70"></i> Reject
                            </span>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                    <div class="col-span-1 md:col-span-2">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Layanan yang Diajukan
                        </h3>
                        <p class="text-lg font-semibold text-slate-800">{{ $penawaran->layanan?->nama ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Nama Perusahaan</h3>
                        <p class="text-base font-medium text-slate-800">{{ $penawaran->nama_perusahaan ?? '-' }}</p>
                    </div>

                    <div>
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Tanggal Permintaan
                        </h3>
                        <p class="text-base font-medium text-slate-800">
                            {{ \Carbon\Carbon::parse($penawaran->tanggal_permintaan)->translatedFormat('d F Y') }}
                        </p>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Alamat</h3>
                        <p class="text-base text-slate-700 bg-slate-50 p-4 rounded-xl border border-slate-100">
                            {{ $penawaran->alamat ?? '-' }}</p>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Deskripsi Kebutuhan
                        </h3>
                        <p class="text-base text-slate-700 bg-slate-50 p-4 rounded-xl border border-slate-100">
                            {{ $penawaran->deskripsi ?? '-' }}</p>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Catatan Tambahan</h3>
                        <p class="text-base text-slate-700 bg-slate-50 p-4 rounded-xl border border-slate-100">
                            {{ $penawaran->catatan ?? '-' }}</p>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">File Lampiran</h3>
                        @if ($penawaran->file)
                            <div class="flex items-center gap-4 p-4 rounded-xl border border-slate-200 bg-slate-50">
                                <div
                                    class="w-12 h-12 flex-shrink-0 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
                                    @if (str_ends_with(strtolower($penawaran->file), 'pdf'))
                                        <i class="fa-solid fa-file-pdf text-xl"></i>
                                    @elseif(in_array(pathinfo($penawaran->file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                        <i class="fa-solid fa-file-image text-xl"></i>
                                    @else
                                        <i class="fa-solid fa-file-lines text-xl"></i>
                                    @endif
                                </div>
                                <div class="flex-grow min-w-0">
                                    <p class="text-sm font-semibold text-slate-900 truncate">
                                        {{ basename($penawaran->file) }}</p>
                                    <p class="text-xs text-slate-500">Telah dilampirkan</p>
                                </div>
                                <a :href="fileUrl" target="_blank"
                                    class="flex-shrink-0 px-4 py-2 bg-primary text-white hover:bg-primary-light rounded-lg font-bold transition-colors text-sm flex items-center gap-2">
                                    <i class="fa-solid fa-eye"></i> Lihat
                                </a>
                            </div>
                        @else
                            <p class="text-sm text-slate-500 italic">Tidak ada file yang dilampirkan.</p>
                        @endif
                    </div>
                </div>

                <div
                    class="border-t border-slate-100 pt-6 mt-8 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <a href="{{ route('penawaran.index') }}"
                        class="w-full sm:w-auto px-6 py-3 rounded-xl border border-slate-300 text-slate-700 font-bold hover:bg-slate-50 transition-colors text-center">
                        <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
                    </a>
                    @if ($penawaran->status === 'approve')
                        <a href="{{ route('penawaran.print', $penawaran->id) }}" target="_blank"
                            class="w-full sm:w-auto px-6 py-3 rounded-xl bg-blue-600 text-white font-bold shadow-md hover:bg-blue-700 hover:-translate-y-0.5 transition-all text-center">
                            <i class="fa-solid fa-print mr-2"></i> Print Penawaran
                        </a>
                    @endif
                </div>
            </div>

        </div>

    </div>
</x-layout.app>
