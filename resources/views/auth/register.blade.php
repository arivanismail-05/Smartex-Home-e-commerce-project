<x-guest-layout>
    
    <h1 class="mb-2 text-3xl font-black text-center text-[#0059cf]">Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-5">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
        <!-- Phone Number -->
        <div class="mt-5">
            <x-input-label for="phone" :value="__('Phone Number')" />
            <x-text-input id="phone" class="block w-full mt-1" type="tel" name="phone" :value="old('phone')" required autocomplete="phone" placeholder="+964 XXXXXXXXXX" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

         <!-- Location -->
        <div class="mt-5">
            <x-input-label for="location" :value="__('Location')" />
            <x-text-input id="location" class="block w-full mt-1" type="text" name="location" :value="old('location')" required autocomplete="location" placeholder="Enter your location" />
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        </div>
        </div>

        <!-- Password -->
        <div class="mt-5">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="Enter your password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-5">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-5">
            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 " href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
