<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        return view('admin.discounts.index');
    }

    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        return view('admin.discounts.edit', compact('discount'));
    }


    public function update(DiscountRequest $request, string $id)
    {

        $discount = discount::findOrFail($id);

        $validated = $request->validated();
        $discount->update($validated);
        $discount->is_active = $request->has('is_active');



        $discount->save();

    flash()->success('Discount updated successfully!');
    return redirect()->route('admin.discounts.index');
    }

}
