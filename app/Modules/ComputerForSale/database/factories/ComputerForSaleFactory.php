<?php

namespace App\Modules\ComputerForSale\database\factories;

use App\Modules\ComputerForSale\Models\ComputerForSale;
use Illuminate\Database\Eloquent\Factories\Factory;


class ComputerForSaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ComputerForSale::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'computer_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'product_id' => $this->faker->numberBetween($min = 10, $max = 30)
        ];
    }
}