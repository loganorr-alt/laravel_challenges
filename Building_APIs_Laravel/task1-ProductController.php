<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\ProductAPIResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return ProductAPIResource::collection(Product::all());
    }

    /**
    * Display the specified resource.
    */
    public function show(Product $product)
    {
        return new ProductAPIResource($product);
    }
    
}
