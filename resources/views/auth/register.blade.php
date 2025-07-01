<x-guest-layout>
    <div class="max-w-md mx-auto mt-8">
        <h2 class="text-3xl font-bold text-center text-[#022954] mb-8">Create a Kobami Account</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-6">
                <x-input-label for="name" :value="__('Name')" class="text-[#022954] font-medium" />
                <x-text-input
                    id="name"
                    class="block mt-1 w-full rounded-xl border border-gray-300 focus:border-[#022954] focus:ring focus:ring-[#022954]/50 text-lg py-3"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-6">
                <x-input-label for="email" :value="__('Email')" class="text-[#022954] font-medium" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full rounded-xl border border-gray-300 focus:border-[#022954] focus:ring focus:ring-[#022954]/50 text-lg py-3"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Role -->
            <div class="mb-6">
                <x-input-label for="role" :value="__('Register as')" class="text-[#022954] font-medium" />
                <select
                    name="role"
                    id="role"
                    required
                    class="block mt-1 w-full rounded-xl border border-gray-300 focus:border-[#022954] focus:ring focus:ring-[#022954]/50 text-lg py-3"
                >
                    <option value="customer">Customer</option>
                    <option value="vendor">Vendor</option>
                </select>
            </div>

            <!-- Password -->
            <div class="mb-6">
                <x-input-label for="password" :value="__('Password')" class="text-[#022954] font-medium" />
                <x-text-input
                    id="password"
                    class="block mt-1 w-full rounded-xl border border-gray-300 focus:border-[#022954] focus:ring focus:ring-[#022954]/50 text-lg py-3"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-8">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-[#022954] font-medium" />
                <x-text-input
                    id="password_confirmation"
                    class="block mt-1 w-full rounded-xl border border-gray-300 focus:border-[#022954] focus:ring focus:ring-[#022954]/50 text-lg py-3"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Actions -->
            <div class="flex flex-col items-center gap-4">
                <x-primary-button class="bg-[#022954] hover:bg-[#011e3f] text-white flex justify-center w-full h-14 rounded-xl font-bold text-xl">
                    {{ __('Register') }}
                </x-primary-button>

                <a
                    class="underline text-sm text-[#022954] hover:text-[#011e3f]"
                    href="{{ route('login') }}"
                >
                    {{ __('Already registered?') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
