<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md border-b-4 border-indigo-500 shadow-lg sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="transform transition hover:scale-110 hover:rotate-3 duration-300">
                        <x-application-logo class="block h-10 w-auto fill-current text-indigo-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                        class="px-4 py-2 rounded-full font-bold transition-all duration-300 flex items-center gap-2 {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-pink-500 to-purple-600 text-white shadow-md transform scale-105' : 'text-gray-600 hover:bg-indigo-50 hover:text-indigo-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if(Auth::user()->isAdmin() || Auth::user()->isGudang())
                        <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')"
                            class="px-4 py-2 rounded-full font-bold transition-all duration-300 flex items-center gap-2 {{ request()->routeIs('products.*') ? 'bg-gradient-to-r from-pink-500 to-purple-600 text-white shadow-md transform scale-105' : 'text-gray-600 hover:bg-indigo-50 hover:text-indigo-600' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            {{ __('Products') }}
                        </x-nav-link>


                    @endif

                    @if(Auth::user()->isGudang() || Auth::user()->isAdmin())
                        <x-nav-link :href="route('stocks.index')" :active="request()->routeIs('stocks.*')"
                            class="px-4 py-2 rounded-full font-bold transition-all duration-300 flex items-center gap-2 {{ request()->routeIs('stocks.*') ? 'bg-gradient-to-r from-pink-500 to-purple-600 text-white shadow-md transform scale-105' : 'text-gray-600 hover:bg-indigo-50 hover:text-indigo-600' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                            {{ __('Stock In/Out') }}
                        </x-nav-link>
                    @endif

                    @if(Auth::user()->isKasir())
                        <x-nav-link :href="route('transactions.history')" :active="request()->routeIs('transactions.history')"
                            class="px-4 py-2 rounded-full font-bold transition-all duration-300 flex items-center gap-2 {{ request()->routeIs('transactions.history') ? 'bg-gradient-to-r from-pink-500 to-purple-600 text-white shadow-md transform scale-105' : 'text-gray-600 hover:bg-indigo-50 hover:text-indigo-600' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ __('Transaction') }}
                        </x-nav-link>
                    @endif

                    @if(Auth::user()->isAdmin())
                        <x-nav-link :href="route('reports.index')" :active="request()->routeIs('reports.index')"
                            class="px-4 py-2 rounded-full font-bold transition-all duration-300 flex items-center gap-2 {{ request()->routeIs('reports.index') ? 'bg-gradient-to-r from-pink-500 to-purple-600 text-white shadow-md transform scale-105' : 'text-gray-600 hover:bg-indigo-50 hover:text-indigo-600' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            {{ __('Reports') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border-2 border-indigo-100 text-sm leading-4 font-bold rounded-full text-indigo-600 bg-indigo-50 hover:bg-indigo-100 hover:border-indigo-300 focus:outline-none transition ease-in-out duration-150 shadow-sm">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="hover:bg-pink-50 hover:text-pink-600 transition duration-150">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    class="hover:bg-red-50 hover:text-red-600 transition duration-150"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-100">
        <div class="pt-2 pb-3 space-y-1 px-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-lg">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @if(Auth::user()->isAdmin() || Auth::user()->isGudang())
                <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')" class="rounded-lg">
                    {{ __('Products') }}
                </x-responsive-nav-link>

            @endif
            @if(Auth::user()->isGudang() || Auth::user()->isAdmin())
                <x-responsive-nav-link :href="route('stocks.index')" :active="request()->routeIs('stocks.*')" class="rounded-lg">
                    {{ __('Stock In/Out') }}
                </x-responsive-nav-link>
            @endif
            @if(Auth::user()->isKasir())
                <x-responsive-nav-link :href="route('transactions.history')" :active="request()->routeIs('transactions.history')" class="rounded-lg">
                    {{ __('Transaction') }}
                </x-responsive-nav-link>
            @endif
            @if(Auth::user()->isAdmin())
                <x-responsive-nav-link :href="route('reports.index')" :active="request()->routeIs('reports.index')" class="rounded-lg">
                    {{ __('Reports') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 bg-gray-50">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1 px-2">
                <x-responsive-nav-link :href="route('profile.edit')" class="rounded-lg">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" class="rounded-lg text-red-600"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
