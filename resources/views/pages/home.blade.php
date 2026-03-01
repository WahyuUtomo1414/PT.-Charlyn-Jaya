<x-layout.app>
    <x-slot name="title">Beranda</x-slot>

    <!-- 5.1 Hero Section -->
    <section class="relative bg-primary min-h-screen flex items-center justify-center overflow-hidden isolate pt-20">
        <!-- Background Video -->
        <div class="absolute inset-0 -z-20">
            <video class="h-full w-full object-cover" autoplay muted loop playsinline>
                <source src="{{ asset('assets/Pembuatan_Video_Hero_Section_Website.mp4') }}" type="video/mp4">
            </video>
        </div>
        <!-- Primary Overlay -->
        <div class="absolute inset-0 -z-10 bg-primary/80"></div>

        <div
            class="mx-auto max-w-7xl px-6 lg:px-8 relative z-10 w-full flex flex-col justify-between h-full min-h-[calc(100vh-5rem)]">

            <div class="flex-grow flex flex-col justify-center max-w-3xl py-20 lg:py-24">
                <h1 class="text-5xl lg:text-6xl font-black tracking-tight text-white mb-6 leading-tight">
                    Mitra Terpercaya untuk<br>
                    Keamanan & Kebersihan
                </h1>
                <p class="text-lg lg:text-xl text-slate-300 mb-10 max-w-2xl leading-relaxed">
                    <strong class="text-white font-semibold flex items-center gap-2 mb-2">
                        OPTIMALKAN KEAMANAN DAN KENYAMANAN BISNIS ANDA.
                    </strong>
                    Kami menyediakan layanan yang tidak hanya handal, namun juga dirancang khusus untuk merefleksikan
                    standar tinggi di perusahaan Anda.
                </p>
                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <a href="#penawaran"
                        class="w-full sm:w-auto inline-flex justify-center items-center rounded-md bg-secondary px-8 py-3.5 text-sm font-bold text-primary shadow-sm hover:bg-secondary-light transition-all">
                        Hubungi Kami <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </a>
                    <a href="{{ route('project') }}"
                        class="w-full sm:w-auto inline-flex justify-center items-center rounded-md bg-white px-8 py-3.5 text-sm font-bold text-primary shadow-sm hover:bg-slate-50 transition-all">
                        Layanan Kami
                    </a>
                </div>
            </div>

            <!-- Bottom Section -->
            {{-- <div
                class="grid grid-cols-1 md:grid-cols-2 gap-8 items-end pb-8 lg:pb-12 mt-4 lg:mt-12 border-t border-white/10 pt-8">
                <div>
                    <p class="text-sm text-slate-400 font-medium mb-4 uppercase tracking-wider">Layanan Utama</p>
                    <div class="flex flex-wrap gap-6 items-center flex-row">
                        <div class="flex items-center gap-2 text-white font-bold text-xl opacity-90"><i
                                class="fa-solid fa-shield-halved text-secondary"></i> Security</div>
                        <div class="flex items-center gap-2 text-white font-bold text-xl opacity-90"><i
                                class="fa-solid fa-sparkles text-secondary"></i> Cleaning</div>
                    </div>
                </div>
                <div class="md:text-right">
                    <p class="text-sm text-slate-400 font-medium mb-4 uppercase tracking-wider">Tersertifikasi Oleh</p>
                    <div class="flex md:justify-end gap-4 opacity-75">
                        <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center text-primary text-2xl font-bold"
                            title="ISO 9001"><i class="fa-solid fa-certificate"></i></div>
                        <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center text-primary text-2xl font-bold"
                            title="Izin Operasional BUJP"><i class="fa-solid fa-shield-cat"></i></div>
                        <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center text-primary text-2xl font-bold"
                            title="K3 Umum"><i class="fa-solid fa-award"></i></div>
                    </div>
                </div>
            </div> --}}

        </div>
    </section>

    <!-- 5.2 Client Section -->
    <section class="py-12 bg-white border-y border-slate-100">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <p class="text-center text-sm font-semibold leading-8 text-slate-500 mb-8 uppercase tracking-widest">
                Dipercaya oleh berbagai instansi
            </p>
            <div
                class="mx-auto grid max-w-lg grid-cols-2 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-4 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
                <!-- Dummy Clients -->
                <div class="col-span-1 flex justify-center"><i
                        class="fa-solid fa-building-columns text-4xl text-slate-400 hover:text-primary transition-colors"></i>
                </div>
                <div class="col-span-1 flex justify-center"><i
                        class="fa-solid fa-hospital text-4xl text-slate-400 hover:text-primary transition-colors"></i>
                </div>
                <div class="col-span-1 flex justify-center"><i
                        class="fa-solid fa-school text-4xl text-slate-400 hover:text-primary transition-colors"></i>
                </div>
                <div class="col-span-1 flex justify-center"><i
                        class="fa-solid fa-industry text-4xl text-slate-400 hover:text-primary transition-colors"></i>
                </div>
                <div class="col-span-2 sm:col-span-4 lg:col-span-1 flex justify-center"><i
                        class="fa-solid fa-building-user text-4xl text-slate-400 hover:text-primary transition-colors"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- 5.3 Deskripsi Section -->
    <section class="py-24 sm:py-32 bg-slate-50">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center mb-16">
                <h2 class="text-base font-bold leading-7 text-secondary tracking-widest uppercase">Tentang Kami</h2>
                <p class="mt-2 text-3xl font-black tracking-tight text-primary sm:text-4xl">
                    Berpengalaman Sejak 2005
                </p>
                <p class="mt-6 text-lg leading-8 text-slate-600">
                    Bermula dari bidang konstruksi, kami terus berkembang dan berekspansi untuk memenuhi kebutuhan klien
                    dengan layanan komprehensif.
                </p>
            </div>

            <div class="mx-auto max-w-2xl lg:max-w-none">
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                    <div
                        class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                        <div
                            class="w-14 h-14 rounded-2xl bg-primary/5 flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all duration-300">
                            <i
                                class="fa-solid fa-helmet-safety text-2xl text-primary group-hover:text-secondary transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Awal Berdiri</h3>
                        <p class="text-slate-600 leading-relaxed">PT. Charlyn Jaya berdiri kokoh pada tahun 2005 dengan
                            fokus utama di bidang konstruksi dan pembangunan.</p>
                    </div>

                    <div
                        class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-4 opacity-5 pointer-events-none">
                            <i class="fa-solid fa-shield-halved text-8xl"></i>
                        </div>
                        <div
                            class="w-14 h-14 rounded-2xl bg-primary/5 flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all duration-300">
                            <i
                                class="fa-solid fa-shield-halved text-2xl text-primary group-hover:text-secondary transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Ekspansi Keamanan</h3>
                        <p class="text-slate-600 leading-relaxed">Pada 2015, kami memperluas jangkauan layanan ke
                            outsourcing tenaga keamanan (Security) profesional.</p>
                    </div>

                    <div
                        class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                        <div
                            class="w-14 h-14 rounded-2xl bg-primary/5 flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all duration-300">
                            <i
                                class="fa-solid fa-broom text-2xl text-primary group-hover:text-secondary transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Layanan Kebersihan</h3>
                        <p class="text-slate-600 leading-relaxed">Terus berinovasi, kami menambah layanan outsourcing
                            tenaga kebersihan (Cleaning Service) yang handal.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5.4 Product dan Jasa Section -->
    <section class="py-24 sm:py-32 bg-white">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center mb-16">
                <h2 class="text-base font-bold leading-7 text-secondary tracking-widest uppercase">Layanan Kami</h2>
                <p class="mt-2 text-3xl font-black tracking-tight text-primary sm:text-4xl">
                    Solusi Terintegrasi Untuk Anda
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Security Service -->
                <div class="rounded-3xl bg-slate-50 overflow-hidden group hover:shadow-2xl transition-all duration-500">
                    <div class="h-64 overflow-hidden relative">
                        <div class="absolute inset-0 bg-primary/20 group-hover:bg-transparent transition-colors z-10">
                        </div>
                        <img src="https://images.unsplash.com/photo-1557555187-23d685287bc3?auto=format&fit=crop&q=80"
                            alt="Security Service"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute bottom-4 right-4 z-20 w-12 h-12 rounded-full bg-secondary flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-user-shield text-primary text-xl"></i>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-primary mb-3">Security Service</h3>
                        <p class="text-slate-600 mb-6 line-clamp-3">Penyediaan tenaga satuan pengamanan yang tanggap,
                            terlatih, dan bersertifikat untuk menjaga aset dan lingkungan Anda dengan standar
                            operasional yang ketat.</p>
                        <a href="{{ route('project') }}"
                            class="inline-flex items-center gap-2 text-sm font-bold text-primary hover:text-secondary transition-colors uppercase tracking-wider">
                            Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Cleaning Service -->
                <div
                    class="rounded-3xl bg-slate-50 overflow-hidden group hover:shadow-2xl transition-all duration-500 transform lg:-translate-y-8">
                    <div class="h-64 overflow-hidden relative">
                        <div class="absolute inset-0 bg-primary/20 group-hover:bg-transparent transition-colors z-10">
                        </div>
                        <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&q=80"
                            alt="Cleaning Service"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute bottom-4 right-4 z-20 w-12 h-12 rounded-full bg-secondary flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-sparkles text-primary text-xl"></i>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-primary mb-3">Cleaning Service</h3>
                        <p class="text-slate-600 mb-6 line-clamp-3">Layanan kebersihan profesional dengan tenaga
                            terdidik dan peralatan modern, menciptakan lingkungan yang bersih, sehat, dan nyaman untuk
                            aktivitas Anda.</p>
                        <a href="{{ route('project') }}"
                            class="inline-flex items-center gap-2 text-sm font-bold text-primary hover:text-secondary transition-colors uppercase tracking-wider">
                            Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Outsourcing -->
                <div class="rounded-3xl bg-slate-50 overflow-hidden group hover:shadow-2xl transition-all duration-500">
                    <div class="h-64 overflow-hidden relative">
                        <div class="absolute inset-0 bg-primary/20 group-hover:bg-transparent transition-colors z-10">
                        </div>
                        <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&q=80"
                            alt="Outsourcing Service"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute bottom-4 right-4 z-20 w-12 h-12 rounded-full bg-secondary flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-users-gear text-primary text-xl"></i>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-primary mb-3">Outsourcing Service</h3>
                        <p class="text-slate-600 mb-6 line-clamp-3">Penyediaan tenaga kerja pendukung operasional yang
                            handal dan profesional, disesuaikan dengan kebutuhan spesifik perusahaan Anda.</p>
                        <a href="{{ route('project') }}"
                            class="inline-flex items-center gap-2 text-sm font-bold text-primary hover:text-secondary transition-colors uppercase tracking-wider">
                            Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5.5 FAQ Section -->
    <section class="py-24 sm:py-32 bg-primary relative overflow-hidden isolate" x-data="{ activeFAQ: 1 }">
        <div class="absolute inset-0 -z-10 opacity-10"
            style="background-image: radial-gradient(#FBBF24 1px, transparent 1px); background-size: 32px 32px;"></div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <div>
                <h2 class="text-base font-bold leading-7 text-secondary tracking-widest uppercase">FAQ</h2>
                <p class="mt-2 text-3xl font-black tracking-tight text-white sm:text-4xl mb-6">
                    Pertanyaan Umum
                </p>
                <p class="text-slate-300 text-lg mb-8">
                    Temukan jawaban atas pertanyaan yang sering diajukan mengenai layanan kami. Jika ada pertanyaan
                    lain, jangan ragu untuk menghubungi tim kami.
                </p>
                <a href="#penawaran"
                    class="inline-flex items-center gap-2 text-sm font-bold text-primary bg-secondary px-6 py-3 rounded-full hover:bg-white transition-colors">
                    Hubungi Support Kami
                </a>
            </div>

            <div class="space-y-4">
                <!-- FAQ 1 -->
                <div class="bg-primary-light rounded-2xl border border-white/10 overflow-hidden transition-all duration-300"
                    :class="activeFAQ === 1 ? 'ring-2 ring-secondary' : ''">
                    <button @click="activeFAQ = activeFAQ === 1 ? null : 1"
                        class="flex justify-between items-center w-full p-6 text-left">
                        <span class="text-lg font-bold text-white">Layanan apa saja yang disediakan?</span>
                        <span
                            class="ml-6 flex items-center justify-center w-8 h-8 rounded-full bg-white/10 text-secondary transition-transform duration-300"
                            :class="activeFAQ === 1 ? 'rotate-180' : ''">
                            <i class="fa-solid fa-chevron-down text-sm"></i>
                        </span>
                    </button>
                    <div x-show="activeFAQ === 1" x-collapse x-cloak>
                        <div class="px-6 pb-6 text-slate-300">
                            Kami menyediakan layanan Konstruksi, Security Service (Tenaga Keamanan), dan Cleaning
                            Service (Tenaga Kebersihan) untuk berbagai jenis instansi baik pemerintah maupun swasta.
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="bg-primary-light rounded-2xl border border-white/10 overflow-hidden transition-all duration-300"
                    :class="activeFAQ === 2 ? 'ring-2 ring-secondary' : ''">
                    <button @click="activeFAQ = activeFAQ === 2 ? null : 2"
                        class="flex justify-between items-center w-full p-6 text-left">
                        <span class="text-lg font-bold text-white">Di mana saja area layanan PT. Charlyn Jaya?</span>
                        <span
                            class="ml-6 flex items-center justify-center w-8 h-8 rounded-full bg-white/10 text-secondary transition-transform duration-300"
                            :class="activeFAQ === 2 ? 'rotate-180' : ''">
                            <i class="fa-solid fa-chevron-down text-sm"></i>
                        </span>
                    </button>
                    <div x-show="activeFAQ === 2" x-collapse x-cloak>
                        <div class="px-6 pb-6 text-slate-300">
                            Fokus utama layanan kami berada di wilayah Provinsi Maluku dan sekitarnya. Kami bangga
                            menjadi mitra lokal terpercaya dengan jaringan yang kuat.
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="bg-primary-light rounded-2xl border border-white/10 overflow-hidden transition-all duration-300"
                    :class="activeFAQ === 3 ? 'ring-2 ring-secondary' : ''">
                    <button @click="activeFAQ = activeFAQ === 3 ? null : 3"
                        class="flex justify-between items-center w-full p-6 text-left">
                        <span class="text-lg font-bold text-white">Bagaimana cara bekerja sama dengan kami?</span>
                        <span
                            class="ml-6 flex items-center justify-center w-8 h-8 rounded-full bg-white/10 text-secondary transition-transform duration-300"
                            :class="activeFAQ === 3 ? 'rotate-180' : ''">
                            <i class="fa-solid fa-chevron-down text-sm"></i>
                        </span>
                    </button>
                    <div x-show="activeFAQ === 3" x-collapse x-cloak>
                        <div class="px-6 pb-6 text-slate-300">
                            Anda dapat menghubungi kami melalui formulir kontak di website ini, mengirimkan email ke
                            info@charlynjaya.co.id, atau langsung menelepon nomor layanan klien kami untuk mengatur
                            jadwal diskusi kebutuhan.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout.app>
