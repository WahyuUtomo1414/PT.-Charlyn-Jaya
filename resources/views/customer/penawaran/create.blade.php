<x-layout.app>
    <x-slot name="title">Buat Penawaran</x-slot>

    <!-- Hero Section -->
    <section class="relative bg-primary pt-48 pb-16 overflow-hidden isolate border-b-2 border-slate-100">
        <div class="absolute inset-0 -z-10 opacity-20"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px;"></div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tight text-white mb-4">Buat <span
                    class="text-secondary">Penawaran</span></h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto font-medium">Ajukan penawaran dan kebutuhan perusahaan
                Anda.</p>
        </div>
    </section>

    <div class="min-h-screen bg-slate-50 py-12 px-4 sm:px-6 lg:px-8 text-slate-900" x-data="{
        showModal: false,
        fileUrl: null,
        fileType: null,
        handleFile(e) {
            const file = e.target.files[0];
            if (file) {
                this.fileUrl = URL.createObjectURL(file);
                this.fileType = file.type;
            } else {
                this.fileUrl = null;
                this.fileType = null;
            }
        }
    }">
        <div class="max-w-2xl mx-auto align-top">

            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
                <div class="mb-8 border-b border-slate-100 pb-6">
                    <h1 class="text-3xl font-black text-primary tracking-tight">Buat Penawaran</h1>
                    <p class="mt-2 text-slate-500">Silakan isi formulir di bawah ini untuk mengajukan penawaran baru.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="bg-red-50 text-red-600 p-4 rounded-xl text-sm mb-6 border border-red-100">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('penawaran.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-1 md:col-span-2">
                            <label for="layanan_id" class="block text-sm font-bold text-slate-700 mb-2">Layanan <span
                                    class="text-red-500">*</span></label>
                            <select id="layanan_id" name="layanan_id" required
                                class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-colors text-slate-700 bg-white">
                                <option value="" disabled selected>Pilih Layanan</option>
                                @foreach ($layanans as $layanan)
                                    <option value="{{ $layanan->id }}"
                                        {{ old('layanan_id') == $layanan->id ? 'selected' : '' }}>
                                        {{ $layanan->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="nama_perusahaan" class="block text-sm font-bold text-slate-700 mb-2">Nama
                                Perusahaan (Optional)</label>
                            <input type="text" id="nama_perusahaan" name="nama_perusahaan"
                                value="{{ old('nama_perusahaan') }}"
                                class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-colors text-slate-700"
                                placeholder="PT. Contoh Perusahaan">
                        </div>

                        <div>
                            <label for="tanggal_permintaan" class="block text-sm font-bold text-slate-700 mb-2">Tanggal
                                Permintaan <span class="text-red-500">*</span></label>
                            <input type="datetime-local" id="tanggal_permintaan" name="tanggal_permintaan"
                                value="{{ old('tanggal_permintaan') }}" required
                                class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-colors text-slate-700">
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="alamat" class="block text-sm font-bold text-slate-700 mb-2">Alamat Perusahaan
                                (Optional)</label>
                            <textarea id="alamat" name="alamat" rows="3"
                                class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-colors text-slate-700"
                                placeholder="Alamat lengkap...">{{ old('alamat') }}</textarea>
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="deskripsi" class="block text-sm font-bold text-slate-700 mb-2">Deskripsi
                                Kebutuhan (Optional)</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4"
                                class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-colors text-slate-700"
                                placeholder="Jelaskan kebutuhan secara detail...">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="file" class="block text-sm font-bold text-slate-700 mb-2">File Lampiran
                                (Opsional, PDF/Word/Image)</label>
                            <div class="flex items-center gap-4">
                                <input type="file" id="file" name="file"
                                    accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" @change="handleFile"
                                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-colors text-slate-700 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/5 file:text-primary hover:file:bg-primary/10">

                                <button type="button" x-show="fileUrl" @click="showModal = true"
                                    class="flex-shrink-0 px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold transition-colors text-sm flex items-center gap-2">
                                    <i class="fa-solid fa-eye"></i> Lihat File
                                </button>
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="catatan" class="block text-sm font-bold text-slate-700 mb-2">Catatan Tambahan
                                (Optional)</label>
                            <textarea id="catatan" name="catatan" rows="3"
                                class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-colors text-slate-700"
                                placeholder="Catatan ekstra...">{{ old('catatan') }}</textarea>
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-6 mt-8 flex justify-end gap-4">
                        <a href="{{ route('penawaran.index') }}"
                            class="px-6 py-3 rounded-xl border border-slate-300 text-slate-700 font-bold hover:bg-slate-50 transition-colors">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-8 py-3 rounded-xl bg-secondary text-primary font-bold shadow-md hover:bg-secondary-light hover:-translate-y-0.5 transition-all">
                            Submit Penawaran
                        </button>
                    </div>
                </form>
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
                                    class="max-w-full max-h-full object-contain rounded-lg shadow-sm"
                                    alt="Preview" />
                            </template>
                            <template x-if="fileType === 'application/pdf'">
                                <iframe :src="fileUrl"
                                    class="w-full h-full rounded-lg border border-slate-200"></iframe>
                            </template>
                            <template
                                x-if="fileType && !fileType.startsWith('image/') && fileType !== 'application/pdf'">
                                <div class="text-center text-slate-500">
                                    <i class="fa-solid fa-file-lines text-6xl mb-4 text-slate-300"></i>
                                    <p>Tipe file ini tidak dapat dipreview secara langsung.</p>
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
