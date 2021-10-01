<?php

namespace App\Modules\ProductForComputer\DTO;

class CreateProductComputerDTO
{
    public $product_id;
    public $cat_id;

public function __construct($product_id, $cat_id)
{
    $this->product_id = $product_id;
    $this->cat_id = $cat_id; 
}
}