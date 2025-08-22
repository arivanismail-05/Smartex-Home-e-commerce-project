<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }


    protected $appends = ['price_readable', 'sale_price_readable'];
    public function getPriceReadableAttribute()
    {
        return number_format($this->price, 2);
    }

    public function getSalePriceReadableAttribute()
    {
        return number_format($this->sale_price, 2);
    }
}
