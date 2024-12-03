<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function getAverageRating(): float
    {
        return 5;
    }
}
