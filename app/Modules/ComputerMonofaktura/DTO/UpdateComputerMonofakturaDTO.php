<?php

namespace App\Modules\ComputerMonofaktura\DTO;

class UpdateComputerMonofakturaDTO
{

 public $name, $image;


public function __construct($name, $image)
{
    $this->name = $name;
    $this->image = $image;
}
}