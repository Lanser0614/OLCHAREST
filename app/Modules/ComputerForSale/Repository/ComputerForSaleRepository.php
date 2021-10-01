<?php

namespace App\Modules\ComputerForSale\Repository;

use App\Modules\ComputerForSale\Models\ComputerForSale;

class ComputerForSaleRepository implements ComputerForSaleRepositoryInterface
{
    protected $model;

    public function __construct(ComputerForSale $model)
    {
        $this->model = $model;
    }

    public function ComputerForSale()
    {
        return $this->model::with('product.product.category')->with('computer')->get();
    }

    public function ComputerForSaleById($id)
    {
        return $this->model::query()->where('computer_id', '=', $id)->with('product.product.category')->with('computer')->get();
       
    }
}