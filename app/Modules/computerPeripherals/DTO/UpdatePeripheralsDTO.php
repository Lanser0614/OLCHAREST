<?php

namespace App\Modules\computerPeripherals\DTO;

class UpdatePeripheralsDTO
{
   public $product_id;
   public $image;
   public $description;

   public function __construct($product_id, $image,  $description)
   {
       $this->product_id = $product_id;
       $this->image = $image;
       $this->description = $description;
   }
}
