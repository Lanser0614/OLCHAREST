<?php

namespace App\Modules\FeedbackComputer\database\seeders;





use App\Modules\FeedbackComputer\Models\Feedback;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{

    public function run(){
        Feedback::truncate();
        Feedback::factory(10)->create();
    }

}