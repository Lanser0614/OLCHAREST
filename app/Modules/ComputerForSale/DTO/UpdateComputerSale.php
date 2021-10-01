<?php

namespace App\Modules\ComputerForSale\DTO;

class UpdateComputerSale
{
    public $computer_id;
    public $product_id;

    public function __construct($computer_id,    $product_id)
    {
        $this->computer_id = $computer_id;
        $this->product_id = $product_id;
    }
}