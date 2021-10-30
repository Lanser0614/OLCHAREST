<?php

namespace App\Modules\CategoryForComputer\Repository;

use App\Modules\CategoryForComputer\Models\CategoryForComputer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

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

    public function getCategoryAlias(string $slug) 
    {
      //  $alias = $this->model::join('category_for_computer', 'categories.id', '=', 'category_for_computer.category_id');
        $alias = $this->model->DB::table('category_for_computer')
        ->leftJoin('categories','categories.id','=','category_for_computer.category_id')
        ->select('category_for_computer.category_id','categories.id','categories.alias')
        ->get();

        
    }

    public function getByCategoryId($id)
    {
        return $this->model::where('category_id', '=', $id)->with('category')->with('products.product')->get();
      //  return $this->model::where('alias', '=', $id)->with('category')->with('products.product')->get();
    }
    
}