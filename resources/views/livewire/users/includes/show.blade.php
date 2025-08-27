<x-admin-component.container class="gap-4 rounded-b-lg h-max">
   

           <div class="flex items-center justify-between space-x-4">
             <x-admin-component.search wire:model.live.debounce.200ms="search" label="Search" />

             <div class=" flex items-center space-x-2">
                <div wire:click="sortDir" name="category" id="category" class="border py-2 px-4 cursor-pointer rounded-md border-[#3e3e3f] bg-[#111315] text-gray-400 hover:bg-[#424246] hover:text-[#F0F0F0] transition-colors duration-150 active:bg-[#1f1f21]">
                        <i class="fa-solid fa-sort"></i>
                    </div>
                    <div class="relative flex items-center">
                <select wire:model.change="sortby" name="category" id="category" class="border rounded-md border-[#3e3e3f] bg-[#111315] text-gray-400 hover:bg-[#424246] hover:text-[#F0F0F0] transition-colors duration-150">
                        <option value="">Sort By</option>
                        <option value="name">Name</option>
                        <option value="email">Email</option>
                        <option value="phone">Phone</option>
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
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-1/8">
                                        Phone Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Location
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3">
                                        Created At
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <x-admin-component.tr-table>
                                        <td class="px-6 py-4">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->phone }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->location }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->created_at }}
                                        </td>
                                        
                                        <td>
                                            <a href="{{ route('admin.users.show', ['user' => $item->id] ) }}" class="flex items-center content-center justify-center w-8 h-8 transition duration-500 cursor-pointer rounded-xl hover:-rotate-90 ">
                                                <i class="text-2xl text-gray-100 fa-solid fa-caret-down"></i>
                                            </a>
                                             
                                        </td>
                                    </x-admin-component.tr-table>
                                @endforeach                                                               
                            </tbody>
                     </x-admin-component.table>
                </div>

</x-admin-component.container>