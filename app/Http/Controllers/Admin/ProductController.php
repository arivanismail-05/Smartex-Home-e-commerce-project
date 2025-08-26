<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Discount;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;

use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sub_categories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('sub_categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $validated = $request->validated();

        $product = Product::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'price' => $validated['price'],
            'sale_price' => $validated['sale_price'],
            'stock' => $validated['stock'],
            'sub_category_id' => $validated['sub_category_id'],
            'brand_id' => $validated['brand_id'],
            'description' => $validated['description'],
        ]);
        $discount = (($product->price - $product->sale_price)/$product->price )* 100;
        
        if($product->sale_price > 0){
            $product->discount()->create([
                'percentage' => round($discount),
                'start_date' => now(),
                'end_date' => now()->addDays(30),
            ]);
        }

        $product_id = $product->id;
        $count_image = 0;
        if($request->images !== null){
        for($i = 0 ; $i <  count($request->images); $i++){

            ProductImage::create([
                'product_id' => $product_id,
                'image_path' =>  $request->images[$i]->store('product-image', 'public'),
            ]);
            $count_image++;
        }
    }

        $product->update(['image_count' => $count_image]);
        flash()->success('Product created successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with(['subCategory', 'brand', 'images'])->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with(['subCategory', 'brand', 'images'])->findOrFail($id);
        $sub_categories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.products.edit', compact('product', 'sub_categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        
        $product = Product::findOrFail($id);
        
        $validated = $request->validated();
        $product->update($validated);
        $product->status = $request->has('status');
        $product->is_new = $request->has('is_new');

        $discount = (($product->price - $product->sale_price)/$product->price )* 100;

        $discountTable = Discount::find($product->id);
       
        if($product->sale_price > 0){
            if(!$discountTable){
                $product->discount()->create([
                    'percentage' => round($discount),
                    'start_date' => now(),
                    'end_date' => now()->addDays(30),
                ]);
            }
            else{
                $product->discount()->update([
                    'percentage' => round($discount),
                ]);
            }
            
        }

        $product->save();

    flash()->success('Product updated successfully!');
    return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $images = ProductImage::where('product_id', $id)->get();

        foreach ($images as $image) {

            Storage::disk('public')->delete($image->image_path);
        }

        $product->delete();
        flash()->success('Product deleted successfully!');
        return redirect()->route('admin.products.index');
    }




    public function images(string $id)
    {
        $product = Product::with('images')->findOrFail($id);
        $images = ProductImage::where('product_id', $id)->get();
        return view('admin.products.images', compact('product', 'images'));
    }
}
