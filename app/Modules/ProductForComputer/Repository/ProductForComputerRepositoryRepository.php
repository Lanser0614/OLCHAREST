<?php

namespace App\Modules\ProductForComputer\Repository;

use App\Modules\ProductForComputer\Models\ProductForComputer;
use Illuminate\Database\Eloquent\Builder;

class ProductForComputerRepositoryRepository implements ProductForComputerRepositoryInterface
{
    protected $model;

    public function __construct(ProductForComputer $model)
    {
        $this->model = $model;
    }

    public function getProducts()
    {
       return $this->model::with('product.category')->paginate(3);

    }

    public function getCat($id)
    {
        return $this->model::query()->where('cat_id', '=', $id)->with('product')->get();
    }

    public function getById($id)
    {
        return $this->model::with(['product.category'])->find($id);
       
    }

   



}