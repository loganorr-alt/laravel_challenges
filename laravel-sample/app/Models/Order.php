<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $fillable = ['customer_id', 'total', 'billing_address', 'billing_name'];


    public function orderedProducts()
    {
        return $this->hasMany(OrderedProduct::class);
    }
}
