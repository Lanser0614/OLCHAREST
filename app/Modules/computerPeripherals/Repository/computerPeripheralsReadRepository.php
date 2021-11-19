<?php

namespace App\Modules\computerPeripherals\Repository;

use App\Modules\computerPeripherals\Models\computerPeripherals;

class computerPeripheralsReadRepository implements computerPeripheralsReedRepositoryInterface
{
    protected $model;

    public function __construct(computerPeripherals $model)
    {
        $this->model = $model;
    }
    public function getcomputerPeripherals(){
        return $this->model::with(['category.category', 'products'])->get();
      //  return $this->model::with('childrenCategories')->whereNull('parent_id')->get();
    }

    public function getcomputerPeripheralsById($id){
        return  $this->model::where('id', '=', $id)->first();
    }


}
