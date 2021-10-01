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

    public $image;

    public $monofacture_id;

    public function __construct($name, $desc, $image, $monofacture_id)
    {
        $this->name = $name;
        $this->desc = $desc;
        $this->image = $image;
        $this->monofacture_id = $monofacture_id;

    }
}