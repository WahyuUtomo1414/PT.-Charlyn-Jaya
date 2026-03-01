<footer class="bg-primary text-white pt-16 pb-8 border-t-[6px] border-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 mb-12">

            <!-- Company Info & Logo -->
            <div class="space-y-6">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <img src="{{ asset('assets/logo.png') }}" alt="Logo PT. Charlyn Jaya"
                        class="w-12 h-12 rounded-xl object-contain bg-white p-1 shadow-lg">
                    <div>
                        <span class="block font-bold text-xl text-white tracking-tight">PT. Charlyn Jaya</span>
                        <span class="block text-secondary text-sm font-medium">Mitra Terpercaya Anda</span>
                    </div>
                </a>
                <p class="text-slate-300 text-sm leading-relaxed">
                    Perusahaan penyedia jasa konstruksi, outsourcing tenaga keamanan (Security), dan kebersihan
                    (Cleaning Service) yang terpercaya di Provinsi Maluku dan sekitarnya.
                </p>
                <div class="flex space-x-4">
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-primary-light flex items-center justify-center text-slate-300 hover:text-white hover:bg-secondary transition-colors duration-300">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-primary-light flex items-center justify-center text-slate-300 hover:text-white hover:bg-secondary transition-colors duration-300">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-primary-light flex items-center justify-center text-slate-300 hover:text-white hover:bg-secondary transition-colors duration-300">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Navigation Links -->
            <div>
                <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-secondary"></span> Navigasi
                </h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('home') }}"
                            class="text-slate-300 hover:text-secondary transition-colors text-sm flex items-center gap-2">
                            <i class="fa-solid fa-chevron-right text-xs"></i> Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                            class="text-slate-300 hover:text-secondary transition-colors text-sm flex items-center gap-2">
                            <i class="fa-solid fa-chevron-right text-xs"></i> Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('organization') }}"
                            class="text-slate-300 hover:text-secondary transition-colors text-sm flex items-center gap-2">
                            <i class="fa-solid fa-chevron-right text-xs"></i> Struktur Organisasi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('project') }}"
                            class="text-slate-300 hover:text-secondary transition-colors text-sm flex items-center gap-2">
                            <i class="fa-solid fa-chevron-right text-xs"></i> Project dan Jasa
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-secondary"></span> Hubungi Kami
                </h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-4">
                        <div
                            class="mt-1 w-8 h-8 rounded bg-primary-light flex items-center justify-center flex-shrink-0 text-secondary">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>
                        <span class="text-slate-300 text-sm leading-relaxed">
                            Jl. Raya Pattimura No. 123, Ambon, Provinsi Maluku, 97111
                        </span>
                    </li>
                    <li class="flex items-center gap-4">
                        <div
                            class="w-8 h-8 rounded bg-primary-light flex items-center justify-center flex-shrink-0 text-secondary">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <span class="text-slate-300 text-sm">
                            +62 811 1234 5678
                        </span>
                    </li>
                    <li class="flex items-center gap-4">
                        <div
                            class="w-8 h-8 rounded bg-primary-light flex items-center justify-center flex-shrink-0 text-secondary">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <span class="text-slate-300 text-sm">
                            info@charlynjaya.co.id
                        </span>
                    </li>
                </ul>
            </div>

            <!-- Google Maps -->
            <div
                class="h-48 md:h-auto md:min-h-[200px] rounded-xl overflow-hidden shadow-lg border-2 border-primary-light relative isolate">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15926.491325126131!2d128.1751848!3d-3.6961239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6ce845ea0d3667%3A0xe9ec169b56f890f5!2sAmbon%2C%20Kota%20Ambon%2C%20Maluku!5e0!3m2!1sid!2sid!4v1709291123456!5m2!1sid!2sid"
                    class="absolute inset-0 w-full h-full border-0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>

        <div
            class="pt-8 mt-8 border-t border-primary-light flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-slate-400 text-sm text-center md:text-left">
                &copy; {{ date('Y') }} PT. Charlyn Jaya. All rights reserved.
            </p>
            <div class="text-slate-400 text-sm flex gap-4">
                <a href="#" class="hover:text-secondary transition-colors">Privacy Policy</a>
                <span class="text-slate-600">|</span>
                <a href="#" class="hover:text-secondary transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
