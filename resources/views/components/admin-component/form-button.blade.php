@props(['action' , 'slot'])

<button wire:click.prevent="{{ $action }}" class="  items-center py-3  px-8 bg-[#D97850] border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-[#fe976e] focus:bg-[#fe976e] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">{{ $slot }}</button>
