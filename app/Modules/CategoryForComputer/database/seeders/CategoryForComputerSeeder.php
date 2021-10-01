<?php

namespace App\Modules\CategoryForComputer\database\seeders;

use App\Modules\CategoryForComputer\Models\CategoryForComputer;
use Illuminate\Database\Seeder;

class CategoryForComputerSeeder extends Seeder
{

    public function run()
    {
        CategoryForComputer::factory(10)->create();
    }

}