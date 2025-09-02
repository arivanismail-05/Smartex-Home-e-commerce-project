<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-5 py-3 bg-[#0059cf] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#0046a3] focus:bg-[#0046a3] active:bg-[#003d8a] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
