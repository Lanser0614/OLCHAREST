<?php

namespace App\Modules\FeedbackComputer\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeedbackResource extends JsonResource
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
            'title_oz' => $this->title_oz,
            'description_oz' => $this->description_oz,
            'user_id' => $this->user_id,
            'title_uz' => $this->title_uz,
            'description_uz' => $this->description_uz,
            'title_ru' => $this->title_ru,
            'description_ru' => $this->description_ru
        ];
    }
}
