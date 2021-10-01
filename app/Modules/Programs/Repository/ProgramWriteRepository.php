<?php

namespace App\Modules\Programs\Repository;

use App\Modules\Programs\Models\Program;
use App\Modules\Programs\DTO\CreateProgramDTO;
use App\Modules\Programs\DTO\UpdateProgramDTO;

class ProgramWriteRepository implements ProgramWriteRepositoryInterface
{

    protected $model;

    public function __construct(Program $model)
    {
        $this->model = $model;
    }

    public function create(CreateProgramDTO $DTO)
    {
     return  $this->model->create(get_object_vars($DTO));
    }

    public function update($id, UpdateProgramDTO $DTO)
    {
        $model = $this->model::where('id', '=', $id)->first();
        $model->update(get_object_vars($DTO));
        return $model;
    }
}
