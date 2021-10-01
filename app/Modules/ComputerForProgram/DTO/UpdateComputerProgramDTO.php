<?php

namespace App\Modules\ComputerForProgram\DTO;

class UpdateComputerProgramDTO
{


    public $computer_id;
    public $program_id;

    public function __construct($computer_id, $program_id)
    {
        $this->computer_id = $computer_id;
        $this->program_id = $program_id;
    }

}