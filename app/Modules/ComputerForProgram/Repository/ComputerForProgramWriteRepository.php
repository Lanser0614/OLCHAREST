<?php

namespace App\Modules\ComputerForProgram\Repository;

use App\Modules\ComputerForProgram\DTO\CreateComputerProgramDTO;
use App\Modules\ComputerForProgram\DTO\UpdateComputerProgramDTO;
use App\Modules\ComputerForProgram\Models\ComputerForProgram;

class ComputerForProgramWriteRepository implements ComputerForProgramWriteRepositoryInterface
{
    public $model;

    public function __construct(ComputerForProgram $model)
    {
        $this->model = $model;
    }

    public function create(CreateComputerProgramDTO $DTO)
    {
      return  $this->model->create(get_object_vars($DTO));
    }

    public function update($id, UpdateComputerProgramDTO $DTO)
    {
       $model = $this->model->where('id', '=', $id)->first();
       $model->update(get_object_vars($DTO));
       return $model;
    }
}