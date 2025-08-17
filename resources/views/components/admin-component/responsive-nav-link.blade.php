@props(['active'])

@php
$classes = ($active ?? false)
? 'text-white' : 'text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
