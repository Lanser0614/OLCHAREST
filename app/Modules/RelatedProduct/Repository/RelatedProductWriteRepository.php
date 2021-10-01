<?php

namespace App\Modules\RelatedProduct\Repository;

use App\Modules\RelatedProduct\Models\RelatedProduct;
use App\Modules\RelatedProduct\DTO\CreateRelatedProductDTO;
use App\Modules\RelatedProduct\DTO\UpdateRelatedProductDTO;
use App\Modules\RelatedProduct\Repository\RelatedProductWriteRepositoryInterFace;

class RelatedProductWriteRepository implements RelatedProductWriteRepositoryInterFace
{

    protected $model;

    public function __construct(RelatedProduct $model)
    {
        $this->model = $model;
    }
    public function create(CreateRelatedProductDTO $DTO)
    {
      return  $this->model->create(get_object_vars($DTO));
    }

    public function update($id, UpdateRelatedProductDTO $DTO)
    {
        $model = $this->model::where('product_id', '=', $id)->first();
        $model->update(get_object_vars($DTO));
        return $model;
    }
}
