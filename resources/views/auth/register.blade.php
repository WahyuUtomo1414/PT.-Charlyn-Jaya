<x-layout.app>
    <x-slot name="title">Register</x-slot>

    <!-- Hero Section -->
    <section class="relative bg-primary pt-48 pb-16 overflow-hidden isolate border-b-2 border-slate-100">
        <div class="absolute inset-0 -z-10 opacity-20"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px;"></div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-black tracking-tight text-white mb-4">Daftar <span class="text-secondary">Akun</span>
            </h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto font-medium">Buat akun agar Anda dapat mulai mengajukan
                penawaran.</p>
        </div>
    </section>

    <div class="bg-slate-50 py-16 px-4 sm:px-6 lg:px-8 text-slate-900 flex justify-center">
        <div class="max-w-md w-full space-y-8 bg-white p-8 sm:p-10 rounded-3xl shadow-xl border border-slate-100">
            <div>
                <h2 class="text-center text-3xl font-black text-primary uppercase tracking-tight">
                    Register
                </h2>
                <p class="mt-2 text-center text-sm text-slate-600">
                    Sudah punya akun?
                    <a href="{{ route('login') }}"
                        class="font-medium text-secondary hover:text-secondary-light transition-colors">
                        masuk di sini
                    </a>
                </p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 text-red-500 p-4 rounded-xl text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('register.post') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700">Nama Lengkap</label>
                        <input id="name" name="name" type="text" autocomplete="name" required
                            value="{{ old('name') }}"
                            class="mt-1 appearance-none relative block w-full px-4 py-3 border border-slate-300 placeholder-slate-400 text-slate-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-secondary focus:border-secondary focus:z-10 sm:text-sm transition-colors"
                            placeholder="John Doe">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700">Email Address</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                            value="{{ old('email') }}"
                            class="mt-1 appearance-none relative block w-full px-4 py-3 border border-slate-300 placeholder-slate-400 text-slate-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-secondary focus:border-secondary focus:z-10 sm:text-sm transition-colors"
                            placeholder="nama@email.com">
                    </div>

                    <div>
                        <label for="no_tlpn" class="block text-sm font-medium text-slate-700">No. Telepon
                            (WhatsApp)</label>
                        <input id="no_tlpn" name="no_tlpn" type="text" autocomplete="tel" required
                            value="{{ old('no_tlpn') }}"
                            class="mt-1 appearance-none relative block w-full px-4 py-3 border border-slate-300 placeholder-slate-400 text-slate-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-secondary focus:border-secondary focus:z-10 sm:text-sm transition-colors"
                            placeholder="08123456789">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                        <input id="password" name="password" type="password" required
                            class="mt-1 appearance-none relative block w-full px-4 py-3 border border-slate-300 placeholder-slate-400 text-slate-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-secondary focus:border-secondary focus:z-10 sm:text-sm transition-colors"
                            placeholder="Minimal 8 karakter">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Konfirmasi
                            Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="mt-1 appearance-none relative block w-full px-4 py-3 border border-slate-300 placeholder-slate-400 text-slate-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-secondary focus:border-secondary focus:z-10 sm:text-sm transition-colors"
                            placeholder="Ulangi password">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-primary bg-secondary hover:bg-secondary-light focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary transition-all shadow-md">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout.app>
