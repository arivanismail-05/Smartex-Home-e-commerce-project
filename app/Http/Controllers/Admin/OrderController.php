<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index');
    }


    public function show($id)
    {

        $order = Order::with('orderItems.product','user')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }


    
    public function toggleStatus($orderId)
    {
        $order = Order::find($orderId);
        if ($order) {
            $order->status = !$order->status;
            $order->save();
        }

        flash()->success('Order status updated successfully.');
        return redirect()->route('admin.orders.index');

    }

}
