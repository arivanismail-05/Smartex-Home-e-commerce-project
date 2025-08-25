<x-admin-component.container class="gap-4 rounded-b-lg h-max">

    <div class="grid grid-cols-3 gap-4"  wire:poll>
        @foreach ($banners as $banner )
        <div wire:key="{{ $banner->id }}" class="bg-[#424246] p-3 flex  rounded-md items-center justify-between border border-[#111315] ">
            <div class="space-y-2">
                <h2> Banner ID :{{ $banner->id }}</h2>
                @if($editingBannerId === $banner->id)
                    <x-admin-component.upload-image label="Upload Image" name="image" wire:model="editingImagePath" accept="editingImagePath/*" />
                     @if($editingImagePath)
                    <div class="italic text-left" wire:loading wire:target="editingImagePath">Uploading...</div>
                    @endif
                    @error('editingImagePath')
                        <span class="mt-2 text-sm italic text-red-500">{{ $message }}</span>
                    @enderror
                @else
                    <img src="{{ asset('storage/' . $banner->image_path) }}" alt="" class="h-[150px] rounded-md ">
                @endif
            </div>
            <div class="flex flex-col justify-between space-y-4">
                <div class="flex space-x-2">
                    @if($editingBannerId === $banner->id)
                    <button wire:click="update_image" type="submit" class="items-center p-2 bg-[#D97850] border border-transparent rounded-md font-semibold text-xs text-white  hover:bg-[#fe976e] focus:bg-[#fe976e] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
                        save
                    </button>
                    <button wire:click="cancel_edit" type="submit" class="items-center p-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white  hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none  focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
                            cancel
                    </button>
                    @else
                    <button wire:click="edit_image({{ $banner->id }})" type="submit" class="items-center p-2 bg-[#D97850] border border-transparent rounded-md font-semibold text-xs text-white  hover:bg-[#fe976e] focus:bg-[#fe976e] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
                        Edit
                    </button>
                    @endif
                    <button wire:confirm="Are you sure you want to delete this banner?" wire:click="delete_image({{ $banner->id }})" type="submit" class="items-center p-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-red-700 focus:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
                        Delete
                    </button>
                </div>
                <div class="text-right">
                    <div wire:poll>
                        <label class="inline-flex items-center cursor-pointer" title="Toggle Is New">
                        @if ($banner->status)

                            <input  wire:click="toggleImageStatus({{ $banner->id }})" type="checkbox" class="sr-only peer" checked >
                        @else
                            <input  wire:click="toggleImageStatus({{ $banner->id }})" type="checkbox" class="sr-only peer" >
                        @endif
                        <div class="relative w-11 h-6 bg-gray-700 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                       </label>
                      </div>
                </div>
                
            </div>
        </div>

        @endforeach
    </div>
    
</x-admin-component.container>