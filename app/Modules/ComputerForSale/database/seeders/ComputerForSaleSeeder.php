<?php

namespace App\Modules\ComputerForSale\database\seeders;

use App\Modules\ComputerForSale\Models\ComputerForSale;
use Illuminate\Database\Seeder;

class ComputerForSaleSeeder extends Seeder
{
    public function run()
    {
        ComputerForSale::factory(10)->create();
    }
}