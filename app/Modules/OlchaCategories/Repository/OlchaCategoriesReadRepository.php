<?php

namespace App\Modules\OlchaCategories\Repository;

use App\Modules\OlchaCategories\Models\OlchaCategories;

class OlchaCategoriesReadRepository implements OlchaCategoriesReadRepositoryInterface
{
    public $model;

    public function __construct(OlchaCategories $model)
    {
        $this->model = $model;
    }


    public function getCategoryWithProduct()
    {
       return $this->model::with('products')->take(10)->get();
    }
}
