<x-layout.app>
    <x-slot name="title">Project & Jasa</x-slot>

    <!-- 8. Hero/Description Section -->
    <section
        class="relative bg-primary pt-32 pb-24 sm:pt-40 sm:pb-32 overflow-hidden isolate border-b-2 border-slate-100">
        <!-- Subtle Pattern Overlay (Dots) -->
        <div class="absolute inset-0 -z-10 opacity-20"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px;"></div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tight text-white mb-6">Project & <span
                    class="text-secondary">Jasa</span></h1>
            <p class="text-lg text-slate-300 max-w-3xl mx-auto font-medium">Pengalaman kami menyajikan hasil yang nyata.
                Temukan layanan kami dan klien yang telah mempercayakan kepercayaannya.</p>
        </div>
    </section>

    <!-- 8.2 Jasa -->
    <section class="py-16 bg-white border-b border-slate-100">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:border-secondary transition-colors group">
                    <div
                        class="w-14 h-14 bg-white rounded-full flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-shield-halved text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Security Service</h3>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex gap-2 items-center"><i class="fa-solid fa-check text-secondary text-xs"></i>
                            Pengamanan Gedung & Perkantoran</li>
                        <li class="flex gap-2 items-center"><i class="fa-solid fa-check text-secondary text-xs"></i>
                            Pengamanan Objek Vital</li>
                        <li class="flex gap-2 items-center"><i class="fa-solid fa-check text-secondary text-xs"></i>
                            Kawal Pribadi (VIP)</li>
                        <li class="flex gap-2 items-center"><i class="fa-solid fa-check text-secondary text-xs"></i>
                            Event Security</li>
                    </ul>
                </div>

                <div
                    class="p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:border-secondary transition-colors group">
                    <div
                        class="w-14 h-14 bg-white rounded-full flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-sparkles text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Cleaning Service</h3>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex gap-2 items-center"><i class="fa-solid fa-check text-secondary text-xs"></i>
                            Pembersihan Kantor & Gedung</li>
                        <li class="flex gap-2 items-center"><i class="fa-solid fa-check text-secondary text-xs"></i>
                            Rumah Sakit & Fasilitas Medis</li>
                        <li class="flex gap-2 items-center"><i class="fa-solid fa-check text-secondary text-xs"></i>
                            General Cleaning Projects</li>
                        <li class="flex gap-2 items-center"><i class="fa-solid fa-check text-secondary text-xs"></i>
                            Perawatan Taman (Gardening)</li>
                    </ul>
                </div>

                <div
                    class="p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:border-secondary transition-colors group">
                    <div
                        class="w-14 h-14 bg-white rounded-full flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-users-gear text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Outsourcing</h3>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex gap-2 items-center"><i class="fa-solid fa-check text-secondary text-xs"></i>
                            Tenaga Administrasi</li>
                        <li class="flex gap-2 items-center"><i class="fa-solid fa-check text-secondary text-xs"></i>
                            Resepsionis & Customer Service</li>
                        <li class="flex gap-2 items-center"><i class="fa-solid fa-check text-secondary text-xs"></i>
                            Driver Perusahaan</li>
                        <li class="flex gap-2 items-center"><i class="fa-solid fa-check text-secondary text-xs"></i>
                            Operator & Teknisi</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 8.3 Table Pengalaman Project -->
    <section class="py-24 sm:py-32 bg-slate-50">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-base font-bold leading-7 text-secondary tracking-widest uppercase">Portofolio</h2>
                <p class="mt-2 text-3xl font-black tracking-tight text-primary sm:text-4xl">
                    Daftar Pengalaman Project
                </p>
                <p class="mt-4 text-slate-600 max-w-2xl mx-auto">
                    Klien-klien yang telah memercayakan project pengamanan, kebersihan, dan pengelolaan tenaga kerja
                    kepada kami.
                </p>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-600">
                        <thead class="bg-primary text-white font-semibold uppercase tracking-wider text-xs">
                            <tr>
                                <th scope="col" class="px-6 py-4">No</th>
                                <th scope="col" class="px-6 py-4">Instansi</th>
                                <th scope="col" class="px-6 py-4">Uraian Pekerjaan</th>
                                <th scope="col" class="px-6 py-4">Tahun</th>
                                <th scope="col" class="px-6 py-4 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">1</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                            <i class="fa-solid fa-building-columns"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-900">Kantor Gubernur Maluku</div>
                                            <div class="text-xs text-slate-500">Pemerintah</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">Penyediaan Tenaga Kebersihan (Cleaning Service)</td>
                                <td class="px-6 py-4">2020 - 2021</td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600">
                                        Selesai
                                    </span>
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">2</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                            <i class="fa-solid fa-hospital"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-900">RSUD dr. M. Haulussy Ambon</div>
                                            <div class="text-xs text-slate-500">Kesehatan</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">Jasa Tenaga Pengamanan (Security) Terpadu</td>
                                <td class="px-6 py-4">2021 - 2023</td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600">
                                        Selesai
                                    </span>
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50 transition-colors bg-primary/5">
                                <td class="px-6 py-4 font-medium">3</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                            <i class="fa-solid fa-building-user"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-900">PT. Pelindo (Persero) Regional 4
                                                Ambon</div>
                                            <div class="text-xs text-slate-500">BUMN</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">Penyediaan Tenaga Kebersihan & Tenaga Outsourcing Administrasi
                                </td>
                                <td class="px-6 py-4">2023 - Sekarang</td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center gap-1.5 rounded-full bg-secondary/20 px-2 py-1 text-xs font-bold text-secondary-dark border border-secondary/30">
                                        <span class="w-1.5 h-1.5 rounded-full bg-secondary-dark animate-pulse"></span>
                                        Berjalan
                                    </span>
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50 transition-colors bg-primary/5">
                                <td class="px-6 py-4 font-medium">4</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                            <i class="fa-solid fa-plane-departure"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-900">Angkasa Pura I (Bandara Pattimura)
                                            </div>
                                            <div class="text-xs text-slate-500">BUMN</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">Jasa Tenaga Pengamanan (Security) Kawasan</td>
                                <td class="px-6 py-4">2024 - Sekarang</td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center gap-1.5 rounded-full bg-secondary/20 px-2 py-1 text-xs font-bold text-secondary-dark border border-secondary/30">
                                        <span class="w-1.5 h-1.5 rounded-full bg-secondary-dark animate-pulse"></span>
                                        Berjalan
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-8 text-center sm:text-right">
                <a href="{{ route('filament.admin.auth.login') }}"
                    class="inline-flex items-center gap-2 text-sm font-bold text-primary hover:text-secondary group">
                    Ingin menjadi bagian dari klien kami? <span
                        class="bg-primary text-white px-4 py-2 rounded-full group-hover:bg-secondary group-hover:text-primary transition-colors ml-2">Hubungi
                        Kami</span>
                </a>
            </div>

        </div>
    </section>

</x-layout.app>
