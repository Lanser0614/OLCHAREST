<?php

namespace App\Modules\ComputerForProgram\Repository;

use App\Modules\ComputerForProgram\DTO\CreateComputerProgramDTO;
use App\Modules\ComputerForProgram\DTO\UpdateComputerProgramDTO;

interface ComputerForProgramWriteRepositoryInterface
{
        public function create(CreateComputerProgramDTO $DTO);

        public function update($id, UpdateComputerProgramDTO $DTO);

}