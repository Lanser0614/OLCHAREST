<?php

namespace App\Modules\EmailFeedback\database\factories;

use App\Modules\EmailFeedback\Models\EmailFeedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailFeedbackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmailFeedback::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->email,
            'description' => $this->faker->text,
        ];
    }
}