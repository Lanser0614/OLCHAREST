<?php

namespace App\Modules\Programs\DTO;

class UpdateProgramDTO
{

    public $name_ru;
    public $name_uz;
    public $name_oz;
    public $image;
    public $parent_id;

public function __construct($name_ru, $name_uz, $name_oz, $image, $parent_id)
{
    $this->name_ru = $name_ru;
    $this->name_uz = $name_uz;
    $this->name_oz = $name_oz;
    $this->image = $image;
    $this->parent_id = $parent_id;
    
}
}