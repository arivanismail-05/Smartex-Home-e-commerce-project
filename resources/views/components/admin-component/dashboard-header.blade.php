@props(['label', 'count'])


<div class="bg-[#111315] dark:bg-[#111315] p-6 rounded-lg shadow-sm border-l-4 border-[#D97850] flex items-start gap-3">
    <div class="bg-[#d9795058] rounded-md p-2" >
        {{ $slot }}
    </div>
    <div>
    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $label }}</h3>
    <p class="mt-1 text-2xl font-bold text-gray-900 dark:text-white">{{ $count }}</p>
    </div>
</div>