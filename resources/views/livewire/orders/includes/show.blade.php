<x-admin-component.container class="gap-4 h-max">
    <div class="grid grid-cols-4 gap-4">
        <x-admin-component.order-container label="Total Orders" count="{{ $orders->count() }}" />
        <x-admin-component.order-container label="Delivered Orders" count="{{ $deliveriedOrders }}" />
        <x-admin-component.order-container label="Pending Orders" count="{{ $pendingOrders }}" />
        <x-admin-component.order-container label="Total New Orders" count="{{ $newOrders }}" />
    </div>
</x-admin-component.container>




<x-admin-component.container class="gap-4 rounded-b-lg h-max">
   

           <div class="flex items-center justify-between">
             <x-admin-component.search wire:model.live.debounce.200ms="search" label="Search" />

               <div class="flex items-center space-x-2 ">
                <div wire:click="sortDir" name="category" id="category" class="border py-2 px-4 cursor-pointer rounded-md border-[#3e3e3f] bg-[#111315] text-gray-400 hover:bg-[#424246] hover:text-[#F0F0F0] transition-colors duration-150 active:bg-[#1f1f21]">
                        <i class="fa-solid fa-sort"></i>
                    </div>
                    <div class="relative flex items-center">
                <select wire:model.change="sortby" name="category" id="category" class="border rounded-md border-[#3e3e3f] bg-[#111315] text-gray-400 hover:bg-[#424246] hover:text-[#F0F0F0] transition-colors duration-150">
                        <option value="total_price">Total Price</option>
                        <option value="delivery_fee">Delivery Fee</option>
                        <option value="location">Location</option>
                        <option value="created_at">Created At</option>
                    </select>
                </div>
                </div>
            
           </div>
                <div class="" wire:poll>
                   <x-admin-component.table>
                            <thead class="text-xs text-gray-100  uppercase bg-[#424246] ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Customer Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total Price
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-1/8">
                                        Delivery Fee
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ordered At
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <x-admin-component.tr-table>
                                        <td class="px-6 py-4">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->user->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->total_price_readable }}
                                        </td>
                                        
                                        <td class="px-6 py-4">
                                            {{ $item->delivery_fee_readable }}
                                        </td>
                                        
                                        <td class="px-6 py-4">
                                            {{ $item->created_at->format('d M Y H:i') }}

                                        </td>
                                        <td class="px-6 py-4">
                                            @if($item->status)
                                            <button
                                            class="px-2 py-1 font-medium text-green-600 border border-green-600 rounded bg-green-600/30">Delivered</button>
                                            @else
                                            <button 
                                            class="px-2 py-1 font-medium text-yellow-600 border border-yellow-600 rounded bg-yellow-600/30">Pending</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.orders.show', ['order' => $item->id] ) }}" class="flex items-center content-center justify-center w-8 h-8 transition duration-500 cursor-pointer rounded-xl hover:-rotate-90 ">
                                                <i class="text-2xl text-gray-100 fa-solid fa-caret-down"></i>
                                            </a>
                                             
                                        </td>
                                    </x-admin-component.tr-table>
                                @endforeach
                                                               
                            </tbody>
                     </x-admin-component.table>

</x-admin-component.container>