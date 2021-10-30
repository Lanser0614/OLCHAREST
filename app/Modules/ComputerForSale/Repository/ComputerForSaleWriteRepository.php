<?php

namespace App\Modules\ComputerForSale\Repository;

use PhpParser\Node\Expr\FuncCall;
use App\Modules\ComputerForSale\DTO\CreateComputerSale;
use App\Modules\ComputerForSale\DTO\UpdateComputerSale;
use App\Modules\ComputerForSale\Models\ComputerForSale;
use App\Modules\ComputerForProgram\Repository\ComputerForProgramWriteRepositoryInterface;

class ComputerForSaleWriteRepository implements ComputerForSaleWriteRepositoryInterface
{

    protected $model;

    public function __construct(ComputerForSale $model)
    {
        $this->model = $model;
    }


    public function create(CreateComputerSale $DTO){

       return $this->model->create(get_object_vars($DTO));
    }


    public function update($computer_id, $category_id, UpdateComputerSale $DTO){

        $model = $this->model::where('computer_id', '=', $computer_id)->where('category_id', '=', $category_id)->first();
        $model->update(get_object_vars($DTO));
        return $model;

    }
}
