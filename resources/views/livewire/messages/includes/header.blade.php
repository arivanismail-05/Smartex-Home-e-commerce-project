<x-admin-component.container class="gap-4 rounded-t-lg h-max">
    <div class="flex items-center justify-between">
        <x-admin-component.header title="Messages" />


        <div class="flex items-center space-x-3">
            
            <div class="relative flex items-center">
                <select wire:model="sortBy" name="category" id="category" class="border rounded-md border-[#3e3e3f] bg-[#111315] text-gray-400 hover:bg-[#424246] hover:text-[#F0F0F0] transition-colors duration-150">
                        <option value="">sort by</option>
                        <option value="latest">Latest</option>
                        <option value="oldest">Oldest</option>
                        
                    </select>
                </div>
            </div>
        </div>
</x-admin-component.container>



