<?php

namespace App\Livewire;

use App\Models\Order as ModelsOrder;
use Livewire\Component;

class Order extends Component
{

    public $search;
    public $sortby = 'created_at';

    public $sortdir = 'asc';

    public $order_status;

    public function sortDir(){
        $this->sortdir = ($this->sortdir === 'asc') ? 'desc' : 'asc';
    }


    public function render()
    {
        $orders = ModelsOrder::with('user')
        ->where('total_price', 'like', '%'.$this->search.'%')
        ->orWhere('delivery_fee', 'like', '%'.$this->search.'%')
        ->orWhereHas('user', function ($query)  {
                $query->where('name', 'like', '%'.$this->search.'%');
        })
        ->orderBy($this->sortby, $this->sortdir)
        ->get();

        if ($this->order_status === 'delivered') {
            $orders = $orders->where('status', 1);
        } elseif ($this->order_status === 'pending') {
            $orders = $orders->where('status', 0);
        }


        $deliveriedOrders = ModelsOrder::where('status', 1)->count();
        $pendingOrders = ModelsOrder::where('status', 0)->count();
        $newOrders = ModelsOrder::where('created_at', '>=', now()->subDays(7))
        ->where('status', 0)
        ->count();

        return view('livewire.order', compact('orders', 'deliveriedOrders', 'pendingOrders', 'newOrders'));
    }
}
