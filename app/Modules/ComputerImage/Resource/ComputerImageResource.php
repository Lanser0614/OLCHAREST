<?php

namespace App\Modules\ComputerImage\Resource;


use Illuminate\Http\Resources\Json\JsonResource;

class ComputerImageResource extends JsonResource
{
    public function toArray($request){
        return [
            'image' => $this->image,
        ];
    }
    
}
