<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {

        $today_sale = 0;
        $order = Order::whereDate('created_at', today())->get();

        foreach ($order as $item) {
            $today_sale += $item->total_price;
        }

        $order_count = Order::whereDate('created_at', today())->count();
        $new_customers = User::whereDate('created_at', today())->count();
        $low_stock_products = Product::where('stock', '<', 5)->count();

        $orderItems = OrderItem::with('product.subCategory','order.user')->whereHas('order', function ($query) {
            $query->whereDate('created_at', today());
        })->paginate(4);


        $customers = User::whereDate('created_at', today())->paginate(4);

        return view('livewire.dashboard', compact('today_sale', 'order_count', 'new_customers', 'low_stock_products', 'orderItems', 'customers'));
    }
}
