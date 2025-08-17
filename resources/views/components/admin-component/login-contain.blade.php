 <div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0">
    <div class="text-white w-full p-8 mt-6 overflow-hidden border border-[#3A3A3A] bg-[#1C1F22] shadow-sm sm:max-w-md rounded">
        <div class="flex justify-center mb-4">
            <a href="/">
                <x-admin-component.application-logo class="w-20 h-20  fill-current" />
            </a>
        </div>
        {{ $slot }}
    </div>
</div>