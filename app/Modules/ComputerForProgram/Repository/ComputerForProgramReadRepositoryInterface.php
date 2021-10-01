<?php

namespace App\Modules\ComputerForProgram\Repository;

interface ComputerForProgramReadRepositoryInterface
{
    public function getProgramByComputerId($id);

    public function getAllProgramWithComputer();
}