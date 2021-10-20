<?php

namespace App\Modules\Programs\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
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
            'name_uz' => $this->name_uz,
            'name_oz' => $this->name_oz,
            'image' => $this->image,
            'parent_id' => $this->parent_id,
            'children' => ProgramResource::collection($this->whenLoaded('childrenCategories'))
        ];
    }
}
