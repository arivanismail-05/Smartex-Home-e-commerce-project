@props(['href' , 'active' , 'value'])

@php
$classes = ($active ?? false)
            ? 'px-3 py-2 text-sm font-medium relative text-white  tracking-[1px]
after:content-[""] after:bg-[#D97850] after:h-[3px] after:w-[100%] after:left-0 after:-bottom-4 after:absolute after:duration-300 
duration-300'
            : 'px-3 py-2 text-sm font-medium relative text-gray-300  tracking-[1px] hover:text-white
after:content-[""] after:bg-[#D97850] after:h-[3px] after:w-[0%] after:left-0 after:-bottom-4 after:absolute after:duration-300 hover:after:w-[100%]
duration-300';
@endphp
<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $value }}</a>