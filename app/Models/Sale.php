<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    public function customer()
    {
        return $this->belongsTo(customer::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_sale', 'sale_id')->withPivot('quantity');
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}