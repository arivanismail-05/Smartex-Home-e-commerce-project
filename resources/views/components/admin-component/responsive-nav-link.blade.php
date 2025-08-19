@props(['active'])

@php
$classes = ($active ?? false)
? 'text-white' : ' block font-normal items-center flex rounded px-2 py-1 text-gray-400 hover:bg-[#424246] hover:text-[#F0F0F0] transition-colors duration-150';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
