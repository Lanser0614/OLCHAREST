<?php

namespace App\Modules\EmailFeedback\database\seeders;

use App\Modules\EmailFeedback\Models\EmailFeedback;
use Illuminate\Database\Seeder;

class EmailFeedbackSeeder extends  Seeder
{

    public  function  run(){
        EmailFeedback::factory(10)->create();
    }

}