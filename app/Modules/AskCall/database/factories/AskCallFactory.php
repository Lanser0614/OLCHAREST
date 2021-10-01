<?php

namespace App\Modules\AskCall\database\factories;

use App\Modules\AskCall\Models\AskCall;
use Illuminate\Database\Eloquent\Factories\Factory;

class AskCallFactory extends Factory
{
    protected $model = AskCall::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone_number' => $this->faker->phoneNumber,
            'from_time' => $this->faker->time,
            'to_time' => $this->faker->time,
        ];
    }
}