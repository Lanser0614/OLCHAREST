<?php

namespace App\Modules\Programs\Repository;

use App\Modules\Programs\DTO\CreateProgramDTO;
use App\Modules\Programs\DTO\UpdateProgramDTO;
use PhpParser\Node\Expr\FuncCall;

interface ProgramWriteRepositoryInterface
{
    public function create(CreateProgramDTO $DTO);

    public function update($id, UpdateProgramDTO $DTO);
}
