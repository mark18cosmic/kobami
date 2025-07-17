<x-guest-layout>
    <div class="max-w-md mx-auto mt-8">
        <h2 class="text-3xl font-bold text-center text-[#022954] mb-8">Log in to Kobami</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-6" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

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
                    autofocus
                    autocomplete="username"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
                    autocomplete="current-password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mb-8">
                <label for="remember_me" class="inline-flex items-center">
                    <input
                        id="remember_me"
                        type="checkbox"
                        class="rounded border-gray-300 text-[#022954] shadow-sm focus:ring-[#022954]"
                        name="remember"
                    >
                    <span class="ms-2 text-md text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Actions -->
            <div class="flex flex-col items-center gap-4">

            <button class="bg-[#022954] hover:bg-[#011e3f] transition shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-[#022954]/50 text-white flex justify-center w-full h-14 rounded-xl font-sans text-xl text-center items-center">
                    {{ __('Login') }}
                </button>
                @if (Route::has('password.request'))
                    <a
                        class="underline text-md text-[#022954] hover:text-[#011e3f]"
                        href="{{ route('password.request') }}"
                    >
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

               
            </div>
        </form>
    </div>
</x-guest-layout>
