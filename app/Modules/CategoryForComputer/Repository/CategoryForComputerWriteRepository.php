<?php

namespace App\Modules\CategoryForComputer\Repository;

use App\Modules\CategoryForComputer\DTO\CreateCategoryForComputerDTO;
use App\Modules\CategoryForComputer\DTO\UpdateCategoryForComputerDTO;
use App\Modules\CategoryForComputer\Models\CategoryForComputer;

class CategoryForComputerWriteRepository implements CategoryForComputerWriteRepositoryInterface
{
    public $model;

    public function __construct(CategoryForComputer $model)
    {
        $this->model = $model;
    }

    public function create(CreateCategoryForComputerDTO $DTO)
    {
      return  $this->model->create(get_object_vars($DTO));
    }

    public function update($id, CreateCategoryForComputerDTO $DTO)
    {
        // $model = $this->model->where('id', '=', $id)->first();
        // $model->update(get_object_vars($DTO));
        // return $model;

        $model = $this->model->where('id', '=', $id)->first();
        $model->update(get_object_vars($DTO));
        return $model;
    }
}