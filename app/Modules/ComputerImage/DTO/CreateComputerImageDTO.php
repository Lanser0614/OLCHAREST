<?php

namespace App\Modules\ComputerImage\DTO;

class CreateComputerImageDTO
{
    public $computer_id;
    public $image;

    public function __construct($computer_id, $image)
    {
        $this->$computer_id = $computer_id;
        $this->$image = $image;
    }
}
