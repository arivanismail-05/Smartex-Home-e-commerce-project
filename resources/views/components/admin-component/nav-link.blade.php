@props(['href','value','active' => false])


@php
$classes = ($active ?? false)
            ? 'block py-2 px-3 text-[#D97850]  rounded-sm md:bg-transparent md:text-[#D97850] md:p-0 '
            : 'text-gray-400 hover:text-gray-300';
@endphp
<li class="px-4 py-2">
<a aria-current=" {{ $active ? 'page' : 'false' }}"
 href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }} >{{ $value }}</a>
</li>