<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat relative px-4" 
         style="background-image: url('https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        
        <div class="absolute inset-0 bg-blue-900/40 backdrop-blur-[2px]"></div>

        <div class="relative w-full max-w-md transition-all duration-500 hover:scale-[1.01]">
            <div class="bg-white/95 backdrop-blur-md shadow-[0_20px_50px_rgba(0,0,0,0.3)] rounded-[2rem] overflow-hidden border border-white/50">
                
                <div class="bg-gradient-to-r from-blue-600 to-cyan-500 p-10 text-center text-white relative">
                    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-24 h-24 bg-white/10 rounded-full"></div>
                    
                    <div class="inline-block p-4 bg-white rounded-3xl shadow-xl mb-4">
                        <img src="{{ asset('images/logo-sekolah.png') }}" 
                             alt="Logo SD" 
                             class="w-20 h-20 object-contain">
                    </div>
                    <h2 class="text-2xl font-black uppercase tracking-tight">SIAKAD SD</h2>
                    <p class="text-blue-50 text-sm font-medium opacity-90">Sistem Informasi Akademik Sekolah Dasar</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="p-10">
                    @csrf

                    <x-auth-session-status class="mb-6" :status="session('status')" />

                    <div class="group">
                        <label for="email" class="block text-sm font-bold text-gray-700 ml-1 mb-2">Username / Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 group-focus-within:text-blue-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <input id="email" type="email" name="email" :value="old('email')" required autofocus
                                class="block w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none" 
                                placeholder="nama@sekolah.sd.id">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <label for="password" class="block text-sm font-bold text-gray-700 ml-1 mb-2">Password</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 group-focus-within:text-blue-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                class="block w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none"
                                placeholder="••••••••">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mt-6 px-1">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" name="remember" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Ingat Saya</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-xs font-bold text-blue-600 hover:text-blue-800 transition-colors uppercase tracking-wider" href="{{ route('password.request') }}">
                                Lupa Password?
                            </a>
                        @endif
                    </div>

                    <button type="submit" 
                        class="w-full mt-8 bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-2xl shadow-[0_10px_20px_rgba(37,99,235,0.3)] transition-all duration-300 transform active:scale-95 flex items-center justify-center gap-2 uppercase tracking-widest text-sm">
                        <span>Masuk Sistem</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>

                <div class="bg-gray-50/50 p-6 text-center border-t border-gray-100">
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-widest">
                        Pemerintah Kota / Kabupaten <br>
                        <span class="text-gray-500 font-bold">Dinas Pendidikan Nasional</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>