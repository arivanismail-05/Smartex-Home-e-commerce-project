@props(['label' , 'placeholder' , 'for'])


<div>
    <label for="{{ $for }}" class="block my-2 text-gray-300">{{ $label }}</label>
    <input  {{ $attributes }} class=" border border-gray-200 bg-[#111315] rounded-sm focus:border-white focus:ring-white disabled:opacity-50 disabled:pointer-events-none" 
    placeholder="{{ $placeholder }}" />
</div>