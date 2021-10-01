<?php

namespace App\Modules\ComputerMonofaktura\database\factories;

use App\Modules\ComputerMonofaktura\Models\ComputerMonofaktura;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComputerMonofakturaFactory extends Factory
{

    protected $model = ComputerMonofaktura::class;

    public function definition()
    {
        return [
          'name' => $this->faker->name,
          'image' => $this->faker->name,
        ];

    }
}