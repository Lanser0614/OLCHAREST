<?php

namespace App\Modules\Computers\DTO;

class CreateComputer
{
  /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $desc;

     /**
     * @var
     */
    public $name_ru;
    /**
     * @var
     */
    public $desc_ru;

     /**
     * @var
     */
    public $name_uz;
    /**
     * @var
     */
    public $desc_uz;

    public $image;

    public $monofacture_id;

    public function __construct($name, $desc, $image, $name_ru,  $desc_ru,   $name_uz,  $desc_uz,  $monofacture_id)
    {
        $this->name = $name;
        $this->desc = $desc;
        $this->name_ru = $name_ru;
        $this->desc_ru = $desc_ru;
        $this->name_uz = $name_uz;
        $this->desc_uz = $desc_uz;
        $this->image = $image;
        $this->monofacture_id = $monofacture_id;

    }
}