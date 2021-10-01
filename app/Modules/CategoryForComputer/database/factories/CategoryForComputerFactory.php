<?php

namespace App\Modules\CategoryForComputer\database\factories;

use App\Modules\CategoryForComputer\Models\CategoryForComputer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryForComputerFactory extends Factory
{
    protected $model = CategoryForComputer::class;

    public function definition()
    {
        return[
        'category_id' => $this->faker->numberBetween($min = 50, $max=58),
        ];
    }
}