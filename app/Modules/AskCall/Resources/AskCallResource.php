<?php

namespace App\Modules\AskCall\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AskCallResource extends JsonResource
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
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'from_time' => $this->from_time,
            'to_time' => $this->to_time
        ];
    }
}
