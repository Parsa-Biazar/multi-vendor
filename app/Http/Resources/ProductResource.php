<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'description'=> $this->description,
            'price'=> $this->price,
            'is_active' => $this->is_active == 1,
            'categories'=> CategoryResource::collection($this->whenLoaded('categories')),
            'brands'=> BrandResource::collection($this->whenLoaded('brands'))
        ];
    }
}
