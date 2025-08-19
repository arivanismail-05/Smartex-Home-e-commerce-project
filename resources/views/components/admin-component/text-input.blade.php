@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'py-2.5 sm:py-3 px-4 block w-full border-gray-200 bg-[#111315] rounded-md sm:text-sm focus:border-white focus:ring-white disabled:opacity-50 disabled:pointer-events-none']) }}>
