<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductAPIResource extends JsonResource
{
    /**
     * Transform the resource into an array suitable for the API.
     * 
     * It is unwise to expose the entire database row to the API.
     * 
     * In this instance we do, but in a real world scenario, we would only expose the fields we want to expose. 
     * And using an Opt-in approach reduces the odds of sensitive data leaking.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
