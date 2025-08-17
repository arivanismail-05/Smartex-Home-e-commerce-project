@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-[#B0B0B0]']) }}>
    {{ $value ?? $slot }}
</label>

