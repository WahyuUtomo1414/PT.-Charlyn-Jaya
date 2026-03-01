@php
    $navLinks = [
        ['name' => 'Home', 'url' => route('home')],
        ['name' => 'Tentang Kami', 'url' => route('about')],
        ['name' => 'Struktur Organisasi', 'url' => route('organization')],
        ['name' => 'Project dan Jasa', 'url' => route('project')],
    ];
@endphp

<header x-data="{ mobileMenuOpen: false }"
    class="sticky top-0 z-50 bg-white border-b border-slate-100 shadow-sm transition-all duration-300">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-4 lg:px-8" aria-label="Global">

        <!-- Logo -->
        <div class="flex lg:flex-1">
            <a href="{{ route('home') }}" class="-m-1.5 p-1.5 flex items-center gap-3 group">
                <div
                    class="flex items-center justify-center w-10 h-10 rounded-lg bg-primary text-white font-bold text-xl group-hover:bg-primary-light transition-colors shadow-md">
                    CJ
                </div>
                <div>
                    <span class="block font-bold text-lg text-primary leading-tight tracking-tight">PT. Charlyn
                        Jaya</span>
                    <span class="block text-xs text-slate-500 font-medium">Security & Cleaning Service</span>
                </div>
            </a>
        </div>

        <!-- Mobile menu button -->
        <div class="flex lg:hidden">
            <button type="button" @click="mobileMenuOpen = true"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-slate-700 hover:text-primary transition-colors">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex lg:gap-x-8">
            @foreach ($navLinks as $link)
                <a href="{{ $link['url'] }}"
                    class="text-sm font-semibold leading-6 transition-colors {{ request()->url() == $link['url'] ? 'text-primary border-b-2 border-secondary' : 'text-slate-600 hover:text-primary' }}">
                    {{ $link['name'] }}
                </a>
            @endforeach
        </div>

        <!-- CTA Button -->
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a href="#penawaran"
                class="inline-flex items-center gap-2 text-sm font-semibold leading-6 text-white bg-primary hover:bg-primary-light px-5 py-2.5 rounded-full transition-all shadow hover:shadow-md transform hover:-translate-y-0.5">
                Hubungi Kami <i class="fa-solid fa-arrow-right text-secondary text-xs"></i>
            </a>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" class="lg:hidden" role="dialog" aria-modal="true" x-cloak>
        <div x-show="mobileMenuOpen" x-transition.opacity class="fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-sm"
            @click="mobileMenuOpen = false"></div>
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-slate-900/10 shadow-2xl">

            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}" class="-m-1.5 p-1.5 flex items-center gap-3">
                    <div
                        class="flex items-center justify-center w-8 h-8 rounded bg-primary text-white font-bold text-sm">
                        CJ
                    </div>
                    <span class="font-bold text-slate-900">PT. Charlyn Jaya</span>
                </a>
                <button type="button" @click="mobileMenuOpen = false"
                    class="-m-2.5 rounded-md p-2.5 text-slate-700 hover:bg-slate-50 transition-colors">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-slate-100/10">
                    <div class="space-y-2 py-6">
                        @foreach ($navLinks as $link)
                            <a href="{{ $link['url'] }}"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 {{ request()->url() == $link['url'] ? 'text-primary bg-slate-50' : 'text-slate-900 hover:bg-slate-50' }}">
                                {{ $link['name'] }}
                            </a>
                        @endforeach
                    </div>
                    <div class="py-6">
                        <a href="#penawaran"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-white bg-primary text-center hover:bg-primary-light transition-colors">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
