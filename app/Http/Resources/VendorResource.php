<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'seller' => new UserResource($this->whenLoaded('user')),
            'store' => $this->store_name,
            'about_store' => $this->description,
            'opened' => $this->created_at->diffForHumans(),
        ];
    }
}
