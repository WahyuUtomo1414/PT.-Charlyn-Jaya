<x-layout.app>
    <x-slot name="title">Buat Purchase Order (PO)</x-slot>

    <!-- Hero Section -->
    <section class="relative bg-primary pt-32 pb-24 sm:pt-40 sm:pb-32 overflow-hidden isolate border-b-2 border-slate-100">
        <div class="absolute inset-0 -z-10 opacity-20"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px;"></div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tight text-white mb-6">Buat <span
                    class="text-secondary">Purchase Order</span></h1>
            <p class="text-lg text-slate-300 max-w-3xl mx-auto font-medium">Lengkapi dokumen PO untuk melanjutkan proses kerja sama.</p>
        </div>
    </section>

    <div class="min-h-screen bg-slate-50 py-12 px-4 sm:px-6 lg:px-8 text-slate-900" x-data="{
        fileUrl: null,
        fileName: '',
        maxFileSize: 2 * 1024 * 1024,
        handleFile(e) {
            const file = e.target.files[0];
            if (file) {
                if (file.size > this.maxFileSize) {
                    alert('Ukuran file maksimal 2 MB.');
                    e.target.value = '';
                    this.fileUrl = null;
                    this.fileName = '';
                    return;
                }
                this.fileUrl = URL.createObjectURL(file);
                this.fileName = file.name;
            } else {
                this.fileUrl = null;
                this.fileName = '';
            }
        }
    }">
        <div class="max-w-4xl mx-auto align-top space-y-8">

            {{-- <!-- Card Ringkasan Penawaran -->
            <div class="bg-gradient-to-br from-slate-900 via-indigo-900 to-indigo-800 p-6 sm:p-8 rounded-3xl shadow-xl text-white relative overflow-hidden">
                <div class="absolute -top-6 -right-2 p-8 opacity-15 pointer-events-none">
                    <i class="fa-solid fa-file-invoice-dollar text-8xl sm:text-9xl"></i>
                </div>
                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex flex-col">
                            <span class="text-xs font-bold uppercase tracking-[0.16em] text-indigo-100/90 mb-1">Referensi Penawaran</span>
                            <div class="flex flex-wrap items-center gap-2 sm:gap-3">
                                <span class="text-xl sm:text-2xl font-black text-white">#{{ str_pad($penawaran->id, 5, '0', STR_PAD_LEFT) }}</span>
                                <span class="px-3 py-1 bg-white/20 text-white text-[11px] font-bold rounded-lg uppercase border border-white/25">Verified Request</span>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                        <div class="rounded-2xl bg-white/10 border border-white/15 p-4">
                            <h3 class="text-indigo-100 text-xs font-bold uppercase tracking-wider mb-1">Layanan Terkait</h3>
                            <p class="text-base sm:text-lg font-black text-white leading-tight">{{ $penawaran->layanan?->nama }}</p>
                        </div>
                        <div class="rounded-2xl bg-white/10 border border-white/15 p-4">
                            <h3 class="text-indigo-100 text-xs font-bold uppercase tracking-wider mb-1">Perusahaan</h3>
                            <p class="text-base sm:text-lg font-black text-white leading-tight">{{ $penawaran->nama_perusahaan ?? '-' }}</p>
                        </div>
                        <div class="rounded-2xl bg-white/10 border border-white/15 p-4">
                            <h3 class="text-indigo-100 text-xs font-bold uppercase tracking-wider mb-1">Quantity (Orang)</h3>
                            <p class="text-sm sm:text-base font-bold text-white">{{ $penawaran->quantity }} Orang</p>
                        </div>
                        <div class="rounded-2xl bg-white/10 border border-white/15 p-4">
                            <h3 class="text-indigo-100 text-xs font-bold uppercase tracking-wider mb-1">Deadline</h3>
                            <p class="text-sm sm:text-base font-bold text-white">{{ \Carbon\Carbon::parse($penawaran->deadline_pengerjaan)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Form PO -->
            <div class="bg-white p-8 sm:p-10 rounded-3xl shadow-sm border border-slate-100">
                <div class="mb-8 border-b border-slate-100 pb-6">
                    <h2 class="text-2xl font-black text-primary tracking-tight">Formulir Purchase Order</h2>
                    <p class="mt-2 text-slate-500 text-sm font-medium">Lengkapi dokumen PO resmi perusahaan Anda di bawah ini.</p>
                </div>

                @if ($errors->any())
                    <div class="bg-red-50 text-red-600 p-4 rounded-xl text-sm mb-6 border border-red-100">
                        <ul class="list-disc pl-5 font-medium">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('po.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    <input type="hidden" name="penawaran_id" value="{{ $penawaran->id }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nomor PO (Readonly) -->
                        <div class="col-span-1 md:col-span-2">
                            <label for="no_po" class="block text-sm font-bold text-slate-700 mb-2">Nomor PO (Otomatis)</label>
                            <div class="relative">
                                <input type="text" id="no_po" name="no_po" value="{{ old('no_po', $no_po) }}" readonly
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-primary font-bold focus:outline-none">
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-300">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                            </div>
                            @error('no_po')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Upload File PO -->
                        <div class="col-span-1 md:col-span-2">
                            <label for="file_po" class="block text-sm font-bold text-slate-700 mb-2">Upload Dokumen PO <span class="text-red-500">*</span></label>
                            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                                <input type="file" id="file_po" name="file_po" required
                                    accept=".pdf,.doc,.docx" @change="handleFile($event)"
                                    class="w-full px-3 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-colors text-slate-700 text-sm file:mr-2 file:py-1.5 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary/5 file:text-primary hover:file:bg-primary/10">

                                <a x-show="fileUrl" :href="fileUrl" target="_blank"
                                    class="flex-shrink-0 px-4 py-2.5 bg-primary/5 text-primary hover:bg-primary/10 rounded-xl font-bold transition-colors text-xs flex items-center justify-center gap-2 border border-primary/10">
                                    <i class="fa-solid fa-eye text-sm"></i> Pratinjau
                                </a>
                            </div>
                            <p x-show="fileName" class="mt-2 text-xs text-slate-500">File dipilih: <span class="font-semibold" x-text="fileName"></span></p>
                            <p class="mt-2 text-xs text-slate-500">Format: PDF, DOC, DOCX. Maksimal 2 MB.</p>
                            @error('file_po')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Catatan -->
                        <div class="col-span-1 md:col-span-2">
                            <label for="catatan" class="block text-sm font-bold text-slate-700 mb-2">Catatan Tambahan (Opsional)</label>
                            <textarea id="catatan" name="catatan" rows="4"
                                class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-colors text-slate-700 placeholder:text-slate-400"
                                placeholder="Tambahkan instruksi atau catatan khusus jika diperlukan...">{{ old('catatan') }}</textarea>
                            @error('catatan')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="border-t border-slate-100 pt-6 flex flex-col sm:flex-row justify-end gap-3">
                        <a href="{{ route('penawaran.show', $penawaran->id) }}"
                            class="px-6 py-3 rounded-xl border border-slate-300 text-slate-700 font-bold hover:bg-slate-50 transition-colors text-center">
                            Batalkan
                        </a>
                        <button type="submit"
                            class="px-8 py-3 rounded-xl bg-secondary text-primary font-bold shadow-md hover:bg-secondary-light hover:-translate-y-0.5 transition-all">
                            Submit Purchase Order
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-layout.app>
