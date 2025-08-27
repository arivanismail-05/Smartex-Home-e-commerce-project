<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    protected $appends = ['total_price_readable', 'delivery_fee_readable'];
    public function getTotalPriceReadableAttribute()
    {
        return number_format($this->total_price, 2);
    }

    public function getDeliveryFeeReadableAttribute()
    {
        return number_format($this->delivery_fee, 2);
    }
}
