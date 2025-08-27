<x-admin-dashboard-layout>

    <div class="mt-24 text-white">
      <div class="flex flex-col w-full">
        <div class="flex flex-col p-4 mx-4 gap-1.5">
          <x-admin-component.container class="gap-4 rounded-lg h-max">
    
           <div class="flex items-center justify-between">

                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.users.index') }}" class="flex items-center p-2 space-x-2 border border-white rounded">
                      <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h2 class="text-xl font-semibold text-[#D97850]">Customer Details</h2>
                </div>
            </div>

          </x-admin-component.container>

          
          <div class="grid grid-cols-2 gap-2">


            <x-admin-component.container class="gap-4 rounded-l-lg ">
             <x-admin-component.contain-detail label="Customer Details" class="grid-cols-3">
                  <x-admin-component.div-container label="Name">
                    {{ $user->name }}
                  </x-admin-component.div-container>
                  <x-admin-component.div-container label="Email">
                    {{ $user->email }}
                  </x-admin-component.div-container>
                  <x-admin-component.div-container label="Phone Number">
                    {{ $user->phone }}
                  </x-admin-component.div-container>
                
               </x-admin-component.contain-detail>
                <x-admin-component.contain-detail label="Other Info" class="grid-cols-3">
                  <x-admin-component.div-container label="Location">
                    {{ $user->location }}
                  </x-admin-component.div-container>
                  <x-admin-component.div-container label="Created At">
                    {{ $user->created_at->format('d M, Y') }}
                  </x-admin-component.div-container>
                  <x-admin-component.div-container label="Updated At">
                    {{ $user->updated_at->format('d M, Y') }}
                  </x-admin-component.div-container>
               </x-admin-component.contain-detail>

               <div>
                <button>
                    <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="items-center py-3 px-8 bg-red-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
                            Delete
                        </button>
                    </form>
                </button>
               </div>
            </x-admin-component.container>
             
             <x-admin-component.container class="gap-4 rounded-r-lg ">
             order
            </x-admin-component.container>

          </div>



          
        </div>
      </div>
    </div>
    
</x-admin-dashboard-layout>
