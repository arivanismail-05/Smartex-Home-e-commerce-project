<x-admin-component.container class="gap-4 rounded-b-lg h-max">
   

           <div class="flex items-center justify-between">
             <x-admin-component.search wire:model.live.debounce.200ms="search" label="Search" />

               <div>
                <a href="{{ route('admin.products.create') }}" class=" space-x-2 items-center py-3  px-4 bg-[#D97850] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#fe976e] focus:bg-[#fe976e] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
                    <span class="bg-white rounded text-center p-0.5  text-[#D97850]"><i class="fa-solid fa-plus "></i></span>
                    <span>Add Product</span>
                </a>
               </div>
            
           </div>
                <div class="" wire:poll>
                    @if($grid_line)
                   <x-admin-component.table>
                            <thead class="text-xs text-gray-100  uppercase bg-[#424246] ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Slug
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-1/8">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Sale Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Image Count
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Sub Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Brand
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Is New
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <x-admin-component.tr-table>
                                        <td class="px-6 py-4">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->title }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->slug }}
                                        </td>
                                        @if(strlen($item->description) > 10)
                                        <td class="px-6 py-4">
                                            <span class=" line-clamp-1">{{ $item->description }}</span>
                                        </td>
                                        @else
                                        <td class="px-6 py-4">
                                            {{ $item->description }}
                                        </td>
                                        @endif
                                        
                                        <td class="px-6 py-4">
                                            {{ $item->price_readable }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->sale_price_readable }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->image_count }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->subCategory->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->brand->brand_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <label class="inline-flex items-center cursor-pointer">
                                        @if ($item->is_new)
                                            <input wire:click="toggleIsNew({{ $item->id }})" type="checkbox" value="" class="sr-only peer" checked>
                                        @else
                                            <input wire:click="toggleIsNew({{ $item->id }})" type="checkbox" value="" class="sr-only peer">
                                        @endif
                                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                                        </label>
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($item->status)
                                            <button
                                            class="px-2 py-1 font-medium text-green-600 border border-green-600 rounded bg-green-600/30">Active</button>
                                            @else
                                            <button 
                                            class="px-2 py-1 font-medium text-yellow-600 border border-yellow-600 rounded bg-yellow-600/30">Passive</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.products.show', ['product' => $item->id] ) }}" class="flex items-center content-center justify-center w-8 h-8 transition duration-500 cursor-pointer rounded-xl hover:-rotate-90 ">
                                                <i class="text-2xl text-gray-100 fa-solid fa-caret-down"></i>
                                            </a>
                                             
                                        </td>
                                    </x-admin-component.tr-table>
                                @endforeach
                                                               
                            </tbody>
                     </x-admin-component.table>

                     @elseif($grid_block)
                     
                {{-- <select wire:model="sub_category" name="category" id="category" class="border rounded-md border-[#3e3e3f] bg-[#111315] text-gray-400 hover:bg-[#424246] hover:text-[#F0F0F0] transition-colors duration-150"> --}}
  
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
    @foreach ($products as $item)
        
        <div class="flex flex-col bg-[#111315] border border-[#3e3e3f] rounded-lg shadow-sm p-6">
            
            <div>
                <a href="{{ route('admin.products.show', ['product' => $item->id] ) }}">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-white hover:text-gray-300">{{ $loop->iteration }}. {{ $item->title }}</h5>
                </a>
                <p class="mb-4 font-normal text-gray-400 line-clamp-1" title="{{ $item->description }}">
                    {{ $item->description }}
                </p>
            </div>
                <hr class="border-gray-400">

            <div class="grid grid-cols-3 gap-4 my-4">
                <div>
                    <span class="text-xs font-medium text-gray-400 uppercase">Price</span>
                    <p class="text-lg font-semibold text-white">{{ $item->price_readable }}</p>
                </div>
                <div>
                    <span class="text-xs font-medium text-gray-400 uppercase">Sale Price</span>
                    <p class="text-lg font-semibold text-red-500">{{ $item->sale_price_readable }}</p>
                </div>
                <div>
                    <span class="text-xs font-medium text-gray-400 uppercase">Images</span>
                    <p class="text-white">{{ $item->image_count }}</p>
                </div>
                <div>
                    <span class="text-xs font-medium text-gray-400 uppercase">Stock</span>
                    <p class="text-white">{{ $item->stock }}</p>
                </div>
                <div>
                    <span class="text-xs font-medium text-gray-400 uppercase">Slug</span>
                    <p class="text-white">{{ $item->slug }}</p>
                </div>
                <div class="col-start-1">
                    <span class="text-xs font-medium text-gray-400 uppercase">Brand</span>
                    <p class="text-white truncate">{{ $item->brand->brand_name }}</p>
                </div>
                <div>
                    <span class="text-xs font-medium text-gray-400 uppercase">Sub Category</span>
                    <p class="text-white truncate">{{ $item->subCategory->name }}</p>
                </div>
                
            </div>
                            <hr class="border-gray-400">


            <div class="flex items-center justify-between pt-4 mt-auto">
                <div class="flex items-center gap-4">
                    @if($item->status)
                        <span class="px-2 py-1 text-xs font-medium text-green-400 border border-green-600 rounded bg-green-600/20">Active</span>
                    @else
                        <span class="px-2 py-1 text-xs font-medium text-yellow-400 border border-yellow-600 rounded bg-yellow-600/20">Passive</span>
                    @endif
                    
                    <label class="inline-flex items-center cursor-pointer" title="Toggle Is New">
                        @if ($item->is_new)
                            <input wire:click="toggleIsNew({{ $item->id }})" type="checkbox" class="sr-only peer" checked>
                        @else
                            <input wire:click="toggleIsNew({{ $item->id }})" type="checkbox" class="sr-only peer">
                        @endif
                        <div class="relative w-11 h-6 bg-gray-700 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>

                <a href="{{ route('admin.products.show', ['product' => $item->id] ) }}" class="flex items-center gap-2 text-sm text-gray-300 transition duration-300 hover:text-white">
                    Details
                    <i class="fa-solid fa-arrow-right mt-1"></i>
                </a>
            </div>
            
        </div>
        @endforeach
        
</div>
@endif
</x-admin-component.container>