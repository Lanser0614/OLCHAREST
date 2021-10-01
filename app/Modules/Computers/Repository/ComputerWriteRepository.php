<?php
namespace App\Modules\Computers\Repository;

use App\Modules\Computers\Models\Computer;
use App\Modules\Computers\DTO\CreateComputer;
use App\Modules\Computers\DTO\UpdateComputer;
use App\Modules\Computers\Repository\ComputerWriteRepositoryInterface;

class ComputerWriteRepository implements ComputerWriteRepositoryInterface{

    public $model;

    public function __construct(Computer $model)
    {
     $this->model = $model;   
    }

    public function create(CreateComputer $DTO){
        return $this->model->create(get_object_vars($DTO));
    }

    public function update($id, UpdateComputer $DTO){
        $model = $this->model->where('id', '=', $id)->first();
        $model->update(get_object_vars($DTO));
        return $model;
    }
}