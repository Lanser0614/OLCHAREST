<?php

namespace App\Modules\Programs\database\factories;



use App\Modules\Programs\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    protected $model = Program::class;

    public function definition()
    {
        return [
            'name_ru' => $this->faker->name,
            'name_uz' => $this->faker->name,
            'name_oz' => $this->faker->name,
            'image' => $this->faker->name,
            'parent_id' => $this->faker->numberBetween($min = 1, $max = 2)
        ];
    }
}