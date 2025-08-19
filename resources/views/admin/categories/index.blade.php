<x-admin-dashboard-layout>

    <div class="mt-24 text-white">
      <div class="flex flex-col w-full">
        <div class="flex flex-col p-4 mx-4 gap-1.5">
        
         <div class="flex flex-col gap-4 w-full border  bg-[#242428] border-[#3e3e3f] rounded-t-lg px-6 py-4">
           <div>
                <div class="flex items-center space-x-4">
                    <x-admin-component.link-category href="{{ route('admin.categories.index') }}" active=" {{ request()->is('admin/categories') ? 'true' : 'false' }} " value="Categories" />
                </div>           
            </div>
          </div>
            <div class=" h-max flex  flex-col  w-full space-y-3 border  bg-[#242428] border-[#3e3e3f] px-6 py-4">
           <div>
            <h2 class="text-xl font-semibold text-[#D97850]">Create Categories</h2>
            <div class="">
                <form action="" class="flex items-end content-end justify-between gap-4">
                    <div class="flex items-end content-end w-full gap-4">
                      <x-admin-component.form-input type="text" id="name" name="name" for="name" label="Name" placeholder="Enter category name" />
                      <x-admin-component.form-input type="text" id="slug" name="slug" for="slug" label="Slug" placeholder="Enter category slug" />

                      <div class="w-[50%]">
                        <label class="block mb-2 text-sm font-medium text-gray-300" for="file_input">Upload file</label>
                        <input class="block w-full text-sm text-gray-400 border border-gray-200 rounded-sm cursor-pointer bg-[#111315] focus:outline-none
                        file:text-sm file:font-semibold
                        file:bg-[#242428] file:text-white
                        hover:file:bg-[#424246] hover:file:text-white
                        " id="file_input" type="file">
                      </div>
                        
                    </div>
                        <button class="  items-center py-3  px-8 bg-[#D97850] border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-[#E0825C] focus:bg-[#E0825C] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">Save</button>
                </form>
            </div>
           </div>
          </div>
          <div class=" h-max  flex flex-col gap-4 w-full space-y-3 border  bg-[#242428] border-[#3e3e3f] rounded-b-lg px-6 py-4">
           <div>
            <h2 class="text-3xl font-bold text-[#D97850]">Categories</h2>
           </div>
           
           <div>
            <div class=" max-w-xs min-w-[150px]">
            <div class="relative">
                <input
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
                                <tr class="bg-transparent border-b text-gray-400  border-[#424246] hover:bg-[#424246] hover:text-[#F0F0F0]">
                                    <td class="px-6 py-4">
                                        1
                                    </td>
                                    <td class="px-6 py-4">
                                        Apple MacBook Pro 17"
                                    </td>
                                    <td class="px-6 py-4">
                                        Silver
                                    </td>
                                    <td class="px-6 py-4">
                                        Laptop
                                    </td>
                                    <td class="px-6 py-4">
                                        $2999
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                    </td>
                                </tr>
                                <tr class="bg-transparent border-b text-gray-400  border-[#424246] hover:bg-[#424246] hover:text-[#F0F0F0] ">
                                    <td class="px-6 py-4">
                                        2
                                    </td>
                                    <td class="px-6 py-4">
                                        Apple MacBook Pro 17"
                                    </td>
                                    <td class="px-6 py-4">
                                        White
                                    </td>
                                    <td class="px-6 py-4">
                                        Laptop PC
                                    </td>
                                    <td class="px-6 py-4">
                                        $1999
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
           </div>
          </div>
          
           
        </div>
      </div>
    </div>
    
</x-admin-dashboard-layout>
