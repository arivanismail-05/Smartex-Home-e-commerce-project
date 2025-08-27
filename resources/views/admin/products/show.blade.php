<x-admin-dashboard-layout>

    <div class="mt-24 text-white">
      <div class="flex flex-col w-full">
        <div class="flex flex-col p-4 mx-4 gap-1.5">
          <x-admin-component.container class="gap-4 rounded-lg h-max">
    
            <div class="flex items-center justify-between">

                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.products.index') }}" class="flex items-center p-2 space-x-2 border border-white rounded">
                      <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h2 class="text-xl font-semibold text-[#D97850]">Product Details</h2>

                </div>

                <div>
                <a href="{{ route('admin.products.edit',['product' => $product->id]) }}" class="  items-center py-3  px-8 bg-[#D97850] border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-[#fe976e] focus:bg-[#fe976e] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">Edit</a>

                <button>
                    <form action="{{ route('admin.products.destroy', ['product' => $product->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="items-center py-3 px-8 bg-red-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
                            Delete
                        </button>
                    </form>
                </button>
                
                </div>
              
            </div>
                  
          </x-admin-component.container>

          
          <div class="grid grid-cols-2 gap-2">
            <div class="flex flex-col gap-2">
              <x-admin-component.container class="gap-4 rounded-lg h-max">

              <div class="flex flex-col gap-2">
                <div class="row-span-2">

                @foreach ($product->images as $image)
                @if($image->image_status)
                    <div class="bg-[#424246]  h-48  flex rounded-md items-center justify-center">
                      <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $product->title }}" class="h-full rounded-md ">
                    </div>
                  
                  @endif

                @endforeach
                </div>
                <div class="flex gap-2">
                  @foreach ($product->images as $image)
                    <div class="bg-[#424246]  h-20 w-20 flex rounded-md items-center justify-center">
                      <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $product->title }}" class="object-cover w-full h-full rounded-md">
                    </div>
                  @endforeach
                  
                </div>
                <div>
                  <x-admin-component.div-container label="Image Count">
                    {{ $product->image_count }}
                </x-admin-component.div-container>
                </div>
                <div class="flex justify-end mt-2">
                     <a href="{{ route('admin.products.images',['product' => $product->id]) }}" class="   items-center py-3  px-8 bg-[#D97850] border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-[#fe976e] focus:bg-[#fe976e] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">Manage Images</a>
                </div>
              </div>
            </x-admin-component.container>
            <x-admin-component.container class="gap-4 rounded-lg h-max">
              <div class="space-y-2 ">
                  <h4 class="font-medium text-white text-md">Description : </h4>
                  <textarea class="font-semibold w-full text-[#F0F0F0] bg-[#424246] p-2 w-content field-sizing-content  rounded-md resize-none border-none focus:outline-none read-only" readonly disabled>{{ $product->description}}</textarea>
              </div>
            </x-admin-component.container>
            </div>
             <div class="flex flex-col gap-2">
            
            <x-admin-component.container class="gap-4 rounded-lg h-max">
                <x-admin-component.contain-detail label="Basic Details" class="grid-cols-3">

                <x-admin-component.div-container label="ID">
                    {{ $product->id }}
                </x-admin-component.div-container>

                <x-admin-component.div-container label="Title">
                    {{ $product->title }}
                </x-admin-component.div-container>
                <x-admin-component.div-container label="Slug">
                    {{ $product->slug }}
                </x-admin-component.div-container>

                
                <x-admin-component.div-container label="Status">

                    @if($product->status)
                        <span class="px-2 py-1 text-xs font-medium text-green-400 border border-green-600 rounded bg-green-600/20">Active</span>
                    @else
                        <span class="px-2 py-1 text-xs font-medium text-yellow-400 border border-yellow-600 rounded bg-yellow-600/20">Passive</span>
                    @endif
                </x-admin-component.div-container>

                <x-admin-component.div-container label="New">
                        @if ($product->is_new)
                        <span class="px-2 py-1 text-xs font-medium text-blue-400 border border-blue-600 rounded bg-blue-600/20">New</span>
                        @else
                        <span class="px-2 py-1 text-xs font-medium text-yellow-400 border border-yellow-600 rounded bg-yellow-600/20">Not New</span>
                        @endif

                </x-admin-component.div-container>
                </x-admin-component.contain-detail>
            </x-admin-component.container>
            
            <x-admin-component.container class="gap-4 rounded-lg h-max">
               <x-admin-component.contain-detail label="Categorization" class="grid-cols-2">
                  <x-admin-component.div-container label="Sub Category">
                    {{ $product->subCategory->name }}
                  </x-admin-component.div-container>
                <x-admin-component.div-container label="Brand">
                    {{ $product->brand->brand_name }}
                </x-admin-component.div-container>
               </x-admin-component.contain-detail>
            </x-admin-component.container>
           <x-admin-component.container class="gap-4 rounded-lg h-max">
            
            <x-admin-component.contain-detail label="Pricing" class="grid-cols-3">

                  <x-admin-component.div-container label="Price">
                    {{ $product->price_readable }}
                  </x-admin-component.div-container>
                 <x-admin-component.div-container label="Price Sale">
                    {{ $product->sale_price_readable }}
                  </x-admin-component.div-container>
                 <x-admin-component.div-container label="Stock">
                    {{ $product->stock }}
                  </x-admin-component.div-container>
              </x-admin-component.contain-detail>
            </x-admin-component.container>
            
            </div>  
          </div>        
        </div>
      </div>
    </div>
    
</x-admin-dashboard-layout>
