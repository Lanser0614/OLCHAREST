<?php

namespace App\Modules\CategoryForComputer\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'category' => $this->category->name_uz,
        ];
    }
}
