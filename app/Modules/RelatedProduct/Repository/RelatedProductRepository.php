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


    }

    public function getRelatedByProductId($id)
    {
        return $this->model::with('product.product.category')->where('product_id', '=', $id)->get();
    }


   






}