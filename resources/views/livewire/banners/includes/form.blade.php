<div>

<x-admin-component.container class="gap-4 rounded-t-lg h-max">
    <div class="flex items-center justify-between">
        <x-admin-component.header title="Products" />
        

        <div class="flex items-center space-x-3">
                <div>
                <button x-data x-on:click="$dispatch('open-modal')" type="button" class=" space-x-2 items-center py-3  px-4 bg-[#D97850] border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-[#fe976e] focus:bg-[#fe976e] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
                    <span class="bg-white rounded text-center p-0.5  text-[#D97850]"><i class="fa-solid fa-plus "></i></span>
                    <span>Add Product</span>
                </button>
               </div>
        </div>
    </div>
<x-upload-modal >
<div class="flex flex-col items-center justify-center w-full space-y-3 border  bg-[#242428] border-[#3e3e3f] px-6 py-4 rounded-lg">
    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 dark:border-[#3e3e3f] border-dashed rounded-lg cursor-pointer bg-[#111315] dark:bg-[#111315] dark:hover:bg-[#1e2124]">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
        </div>
        <input wire:model="imagePaths" id="dropzone-file" type="file" name="images[]" class="hidden" multiple accept="image/png, image/jpeg, image/gif"/>
        @error('imagePaths')
            <span class="mt-2 text-sm italic text-red-500">{{ $message }}</span>
        @enderror
    </label>
   @if($imagePaths)
   <div class="italic" wire:loading wire:target="imagePaths">Uploading...</div>
    {{-- <div class="grid grid-cols-3 gap-2">
        @foreach ($imagePaths as $image)
            <div class="w-32 h-32 overflow-hidden rounded">
                <img src="{{ $image->temporaryUrl() }}" alt="Image Preview" class="object-cover w-full h-full">
            </div>
        @endforeach
    </div> --}}
   @endif

    <div class="flex items-center justify-end w-full space-x-2">
        <x-admin-component.form-button action="create">
            Save
        </x-admin-component.form-button>
        <div>
            <button type="button" x-data x-on:click="$dispatch('close-modal')" class="  items-center py-3  px-8 bg-gray-500 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none  focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">Cancel</button>
        </div>
    </div>
</div>
</x-upload-modal>
</x-admin-component.container>



</div>