@props(['label', 'name'])

<div class="flex flex-col">
    <label for="brand_id" class="block my-2 text-gray-300">{{ $label }}</label>
<select {{ $attributes->merge(['class' => 'border border-gray-200 bg-[#111315] rounded-sm focus:border-white focus:ring-white disabled:opacity-50 disabled:pointer-events-none']) }} name="{{ $name }}" id="{{ $name }}">
    <option value=""></option>
    
    {{ $slot }}
</select>
    @error($name)
        <span class="mt-2 text-sm italic text-red-500">{{ $message }}</span>
    @enderror
</div>