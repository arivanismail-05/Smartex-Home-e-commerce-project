
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'block w-full mt-4 items-center py-2.5 sm:py-3 px-4 bg-[#D97850] border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-[#E0825C] focus:bg-[#E0825C] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>


