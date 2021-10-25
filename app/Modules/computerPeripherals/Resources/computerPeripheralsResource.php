<?php

namespace App\Modules\computerPeripherals\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\ProductForComputer\Resources\ProductForComputer;
use App\Modules\CategoryForComputer\Resources\CategoryForComputerResource;
use App\Modules\OlchaProducts\Resources\ProductResource;

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
            'category_id' => $this->category_id,
            'Category' => new CategoryForComputerResource($this->whenLoaded('category')),
            'products' => new ProductResource($this->whenLoaded('products'))
        ];
    }
    
}
