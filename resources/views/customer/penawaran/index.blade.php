<x-layout.app>
    <x-slot name="title">Monitoring Penawaran</x-slot>

    <!-- Hero Section -->
    <section
        class="relative bg-primary pt-32 pb-24 sm:pt-40 sm:pb-32 overflow-hidden isolate border-b-2 border-slate-100">
        <div class="absolute inset-0 -z-10 opacity-20"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px;"></div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tight text-white mb-6">Monitoring <span
                    class="text-secondary">Penawaran</span></h1>
            <p class="text-lg text-slate-300 max-w-3xl mx-auto font-medium">Pantau status penawaran yang telah Anda
                ajukan kepada kami.</p>
        </div>
    </section>

    <div class="min-h-screen bg-slate-50 py-12 px-4 sm:px-6 lg:px-8 text-slate-900">
        <div class="max-w-7xl mx-auto">

            <div
                class="flex flex-col md:flex-row md:items-center justify-between mb-8 pb-6 border-b border-slate-200 gap-4">
                <div>
                    <h2 class="text-2xl font-black text-primary tracking-tight">Daftar Penawaran Anda</h2>
                    <p class="mt-1 text-sm text-slate-500">Berikut adalah riwayat penawaran yang telah Anda kirimkan.
                    </p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('penawaran.create') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-primary text-white font-bold hover:bg-primary-light transition-colors shadow-sm">
                        <i class="fa-solid fa-plus"></i> Buat Penawaran
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-red-50 text-red-600 font-bold border border-red-100 hover:bg-red-100 transition-colors shadow-sm">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

            @if (session('success'))
                <div
                    class="mb-8 bg-green-50 text-green-700 p-4 rounded-xl text-sm border border-green-200 flex items-center gap-3">
                    <i class="fa-solid fa-circle-check text-lg"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-600">
                        <thead
                            class="bg-slate-50 text-slate-800 uppercase text-xs font-bold tracking-wider border-b border-slate-200">
                            <tr>
                                <th scope="col" class="px-6 py-4">No / ID</th>
                                <th scope="col" class="px-6 py-4">Layanan</th>
                                <th scope="col" class="px-6 py-4">Nama Perusahaan</th>
                                <th scope="col" class="px-6 py-4">Tanggal Permintaan</th>
                                <th scope="col" class="px-6 py-4">Status</th>
                                <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                                <th scope="col" class="px-6 py-4 text-right">Updated At</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($penawarans as $penawaran)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-slate-900">
                                        #{{ str_pad($penawaran->id, 5, '0', STR_PAD_LEFT) }}</td>
                                    <td class="px-6 py-4 font-semibold text-primary">
                                        {{ $penawaran->layanan?->nama ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4">{{ $penawaran->nama_perusahaan ?? '-' }}</td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($penawaran->tanggal_permintaan)->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($penawaran->status === 'pending')
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800">
                                                <i class="fa-solid fa-clock opacity-70"></i> Pending
                                            </span>
                                        @elseif($penawaran->status === 'po')
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800">
                                                <i class="fa-solid fa-file-invoice opacity-70"></i> PO
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-800">
                                                {{ ucfirst($penawaran->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('penawaran.show', $penawaran->id) }}"
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200 transition-colors text-xs font-bold">
                                                <i class="fa-solid fa-eye"></i> Detail
                                            </a>
                                            @if ($penawaran->status === 'po')
                                                @if ($penawaran->file_penawaran)
                                                    <a href="{{ route('penawaran.file', ['id' => $penawaran->id, 'type' => 'admin']) }}"
                                                        target="_blank"
                                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-indigo-50 text-indigo-700 hover:bg-indigo-100 transition-colors text-xs font-bold">
                                                        <i class="fa-solid fa-file-pdf"></i> Lihat Penawaran
                                                    </a>
                                                @endif

                                                @if ($penawaran->po)
                                                    <a href="{{ route('po.show', $penawaran->po->id) }}"
                                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-green-100 text-green-700 hover:bg-green-200 transition-colors text-xs font-bold">
                                                        <i class="fa-solid fa-file-circle-check"></i> Detail PO
                                                    </a>
                                                @else
                                                    <a href="{{ route('po.create', ['penawaran_id' => $penawaran->id]) }}"
                                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-green-50 text-green-700 hover:bg-green-100 transition-colors text-xs font-bold">
                                                        <i class="fa-solid fa-plus-circle"></i> Buat PO
                                                    </a>
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-right text-slate-500 text-xs">
                                        {{ $penawaran->updated_at ? $penawaran->updated_at->diffForHumans() : '-' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center text-slate-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <div
                                                class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mb-4 text-slate-300">
                                                <i class="fa-solid fa-folder-open text-2xl"></i>
                                            </div>
                                            <p class="font-medium text-slate-600 mb-1">Belum ada data penawaran</p>
                                            <p class="text-sm">Anda belum mengajukan penawaran apapun saat ini.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-layout.app>
