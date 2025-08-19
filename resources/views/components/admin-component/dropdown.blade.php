@props(['value'])
<li class="">
<div class="relative inline-block group">  
    <button {{ $attributes->merge(['class' => 'flex items-center gap-x-2 px-4 py-2 rounded-md font-medium transition-colors duration-200 text-gray-400 hover:text-gray-300']) }} > 
        {{ $value }}
        <svg class="w-5 h-5 transition-transform duration-300 group-hover:rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
      </svg>
    </button>
    <div  class="absolute w-full left-0  origin-top scale-y-0 opacity-0 transition-all duration-300 transform-gpu group-hover:scale-y-100 group-hover:opacity-100">  
        <div class="p-1.5 bg-[#242428]  shadow-2xl rounded-md overflow-hidden border  border-[#3e3e3f]">
            {{ $slot }}
        </div> 
    </div>
</div>
</li>
