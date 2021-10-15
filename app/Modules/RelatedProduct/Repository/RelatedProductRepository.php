<?php

namespace App\Modules\RelatedProduct\Repository;

use Illuminate\Support\Facades\DB;
use App\Modules\RelatedProduct\Models\RelatedProduct;

class RelatedProductRepository implements RelatedProductRepositoryInterface
{

    protected $model;

    public function __construct(RelatedProduct $model)
    {
        $this->model = $model;
    }

    public function getRelatedProduct()
    {

       return $this->model::with(['product.product.category', 'mainProduct.product.category'])->get();
  // return $this->model::with('product')->get();
//   $model = $this->model = DB::table('products')->leftJoin('product_for_related', 'products.id', '=', 'product_for_related.related_product_id')->select('name_uz','name_oz','name_ru', 'price', 'images', 'alias', )->get();
//   return $model;
    }

    public function getRelatedByProductId($id)
    {
       // return $this->model::with('product.product.category')->where('product_id', '=', $id)->get();
       return $this->model::with('mainProduct.product.category')->where('product_id', '=', $id)->get();
    }


   






}