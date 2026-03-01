<x-layout.app>
    <x-slot name="title">Tentang Kami</x-slot>

    <!-- 6.1 Hero Section -->
    <section class="relative bg-primary pt-24 pb-24 overflow-hidden isolate">
        <div
            class="absolute inset-0 -z-10 bg-[url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80')] bg-cover bg-center opacity-20 mix-blend-overlay">
        </div>
        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-50 h-32"></div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-black tracking-tight text-white mb-6">Tentang <span
                    class="text-secondary">Kami</span></h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto">Mengenal lebih dekat PT. Charlyn Jaya, sejarah, visi
                misi, serta dedikasi kami dalam memberikan layanan terbaik.</p>
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
                    <img src="https://images.unsplash.com/photo-1574169208507-84376144848b?auto=format&fit=crop&q=80"
                        alt="Office PT Charlyn Jaya" class="rounded-2xl shadow-lg w-full object-cover h-[400px]">
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
                            <b>PT. Charlyn Jaya</b> berdiri pada tahun 2005 dengan awal kiprah di bidang konstruksi.
                            Seiring dengan kebutuhan pasar yang terus berkembang, pada tahun 2015 kami memperluas
                            jangkauan layanan menuju penyediaan outsourcing tenaga keamanan (Security).
                        </p>
                        <p class="mb-4">
                            Komitmen kami terhadap pelayanan prima mendorong kami untuk terus berinovasi, sehingga kami
                            merambah ke bidang outsourcing tenaga kebersihan (Cleaning Service), menjadikannya layanan
                            yang terintegrasi.
                        </p>
                        <blockquote
                            class="border-l-4 border-secondary pl-6 my-8 italic font-semibold text-primary text-xl">
                            "Menjadi mitra terpercaya dalam menciptakan lingkungan aman dan bersih."
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
                        "Menjadi mitra terpercaya dalam penyediaan layanan keamanan dan kebersihan bagi instansi."
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
                    <ul class="space-y-4">
                        <li class="flex items-start gap-4">
                            <i class="fa-solid fa-check text-secondary mt-1 text-xl"></i>
                            <span class="text-slate-300 text-lg">Menyediakan layanan terintegrasi</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <i class="fa-solid fa-check text-secondary mt-1 text-xl"></i>
                            <span class="text-slate-300 text-lg">Penyediaan tenaga profesional dan terlatih</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <i class="fa-solid fa-check text-secondary mt-1 text-xl"></i>
                            <span class="text-slate-300 text-lg">Pendekatan berbasis kebutuhan klien</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <i class="fa-solid fa-check text-secondary mt-1 text-xl"></i>
                            <span class="text-slate-300 text-lg">Mengutamakan kepuasan klien</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <i class="fa-solid fa-check text-secondary mt-1 text-xl"></i>
                            <span class="text-slate-300 text-lg">Melaksanakan tanggung jawab sosial</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 6.5 Sertifikat Section -->
    <section class="py-24 sm:py-32 bg-slate-50">
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
                <!-- Sertifikat 1 -->
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="p-8 pb-0 bg-slate-100/50 flex justify-center items-center h-64">
                        <i
                            class="fa-solid fa-certificate text-8xl text-slate-300 group-hover:text-secondary group-hover:scale-110 transition-all duration-500"></i>
                    </div>
                    <div class="p-6 text-center border-t border-slate-100">
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Sertifikat ISO 9001:2015</h3>
                        <p class="text-sm text-slate-500">Sistem Manajemen Mutu</p>
                    </div>
                </div>

                <!-- Sertifikat 2 -->
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="p-8 pb-0 bg-slate-100/50 flex justify-center items-center h-64">
                        <i
                            class="fa-solid fa-shield-cat text-8xl text-slate-300 group-hover:text-secondary group-hover:scale-110 transition-all duration-500"></i>
                    </div>
                    <div class="p-6 text-center border-t border-slate-100">
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Izin Operasional BUJP</h3>
                        <p class="text-sm text-slate-500">Mabes Polri - Keamanan Nasional</p>
                    </div>
                </div>

                <!-- Sertifikat 3 -->
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="p-8 pb-0 bg-slate-100/50 flex justify-center items-center h-64">
                        <i
                            class="fa-solid fa-award text-8xl text-slate-300 group-hover:text-secondary group-hover:scale-110 transition-all duration-500"></i>
                    </div>
                    <div class="p-6 text-center border-t border-slate-100">
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Sertifikat K3 Umum</h3>
                        <p class="text-sm text-slate-500">Kesehatan dan Keselamatan Kerja</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout.app>
