<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="animate-fade-in-up delay-200">
        @csrf

        <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold text-gray-800">Welcome Back!</h2>
            <p class="text-gray-500 text-sm mt-1">Please login to your account</p>
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="ml-1" />
            <x-text-input id="email" class="block mt-1 w-full rounded-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-2" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 ml-1" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="ml-1" />

            <x-text-input id="password" class="block mt-1 w-full rounded-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-2"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="Enter your password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 ml-1" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4 ml-1">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-purple-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="ms-3 inline-flex items-center px-6 py-2 bg-gradient-to-r from-purple-600 to-pink-600 border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:from-purple-700 hover:to-pink-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150 transform hover:scale-105">
                {{ __('Log in') }}
            </button>
        </div>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Don't have an account? 
                <a href="{{ route('register') }}" class="font-bold text-purple-600 hover:text-purple-800">Create an account</a>
            </p>
        </div>
    </form>
</x-guest-layout>
