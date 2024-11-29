<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = ['product_name', 'unit_price', 'unit_type'];
    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

}
