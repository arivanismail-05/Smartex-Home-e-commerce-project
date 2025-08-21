<x-admin-component.container class="gap-4 rounded-b-lg h-max">
   

           <div class="flex justify-between items-center">
             <x-admin-component.search wire:model.live.debounce.500ms="search" label="Search" />

               <div>
                <a href="{{ route('admin.products.create') }}" class=" space-x-2 items-center py-3  px-4 bg-[#D97850] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#fe976e] focus:bg-[#fe976e] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
                    <span class="bg-white rounded text-center p-0.5  text-[#D97850]"><i class="fa-solid fa-plus "></i></span>
                    <span>Add Product</span>
                </a>
               </div>
            
           </div>
                <div class="">
                   <x-admin-component.table>
                            <thead class="text-xs text-gray-100  uppercase bg-[#424246] ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <x-admin-component.tr-table>
                                    <td class="px-6 py-4">
                                        hello
                                    </td>
                                    
                                </x-admin-component.tr-table>
                                
                                                         
                            </tbody>
                     </x-admin-component.table>
                </div>
</x-admin-component.container>