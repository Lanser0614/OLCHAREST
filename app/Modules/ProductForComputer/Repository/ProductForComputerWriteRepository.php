<?php

namespace App\Modules\ProductForComputer\Repository;

use App\Modules\ProductForComputer\Models\ProductForComputer;
use App\Modules\ProductForComputer\DTO\CreateProductComputerDTO;
use App\Modules\ProductForComputer\DTO\UpdateProductComputerDTO;

class ProductForComputerWriteRepository implements ProductForComputerWriteRepositoryInterface
{
    public $model;

    public function __construct(ProductForComputer $model)
    {
        $this->model = $model;
    }
    public function create(CreateProductComputerDTO $DTO)
    {
        return $this->model->create(get_object_vars($DTO));
    }

    public function update($id, UpdateProductComputerDTO $DTO)
    {
        $model = $this->model::where('id', '=', $id)->first();
        $model->update(get_object_vars($DTO));
        return $model;
    }
}
