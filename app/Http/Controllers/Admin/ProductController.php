<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Psy\Sudo;

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

        $product_id = $product->id;
        $count_image = 0;
        for($i = 0 ; $i <  count($request->images); $i++){

              ProductImage::create([
                    'product_id' => $product_id,
                    'image_path' => $request->images[$i],
                ]); 
                $count_image++;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
