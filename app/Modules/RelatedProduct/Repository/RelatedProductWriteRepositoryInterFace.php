<?php

namespace App\Modules\RelatedProduct\Repository;

use App\Modules\RelatedProduct\DTO\CreateRelatedProductDTO;
use App\Modules\RelatedProduct\DTO\UpdateRelatedProductDTO;

interface RelatedProductWriteRepositoryInterFace
{

    public function create(CreateRelatedProductDTO $DTO);

    public function update($id, UpdateRelatedProductDTO $DTO);
}
