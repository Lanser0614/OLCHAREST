<?php

namespace App\Modules\OlchaProducts\Repository;

use App\Modules\OlchaProducts\Models\OlchaProduct;

class ProductReadRepository implements ProductReadRepositoryInterface
{
    protected $model;

    public function __construct(OlchaProduct $model)
    {
        $this->model = $model;
    }

    public function getProductById($id)
    {
     return  $this->model::with('category')->find($id);
    }
}