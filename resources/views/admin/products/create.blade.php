<x-admin-dashboard-layout>

    <div class="mt-24 text-white">
      <div class="flex flex-col w-full">
        <div class="flex flex-col p-4 mx-4 gap-1.5">
          <form action="{{ route('admin.products.store') }}" class="space-y-3" method="POST" enctype="multipart/form-data">
            @csrf
          <x-admin-component.container class="gap-4 rounded-lg h-max">
    
            <div class="flex items-center justify-between">

                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.products.index') }}" class="flex items-center p-2 space-x-2 border border-white rounded">
                      <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h2 class="text-xl font-semibold text-[#D97850]">Add New Product</h2>

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
                <x-admin-component.form-input type="text" id="title" name="title" for="title" label="Product Title" placeholder="Enter product title" /> 
                <x-admin-component.form-input type="text" id="slug" name="slug" for="slug" label="Product Slug" placeholder="Enter product slug" /> 
                <x-admin-component.form-input type="number" id="price" name="price" for="price" label="Product Price" placeholder="Enter product price" /> 
                <x-admin-component.form-input type="number" id="sale_price" name="sale_price" for="sale_price" label="Product Sale Price" placeholder="Enter product sale price" /> 
                <x-admin-component.form-input type="number" id="stock" name="stock" for="stock" label="Product Stock" placeholder="Enter product stock" /> 
                <x-admin-component.select-form label="Sub Category" name="sub_category_id">
                    @foreach ($sub_categories as $sub_category)
                        <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                    @endforeach
                    
                </x-admin-component.select-form>
              
                <x-admin-component.select-form label="Brand" name="brand_id">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                    @endforeach
                </x-admin-component.select-form>
                
              </div>
            </x-admin-component.container>
            <x-admin-component.container class="gap-4 h-max">
              <div class="grid">
                <label for="category_id" class="block my-2 text-gray-300">Description</label>
                <textarea class="col-start-1 col-end-4 border border-gray-200 bg-[#111315] rounded-sm focus:border-white focus:ring-white disabled:opacity-50 disabled:pointer-events-none" name="description" id="" cols="30" placeholder="Enter product description"></textarea>
                @error('description')
                  <span class="mt-2 text-sm italic text-red-500">{{ $message }}</span>    
                @enderror
              </div>
            </x-admin-component.container>
            <x-admin-component.container class="gap-4 rounded-b-lg h-max">
              
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 dark:border-[#3e3e3f] border-dashed rounded-lg cursor-pointer bg-[#111315] dark:bg-[#111315] dark:hover:bg-[#1e2124]">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" name="images[]" class="hidden" multiple />
                </label>
                
            </div>
            @error('images.*')
                <span class="mt-2 text-sm italic text-red-500">{{ $message }}</span>
            @enderror

            </x-admin-component.container>
          </div>
          
          </form>

        </div>
      </div>
    </div>
    
</x-admin-dashboard-layout>
