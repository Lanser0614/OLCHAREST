<?php

namespace App\Modules\RelatedProduct\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\ComputerForSale\Resources\ComputerForSale;
use App\Modules\ProductForComputer\Resources\ProductForComputer;

class RelatedProductResource extends JsonResource
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
        //    'product_id' => $this->product_id,
        //    'related_product_id' => $this->related_product_id,
        //    'product_info' => (new ProductForComputer($this->whenLoaded('mainProduct'))),
           'related_product'=> (ProductForComputer::collection($this->whenLoaded('product'))),
        ];
    }
}
