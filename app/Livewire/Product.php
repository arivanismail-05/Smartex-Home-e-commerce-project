<?php

namespace App\Livewire;

use App\Models\Product as ModelsProduct;
use App\Models\SubCategory;
use Livewire\Component;

class Product extends Component
{

    public $search;
    public $sub_category;

    public $grid_line = true;
    public $grid_block = false;


    public function toggleIsNew($id)
    {
        $product = ModelsProduct::find($id);
        if ($product) {
            $product->is_new = !$product->is_new;
            $product->save();
        }
        flash()->success('New product updated successfully!');
    }

    public function gridLine()
    {
        $this->grid_line = true;
        $this->grid_block = false;
    }

    public function gridBlock()
    {
        $this->grid_block = true;
        $this->grid_line = false;
    }


    public function toggleStatus($id)
    {
        $product = ModelsProduct::find($id);
        if ($product) {
            $product->status = !$product->status;
            $product->save();
        }
        flash()->success('Product status updated successfully!');
    }



    public function render()
    {
        $products = ModelsProduct::latest()
        ->where('title', 'like', '%'.$this->search.'%')
        ->orWhere('slug', 'like', '%'.$this->search.'%')
        ->with('subCategory', 'brand')
        ->get();

        if($this->sub_category) {
            $products = $products->where('sub_category_id', $this->sub_category);
        }

        $sub_categories = SubCategory::all();
        return view('livewire.product', compact('products', 'sub_categories'));
    }
}
