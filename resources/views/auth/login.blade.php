<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
        <h1 class="mb-2 text-3xl font-black text-center text-[#0059cf]">Login</h1>


    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-5">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="Enter your password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-5">
            <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="border-gray-300 rounded shadow-sm text-[#0059cf] focus:ring-[#0059cf]" name="remember">
                <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
            </label>

            {{-- @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 " href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif --}}

            
            </div>
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 " href="{{ route('register') }}">
                {{ __('Not a member? Register Now') }}
            </a>

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
