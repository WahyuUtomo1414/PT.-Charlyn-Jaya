<x-layout.app>
    <x-slot name="title">Detail Penawaran #{{ str_pad($penawaran->id, 5, '0', STR_PAD_LEFT) }}</x-slot>

    <!-- Hero Section -->
    <section class="relative bg-primary pt-48 pb-16 overflow-hidden isolate border-b-2 border-slate-100">
        <div class="absolute inset-0 -z-10 opacity-20"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px;"></div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tight text-white mb-4">Detail <span
                    class="text-secondary">Penawaran</span></h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto font-medium">Informasi lengkap mengenai penawaran yang
                telah diajukan.</p>
        </div>
    </section>

    <div class="min-h-screen bg-slate-50 py-12 px-4 sm:px-6 lg:px-8 text-slate-900" x-data="{ showModal: false, fileUrl: '{{ $penawaran->file ? asset('storage/' . $penawaran->file) : '' }}', fileType: '{{ $penawaran->file ? (str_ends_with(strtolower($penawaran->file), 'pdf') ? 'application/pdf' : (in_array(pathinfo($penawaran->file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']) ? 'image/' . pathinfo($penawaran->file, PATHINFO_EXTENSION) : 'other')) : '' }}' }">
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
                            {{ \Carbon\Carbon::parse($penawaran->tanggal_permintaan)->translatedFormat('d F Y H:i') }}
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
                                <button type="button" @click="showModal = true"
                                    class="flex-shrink-0 px-4 py-2 bg-white border border-slate-300 hover:bg-slate-100 text-slate-700 rounded-lg font-bold transition-colors text-sm flex items-center gap-2">
                                    <i class="fa-solid fa-eye"></i> Lihat
                                </button>
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

        <!-- File Preview Modal -->
        <div x-show="showModal" class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true"
            x-cloak>
            <div x-show="showModal" x-transition.opacity
                class="fixed inset-0 bg-slate-900/75 backdrop-blur-sm transition-opacity"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                    <div x-show="showModal" x-transition.opacity x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-4xl flex flex-col h-[80vh]">
                        <div
                            class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 border-b border-slate-100 flex justify-between items-center">
                            <h3 class="text-lg font-bold leading-6 text-slate-900" id="modal-title">Preview File</h3>
                            <button @click="showModal = false" type="button"
                                class="text-slate-400 hover:text-slate-600 focus:outline-none">
                                <i class="fa-solid fa-xmark text-xl"></i>
                            </button>
                        </div>
                        <div class="bg-slate-50 p-4 flex-grow overflow-auto flex items-center justify-center">
                            <template x-if="fileType && fileType.startsWith('image/')">
                                <img :src="fileUrl"
                                    class="max-w-full max-h-full object-contain rounded-lg shadow-sm" alt="Preview" />
                            </template>
                            <template x-if="fileType === 'application/pdf'">
                                <iframe :src="fileUrl"
                                    class="w-full h-full rounded-lg border border-slate-200"></iframe>
                            </template>
                            <template
                                x-if="fileType && !fileType.startsWith('image/') && fileType !== 'application/pdf'">
                                <div class="text-center text-slate-500">
                                    <i class="fa-solid fa-file-lines text-6xl mb-4 text-slate-300"></i>
                                    <p>Tipe file ini dapat diunduh untuk dilihat.</p>
                                    <a :href="fileUrl" download
                                        class="mt-4 inline-block px-4 py-2 bg-primary text-white rounded-lg font-bold">Download
                                        File</a>
                                </div>
                            </template>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="button" @click="showModal = false"
                                class="mt-3 inline-flex w-full justify-center rounded-xl bg-white px-6 py-2 text-sm font-semibold text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 hover:bg-slate-50 sm:mt-0 sm:w-auto">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
