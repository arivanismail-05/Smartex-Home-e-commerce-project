@props(['label'])


<div class=" max-w-xs min-w-[150px]">
<div class="relative">
    <input {{ $attributes }}
    class="w-full px-4 py-2 text-sm text-white transition duration-300 bg-transparent border rounded-md shadow-sm peer placeholder:text-white border-slate-200 ease focus:outline-none focus:border-white hover:border-white focus:shadow"
    />
    <label class="absolute cursor-text px-1 left-2.5 top-2 bg-[#242428] text-white text-sm transition-all transform origin-left peer-focus:-top-2 peer-focus:left-2.5 peer-focus:text-xs peer-focus:text-white peer-focus:scale-90">
    {{ $label }}
   </label>
</div>
</div>
