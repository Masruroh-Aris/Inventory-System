<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="animate-fade-in-up delay-200">
        @csrf

        <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold text-gray-800">Create Account</h2>
            <p class="text-gray-500 text-sm mt-1">Join us today!</p>
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="ml-1" />
            <x-text-input id="name" class="block mt-1 w-full rounded-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-2" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Full Name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 ml-1" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="ml-1" />
            <x-text-input id="email" class="block mt-1 w-full rounded-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-2" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email Address" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 ml-1" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="ml-1" />

            <x-text-input id="password" class="block mt-1 w-full rounded-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-2"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="Password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 ml-1" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="ml-1" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 px-4 py-2"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Confirm Password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 ml-1" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <a class="underline text-sm text-gray-600 hover:text-purple-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="ms-4 inline-flex items-center px-6 py-2 bg-gradient-to-r from-purple-600 to-pink-600 border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:from-purple-700 hover:to-pink-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150 transform hover:scale-105">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>
