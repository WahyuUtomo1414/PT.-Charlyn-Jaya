<x-layout.app>
    <x-slot name="title">Tentang Kami</x-slot>

    <!-- 6.1 Hero Section -->
    <section
        class="relative bg-primary pt-32 pb-24 sm:pt-40 sm:pb-32 overflow-hidden isolate border-b-2 border-slate-100">
        <!-- Subtle Pattern Overlay (Dots) -->
        <div class="absolute inset-0 -z-10 opacity-20"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px;"></div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tight text-white mb-6">Tentang <span
                    class="text-secondary">Kami</span></h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto font-medium">Mengenal lebih dekat PT. Charlyn Jaya,
                sejarah, visi misi, serta dedikasi kami dalam memberikan layanan terbaik.</p>
        </div>
    </section>

    <!-- 6.2 Tentang Kami & 6.4 Filosofi -->
    <section class="py-16 sm:py-24 bg-slate-50 relative">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div
                class="bg-white rounded-[2.5rem] p-8 md:p-12 lg:p-16 shadow-xl border border-slate-100 flex flex-col lg:flex-row gap-16 items-center">
                <!-- Sejarah Image / Visual -->
                <div class="w-full lg:w-1/2 relative">
                    <div class="absolute -inset-4 bg-secondary/10 rounded-3xl -z-10 transform -rotate-3"></div>
                    <img src="{{ $heroImageUrl }}"
                        alt="{{ $company->nama ?? 'Office PT Charlyn Jaya' }}"
                        class="rounded-2xl shadow-lg w-full object-cover h-[400px]">
                    <div class="absolute -bottom-8 -right-8 bg-primary text-white p-8 rounded-2xl shadow-2xl">
                        <div class="text-5xl font-black text-secondary mb-2">15+</div>
                        <div class="font-bold text-sm uppercase tracking-widest">Tahun<br>Pengalaman</div>
                    </div>
                </div>

                <!-- Sejarah & Filosofi Text -->
                <div class="w-full lg:w-1/2">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/5 text-primary text-sm font-bold mb-6">
                        <i class="fa-solid fa-clock-rotate-left"></i> Sejarah & Filosofi
                    </div>
                    <h2 class="text-3xl font-black text-slate-900 mb-6 tracking-tight">Perjalanan Kami Mengabdi</h2>
                    <div class="prose prose-slate lg:prose-lg text-slate-600">
                        <p class="mb-4">
                            {{ $company->tentang_kami ?? 'PT. Charlyn Jaya berdiri pada tahun 2005 dengan awal kiprah di bidang konstruksi. Seiring kebutuhan pasar yang terus berkembang, pada tahun 2015 kami memperluas jangkauan layanan menuju penyediaan outsourcing tenaga keamanan (Security).' }}
                        </p>
                        <p class="mb-4">
                            {{ $company->filosofi ?? 'Komitmen terhadap pelayanan prima mendorong kami untuk terus berinovasi, sehingga kami merambah ke bidang outsourcing tenaga kebersihan (Cleaning Service), menjadikannya layanan yang terintegrasi.' }}
                        </p>
                        <blockquote
                            class="border-l-4 border-secondary pl-6 my-8 italic font-semibold text-primary text-xl">
                            "{{ $company->filosofi ?? 'Menjadi mitra terpercaya dalam menciptakan lingkungan aman dan bersih.' }}"
                        </blockquote>
                        <p>
                            Filosofi kami adalah selalu memprioritaskan kualitas tenaga kerja yang disalurkan, ditunjang
                            oleh pelatihan rutin dan evaluasi berkala.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6.3 Visi dan Misi Section -->
    <section class="py-24 sm:py-32 bg-primary text-white overflow-hidden relative">
        <div class="absolute top-0 right-0 -translate-y-12 translate-x-1/3 opacity-10">
            <i class="fa-solid fa-bullseye text-[400px]"></i>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Visi -->
                <div
                    class="bg-primary-light/50 backdrop-blur-lg rounded-3xl p-10 border border-white/10 hover:border-secondary/50 transition-colors">
                    <div
                        class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-secondary/20">
                        <i class="fa-solid fa-eye text-3xl text-primary"></i>
                    </div>
                    <h2 class="text-3xl font-black mb-6">Visi Kami</h2>
                    <p class="text-xl text-slate-300 leading-relaxed font-medium">
                        "{{ $company->visi ?? 'Menjadi mitra terpercaya dalam penyediaan layanan keamanan dan kebersihan bagi instansi.' }}"
                    </p>
                </div>

                <!-- Misi -->
                <div
                    class="bg-primary-light/50 backdrop-blur-lg rounded-3xl p-10 border border-white/10 hover:border-secondary/50 transition-colors">
                    <div
                        class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-secondary/20">
                        <i class="fa-solid fa-rocket text-3xl text-primary"></i>
                    </div>
                    <h2 class="text-3xl font-black mb-6">Misi Kami</h2>
                    @if ($misiList->isNotEmpty())
                        <ul class="space-y-4">
                            @foreach ($misiList as $misi)
                                <li class="flex items-start gap-4">
                                    <i class="fa-solid fa-check text-secondary mt-1 text-xl"></i>
                                    <span class="text-slate-300 text-lg">{{ $misi }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-slate-300">Belum ada data misi.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- 6.5 Sertifikat Section -->
    <section class="py-24 sm:py-32 bg-slate-50" x-data="{ showModal: false, modalImage: '', modalTitle: '' }">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-base font-bold leading-7 text-secondary tracking-widest uppercase">Legalitas &
                    Kompetensi</h2>
                <p class="mt-2 text-3xl font-black tracking-tight text-primary sm:text-4xl">
                    Sertifikat & Pengharagan
                </p>
                <p class="mt-4 text-slate-600 max-w-2xl mx-auto">
                    Bukti komitmen dan profesionalisme kami dalam menjaga standar operasional di setiap bidang layanan.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($sertifikats as $sertifikat)
                    <div
                        class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-xl transition-all duration-300 group">
                        <div class="p-8 pb-0 bg-slate-100/50 flex justify-center items-center h-64">
                            @if ($sertifikat->foto_url)
                                <button type="button"
                                    @click="showModal = true; modalImage = '{{ $sertifikat->foto_url }}'; modalTitle = '{{ addslashes($sertifikat->nama) }}'"
                                    class="focus:outline-none">
                                    <img src="{{ $sertifikat->foto_url }}" alt="{{ $sertifikat->nama }}"
                                        class="h-48 w-auto object-contain group-hover:scale-105 transition-transform duration-500">
                                </button>
                            @else
                                <i
                                    class="fa-solid fa-certificate text-8xl text-slate-300 group-hover:text-secondary group-hover:scale-110 transition-all duration-500"></i>
                            @endif
                        </div>
                        <div class="p-6 text-center border-t border-slate-100">
                            <h3 class="text-lg font-bold text-slate-900 mb-2">{{ $sertifikat->nama }}</h3>
                            <p class="text-sm text-slate-500">{{ $sertifikat->jenis ?? '-' }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-slate-500">Data sertifikat belum tersedia.</div>
                @endforelse
            </div>
        </div>

        <div x-show="showModal" x-cloak class="fixed inset-0 z-50">
            <div class="absolute inset-0 bg-black/70" @click="showModal = false"></div>
            <div class="absolute inset-0 flex items-center justify-center p-6">
                <div class="relative w-full max-w-3xl bg-white rounded-2xl shadow-2xl overflow-hidden">
                    <button type="button"
                        class="absolute top-3 right-3 w-9 h-9 rounded-full bg-slate-900/80 text-white flex items-center justify-center hover:bg-slate-900"
                        @click="showModal = false">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <div class="p-6 border-b border-slate-200">
                        <div class="text-lg font-bold text-slate-900" x-text="modalTitle"></div>
                    </div>
                    <div class="p-6 flex justify-center items-center">
                        <img :src="modalImage" :alt="modalTitle" class="max-h-[70vh] w-auto object-contain">
                    </div>
                    <div class="p-6 pt-0 flex justify-end">
                        <button type="button"
                            class="inline-flex items-center gap-2 rounded-full bg-primary px-5 py-2 text-sm font-semibold text-white hover:bg-primary-light"
                            @click="showModal = false">
                            Tutup <i class="fa-solid fa-xmark text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout.app>
