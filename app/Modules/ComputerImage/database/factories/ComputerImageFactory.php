<?php



namespace App\Modules\ComputerImage\database\factories;


use App\Modules\ComputerImage\Models\ComputerImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComputerImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ComputerImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'computer_id' => $this->faker->numberBetween($min = 1, $max = 13),
            'image' => $this->faker->name(),
        ];
    }
}
