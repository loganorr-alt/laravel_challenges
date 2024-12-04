<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function getAverageRating(): float
    {   // this is just enough to get the tests running. Whether returning 0 on null is the correct error handling can be discussed.
        return $this->reviews()->avg('rating') ?? 0;
    }
}
