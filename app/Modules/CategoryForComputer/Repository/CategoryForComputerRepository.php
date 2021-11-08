<?php

namespace App\Modules\CategoryForComputer\Repository;

use App\Modules\CategoryForComputer\Models\CategoryForComputer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class CategoryForComputerRepository implements CategoryForComputerRepositoryInterface
{
    public $model;

    public function __construct(CategoryForComputer $model)
    {
        
        $this->model = $model;
    }

    public function ByAlias(string $slug)
    {
      $alias = DB::table('category_for_computer')
      ->leftJoin('categories','categories.id','=','category_for_computer.category_id')
      ->select('category_for_computer.category_id','categories.id','categories.alias')->where('categories.alias', 'LIKE', "{$slug}")
      ->get();

      foreach ($alias as  $value) {
    
      }

    $this->model =  DB::table('product_for_computer')
  ->Join('products',function($join) use($value){
                      $join->on('products.id','=','product_for_computer.product_id')
                          ->where('product_for_computer.cat_id',"{$value->id}");
                  })->select('products.name_uz','products.name_oz','products.name_ru','products.description_uz','products.description_oz','products.description_ru','products.alias','products.images','products.price','products.quantity','products.category_id')
                  ->get();

                  return $this->model;
    }


    public function getCategory()
    {
      return $this->model::with('category')->paginate(5);
    //   return $this->model::with(['category', 'products.product'])->get();
    }

    public function getCategoryAlias(string $slug) 
    {
      //  $alias = $this->model::join('category_for_computer', 'categories.id', '=', 'category_for_computer.category_id');
        $alias = $this->model->DB::table('category_for_computer')
        ->leftJoin('categories','categories.id','=','category_for_computer.category_id')
        ->select('category_for_computer.category_id','categories.id','categories.alias')
        ->paginate();

        
    }

    public function getByCategoryId($id)
    {
        return $this->model::where('category_id', '=', $id)->with('products.product')->paginate(1);
    }
    
    
}