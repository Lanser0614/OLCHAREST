<?php

namespace App\Modules\Computers\Resources;

//use App\Modules\ComputerForProgram\Resources\ComputerForProgramResource;
//use App\Http\Resources\ComputerProgramResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\OlchaProducts\Resources\ProductResource;
use App\Modules\ComputerForSale\Resources\ComputerForSale;
use App\Modules\ProductForComputer\Resources\ProductForComputer;
use App\Modules\ComputerForProgram\Resources\ComputerProgramResource;
use App\Modules\ComputerMonofaktura\Resources\ComputerMonofakturaResource;

class ComputerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'name_ru' => $this->name_ru,
            'desc_ru' => $this->desc_ru,
            'name_uz' => $this->name_uz,
            'desc_uz' => $this->desc_uz,
            'image' => $this->image,
            'products' => ComputerForSale::collection($this->whenLoaded('product')),
            'program' => ComputerProgramResource::collection($this->whenLoaded('program')),
           // 'monofacture_id' => new ComputerMonofakturaResource($this->whenLoaded('manufactory'))
          
        ];
    }

}