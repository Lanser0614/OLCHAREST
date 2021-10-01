<?php

namespace App\Modules\CategoryForComputer\DTO;

class CreateCategoryForComputerDTO {

    public $category_id;

    public function __construct($category_id)
    {
        $this->category_id = $category_id;
    }
}