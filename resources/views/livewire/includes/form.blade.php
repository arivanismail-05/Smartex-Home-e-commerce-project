<div class=" h-max flex  flex-col  w-full space-y-3 border  bg-[#242428] border-[#3e3e3f] px-6 py-4">
           <div>
            <h2 class="text-xl font-semibold text-[#D97850]">Create Categories</h2>
            <div class="">
                <form enctype="multipart/form-data" action="" class="flex items-end content-end justify-between gap-4">
                    <div class="flex items-end content-end w-full gap-4">
                      @if($editingId)
                      <x-admin-component.form-input wire:model="editingName" type="text" id="editingName" name="editingName" for="editingName" label="Name" placeholder="Enter category name" />

                      <x-admin-component.form-input wire:model="editingSlug" type="text" id="editingSlug" name="editingSlug" for="editingSlug" label="Slug" placeholder="Enter category slug" />

                       <div class="">
                        <div class="flex items-end content-end justify-between gap-4">
                        <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300" for="file_input">Upload file</label>
                        <input wire:model="editingImage" accept="editingImage/*" class="block w-full text-sm text-gray-400 border border-gray-200 rounded-sm cursor-pointer bg-[#111315] focus:outline-none
                        file:text-sm file:font-semibold
                        file:bg-[#242428] file:text-white
                        hover:file:bg-[#424246] hover:file:text-white
                        " id="file_input" type="file" name="image" />
                        </div>
                        
                        @if ($editingImage)
                            <img src="{{ $editingImage->temporaryUrl() }}" class="w-10 h-10 object-cover rounded" alt="New Image Preview">
                        @elseif ($oldImage)
                            <img src="{{ asset('storage/' . $oldImage) }}" class="w-10 h-10 object-cover rounded" alt="Current Image">
                        @endif 
                        </div>
                                              
                        @error('editingImage')
                            <span class="text-red-500 text-sm italic mt-2">{{ $message }}</span>
                        @enderror
                      </div>
                      @else
                      <x-admin-component.form-input wire:model="name" type="text" id="name" name="name" for="name" label="Name" placeholder="Enter category name" />

                      <x-admin-component.form-input wire:model="slug" type="text" id="slug" name="slug" for="slug" label="Slug" placeholder="Enter category slug" />

                       <div class="">
                        <div class="flex items-end content-end justify-between gap-4">
                        <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300" for="file_input">Upload file</label>
                        <input wire:model="image" accept="image/*" class="block w-full text-sm text-gray-400 border border-gray-200 rounded-sm cursor-pointer bg-[#111315] focus:outline-none
                        file:text-sm file:font-semibold
                        file:bg-[#242428] file:text-white
                        hover:file:bg-[#424246] hover:file:text-white
                        " id="file_input" type="file" name="image" />
                        </div>
                        
                        @if ($image)
                        <div class="">
                            <img src="{{ $image->temporaryUrl() }}" class="w-10 h-10 object-cover rounded">
                        </div>
                        @endif 
                        </div>
                                              
                        @error('image')
                            <span class="text-red-500 text-sm italic mt-2">{{ $message }}</span>
                        @enderror
                      </div>
                    @endif   
                    </div>
                    <div class="flex gap-2">
                     @if($editingId)
                    <button wire:click.prevent="update({{ $editingId }})" class="  items-center py-3  px-8 bg-[#D97850] border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-[#fe976e] focus:bg-[#fe976e] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">Save</button>
                    @else
                    <button wire:click.prevent="create" class="  items-center py-3  px-8 bg-[#D97850] border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-[#fe976e] focus:bg-[#fe976e] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">Save</button>
                    @endif
                    
                    @if($editingId)
                    <button wire:click.prevent="cancel" class="  items-center py-3  px-8 bg-gray-500 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none  focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">Cancel</button>
                    @endif
                    </div>
                @if (session('success'))
                    <span class="text-green-500 text-sm italic mt-2">{{ session('success') }}</span>
                @endif
                
                </form>
                
            </div>
           </div>
          </div>