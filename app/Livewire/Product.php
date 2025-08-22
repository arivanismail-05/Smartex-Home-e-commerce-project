<?php

namespace App\Livewire;

use App\Models\Product as ModelsProduct;
use Livewire\Component;

class Product extends Component
{

    public $search;

    public function toggleIsNew($id)
    {
        $product = ModelsProduct::find($id);
        if ($product) {
            $product->is_new = !$product->is_new;
            $product->save();
        }
        flash()->success('New product updated successfully!');
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
        return view('livewire.product', compact('products'));
    }
}
