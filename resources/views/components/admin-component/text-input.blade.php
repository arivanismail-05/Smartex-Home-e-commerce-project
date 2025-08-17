@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'py-2.5 sm:py-3 px-4 block w-full border-gray-200 bg-gray-100 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none']) }}>
