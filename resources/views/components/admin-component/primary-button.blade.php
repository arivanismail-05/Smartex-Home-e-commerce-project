<button {{ $attributes->merge(['type' => 'submit', 'class' => 'block w-full mt-4 items-center py-2.5 sm:py-3 px-4 bg-[#E65A2B] border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-[#fb7041] focus:bg-[#fb7041] active:bg-[#cf5229] focus:outline-none  focus:ring-2 focus:ring-[#cf5229] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

