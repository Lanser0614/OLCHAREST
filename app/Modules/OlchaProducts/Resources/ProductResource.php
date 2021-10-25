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
            'name_uz' => $this->name_uz,
            'name_oz' => $this->name_oz,
            'name_ru' => $this->name_ru,
            'description_uz' => $this->description_uz,
            'description_ru' => $this->description_ru,
            'description_oz' => $this->description_oz,
            'alias' => $this->alias,
            'images' => $this->images,
            'price' => (float)$this->price,
            'quantity' => (float)$this->quantity,
            'category_id' => $this->category_id,
            'Category' => (new OlchaCategoriesResource($this->whenLoaded('category'))),
        ];
    }

}