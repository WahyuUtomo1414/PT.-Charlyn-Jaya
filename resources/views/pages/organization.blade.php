<x-layout.app>
    <x-slot name="title">Struktur Organisasi</x-slot>

    <!-- 7. Hero Section -->
    <section
        class="relative bg-primary pt-32 pb-24 sm:pt-40 sm:pb-32 overflow-hidden isolate border-b-2 border-slate-100">
        <!-- Subtle Pattern Overlay (Dots) -->
        <div class="absolute inset-0 -z-10 opacity-20"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px;"></div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tight text-white mb-6">Struktur <span
                    class="text-secondary">Organisasi</span></h1>
            <p class="text-lg text-slate-300 max-w-3xl mx-auto font-medium">Sinergi kepemimpinan dan manajemen
                profesional dari tim penggerak utama PT. Charlyn Jaya.</p>
        </div>
    </section>

    <!-- 7.2 Organization Tree -->
    <section class="py-24 sm:py-32 bg-slate-50 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
            aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-secondary to-primary opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="text-center mb-16">
                <!-- Using Primary color text as per theme -->
                <h2 class="text-4xl font-black tracking-tight text-primary sm:text-5xl text-center">
                    Struktur Organisasi.
                </h2>
            </div>

            <div class="relative mx-auto max-w-5xl overflow-x-auto pb-12 pt-4">
                <div class="min-w-[800px] flex flex-col items-center">
                    @php
                        $photoUrl = function ($foto) {
                            if (!$foto) {
                                return asset('assets/logo.png');
                            }

                            return \Illuminate\Support\Str::startsWith($foto, ['http://', 'https://'])
                                ? $foto
                                : route('private-file', ['path' => ltrim($foto, '/')]);
                        };

                        $level3Items = $level3->values();
                        $left = $level3Items->get(0);
                        $center = $level3Items->get(1);
                        $right = $level3Items->get(2);
                        $leftChildren = $left ? $grouped->get($left->id, collect())->values() : collect();
                        $centerChildren = $center ? $grouped->get($center->id, collect())->values() : collect();
                        $rightChildren = $right ? $grouped->get($right->id, collect())->values() : collect();
                    @endphp

                    @if ($root)
                        <!-- Level 1 -->
                        <div class="flex flex-col items-center group cursor-default">
                            <div
                                class="w-32 h-32 rounded-full border-4 border-red-600 overflow-hidden shadow-lg p-1 bg-white relative z-10 mb-4 group-hover:scale-105 transition-transform">
                                <img src="{{ $photoUrl($root->foto) }}" alt="{{ $root->nama }}"
                                    class="w-full h-full object-cover rounded-full bg-slate-100 p-2">
                            </div>
                            <div
                                class="bg-[#e4cbb4] text-center px-6 py-2 rounded-lg font-bold text-slate-900 shadow-md relative z-10 min-w-[240px]">
                                <div class="text-sm tracking-wider font-extrabold mb-1">{{ strtoupper($root->nama) }}</div>
                                <div class="text-[10px] uppercase tracking-widest font-black text-slate-700">
                                    {{ $root->jabatan ?? '-' }}
                                </div>
                            </div>

                            @if ($level2)
                                <div class="w-0.5 h-10 bg-slate-400"></div>
                            @endif
                        </div>
                    @endif

                    @if ($level2)
                        <!-- Level 2 -->
                        <div class="flex flex-col items-center group cursor-default">
                            <div
                                class="w-32 h-32 rounded-full border-4 border-red-600 overflow-hidden shadow-lg p-1 bg-white relative z-10 mb-4 group-hover:scale-105 transition-transform">
                                <img src="{{ $photoUrl($level2->foto) }}" alt="{{ $level2->nama }}"
                                    class="w-full h-full object-cover rounded-full bg-slate-100 p-2">
                            </div>
                            <div
                                class="bg-[#e4cbb4] text-center px-6 py-2 rounded-lg font-bold text-slate-900 shadow-md relative z-10 min-w-[240px]">
                                <div class="text-sm tracking-wider font-extrabold mb-1">{{ strtoupper($level2->nama) }}</div>
                                <div class="text-[10px] uppercase tracking-widest font-black text-slate-700">
                                    {{ $level2->jabatan ?? '-' }}
                                </div>
                            </div>
                        </div>

                        @if ($level3Items->isNotEmpty())
                            <div class="w-0.5 h-10 bg-slate-400"></div>
                            <div class="w-full max-w-2xl border-t-2 border-slate-400 flex justify-between relative h-10">
                                <div class="absolute left-0 top-0 w-0.5 h-10 bg-slate-400 translate-x-[110px]"></div>
                                <div class="absolute left-1/2 top-0 w-0.5 h-10 bg-slate-400 -translate-x-1/2"></div>
                                <div class="absolute right-0 top-0 w-0.5 h-10 bg-slate-400 -translate-x-[110px]"></div>
                            </div>
                        @endif

                        <!-- Level 3 -->
                        <div class="flex justify-between w-full max-w-[850px] mb-8">
                            @foreach ([$left, $center, $right] as $index => $person)
                                <div class="flex flex-col items-center w-1/3 relative z-10 group cursor-default">
                                    @if ($person)
                                        <div
                                            class="w-28 h-28 rounded-full border-4 border-red-600 overflow-hidden shadow-md p-1 bg-white mb-4 group-hover:scale-105 transition-transform">
                                            <img src="{{ $photoUrl($person->foto) }}" alt="{{ $person->nama }}"
                                                class="w-full h-full object-cover rounded-full bg-slate-100 p-2">
                                        </div>
                                        <div
                                            class="bg-[#e4cbb4] text-center px-4 py-2 rounded-lg font-bold text-slate-900 shadow-md w-[200px]">
                                            <div class="text-xs tracking-wider font-extrabold mb-1 leading-tight">
                                                {{ strtoupper($person->nama) }}
                                            </div>
                                            <div class="text-[9px] uppercase tracking-widest font-black text-slate-700">
                                                {{ $person->jabatan ?? '-' }}
                                            </div>
                                        </div>

                                        @if ($index === 0 && $leftChildren->isNotEmpty())
                                            <div class="w-0.5 h-10 bg-slate-400"></div>
                                            <div class="flex flex-col items-center mt-0 w-[200px] group cursor-default space-y-6">
                                                @foreach ($leftChildren as $child)
                                                    <div class="flex flex-col items-center w-full">
                                                        <div
                                                            class="w-24 h-24 rounded-full border-4 border-red-600 overflow-hidden shadow-sm p-1 bg-white mb-3 group-hover:scale-105 transition-transform">
                                                            <img src="{{ $photoUrl($child->foto) }}" alt="{{ $child->nama }}"
                                                                class="w-full h-full object-cover rounded-full bg-slate-100 p-2">
                                                        </div>
                                                        <div
                                                            class="bg-[#e4cbb4] text-center px-4 py-2 rounded-lg font-bold text-slate-900 shadow-md w-full">
                                                            <div class="text-xs tracking-wider font-extrabold mb-1">
                                                                {{ strtoupper($child->nama) }}
                                                            </div>
                                                            <div class="text-[9px] uppercase tracking-widest font-black text-slate-700">
                                                                {{ $child->jabatan ?? '-' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        @if ($index === 1 && $centerChildren->isNotEmpty())
                                            <div class="w-0.5 h-10 bg-slate-400"></div>
                                            <div class="flex flex-col items-center mt-0 w-[200px] group cursor-default space-y-6">
                                                @foreach ($centerChildren as $child)
                                                    <div class="flex flex-col items-center w-full">
                                                        <div
                                                            class="w-24 h-24 rounded-full border-4 border-red-600 overflow-hidden shadow-sm p-1 bg-white mb-3 group-hover:scale-105 transition-transform">
                                                            <img src="{{ $photoUrl($child->foto) }}" alt="{{ $child->nama }}"
                                                                class="w-full h-full object-cover rounded-full bg-slate-100 p-2">
                                                        </div>
                                                        <div
                                                            class="bg-[#e4cbb4] text-center px-4 py-2 rounded-lg font-bold text-slate-900 shadow-md w-full">
                                                            <div class="text-xs tracking-wider font-extrabold mb-1">
                                                                {{ strtoupper($child->nama) }}
                                                            </div>
                                                            <div class="text-[9px] uppercase tracking-widest font-black text-slate-700">
                                                                {{ $child->jabatan ?? '-' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        @if ($index === 2 && $rightChildren->isNotEmpty())
                                            <div class="w-0.5 h-10 bg-slate-400"></div>
                                            <div class="flex flex-col items-center mt-0 w-[200px] group cursor-default space-y-6">
                                                @foreach ($rightChildren as $child)
                                                    <div class="flex flex-col items-center w-full">
                                                        <div
                                                            class="w-24 h-24 rounded-full border-4 border-red-600 overflow-hidden shadow-sm p-1 bg-white mb-3 group-hover:scale-105 transition-transform">
                                                            <img src="{{ $photoUrl($child->foto) }}" alt="{{ $child->nama }}"
                                                                class="w-full h-full object-cover rounded-full bg-slate-100 p-2">
                                                        </div>
                                                        <div
                                                            class="bg-[#e4cbb4] text-center px-4 py-2 rounded-lg font-bold text-slate-900 shadow-md w-full">
                                                            <div class="text-xs tracking-wider font-extrabold mb-1">
                                                                {{ strtoupper($child->nama) }}
                                                            </div>
                                                            <div class="text-[9px] uppercase tracking-widest font-black text-slate-700">
                                                                {{ $child->jabatan ?? '-' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    @else
                                        <div class="w-28 h-28 rounded-full bg-slate-200"></div>
                                        <div class="h-10 w-[200px] bg-slate-200 rounded-lg mt-4"></div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>

</x-layout.app>
