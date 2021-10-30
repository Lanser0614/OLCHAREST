<?php

namespace App\Modules\RelatedProduct\Repository;

interface RelatedProductRepositoryInterface
{
    public function getRelatedProduct();

    public function getRelatedByProductId($computer_id, $category_id);

   
}