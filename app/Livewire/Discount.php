<?php

namespace App\Livewire;

use App\Models\Discount as ModelsDiscount;
use Livewire\Component;

class Discount extends Component
{

    public $sortBy = 'percentage';
    public $sortDir = 'desc';
    public $search;



    public function toggleStatus($id)
    {
        $discount = ModelsDiscount::find($id);
        if ($discount) {
            $discount->is_active = !$discount->is_active;
            $discount->save();
        }
        flash()->success('Status updated successfully!');

    }
    public function render()
    {
        if($this->sortBy === 'latest') {
            $this->sortBy = 'created_at';
            $this->sortDir = 'desc';
        } elseif($this->sortBy === 'oldest') {
            $this->sortBy = 'created_at';
            $this->sortDir = 'asc';
        } elseif($this->sortBy === 'lowest') {
            $this->sortBy = 'percentage';
            $this->sortDir = 'asc';
        } elseif($this->sortBy === 'highest') {
            $this->sortBy = 'percentage';
            $this->sortDir = 'desc';
        }

        $discounts = ModelsDiscount::with('product')
        ->where('percentage', 'like', '%' . $this->search . '%')
        ->orderBy($this->sortBy, $this->sortDir)
        ->get()
        ;

        // $discounts->orWhere('product.id', $this->product_by);
        return view('livewire.discount', compact('discounts'));
    }
}
