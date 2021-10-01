<?php

namespace App\Modules\OlchaProducts\Controllers;

use App\Http\Controllers\BaseApiController;
use App\Modules\OlchaProducts\Repository\ProductReadRepositoryInterface;
use App\Modules\OlchaProducts\Resources\ProductResource;

class ProductController extends BaseApiController
{
    public $productReadRepositore;

    public function __construct(ProductReadRepositoryInterface $productReadRepositore)
    {
        $this->productReadRepositore = $productReadRepositore;
    }

    public function show($id){
        $model = $this->productReadRepositore->getProductById($id);
        return new ProductResource($model);
    }
}