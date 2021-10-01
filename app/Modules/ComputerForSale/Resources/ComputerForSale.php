<?php

namespace App\Modules\ComputerForSale\Resources;

use App\Modules\ProductForComputer\Resources\ProductForComputer;
use App\Modules\OlchaProducts\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;

class ComputerForSale extends JsonResource
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
            'id' => $this->id,
            'product_id' => $this->product_id,
            'computer_id' => $this->computer_id,
            'computer' =>$this->computer->name,
           'product'=> (new ProductForComputer($this->whenLoaded('product'))),
        ];
    }
}
