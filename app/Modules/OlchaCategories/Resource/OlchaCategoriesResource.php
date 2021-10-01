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
            'name' => $this->name_ru,
            //'name' => $this->name_uz,
            'product' => (ProductResource::collection($this->whenLoaded('products'))),
        ];
    }
}
