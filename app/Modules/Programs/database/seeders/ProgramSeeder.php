<?php

namespace App\Modules\Programs\database\seeders;

use App\Modules\Programs\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        Program::factory(10)->create();
    }
}