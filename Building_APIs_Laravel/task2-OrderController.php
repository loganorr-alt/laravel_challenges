<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        return response()->json(Order::all());
    }

    /**
    * Display the specified resource.
    */
    public function show(Order $order)
    {
        return response()->json(Order);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$validated = $request->validated();
        $validated = $request->validate([
            'customer_id' => 'required|integer',
            'billing_name' => 'required|string|max:255',
            'billing_address' => 'required|string|max:255', 
            //'total' => 'required|numeric',
            'products' => 'required|array',
            'products.*.product_id' => 'required|integer',
            'products.*.quantity' => 'required|integer',
        ]);

        $total = 0;
        foreach ($validated['products'] as $orderedProduct) {
            $product = Product::find($orderedProduct['product_id']);
            $total += $product->price * $orderedProduct['quantity'];
        }

        $order = Order::create(['customer_id' => $validated['customer_id'], 'total' => $total]);
        
        foreach ($validated['products'] as $orderedProduct) {
            $order->orderedProducts()->create($orderedProduct);
        }

        $order->update(['total' => $total]);
        
        return response()->json($order);
    }
}
