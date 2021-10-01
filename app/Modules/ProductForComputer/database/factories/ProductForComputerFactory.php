<?php


namespace App\Modules\ProductForComputer\database\factories;




use Illuminate\Database\Eloquent\Factories\Factory;
use App\Modules\ProductForComputer\Models\ProductForComputer;

class ProductForComputerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductForComputer::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween($min = 10, $max = 100),
            'cat_id' =>  $this->faker->numberBetween($min = 10, $max = 100)
        ];
    }

}
