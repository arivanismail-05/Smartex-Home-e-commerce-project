<x-admin-component.container class="gap-4 rounded=b-lg h-max">

           <div>
            <x-admin-component.search wire:model.live.debounce.500ms="search" label="Search" />
           </div>
                <div class=""  wire:poll>
                   <x-admin-component.table>
                            <thead class="text-xs text-gray-100  uppercase bg-[#424246] ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Product Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Discount
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Start Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        End Date
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
                                @foreach ($discounts as $row )
                                <x-admin-component.tr-table  wire:key="discount-{{ $row->id }}">
                                    <td class="px-6 py-4">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $row->product->title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $row->percentage }}%
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $row->start_date }}

                                    </td>
                                   
                                    <td class="px-6 py-4">
                                        {{ $row->end_date }}

                                    </td>
                                    <td class="px-6 py-4">
                                       <label class="inline-flex items-center cursor-pointer">
                                        @if ($row->is_active)
                                            <input wire:click="toggleStatus({{ $row->id }})" type="checkbox" value="" class="sr-only peer" checked>
                                        @else
                                            <input wire:click="toggleStatus({{ $row->id }})" type="checkbox" value="" class="sr-only peer">
                                        @endif
                                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                                        </label>
                                    </td>
                                    <td class="px-6 py-4 space-x-1 text-right">
                                        <a href="{{ route('admin.discounts.edit', ['discount' => $row->id]) }}" class="px-2 py-1 font-medium text-blue-600 border border-blue-600 rounded bg-blue-600/30 hover:bg-blue-600 hover:text-white">Edit</a>
                                    </td>
                                </x-admin-component.tr-table>
                                @endforeach
                                
                                                         
                            </tbody>
                     </x-admin-component.table>
                    </div>
</x-admin-component.container>