@props(['label'])



<div>
<label class="block my-2 text-gray-300" for="file_input">{{ $label }}</label>
<input {{ $attributes }}  class="block w-full text-sm text-gray-400 border border-gray-200 rounded-sm cursor-pointer bg-[#111315] focus:outline-none
file:text-sm file:font-semibold
file:bg-[#242428] file:text-white
hover:file:bg-[#424246] hover:file:text-white
" id="file_input" type="file"  />
</div>


