<?php

namespace App\Modules\Programs\DTO;

class CreateProgramDTO
{
    public $name;
    public $parent_id;

public function __construct($name, $parent_id)
{
    $this->name = $name;
    $this->parent_id = $parent_id;
    
}
}