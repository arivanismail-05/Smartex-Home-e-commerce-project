<x-admin-component.container class="gap-4 rounded-t-lg h-max">
    <div class="flex justify-between items-center">
        <x-admin-component.header title="Orders" />
        

        <div class="flex space-x-3 items-center">
            
            <div class="relative flex items-center">
                <select wire:model="order_status" name="order_status" id="order_status" class="border rounded-md border-[#3e3e3f] bg-[#111315] text-gray-400 hover:bg-[#424246] hover:text-[#F0F0F0] transition-colors duration-150">
                        <option value="">All Orders</option>
                        <option value="delivered">Deliveried</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>
            </div>
        </div>
    
</x-admin-component.container>



