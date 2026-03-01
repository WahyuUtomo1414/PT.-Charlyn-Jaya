<x-layout.app>
    <x-slot name="title">Struktur Organisasi</x-slot>

    <!-- 7. Hero Section -->
    <section class="relative bg-primary pt-24 pb-24 overflow-hidden isolate">
        <div
            class="absolute inset-x-0 bottom-0 top-0 bg-[url('https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80')] bg-cover bg-center opacity-10 mix-blend-overlay">
        </div>
        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-50 h-32"></div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tight text-white mb-6">Struktur <span
                    class="text-secondary">Organisasi</span></h1>
            <p class="text-lg text-slate-300 max-w-3xl mx-auto">Sinergi kepemimpinan dan manajemen profesional dari tim
                penggerak utama PT. Charlyn Jaya.</p>
        </div>
    </section>

    <!-- 7. Organization Structure Grid -->
    <section class="py-16 sm:py-24 bg-slate-50">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <!-- Direktur Utama -->
            <div class="flex justify-center mb-16">
                <div
                    class="bg-white rounded-3xl p-8 shadow-xl border-t-8 border-primary max-w-sm w-full text-center hover:-translate-y-2 transition-transform duration-300 relative">
                    <div
                        class="absolute -top-4 -right-4 bg-secondary text-primary font-bold text-xs px-3 py-1 rounded-full shadow-lg">
                        Pimpinan</div>
                    <div
                        class="w-32 h-32 mx-auto rounded-full bg-slate-200 border-4 border-white shadow-lg overflow-hidden mb-6">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&q=80&w=256&h=256"
                            alt="Direktur Utama" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-1">Bpk. Alexander</h3>
                    <p class="text-sm font-semibold text-secondary uppercase tracking-widest mb-4">Direktur Utama</p>
                    <div class="flex justify-center gap-3">
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 hover:text-primary transition-colors"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 hover:text-primary transition-colors"><i
                                class="fa-solid fa-envelope"></i></a>
                    </div>
                </div>
            </div>

            <!-- Direktur -->
            <div class="flex justify-center mb-16 relative">
                <!-- Connector Line Top -->
                <div class="hidden md:block absolute -top-16 left-1/2 w-0.5 h-16 bg-slate-300"></div>
                <div
                    class="bg-white rounded-3xl p-6 shadow-lg border-t-4 border-primary max-w-sm w-full text-center hover:-translate-y-1 transition-transform duration-300">
                    <div
                        class="w-24 h-24 mx-auto rounded-full bg-slate-200 border-4 border-white shadow-md overflow-hidden mb-4">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=256&h=256"
                            alt="Direktur Operasional" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Ibu Sarah Wijaya</h3>
                    <p class="text-xs font-semibold text-secondary uppercase tracking-widest">Direktur Operasional</p>
                </div>
            </div>

            <!-- Management Level -->
            <div class="relative">
                <!-- Connector Line Horizontal & Vertical -->
                <div class="hidden md:block absolute -top-8 left-1/2 w-0.5 h-8 bg-slate-300 transform -translate-x-1/2">
                </div>
                <div class="hidden lg:block absolute -top-8 left-[16.666%] right-[16.666%] h-0.5 bg-slate-300"></div>
                <div class="hidden md:block lg:hidden absolute -top-8 left-1/4 right-1/4 h-0.5 bg-slate-300"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                    <!-- HRD -->
                    <div
                        class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md border border-slate-100 text-center relative group">
                        <div
                            class="hidden lg:block absolute -top-8 left-1/2 w-0.5 h-8 bg-slate-300 -translate-x-1/2 group-first:hidden group-last:hidden">
                        </div>
                        <div
                            class="hidden lg:block absolute -top-8 left-1/2 w-0.5 h-8 bg-slate-300 -translate-x-1/2 group-first:block group-last:block mix-blend-multiply">
                        </div>
                        <div
                            class="w-20 h-20 mx-auto rounded-full bg-slate-100 overflow-hidden mb-4 border border-slate-200">
                            <i class="fa-solid fa-user-tie text-4xl text-slate-300 mt-4"></i>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-1">Budi Santoso</h3>
                        <p class="text-xs text-primary font-medium bg-primary/5 py-1 px-3 rounded-full inline-block">HRD
                            Manager</p>
                    </div>

                    <!-- HSSE -->
                    <div
                        class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md border border-slate-100 text-center relative">
                        <div class="hidden md:block absolute -top-8 left-1/2 w-0.5 h-8 bg-slate-300 -translate-x-1/2">
                        </div>
                        <div
                            class="w-20 h-20 mx-auto rounded-full bg-slate-100 overflow-hidden mb-4 border border-slate-200">
                            <i class="fa-solid fa-hard-hat text-4xl text-slate-300 mt-4"></i>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-1">Andi Pratama</h3>
                        <p
                            class="text-xs text-secondary font-bold bg-secondary/10 text-secondary-dark py-1 px-3 rounded-full inline-block">
                            HSSE Officer</p>
                    </div>

                    <!-- Administrasi -->
                    <div
                        class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md border border-slate-100 text-center relative">
                        <div class="hidden md:block absolute -top-8 left-1/2 w-0.5 h-8 bg-slate-300 -translate-x-1/2">
                        </div>
                        <div
                            class="w-20 h-20 mx-auto rounded-full bg-slate-100 overflow-hidden mb-4 border border-slate-200">
                            <i class="fa-solid fa-file-signature text-4xl text-slate-300 mt-4"></i>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-1">Siti Aminah</h3>
                        <p class="text-xs text-primary font-medium bg-primary/5 py-1 px-3 rounded-full inline-block">
                            Head of Admin</p>
                    </div>

                    <!-- Logistik -->
                    <div
                        class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md border border-slate-100 text-center relative">
                        <div class="hidden lg:block absolute -top-8 left-1/2 w-0.5 h-8 bg-slate-300 -translate-x-1/2">
                        </div>
                        <div
                            class="w-20 h-20 mx-auto rounded-full bg-slate-100 overflow-hidden mb-4 border border-slate-200">
                            <i class="fa-solid fa-boxes-stacked text-4xl text-slate-300 mt-4"></i>
                        </div>
                        <h3 class="font-bold text-slate-900 mb-1">Rudi Hartono</h3>
                        <p class="text-xs text-primary font-medium bg-primary/5 py-1 px-3 rounded-full inline-block">
                            Logistics Manager</p>
                    </div>

                </div>
            </div>

            <!-- Field Supervisor -->
            <div class="mt-16 flex justify-center w-full">
                <div
                    class="bg-primary-light rounded-2xl p-6 w-full max-w-2xl text-center shadow-lg relative border-2 border-primary border-dashed">
                    <div
                        class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-slate-50 px-4 text-xs font-bold text-slate-500 rounded-full border border-slate-200">
                        Tim Operasional Lapangan</div>
                    <div class="flex items-center justify-center gap-4 mt-2">
                        <i class="fa-solid fa-users text-4xl text-white/50"></i>
                        <div class="text-left">
                            <h3 class="font-bold text-white text-lg">Pengawas Lapangan & Tim</h3>
                            <p class="text-sm text-slate-300">Ratusan tenaga ahli yang tersebar di wilayah proyek.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</x-layout.app>
