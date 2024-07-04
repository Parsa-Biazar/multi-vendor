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
            'vendor_info' => new VendorResource($this->whenLoaded('vendor')),
//            'vendor_info' => VendorResource::collection($this->whenLoaded('vendor')),
            'name' => $this-> name,
            'description' => $this-> description,
            'price' => $this-> price,
            'is_active' => $this-> is_active==0,
            'stock' => $this-> stock,
            'released' => $this->created_at->diffForHumans(),
            'updated' => $this->updated_at->diffForHumans(),
            'categories'=> CategoryResource::collection($this->whenLoaded('categories')),
            'brands'=> BrandResource::collection($this->whenLoaded('brands')),
//            'brand'=>new BrandResource($this->whenLoaded('brand')),
        ];
    }
}
