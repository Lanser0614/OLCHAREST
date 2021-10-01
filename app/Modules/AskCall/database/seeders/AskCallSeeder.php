<?php

namespace App\Modules\AskCall\database\seeders;

use App\Modules\AskCall\Models\AskCall;
use Illuminate\Database\Seeder;

class AskCallSeeder extends Seeder
{

    public function  run(){
        AskCall::factory(10)->create();
    }

}