<x-admin-component.container class="gap-4 rounded-t-lg h-max">
    <div class="flex justify-between items-center">
        <x-admin-component.header title="Products" />
        

        <div class="flex space-x-3 items-center">
           
            <div class="relative flex items-center">
                <select wire:model="filter" name="category" id="category" class="border rounded-md border-[#3e3e3f] bg-[#111315] text-gray-400 hover:bg-[#424246] hover:text-[#F0F0F0] transition-colors duration-150">
                        <option value="">Filter location</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->location }}">{{ $location->location }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    
</x-admin-component.container>



