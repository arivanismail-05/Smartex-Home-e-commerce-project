@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-[#0059cf] focus:ring-[#0059cf] rounded-md shadow transition duration-300 p-3 ']) }}>
