<?php

namespace App\Modules\CategoryForComputer\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\ProductForComputer\Resources\ProductForComputer;

class CategoryForComputerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'category_uz' => $this->category->name_uz,
            'category_oz' => $this->category->name_oz,
            'category_ru' => $this->category->name_ru,
            'alias' => $this->category->alias,
            'image' => $this->icon,
            'product' => ProductForComputer::collection($this->whenLoaded('products'))
        ];
    }
}
