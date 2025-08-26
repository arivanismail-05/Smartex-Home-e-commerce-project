<x-admin-dashboard-layout>

    <div class="mt-24 text-white">
      <div class="flex flex-col w-full">
        <div class="flex flex-col p-4 mx-4 gap-1.5">
          <form action="{{ route('admin.discounts.update', ['discount' => $discount->id]) }}" class="space-y-3" method="POST">
            @csrf
            @method('PATCH')
          <x-admin-component.container class="gap-4 rounded-lg h-max">
    
            <div class="flex items-center justify-between">

                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.discounts.index') }}" class="flex items-center p-2 space-x-2 border border-white rounded">
                      <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h2 class="text-xl font-semibold text-[#D97850]">Edit Discount</h2>

                </div>

                <div>
                <x-admin-component.form-button action="" type="submit">
                        Save
                </x-admin-component.form-button>
                </div>
              
            </div>
                  
          </x-admin-component.container>

          <div class="grid gap-2 gap-rows-2">
            <x-admin-component.container class="gap-4 rounded-t-lg h-max">
              <div class="grid grid-cols-3 gap-4 ">
               
                <x-admin-component.form-input value="{{ $discount->start_date }}" type="date" id="start_date" name="start_date" for="start_date" label="Start Date" placeholder="Enter start date" class="[color-scheme:dark]" /> 
                <x-admin-component.form-input value="{{ $discount->end_date }}" type="date" id="end_date" name="end_date" for="end_date" label="End Date" placeholder="Enter end date" class="[color-scheme:dark]" /> 
                <x-admin-component.form-input value="{{ $discount->percentage }}% change in Product" type="text" id="percentage" name="percentage" for="percentage" label="Percentage" placeholder="Enter percentage" readonly disabled /> 

              </div>
            </x-admin-component.container>
            
            <x-admin-component.container class="gap-4 rounded-b-lg h-max">
              <div class="flex gap-3">
                 <div class=" space-y-3 p-4  border border-gray-200 bg-[#111315] rounded-sm focus:border-white focus:ring-white disabled:opacity-50 disabled:pointer-events-none" name="description" id=""  placeholder="Enter product description">
                    <h2>Visibility</h2>
                    <p class="text-xs text-gray-400">Set up discount visibility for customers</p>
                    <div class=" flex items-center justify-between font-semibold text-[#F0F0F0] bg-[#424246] p-2 rounded-md w-[250px]">
                        <div>
                          @if($discount->is_active)
                              <span class="px-2 py-1 text-xs font-medium text-green-400 border border-green-600 rounded bg-green-600/20">Active</span>
                          @else
                              <span class="px-2 py-1 text-xs font-medium text-yellow-400 border border-yellow-600 rounded bg-yellow-600/20">Passive</span>
                          @endif
                        </div>
                        <div>
                          <label class="inline-flex items-center cursor-pointer" title="Toggle Is New">
                        @if ($discount->is_active)
                            <input  type="checkbox" class="sr-only peer" checked name="is_active" value="{{ true }}">
                        @else
                            <input  type="checkbox" class="sr-only peer" name="is_active" value="0">
                        @endif
                        <div class="relative w-11 h-6 bg-gray-700 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                        </div>
                    </div>
                  </div>
                
              </div>
                 

            </x-admin-component.container>
          </div>
          
          </form>

        </div>
      </div>
    </div>
    
</x-admin-dashboard-layout>
