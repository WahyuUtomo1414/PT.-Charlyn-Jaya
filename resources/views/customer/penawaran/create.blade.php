<x-layout.app>
    <x-slot name="title">Buat Penawaran</x-slot>

    <div class="min-h-screen bg-slate-50 py-12 px-4 sm:px-6 lg:px-8 mt-16 text-slate-900">
        <div class="max-w-4xl mx-auto align-top">

            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
                <div class="mb-8 border-b border-slate-100 pb-6">
                    <h1 class="text-3xl font-black text-primary tracking-tight">Buat Penawaran</h1>
                    <p class="mt-2 text-slate-500">Silakan isi formulir di bawah ini untuk mengajukan penawaran baru.</p>
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
                            <input type="file" id="file" name="file" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-colors text-slate-700 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/5 file:text-primary hover:file:bg-primary/10">
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
    </div>
</x-layout.app>
