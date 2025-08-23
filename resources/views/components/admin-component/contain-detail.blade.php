@props(['label'])


<h2 class="text-md font-semibold text-[#D97850]">{{ $label }}</h2>
<div {{ $attributes->merge(['class' => 'grid  gap-2']) }}>
    {{ $slot }}
</div>