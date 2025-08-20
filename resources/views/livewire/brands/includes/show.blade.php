<x-admin-component.container class="gap-4 rounded-b-lg h-max">
   
           <x-admin-component.header title="Categories" />

           <div>
            <x-admin-component.search wire:model.live.debounce.500ms="search" label="Search" />
           </div>
                <div class="">
                   <x-admin-component.table>
                            <thead class="text-xs text-gray-100  uppercase bg-[#424246] ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                      Brand Name
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3">
                                        Brand Logo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $row )
                                <x-admin-component.tr-table>
                                    <td class="px-6 py-4">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $row->brand_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <img src="{{ asset('storage/' . $row->brand_logo) }}" alt="{{ $row->brand_name }}" class="object-cover w-12 h-12">
                                    </td>
                                    
                                    <td class="px-6 py-4 space-x-1 text-right">
                                        <x-admin-component.edit-button wire:click="edit({{ $row->id }})" label="Edit" />

                                        <x-admin-component.delete-button wire:click="delete({{ $row->id }})" 
                                            wire:confirm="Are you sure you want to delete this category?" label="Delete" />
                                    </td>
                                </x-admin-component.tr-table>
                                @endforeach
                                
                                                         
                            </tbody>
                     </x-admin-component.table>
                    </div>
</x-admin-component.container>