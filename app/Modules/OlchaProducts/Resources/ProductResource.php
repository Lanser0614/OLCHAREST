<?php

namespace App\Modules\OlchaProducts\Resources;

use App\Modules\OlchaCategories\Resource\OlchaCategoriesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name_uz,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'category name' => (new OlchaCategoriesResource($this->whenLoaded('category'))),
        ];
    }

}