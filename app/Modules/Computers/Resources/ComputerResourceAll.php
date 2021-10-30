<?php

namespace App\Modules\Computers\Resources;

//use App\Modules\ComputerForProgram\Resources\ComputerForProgramResource;
//use App\Http\Resources\ComputerProgramResource;
use App\Modules\ComputerForProgram\Resources\ComputerProgramResource;
use App\Modules\ComputerForSale\Resources\ComputerForSale;
use App\Modules\ComputerImage\Resource\ComputerImageResource;
use App\Modules\ComputerMonofaktura\Resources\ComputerMonofakturaResource;
use App\Modules\OlchaProducts\Resources\ProductResource;
use App\Modules\ProductForComputer\Resources\ProductForComputer;
use Illuminate\Http\Resources\Json\JsonResource;

class ComputerResourceAll extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name_oz' => $this->name,
            'desc_oz' => $this->desc,
            'name_ru' => $this->name_ru,
            'desc_ru' => $this->desc_ru,
            'name_uz' => $this->name_uz,
            'desc_uz' => $this->desc_uz,
            'alias' => $this->alias,
            'main_image' => $this->image,
         //   'manufacturer' => new ComputerMonofakturaResource($this->whenLoaded('manufactory')),
            'products' => ComputerForSale::collection($this->whenLoaded('product')),
            'program' => ComputerProgramResource::collection($this->whenLoaded('program')),
            'images' => ComputerImageResource::collection($this->whenLoaded('ComputerImages')),

        ];
    }

}