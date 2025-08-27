@props(['label', 'count'])

<div class="bg-[#111315] dark:bg-[#111315] p-6 rounded-lg shadow-sm border-l-4 border-[#D97850] ">
    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $label }}</h3>
    <p class="mt-1 text-3xl font-bold text-gray-900 dark:text-white">{{ $count }}</p>
</div>