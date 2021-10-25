<?php

namespace App\Modules\CategoryForComputer\Repository;

use App\Modules\CategoryForComputer\Models\CategoryForComputer;

class CategoryForComputerRepository implements CategoryForComputerRepositoryInterface
{
    public $model;

    public function __construct(CategoryForComputer $model)
    {
        $this->model = $model;
    }

    public function getCategory()
    {
       return $this->model::with('category')->with('products.product')->get();
    }

    public function getByCategoryId($id)
    {
        return $this->model::where('category_id', '=', $id)->with('category')->with('products.product')->get();
    }
    
}