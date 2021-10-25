<?php



namespace App\Modules\computerPeripherals\Database\Factories;



use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Modules\computerPeripherals\Models\computerPeripherals;

class computerPeripheralsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = computerPeripherals::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween($min = 600, $max = 800),
            'image' => $this->faker->name(),
            'description' => $this->faker->text(),
            'parent_id' => $this->faker->numberBetween($min = 1, $max = 5),
        ];
    }
}
