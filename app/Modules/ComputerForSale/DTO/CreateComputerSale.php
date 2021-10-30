<?php

namespace App\Modules\ComputerForSale\DTO;

class CreateComputerSale
{

    public $computer_id;
    public $product_id;
    public $category_id;

    public function __construct($computer_id, $product_id, $category_id)
    {
        $this->computer_id = $computer_id;
        $this->product_id = $product_id;
        $this->category_id = $category_id;
    }
}