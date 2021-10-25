<?php

namespace App\Modules\computerPeripherals\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class computerPeripheralsResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'image' => $this->image,
            'description' => $this->description,
            'parent_id' => $this->parent_id,
            'children' => computerPeripheralsResource::collection($this->whenLoaded('childrenCategories'))
        ];
    }
    
}
