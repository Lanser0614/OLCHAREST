<?php

namespace App\Modules\FeedbackComputer\database\factories;

use App\Modules\FeedbackComputer\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{

    protected $model = Feedback::class;

    public function definition()
    {
       return [
           'user_id' => $this->faker->numberBetween($min = 1, $max = 10),
           'title_oz' => $this->faker->realText($maxNbChars = 60, $indexSize = 1),
           'description_oz' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),

           'title_uz' => $this->faker->realText($maxNbChars = 60, $indexSize = 1),
           'description_uz' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),

           'title_ru' => $this->faker->realText($maxNbChars = 60, $indexSize = 1),
           'description_ru' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
       ];
    }
}