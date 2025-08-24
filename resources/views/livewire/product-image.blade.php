<div class="flex flex-col gap-3" wire:poll>
    <x-admin-component.container class="gap-4 rounded-lg h-max">

      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.products.show', ['product' => $product->id]) }}" class="flex items-center p-2 space-x-2 border border-white rounded">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2 class="text-xl font-semibold text-[#D97850]">Product Images of <span class="font-bold text-gray-100">{{ $product->title }}</span></h2>
        </div>
        <div>

          @if($AddImage)
          <button type="button" wire:click="uploadImages" class=" space-x-2 items-center py-3  px-4 bg-[#D97850] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#fe976e] focus:bg-[#fe976e] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
              
              <span>Save </span>
              
          </button>
          <button type="button" wire:click="cancel_add" class=" space-x-2 items-center py-3  px-4 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none  focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
              
              <span>cancel </span>
              
          </button>
          @else
          <button type="button" wire:click="addImage" class=" space-x-2 items-center py-3  px-4 bg-[#D97850] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#fe976e] focus:bg-[#fe976e] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
              <span class="bg-white rounded text-center p-0.5  text-[#D97850]"><i class="fa-solid fa-plus "></i></span>
              
              <span>Add Images</span>
              
          </button>
          @endif
        </div>
        </div>
                 
    </x-admin-component.container>


    <div wire:poll class="grid grid-cols-2 gap-4">
        <div class="row-span-2">
                @foreach ($product->images as $image)
                @if($image->image_status)
                    <div class="bg-[#424246] h-[450px] flex rounded-md items-center justify-center">
                      <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $product->title }}" class="h-full rounded-md ">
                    </div>
                  
                  @endif

                @endforeach
                </div>
                <div class="grid grid-cols-1 gap-2 h-max">
                  @foreach ($product->images as $image)
                    <div class=" space-y-3 p-4  border border-gray-200 bg-[#111315] rounded-sm focus:border-white focus:ring-white disabled:opacity-50 disabled:pointer-events-none" name="description" id=""  placeholder="Enter product description">

                    <h3>Make Cover Image</h3>
                    <div class="flex justify-between">
                      @if($editingImageId === $image->id)
                    <div class="">
                        <div class="flex items-end content-end justify-between gap-4">
                        <x-admin-component.upload-image label="Upload Image" name="image" wire:model="editingPath" accept="editingPath/*" />

                        @if ($editingPath)
                            <img src="{{ $editingPath->temporaryUrl() }}" class="object-cover w-12 h-12 rounded" alt="New Image Preview">
                        @elseif ($oldPath)
                            <img src="{{ asset('storage/' . $oldPath) }}" class="object-cover w-12 h-12 rounded" alt="Current Image">
                        @endif
                        </div>

                        @error('editingPath')
                            <span class="mt-2 text-sm italic text-red-500">{{ $message }}</span>
                        @enderror
                      </div>
                    @else
                    <div class="bg-[#424246]  h-20 w-20 flex rounded-md items-center justify-center">
                      <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $product->title }}" class="object-cover w-full h-full rounded-md">
                    </div>
                    @endif
                    <div class="space-y-2 text-end">
                      <div class="space-x-2">
                        @if($editingImageId === $image->id)
                        <button wire:click="update_image_path" type="submit" class="items-center p-2 bg-[#D97850] border border-transparent rounded-md font-semibold text-xs text-white  hover:bg-[#fe976e] focus:bg-[#fe976e] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
                            Save
                        </button>
                        <button wire:click="cancel_edit" type="submit" class="items-center p-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white  hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none  focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
                            cancel
                        </button>
                        @else
                        <button wire:click="edit_image({{ $image->id }})" type="submit" class="items-center p-2 bg-[#D97850] border border-transparent rounded-md font-semibold text-xs text-white  hover:bg-[#fe976e] focus:bg-[#fe976e] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
                            Edit
                        </button>
                        @endif
                        <button wire:click="delete_image({{ $image->id }})" type="submit" class="items-center p-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-red-700 focus:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
                            Delete
                        </button>
                        
                      </div>
                      <div wire:poll.keep-alive.2s>
                        <label class="inline-flex items-center cursor-pointer" title="Toggle Is New">
                        @if ($image->image_status)
                        
                            <input wire:poll.keep-alive.1s wire:click="toggleImageStatus({{ $image->id }})" type="checkbox" class="sr-only peer" checked >
                        @else
                            <input wire:poll.keep-alive.1s wire:click="toggleImageStatus({{ $image->id }})" type="checkbox" class="sr-only peer" >
                        @endif
                        <div class="relative w-11 h-6 bg-gray-700 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                       </label>
                      </div>
                    </div>
                    </div>

                    
                    </div>
                    
                  @endforeach
                  @if($AddImage)
                      <x-admin-component.upload-image multiple label="Upload Image" name="imagePaths[]" wire:model="imagePaths" accept="imagePaths.*" />
                      <div>
                        @error('imagePaths.*')
                            <span class="mt-2 text-sm italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    @endif
                </div>
    </div>
</div>