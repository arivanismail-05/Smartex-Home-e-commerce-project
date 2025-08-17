@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-[#8C9094]']) }}>
    {{ $value ?? $slot }}
</label>

