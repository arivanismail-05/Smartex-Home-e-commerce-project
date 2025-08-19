<x-admin-layout>
    <x-admin-component.login-contain>

    <div>
        <p class="text-xl font-medium text-center">{{ __('Admin Login') }}</p>
    </div>
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-admin-component.input-label for="email" :value="__('Email')" />
            <x-admin-component.text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"  autofocus autocomplete="username" />
            <x-admin-component.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-admin-component.input-label for="password" :value="__('Password')" />
            <x-admin-component.text-input id="password" class="block w-full mt-1" type="password" name="password"  autocomplete="current-password" />
            <x-admin-component.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center mt-4">
            <x-admin-component.primary-button class="">
                {{ __('Log in') }}
            </x-admin-component.primary-button>
        </div>
    </form>
    </x-admin-component.login-contain>
</x-admin-layout>
