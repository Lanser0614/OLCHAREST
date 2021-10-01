<?php

namespace App\Modules\ComputerForProgram\database\factories;

use App\Modules\ComputerForProgram\Models\ComputerForProgram;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComputerForProgramFactory extends Factory
{
    protected $model = ComputerForProgram::class;

    public function definition()
    {
        return [
            'computer_id' => $this->faker->numberBetween($min = 1, $max = 15),
            'program_id' => $this->faker->numberBetween($min = 1, $max = 10)
        ];
    }
}