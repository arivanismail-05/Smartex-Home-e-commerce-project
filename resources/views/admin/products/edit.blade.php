<x-admin-dashboard-layout>

    <div class="mt-24 text-white">
      <div class="flex flex-col w-full">
        <div class="flex flex-col p-4 mx-4 gap-1.5">
          <form action="{{ route('admin.products.update', ['product' => $product->id]) }}" class="space-y-3" method="POST">
            @csrf
            @method('PATCH')
          <x-admin-component.container class="gap-4 rounded-lg h-max">
    
            <div class="flex items-center justify-between">

                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.products.show',['product' => $product->id]) }}" class="flex items-center p-2 space-x-2 border border-white rounded">
                      <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h2 class="text-xl font-semibold text-[#D97850]">Edit Product</h2>

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
                <x-admin-component.form-input value="{{ $product->title }}" type="text" id="title" name="title" for="title" label="Product Title" placeholder="Enter product title" /> 
                <x-admin-component.form-input value="{{ $product->slug }}" type="text" id="slug" name="slug" for="slug" label="Product Slug" placeholder="Enter product slug" /> 
                <x-admin-component.form-input value="{{ $product->price }}" type="number" id="price" name="price" for="price" label="Product Price" placeholder="Enter product price" /> 
                <x-admin-component.form-input value="{{ $product->sale_price }}" type="number" id="sale_price" name="sale_price" for="sale_price" label="Product Sale Price" placeholder="Enter product sale price" /> 
                <x-admin-component.form-input value="{{ $product->stock }}" type="number" id="stock" name="stock" for="stock" label="Product Stock" placeholder="Enter product stock" /> 
                <x-admin-component.select-form label="Sub Category" name="sub_category_id">
                    @foreach ($sub_categories as $sub_category)
                        <option value="{{ $sub_category->id }}" @selected($product->sub_category_id == $sub_category->id)>{{ $sub_category->name }}</option>
                    @endforeach
                    
                </x-admin-component.select-form>
              
                <x-admin-component.select-form label="Brand" name="brand_id">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" @selected($product->brand_id == $brand->id)>{{ $brand->brand_name }}</option>
                    @endforeach
                </x-admin-component.select-form>
                
              </div>
            </x-admin-component.container>
            <x-admin-component.container class="gap-4 h-max">
              <div class="grid">
                <label for="category_id" class="block my-2 text-gray-300">Description</label>
                <textarea class="col-start-1 col-end-4 border border-gray-200 bg-[#111315] rounded-sm focus:border-white focus:ring-white disabled:opacity-50 disabled:pointer-events-none" name="description" id="" cols="30" placeholder="Enter product description">{{ $product->description }}</textarea>
                @error('description')
                  <span class="mt-2 text-sm italic text-red-500">{{ $message }}</span>    
                @enderror
              </div>
            </x-admin-component.container>
            <x-admin-component.container class="gap-4 rounded-b-lg h-max">
              <div class="flex gap-3">
                 <div class=" space-y-3 p-4  border border-gray-200 bg-[#111315] rounded-sm focus:border-white focus:ring-white disabled:opacity-50 disabled:pointer-events-none" name="description" id=""  placeholder="Enter product description">
                    <h2>Visibility</h2>
                    <p class="text-xs text-gray-400">Set up product visibility for customers</p>
                    <div class=" flex justify-between font-semibold text-[#F0F0F0] bg-[#424246] p-2 rounded-md w-[250px]">
                        <div>
                          @if($product->status)
                              <span class="px-2 py-1 text-xs font-medium text-green-400 border border-green-600 rounded bg-green-600/20">Active</span>
                          @else
                              <span class="px-2 py-1 text-xs font-medium text-yellow-400 border border-yellow-600 rounded bg-yellow-600/20">Passive</span>
                          @endif
                        </div>
                        <div>
                          <label class="inline-flex items-center cursor-pointer" title="Toggle Is New">
                        @if ($product->status)
                            <input  type="checkbox" class="sr-only peer" checked name="status" value="{{ true }}">
                        @else
                            <input  type="checkbox" class="sr-only peer" name="status" value="0">
                        @endif
                        <div class="relative w-11 h-6 bg-gray-700 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                        </div>
                    </div>
                  </div>
                  <div class=" space-y-3 p-4  border border-gray-200 bg-[#111315] rounded-sm focus:border-white focus:ring-white disabled:opacity-50 disabled:pointer-events-none" name="description" id=""  placeholder="Enter product description">
                    <h2>Visibility</h2>
                    <p class="text-xs text-gray-400">Set up New Product</p>
                    <div class=" flex justify-between font-semibold text-[#F0F0F0] bg-[#424246] p-2 rounded-md w-[250px]">
                        <div>
                          @if($product->is_new)
                              <span class="px-2 py-1 text-xs font-medium text-blue-400 border border-blue-600 rounded bg-blue-600/20">New</span>
                          @else
                              <span class="px-2 py-1 text-xs font-medium text-yellow-400 border border-yellow-600 rounded bg-yellow-600/20">Not New</span>
                          @endif
                        </div>
                        <div>
                          <label class="inline-flex items-center cursor-pointer" title="Toggle Is New">
                        @if ($product->is_new)
                            <input  type="checkbox" class="sr-only peer" checked name="is_new" value="{{ true }}">
                        @else
                            <input  type="checkbox" class="sr-only peer" name="is_new" value="0">
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
