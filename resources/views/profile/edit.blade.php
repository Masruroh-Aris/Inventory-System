<x-app-layout>
    <div class="py-12 animate-fade-in-up">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Profile Information -->
            <div class="p-8 bg-white shadow-xl sm:rounded-2xl border-t-4 border-cyan-500 hover:shadow-2xl transition duration-300">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-8 bg-white shadow-xl sm:rounded-2xl border-t-4 border-pink-500 hover:shadow-2xl transition duration-300">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User -->
            <div class="p-8 bg-white shadow-xl sm:rounded-2xl border-t-4 border-red-500 hover:shadow-2xl transition duration-300">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
