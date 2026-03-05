<x-layout.app>
    <x-slot name="title">Login</x-slot>

    <div class="min-h-[calc(100vh-5rem)] flex items-center justify-center bg-slate-50 py-12 px-4 sm:px-6 lg:px-8 mt-20">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-3xl shadow-xl border border-slate-100">
            <div>
                <h2 class="mt-2 text-center text-3xl font-black text-primary uppercase tracking-tight">
                    Masuk ke Akun
                </h2>
                <p class="mt-2 text-center text-sm text-slate-600">
                    Atau
                    <a href="{{ route('register') }}"
                        class="font-medium text-secondary hover:text-secondary-light transition-colors">
                        daftar akun baru
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

            <form class="mt-8 space-y-6" action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700">Email Address</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                            value="{{ old('email') }}"
                            class="mt-1 appearance-none relative block w-full px-4 py-3 border border-slate-300 placeholder-slate-400 text-slate-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-secondary focus:border-secondary focus:z-10 sm:text-sm transition-colors"
                            placeholder="nama@email.com">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="mt-1 appearance-none relative block w-full px-4 py-3 border border-slate-300 placeholder-slate-400 text-slate-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-secondary focus:border-secondary focus:z-10 sm:text-sm transition-colors"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 text-secondary focus:ring-secondary border-slate-300 rounded cursor-pointer">
                        <label for="remember" class="ml-2 block text-sm text-slate-700 cursor-pointer">
                            Ingat saya
                        </label>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-primary bg-secondary hover:bg-secondary-light focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary transition-all shadow-md">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout.app>
