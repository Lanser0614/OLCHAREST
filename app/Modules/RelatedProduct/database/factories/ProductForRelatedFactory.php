<?php

namespace App\Modules\RelatedProduct\database\factories;

use App\Modules\RelatedProduct\Models\RelatedProduct;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductForRelatedFactory extends Factory
{
    protected $model = RelatedProduct::class;

    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween($min = 1, $max = 100),
            'related_product_id' => $this->faker->numberBetween($min = 1, $max = 100)
        ];
    }
}