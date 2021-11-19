<?php


namespace App\Modules\OlchaCategories\Resource;

use App\Modules\OlchaProducts\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OlchaCategoriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name_ru' => $this->name_ru,
            'name_oz' => $this->name_oz,
            'name_uz' => $this->name_uz,
            'alias' => $this->alias,
            'product' => (ProductResource::collection($this->whenLoaded('products'))),
        ];
    }
}
