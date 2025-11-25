<section>
    <header>
        <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-600">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="ml-1" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full rounded-full border-gray-300 focus:border-pink-500 focus:ring-pink-500 px-4 py-2 transition duration-200" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 ml-1" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" class="ml-1" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full rounded-full border-gray-300 focus:border-pink-500 focus:ring-pink-500 px-4 py-2 transition duration-200" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 ml-1" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="ml-1" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full rounded-full border-gray-300 focus:border-pink-500 focus:ring-pink-500 px-4 py-2 transition duration-200" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 ml-1" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white font-bold py-2 px-6 rounded-full shadow-md transform transition hover:scale-105 hover:shadow-lg">
                {{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-medium"
                >{{ __('Password updated! 🔒') }}</p>
            @endif
        </div>
    </form>
</section>
