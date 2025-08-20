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
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Slug
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sub_categories as $row )
                                <x-admin-component.tr-table>
                                    <td class="px-6 py-4">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $row->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $row->slug }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $row->category->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <img src="{{ asset('storage/' . $row->image) }}" alt="{{ $row->name }}" class="object-cover w-12 h-12">
                                    </td>
                                    <td class="px-6 py-4">
                                       <label class="inline-flex items-center cursor-pointer">
                                        @if ($row->status)
                                            <input wire:click="toggleStatus({{ $row->id }})" type="checkbox" value="" class="sr-only peer" checked>
                                        @else
                                            <input wire:click="toggleStatus({{ $row->id }})" type="checkbox" value="" class="sr-only peer">
                                        @endif
                                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                                        </label>
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