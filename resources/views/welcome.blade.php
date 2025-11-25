<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masruroh Inventory System</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        @keyframes float-delayed {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>
<body class="antialiased overflow-hidden bg-gray-900 selection:bg-pink-500 selection:text-white">
    
    <!-- Animated Background -->
    <div class="fixed inset-0 w-full h-full overflow-hidden -z-10">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-yellow-500 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-32 left-1/3 w-96 h-96 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/50 via-purple-900/50 to-pink-900/50"></div>
    </div>

    <div class="relative min-h-screen flex flex-col items-center justify-center p-6">
        
        <!-- Floating Shapes -->
        <div class="absolute top-20 left-20 text-white/20 animate-[float_6s_ease-in-out_infinite]">
            <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M20 10V8h-4V4h-2v4h-4V4H8v4H4v2h4v4H4v2h4v4h2v-4h4v4h2v-4h4v-2h-4v-4h4zm-6 4h-4v-4h4v4z"/></svg>
        </div>
        <div class="absolute bottom-20 right-20 text-white/20 animate-[float-delayed_8s_ease-in-out_infinite]">
            <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zm0 9l2.5-1.25L12 8.5l-2.5 1.25L12 11zm0 2.5l-5-2.5-5 2.5L12 22l10-8.5-5-2.5-5 2.5z"/></svg>
        </div>

        <!-- Main Content Card -->
        <div class="glass-card rounded-3xl p-12 max-w-4xl w-full text-center shadow-2xl transform transition hover:scale-[1.01] duration-500" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
            
            <!-- Logo/Icon -->
            <div class="mb-8 inline-block relative">
                <div class="absolute inset-0 bg-white rounded-full blur-xl opacity-50 animate-pulse"></div>
                <div class="relative bg-white p-4 rounded-full shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
            </div>

            <!-- Title -->
            <h1 class="text-5xl md:text-7xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-white via-pink-200 to-indigo-200 mb-6 drop-shadow-lg tracking-tight leading-tight">
                Selamat Datang di <br>
                <span class="text-yellow-300">Sistem Masruroh Inventory</span>
            </h1>

            <!-- Subtitle -->
            <p class="text-xl text-indigo-100 mb-10 max-w-2xl mx-auto leading-relaxed">
                Kelola stok barang dengan mudah, cepat, dan menyenangkan! 
                <span class="inline-block animate-bounce">🚀</span>
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-center gap-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" 
                           class="group relative px-8 py-4 bg-white text-indigo-900 font-bold rounded-full shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden">
                            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-indigo-400 to-purple-500 opacity-0 group-hover:opacity-20 transition-opacity"></span>
                            <span class="relative flex items-center text-lg">
                                Masuk ke Dashboard
                                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                            </span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="group relative px-8 py-4 bg-gradient-to-r from-pink-500 to-purple-600 text-white font-bold rounded-full shadow-lg hover:shadow-pink-500/50 transition transform hover:-translate-y-1 overflow-hidden">
                            <span class="absolute inset-0 w-full h-full bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                            <span class="relative flex items-center text-lg">
                                Login Sekarang
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            </span>
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                               class="group relative px-8 py-4 bg-transparent border-2 border-white/50 text-white font-bold rounded-full hover:bg-white/10 transition transform hover:-translate-y-1 backdrop-blur-sm">
                                <span class="relative flex items-center text-lg">
                                    Daftar Akun
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                                </span>
                            </a>
                        @endif
                    @endauth
                @endif
            </div>

            <!-- Footer Text -->
            <div class="mt-12 text-sm text-indigo-200/60 font-medium">
                &copy; {{ date('Y') }} Masruroh Inventory System. Made with ❤️ and ✨
            </div>
        </div>
    </div>
</body>
</html>
