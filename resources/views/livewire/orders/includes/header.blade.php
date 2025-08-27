<x-admin-component.container class="gap-4 rounded-t-lg h-max">
    <div class="flex justify-between items-center">
        <x-admin-component.header title="Products" />
        

        <div class="flex space-x-3 items-center">
            <div class="flex items-center bg-[#111315] border border-[#3e3e3f] rounded-md p-2 space-x-2">
                <button wire:click="gridBlock" class="cursor-pointer">
                    <i class="fa-solid fa-grip bg-[#111315] text-gray-400"></i>
                </button>
                <button wire:click="gridLine" class="cursor-pointer">
                    <i class="fa-solid fa-bars bg-[#111315] text-gray-400"></i>
                </button>
            </div>
            <div class="relative flex items-center">
                <select wire:model="sub_category" name="category" id="category" class="border rounded-md border-[#3e3e3f] bg-[#111315] text-gray-400 hover:bg-[#424246] hover:text-[#F0F0F0] transition-colors duration-150">
                        <option value="">All Categories</option>
                        @foreach ($sub_categories as $sub_category)
                            <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    
</x-admin-component.container>



