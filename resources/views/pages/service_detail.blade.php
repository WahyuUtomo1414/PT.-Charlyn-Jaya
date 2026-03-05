<x-layout.app>
    <x-slot name="title">{{ $layanan->nama }}</x-slot>

    <!-- Hero Section -->
    <section
        class="relative bg-primary pt-32 pb-24 sm:pt-40 sm:pb-32 overflow-hidden isolate border-b-2 border-slate-100">
        <!-- Background Image / Thumbnail -->
        @php
            $banner = $layanan->benner;
            $bannerUrl = $banner
                ? (\Illuminate\Support\Str::startsWith($banner, ['http://', 'https://'])
                    ? $banner
                    : route('private-file', ['path' => ltrim($banner, '/')]))
                : null;
            $detailImage = $layanan->foto[0] ?? $layanan->benner;
            $detailImageUrl = $detailImage
                ? (\Illuminate\Support\Str::startsWith($detailImage, ['http://', 'https://'])
                    ? $detailImage
                    : route('private-file', ['path' => ltrim($detailImage, '/')]))
                : null;
        @endphp
        <div class="absolute inset-0 -z-20">
            @if ($bannerUrl)
                <img src="{{ $bannerUrl }}" alt="{{ $layanan->nama }}" class="h-full w-full object-cover opacity-30">
            @else
                <div class="h-full w-full bg-primary/60"></div>
            @endif
        </div>
        <!-- Primary Overlay -->
        <div class="absolute inset-0 -z-10 bg-primary/80"></div>
        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-50 h-28"></div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tight text-white mb-6">{{ $layanan->nama }}</h1>
            <p class="text-lg text-slate-300 max-w-3xl mx-auto font-medium">Solusi profesional untuk kebutuhan
                perusahaan Anda.</p>
        </div>
    </section>

    <!-- Detail Content Section -->
    <section class="py-16 sm:py-24 bg-slate-50 relative">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div
                class="bg-white rounded-[2.5rem] p-8 md:p-12 lg:p-16 shadow-xl border border-slate-100 flex flex-col lg:flex-row gap-16 items-center">

                <!-- Main Content Text -->
                <div class="w-full lg:w-1/2">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/5 text-primary text-sm font-bold mb-6">
                        <i class="fa-solid fa-circle-info"></i> Detail Layanan
                    </div>
                    <h2 class="text-3xl font-black text-slate-900 mb-6 tracking-tight">Lebih Dekat Dengan Layanan Kami
                    </h2>

                    <!-- Deskripsi -->
                    <div class="prose prose-slate lg:prose-lg text-slate-600 mb-8">
                        <p class="font-medium text-lg text-slate-700">
                            {{ $layanan->deskripsi ?? 'Solusi profesional untuk kebutuhan perusahaan Anda.' }}
                        </p>
                    </div>

                    <!-- List Layanan -->
                    <h3 class="text-xl font-bold text-slate-800 mb-4">Lingkup Pekerjaan Utama:</h3>
                    <ul class="space-y-4 mb-8">
                        @forelse ($layanan->lingkup_layanan ?? [] as $item)
                            <li class="flex items-start gap-4">
                                <div
                                    class="mt-1 w-6 h-6 rounded-full bg-secondary/20 flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-check text-secondary text-xs"></i>
                                </div>
                                <span class="text-slate-700 font-medium">{{ $item }}</span>
                            </li>
                        @empty
                            <li class="text-slate-600">Detail layanan akan segera tersedia.</li>
                        @endforelse
                    </ul>

                    <a href="{{ route('penawaran.create') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-primary text-white font-bold hover:bg-primary-light transition-colors shadow-md hover:shadow-lg">
                        Buat Penawaran <i class="fa-solid fa-arrow-right text-secondary text-sm"></i>
                    </a>
                </div>

                <!-- Gambar/Visual -->
                <div class="w-full lg:w-1/2 relative">
                    <div class="absolute -inset-4 bg-secondary/10 rounded-3xl -z-10 transform -rotate-3"></div>
                    @if ($detailImageUrl)
                        <img src="{{ $detailImageUrl }}" alt="{{ $layanan->nama }}"
                            class="rounded-2xl shadow-lg w-full object-cover h-[500px]">
                    @else
                        <div class="rounded-2xl shadow-lg w-full h-[500px] bg-slate-200"></div>
                    @endif
                    <div
                        class="absolute -bottom-8 -left-8 bg-white p-6 rounded-2xl shadow-xl flex items-center gap-4 border border-slate-100">
                        <div
                            class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center text-primary text-2xl">
                            <i class="fa-solid fa-award"></i>
                        </div>
                        <div>
                            <div class="font-black text-slate-900 text-lg">Terjamin</div>
                            <div class="text-sm font-medium text-slate-500">Mutu & Kualitas Profesional</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Client Section -->
    <section class="py-16 bg-white border-t border-slate-100">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <p class="text-center text-sm font-semibold leading-8 text-slate-500 mb-8 uppercase tracking-widest">
                Dipercaya oleh berbagai instansi
            </p>
            <div
                class="mx-auto flex max-w-7xl flex-wrap items-center justify-center gap-6 opacity-60 grayscale hover:grayscale-0 transition-all duration-500 sm:flex-nowrap sm:justify-between">
                @forelse ($customers as $customer)
                    <div class="flex items-center justify-center">
                        @if ($customer->logo)
                            <img src="{{ \Illuminate\Support\Str::startsWith($customer->logo, ['http://', 'https://']) ? $customer->logo : route('private-file', ['path' => ltrim($customer->logo, '/')]) }}"
                                alt="{{ $customer->nama }}"
                                class="h-12 w-auto object-contain transition-all duration-300 hover:scale-105">
                        @else
                            <div class="h-12 w-24 rounded-lg border border-slate-200 bg-slate-100"></div>
                        @endif
                    </div>
                @empty
                    <div class="flex items-center justify-center"><i
                            class="fa-solid fa-building-columns text-4xl text-slate-400 hover:text-primary transition-colors"></i>
                    </div>
                    <div class="flex items-center justify-center"><i
                            class="fa-solid fa-hospital text-4xl text-slate-400 hover:text-primary transition-colors"></i>
                    </div>
                    <div class="flex items-center justify-center"><i
                            class="fa-solid fa-school text-4xl text-slate-400 hover:text-primary transition-colors"></i>
                    </div>
                    <div class="flex items-center justify-center"><i
                            class="fa-solid fa-industry text-4xl text-slate-400 hover:text-primary transition-colors"></i>
                    </div>
                    <div class="flex items-center justify-center"><i
                            class="fa-solid fa-building-user text-4xl text-slate-400 hover:text-primary transition-colors"></i>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

</x-layout.app>
