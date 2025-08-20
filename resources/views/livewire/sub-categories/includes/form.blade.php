<x-admin-component.container>
        <div>
            <h2 class="text-xl font-semibold text-[#D97850]">Create Sub Categories</h2>
            <div class="">
                <form enctype="multipart/form-data" action="" class="flex items-end content-end justify-between gap-4">
                    <div class="flex items-end content-end w-full gap-4">
                      @if($editingId)
                      <x-admin-component.form-input wire:model="editingName" type="text" id="editingName" name="editingName" for="editingName" label="Name" placeholder="Enter sub category name" />

                      <x-admin-component.form-input wire:model="editingSlug" type="text" id="editingSlug" name="editingSlug" for="editingSlug" label="Slug" placeholder="Enter sub category slug" />

                      <div class="flex flex-col">
                        <label for="category_id" class="block my-2 text-gray-300">Category</label>
                      <select wire:model.change="editingCategoryId" name="category_id" id="category_id" class="border border-gray-200 bg-[#111315] rounded-sm focus:border-white focus:ring-white disabled:opacity-50 disabled:pointer-events-none">
                        <option value=""></option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                        @error('category_id')
                            <span class="mt-2 text-sm italic text-red-500">{{ $message }}</span>
                        @enderror
                      </div>

                       <div class="">
                        <div class="flex items-end content-end justify-between gap-4">
                        <x-admin-component.upload-image label="Upload Image" name="image" wire:model="editingImage" accept="editingImage/*" />

                        @if ($editingImage)
                            <img src="{{ $editingImage->temporaryUrl() }}" class="object-cover w-12 h-12 rounded" alt="New Image Preview">
                        @elseif ($oldImage)
                            <img src="{{ asset('storage/' . $oldImage) }}" class="object-cover w-12 h-12 rounded" alt="Current Image">
                        @endif 
                        </div>
                                              
                        @error('editingImage')
                            <span class="mt-2 text-sm italic text-red-500">{{ $message }}</span>
                        @enderror
                      </div>
                      @else
                      <x-admin-component.form-input wire:model="name" type="text" id="name" name="name" for="name" label="Name" placeholder="Enter sub category name" />

                      <x-admin-component.form-input wire:model="slug" type="text" id="slug" name="slug" for="slug" label="Slug" placeholder="Enter sub category slug" />

                      <div class="flex flex-col">
                        <label for="category_id" class="block my-2 text-gray-300">Category</label>
                      <select wire:model.change="category_id" name="category_id" id="category_id" class="border border-gray-200 bg-[#111315] rounded-sm focus:border-white focus:ring-white disabled:opacity-50 disabled:pointer-events-none">
                        <option value=""></option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                        @error('category_id')
                            <span class="mt-2 text-sm italic text-red-500">{{ $message }}</span>
                        @enderror
                      </div>
                      
                       <div class="">
                        <div class="flex items-end content-end justify-between gap-4">
                        <x-admin-component.upload-image label="Upload Image" name="image" wire:model="image" accept="image/*" />

                        @if ($image)
                        <div class="">
                            <img src="{{ $image->temporaryUrl() }}" class="object-cover w-12 h-12 rounded">
                        </div>
                        @endif 
                        </div>
                                              
                        @error('image')
                            <span class="mt-2 text-sm italic text-red-500">{{ $message }}</span>
                        @enderror
                      </div>
                    @endif   
                    </div>
                    <div class="flex gap-2">
                     @if($editingId)
                     <x-admin-component.form-button action="update({{ $editingId }})">
                        Save
                     </x-admin-component.form-button>
                    @else
                    <x-admin-component.form-button action="create">
                        Save
                    </x-admin-component.form-button>
                    @endif
                    <div>
                    @if($editingId)
                    <button wire:click.prevent="cancel" class="  items-center py-3  px-8 bg-gray-500 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none  focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">Cancel</button>
                    @endif
                    </div>
                
                </form>
                
            </div>
           </div>
          </div>
</x-admin-component.container>
          