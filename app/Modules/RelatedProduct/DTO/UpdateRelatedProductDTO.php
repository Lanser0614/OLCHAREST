<?php

namespace App\Modules\RelatedProduct\DTO;

class UpdateRelatedProductDTO
{
    public $product_id;
    public $related_product_id;

    public function __construct($product_id, $related_product_id)
    {
        $this->product_id = $product_id;
        $this->related_product_id = $related_product_id;
    }

}