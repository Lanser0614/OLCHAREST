<?php

namespace App\Modules\ComputerMonofaktura\Repository;

use App\Modules\ComputerMonofaktura\Models\ComputerMonofaktura;
use App\Modules\ComputerMonofaktura\DTO\CreateComputerMonofakturaDTO;
use App\Modules\ComputerMonofaktura\DTO\UpdateComputerMonofakturaDTO;

class ComputerMonofakturaWriteRepository implements ComputerMonofakturaWriteRepositoryInterface
{

    protected $model;

    public function __construct(ComputerMonofaktura $model)
    {
        $this->model = $model;
    }
    public function create(CreateComputerMonofakturaDTO $DTO)
    {
       return $this->model->create(get_object_vars($DTO));
    }

    public function update($id, UpdateComputerMonofakturaDTO $DTO)
    {
        $model = $this->model::where('id', '=', $id)->first();
        $model->update(get_object_vars($DTO));
        return $model;
    }
}
