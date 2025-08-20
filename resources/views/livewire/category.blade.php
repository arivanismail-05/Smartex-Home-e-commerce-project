<div class="flex flex-col p-4 mx-4 gap-1.5">
        
         <div class="flex flex-col gap-4 w-full border  bg-[#242428] border-[#3e3e3f] rounded-t-lg px-6 py-4">
           <div>
                <div class="flex items-center space-x-4">
                    <x-admin-component.link-category href="{{ route('admin.categories.index') }}" active=" {{ request()->is('admin/categories') ? 'true' : 'false' }} " value="Categories" />
                </div>           
            </div>
          </div>
          @include('livewire.includes.form')
          <div class=" h-max  flex flex-col gap-4 w-full space-y-3 border  bg-[#242428] border-[#3e3e3f] rounded-b-lg px-6 py-4">
           <div>
            <h2 class="text-3xl font-bold text-[#D97850]">Categories</h2>
           </div>
           
           <div>
            <div class=" max-w-xs min-w-[150px]">
            <div class="relative">
                <input wire:model.live.debounce.500ms="search"
                class="w-full px-4 py-2 text-sm text-white transition duration-300 bg-transparent border rounded-md shadow-sm peer placeholder:text-white border-slate-200 ease focus:outline-none focus:border-white hover:border-white focus:shadow"
                />
                <label class="absolute cursor-text px-1 left-2.5 top-2 bg-[#242428] text-white text-sm transition-all transform origin-left peer-focus:-top-2 peer-focus:left-2.5 peer-focus:text-xs peer-focus:text-white peer-focus:scale-90">
                Search
                </label>
            </div>
            </div>
           </div>
           <div>
                <div class="">
                    <div class="relative overflow-x-auto border border-[#424246] shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 rtl:text-right ">
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
                                @foreach ($categories as $row )
                                    <tr class="bg-transparent border-b text-gray-400  border-[#424246] hover:bg-[#424246] hover:text-[#F0F0F0]">
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
                                        <img src="{{ asset('storage/' . $row->image) }}" alt="{{ $row->name }}" class="w-12 h-12 object-cover">
                                    </td>
                                    <td class="px-6 py-4">
                                       <label class="inline-flex items-center mb-5 cursor-pointer">
                                        @if ($row->status)
                                            <input wire:click="toggleStatus({{ $row->id }})" type="checkbox" value="" class="sr-only peer" checked>
                                        @else
                                            <input wire:click="toggleStatus({{ $row->id }})" type="checkbox" value="" class="sr-only peer">
                                        @endif
                                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                                        </label>
                                    </td>
                                    <td class="px-6 py-4 text-right flex gap-2 justify-end">
                                        <button wire:click="edit({{ $row->id }})" class="font-medium text-blue-600 border border-blue-600 hover:bg-blue-600 hover:text-white px-2 py-1 rounded">Edit</button>
                                        <button wire:click="delete({{ $row->id }})"
                                            wire:confirm="Are you sure you want to delete this category?"
                                            class="font-medium text-red-600 border border-red-600 hover:bg-red-600 hover:text-white px-2 py-1 rounded">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                                
                                                         
                            </tbody>
                        </table>
                    </div>
                </div>
           </div>
          </div>
          
           
        </div>
