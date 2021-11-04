<?php

namespace App\Modules\CategoryForComputer\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\ProductForComputer\Resources\ProductForComputer;

class CategoryForComputerProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      return parent::toArray($request);
        // return  [
            
        //   //  'product' => ProductForComputer::collection($this->whenLoaded('products'))
        // ];
    }
}
