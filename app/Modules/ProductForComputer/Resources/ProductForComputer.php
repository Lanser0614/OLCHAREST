<?php

namespace App\Modules\ProductForComputer\Resources;

use App\Modules\OlchaProducts\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductForComputer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
         //  'id' => $this->id,
          //  'product_id' => $this->product_id,
          //  'cat_id' => $this->cat_id,
           'product' => (new ProductResource($this->whenLoaded('product')))
          // 'name_uz' => $this->product->name_uz,
        //    'price' => $this->product->price
        ];
    }
}
