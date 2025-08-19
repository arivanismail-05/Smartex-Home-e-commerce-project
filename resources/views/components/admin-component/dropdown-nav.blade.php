@props(['href','value'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => ' block font-normal items-center flex flex-nowrap rounded px-2 py-1 text-gray-400 hover:bg-[#424246] hover:text-[#F0F0F0] transition-colors duration-150 ']) }}>
    {{ $value ?? $slot }}
</a>