<?php


namespace App\Modules\Computers\database\factories;




use App\Modules\Computers\Models\Computer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComputerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Computer::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'desc' => $this->faker->text,
            'name_ru' => $this->faker->name,
            'desc_ru' => $this->faker->text,
            'name_uz' => $this->faker->name,
            'desc_uz' => $this->faker->text,
            'image' => $this->faker->name,
            'monofacture_id' => $this->faker->numberBetween($min = 1, $max = 2)
        ];
    }

}
