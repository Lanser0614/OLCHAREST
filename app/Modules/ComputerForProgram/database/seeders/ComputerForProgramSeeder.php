<?php

namespace App\Modules\ComputerForProgram\database\seeders;

use App\Modules\ComputerForProgram\Models\ComputerForProgram;
use Illuminate\Database\Seeder;

class ComputerForProgramSeeder extends Seeder
{

    public function run()
    {
        ComputerForProgram::factory(10)->create();
    }

}