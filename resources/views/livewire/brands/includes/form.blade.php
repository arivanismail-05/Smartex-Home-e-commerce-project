<x-admin-component.container>
        <div>
            <h2 class="text-xl font-semibold text-[#D97850]">Create Categories</h2>
            <div class="">
                <form enctype="multipart/form-data" action="" class="flex items-end content-end justify-between gap-4">
                    <div class="flex items-end content-end w-full gap-4">
                      @if($editingId)
                      <x-admin-component.form-input wire:model="editingName" type="text" id="editingName" name="editingName" for="editingName" label="Name" placeholder="Enter brand name" />

                       <div class="">
                        <div class="flex items-end content-end justify-between gap-4">
                        <x-admin-component.upload-image label="Upload Logo" name="image" wire:model="editingLogo" accept="editingLogo/*" />

                        @if ($editingLogo)
                            <img src="{{ $editingLogo->temporaryUrl() }}" class="object-cover w-12 h-12 rounded" alt="New Image Preview">
                        @elseif ($oldLogo)
                            <img src="{{ asset('storage/' . $oldLogo) }}" class="object-cover w-12 h-12 rounded" alt="Current Image">
                        @endif 
                        </div>

                        @error('editingLogo')
                            <span class="mt-2 text-sm italic text-red-500">{{ $message }}</span>
                        @enderror
                      </div>
                      @else
                      <x-admin-component.form-input wire:model="brand_name" type="text" id="brand_name" name="brand_name" for="name" label="Name" placeholder="Enter brand name" />


                       <div class="">
                        <div class="flex items-end content-end justify-between gap-4">
                        <x-admin-component.upload-image label="Upload Logo" name="logo" wire:model="brand_logo" accept="brand_logo/*" />

                        @if ($brand_logo)
                        <div class="">
                            <img src="{{ $brand_logo->temporaryUrl() }}" class="object-cover w-12 h-12 rounded">
                        </div>
                        @endif 
                        </div>

                        @error('brand_logo')
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
          