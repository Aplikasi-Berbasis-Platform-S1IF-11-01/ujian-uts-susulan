<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-slate-900 px-4">
        <div class="w-full max-w-md bg-slate-800 border border-amber-500/20 rounded-2xl p-8 shadow-2xl">
            <h1 class="text-3xl font-bold text-amber-400 text-center mb-2">Admin Login</h1>
            <p class="text-slate-400 text-center mb-6">CV Diva Dashboard</p>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="text-slate-300 text-sm">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white focus:border-amber-400 focus:outline-none">
                    @error('email') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-slate-300 text-sm">Password</label>
                    <input type="password" name="password" required
                        class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white focus:border-amber-400 focus:outline-none">
                    @error('password') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <label class="flex items-center text-slate-300 text-sm">
                    <input type="checkbox" name="remember" class="mr-2"> Remember me
                </label>
                <button type="submit" class="w-full py-3 bg-gradient-to-r from-amber-400 to-yellow-500 text-slate-900 font-bold rounded-lg hover:shadow-lg hover:shadow-amber-500/50 transition">
                    Sign In
                </button>
                <a href="{{ url('/') }}" class="block text-center text-slate-400 text-sm hover:text-amber-400">← Kembali ke Home</a>
            </form>
        </div>
    </div>
</x-guest-layout>
